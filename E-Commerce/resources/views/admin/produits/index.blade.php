@extends('layouts.admin')

@section('content')
      <div class="card">
              <div class="card-header">
                <h3>Liste Nos Produits</h3>
                <hr>
              </div>
          <div class="card-body">
              <table class="table table-borderes table-striped"> 
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th><Marquee></Marquee></th>
                        <th>Mot-Clé</th>
                        <th>Statut</th>
                        <th>Prix_original</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach($listprod  as $item)
                     <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nom}}</td>
                        <td>{{$item->marque}}</td>
                        <td>{{$item->meta_mot_cle}}</td>
                        <td>{{$item->statut}}</td>
                        <td>{{$item->prix_original}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/produits/'.$item->image) }}" class="cate-image" alt="Image here">
                        </td>
                        <td>
                            <a href="{{ url('modifier-prod/'.$item->id) }}"><button class="btn btn-primary">Modifier</button></a>
                            <a href="{{ url('suprimer-prod/'.$item->id) }}">  <button class="btn btn-danger">Suprimer</button> </a>
                        </td>
                     </tr>
                    @endforeach 
                  </tbody>
              </table>
          </div>
      </div>
@endsection