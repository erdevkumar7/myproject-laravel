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
        <div class="d-flex justify-content-center align-items-center vh-100">
        <section id="register" class="register section col-8">
              <!-- Section Title -->
              <div class="container section-title" data-aos="fade-up">
                <p><span>Happy</span> <span class="description-title">Connect</span></p>
                <h2>Register Your-Self<br></h2>
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

                        <form action="{{ route('registerSave') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type='text' name="name" id="name" class="form-control"
                                    placeholder="Full name" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Email" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Retype password" required>
                            </div>
                            <div class="text-end" >
                            <button type="submit" class="btn btn-danger">Register</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.card -->
            </div>
        </section>
       </div>
    </main>

    @endsection

  