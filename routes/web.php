<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Siswa\InputPkl;
use App\Livewire\Siswa\InputPklForm;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
 
// Route::get('/input-pkl', InputPkl::class)->name('input.pkl');
Route::get('/input/pkl-create',InputPklForm::class)->name('pkl.create');
Route::get('/input',InputPkl::class)->name('input.index');