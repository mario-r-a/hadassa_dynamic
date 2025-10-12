<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #1b2f66;">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Hadassa Mur & Baut</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link @if(Route::is('home')) active @endif" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link @if(Route::is('products')) active @endif" href="{{ route('products') }}">Products</a></li>
        <li class="nav-item"><a class="nav-link @if(Route::is('about')) active @endif" href="{{ route('about') }}">About</a></li>
        <li class="nav-item"><a class="nav-link @if(Route::is('contact')) active @endif" href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>