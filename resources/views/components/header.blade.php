<header class="header">
  <nav class="navbar">
    <div class="container">
      <a href="/" class="navbar-brand">ArtGallery</a>

      <div class="navbar-nav" style="display: flex; align-items: center;">
        @auth
          <div style="display: flex; align-items: center; gap: 16px; margin-left: 24px;">
            <a href="/create" class="nav-btn">Create Post</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit" class="nav-btn logout-btn">
                Logout
              </button>
            </form>
          </div>
        @else
          <a href="{{ route('login') }}" class="nav-btn">Login</a>
          <a href="{{ route('register') }}" class="nav-btn">Sign Up</a>
        @endauth
      </div>
    </div>
  </nav>

  {{-- Optional Banner --}}
  {{$slot}}
</header>
