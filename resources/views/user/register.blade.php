@extends('user.layout')
@section('main_content')
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
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                    required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Retype password" required>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-danger">Register</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.card -->
            </div>
        </section>
    </div>
@endsection
