<nav class="navbar navbar-expand-md navbar-theme fixed-top">
    <div class="container">
        <a class="navbar-brand pl-2 p-sm-0" href="#">
            <img src="https://via.placeholder.com/150x50">
        </a>
        <button class="navbar-toggler m-2 m-md-0" type="button" data-toggle="collapse" data-target="#toggle-nav"
            aria-controls="toggle-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="toggle-nav">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="{{ url('/') }}">Home</a>
                <a class="nav-item nav-link" href="{{ url('about') }}">About</a>
                <a class="nav-item nav-link" href="{{ url('product') }}">Products</a>
                <a class="nav-item nav-link" href="{{ url('infrastructure') }}">Infrastructure</a>
                <a class="nav-item nav-link" href="{{ url('team') }}">Team</a>
            </div>
        </div>
    </div>
</nav>