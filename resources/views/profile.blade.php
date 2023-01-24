@extends('layout.template')

@section('container')
    <div class="container-fluid p-3 bg-light" style="margin-left: 280px;">
        {{-- Navbar --}}
        @include('partials.navbar')


        {{-- All Games --}}
        <div class="row g-3">
            <div class="col-2">
                <div class="card bg-dark h-100 border-0"></div>
            </div>
            <div class="col">
                @if (session()->has('success'))
                    <div class="modal fade" id="successModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-bg-primary">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill"></i> {{ session('failed') }}</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Username or Email may already be in use.
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (session()->has('failedPass'))
                    <div class="modal fade" id="errorModal2">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-bg-danger">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill"></i> Error occured!</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ session('failedPass') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Profile</h5>
                        <form action="">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingName" placeholder="username" value="{{ Auth::user()->name }}" disabled>
                                <label for="floatingName">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" value="{{ Auth::user()->email }}" disabled>
                                <label for="floatingEmail">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" value="**********" disabled>
                                <label for="floatingPassword">Password</label>
                            </div>
                        </form>
                        <div class="d-block text-center">
                            <a href="/profile/edit" class="btn btn-primary">Edit Profile</a>
                            <a href="/profile/password" class="btn btn-light">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card bg-dark h-100 border-0"></div>
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
    @if (session()->has('failedPass'))
        <script>
            $(document).ready(function () {
                $('#errorModal2').modal('show');
            });
        </script>
    @endif
@endsection
