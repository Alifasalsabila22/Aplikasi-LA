<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    use HasFactory;
    protected $guarded = ['id'];
    public function barang()
    {
        return $this->hasOne(Barang::class, 'id', 'id_barang');
    }
    public function gudang()
    {
        return $this->hasOne(Gudang::class, 'id', 'id_gudang');
    }
    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori');
    }
    public function stock()
    {
        return $this->hasOne(stock::class, 'id', 'id_stock');
    }
    public function rak()
    {
        return $this->hasOne(Rak::class, 'id', 'id_rak');
    }
}
