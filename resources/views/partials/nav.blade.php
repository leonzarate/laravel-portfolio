<nav class="navbar bg-white shadow-sm">
    <a class ="navbar-brand" href=" route('home')">
        {{ config('app.name')}}
    </a>
    
    <ul class="nav">
        <li class="nav-item {{ setActive('home') }}">
            <a class="nav-link" href="{{ route('home') }}">
                @lang('Home')
            </a>
        </li>
        <li class="{{ setActive('about') }}">
            <a href="{{ route('about') }}">
                @lang('About')
            </a>
        </li>
        <li class="{{ setActive('projects.*') }}">
            <a href="{{ route('projects.index') }}">
                @lang('Projects')
            </a>
        </li>
        <li class="{{ setActive('contact') }}">
            <a href="{{ route('contact') }}">
                @lang('Contact')
            </a>
        </li>
        
        @guest
            <li><a href="{{ route('login') }}">@lang('Login')</a></li>
        @else
            <li>
                <a href="#" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ auth()->user()->name}} - Cerrar sesión
                </a>
            </li>
        @endguest
    </ul>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>