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

        {{-- Wallet --}}
        <div class="row g-3">
            <div class="col">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title my-0"><i class="bi bi-clock-history"></i> Transaction History</h5>
                    </div>
                    <div class="card-body pt-0">
                        @if (count($history_data) == 0)
                            <div class="card text-bg-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Empty</h5>
                                </div>
                            </div>
                        @endif
                        @foreach ($history_data as $data)
                            <div class="card border-0 text-bg-dark mb-1">
                                <div class="row g-0">
                                    <div class="col-3" style="height: 15vh">
                                        <img src="{{ asset('storage/game-images/' . $data->games->image) }}" alt="" class="img-fluid rounded-start h-100 w-100" style="object-fit: cover">
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <div class="card-body">
                                            <h5 class="card-title my-0 text-wrap">{{ $data->games->title }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-3 d-flex align-items-center">
                                        <div class="card-body">
                                            <p class="card-text text-muted my-0"><i class="bi bi-calendar-event-fill"></i> {{ $data->date }}</p>
                                            <p class="card-text text-muted my-0"><i class="bi bi-tag-fill"></i> IDR. {{ $data->total }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card border-0 shadow mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-wallet2"></i> Wallet Balance</h5>
                        <p class="card-text">IDR. {{ Auth::user()->wallet }}</p>
                    </div>
                </div>
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title m-0"><i class="bi bi-cash-stack"></i> Top Up Wallet</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="card mb-1 text-bg-dark">
                            <form action="/user/wallet" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group fs-5">
                                                <div class="input-group-text text-bg-dark border-0">IDR. </div>
                                                <input type="number" class="d-none" name="amount" id="amount" value="10000">
                                                <input type="number" class="form-control text-bg-dark border-0" value="10000" disabled>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <button type="submit" class="btn btn-primary">Top up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card mb-1 text-bg-dark">
                            <form action="/user/wallet" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group fs-5">
                                                <div class="input-group-text text-bg-dark border-0">IDR. </div>
                                                <input type="number" class="d-none" name="amount" id="amount" value="20000">
                                                <input type="number" class="form-control text-bg-dark border-0" value="20000" disabled>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <button type="submit" class="btn btn-primary">Top up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card mb-1 text-bg-dark">
                            <form action="/user/wallet" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group fs-5">
                                                <div class="input-group-text text-bg-dark border-0">IDR. </div>
                                                <input type="number" class="d-none" name="amount" id="amount" value="50000">
                                                <input type="number" class="form-control text-bg-dark border-0" value="50000" disabled>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <button type="submit" class="btn btn-primary">Top up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card mb-1 text-bg-dark">
                            <form action="/user/wallet" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group fs-5">
                                                <div class="input-group-text text-bg-dark border-0">IDR. </div>
                                                <input type="number" class="d-none" name="amount" id="amount" value="100000">
                                                <input type="number" class="form-control text-bg-dark border-0" value="100000" disabled>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <button type="submit" class="btn btn-primary">Top up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <script>
            $(document).ready(function () {
                $('#successModal').modal('show');
            });
        </script>
    @endif
@endsection
