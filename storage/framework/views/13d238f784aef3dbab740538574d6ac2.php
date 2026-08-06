<a href="<?php echo e(route('products.show', $product->slug)); ?>" class="card">
    <div class="card-media">
        <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" loading="lazy">
    </div>
    <div class="card-body">
        <span class="card-tag"><?php echo e($product->category_label); ?></span>
        <h3><?php echo e($product->name); ?></h3>
        <?php if($product->description): ?>
            <p><?php echo e(\Illuminate\Support\Str::limit($product->description, 90)); ?></p>
        <?php endif; ?>
        <span class="more">Enquire for price &rarr;</span>
    </div>
</a>
<?php /**PATH /home/tom/webapps/laravel/nafpco-portal/resources/views/partials/product-card.blade.php ENDPATH**/ ?>