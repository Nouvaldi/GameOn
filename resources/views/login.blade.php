@extends('layout.template')

@section('container')
    <div class="container-fluid text-bg-dark" style="min-height: 100vh">
        <div class="py-5"></div>
        <div class="row">
            <div class="col-lg-4 mx-auto">
                @if (session()->has('success'))
                    <div class="modal fade" id="successModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-bg-primary">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title"><i class="bi bi-check-circle-fill"></i> Sign up complete!</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ session('success') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (session()->has('failed'))
                    <div class="modal fade" id="errorModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-bg-danger">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill"></i> Login Error</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ session('failed') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                <div class="container" data-aos="fade-up">
                    <h1 class="fw-bold mb-0">Welcome</h1>
                    <p class="mb-5"><i class="bi bi-box-arrow-in-right"></i> Login to your account to continue</p>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-floating mb-3 @error('email') is-invalid @enderror text-dark">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                id="email" placeholder="email@email.com" value="{{ old('email') }}" autofocus>
                            <label for="email">Email Address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 @error('password') is-invalid @enderror text-dark">
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" id="password" placeholder="password">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check mb-5">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <button type="submit" class="d-block px-5 mx-auto mb-3 btn btn-primary">Login</button>
                    </form>
                    <div class="d-block text-center">
                        <p class="text-secondary">Don't have an account? <a href="/register" class="link-light">Sign Up</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @if (session()->has('failed'))
        <script>
            $(document).ready(function () {
                $('#errorModal').modal('show');
            });
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            $(document).ready(function () {
                $('#successModal').modal('show');
            });
        </script>
    @endif
@endsection
