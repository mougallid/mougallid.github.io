@extends('layouts.admin')

@section('content')
      <div class="card">
            <div class="card-header">
          <h4>Ajouter un Produit </h4>
            </div>
          <div class="card-body">
              <form action="{{url('insere-produit')}}" method="POST"  enctype="multipart/form-data">
                @csrf    
                 <div class="row">
                    <div class="col-md-12 mb-3">
                        <select name="cate_id" class="form-select">
                         <option value="">Selectionner une categorie</option>
                         @foreach($categorie as $item)
                         <option value="{{ $item->id }}">{{ $item->nom }}</option>
                         @endforeach
                         </select>
                    </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Nom:</label>
                          <input type="text" class="form-control" name="nom">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">slogan:</label>
                          <input type="text" class="form-control" name="slug">
                      </div>
                      <div class="col-md-12 md-3">
                        <label for="">Description</label>
                        <textarea name="description"  rows="3" class="form-control"></textarea>
                    </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Statut:</label>
                          <input type="checkbox" name="statut">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Populaire:</label>
                          <input type="checkbox" name="populaire">
                      </div>
                      <div class="col-md-12 mb-3">
                          <label for="">Méta-Titre:</label>
                          <input type="text" class="form-control" name="meta_titre">
                      </div>
                      <div class="col-md-12 mb-3">
                          <label for="">Méta-Description:</label>
                          <textarea name="meta_description"  rows="3" class="form-control"></textarea>
                      </div>
                      <div class="col-md-12 mb-3">
                          <label for="">Méta_mot-clé:</label>
                          <input type="text" class="form-control" name="meta_mot_cle">
                      </div>
                      <div class="col-md-12">
                        <input type="file" class="form-control" name="image">
                    </div>
                      <div class="col-md-12">
                          <button type="submit" class="btn btn-primary">Ajouter</button>
                      </div>
                 </div>
              </form>
          </div>
      </div>
@endsection