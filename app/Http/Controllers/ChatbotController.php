<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = Str::lower(trim($request->message));
        $cleanMessage = $this->normalize($message);

        // Mengambil produk yang masih tersedia
        $products = Product::where('stok', '>', 0)->get();

        /*
         * Mengingat konteks percakapan.
         * Contoh:
         * Bot: Sedang mencari outfit untuk aktivitas apa?
         * User: Kuliah
         * Bot: Menganggapnya sebagai pencarian outfit kuliah.
         */
        if (session('chatbot.pending') === 'activity') {
            if (preg_match('/^(kuliah|kampus|kerja|kantor|santai|jalan|hangout|sehari-hari)$/i', trim($cleanMessage))) {
                $cleanMessage = 'outfit untuk ' . $cleanMessage;
                $message = $cleanMessage;
                session()->forget('chatbot.pending');
            }
        }

        $budget = $this->detectBudget($message);
        $intent = $this->detectIntent($cleanMessage);

        // Rekomendasi dan pencarian produk
        if (in_array($intent, ['recommend', 'search'])) {
            $result = $this->findProducts(
                $products,
                $cleanMessage,
                $budget
            );

            return response()->json([
                'reply' => $this->productReply(
                    $result,
                    $budget,
                    $intent
                )
            ]);
        }

        // Informasi harga
        if ($intent === 'price') {
            return response()->json([
                'reply' => $this->priceReply($products)
            ]);
        }

        // Informasi stok
        if ($intent === 'stock') {
            return response()->json([
                'reply' => $this->stockReply($products)
            ]);
        }

        // Cara checkout
        if ($intent === 'shopping') {
            return response()->json([
                'reply' => $this->shoppingReply()
            ]);
        }

        // Informasi pembayaran
        if ($intent === 'payment') {
            return response()->json([
                'reply' => $this->paymentReply()
            ]);
        }

        // Informasi pengiriman
        if ($intent === 'shipping') {
            return response()->json([
                'reply' => $this->shippingReply()
            ]);
        }

        // Status pesanan
        if ($intent === 'order_status') {
            return response()->json([
                'reply' => $this->orderStatusReply()
            ]);
        }

        // Sapaan
        if ($intent === 'greeting') {
            session()->put('chatbot.pending', 'activity');

            return response()->json([
                'reply' => $this->randomReply([
                    'Halo! 👋 Selamat datang di WEARLY. Kamu sedang mencari outfit untuk aktivitas apa hari ini?',
                    'Hai! Senang kamu berkunjung ke WEARLY 😊 Lagi ingin mencari pakaian atau butuh rekomendasi outfit?',
                    'Halo! 👋 Aku WEARLY Assistant. Mau cari produk, cek harga, atau mencari outfit yang cocok untukmu?'
                ])
            ]);
        }

        // Ucapan terima kasih
        if ($intent === 'thanks') {
            return response()->json([
                'reply' => $this->randomReply([
                    'Sama-sama! Senang bisa membantu kamu 😊',
                    'Dengan senang hati! Semoga kamu menemukan outfit favorit di WEARLY ❤️',
                    'Sama-sama! Kalau masih ada yang ingin ditanyakan, aku siap membantu.'
                ])
            ]);
        }

        // Sapaan perpisahan
        if ($intent === 'goodbye') {
            session()->forget('chatbot.pending');

            return response()->json([
                'reply' => 'Terima kasih sudah berkunjung ke WEARLY! Semoga belanjanya menyenangkan. Sampai jumpa lagi 👋'
            ]);
        }

        // Jawaban umum
        return response()->json([
            'reply' => 'Aku siap membantu kamu berbelanja di WEARLY 😊

Kamu bisa menanyakan beberapa hal berikut:

1. Rekomendasi outfit untuk kuliah.
2. Produk dengan harga di bawah Rp100.000.
3. Cara checkout dan melakukan pembayaran.
4. Informasi pengiriman.
5. Cara mengecek status pesanan.

Ada yang ingin kamu tanyakan?'
        ]);
    }

    // Membersihkan dan menyamakan kata
    private function normalize($message)
    {
        $message = Str::lower(trim($message));

        $replacements = [
            'bajuu' => 'baju',
            'celanaa' => 'celana',
            'murmer' => 'murah',
            'mahalan' => 'mahal',
            'ngampus' => 'kuliah',
            'kampus' => 'kuliah',
            'pengen' => 'ingin',
            'pingin' => 'ingin',
            'cariin' => 'cari',
            'carikan' => 'cari',
            'gimana' => 'bagaimana',
            'gmn' => 'bagaimana',
            'checkout' => 'checkout',
        ];

        foreach ($replacements as $old => $new) {
            $message = preg_replace(
                '/\b' . preg_quote($old, '/') . '\b/u',
                $new,
                $message
            );
        }

        // Menghapus kata tambahan yang tidak terlalu berpengaruh
        $message = preg_replace(
            '/\b(dong|nih|ya|yuk|deh|sih)\b/u',
            '',
            $message
        );

        return trim(preg_replace('/\s+/', ' ', $message));
    }

    // Mengenali maksud pertanyaan
    private function detectIntent($message)
    {
        // Informasi checkout dan belanja
        if (preg_match('/cara (belanja|membeli|pesan|checkout)|bagaimana (cara )?(belanja|pesan|checkout)|proses checkout|langkah checkout/u', $message)) {
            return 'shopping';
        }

        // Informasi pembayaran
        if (preg_match('/pembayaran|metode bayar|cara bayar|bagaimana bayar|transfer|midtrans|bayar pesanan/u', $message)) {
            return 'payment';
        }

        // Informasi pengiriman
        if (preg_match('/pengiriman|ongkir|ongkos kirim|kurir|ekspedisi|berapa lama sampai|lama pengiriman|biaya kirim/u', $message)) {
            return 'shipping';
        }

        // Status pesanan
        if (preg_match('/status pesanan|cek pesanan|cek order|pesanan saya|pesanan sudah|pesanan sampai|lacak pesanan|tracking pesanan/u', $message)) {
            return 'order_status';
        }

        // Informasi stok
        if (preg_match('/stok|persediaan|masih tersedia|masih ada|kehabisan|tersedia tidak/u', $message)) {
            return 'stock';
        }

        // Informasi harga
        if (preg_match('/harga|berapa rupiah|berapa harganya|daftar harga|produk termurah|produk termahal/u', $message)) {
            return 'price';
        }

        // Rekomendasi outfit
        if (preg_match('/rekomendasi|sarankan|cocok|outfit|padukan|fashion|kuliah|kerja|kantor|hangout|santai/u', $message)) {
            return 'recommend';
        }

        // Pencarian produk
        if (preg_match('/cari|produk|baju|celana|atasan|pakaian|hoodie|shirt|t-shirt|tas|kaos|kemeja|sweater|jaket/u', $message)) {
            return 'search';
        }

        // Ucapan terima kasih
        if (preg_match('/terima kasih|makasih|thanks|thank you/u', $message)) {
            return 'thanks';
        }

        // Sapaan perpisahan
        if (preg_match('/dadah|sampai jumpa|bye|selamat tinggal/u', $message)) {
            return 'goodbye';
        }

        // Sapaan saja, bukan kalimat yang memiliki kebutuhan lain
        if (preg_match('/^(halo|hai|hello|hi|selamat pagi|selamat siang|selamat sore|selamat malam)[!. ]*$/u', $message)) {
            return 'greeting';
        }

        return 'general';
    }

    // Mengenali budget pelanggan
    private function detectBudget($message)
    {
        $message = Str::lower($message);

        if (preg_match('/(?:di bawah|dibawah|kurang dari|maksimal|max|budget|sekitar)\s*(?:rp\.?\s*)?([\d.,]+)\s*(ribu|rb|juta|jt)?/u', $message, $matches)) {

            $number = str_replace(',', '.', $matches[1]);
            $amount = (float) $number;
            $unit = $matches[2] ?? '';

            if (in_array($unit, ['ribu', 'rb'])) {
                $amount *= 1000;
            } elseif (in_array($unit, ['juta', 'jt'])) {
                $amount *= 1000000;
            } elseif ($amount < 1000 && str_contains($matches[1], '.')) {
                $amount *= 1000;
            }

            return (int) $amount;
        }

        if (preg_match('/rp\.?\s*([\d.]+)/u', $message, $matches)) {
            return (int) str_replace('.', '', $matches[1]);
        }

        return null;
    }

    // Mencari produk berdasarkan kata kunci, kategori, dan budget
    private function findProducts($products, $message, $budget)
    {
        $stopwords = [
            'aku', 'saya', 'mau', 'ingin', 'cari',
            'untuk', 'yang', 'ada', 'tolong', 'rekomendasi',
            'produk', 'harga', 'di', 'bawah', 'atas',
            'sekitar', 'budget', 'maksimal', 'berapa',
            'buat', 'dengan', 'dan', 'atau', 'paling',
            'murah', 'mahal', 'fashion', 'outfit',
            'pakai', 'dipakai', 'cocok', 'carikan'
        ];

        $keywords = collect(explode(' ', $message))
            ->filter(function ($word) use ($stopwords) {
                return mb_strlen($word) >= 3 &&
                    !in_array($word, $stopwords);
            })
            ->values();

        // Padanan kata untuk kategori produk
        $categoryAliases = [
            't-shirt' => ['kaos', 'tshirt', 'tee', 't-shirt'],
            'shirt' => ['kemeja', 'shirt'],
            'pants' => ['celana', 'pants', 'jeans'],
            'hoodie' => ['hoodie', 'sweater', 'jaket'],
            'bags' => ['tas', 'bag'],
        ];

        $matchedCategories = [];

        foreach ($categoryAliases as $category => $aliases) {
            foreach ($aliases as $alias) {
                if (preg_match('/\b' . preg_quote($alias, '/') . '\b/u', $message)) {
                    $matchedCategories[] = $category;
                    break;
                }
            }
        }

        // Jika mencari outfit atau pakaian untuk aktivitas,
        // prioritaskan kategori pakaian, bukan tas.
        $outfitRequest = preg_match(
            '/outfit|kuliah|kerja|kantor|hangout|santai|sehari-hari|baju/u',
            $message
        );

        if ($outfitRequest && empty($matchedCategories)) {
            $matchedCategories = ['t-shirt', 'shirt', 'pants', 'hoodie'];
        }

        $ranked = $products->map(function ($product) use (
            $keywords,
            $matchedCategories,
            $budget
        ) {
            $searchable = Str::lower(
                $product->nama . ' ' .
                $product->kategori . ' ' .
                ($product->deskripsi ?? '')
            );

            $score = 0;

            // Kecocokan kata dengan nama dan deskripsi produk
            foreach ($keywords as $keyword) {
                if (Str::contains($searchable, $keyword)) {
                    $score += 3;
                }
            }

            // Kecocokan kategori
            $category = Str::lower($product->kategori);

            $categoryMap = [
                't-shirt' => ['t-shirt', 't shirt', 'kaos', 'tee'],
                'shirt' => ['shirt', 'kemeja'],
                'pants' => ['pants', 'celana', 'jeans'],
                'hoodie' => ['hoodie', 'sweater', 'jaket'],
                'bags' => ['bag', 'tas'],
            ];

            foreach ($matchedCategories as $matchedCategory) {
                foreach ($categoryMap[$matchedCategory] ?? [] as $alias) {
                    if (Str::contains($category, $alias)) {
                        $score += 8;
                        break;
                    }
                }
            }

            // Produk yang sesuai budget mendapat prioritas
            if ($budget !== null && $product->harga <= $budget) {
                $score += 4;
            }

            return [
                'product' => $product,
                'score' => $score,
            ];
        });

        // Jika ada budget, produk di atas budget tidak ditampilkan
        if ($budget !== null) {
            $ranked = $ranked->filter(function ($item) use ($budget) {
                return $item['product']->harga <= $budget;
            });
        }

        // Jangan tampilkan produk yang tidak memiliki kecocokan
        return $ranked
            ->filter(function ($item) {
                return $item['score'] > 0;
            })
            ->sortByDesc('score')
            ->take(5)
            ->pluck('product')
            ->values();
    }

    // Menyusun jawaban rekomendasi produk
    private function productReply($products, $budget, $intent)
    {
        if ($products->isEmpty()) {
            if ($budget !== null) {
                return 'Aku belum menemukan produk yang sesuai dengan budget Rp' .
                    number_format($budget, 0, ',', '.') . '.

Kamu bisa mencoba:
1. Menaikkan sedikit budget.
2. Mencari kategori produk lain.
3. Melihat pilihan produk lainnya di katalog WEARLY 😊';
            }

            return 'Maaf, aku belum menemukan produk yang cocok dari kata kunci tersebut.

Coba sebutkan jenis produk yang kamu cari, misalnya:
1. Kaos atau kemeja.
2. Celana atau hoodie.
3. Tas.

Aku akan bantu mencarikan produk yang tersedia 😊';
        }

        $opening = $this->randomReply([
            'Aku punya beberapa pilihan yang mungkin cocok buat kamu! ✨',
            'Boleh banget! Coba lihat beberapa produk WEARLY ini, ya 😊',
            'Aku sudah menemukan beberapa pilihan dari katalog WEARLY!',
            'Ini beberapa produk yang bisa kamu pertimbangkan ❤️'
        ]);

        if ($budget !== null) {
            $opening .= "\n\nAku pilihkan produk dengan harga maksimal Rp" .
                number_format($budget, 0, ',', '.') . '.';
        }

        $list = $products->map(function ($product, $index) {
            return ($index + 1) . '. ' . $product->nama .
                "\n   Harga: Rp" .
                number_format($product->harga, 0, ',', '.') .
                "\n   Stok: " . $product->stok;
        })->implode("\n\n");

        return $opening . "\n\n" . $list .
            "\n\nAda produk yang menarik perhatianmu? Aku bisa bantu memberikan informasi lebih lanjut 😊";
    }

    // Jawaban informasi harga
    private function priceReply($products)
    {
        if ($products->isEmpty()) {
            return 'Saat ini belum ada produk yang tersedia di katalog WEARLY.';
        }

        $cheapest = $products->sortBy('harga')->first();
        $mostExpensive = $products->sortByDesc('harga')->first();

        return 'Berikut informasi harga produk di WEARLY 😊

1. Produk termurah
   Nama: ' . $cheapest->nama . '
   Harga: Rp' . number_format($cheapest->harga, 0, ',', '.') . '

2. Produk termahal
   Nama: ' . $mostExpensive->nama . '
   Harga: Rp' . number_format($mostExpensive->harga, 0, ',', '.') . '

Kalau kamu memiliki budget tertentu, sebutkan saja nominalnya. Aku bisa bantu mencarikan produk yang sesuai!';
    }

    // Jawaban informasi stok
    private function stockReply($products)
    {
        if ($products->isEmpty()) {
            return 'Saat ini belum ada produk dengan stok tersedia di WEARLY. Silakan cek kembali nanti, ya 😊';
        }

        return 'Berikut informasi ketersediaan produk di WEARLY 😊

Saat ini terdapat ' . $products->count() . ' produk yang memiliki stok tersedia.

Untuk mengecek stok produk tertentu, kamu bisa menyebutkan nama produknya.

Contoh: "Apakah Classic Hoodie masih tersedia?"';
    }

    // Jawaban cara checkout
    private function shoppingReply()
    {
        return 'Tentu! Berikut cara melakukan checkout di WEARLY 🛍️

1. Pilih produk
   Buka katalog WEARLY, lalu pilih produk yang ingin kamu beli.

2. Tentukan ukuran dan jumlah
   Jika produk memiliki pilihan ukuran, pilih ukuran yang sesuai. Setelah itu, tentukan jumlah produk.

3. Masukkan ke keranjang
   Klik tombol "Tambah ke Keranjang".

4. Buka keranjang
   Periksa kembali produk, ukuran, jumlah, dan total belanja kamu.

5. Lanjutkan ke checkout
   Klik tombol "Lanjut ke Checkout".

6. Isi informasi pengiriman
   Masukkan nama penerima, nomor HP, serta alamat tujuan pengiriman.

7. Pilih metode pengiriman
   Tentukan layanan pengiriman yang tersedia sesuai kebutuhanmu.

8. Lakukan pembayaran
   Periksa ringkasan pesanan, kemudian lanjutkan pembayaran melalui pilihan yang tersedia.

Pastikan semua informasi sudah benar sebelum menyelesaikan pesanan, ya 😊';
    }

    // Jawaban informasi pembayaran
    private function paymentReply()
    {
        return 'Berikut cara melakukan pembayaran pesanan di WEARLY 💳

1. Masukkan produk yang ingin dibeli ke keranjang.
2. Lanjutkan ke halaman checkout.
3. Lengkapi informasi penerima dan alamat pengiriman.
4. Periksa total belanja beserta biaya pengiriman.
5. Lanjutkan ke halaman pembayaran.
6. Pilih metode pembayaran yang tersedia pada halaman pembayaran.
7. Ikuti instruksi sampai proses pembayaran selesai.

Pembayaran diproses melalui halaman pembayaran yang disediakan oleh WEARLY.

Pastikan kamu menyelesaikan pembayaran sesuai instruksi agar pesanan dapat diproses 😊';
    }

    // Jawaban informasi pengiriman
    private function shippingReply()
    {
        return 'Berikut informasi pengiriman pesanan WEARLY 📦

1. Isi alamat penerima
   Masukkan nama, nomor HP, dan alamat tujuan dengan lengkap.

2. Tentukan lokasi
   Pilih wilayah tujuan pengiriman sesuai alamat penerima.

3. Pilih layanan pengiriman
   Kamu dapat memilih layanan yang tersedia, seperti:
   - Hemat: untuk pengiriman yang lebih ekonomis.
   - Cepat: untuk pengiriman dengan estimasi lebih singkat.
   - Express: untuk kebutuhan pengiriman yang lebih cepat.

4. Periksa biaya pengiriman
   Biaya pengiriman akan disesuaikan dengan tujuan dan layanan yang dipilih.

5. Selesaikan checkout
   Periksa kembali alamat dan pilihan pengiriman sebelum membuat pesanan.

Pastikan nomor HP dan alamat tujuan sudah benar agar paket dapat diterima dengan baik 😊';
    }

    // Jawaban informasi status pesanan
    private function orderStatusReply()
    {
        return 'Untuk mengetahui status pesanan WEARLY, kamu bisa melakukan langkah berikut:

1. Login menggunakan akun WEARLY yang digunakan saat berbelanja.
2. Buka bagian pesanan atau riwayat pesanan jika tersedia pada akunmu.
3. Pilih pesanan yang ingin diperiksa.
4. Perhatikan status pesanan yang ditampilkan.

Status pesanan dapat menunjukkan tahapan seperti menunggu pembayaran, diproses, dikirim, atau selesai.

Jika status pesanan belum berubah atau kamu mengalami kendala, silakan hubungi admin WEARLY dengan menyertakan nomor pesanan 😊';
    }

    // Variasi jawaban
    private function randomReply($responses)
    {
        return $responses[array_rand($responses)];
    }
}
