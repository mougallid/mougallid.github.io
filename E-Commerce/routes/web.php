<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// toute le route qui se dirige vers la tableau de bord sont proteger par l'authentification
Route::middleware(['auth','isAdmin'])->group(function () {

    Route::get('/TableDeBord', 'Admin\FrontendController@index'); // url vers la page index du tableau de bord
    Route::get('categories' , 'Admin\CategorieController@index'); // url vers la page de categorie
    Route::get('ajoute-categorie', 'Admin\CategorieController@ajoute'); // url pour avoir le formulaire des categorie
    Route::post('insere-categorie','Admin\CategorieController@insere');// url pour inserer definitivement les categories  
    });
 
 
