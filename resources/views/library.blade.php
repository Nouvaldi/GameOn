@extends('layout.template')

@section('container')
    <div class="container-fluid p-3" style="margin-left: 280px;">


        {{-- Navbar --}}
        @include('partials.navbar')


        {{-- All Games --}}
        <div class="card my-3 border-0 shadow">
            <div class="card-body pb-0">
                <div class="row row-cols-3">
                    <div class="col-2 text-center">
                        <h5 class="card-title m-0">Title</h5>
                    </div>
                    <div class="col-6">
                    </div>
                    <div class="col-2 text-center">
                        <h5 class="card-title m-0">Time Played</h5>
                    </div>
                    <div class="col-2 text-center">
                        <h5 class="card-title m-0">Size</h5>
                    </div>
                </div>
            </div>
            <div class="card-body pb-5">
                <div class="d-none">{{ $i = 1 }}</div>
                    @if (count($library_data) == 0)
                        <div class="card border-0 text-bg-dark">
                            <div class="card-body text-center">
                                <h5 class="card-title">Empty.</h5>
                            </div>
                        </div>
                    @endif
                @foreach ($library_data as $data)
                    <div class="card mb-2 rounded border-0 text-bg-dark" data-aos="flip-up" data-aos-duration="{{ $i * 500 }}">
                        <div class="row row-cols-4">
                            <div class="col-3" style="height: 10vw">
                                <img src="{{ asset('storage/game-images/' . $data->games->image) }}" alt="" class="card-img h-100 w-100" style="object-fit: cover">
                            </div>
                            <div class="col-5 my-auto">
                                <h5 class="card-title">{{ $data->games->title }}</h5>
                                <div class="inline">
                                    <a href="" class="btn btn-primary me-1"><i class="bi bi-play-fill"></i> Play</a>
                                    <a href="/detail/{{ $data->game_id }}/{{ $data->games->title }}" class="btn btn-outline-secondary"><i class="bi bi-list-ul"></i> View Details</a>
                                </div>
                            </div>
                            <div class="col-2 my-auto text-center">
                                <p class="card-title text-muted">0h 0m</p>
                            </div>
                            <div class="col-2 my-auto text-center">
                                <p class="card-title text-muted">{{ $data->games->size }} GB</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-none">{{ $i += 0.2 }}</div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
