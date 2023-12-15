<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/events', [EventController::class, 'index']); // Afișează lista de evenimente pe pagina de start
    Route::resource('events', EventController::class); // Ruta de resurse va genera CRUD URI pentru evenimente
    Route::resource('sponsors', SponsorController::class);
    Route::get('/artists', [ArtistController::class, 'index']); // Afișează lista de evenimente pe pagina de start
    Route::resource('artists', ArtistController::class);
    Route::resource('agendas', AgendaController::class);

}); 
