@extends('layouts.admin')

@section('content')
      <div class="card">
              <div class="card-header">
                <h3>Liste De Categori de Nos Produits</h3>
                <hr>
              </div>
          <div class="card-body">
              <table class="table table-borderes table-striped"> 
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Slogan</th>
                        <th>Mot-Clé</th>
                        <th>Statut</th>
                        <th>Populaire</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach($listecate  as $item)
                     <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nom}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->meta_mot_cle}}</td>
                        <td>{{$item->statut}}</td>
                        <td>{{$item->populaire}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/categories/'.$item->image) }}" class="cate-image" alt="Image here">
                        </td>
                        <td>
                            <a href="{{ url('modifier-categ/'.$item->id) }}"><button class="btn btn-primary btn-sm">Modifier</button></a>
                            <a href="{{ url('suprimer-categorie/'.$item->id) }}">  <button class="btn btn-danger btn-sm">Suprimer</button> </a>
                        </td>
                     </tr>
                    @endforeach 
                  </tbody>
              </table>
          </div>
      </div>
@endsection