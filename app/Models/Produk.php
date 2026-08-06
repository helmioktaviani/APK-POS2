<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'user_id',
        'foto',
        'nama',
        'harga_beli',
        'harga_jual',
        'stok'
    ];

    // TENTU KAN FITUR OTOMATIS SAAT PRODUK DIHAPUS
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($produk) {
            // Otomatis menghapus semua data transaksi produk ini di tabel item_penjualan sebelum produknya hilang
            $produk->itemPenjualan()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function itemPenjualan()
    {
        return $this->hasMany(ItemPenjualan::class, 'produk_id');
    }
}
