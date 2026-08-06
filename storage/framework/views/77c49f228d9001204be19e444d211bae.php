<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>

    <section style="padding-block: 56px 24px;">
        <div class="container">
            <span class="eyebrow">The catalog</span>
            <h1>Spices, baked goods &amp; beverages</h1>
            <p class="lede" style="color:var(--ink-soft); max-width:60ch;">
                A live view of what <?php echo e(config('company.short_name')); ?> currently has listed.
                Pricing is confirmed on enquiry &mdash; reach out for volumes, samples, or wholesale.
            </p>
        </div>
    </section>

    <section style="padding-top:0;">
        <div class="container">
            <div class="pillbar">
                <a href="<?php echo e(route('products.index')); ?>" class="pill <?php echo e($activeCategory === 'all' ? 'is-active' : ''); ?>">All</a>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('products.index', ['category' => $slug])); ?>"
                       class="pill <?php echo e($activeCategory === $slug ? 'is-active' : ''); ?>"><?php echo e($label); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($products->isEmpty()): ?>
                <div class="empty-state">
                    No products found in this category yet. Check back soon, or
                    <a href="<?php echo e(route('contact')); ?>" style="color:var(--chili); font-weight:600;">ask us directly</a>.
                </div>
            <?php else: ?>
                <div class="grid grid--3">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('partials.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div style="margin-top:40px;">
                    <?php echo e($products->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/tom/webapps/laravel/nafpco-portal/resources/views/products/index.blade.php ENDPATH**/ ?>