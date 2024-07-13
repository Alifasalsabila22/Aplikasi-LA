<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function kategori()
    {
        return $this->hasOne(kategori::class, 'id', 'id_kategori');
    }
    public function gudang()
    {
        return $this->hasOne(Gudang::class, 'id', 'id_gudang');
    }
}
