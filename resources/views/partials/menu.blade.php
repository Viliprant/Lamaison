<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container d-flex flex-column align-items-start">
    <div class="d-block pl-2">
      <a class="navbar-brand " href="#"><span class="font-weight-bold">Boutique</span> La Maison</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        {{-- Si on est sur le ressource controller --}}
        @if(Route::currentRouteName() === 'admin.index' || Route::currentRouteName() === 'admin.create' || Route::currentRouteName() === 'admin.edit')
          <li class="nav-item">
            <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Retour à l'accueil</a>
          </li>
          <li class="nav-item">
            <li class="{{Route::currentRouteName() == 'admin.index' ? 'active' : '' }} nav-item"><a class="nav-link" href="{{route('admin.index')}}">Dashboard</a>
          </li>
          <li class="nav-item">
            <li class="{{ Route::currentRouteName() == 'admin.create' ? 'active' : '' }} nav-item"><a class="nav-link" href="{{route('admin.create')}}">Ajouter un produit</a>
          </li>

        @else

          <li class="nav-item">
            <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }} nav-item"><a class="nav-link" href="{{route('home')}}">Accueil</a>
          </li>
          <li class="nav-item">
            <li class="{{ Route::currentRouteName() == 'show_solde' ? 'active' : '' }} nav-item"><a class="nav-link" href="{{route('show_solde')}}">Solde</a>
          </li>
          @foreach($categories as $id => $title)
              <li class="nav-item">
                <li class="{{ request()->id == $id ? 'active' : '' }} nav-item"><a class="nav-link" href="{{route('show_category', $id)}}">{{ $title }}</a></li>
            </li>
          @endforeach

        @endif

      </ul>
    </div>
  </div>
  </nav>