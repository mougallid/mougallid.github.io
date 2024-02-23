<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategorieController;


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
    Route::get('modifier-prod/{id}',[CategorieController::class,'modifier']);// url d'appelle du formulaire de modification d'un categorie
    Route::put('changer-categorie/{id}',[CategorieController::class,'changer']);// url qu'assure le changement de la modification d'un categorie
    Route::get('suprimer-categorie/{id}',[CategorieController::class, 'suprimer']);// url qui assure la suprersion d'une categorie

});
 
 
