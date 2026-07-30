<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'user_id',
        'total_pembayaran',
        'metode_pembayaran',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(ItemPenjualan::class, 'user_id');
    }

    public function ItemPenjualan()
    {
        return $this->hasMany(itemPenjualan::class, 'penjualan_id');
    }
}