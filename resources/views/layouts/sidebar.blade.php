<div class="sidenav">
    <a href="/">Convert2Cash</a>
    <hr>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="/clients">Clients</a>
        </li>
        <li class="list-group-item">
            <a href="/stock">Stock</a>
        </li>
    </ul>
    <div class="row justify-content-center auth">
        @if( Auth::check() )
            <div class="col">
                <a href="">{{ Auth::user()->name }}</a>
            </div>
            <div class="col">
                <a href="/logout">Logout</a>
            </div>
        @else
            <div class="col">
                <a href="/login">Login</a>
            </div>
            <div class="col">
                <a href="/register">Register</a>
            </div>
        @endif
    </div>
</div>