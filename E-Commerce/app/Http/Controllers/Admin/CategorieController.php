<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Categorie;

class CategorieController extends Controller
{
    // cette focntion à pour buit d'afficher tous le categories ds la page cataegorie sur table de beaurd
    public function index(){
        $listecate = Categorie::all();
        return view('admin.categories.index', compact('listecate'));
     }
  
     // fonction d'appelle de la formulaire de categories
    public function ajoute(){
        return view('admin.categories.ajoute');
     }

     // fonction qui assure la persisatance de categorie dans la bb
    public function insere(Request $request)  {
      $categorie = new Categorie();
      if($request->hasfile('image'))
      {
       $file = $request->file('image');
       $ext = $file->getClientOriginalExtension();
       $filename = time().'.'.$ext;
       $file->move('assets/uploads/categories/', $filename);
       $categorie->image = $filename;
      }
      $categorie->nom = $request->input('nom');
      $categorie->slug = $request->input('slug');
      $categorie->description = $request->input('description');
      $categorie->statut = $request->input('statut') == TRUE ? '1':'0';
      $categorie->populaire = $request->input('populaire') == TRUE ? '1':'0';
      $categorie->meta_titre = $request->input('meta_titre');
      $categorie->meta_description = $request->input('meta_description');
      $categorie->meta_mot_cle = $request->input('meta_mot_cle');
      $categorie->save();
      return redirect('/TableDeBord')->with('status','Category added Successfully');
     }
}
