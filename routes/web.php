<?php

use App\Http\Controllers\PetAPIController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PetAPIController::class, 'index'])->name('dashboard');

Route::get('/search/', [PetAPIController::class, 'search'])->name('search');

Route::get('/view-breed/{breedID}', [PetAPIController::class, 'specificBreed'])->name('view-breed');
