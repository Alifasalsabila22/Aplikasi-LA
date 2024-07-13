<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Kategori;
use App\Models\Rak;
use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataStart extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gudang::create([
            'kode_perwakilan_regional' => "P001",
            'lokasi_gudang'=>'palembang',
            'no_gudang' =>'001',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        Gudang::create([
            'kode_perwakilan_regional' => "P002",
            'lokasi_gudang'=>'poligon',
            'no_gudang' =>'002',
            'created_by' => '1',
            'update_by' => '1'
        ]);

        Rak::create([
            'no_rak' => 'R001',
            'id_gudang' => '1',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        Rak::create([
            'no_rak' => 'R002',
            'id_gudang' => '2',
            'created_by' => '1',
            'update_by' => '1'
        ]);

        Kategori::create([
            'jenjang' => 'SD',
            'kelas' => '1'
        ]);
        Kategori::create([
            'jenjang' => 'SD',
            'kelas' => '2'
        ]);
        Kategori::create([
            'jenjang' => 'SD',
            'kelas' => '3'
        ]);
        Kategori::create([
            'jenjang' => 'SD',
            'kelas' => '4'
        ]);

        Barang::create([
            'kode_buku' => 'B001',
            'judul' => 'Matematika',
            'id_kategori' => 1,
            'penerbit' => 'komputindo',
            'tahun_terbit' => '2023',
            'created_by' => '1',
            'update_by' => '1',
        ]);
        Barang::create([
            'kode_buku' => 'B002',
            'judul' => 'Bahasa Indonesia',
            'id_kategori' => 1,
            'penerbit' => 'komputindo',
            'tahun_terbit' => '2023',
            'created_by' => '1',
            'update_by' => '1',
        ]);
        Barang::create([
            'kode_buku' => 'B001',
            'judul' => 'IPA',
            'id_kategori' => 1,
            'penerbit' => 'komputindo',
            'tahun_terbit' => '2023',
            'created_by' => '1',
            'update_by' => '1',
        ]);

        Stock::create([
            'id_barang' => '1',
            'id_kategori' => '1',
            'stock' => '50'
        ]);
        Stock::create([
            'id_barang' => '2',
            'id_kategori' => '1',
            'stock' => '50'
        ]);
        Stock::create([
            'id_barang' => '3',
            'id_kategori' => '1',
            'stock' => '50'
        ]);
    }
}
