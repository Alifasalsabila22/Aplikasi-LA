<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'barang-list',
            'barang-create',
            'barang-edit',
            'barang-delete',
            'stock-list',
            'stock-create',
            'stock-edit',
            'stock-delete',
            'kategori-list',
            'kategori-create',
            'kategori-edit',
            'kategori-delete',
            'gudang-list',
            'gudang-create',
            'gudang-edit',
            'gudang-delete',
            'lokasi-gudang-list',
            'lokasi-gudang-create',
            'lokasi-gudang-edit',
            'lokasi-gudang-delete',
            'rak-barang-list',
            'rak-barang-create',
            'rak-barang-edit',
            'rak-barang-delete',
            'transaksi-masuk-list',
            'transaksi-masuk-create',
            'transaksi-masuk-cetak',
            'transaksi-keluar-list',
            'transaksi-keluar-create',
            'transaksi-keluar-cetak',
            'transaski',
            'laporan-masuk-list',
            'laporan-keluar-list',
            'laporan-masuk-export',
            'laporan-keluar-export',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
