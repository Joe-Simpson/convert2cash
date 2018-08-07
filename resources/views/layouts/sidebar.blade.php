<div class="sidenav">
    <a href="/">Convert2Cash</a>
    <hr>
    <ul>
        <li class="">
            <a href="/clients">Clients</a>
        </li>
        <li class="">
            <a href="#">Placeholder</a>
        </li>
        <li class="">
            <a href="#">Placeholder</a>
        </li>
        <li class="">
            <a href="#">Placeholder</a>
        </li>
        <li class="">
            <a href="#">Placeholder</a>
        </li>
        <li class="auth">
          @if( Auth::check() )
            <a href="">{{ Auth::user()->name }}</a>
            <a href="/logout">Logout</a>
          @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
          @endif
        </li>    
    </ul>
</div>