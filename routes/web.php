<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPasswordReset;
use App\Livewire\{CustomerIndex, UserIndex};

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

    Route::any('password/reset', [UserPasswordReset::class, 'resetarSenha'])->name('password.reset');

});
