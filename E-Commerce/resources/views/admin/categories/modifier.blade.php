@extends('layouts.admin')

@section('content')
      <div class="card">
            <div class="card-header">
          <h4>Modifier une Categorie </h4>
            </div>
          <div class="card-body">
              <form action="{{ url('changer-categorie/'.$modCategorie->id) }}" method="POST"  enctype="multipart/form-data">
                @csrf    
                @method('PUT')
                 <div class="row">
                      <div class="col-md-6 mb-3">
                          <label for="">Nom:</label>
                          <input type="text" value="{{ $modCategorie->nom }}" class="form-control" name="nom">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">slogan:</label>
                          <input type="text" value="{{ $modCategorie->slug }}" class="form-control" name="slug">
                      </div>
                      <div class="col-md-12 md-3">
                        <label for="">Description</label>
                        <textarea name="description"  rows="3" class="form-control">{{ $modCategorie->nom }}</textarea>
                    </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Statut:</label>
                          <input type="checkbox" name="statut" {{ $modCategorie->statut == "1" ? 'checked':'' }}>
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Populaire:</label>
                          <input type="checkbox" name="populaire" {{ $modCategorie->populaire == "1" ? 'checked':''}}>
                      </div>
                      <div class="col-md-12 mb-3">
                          <label for="">Méta-Titre:</label>
                          <input type="text" value="{{ $modCategorie->meta_titre}}" class="form-control" name="meta_titre">
                      </div>
                      <div class="col-md-12 mb-3">
                          <label for="">Méta-Description:</label>
                          <textarea name="meta_description"  rows="3" class="form-control">{{ $modCategorie->meta_description }}</textarea>
                        </div>
                      <div class="col-md-12 mb-3">
                          <label for="">Méta_mot-clé:</label>
                          <input type="text" class="form-control" name="meta_mot_cle" value="{{ $modCategorie->meta_mot_cle }}">
                      </div>
                      @if($modCategorie->image)
                      <img src="{{ asset('assets/uploads/categories/'.$modCategorie->image)}}" class="cate-image" alt="categorie image">
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