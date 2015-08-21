<nav class="masthead-nav">
  @if (Auth::check())
    <a href="{{ url('/dashboard') }}">Dashboard</a>
    <a href="{{ url('/notices/create') }}">Create Notice</a>
  @else
    <a href="/">Home</a>
  @endif

  @if (Auth::check())
    <!-- <a href="{{ url('/dashboard') }}">Dashboard</a> -->
    <a href="{{ url('/auth/logout') }}">Logout</a>
    <span>{{ Auth::user()->email }}</span>
  @else
    <a href="{{ url('/auth/login') }}">Login</a>
  @endif
</nav>