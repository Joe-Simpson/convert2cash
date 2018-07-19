<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <div class="navbar-brand col-sm-3 col-md-2 mr-0"><a href="/">Convert2Cash</a></div>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      @if( Auth::check() )
        <a href="">{{ Auth::user()->name }}</a>&nbsp;
        <a href="/logout">Logout</a>
      @else
        <a href="/login">Login</a>
        <a href="/register">Register</a>
      @endif
    </li>
  </ul>
</nav>