@extends('layouts.admin')

@section('content')
      <div class="card">
            <div class="card-header">
          <h4>Ajouter un Produit </h4>
            </div>
          <div class="card-body">
              <form action="{{ url('changé-produit/'.$produit->id) }}" method="POST"  enctype="multipart/form-data">
               @method('PUT')
              @csrf    
                 <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Catégorie</label>
                        <select  class="form-select">
                         <option >{{ $produit->categorie->nom }}</option>
                         </select>
                    </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Nom:</label>
                          <input type="text" class="form-control" value="{{ $produit->nom }}" name="nom">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">slogan:</label>
                          <input type="text" class="form-control" value="{{ $produit->slogan }}" name="slogan">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Marque:</label>
                          <input type="text" class="form-control" value="{{ $produit->marque }}" name="marque">
                      </div>
                      <div class="col-md-6 md-3">
                        <label for="">Description</label>
                        <textarea name="déscription"  rows="3" class="form-control">{{ $produit->déscription }}</textarea>
                    </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Prix Original:</label>
                          <input type="number" class="form-control" value="{{ $produit->prix_original }}" name="prix_original">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Prix Remise:</label>
                          <input type="number" class="form-control" value="{{ $produit->prix_remise }}" name="prix_remise">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Quantité:</label>
                          <input type="number" class="form-control" value="{{ $produit->quantite }}" name="quantite">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Taxe:</label>
                          <input type="number" class="form-control" value="{{ $produit->taxe }}" name="taxe">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Méta-Titre:</label>
                          <input type="text" class="form-control" value="{{ $produit->meta_titre }}" name="meta_titre">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Méta-Mot-Clé:</label>
                          <input type="text" class="form-control" value="{{ $produit->meta_mot_cle }}" name="meta_mot_cle">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Statut:</label>
                          <input type="checkbox" {{ $produit->statut == '1'? 'checked' : '' }} name="statut">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Tendance:</label>
                          <input  type="checkbox" {{ $produit->tendance == '1'? 'checked' : '' }} name="tendance">
                      </div>
                       @if($produit->image)
                         <img src="{{ asset('assets/uploads/produits/' .$produit->image) }}" alt="" class="cate-image" alt="categorie image">
                       @endif
                      <div class="col-md-12">
                        <input type="file" class="form-control" name="image">
                    </div>
                      <div class="col-md-12">
                          <button type="submit" class="btn btn-primary">Modifier</button>
                      </div>
                 </div>
              </form>
          </div>
      </div>
@endsection