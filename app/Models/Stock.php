<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->hasOne(Barang::class, 'id', 'id_barang');
    }
    public function Kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori');
    }
}
