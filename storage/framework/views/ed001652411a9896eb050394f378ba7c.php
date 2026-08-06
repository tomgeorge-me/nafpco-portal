<footer class="site-footer">
    <div class="container">
        <div class="grid grid--3">
            <div>
                <h4><?php echo e(config('company.short_name')); ?></h4>
                <p style="color:#cfc4a0; margin-top:12px;"><?php echo e(config('company.legal_name')); ?></p>
                <p style="color:#9b9070; font-family: var(--font-mono); font-size:.82rem;">
                    CIN: <?php echo e(config('company.cin')); ?><br>
                    Incorporated <?php echo e(\Illuminate\Support\Carbon::parse(config('company.incorporated_on'))->format('d M Y')); ?>

                </p>
            </div>
            <div>
                <h4>Registered Office</h4>
                <p style="color:#cfc4a0; margin-top:12px;">
                    <?php echo e(config('company.address.line1')); ?><br>
                    <?php echo e(config('company.address.line2')); ?><br>
                    <?php echo e(config('company.address.city')); ?>, <?php echo e(config('company.address.district')); ?><br>
                    <?php echo e(config('company.address.state')); ?> <?php echo e(config('company.address.pincode')); ?>

                </p>
            </div>
            <div>
                <h4>Explore</h4>
                <ul style="list-style:none; padding:0; margin-top:12px; display:flex; flex-direction:column; gap:8px;">
                    <li><a href="<?php echo e(route('products.index')); ?>">Products</a></li>
                    <li><a href="<?php echo e(route('farmers')); ?>">Farmer connectivity</a></li>
                    <li><a href="<?php echo e(route('about')); ?>">About the company</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>">Contact / Enquire</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('company.legal_name')); ?>. All rights reserved.</span>
            <span>Status: <?php echo e(config('company.status')); ?> &middot; <?php echo e(config('company.entity_type')); ?></span>
        </div>
    </div>
</footer>
<?php /**PATH /home/tom/webapps/laravel/nafpco-portal/resources/views/partials/footer.blade.php ENDPATH**/ ?>