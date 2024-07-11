@extends('user.user_layouts.app')
@section('content')

    <body class="index-page">

        <header id="header" class="header d-flex align-items-center sticky-top">
            <div class="container position-relative d-flex align-items-center justify-content-between">

                <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                    <h1 class="sitename">Yummy</h1>
                    <span>.</span>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('home') }}" class="active">Home<br></a></li>
                        <li><a href="#menu">Menu</a></li>
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

        <main class="main">

            <!-- Hero Section -->
            <section id="hero" class="hero section light-background">

                <div class="container">
                    <div class="row gy-4 justify-content-center justify-content-lg-between">
                        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                            <h1 data-aos="fade-up">Enjoy Your Healthy<br>Delicious Food</h1>
                            <p data-aos="fade-up" data-aos-delay="100">We are team of talented designers making websites
                                with Bootstrap</p>
                            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                                <a href="#book-a-table" class="btn-get-started">Booka a Table</a>
                                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                                    class="glightbox btn-watch-video d-flex align-items-center"><i
                                        class="bi bi-play-circle"></i><span>Watch Video</span></a>
                            </div>
                        </div>
                        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                        </div>
                    </div>
                </div>

            </section><!-- /Hero Section -->


            <!-- Menu Section -->
            <section id="menu" class="menu section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Our Menu</h2>
                    <p><span>Check Our</span> <span class="description-title">Yummy Menu</span></p>
                </div><!-- End Section Title -->

                <div class="container">
                    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                                <h4>Starters</h4>
                            </a>
                        </li><!-- End tab nav item -->
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                                <h4>Breakfast</h4>
                            </a><!-- End tab nav item -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                                <h4>Lunch</h4>
                            </a>
                        </li><!-- End tab nav item -->

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                                <h4>Dinner</h4>
                            </a>
                        </li><!-- End tab nav item -->

                    </ul>

                    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade active show" id="menu-starters">
                            <div class="tab-header text-center">
                                <p>Menu</p>
                                <h3>Starters</h3>
                            </div>
                            <div class="row gy-5">                
                                {{-- <div class="col-lg-4 menu-item">
                                    <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img
                                            src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid"
                                            alt=""></a>
                                    <h4>Aut Luia</h4>
                                    <p class="ingredients">
                                        Lorem, deren, trataro, filede, nerada
                                    </p>
                                    <p class="price">
                                        $14.95
                                    </p>
                                </div> --}}
                                <!-- Menu Item -->
                                
                                @foreach ($products as $product)
                                <div class="col-lg-4 menu-item">
                                    <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img
                                      src="{{ asset('images').'/'.$product->image }}" class="menu-img img-fluid"
                                            alt=""></a>
                                    <h4>{{ $product->name }}</h4>
                                    <p class="ingredients">
                                        {{ $product->description }}
                                    </p>
                                    <p class="price">
                                       $ {{ $product->price }}
                                    </p>
                                </div><!-- Menu Item -->
                                @endforeach

                            </div>
                        </div><!-- End Starter Menu Content -->
                    </div>
                </div>
            </section><!-- /Menu Section -->


        </main>
    @endsection
