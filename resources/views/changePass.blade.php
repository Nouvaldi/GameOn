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
                        <h5 class="card-title mb-3">Change Password</h5>
                        <form action="/profile/password" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="floatingPassword" placeholder="password" autofocus>
                                <label for="floatingPassword">Old Password</label>
                                @error('old_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="floatingPassword2" placeholder="password">
                                <label for="floatingPassword2">New Password</label>
                                @error('new_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" id="floatingPassword3" placeholder="password">
                                <label for="floatingPassword3">Confirm Password</label>
                                @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="d-block text-center">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <a href="/profile" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card bg-dark h-100 border-0"></div>
            </div>
        </div>
    </div>
    @if (session()->has('failedPass'))
        <script>
            $(document).ready(function () {
                $('#errorModal2').modal('show');
            });
        </script>
    @endif
@endsection
