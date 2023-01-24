@extends('layout.template')

@section('container')
    <div class="container-fluid p-3" style="margin-left: 280px;">


        {{-- Navbar --}}
        @include('partials.navbar')


        {{-- Table --}}
        <div class="card my-3 border-0 shadow">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col">Description</th>
                            <th scope="col">Size</th>
                            <th scope="col">Specs</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($game_data as $data)
                            <tr>
                                <th scope="row">{{ $data->id }}</th>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->category->name }}</td>
                                <td style="max-height: 10vh; overflow: hidden;">
                                    <img src="{{ asset('storage/game-images/' . $data->image) }}" alt="" class="d-block w-100">
                                </td>
                                <td>{{ $data->discount }}%</td>
                                <td>IDR. {{ $data->price }}</td>
                                <td>IDR. {{ $data->total }}</td>
                                <td>{{ $data->desc }}</td>
                                <td>{{ $data->size }} GB</td>
                                <td>{{ $data->spec->name }}</td>
                                <td>
                                    <a href="/admin/update/{{ $data->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form action="/admin/delete/{{ $data->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this game?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        {{ $game_data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
