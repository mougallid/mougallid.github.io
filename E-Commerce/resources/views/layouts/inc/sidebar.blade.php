<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
        Commerce Ben Ali
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('TableDeBord') ? 'active':'' }}" >
            <a class="nav-link" href="{{ url('TableDeBord') }}">
              <i class="material-icons">Tableau de Bord</i>
              <p>Tableau de Bord</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('categories') ? 'active': '' }} ">
            <a class="nav-link" href="{{ url('categories') }}">
              <i class="material-icons">Categories</i>
              <p>Table De Categories</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('ajoute-categorie') ? 'active' : ''}} ">
            <a class="nav-link" href="{{ url('ajoute-categorie') }}">
              <i class="material-icons">Categorie</i>
              <p>Ajouté Categories</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('produits') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('produits') }}">
              <i class="material-icons">Produits</i>
              <p>Table De Produits</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('ajoute-produit') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('ajoute-produit') }}">
              <i class="material-icons">Produit</i>
              <p>Ajouté-Produit</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
