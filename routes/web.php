<?php

use App\Livewire\Auth\Login;
use App\Livewire\Partials\Dashboard;
use App\Livewire\Partials\Details;
use App\Livewire\Partials\Filter;
use App\Livewire\Partials\Loom;
use App\Livewire\Partials\Report;
use App\Livewire\Partials\Warehouse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', Login::class)->name('login');

// Protected dashboard route
Route::middleware('auth.custom')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/loom-management', Loom::class)->name('loom-management');
    Route::get('/filter', Filter::class)->name('filter');
    Route::get('/reports', Report::class)->name('reports');
    Route::get('/details', Details::class)->name('details');
    Route::get('/warehouse', Warehouse::class)->name('warehouse');
    
});
