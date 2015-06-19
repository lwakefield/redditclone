<header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Reddit Clone 2</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <li class="navbar-text">Welcome {{ Auth::user()->name }}</li>
                        <li><a href="/logout">Log out</a></li>
                    @else
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Log in</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>