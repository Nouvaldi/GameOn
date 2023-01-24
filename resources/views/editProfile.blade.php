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
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Edit Profile</h5>
                        <form action="/profile/edit" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingName" placeholder="username" value="{{ Auth::user()->name }}" autofocus>
                                <label for="floatingName">Username</label>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingEmail" placeholder="name@example.com" value="{{ Auth::user()->email }}">
                                <label for="floatingEmail">Email address</label>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="d-block text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
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
@endsection
