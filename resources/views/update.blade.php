@extends('layout.template')

@section('container')
    <div class="container-fluid p-3" style="margin-left: 280px;">


        {{-- Navbar --}}
        @include('partials.navbar')


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

        {{-- Table --}}
        <div class="card my-3 border-0 shadow">
            <div class="card-body">
                <form action="/admin/update/{{ $game_data->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" value="{{ $game_data->title }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="developer" class="form-label">Developer</label>
                            <input type="text" class="form-control @error('developer') is-invalid @enderror" name="developer"
                                id="developer" value="{{ $game_data->developer }}">
                            @error('developer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="publisher" class="form-label">Publisher</label>
                            <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher"
                                id="publisher" value="{{ $game_data->publisher }}">
                            @error('publisher')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category" id="category">
                                @foreach ($category_data as $data)
                                    @if ($game_data->category_id == $data->id)
                                        <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="desc" class="form-label">Description</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="3">{{ $game_data->desc }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group">
                                <div class="input-group-text">IDR.</div>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" id="price" value="{{ $game_data->price }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="discount" class="form-label">Discount</label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('discount') is-invalid @enderror"
                                    name="discount" id="discount" value="{{ $game_data->discount }}">
                                <div class="input-group-text">%</div>
                                @error('discount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="size" class="form-label">Size</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('size') is-invalid @enderror"
                                    name="size" id="size" value="{{ $game_data->size }}">
                                <div class="input-group-text">GB</div>
                                @error('size')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="specs" class="form-label">Specs</label>
                            <select class="form-select" name="specs" id="specs">
                                @foreach ($spec_data as $data)
                                    @if ($game_data->spec_id == $data->id)
                                        <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label">Game Image</label>
                            <div class="card-img mb-3">
                                <img src="{{ asset('storage/game-images/' . $game_data->image) }}" alt=""
                                    class="card-img">
                            </div>
                            <input type="text" class="form-control" value="{{ $game_data->image }}" disabled>
                            <input type="hidden" name="oldImage" value="{{ $game_data->image }}">
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label">New Game Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" id="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/admin/manage-games" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>
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
