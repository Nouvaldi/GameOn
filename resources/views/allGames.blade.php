@extends('layout.template')

@section('container')
    <div class="container-fluid p-3 bg-light" style="margin-left: 280px;">
        {{-- Navbar --}}
        @include('partials.navbar')


        {{-- All Games --}}
        <div class="card my-3 border-0 shadow">
            <div class="card-body pb-0">
                <h5 class="mb-3"><i class="bi bi-globe text-primary"></i> All Games</h5>
                @if ($search)
                    <h6 class="card-subtitle mb-3">Search result for: "{{ $search }}"</h6>
                @endif
            </div>
            <div class="card-body pt-0">
                <div class="row row-cols-4 g-2">
                    @foreach ($game_data as $data)
                        <div class="col">
                            <a href="/detail/{{ $data->id }}/{{ $data->title }}" class="text-dark text-decoration-none">
                                <div class="card border-0 text-bg-dark">
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
                                                <p class="mb-0 me-auto text-muted text-decoration-line-through">IDR.
                                                    {{ $data->price }}</p>
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
                </div>
            </div>
        </div>
    </div>
@endsection
