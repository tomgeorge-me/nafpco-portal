<?php $__env->startSection('title', 'About'); ?>

<?php $__env->startSection('content'); ?>

    <section style="padding-block: 56px 40px;">
        <div class="container">
            <span class="eyebrow">Company profile</span>
            <h1>About <?php echo e(config('company.short_name')); ?></h1>
            <p class="lede" style="color:var(--ink-soft); max-width:60ch;">
                <?php echo e(config('company.legal_name')); ?> is an active private farmer producer
                company built to give <?php echo e(config('company.address.district')); ?>'s growers
                a direct route from field to processing to market.
            </p>
        </div>
    </section>

    <section style="padding-top:0;">
        <div class="container grid grid--2" style="align-items:start;">
            <div>
                <h2>Registered &amp; active</h2>
                <dl class="fact-row">
                    <div>
                        <dt>Legal name</dt>
                        <dd><?php echo e(config('company.legal_name')); ?></dd>
                    </div>
                    <div>
                        <dt>Corporate Identification Number (CIN)</dt>
                        <dd><?php echo e(config('company.cin')); ?></dd>
                    </div>
                    <div>
                        <dt>Incorporated on</dt>
                        <dd><?php echo e(\Illuminate\Support\Carbon::parse(config('company.incorporated_on'))->format('d F Y')); ?></dd>
                    </div>
                    <div>
                        <dt>Status</dt>
                        <dd><?php echo e(config('company.status')); ?></dd>
                    </div>
                    <div>
                        <dt>Entity type</dt>
                        <dd><?php echo e(config('company.entity_type')); ?></dd>
                    </div>
                    <div>
                        <dt>Sector</dt>
                        <dd><?php echo e(config('company.sector')); ?></dd>
                    </div>
                </dl>
            </div>
            <div style="display:flex; flex-direction:column; align-items:center; gap:24px; padding-top:12px;">
                <div class="seal" style="color: var(--chili); width:180px; height:180px;">
                    <div class="seal-text" style="font-size:.62rem;">
                        <strong style="font-size:.8rem;">Registered</strong>
                        Farmer Producer Co.
                        <br>CIN <?php echo e(config('company.cin')); ?>

                    </div>
                </div>
                <p style="text-align:center; font-size:.85rem; max-width:32ch;">
                    Verifiable on the Ministry of Corporate Affairs registry under the CIN above.
                </p>
            </div>
        </div>
    </section>

    <section class="on-parchment-2">
        <div class="container grid grid--2">
            <div>
                <h2>Registered office</h2>
                <p>
                    <?php echo e(config('company.address.line1')); ?><br>
                    <?php echo e(config('company.address.line2')); ?><br>
                    <?php echo e(config('company.address.city')); ?>, <?php echo e(config('company.address.district')); ?> District<br>
                    <?php echo e(config('company.address.state')); ?> &mdash; <?php echo e(config('company.address.pincode')); ?><br>
                    <?php echo e(config('company.address.country')); ?>

                </p>
            </div>
            <div>
                <h2>What we produce</h2>
                <p>
                    Regional produce sourced and processed close to where it's grown &mdash;
                    spanning spices, baked goods, and beverages &mdash;
                    with every batch traceable back to local farmer members.
                </p>
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn--outline-light">See the current catalog</a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/tom/webapps/laravel/nafpco-portal/resources/views/about.blade.php ENDPATH**/ ?>