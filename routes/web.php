<?php

use App\Livewire\CustomerIndex;
use App\Livewire\Post;
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

    Route::get('posts', Post\Index::class)->name('posts.index');
    Route::get('customer', CustomerIndex::class)->name('customer.index');

});
