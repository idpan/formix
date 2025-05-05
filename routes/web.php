<?php

use App\Http\Controllers\AboutPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProjectsPageController;

Route::get('/', [HomePageController::class, 'index']);
Route::get('/about', [AboutPageController::class, 'index']);
Route::get('/projects', [ProjectsPageController::class, 'index']);
