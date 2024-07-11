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
                    <li><a href="{{route('home')}}" >Home<br></a></li>
                    <li><a href="#menu">Menu</a></li>
                    @if(Auth::check())  <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    @else
                    <li><a href="{{route('login')}}" >Login</a></li>
                    <li><a href="{{route('register')}}">Register</a></li>                        
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">
        <!-- Register Section -->
        <div class="d-flex justify-content-center align-items-center vh-95">
        <section id="register" class="register section col-8  ">
              <!-- Section Title -->
              <div class="container section-title" data-aos="fade-up">
                <p><span>Book Your</span> <span class="description-title">stay with Us</span></p>
                <h2>Login<br></h2>
            </div>

            <div class="register-box">
                <div class="card">
                    <div class="card-body register-card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('loginSave') }}" method="post">
                            @csrf
                            <div class="input-group mb-3 mt-3">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Email" required>
                            </div>
                            <div class="input-group mb-3 mt-2">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" required>
                            </div>
                   
                            <div class="text-end" >
                            <button type="submit" class="btn btn-danger">Login</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.card -->
            </div>
        </section>
       </div>
    </main>

    @endsection

  