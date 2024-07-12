<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">Yummy</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><input type="text" id="search" class="form-control" placeholder="Search food..."></li>
                <li><a href="{{ route('home') }}">Home<br></a></li>
                <li class="dropdown"><a href="#"><span>Menu</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="{{ route('category_by_id', $category->id) }}">{{ $category->name }}</a></li>
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#search').on('keyup', function() {
                    let query = $(this).val();
                    $.ajax({
                        url: '{{ route('search') }}',
                        type: 'GET',
                        data: {
                            'query': query
                        },
                        success: function(products) {
                            console.log(products)
                            // window.location.href = '{{ route('search') }}?query=' + query;
                        }
                    });
                });
            });
        </script>
    </div>
</header>
