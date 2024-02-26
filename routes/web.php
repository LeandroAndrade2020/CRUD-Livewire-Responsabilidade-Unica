<?php

use App\Livewire\{CustomerIndex, UserIndex};
use Illuminate\Support\Facades\Route;

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

    Route::get('customer', CustomerIndex::class)->name('customer.index');
    Route::get('user', UserIndex::class)->name('user.index');

});
