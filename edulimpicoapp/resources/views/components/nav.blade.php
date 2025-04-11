<header>
    <nav class="w3-bar w3-light-grey w3-card">
        <div class="w3-container">
            <div class="w3-left">
                <a href="{{ route('rooms.index') }}" class="w3-bar-item w3-button w3-hover-blue">
                    <i class="fa fa-home"></i> Home
                </a>
                @auth
                    <a href="{{ route('rooms.create') }}" class="w3-bar-item w3-button w3-hover-blue">
                        <i class="fa fa-plus"></i> Create Room
                    </a>
                    <a href="{{ route('questions.index') }}" class="w3-bar-item w3-button w3-hover-blue">
                        <i class="fa fa-question-circle"></i> Questions
                    </a>
                    <a href="{{ route('rankings.index') }}" class="w3-bar-item w3-button w3-hover-blue">
                        <i class="fa fa-trophy"></i> Rankings
                    </a>
                    <a href="{{ route('subscriptions.index') }}" class="w3-bar-item w3-button w3-hover-blue">
                        <i class="fa fa-users"></i> Subscriptions
                    </a>
                @endauth
            </div>
            
            <div class="w3-right">
                @auth
                    <div class="w3-dropdown-hover">
                        <button class="w3-button w3-hover-blue">
                            <i class="fa fa-user"></i> {{ Auth::user()->name }}
                        </button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <form action="{{ route('logout') }}" method="POST" class="w3-bar-item">
                                @csrf
                                <button type="submit" class="w3-button w3-hover-red" style="width:100%; text-align:left">
                                    <i class="fa fa-sign-out"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('show.login') }}" class="w3-bar-item w3-button w3-hover-blue">
                        <i class="fa fa-sign-in"></i> Login
                    </a>
                    <a href="{{ route('show.register') }}" class="w3-bar-item w3-button w3-hover-blue">
                        <i class="fa fa-user-plus"></i> Register
                    </a>
                @endguest
            </div>
        </div>
    </nav>
</header>

<style>
    .w3-dropdown-content {
        min-width: 120px;
    }
    .w3-dropdown-content button {
        padding: 8px 16px;
    }
</style>