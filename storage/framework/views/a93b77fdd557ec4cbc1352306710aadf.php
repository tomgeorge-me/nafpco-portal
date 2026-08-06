<header class="site-header">
    <div class="container">
        <a href="<?php echo e(route('home')); ?>" class="brand">
            <span class="brand-mark">NA</span>
            <span>
                <?php echo e(config('company.short_name')); ?>

                <small>Est. 2016 &middot; <?php echo e(config('company.address.district')); ?>, Kerala</small>
            </span>
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'is-active' : ''); ?>">Home</a></li>
                <li><a href="<?php echo e(route('about')); ?>" class="<?php echo e(request()->routeIs('about') ? 'is-active' : ''); ?>">About</a></li>
                <li><a href="<?php echo e(route('products.index')); ?>" class="<?php echo e(request()->routeIs('products.*') ? 'is-active' : ''); ?>">Products</a></li>
                <li><a href="<?php echo e(route('farmers')); ?>" class="<?php echo e(request()->routeIs('farmers') ? 'is-active' : ''); ?>">Farmers</a></li>
                <li><a href="<?php echo e(route('contact')); ?>" class="<?php echo e(request()->routeIs('contact*') ? 'is-active' : ''); ?>">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
<?php /**PATH /home/tom/webapps/laravel/nafpco-portal/resources/views/partials/nav.blade.php ENDPATH**/ ?>