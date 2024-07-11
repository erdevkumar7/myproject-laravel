@extends('user.layout')
@section('main_content')
    <!-- Login Section -->
    <div class="d-flex justify-content-center align-items-center vh-95">
        <section id="login" class="login section col-8  ">
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
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                    required>
                            </div>
                            <div class="input-group mb-3 mt-2">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-danger">Login</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.card -->
            </div>
        </section>
    </div>
@endsection
