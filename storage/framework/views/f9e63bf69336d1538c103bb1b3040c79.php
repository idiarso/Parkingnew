<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <!-- Logo/Brand -->
        <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">
            Parkir RSI
        </a>

        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                        <i class="bx bx-home-circle"></i> Dashboard
                    </a>
                </li>
            </ul>

            <!-- User Menu -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <?php echo e(Auth::user()->name); ?>

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item">
                                    <i class="bx bx-log-out"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH D:\XAMPP\htdocs\parkir-RSI\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>