<div class="sidenav">
    <a href="/"><h1>Convert2Cash</h1></a>
    <hr>
    <ul>
        <li>
            <a href="/clients">Clients</a>
        </li>
        <li>
            <a href="/stock">Stock</a>
        </li>
        <li>
            <a href="/buyin">Buy-In</a>
        </li>
        <li>
            <a href="/buyback">Buy-Back</a>
        </li>
        <li>
            <a href="/sales">Sales</a>
        </li>
        <li>
            <a href="/layaways">Layaways</a>
        </li>
    </ul>
    <div class="row align-items-end justify-content-center auth">
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