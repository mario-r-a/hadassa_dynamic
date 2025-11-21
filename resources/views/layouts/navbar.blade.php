<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #1b2f66;">
  <div class="container">

    {{-- Logo --}}
    <a class="navbar-brand" href="{{ url('/') }}">Hadassa Mur & Baut</a>

    {{-- Mobile Toggle --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      {{-- Left Menu --}}
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link @if(Route::is('home')) active @endif" href="{{ route('home') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link @if(Route::is('products.index')) active @endif" href="{{ route('products.index') }}">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link @if(Route::is('about')) active @endif" href="{{ route('about') }}">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link @if(Route::is('contact')) active @endif" href="{{ route('contact') }}">Contact</a>
        </li>
      </ul>

      {{-- Right Menu (User / Admin / Guest) --}}
      <ul class="navbar-nav ms-4">

        @guest
          {{-- GUEST (Belum login) --}}
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
        @endguest

        @auth
          {{-- MEMBER --}}
          @if(auth()->user()->status === 'member')
            <li class="nav-item">
              <a class="nav-link @if(Route::is('orders.my')) active @endif" href="{{ route('orders.my') }}">
                My Orders
              </a>
            </li>
          @endif

          {{-- ADMIN --}}
          @if(auth()->user()->status === 'admin')
            <li class="nav-item">
              <a class="nav-link @if(Route::is('admin.orders')) active @endif" href="{{ route('admin.orders') }}">
                Orders
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link @if(Route::is('admin.reviews')) active @endif" href="{{ route('admin.reviews') }}">
                Reviews
              </a>
            </li>
          @endif

          {{-- DROPDOWN USER --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
               data-bs-toggle="dropdown">
              {{ auth()->user()->name }}
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
              </li>

              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="dropdown-item text-danger" type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </li>

        @endauth

      </ul>

    </div>
  </div>
</nav>
