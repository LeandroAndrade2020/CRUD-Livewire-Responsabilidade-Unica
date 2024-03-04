<?php

use App\Livewire\UserActivityIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\{Customer, UserIndex};

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
    Route::get('user', UserIndex::class)->name('user.index');
    Route::get('users-acrtivity', UserActivityIndex::class)->name('users-activity-index');
});
