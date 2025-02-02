<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="bx bx-home-circle me-2"></i>Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('parkir.index') }}">
                            <i class="bx bx-car me-2"></i>Parkir
                        </a>
                    </li>

                    @if(Auth::user()->role === 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button">
                            <i class="bx bx-cog me-2"></i>Master Data
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('users.index') }}" class="dropdown-item">Users</a>
                            <a href="{{ route('kendaraan.index') }}" class="dropdown-item">Jenis Kendaraan</a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>