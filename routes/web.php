<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PetController::class, 'index'])->name('pets.index');
Route::get('/create', [PetController::class, 'create'])->name('pets.create');
Route::get('/edit/{id}', [PetController::class, 'edit'])->name('pets.edit');
Route::post('/store', [PetController::class, 'store'])->name('pets.store');
Route::put('/update/{id}', [PetController::class, 'update'])->name('pets.update');
Route::delete('/delete/{id}', [PetController::class, 'destroy'])->name('pets.destroy');
