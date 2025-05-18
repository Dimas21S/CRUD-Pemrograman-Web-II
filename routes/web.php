<?php

use App\Http\Controllers\produkController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/welcome', function () {
//     echo "Welcome";
// });

// Route::get('/index', function () {
//     echo "Uji coba route dengan method GET";
// });
// Route::post('/store', function () {
//     //Sintax untuk menyimpan data
// });
// Route::put('/update', function () {
//     //Sintax untuk update data
// });
// Route::delete('/delete', function () {
//     //Sintax untuk menghapus data
// });
// Route::match(['get', 'post'], '/welcome', function () {
//     //
// });
// Route::any('/welcome', function () {
//     //
// });

// 1. Route dengan Parameter
Route::get('/show/{id}', function ($id) {
    echo "Nilai parameter adalah" . $id;
});

Route::get('/show/{id?}', function ($id = 1) {
    echo "Nilai parameter adalah"  . $id;
});

//2. Route dengan reguler expression
Route::get('/edit/{nama}', function ($nama) {
    echo "Nilai parameter adalah" . $nama;
})->where('nama', '[A-Za-z]+');

//3. Route dengan nama
Route::get('/index', function () {
    echo "<a href='" . route('create') . "'>Akses Route dengan nama </a>";
});

Route::get('/create', function () {
    echo "Route diakses menggunakan nama";
})->name('create');

// 4. Route dengan aksi controller
Route::get('/produk', [produkController::class, 'index']);


Route::get('/produk/show', [produkController::class, 'show']);


Route::get('/halaman', function () {
    $title = 'Harry Pooter';
    $konten = 'harry potter and the deathly hallows: part 2';
    return view('konten.halaman', compact('title', 'konten'));
});

Route::get('/tambah', [CrudController::class, 'tambah'])->name('get.tambah');
Route::post('/tambah/proses', [CrudController::class, 'prosesTambah'])->name('post.tambah');
Route::get('/baca', [CrudController::class, 'Baca'])->name('get.baca');
Route::get('/ubah/{id}', [CrudController::class, 'ubah'])->name('get.ubah');
Route::patch('/ubah/{id}', [CrudController::class, 'prosesUbah'])->name('patch.ubah');
Route::delete('/hapus/{id}', [CrudController::class, 'hapus'])->name('get.hapus');