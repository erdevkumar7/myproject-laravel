@extends('user.layout')
@section('main_content')
    <!-- Menu Section -->
    <section id="menu" class="menu section">
        <div class="container section-title" data-aos="fade-up">
            <p><span>Check Our</span> <span class="description-title">{{$category_name}}</span></p>
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
@endsection

