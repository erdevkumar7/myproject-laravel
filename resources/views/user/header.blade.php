<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">Yummy</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}">Home<br></a></li>
                <li class="dropdown"><a href="#"><span>Menu</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="{{route('category_by_id', $category->id)}}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @if (Auth::check())
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
