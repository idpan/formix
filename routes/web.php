<?php

use App\Http\Controllers\page\AboutPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\page\HomePageController;
use App\Http\Controllers\page\ProjectsPageController;
use App\Http\Controllers\EstimasiController;
use Illuminate\Support\Facades\Artisan;


Route::get('/', [HomePageController::class, 'index']);
Route::get('/about', [AboutPageController::class, 'index']);
Route::get('/projects', [ProjectsPageController::class, 'index']);
Route::post('/estimasi', [EstimasiController::class, 'store'])->name('estimasi.store');

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return 'Cache cleared!';
});