// resources/views/layouts/partials/horizontal-menu.blade.php
<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                            <i class="ri-dashboard-line me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('admin.overview')); ?>">
                            <i class="ri-file-list-3-line me-2"></i> Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('admin.sales')); ?>">
                            <i class="ri-store-2-line me-2"></i> Sales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('admin.products')); ?>">
                            <i class="ri-shopping-cart-2-line me-2"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('admin.customers')); ?>">
                            <i class="ri-user-2-line me-2"></i> Customers
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div><?php /**PATH D:\XAMPP\htdocs\parkir-RSI\resources\views/layouts/horizontal-menu.blade.php ENDPATH**/ ?>