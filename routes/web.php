<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\CartController;


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
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/event/{id}', [EventController::class, 'show'])->name('event.details');
    Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
    Route::post('/cart/add/{event}', [CartController::class, 'add'])->name('carts.add');
    Route::delete('/cart/remove/{event}', [CartController::class, 'remove'])->name('carts.remove');
    Route::patch('/carts/{cart}', [CartController::class, 'update'])->name('carts.update');

    // Route::get('/events', [EventController::class, 'index']); // Afișează lista de evenimente pe pagina de start
    // Route::resource('events', EventController::class); // Ruta de resurse va genera CRUD URI pentru evenimente
    // Route::get('/artists', [ArtistController::class, 'index']); // Afișează lista de evenimente pe pagina de start
    // Route::resource('artists', ArtistController::class);
    // Route::get('/sponsors', [SponsorController::class, 'index']); // Afișează lista de evenimente pe pagina de start
    // Route::resource('sponsors', SponsorController::class);
    // Route::resource('agendas', AgendaController::class);

}); 

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin-dashboard');
    })->name('admin.dashboard');

    Route::get('/events', [EventController::class, 'index']); // Afișează lista de evenimente pe pagina de start
    Route::resource('events', EventController::class); // Ruta de resurse va genera CRUD URI pentru evenimente
    Route::get('/artists', [ArtistController::class, 'index']); // Afișează lista de evenimente pe pagina de start
    Route::resource('artists', ArtistController::class);
    Route::get('/sponsors', [SponsorController::class, 'index']); // Afișează lista de evenimente pe pagina de start
    Route::resource('sponsors', SponsorController::class);
    Route::resource('agendas', AgendaController::class);
});

