<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'nama_penerima',
        'no_hp',
        'alamat',

        // Data RajaOngkir
        'destination_id',
        'destination_name',
        'kurir',
        'layanan_kurir',
        'estimasi_pengiriman',

        // Data pengiriman dan pembayaran
        'metode_pengiriman',
        'ongkir',
        'total_harga',
        'status',
        'payment_status',
        'snap_token',
        'payment_url',
        'metode_pembayaran',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}