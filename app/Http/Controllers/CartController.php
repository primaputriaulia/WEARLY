<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;

class CartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MEMINDAHKAN KERANJANG SESSION LAMA KE DATABASE
    |--------------------------------------------------------------------------
    */
    private function syncSessionCart()
    {
        $oldCart = session()->get('cart', []);

        if (empty($oldCart)) {
            return;
        }

        foreach ($oldCart as $item) {
            $product = Product::find($item['product_id'] ?? null);

            if (!$product) {
                continue;
            }

            $ukuran = $item['ukuran'] ?? null;
            $warna = $item['warna'] ?? null;
            $quantity = max(1, (int) ($item['quantity'] ?? 1));

            $cartItem = CartItem::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->when(
                    $ukuran === null,
                    fn ($query) => $query->whereNull('ukuran'),
                    fn ($query) => $query->where('ukuran', $ukuran)
                )
                ->when(
                    $warna === null,
                    fn ($query) => $query->whereNull('warna'),
                    fn ($query) => $query->where('warna', $warna)
                )
                ->first();

            $currentQuantity = $cartItem ? $cartItem->quantity : 0;

            // Memastikan jumlah tidak melebihi stok
            $availableStock = max(0, $product->stok - $currentQuantity);
            $quantityToAdd = min($quantity, $availableStock);

            if ($quantityToAdd <= 0) {
                continue;
            }

            if ($cartItem) {
                $cartItem->increment('quantity', $quantityToAdd);
            } else {
                CartItem::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                    'ukuran' => $ukuran,
                    'warna' => $warna,
                    'quantity' => $quantityToAdd,
                ]);
            }
        }

        // Session lama dihapus setelah dipindahkan
        session()->forget('cart');
    }


    /*
    |--------------------------------------------------------------------------
    | MENAMPILKAN KERANJANG
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $this->syncSessionCart();

        $cartItems = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        $cart = [];

        foreach ($cartItems as $item) {
            if (!$item->product) {
                continue;
            }

            $product = $item->product;

            // Format tetap disesuaikan dengan halaman cart.index
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

        return view('cart.index', compact('cart'));
    }


    /*
    |--------------------------------------------------------------------------
    | MENAMBAHKAN PRODUK KE KERANJANG
    |--------------------------------------------------------------------------
    */
    public function add(Request $request, Product $product)
    {
        $this->syncSessionCart();

        $validated = $request->validate([
            'ukuran' => 'nullable|string|max:20',
            'warna' => 'nullable|string|max:30',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $ukuran = $validated['ukuran'] ?? null;
        $warna = $validated['warna'] ?? null;
        $quantity = (int) ($validated['quantity'] ?? 1);

        // Mencari item dengan produk, ukuran, dan warna yang sama
        $cartItem = CartItem::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->when(
                $ukuran === null,
                fn ($query) => $query->whereNull('ukuran'),
                fn ($query) => $query->where('ukuran', $ukuran)
            )
            ->when(
                $warna === null,
                fn ($query) => $query->whereNull('warna'),
                fn ($query) => $query->where('warna', $warna)
            )
            ->first();

        $currentQuantity = $cartItem ? $cartItem->quantity : 0;

        // Menghitung seluruh jumlah produk yang sama di keranjang
        $totalProductQuantity = CartItem::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->sum('quantity');

        $newTotalQuantity = $totalProductQuantity + $quantity;

        // Memeriksa stok
        if ($newTotalQuantity > $product->stok) {
            $message = 'Stok ' . $product->nama .
                ' tidak mencukupi. Stok tersedia: ' . $product->stok;

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                ], 422);
            }

            return redirect()->back()->with('error', $message);
        }

        // Menyimpan atau memperbarui keranjang database
        if ($cartItem) {
            $cartItem->increment('quantity', $quantity);
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'ukuran' => $ukuran,
                'warna' => $warna,
                'quantity' => $quantity,
            ]);
        }

        // Menghitung total item keranjang pengguna
        $cartCount = CartItem::where('user_id', auth()->id())
            ->sum('quantity');

        $message = 'Produk berhasil ditambahkan ke keranjang!';

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'cart_count' => $cartCount,
            ]);
        }

        return redirect()->back()->with('success', $message);
    }


    /*
    |--------------------------------------------------------------------------
    | MENGHAPUS PRODUK DARI KERANJANG
    |--------------------------------------------------------------------------
    */
    public function remove($id)
    {
        CartItem::where('id', $id)
            ->where('user_id', auth()->id())
            ->delete();

        return redirect()
            ->route('cart.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang.');
    }


    /*
    |--------------------------------------------------------------------------
    | MENAMBAH JUMLAH PRODUK
    |--------------------------------------------------------------------------
    */
    public function increase($id)
    {
        $cartItem = CartItem::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$cartItem) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Produk tidak ditemukan di keranjang.');
        }

        $product = Product::find($cartItem->product_id);

        if (!$product) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Produk tidak ditemukan.');
        }

        // Memeriksa seluruh jumlah produk yang sama,
        // termasuk apabila ukuran atau warnanya berbeda
        $totalProductQuantity = CartItem::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->sum('quantity');

        if ($totalProductQuantity >= $product->stok) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Jumlah melebihi stok produk yang tersedia.');
        }

        $cartItem->increment('quantity');

        return redirect()->route('cart.index');
    }


    /*
    |--------------------------------------------------------------------------
    | MENGURANGI JUMLAH PRODUK
    |--------------------------------------------------------------------------
    */
    public function decrease($id)
    {
        $cartItem = CartItem::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$cartItem) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Produk tidak ditemukan di keranjang.');
        }

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        } else {
            $cartItem->delete();
        }

        return redirect()->route('cart.index');
    }
}
