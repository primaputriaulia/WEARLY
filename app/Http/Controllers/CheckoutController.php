<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Midtrans\Config;
use Midtrans\Snap;
use Throwable;

class CheckoutController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MENYIMPAN PRODUK YANG DIPILIH UNTUK CHECKOUT
    |--------------------------------------------------------------------------
    */
    public function prepare(Request $request)
    {
        $validated = $request->validate([
            'selected_products' => 'required|array|min:1',
            'selected_products.*' => 'required|integer',
        ], [
            'selected_products.required' => 'Pilih minimal satu produk untuk checkout.',
            'selected_products.min' => 'Pilih minimal satu produk untuk checkout.',
        ]);

        $selectedIds = array_values(array_unique(
            array_map('intval', $validated['selected_products'])
        ));

        // Memastikan produk merupakan milik keranjang pengguna
        $cartIds = CartItem::where('user_id', auth()->id())
            ->whereIn('id', $selectedIds)
            ->pluck('id')
            ->map(fn ($id) => (int) $id)
            ->all();

        if (count($cartIds) !== count($selectedIds)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Produk yang dipilih tidak ditemukan di keranjang.');
        }

        session()->put('checkout_product_ids', $selectedIds);

        return redirect()->route('checkout.index');
    }


    /*
    |--------------------------------------------------------------------------
    | MENAMPILKAN HALAMAN CHECKOUT
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $selectedIds = session()->get('checkout_product_ids', []);

        if (empty($selectedIds)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Silakan pilih produk yang ingin dibeli.');
        }

        // Mengambil produk pilihan dari database keranjang
        $cartItems = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->whereIn('id', $selectedIds)
            ->get();

        if ($cartItems->count() !== count($selectedIds)) {
            session()->forget('checkout_product_ids');

            return redirect()
                ->route('cart.index')
                ->with('error', 'Produk yang dipilih tidak ditemukan.');
        }

        $cart = [];
        $totalWeight = 0;

        foreach ($cartItems as $item) {
            if (!$item->product) {
                continue;
            }

            $product = $item->product;

            $cart[$item->id] = [
                'product_id' => $product->id,
                'nama' => $product->nama,
                'harga' => $product->harga,
                'gambar' => $product->gambar,
                'kategori' => $product->kategori,
                'ukuran' => $item->ukuran,
                'warna' => $item->warna,
                'quantity' => $item->quantity,
            ];

            $totalWeight += (int) ($product->berat ?? 500)
                * (int) $item->quantity;
        }

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Produk dalam keranjang tidak tersedia.');
        }

        $totalWeight = max(1, $totalWeight);

        return view('checkout.index', compact(
            'cart',
            'totalWeight'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | MEMPROSES CHECKOUT
    |--------------------------------------------------------------------------
    */
    public function process(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // VALIDASI DATA CHECKOUT
        $validated = $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',

            'destination_id' => 'required|integer',
            'destination_name' => 'required|string|max:255',

            'metode_pengiriman' => 'required|string|max:255',
            'kurir' => 'required|in:jne,jnt,sicepat',
            'layanan_kurir' => 'required|string|max:100',
            'estimasi_pengiriman' => 'nullable|string|max:100',

            'metode_pembayaran' => 'required|in:gopay,shopeepay,dana,ovo,bca_va,bni_va,bri_va',
        ]);

        $userId = auth()->id();
        $userEmail = auth()->user()->email;

        // Mengambil ID produk yang dipilih
        $selectedIds = session()->get('checkout_product_ids', []);

        if (empty($selectedIds)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Silakan pilih produk yang ingin dibeli.');
        }

        // Mengambil data keranjang dari database
        $cartItems = CartItem::with('product')
            ->where('user_id', $userId)
            ->whereIn('id', $selectedIds)
            ->get();

        if ($cartItems->count() !== count($selectedIds)) {
            session()->forget('checkout_product_ids');

            return redirect()
                ->route('cart.index')
                ->with('error', 'Produk yang dipilih tidak ditemukan di keranjang.');
        }

        // Mengubah data database menjadi format array checkout
        $cart = [];

        foreach ($cartItems as $item) {
            if (!$item->product) {
                continue;
            }

            $product = $item->product;

            $cart[$item->id] = [
                'product_id' => $product->id,
                'nama' => $product->nama,
                'harga' => $product->harga,
                'gambar' => $product->gambar,
                'kategori' => $product->kategori,
                'ukuran' => $item->ukuran,
                'warna' => $item->warna,
                'quantity' => $item->quantity,
            ];
        }

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Tidak ada produk yang dipilih.');
        }


        /*
        |--------------------------------------------------------------------------
        | MENGHITUNG BERAT PRODUK
        |--------------------------------------------------------------------------
        */
        $totalWeight = 0;

        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);

            if (!$product) {
                return redirect()
                    ->route('cart.index')
                    ->with('error', 'Produk dalam keranjang tidak ditemukan.');
            }

            $quantity = (int) $item['quantity'];

            if ($quantity < 1) {
                return back()
                    ->withInput()
                    ->with('error', 'Jumlah produk tidak valid.');
            }

            $totalWeight += (int) ($product->berat ?? 500) * $quantity;
        }

        $totalWeight = max(1, $totalWeight);


        /*
        |--------------------------------------------------------------------------
        | MEMERIKSA KONFIGURASI RAJAONGKIR
        |--------------------------------------------------------------------------
        */
        $apiKey = config('services.rajaongkir.api_key');
        $baseUrl = config('services.rajaongkir.base_url');

        if (!$apiKey || !$baseUrl) {
            return back()
                ->withInput()
                ->with('error', 'Konfigurasi RajaOngkir belum tersedia.');
        }


        /*
        |--------------------------------------------------------------------------
        | MEMERIKSA ONGKOS KIRIM DARI RAJAONGKIR
        |--------------------------------------------------------------------------
        */
        try {
            $allServices = [];

            foreach (['lowest', 'highest'] as $priceType) {
                $response = Http::timeout(30)
                    ->asForm()
                    ->withHeaders([
                        'key' => $apiKey,
                    ])
                    ->post($baseUrl . '/calculate/domestic-cost', [
                        'origin' => 31590,
                        'destination' => $validated['destination_id'],
                        'weight' => $totalWeight,
                        'courier' => 'jne:jnt:sicepat',
                        'price' => $priceType,
                    ]);

                if (!$response->successful()) {
                    return back()
                        ->withInput()
                        ->with('error', 'Gagal memeriksa ongkos kirim. Silakan coba kembali.');
                }

                $services = $response->json('data') ?? [];

                foreach ($services as $service) {
                    $key = ($service['code'] ?? '') . '-' .
                        ($service['service'] ?? '');

                    $allServices[$key] = $service;
                }
            }

            // Mencari layanan pengiriman yang dipilih
            $selectedService = collect(array_values($allServices))->first(
                function ($service) use ($validated) {
                    return
                        ($service['code'] ?? '') === $validated['kurir']
                        &&
                        ($service['service'] ?? '') === $validated['layanan_kurir'];
                }
            );

            if (!$selectedService) {
                return back()
                    ->withInput()
                    ->with('error', 'Layanan pengiriman yang dipilih sudah tidak tersedia. Silakan pilih layanan lain.');
            }

            // Mengambil ongkir dari API
            $ongkir = (int) $selectedService['cost'];

            $namaKurir = $selectedService['name']
                ?? $validated['metode_pengiriman'];

            $layananKurir = $selectedService['service'];

            $estimasiPengiriman = $selectedService['etd'] ?? '';

        } catch (Throwable $e) {
            report($e);

            return back()
                ->withInput()
                ->with('error', 'Tidak dapat terhubung ke layanan RajaOngkir. Silakan coba beberapa saat lagi.');
        }


        /*
        |--------------------------------------------------------------------------
        | DATA PEMBAYARAN
        |--------------------------------------------------------------------------
        */
        $metodePembayaran = $validated['metode_pembayaran'];


        /*
        |--------------------------------------------------------------------------
        | MEMBUAT PESANAN DAN MENGURANGI STOK
        |--------------------------------------------------------------------------
        */
        try {
            $order = DB::transaction(function () use (
                $validated,
                $cart,
                $ongkir,
                $metodePembayaran,
                $namaKurir,
                $layananKurir,
                $estimasiPengiriman,
                $totalWeight,
                $userId
            ) {
                $totalProduk = 0;
                $weightCheck = 0;
                $detailPesanan = [];

                $productQuantities = [];
                $lockedProducts = [];

                foreach ($cart as $cartKey => $item) {
                    $productId = (int) $item['product_id'];

                    // Mengunci produk dari database
                    if (!isset($lockedProducts[$productId])) {
                        $lockedProducts[$productId] = Product::whereKey($productId)
                            ->lockForUpdate()
                            ->firstOrFail();
                    }

                    $product = $lockedProducts[$productId];

                    $quantity = (int) $item['quantity'];

                    if ($quantity < 1) {
                        throw ValidationException::withMessages([
                            'quantity' => 'Jumlah produk tidak valid.',
                        ]);
                    }

                    // Menggabungkan jumlah produk dengan ukuran berbeda
                    $productQuantities[$productId] =
                        ($productQuantities[$productId] ?? 0) + $quantity;

                    $harga = (int) $product->harga;

                    $subtotal = $harga * $quantity;

                    $totalProduk += $subtotal;

                    $weightCheck += (int) ($product->berat ?? 500) * $quantity;

                    $detailPesanan[] = [
                        'product' => $product,
                        'quantity' => $quantity,
                        'harga' => $harga,
                        'subtotal' => $subtotal,
                    ];
                }

                // Memeriksa stok berdasarkan total produk
                foreach ($productQuantities as $productId => $requestedQuantity) {
                    $product = $lockedProducts[$productId];

                    if ($product->stok < $requestedQuantity) {
                        throw ValidationException::withMessages([
                            'stock' => 'Stok produk "' . $product->nama . '" tidak mencukupi.',
                        ]);
                    }
                }

                // Memastikan berat tidak berubah
                if (max(1, $weightCheck) !== $totalWeight) {
                    throw ValidationException::withMessages([
                        'shipping' => 'Berat produk berubah. Silakan ulangi proses checkout.',
                    ]);
                }

                $totalPembayaran = $totalProduk + $ongkir;


                /*
                |--------------------------------------------------------------------------
                | MENYIMPAN DATA PESANAN
                |--------------------------------------------------------------------------
                */
                $order = Order::create([
                    'user_id' => $userId,

                    'nama_penerima' => $validated['nama_penerima'],
                    'no_hp' => $validated['no_hp'],
                    'alamat' => $validated['alamat'],

                    'destination_id' => $validated['destination_id'],
                    'destination_name' => $validated['destination_name'],

                    'kurir' => $validated['kurir'],
                    'layanan_kurir' => $layananKurir,
                    'estimasi_pengiriman' => $estimasiPengiriman,

                    'metode_pengiriman' => $namaKurir . ' - ' . $layananKurir,

                    'metode_pembayaran' => $metodePembayaran,

                    'ongkir' => $ongkir,
                    'total_harga' => $totalPembayaran,

                    'status' => 'Menunggu',
                    'payment_status' => 'pending',
                ]);


                /*
                |--------------------------------------------------------------------------
                | MENYIMPAN DETAIL PESANAN
                |--------------------------------------------------------------------------
                */
                foreach ($detailPesanan as $detail) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $detail['product']->id,
                        'jumlah' => $detail['quantity'],
                        'harga' => $detail['harga'],
                        'subtotal' => $detail['subtotal'],
                    ]);
                }


                /*
                |--------------------------------------------------------------------------
                | MENGURANGI STOK PRODUK
                |--------------------------------------------------------------------------
                */
                foreach ($productQuantities as $productId => $quantity) {
                    Product::whereKey($productId)
                        ->decrement('stok', $quantity);
                }

                return $order;
            });

        } catch (Throwable $e) {
            report($e);

            if ($e instanceof ValidationException) {
                throw $e;
            }

            return redirect()
                ->route('cart.index')
                ->with('error', 'Pesanan gagal dibuat. Silakan periksa kembali keranjang dan stok produk.');
        }


        /*
        |--------------------------------------------------------------------------
        | MENGHUBUNGKAN PESANAN DENGAN MIDTRANS
        |--------------------------------------------------------------------------
        */
        try {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = (bool) config('midtrans.is_production');
            Config::$isSanitized = (bool) config('midtrans.is_sanitized');
            Config::$is3ds = (bool) config('midtrans.is_3ds');

            Config::$overrideNotifUrl =
                'https://URL-NGROK-BARU-KAMU/midtrans/notification';


            // Mengambil detail produk pesanan
            $order->load('items.product');

            $itemDetails = [];

            foreach ($order->items as $item) {
                $itemDetails[] = [
                    'id' => $item->product_id,
                    'price' => (int) $item->harga,
                    'quantity' => (int) $item->jumlah,
                    'name' => substr(
                        $item->product->nama ?? 'Produk WEARLY',
                        0,
                        50
                    ),
                ];
            }


            // Menambahkan ongkir ke detail pembayaran
            if ($order->ongkir > 0) {
                $itemDetails[] = [
                    'id' => 'ONGKIR',
                    'price' => (int) $order->ongkir,
                    'quantity' => 1,
                    'name' => 'Ongkos Pengiriman',
                ];
            }


            // Parameter Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => 'WEARLY-' . $order->id,
                    'gross_amount' => (int) $order->total_harga,
                ],

                'customer_details' => [
                    'first_name' => $order->nama_penerima,
                    'email' => $userEmail,
                    'phone' => $order->no_hp,
                ],

                'item_details' => $itemDetails,

                'enabled_payments' => [$metodePembayaran],

                'callbacks' => [
                    'finish' => route('success', ['order' => $order->id]),
                    'unfinish' => route('success', ['order' => $order->id]),
                    'error' => route('success', ['order' => $order->id]),
                ],
            ];


            // Membuat transaksi Midtrans
            $snapResponse = Snap::createTransaction($params);

            $order->update([
                'snap_token' => $snapResponse->token,
                'payment_url' => $snapResponse->redirect_url,
            ]);


            /*
            |--------------------------------------------------------------------------
            | MENGHAPUS PRODUK YANG SUDAH DIPROSES DARI KERANJANG
            |--------------------------------------------------------------------------
            */
            CartItem::where('user_id', $userId)
                ->whereIn('id', $selectedIds)
                ->delete();

            session()->forget('checkout_product_ids');

            return redirect()->away($order->payment_url);

        } catch (Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | MENGEMBALIKAN STOK JIKA PEMBAYARAN GAGAL DIBUAT
            |--------------------------------------------------------------------------
            */
            DB::transaction(function () use ($order) {
                $lockedOrder = Order::whereKey($order->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if (!$lockedOrder->stock_released) {
                    $lockedOrder->load('items');

                    foreach ($lockedOrder->items as $item) {
                        Product::whereKey($item->product_id)
                            ->lockForUpdate()
                            ->increment('stok', $item->jumlah);
                    }

                    $lockedOrder->stock_released = true;
                    $lockedOrder->payment_status = 'error';
                    $lockedOrder->save();
                }
            });

            report($e);

            return redirect()
                ->route('checkout.index')
                ->with(
                    'error',
                    'Gagal menghubungkan pembayaran ke Midtrans. Silakan coba kembali.'
                );
        }
    }
}
