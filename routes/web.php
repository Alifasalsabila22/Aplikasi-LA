<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Kategori;
use App\Models\Stock;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboards', [AuthController::class, 'dashboard'])->name('dashboard.index');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [AuthController::class, 'index'])->name('login');


Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);


Route::resource('barangs', BarangController::class);
Route::resource('gudangs', GudangController::class);
Route::resource('kategoris', KategoriController::class);
Route::resource('petugas', PetugasController::class);
Route::resource('raks', RakController::class);
Route::resource('stocks', StockController::class);
Route::resource('transaksis', TransaksiController::class);
Route::get('transaki-out', [TransaksiController::class, 'Transaksi'])->name('transaksi.out');
Route::get('cetak-laporan-barang-masuk', [TransaksiController::class, 'form_cetak_laporan'])->name('laporantransaksimasuk');
Route::post('cetak-laporan-barang-masuk-post', [TransaksiController::class, 'cetak_laporan_barang_masuk'])->name('laporantransaksimasuk.post');
Route::post('post-cetak-laporan', [TransaksiController::class, 'cetak_form_laporan'])->name('cetaklaporan');
Route::get('cetak_laporan_barang_keluar', [TransaksiController::class, 'form_cetak_laporan_keluar'])->name('form_cetak_laporan_keluar');
Route::post('post-cetak-laporan-barang-keluar', [TransaksiController::class, 'cetak_laporan_barang_keluar'])->name('cetaklaporanbarangkeluar');
Route::get('create-transaksi-barang-keluar', [TransaksiController::class, 'create_barang_keluar'])->name('create.transaksibarangkeluar');
Route::post('report_print_masuk', [ReportController::class, 'printReport'])->name('printReportMasuk');
Route::post('report_print_keluar', [ReportController::class, 'printReportOut'])->name('printReportKeluar');
