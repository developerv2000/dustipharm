<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(MainController::class)->group(function () {
  Route::get('/', 'home')->name('home');
  Route::get('/about', 'about')->name('about.index');
  Route::get('/services', 'services')->name('services.index');
  Route::get('/partners', 'partners')->name('partners.index');
  Route::get('/drugstores', 'drugstores')->name('drugstores.index');
  Route::get('/express-pharm', 'expressPharm')->name('express-pharm.index');
  Route::get('/contacts', 'contacts')->name('contacts.index');
});


Route::redirect('/o-kompanii', '/about');
Route::redirect('/o-kompanii/missija', '/about');
Route::redirect('/o-kompanii/videnie', '/about');
Route::redirect('/o-kompanii/filosofija-kompanii', '/about');
Route::redirect('/o-kompanii/cennosti-kompanii', '/about');

Route::redirect('/uslugi', '/services');

Route::redirect('/klientam', '/services');
Route::redirect('/kak-stat-nashim-klientom', '/services');
Route::redirect('/nashi-filialy', '/contacts');

Route::redirect('/partneram', '/partners');
Route::redirect('/uslugi-po-registracii', '/partners');
Route::redirect('/nashi-partnery', '/partners');

Route::redirect('/kontakty', '/contacts');

require __DIR__.'/auth.php';
require __DIR__ . '/dashboard.php';
