
<header>
    <nav class="w3-bar">
        @auth
            <a href="{{ route('rooms.index') }}" class="w3-bar-item w3-button">Rooms</a>
            <span>
                Hi there, {{ Auth::user()->name }}
            </span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('show.login') }}" class="btn">Login</a>
            <a href="{{ route('show.register') }}" class="btn">Register</a>
        @endguest

    </nav>
  </header>