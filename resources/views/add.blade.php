@extends('layout.template')

@section('container')
    <div class="container-fluid p-3" style="margin-left: 280px;">
        {{-- Navbar --}}
        @include('partials.navbar')


        {{-- Table --}}
        <div class="card my-3 border-0 shadow">
            <div class="card-body">
                <form action="/admin/add-new-game" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category" id="category">
                                @foreach ($category_data as $data)
                                    @if (old('category') == $data->id)
                                        <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                                    @endif
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="desc" class="form-label">Description</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="3">{{ old('desc') }}</textarea>
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
                                    name="price" id="price" value="{{ old('price') }}">
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
                                    name="discount" id="discount" value="{{ old('discount') }}">
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
                                    name="size" id="size" value="{{ old('size') }}">
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
                                    @if (old('specs') == $data->id)
                                        <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                                    @endif
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                id="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            <a href="/admin/manage-games" class="btn btn-light">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
