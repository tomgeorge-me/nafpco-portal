<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    <section class="hero" style="padding:0;">
        <?php echo $__env->make('partials.hero-contours', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="container hero-inner">
            <span class="eyebrow eyebrow--on-dark"><?php echo e(config('company.address.district')); ?> District, Kerala</span>
            <h1>From Idukki's hillside farms<br>to your table.</h1>
            <p class="lede">
                <?php echo e(config('company.legal_name')); ?> is a registered farmer producer company
                turning local harvests — spices, baked goods and beverages — into
                products you can trust, grown and made close to home.
            </p>
            <div class="hero-actions">
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn--primary">Browse products</a>
                <a href="<?php echo e(route('farmers')); ?>" class="btn btn--outline-dark">Meet the farmer network</a>
            </div>
        </div>

        <div class="ledger-strip">
            <div class="container">
                <?php $__empty_1 = true; $__currentLoopData = config('company.product_categories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="ledger-item">
                        <span class="num"><?php echo e($categoryCounts[$slug] ?? 0); ?></span>
                        <span class="label"><?php echo e($label); ?> listed</span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="ledger-item">
                    <span class="num"><?php echo e(\Illuminate\Support\Carbon::parse(config('company.incorporated_on'))->format('Y')); ?></span>
                    <span class="label">Incorporated</span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Current harvest</span>
                <h2>What's coming out of the plant right now</h2>
                <p>A rotating selection of what's currently listed. Full stock and seasonal availability confirmed on enquiry.</p>
            </div>

            <?php if($featured->isEmpty()): ?>
                <div class="empty-state">
                    No products are marked for public listing yet. Mark items <code>is_public_visible</code> in the ERP to feature them here.
                </div>
            <?php else: ?>
                <div class="grid grid--3">
                    <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('partials.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="on-parchment-2">
        <div class="container grid grid--2" style="align-items:center;">
            <div>
                <span class="eyebrow">Who we are</span>
                <h2>Farmer-owned. Registered. Rooted in Idukki.</h2>
                <p>
                    Incorporated in <?php echo e(\Illuminate\Support\Carbon::parse(config('company.incorporated_on'))->format('Y')); ?>

                    and headquartered in <?php echo e(config('company.address.city')); ?>, <?php echo e(config('company.short_name')); ?>

                    connects local farmers directly to processing and market —
                    keeping more of the value of every harvest within the community that grew it.
                </p>
                <a href="<?php echo e(route('about')); ?>" class="btn btn--outline-light">Read the full company profile</a>
            </div>
            <div style="display:flex; justify-content:center;">
                <?php echo $__env->make('partials.seal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/tom/webapps/laravel/nafpco-portal/resources/views/home.blade.php ENDPATH**/ ?>