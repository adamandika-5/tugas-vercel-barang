<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('barangs.index');
});

Route::resource('barangs', BarangController::class);