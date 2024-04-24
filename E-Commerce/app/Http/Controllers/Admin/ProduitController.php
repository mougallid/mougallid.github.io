<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Facades\File;

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

    // fonction assurant la persistance d'un produit ds le bdd
    public function insere(Request $request){
        $produit = new Produit();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/produits/',$filename);
            $produit->image = $filename;
        }
        $produit->cate_id = $request->input('cate_id');
        $produit->nom = $request->input('nom');
        $produit->slogan = $request->input('slogan');
        $produit->marque = $request->input('marque');
        $produit->déscription = $request->input('déscription');
        $produit->prix_original = $request->input('prix_original');
        $produit->prix_remise = $request->input('prix_remise');
        $produit->quantite = $request->input('quantite');
        $produit->taxe = $request->input('taxe');
        $produit->statut = $request->input('statut') == TRUE ? '1':'0';
        $produit->tendance = $request->input('tendance') == TRUE ? '1':'0' ;
        $produit->meta_titre = $request->input('meta_titre');
        $produit->meta_mot_cle = $request->input('meta_mot_cle');
        $produit->save();
        return redirect('produits')->with('status','Le produit est ajouté   vec succeés');
    }

    //fonct d'appelle du formulaire de modification d'un produit
    public function modifier($id){
        $produit = Produit::find($id);
        return view('admin.produits.modifier', compact('produit'));
    }


    // fonction de mise à jour des produit

    public function changer(Request $request , $id){

        $produit = Produit::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/produits/'.$produit->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/produits/',$filename);
            $produit->image = $filename;
        }
        
        $produit->nom = $request->input('nom');
        $produit->slogan = $request->input('slogan');
        $produit->marque = $request->input('marque');
        $produit->déscription = $request->input('déscription');
        $produit->prix_original = $request->input('prix_original');
        $produit->prix_remise = $request->input('prix_remise');
        $produit->quantite = $request->input('quantite');
        $produit->taxe = $request->input('taxe');
        $produit->statut = $request->input('statut') == TRUE ? '1':'0';
        $produit->tendance = $request->input('tendance') == TRUE ? '1':'0' ;
        $produit->meta_titre = $request->input('meta_titre');
        $produit->meta_mot_cle = $request->input('meta_mot_cle');
        $produit->update();
        return redirect('produits')->with('status','Le produit est mise à jour avec succès');
    }

    // fonction de supression d'un produit 
    public  function suprimer($id){
        $produit = Produit::find($id);
        $path = 'assets/uploads/produits/'.$produit->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $produit->delete();
        return redirect('produits')->with('status','Le produit est suprmer avec succès');
     }
}
