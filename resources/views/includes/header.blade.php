<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="/">Social Network</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                      @if(Auth::user())
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Welcome | {{ $user->first_name }}
                        </a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          
                          <a class="dropdown-item" href="/account">Account</a>
                          <a class="dropdown-item" href="/dashboard">Dashboard</a>
                          <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                      @endif
                    </li>

                   
                  </ul>
                  
                </div>
              </nav>
</header>