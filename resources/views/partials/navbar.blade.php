<div class="row mb-3 g-3">
    <div class="col-sm-6">
        <form action="/home/search" method="get" class="input-group rounded">
            @csrf
            <button class="btn btn-dark border-0 rounded-start" type="submit" id="search"><i class="bi bi-search"></i></button>
            <input type="text" class="form-control text-bg-dark border-0" name="search" id="search" placeholder="Search...">
            <div class="dropdown">
                <a class="btn btn-dark border-0 dropdown-toggle rounded-0 rounded-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                </a>
                <ul class="dropdown-menu dropdown-menu-dark border-0">
                    @foreach ($category_data as $data)
                        <li><a class="dropdown-item" href="/home/category/{{ $data->id }}/{{ $data->name }}">{{ $data->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
    <div class="col-sm-3">
        <div class="input-group rounded">
            <div class="dropdown">
                <a class="btn btn-dark border-0 dropdown-toggle rounded-0 rounded-start" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-wallet2"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark border-0">
                    <li>
                        <a class="dropdown-item" href="{{ route('wallet') }}">Wallet</a>
                    </li>
                </ul>
            </div>
            <input type="text" class="form-control text-bg-dark text-start border-0" value="IDR. {{ Auth::user()->wallet }}"
                disabled>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="input-group rounded">
            <div class="dropdown">
                <a class="btn btn-dark border-0 dropdown-toggle rounded-0 rounded-start" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark border-0">
                    <li>
                        <a class="dropdown-item" href="/profile">Profile</a>
                    </li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            <input type="text" class="form-control text-bg-dark text-start border-0" value="{{ Auth::user()->name }}" disabled>
        </div>
    </div>
</div>
