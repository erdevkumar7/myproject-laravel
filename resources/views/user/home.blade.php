@extends('user.layout')
@section('main_content')
   <div id="search-results"></div>
   <div id="original-div">
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
                        <a href="https://youtu.be/Cz0et7LU2_8?si=D4V9glGrkahbWzw7"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>

    <!-- Menu Section -->
    <section id="menu" class="menu section">
        <div class="container section-title" data-aos="fade-up">
            <p><span>Check Our</span> <span class="description-title">Yummy Foods</span></p>
        </div>
        <div class="container">
            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
 
                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="row gy-5">
                        @foreach ($products as $product)
                            <div class="col-lg-4 menu-item">
                                <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img
                                        src="{{ asset('images') . '/' . $product->image }}" class="menu-img img-fluid"
                                        alt=""></a>
                                <h4>{{ $product->name }}</h4>
                                <p class="ingredients">
                                    {{ $product->description }}
                                </p>
                                <p class="price">
                                    $ {{ $product->price }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
   </div>
@endsection
