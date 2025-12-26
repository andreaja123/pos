<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\SupplierReturnController;
use App\Http\Controllers\Admin\WarehouseController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('admin.dashboard');
});
Route::get('/penjualan/catatankredit', function () {
    return view('penjualan.catatankredit');
});
Route::get('/persediaan/produk-baru', function () {
    return view('persediaan.produkbaru');
});
Route::get('/persediaan/kelola-produk-baru', function () {
    return view('persediaan.kelolaprodukbaru');
});

Route::get('/persediaan/transfer-stok', function () {
    return view('persediaan.transferstok');
});
Route::get('/persediaan/pesanan-baru', function () {
    return view('persediaan.pesananbaru');
});
Route::get('/persediaan/kelola-pesanan', function () {
    return view('persediaan.kelolapesananbaru');
});
Route::get('/persediaan/catatan-supplier', function () {
    return view('persediaan.catatansupplier');
});
Route::get('/persediaan/catatan-pelanggan', function () {
    return view('persediaan.catatanpelanggan');
});
Route::get('/persediaan/supplier-baru', function () {
    return view('persediaan.supplierbaru');
});
Route::get('/persediaan/kelola-supplier', function () {
    return view('persediaan.kelolasupplier');
});
Route::get('/persediaan/gudang', function () {
    return view('persediaan.gudang');
});
Route::get('/pelanggan/pelanggan-baru', [CustomerController::class, 'create']);
Route::get('/pelanggan/kelola-pelanggan', [CustomerController::class, 'index']);

use App\Http\Controllers\GroupController;

Route::prefix('pelanggan')->group(function () {
    Route::get('/grup-pelanggan', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/grup-pelanggan/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/grup-pelanggan', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/grup-pelanggan/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
    Route::put('/grup-pelanggan/{group}', [GroupController::class, 'update'])->name('groups.update');
    Route::delete('/grup-pelanggan/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
});
Route::get('/accounts/kelola-akun', function () {
    return view('accounts.kelolaakun');
});
Route::get('/accounts/neraca-keuangan', function () {
    return view('accounts.neracakeuangan');
});
Route::get('/accounts/laporan-akun', function () {
    return view('accounts.laporanakun');
});
Route::get('/accounts/lihat-transaksi', function () {
    return view('accounts.lihattransaksi');
});
Route::get('/accounts/transaksi-baru', function () {
    return view('accounts.transaksibaru');
});
Route::get('/accounts/pemasukan', function () {
    return view('accounts.pemasukan');
});
Route::get('/accounts/biaya', function () {
    return view('accounts.biaya');
});
Route::get('/accounts/transaksi-pelanggan', function () {
    return view('accounts.transaksipelanggan');
});

use App\Http\Controllers\VoucherController;

Route::get('/voucher/buat-voucher', [VoucherController::class, 'create'])->name('vouchers.create');
Route::post('/voucher', [VoucherController::class, 'store'])->name('vouchers.store');
Route::get('/voucher/kelola-voucher', [VoucherController::class, 'index'])->name('vouchers.index');
Route::delete('/voucher/{voucher}', [VoucherController::class, 'destroy'])->name('vouchers.destroy');
Route::get('/voucher/{voucher}/edit', [VoucherController::class, 'edit'])->name('vouchers.edit');
Route::put('/voucher/{voucher}', [VoucherController::class, 'update'])->name('vouchers.update');
Route::get('/laporan/business-registers', function () {
    return view('laporan.businessregisters');
});
Route::get('/laporan/laporan-akun', function () {
    return view('laporan.laporanakun');
});
Route::get('/laporan/laporan-akun-pelanggan', function () {
    return view('laporan.laporanakunpelanggan');
});
Route::get('/laporan/laporan-akun-supplier', function () {
    return view('laporan.laporanakunsupplier');
});
Route::get('/laporan/laporan-pajak', function () {
    return view('laporan.laporanpajak');
});
Route::get('/laporan/kategori-produk', function () {
    return view('laporan.kategoriproduk');
});
Route::get('/laporan/produk-populer', function () {
    return view('laporan.produkpopuler');
});
Route::get('/laporan/keuntungan', function () {
    return view('laporan.keuntungan');
});
Route::get('/laporan/pelanggan-teratas', function () {
    return view('laporan.pelangganteratas');
});
Route::get('/laporan/penghasilan-vs-pengeluaran', function () {
    return view('laporan.penghasilanvspengeluaran');
});
Route::get('/laporan/pemasukan', function () {
    return view('laporan.pemasukan');
});
Route::get('/laporan/pengeluaran', function () {
    return view('laporan.pengeluaran');
});
Route::get('/summary/statistik', function () {
    return view('summary.statistik');
});
Route::get('/summary/keuntungan', function () {
    return view('summary.keuntungan');
});
Route::get('/summary/hitung-penghasilan', function () {
    return view('summary.hitungpenghasilan');
});
Route::get('/summary/hitung-biaya', function () {
    return view('summary.hitungbiaya');
});
Route::get('/summary/penjualan', function () {
    return view('summary.penjualan');
});
Route::get('/summary/produk', function () {
    return view('summary.produk');
});
Route::get('/summary/komisi-pegawai', function () {
    return view('summary.komisipegawai');
});

use App\Http\Controllers\NoteController;

Route::get('/lainlain/catatan', [NoteController::class, 'index'])->name('notes.index');
Route::get('/lainlain/catatan/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('/lainlain/catatan', [NoteController::class, 'store'])->name('notes.store');
Route::get('/lainlain/catatan/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::put('/lainlain/catatan/{note}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('/lainlain/catatan/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

use App\Http\Controllers\DocumentController;

Route::get('/lainlain/dokumen', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/lainlain/dokumen/create', [DocumentController::class, 'create'])->name('documents.create');
Route::post('/lainlain/dokumen', [DocumentController::class, 'store'])->name('documents.store');
Route::get('/lainlain/dokumen/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
Route::put('/lainlain/dokumen/{document}', [DocumentController::class, 'update'])->name('documents.update');
Route::delete('/lainlain/dokumen/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
Route::get('/lainlain/dokumen/{document}/download', [DocumentController::class, 'download'])->name('documents.download');

use App\Http\Controllers\EventController;

Route::get('/lainlain/kalender', [EventController::class, 'index'])->name('calendar.index');
Route::post('/lainlain/kalender/event', [EventController::class, 'store'])->name('events.store');
Route::get('/lainlain/kalender/event/{event}', [EventController::class, 'show'])->name('events.show');
Route::put('/lainlain/kalender/event/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/lainlain/kalender/event/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/hrm/karyawan', function () {
    return view('hrm.karyawan');
});
Route::get('/hrm/izin', function () {
    return view('hrm.izin');
});
Route::get('/hrm/gaji-karyawan', function () {
    return view('hrm.gajikaryawan');
});
Route::get('/hrm/absensi', function () {
    return view('hrm.absensi');
});
Route::get('/hrm/liburan', function () {
    return view('hrm.liburan');
});
Route::get('/hrm/departmen', function () {
    return view('hrm.departmen');
});
Route::get('/hrm/daftar-gaji', function () {
    return view('hrm.daftargaji');
});
Route::get('/ekspor/ekspor-data-orang', function () {
    return view('ekspor.ekspordataorang');
});
Route::get('/ekspor/transaksi-ekspor', function () {
    return view('ekspor.transaksiekspor');
});
Route::get('/ekspor/produk-ekspor', function () {
    return view('ekspor.produkekspor');
});
Route::get('/ekspor/laporan-akun', function () {
    return view('ekspor.laporanakun');
});
Route::get('/ekspor/ekspor-pajak', function () {
    return view('ekspor.eksporpajak');
});
Route::get('/ekspor/backup-database', function () {
    return view('ekspor.backupdatabase');
});
Route::get('/ekspor/produk-impor', function () {
    return view('ekspor.produkimpor');
});
Route::get('/ekspor/pelanggan-impor', function () {
    return view('ekspor.pelangganimpor');
});
Route::get('/ekspor/pernyataan-akun-produk', function () {
    return view('ekspor.pernyataanakunproduk');
});
Route::get('/penjualan/biaya', function () {
    return view('penjualan.createcatatankredit');
});


Route::get('/penjualan/faktur-baru-kasir', [PosController::class, 'index']);
Route::get('/api/products/search', [PosController::class, 'searchProduct']);
Route::get('/api/customers/search', [PosController::class, 'searchCustomer']);
Route::post('/penjualan/simpan-faktur', [PosController::class, 'store']);

Route::get('/penjualan/faktur-baru', function () {
    return view('penjualan.fakturbaru');
});
Route::get('/penjualan/kelola-faktur-baru', function () {
    return view('penjualan.kelolafaktur');
});
Route::get('/penjualan/kelola-faktur-baru-kasir', function () {
    return view('penjualan.kelolaFakturBaruKasir');
});
Route::resource('warehouses', WarehouseController::class)->except(['create', 'edit', 'show']);
Route::get('/warehouses/export', [WarehouseController::class, 'export'])
    ->name('warehouses.export');

Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class)->except('show');
    Route::get('categories-export', [CategoryController::class, 'export'])
        ->name('categories.export');
    Route::get(
        '/persediaan/kategori/{category}/export',
        [CategoryController::class, 'exportSingle']
    )->name('categories.export.single');
    Route::resource('products', ProductController::class);
});
Route::get('/products/export', [ProductController::class, 'export'])
    ->name('products.export');

Route::prefix('suppliers')->name('suppliers.')->group(function () {
    Route::get('/export', [SupplierController::class, 'export'])->name('export');
    Route::get('/', [SupplierController::class, 'index'])->name('index');
    Route::get('/create', [SupplierController::class, 'create'])->name('create');
    Route::post('/', [SupplierController::class, 'store'])->name('store');
    Route::get('/{supplier}/edit', [SupplierController::class, 'edit'])->name('edit');
    Route::put('/{supplier}', [SupplierController::class, 'update'])->name('update');
    Route::delete('/{supplier}', [SupplierController::class, 'destroy'])->name('destroy');
    Route::get('/{supplier}', [SupplierController::class, 'show'])->name('show');
});
Route::get('/ajax/suppliers', [SupplierController::class, 'search'])
    ->name('ajax.suppliers');
Route::get('/ajax/products', [ProductController::class, 'search'])
    ->name('ajax.products');


Route::resource('purchase-orders', PurchaseOrderController::class);

Route::post('/retur-supplier/{id}', [SupplierReturnController::class, 'update'])->name('retur.update');
Route::get('/retur-supplier', [SupplierReturnController::class, 'index'])->name('retur.index');
Route::post('/retur-supplier', [SupplierReturnController::class, 'store'])->name('retur.store');
Route::get('/retur-supplier/create', [SupplierReturnController::class, 'create'])->name('retur.create');
Route::delete('/retur-supplier/{id}', [SupplierReturnController::class, 'destroy'])->name('retur.destroy');

Route::resource('invoices', InvoiceController::class);
Route::resource('customers', CustomerController::class);
