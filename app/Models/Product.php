<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'stok',
        'berat',
        'deskripsi',
        'gambar',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems()
{
    return $this->hasMany(CartItem::class);
}
}
