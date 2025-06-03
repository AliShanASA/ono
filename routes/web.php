<?php

use App\Livewire\Home;
use App\Livewire\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class);
Route::get('/home', Home::class);
