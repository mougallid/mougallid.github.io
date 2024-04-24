<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ProduitController;


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
    Route::get('modifier-categ/{id}',[CategorieController::class,'modifier']);// url d'appelle du formulaire de modification d'un categorie
    Route::put('changer-categorie/{id}',[CategorieController::class,'changer']);// url qu'assure le changement de la modification d'un categorie
    Route::get('suprimer-categorie/{id}',[CategorieController::class, 'suprimer']);// url qui assure la suprersion d'une categorie


    Route::get('produits',[ProduitController::class, 'index']);// url d'affichage de tous les produit ds le tableau de bord
    Route::get('ajoute-produit',[ProduitController::class, 'ajoute']); // url d'apple du formulaire d'ajout d'un produit 
    Route::post('insere-produit',[ProduitController::class, 'insere']); // url qui de persistance d'un produit ds le bdd
    Route::get('modifier-prod/{id}',[ProduitController::class, 'modifier']); // url d'appelle du formulaire de modification d'un produit
    Route::put('changé-produit/{id}', [ProduitController::class, 'changer']); // url de mise à jour des produit
    Route::get('suprimer-prod/{id}',[ProduitController::class, 'suprimer']); // url de supression d'un produit


});
 
 
