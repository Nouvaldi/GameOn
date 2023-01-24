@extends('layout.template')

@section('container')
    <div class="container-fluid text-bg-dark">
        <div class="py-5"></div>
        <div class="row">
            <div class="col-lg-4 mx-auto" style="height: 100vh">
                <div class="container" data-aos="fade-up">
                    <h1 class="fw-bold mb-0">Welcome</h1>
                    <p class="mb-5"><i class="bi bi-box-arrow-in-down"></i> Register your account to continue</p>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-floating mb-3 text-dark">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name" value="{{ old('name') }}">
                            <label for="name">Name</label>
                            <div class="form-text">This will be your display name.</div>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 text-dark">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email Address" value="{{ old('email') }}">
                            <label for="email">Email Address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 text-dark">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 text-dark">
                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                            <label for="confirm_password">Confirm Password</label>
                            @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check mb-5">
                            <input class="form-check-input @error('agree') is-invalid @enderror" type="checkbox" name="agree" id="agree" >
                            <label class="form-check-label" for="agree">I agree to the terms and conditions @error('agree') <span class="text-danger"><i class="bi bi-exclamation-triangle-fill"></i></span> @enderror</label>
                            @error('agree')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="d-block px-5 mx-auto mb-2 btn btn-primary">Sign Up</button>
                    </form>
                    <div class="d-block text-center">
                        <p class="text-secondary">Already have an account? <a href="/login" class="link-light">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
