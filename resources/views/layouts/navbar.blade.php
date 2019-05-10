<nav class="navbar navbar-expand-md navbar-light onsite-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'OnSite') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
               
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    <button type="submit" class="btn btn-success">
                        {{ __('Login') }}
                    </button>
                </form>
                    
                @else
                    <li class="nav-item onsite-link">
                        <a href="{{ route('profile', ['slug' => Auth::user()->slug ]) }}">
                            <img src="{{ Auth::user()->avatar }}" width="30px" height="30px" alt="{{ Auth::user()->name }}">
                            {{ Auth::user()->name }} 
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @auth
                                <a class="dropdown-item" href="{{ route('profile', ['slug' => Auth::user()->slug ]) }}">My Profile</a>
                                <a href="{{ route('stories.index') }}" class="dropdown-item">Stories</a>
                                <a href="{{ route('friends') }}" class="dropdown-item">Friends</a>
                            @endauth
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>