<?php

use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\DrugstoreController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ValueController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
*/

Route::redirect('/dashboard', '/dashboard/advantages');

Route::middleware('auth')->prefix('dashboard')->group(function () {
  Route::controller(AdvantageController::class)->prefix('/advantages')->name('advantages.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(DrugstoreController::class)->prefix('/drugstores')->name('drugstores.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(MissionController::class)->prefix('/missions')->name('missions.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(PartnerController::class)->prefix('/partners')->name('partners.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(ServiceController::class)->prefix('/services')->name('services.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(ValueController::class)->prefix('/values')->name('values.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(GalleryController::class)->prefix('/gallery')->name('gallery.')->group(function () {
    Route::post('/destroy', 'destroy')->name('destroy');
  });
});
