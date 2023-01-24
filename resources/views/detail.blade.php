@extends('layout.template')

@section('container')
    <div class="container-fluid p-3 bg-light" style="margin-left: 280px;">
        {{-- Navbar --}}
        @include('partials.navbar')


        {{-- Modal --}}
        @if (session()->has('success'))
            <div class="modal fade" id="successModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-bg-primary">
                        <div class="modal-header border-0">
                            <h5 class="modal-title"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        {{-- Detail Game --}}
        <div class="card my-3 border-0 shadow">
            <div class="card-body pb-0">
                <h5 class="card-title mb-3"><a href="/home" class="link-dark text-decoration-none"><i
                            class="bi bi-caret-left-fill"></i> Back</a></h5>
            </div>
            <div class="card-body pt-0">
                <div class="card border-0 shadow-sm g-3 mb-3">
                    <div class="rounded" style="max-height: 50vh; overflow: hidden;">
                        <img src="{{ asset('storage/game-images/' . $game_data->image) }}" alt=""
                            class="d-block w-100">
                    </div>
                    {{-- <div class="col">
                        <div class="card mb-3 border-0" style="max-height: 10vw; overflow: hidden;">
                        </div>
                        <img src="{{ $game_data->image }}" alt="" class="card-img-top" style="filter: blur(2px)">
                        <div class="card text-bg-dark shadow">
                            <div class="card-header text-center bg-primary bg-opacity-75">
                                <h5 class="card-title">{{ $game_data->title }}</h5>
                                <h6 class="card-subtitle fw-light">Genre: {{ $game_data->category->name }}</h6>
                            </div>
                            <div class="card-body text-center ">
                                @if ($game_data->discount !== null)
                                    @if ($game_data->price - $game_data->price * ($game_data->discount / 100) == 0)
                                        <p class="card-text text-secondary text-decoration-line-through">IDR. {{ $game_data->price }}<span class="badge bg-primary ms-2">-{{ $game_data->discount }}%</span></p>
                                        <p class="card-text">FREE</p>
                                    @else
                                        <p class="card-text text-secondary text-decoration-line-through">IDR. {{ $game_data->price }}<span class="badge bg-primary ms-2">-{{ $game_data->discount }}%</span></p>
                                        <p class="card-text">IDR. {{ $game_data->price - ($game_data->price * ($game_data->discount / 100)) }}</p>
                                    @endif
                                @else
                                    <p class="card-text">IDR. {{ $game_data->price - ($game_data->price * ($game_data->discount / 100)) }}</p>
                                @endif
                                @if ($game_data->discount == 100)
                                    @if (!$library_data)
                                        <form action="/library/{{ $game_data->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary px-5"><i class="bi bi-cart-plus"></i> Get</button>
                                        </form>
                                    @else
                                        <a href="/library" class="btn btn-primary px-5"><i class="bi bi-bar-chart-fill"></i> In Library</a>
                                    @endif
                                @else
                                    @if (!$library_data)
                                        <form action="/library/{{ $game_data->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary px-5"><i class="bi bi-cart-plus"></i> Purchase</button>
                                        </form>
                                    @else
                                        <a href="/library" class="btn btn-primary px-5"><i class="bi bi-bar-chart-fill"></i> In Library</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="row g-3">
                    <div class="col-3">
                        <div class="card bg-light border-0 shadow-sm">
                            <div class="card-header text-center bg-dark">
                                <h5 class="card-title text-bg-dark">{{ $game_data->title }}</h5>
                            </div>
                            <div class="card-body text-center ">
                                <p class="card-subtitle text-start mb-0"><span class="fw-bold">Developer: </span>{{ $game_data->developer }}</p>
                                <p class="card-subtitle text-start mb-3"><span class="fw-bold">Publisher: </span>{{ $game_data->publisher }}</p>
                                @if ($game_data->discount !== 0)
                                    @if ($game_data->total == 0)
                                        <p class="card-text text-secondary text-decoration-line-through">IDR.
                                            {{ $game_data->price }}<span
                                                class="badge bg-primary ms-2">-{{ $game_data->discount }}%</span></p>
                                        <p class="card-text"><i class="bi bi-tag-fill"></i> FREE</p>
                                    @else
                                        <p class="card-text text-secondary text-decoration-line-through">IDR.
                                            {{ $game_data->price }}<span
                                                class="badge bg-primary ms-2">-{{ $game_data->discount }}%</span></p>
                                        <p class="card-text"><i class="bi bi-tag-fill"></i> IDR. {{ $game_data->total }}</p>
                                    @endif
                                @else
                                    <p class="card-text"><i class="bi bi-tag-fill"></i> IDR. {{ $game_data->total }}</p>
                                @endif
                                @if (Auth::user()->admin == false)
                                    @if ($game_data->discount == 100)
                                        @if (!$library_data)
                                            <form action="/library/{{ $game_data->id }}" method="POST">
                                                @csrf
                                                <input type="number" class="d-none" name="total" id="total"
                                                    value="{{ $game_data->total }}">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bi bi-cart-plus"></i> Get</button>
                                            </form>
                                        @else
                                            <a href="/library" class="btn btn-primary"><i class="bi bi-bar-chart-fill"></i>
                                                In Library</a>
                                        @endif
                                    @else
                                        @if (!$library_data)
                                            <form action="/library/{{ $game_data->id }}" method="POST">
                                                @csrf
                                                <input type="number" class="d-none" name="total" id="total"
                                                    value="{{ $game_data->total }}">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bi bi-cart-plus"></i> Purchase</button>
                                            </form>
                                        @else
                                            <a href="/library" class="btn btn-primary"><i class="bi bi-bar-chart-fill"></i>
                                                In Library</a>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-light border-0 shadow-sm">
                            <div class="card-header bg-dark">
                                <h5 class="card-title text-bg-dark">Game Description</h5>
                            </div>
                            <div class="card-body ">
                                <p class="card-subtitle mb-3"><span class="fw-bold">Genre: </span>{{ $game_data->category->name }}</p>
                                <p>{{ $game_data->desc }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card bg-light border-0 shadow-sm">
                            <div class="card-header bg-dark">
                                <h5 class="card-title text-bg-dark">Minimum Specs</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><span class="fw-bold">OS: </span>{{ $game_data->spec->os }}</p>
                                <p class="card-text"><span class="fw-bold">Processor: </span>{{ $game_data->spec->processor }}</p>
                                <p class="card-text"><span class="fw-bold">Memory: </span>{{ $game_data->spec->memory }}</p>
                                <p class="card-text"><span class="fw-bold">Graphics: </span>{{ $game_data->spec->graphics }}</p>
                                <p class="card-text"><span class="fw-bold">Size: </span>{{ $game_data->size }} GB</p>
                            </div>
                        </div>
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
