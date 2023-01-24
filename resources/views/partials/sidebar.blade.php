<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height: 100vh; position: fixed; top: 0; left: 0; z-index: 100;">
    <a href="/home" class="mx-auto mb-5 text-white text-decoration-none">
        <span class="fs-2 fw-bold"><i class="bi bi-controller text-primary"></i> Game<span
                class="text-primary">On</span></span>
    </a>
    <ul class="nav nav-pills flex-column mb-auto fs-6">
        <li class="nav-item rounded {{ $active === 'home' ? 'bg-primary' : '' }}">
            <a href="/home" class="nav-link {{ $active === 'home' ? 'text-white' : 'text-muted' }}">
                <i class="bi bi-grid-fill"></i> Store
            </a>
        </li>
        @if (Auth::user()->admin == false)
            <li class="nav-item rounded {{ $active === 'library' ? 'bg-primary' : '' }}">
                <a href="/library" class="nav-link {{ $active === 'library' ? 'text-white' : 'text-muted' }}">
                    <i class="bi bi-bar-chart-fill"></i> Library
                </a>
            </li>
        @else
            <li class="nav-item rounded {{ $active === 'manage' ? 'bg-primary' : '' }}">
                <a href="/admin/manage-games" class="nav-link {{ $active === 'manage' ? 'text-white' : 'text-muted' }}">
                    <i class="bi bi-list-ul"></i> Manage Games
                </a>
            </li>
            <li class="nav-item rounded {{ $active === 'add' ? 'bg-primary' : '' }}">
                <a href="/admin/add-new-game" class="nav-link {{ $active === 'add' ? 'text-white' : 'text-muted' }}">
                    <i class="bi bi-database-fill-add"></i> Add New Game
                </a>
            </li>
        @endif
    </ul>
    {{-- <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/Nouvaldi.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>PlayerUnknown</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div> --}}
</div>
