<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CloudUploadController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CloudUploadController::class, 'index'])->name('welcome');
Route::post('/stage-upload', [CloudUploadController::class, 'stage'])->name('upload.stage');
Route::get('/upload-metadata', [CloudUploadController::class, 'create'])->name('upload.create');
Route::post('/upload-metadata', [CloudUploadController::class, 'store'])->name('upload.store');
Route::get('/gallery', [CloudUploadController::class, 'indexGallery'])->name('upload.gallery');
Route::delete('/gallery/{id}', [CloudUploadController::class, 'destroy'])->name('upload.destroy');
// Route::get('/upload', [CloudUploadController::class, 'create'])->name('upload.create');
// Route::post('/upload', [CloudUploadController::class, 'store'])->name('upload.store');
