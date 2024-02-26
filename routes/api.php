<?php

use App\Models\Cargo;
use App\Models\Escola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/escolas', function (Request $request) {
    // getting initial selected values
    $selected = json_decode($request->get('selected', ''), true);

    return Escola::query()
        // searching when type in the select input
        ->when(
            $search = $request->get('search'),
            fn ($query) => $query->where('name', 'like', "%{$search}%")
        )
        ->when(!$search && $selected, function ($query) use ($selected) {
            // selecting the initial selected values
            $query->whereIn('id', $selected)
                // or selecting the other escolas ordered by creation date
                ->orWhere(function ($query) use ($selected) {
                    $query->whereNotIn('id', $selected)
                        ->orderBy('created_at');
                });
        })
        ->limit(100)
        ->get()
        // mapping to the expected format
        ->map(fn (Escola $escola) => $escola->only('id', 'name'));
})->name('api.escolas');

Route::get('/cargos', function (Request $request) {
    // getting initial selected values
    $selected = json_decode($request->get('selected', ''), true);

    return Cargo::query()
        // searching when type in the select input
        ->when(
            $search = $request->get('search'),
            fn ($query) => $query->where('name', 'like', "%{$search}%")
        )
        ->when(!$search && $selected, function ($query) use ($selected) {
            // selecting the initial selected values
            $query->whereIn('id', $selected)
                // or selecting the other escolas ordered by creation date
                ->orWhere(function ($query) use ($selected) {
                    $query->whereNotIn('id', $selected)
                        ->orderBy('created_at');
                });
        })
        ->limit(100)
        ->get()
        // mapping to the expected format
        ->map(fn (Cargo $cargo) => $cargo->only('id', 'name'));
})->name('api.cargos');

