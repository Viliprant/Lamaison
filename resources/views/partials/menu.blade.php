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
      </ul>
    </div>
  </div>
  </nav>