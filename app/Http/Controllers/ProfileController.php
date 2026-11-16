<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // Menampilkan halaman dashboard akun pengguna
    public function index()
    {
        $user = auth()->user();

        $ordersQuery = Order::where('user_id', $user->id);

        // Statistik pesanan
        $totalOrders = (clone $ordersQuery)->count();

        $pendingOrders = (clone $ordersQuery)
            ->where('payment_status', 'pending')
            ->count();

        $processingOrders = (clone $ordersQuery)
            ->whereIn('status', ['Diproses', 'Dikirim'])
            ->count();

        $completedOrders = (clone $ordersQuery)
            ->where('status', 'Selesai')
            ->count();

        // Total belanja dari transaksi yang berhasil dibayar
        $totalSpent = (clone $ordersQuery)
            ->whereIn('payment_status', [
                'settlement',
                'capture',
                'success'
            ])
            ->sum('total_harga');

        // Lima pesanan terbaru beserta produk dan gambarnya
        $recentOrders = Order::with('items.product')
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('profile', compact(
            'user',
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'totalSpent',
            'recentOrders'
        ));
    }

    // Menyimpan perubahan profil pengguna
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'alamat' => ['nullable', 'string', 'max:1000'],
            'foto_profil' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah digunakan akun lain.',
            'foto_profil.image' => 'File harus berupa gambar.',
            'foto_profil.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;

        if ($request->hasFile('foto_profil')) {
            if ($user->foto_profil) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            $user->foto_profil = $request->file('foto_profil')
                ->store('profile-photos', 'public');
        }

        $user->save();

        return redirect()
            ->route('user.profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}
