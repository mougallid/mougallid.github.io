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
      return redirect('/TableDeBord')->with('status','Catégorie est ajoutée avec succès');
     }

     // fonction qui a pour buit d'appeller le formulaire de modification d'une categorie
     public function modifier($id){
        $modCategorie = Categorie::find($id);
        return view('admin.categories.modifier',compact('modCategorie'));
     }

     // fonction qui assure le changement du modification d'une categorie
     public function changer(Request $request , $id)
     {
      $changCategorie = Categorie::find($id);
      
      if($request->hasFile('image'))
      {
        $path = 'assets/uploads/categories/'.$changCategorie->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $file = $request->file('image');
       $ext = $file->getClientOriginalExtension();
       $filename = time().'.'.$ext;
       $file->move('assets/uploads/categories/', $filename);
       $changCategorie->image = $filename;
      }
      $changCategorie->nom = $request->input('nom');
      $changCategorie->slug = $request->input('slug');
      $changCategorie->description = $request->input('description');
      $changCategorie->statut = $request->input('statut') == TRUE ? '1':'0';
      $changCategorie->populaire = $request->input('populaire') == TRUE ? '1':'0';
      $changCategorie->meta_titre = $request->input('meta_titre');
      $changCategorie->meta_description = $request->input('meta_description');
      $changCategorie->meta_mot_cle = $request->input('meta_mot_cle');
      $changCategorie->update();
      return redirect('categories')->with('status','Catégorie  est mise à jour avec succès');
        
     }
}
