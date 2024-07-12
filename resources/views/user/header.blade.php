<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">Yummy</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li>
                    <input type="text" id="search" class="form-control" placeholder="Search food...">
                </li>
                <li><a href="{{ route('home') }}">Home<br></a></li>
                <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="{{ route('category_by_id', ['id' => $category->id, 'category_name' => $category->name]) }}">{{ $category->name }}</a></li>
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
                    if (query.length > 2) {
                        $.ajax({
                            url: '{{ route('search') }}',
                            type: 'GET',
                            data: {
                                'query': query
                            },
                            success: function(products) {
                                var resultsContainer = $('#search-results');
                                var menuContent = `
                                <section id="menu" class="menu section">
                                    <div class="container section-title" data-aos="fade-up">
                                        <p><span>Check Our</span> <span class="description-title">Yummy Foods</span></p>
                                    </div>
                                    <div class="container">
                                        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                                            <div class="tab-pane fade active show" id="menu-starters">
                                                <div class="row gy-5">`;

                                products.forEach(function(product) {
                                    menuContent += `
                                    <div class="col-lg-4 menu-item">
                                        <a href="assets/img/menu/menu-item-1.png" class="glightbox">
                                            <img src="${asset('images') + '/' + product.image}" class="menu-img img-fluid" alt="">
                                        </a>
                                        <h4>${product.name}</h4>
                                        <p class="ingredients">${product.description}</p>
                                        <p class="price">$ ${product.price}</p>
                                    </div>`;
                                });

                                menuContent += `
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>`;

                                resultsContainer.html(menuContent);
                                $('#original-div').hide(); // Hide the original div
                            }
                        });
                    } else {
                        $('#search-results').empty();
                        $('#original-div').show(); // Show the original div
                    }
                });
            });

            function asset(path) {
                return '{{ asset('') }}' + path;
            }
        </script>

    </div>
</header>

<div id="search-results"></div>

