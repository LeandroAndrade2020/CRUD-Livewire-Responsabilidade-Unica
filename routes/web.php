<?php

use App\Livewire\{Customer, User};
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

    Route::get('customer', Customer\Index::class)->name('customer.index');
    Route::get('users-acrtivity', User\ActivityIndex::class)->name('users.activity.index');

    Route::get('user', User\Index::class)->name('user.index');
});
