<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentacionAvance;

Route::get('/presentacion-avance', [PresentacionAvance::class, 'index'])
    ->name('presentacion-avance');
