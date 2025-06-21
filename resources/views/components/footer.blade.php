<footer>
  <span>2024 All rights reserved</span>
  @auth
    <a class="footer-post" href="/create">Create Post</a>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
      @csrf
      <button type="submit" class="footer-post" style="background:none;border:none;color:inherit;cursor:pointer;">Logout</button>
    </form>
  @else
    <a class="footer-post" href="{{ route('login') }}">Login</a>
    <a class="footer-post" href="{{ route('register') }}">Sign Up</a>
  @endauth
</footer>
