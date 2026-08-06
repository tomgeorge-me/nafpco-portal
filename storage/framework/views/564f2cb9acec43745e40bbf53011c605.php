<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>

    <section style="padding-block: 48px 24px;">
        <div class="container">
            <a href="<?php echo e(route('products.index')); ?>" style="font-family: var(--font-mono); font-size:.82rem; color:var(--ink-soft);">&larr; Back to products</a>
        </div>
    </section>

    <section style="padding-top:0; padding-bottom:24px;">
        <div class="container grid grid--2" style="align-items:start;">
            <div class="card-media" style="border-radius:var(--radius); border:1px solid var(--paper-line);">
                <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>">
            </div>
            <div>
                <span class="card-tag"><?php echo e($product->category_label); ?></span>
                <h1><?php echo e($product->name); ?></h1>
                <?php if($product->unit): ?>
                    <p style="font-family: var(--font-mono); font-size:.82rem; color:var(--ink-soft);">Sold per <?php echo e($product->unit); ?></p>
                <?php endif; ?>
                <p><?php echo e($product->description ?: 'Details on this product are being added — get in touch for full specifications.'); ?></p>

                <div style="display:flex; gap:12px; margin-top:24px; flex-wrap:wrap;">
                    <a href="<?php echo e(route('contact', ['product' => $product->slug])); ?>" class="btn btn--primary">Enquire about this product</a>
                    <a href="<?php echo e(route('products.index', ['category' => $product->category])); ?>" class="btn btn--outline-light">More <?php echo e($product->category_label); ?></a>
                </div>
            </div>
        </div>
    </section>

    <?php if($related->isNotEmpty()): ?>
        <section class="on-parchment-2">
            <div class="container">
                <div class="section-head">
                    <span class="eyebrow">You might also like</span>
                    <h2>More <?php echo e($product->category_label); ?></h2>
                </div>
                <div class="grid grid--3">
                    <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('partials.product-card', ['product' => $item], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/tom/webapps/laravel/nafpco-portal/resources/views/products/show.blade.php ENDPATH**/ ?>