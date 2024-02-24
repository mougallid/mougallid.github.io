<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class ProduitController extends Controller
{
    //fonction qui affiche tous le produit
    public function index(){
        $listprod = Produit::all();
        return view('admin.produits.index', compact('listprod'));
    }

    // fonction qui appelle la formulaire d'ajout d'un produit
    public function ajoute(){
       $categorie = Categorie::all();
        return view('admin.produits.ajoute', compact('categorie'));
    }
}
