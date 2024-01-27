<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.commerce', 'Commerce') }}</title>

    

    <!-- des liens importées depuis bootstrap  --> 
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">



  <!-- mes propres liens Styles css qui se trouvent ds le dossier admin/css puis ds le fichier respective --> 
<link  href="{{ asset('admin/css/material-dashboard.min.css') }}" rel="stylesheet" /> <!-- lien propre a moi reference du fichier css sur le dossier publique -->
<link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet"> <!-- lien propre a moi reference du fichier css sur le dossier publique -->
</head>
<body>
    
    <div class="wrapper">
      @include('layouts.inc.sidebar')
          <div class="main-panel">
        @include('layouts.inc.adminnav')

           <div class="content">
             @yield('content')
           </div>
           @include('layouts.inc.adminfooter')
         </div>
    </div>
    <!-- ma propre Scripts qui se trouve ds le dosier admin/js puis ds le fichier bootstrap.bundle.min.js -->
    <script src="{{ asset('admin/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/bootstrap-material-design.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js') }}" defer></script>
     @yield('cripts')
  </body>
</html>
