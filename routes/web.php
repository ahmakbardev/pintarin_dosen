<?php

use App\Http\Controllers\MateriController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('index');
})->name('home');

// Route::get('/topik', function () {
//     return view('topik.pengembangan');
// })->name('classwork.pengembangan.index');

// Route::get('/topik', function () {
//     return view('topik.prinsip');
// })->name('classwork.prinsip.index');

Route::get('/topik/{topic}', [ModulController::class, 'index'])->name('classwork.topic.index');
Route::post('/moduls', [ModulController::class, 'store'])->name('moduls.store');
Route::put('/moduls/{id}', [ModulController::class, 'update'])->name('moduls.update');
Route::delete('/moduls/{id}', [ModulController::class, 'destroy'])->name('moduls.destroy');

// Listing
Route::get('/{topic}/modul/{id}', [ModulController::class, 'showModul'])->name('classwork.topic.modul');


// // Prinsip
// Route::get('/prinsip/materi/create', function () {
//     return view('classwork.prinsip.materi.create');
// })->name('classwork.prinsip.materi');

// Route::get('/prinsip/tugas/create', function () {
//     return view('classwork.prinsip.tugas.create');
// })->name('classwork.prinsip.tugas');


// Materi Routes
Route::get('/{topic}/modul/{id}/materi/create', [MateriController::class, 'create'])->name('classwork.topic.materi.create');
Route::post('/{topic}/modul/{id}/materi', [MateriController::class, 'store'])->name('classwork.topic.materi.store');
Route::get('/classwork/{topic}/modul/{id}/materi/{materi_id}/edit', [MateriController::class, 'edit'])->name('classwork.topic.materi.edit');
Route::put('/classwork/{topic}/modul/{id}/materi/{materi_id}', [MateriController::class, 'update'])->name('classwork.topic.materi.update');
Route::delete('/{topic}/modul/{id}/materi/{materi_id}', [MateriController::class, 'destroy'])->name('classwork.topic.materi.destroy');

Route::post('/materi/upload-image', [MateriController::class, 'uploadImage'])->name('materi.upload.image');
Route::post('/materi/upload-file', [MateriController::class, 'uploadFile'])->name('materi.upload.file');

// Post Test Routes
Route::get('/{topic}/modul/{id}/post-test/create', [PostTestController::class, 'create'])->name('classwork.prinsip.post-test.create');
Route::post('/{topic}/modul/{id}/post-test', [PostTestController::class, 'store'])->name('classwork.prinsip.post-test.store');
Route::put('/classwork/prinsip/post-test/{topic}/{modul}/{id}', [PostTestController::class, 'update'])->name('classwork.prinsip.post-test.update');
Route::get('/classwork/{topic}/modul/{id}/post-test/edit', [PostTestController::class, 'edit'])->name('classwork.prinsip.post-test.edit');

// Task Routes
Route::get('/{topic}/modul/{id}/task/create', [TaskController::class, 'create'])->name('classwork.prinsip.tugas.create');
Route::post('/{topic}/modul/{id}/task', [TaskController::class, 'store'])->name('classwork.prinsip.tugas.store');
Route::get('/{topic}/modul/{id}/task/{task_id}/edit', [TaskController::class, 'edit'])->name('classwork.prinsip.tugas.edit');
Route::put('/{topic}/modul/{id}/task/{task_id}', [TaskController::class, 'update'])->name('classwork.prinsip.tugas.update');
Route::post('/task/upload-image', [TaskController::class, 'uploadImage'])->name('task.upload.image');

// Route::get('/{topic}/modul/{id}', [PostTestController::class, 'showModul'])->name('classwork.topic.modul');

// Route::get('/{topic ini tolong sesuaikan}}/post-test/create', function () {
//     return view('classwork.prinsip.post-test.create');
// })->name('classwork.prinsip.post-test');
// Pengembangan
Route::get('/pengembangan/modul', function () {
    return view('classwork.pengembangan.index');
})->name('classwork.pengembangan.modul');

Route::get('/pengembangan/materi/create', function () {
    return view('classwork.pengembangan.materi.create');
})->name('classwork.pengembangan.materi');

Route::get('/pengembangan/post-test/create', function () {
    return view('classwork.pengembangan.post-test.create');
})->name('classwork.pengembangan.post-test');

Route::get('/pengembangan/tugas/create', function () {
    return view('classwork.pengembangan.tugas.create');
})->name('classwork.pengembangan.tugas');

// PTK
Route::get('/PTK', function () {
    return view('ptk.index');
})->name('ptk');

// Students
Route::get('/students', function () {
    return view('students.index');
})->name('students');

Route::get('/students/detail', function () {
    return view('students.detail.index');
})->name('students.detail');

// Diskusi
Route::get('/diskusi', function () {
    return view('diskusi.index');
})->name('diskusi');

Route::get('/diskusi/chat', function () {
    return view('diskusi.chat.index');
})->name('diskusi.chat');

// nilai
Route::get('/nilai', function () {
    return view('nilai.index');
})->name('nilai');

Route::get('/nilai/modul', function () {
    return view('nilai.modul.index');
})->name('nilai.modul');

Route::get('/nilai/prinsip', function () {
    return view('nilai.prinsip.index');
})->name('nilai.prinsip');

Route::get('/nilai/prinsip/detail', function () {
    return view('nilai.prinsip.detail');
})->name('nilai.prinsip.detail');

// Track
Route::get('/track', function () {
    return view('track.index');
})->name('track');
