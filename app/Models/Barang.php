<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori');
    }

    public function stocks()
    {
        return $this->hasOne(Stock::class, 'id_barang', 'id');
    }
    public function rak()
    {
        return $this->hasOne(Rak::class, 'id_barang', 'id');
    }
}
