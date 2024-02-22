<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualans';
    protected $fillable = [
        'nama_pelanggan',
        'id_user',
        'total_harga',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function details()
    {
        return $this->hasMany(DetailPenjualan::class, 'penjualan_id');
    }

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class,);
    }
}
