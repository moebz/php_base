<nav class="navbar navbar-dark bg-dark navbar-expand-sm navbar-static-top">
    <div class="container">
        <a class="navbar-brand" href="/home">Acme</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/registerform">Register</a>
                </li>
                @if(Acme\auth\LoggedIn::user())
                    <li class="nav-item">
                        <a class="nav-link" href="/testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/add-testimonial">Add a testimonial</a>
                    </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if ( (Acme\Auth\LoggedIn::user()) && (Acme\Auth\LoggedIn::user()->access_level == 2) )
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" onclick="makePageEditable(this)">Edit Page</a>
                        <!-- <a class="dropdown-item" href="#">Another action</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/admin/page/add">Add page</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <i class="fas fa-unlock-alt"></i> Logout
                        </a>
                    </li>
                @elseif (Acme\auth\LoggedIn::user())
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <i class="fas fa-unlock-alt"></i> Logout
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="fas fa-unlock-alt"></i> Login
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>