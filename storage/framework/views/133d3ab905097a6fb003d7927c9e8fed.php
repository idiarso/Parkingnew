<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo e(route('dashboard')); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo e(asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(asset('assets/images/logo-dark.png')); ?>" alt="" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-xl-inline-block ms-1"><?php echo e(Auth::user()->name); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">
                        <i class="fas fa-user-circle font-size-16 align-middle me-1"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt font-size-16 align-middle me-1 text-danger"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button">
                                <i class="fas fa-parking me-2"></i>Parkir
                            </a>
                            <div class="dropdown-menu">
                                <a href="<?php echo e(route('parking.entry')); ?>" class="dropdown-item">Input Kendaraan</a>
                                <a href="<?php echo e(route('parking.index')); ?>" class="dropdown-item">Daftar Kendaraan</a>
                                <a href="<?php echo e(route('parking.history')); ?>" class="dropdown-item">Riwayat Parkir</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button">
                                <i class="fas fa-chart-bar me-2"></i>Laporan
                            </a>
                            <div class="dropdown-menu">
                                <a href="<?php echo e(route('reports.daily')); ?>" class="dropdown-item">Laporan Harian</a>
                                <a href="<?php echo e(route('reports.monthly')); ?>" class="dropdown-item">Laporan Bulanan</a>
                                <a href="<?php echo e(route('reports.yearly')); ?>" class="dropdown-item">Laporan Tahunan</a>
                                <a href="<?php echo e(route('reports.export')); ?>" class="dropdown-item">Export Laporan</a>
                            </div>
                        </li>

                        <?php if(auth()->user()->is_admin): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button">
                                <i class="fas fa-cog me-2"></i>Pengaturan
                            </a>
                            <div class="dropdown-menu">
                                <a href="<?php echo e(route('users.index')); ?>" class="dropdown-item">Manajemen User</a>
                                <a href="<?php echo e(route('settings.index')); ?>" class="dropdown-item">Konfigurasi Sistem</a>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header><?php /**PATH D:\XAMPP\htdocs\parkir-RSI\resources\views/layouts/partials/horizontal-menu.blade.php ENDPATH**/ ?>