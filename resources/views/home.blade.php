@extends('layout.template')

@section('container')
    <style>
        .loading-page {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
    </style>

    {{-- Loading --}}
    <div class="loading-page flex-column bg-dark" id="loadingPage">
        <div class="spinner-border text-primary" role="status"></div>
        <h5 class="text-light mt-3">Loading...</h5>
    </div>

    <div class="container-fluid p-3 bg-light" style="margin-left: 280px;">
        {{-- Navbar --}}
        @include('partials.navbar')


        {{-- Featured Games --}}
        <div class="card my-3 border-0 shadow">
            <div class="card-body pb-0">
                <h5 class="mb-0"><i class="bi bi-fire text-danger"></i> Featured Games</h5>
            </div>
            <div class="card-body">
                <section id="image-carousel" class="splide">
                    <div class="splide__track rounded">
                        <ul class="splide__list">
                            @foreach ($feat_discount as $data)
                                <li class="splide__slide">
                                    <div class="card border-0 text-bg-dark">
                                        <a href="/detail/{{ $data->id }}/{{ $data->title }}" class="text-decoration-none">
                                            <div class="row g-0">
                                                <div class="col-md-8" style="height: 60vh;">
                                                    <img src="{{ asset('storage/game-images/' . $data->image) }}" class="card-img img-fluid h-100" alt=".." style="object-fit: cover">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card-body text-light">
                                                        <h5 class="card-title">{{ $data->title }}</h5>
                                                        <p class="card-text text-wrap">{{ $data->desc }}</p>
                                                        <p class="text-muted text-decoration-line-through">IDR. {{ $data->price }} <span class="badge bg-primary ms-2">-{{ $data->discount }}%</span></p>
                                                        @if ($data->total == 0)
                                                            <p class="btn btn-primary">FREE</p>
                                                        @else
                                                            <p class="btn btn-primary">IDR. {{ $data->total }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>

        {{-- <div class="card my-3 border-0 shadow">
            <div class="card-body pb-0">
                <h5 class="mb-0"><i class="bi bi-fire text-danger"></i> Featured Games</h5>
            </div>
            <div class="card-body pt-0">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators w-25 mx-auto mb-4">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner rounded">
                        <div class="d-none">{{ $i = 1 }}</div>
                        @foreach ($feat_discount as $data)
                            <div class="carousel-item @if ($i == 1) active @endif">
                                <a href="/detail/{{ $data->id }}/{{ $data->title }}" class="text-decoration-none">
                                    <div class="card text-bg-dark">
                                        <div class="row g-0">
                                            <div class="col-7">
                                                <div class="card-img" style="height: 60vh;">
                                                    <img src="{{ asset('storage/game-images/' . $data->image) }}" class="h-100 w-100" alt=".." style="object-fit: cover">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card-body">
                                                    <h5 class="card-title fs-2 mb-3">{{ $data->title }}</h5>
                                                    <p class="card-text">{{ $data->desc }}</p>
                                                    <div class="row text-center">
                                                        <div class="col">
                                                            <span class="text-muted text-decoration-line-through">IDR. {{ $data->price }}</span>
                                                            <p class="badge bg-primary ms-3">-{{ $data->discount }}%</p>
                                                        </div>
                                                        <div class="">
                                                            @if ($data->total == 0)
                                                                <p class="btn btn-primary">FREE</p>
                                                            @else
                                                                <p class="btn btn-primary">IDR. {{ $data->total }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1"></div>
                                        </div>
                                    </div>
                                    <div class="card-img" style="height: 60vh;">
                                        <img src="{{ asset('storage/game-images/' . $data->image) }}" class="h-100 w-100" alt=".." style="object-fit: cover">
                                    </div>
                                    <div class="carousel-caption d-none d-md-block bg-dark">
                                        <h5 class="mb-3">{{ $data->title }}</h5>
                                        <div class="row mx-0 mb-3">
                                            <div class="col my-auto">
                                                <p class="badge bg-primary my-auto fs-4">-{{ $data->discount }}%</p>
                                            </div>
                                            <div class="col border-start border-end">
                                                <p class="mb-0 text-secondary text-decoration-line-through">IDR. {{ $data->price }}</p>
                                                @if ($data->total == 0)
                                                    <p class="mb-0">FREE</p>
                                                @else
                                                    <p class="mb-0">IDR. {{ $data->total }}</p>
                                                @endif
                                            </div>
                                            <div class="col my-auto">
                                                <p class="my-auto">{{ $data->category->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="carousel-item @if ($i == 1) active @endif">
                                <a href="/detail/{{ $data->id }}/{{ $data->title }}">
                                    <div class="card-img" style="height: 60vh;">
                                        <img src="{{ asset('storage/game-images/' . $data->image) }}" class="h-100 w-100" alt=".." style="object-fit: cover">
                                    </div>
                                    <div class="carousel-caption d-none d-md-block bg-dark">
                                        <h5 class="mb-3">{{ $data->title }}</h5>
                                        <div class="row mx-0 mb-3">
                                            <div class="col my-auto">
                                                <p class="badge bg-primary my-auto fs-4">-{{ $data->discount }}%</p>
                                            </div>
                                            <div class="col border-start border-end">
                                                <p class="mb-0 text-secondary text-decoration-line-through">IDR. {{ $data->price }}</p>
                                                @if ($data->total == 0)
                                                    <p class="mb-0">FREE</p>
                                                @else
                                                    <p class="mb-0">IDR. {{ $data->total }}</p>
                                                @endif
                                            </div>
                                            <div class="col my-auto">
                                                <p class="my-auto">{{ $data->category->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-none">{{ $i += 1}}</div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev bg-dark my-auto rounded-start" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev" style="width: 100px">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next bg-dark my-auto rounded-end" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next" style="width: 100px">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div> --}}


        {{-- All Games --}}
        <div class="card my-3 border-0 shadow">
            <div class="card-body pb-0">
                <h5 class="mb-3"><i class="bi bi-globe text-primary"></i> All Games</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row row-cols-4 g-2">
                    @foreach ($game_data as $data)
                        <div class="col">
                            <a href="/detail/{{ $data->id }}/{{ $data->title }}" class="text-dark text-decoration-none">
                                <div class="card border-0 h-100 text-bg-dark">
                                    <div class="" style="height: 20vh; overflow: hidden;">
                                        <img src="{{ asset('storage/game-images/' . $data->image) }}" alt="" class="card-img-top h-100 w-100" style="object-fit: cover">
                                    </div>
                                    <div class="card-img-overlay text-end">
                                        @if ($data->discount > 0)
                                            <p class="badge bg-primary fs-6">-{{ $data->discount }}%</p>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-0 text-truncate overflow-hidden">{{ $data->title }}</h5>
                                        <div class="d-flex pb-3">
                                            @if ($data->discount > 0)
                                                <p class="mb-0 me-auto text-muted text-decoration-line-through">IDR. {{ $data->price }}</p>
                                            @else
                                                @if ($data->total == 0)
                                                    <p class="mb-0">FREE</p>
                                                @else
                                                    <p class="mb-0 me-auto">IDR. {{ $data->total }}</p>
                                                @endif
                                            @endif
                                            @if ($data->discount > 0)
                                                @if ($data->discount == 100)
                                                    <p class="mb-0">FREE</p>
                                                @else
                                                    <p class="mb-0">IDR. {{ $data->total }}</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col">
                        <a href="/home/all-games" class="text-dark text-decoration-none" id="card-hover">
                            <div class="card border-0 h-100 text-bg-dark" id="game-hover">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h5 class="card-title">View More <i class="bi bi-caret-right-fill"></i></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Loading script --}}
    <script>
        $(document).ready(function () {
            $('#loadingPage').hide();
        });

        $(window).on('beforeunload', function() {
            $('#loadingPage').show();
        });

        $(window).on('load', function() {
            $('#loadingPage').hide();
        });
    </script>

    {{-- Splide carousel script --}}
    <script>
        document.addEventListener( 'DOMContentLoaded', function() {
            var splide = new Splide( '.splide', {
                type    : 'loop',
                drag    : true,
                gap     : '1rem',
                snap    : true,
                perPage : 1,
                autoplay: true,
            } );

            splide.mount();
        } );
    </script>
@endsection
