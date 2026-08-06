<?php $__env->startSection('title', 'Contact'); ?>

<?php $__env->startSection('content'); ?>

    <section style="padding-block: 56px 24px;">
        <div class="container">
            <span class="eyebrow">Get in touch</span>
            <h1>Contact <?php echo e(config('company.short_name')); ?></h1>
            <p class="lede" style="color:var(--ink-soft); max-width:60ch;">
                Questions about a product, wholesale orders, or joining as a farmer member &mdash;
                send a note and someone from the team will follow up.
            </p>
        </div>
    </section>

    <section style="padding-top:0;">
        <div class="container grid grid--2" style="align-items:start;">
            <div>
                <?php if(session('status') === 'sent'): ?>
                    <div class="form-status">Thanks — your enquiry has been received. We'll get back to you shortly.</div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('contact.store')); ?>" novalidate>
                    <?php echo csrf_field(); ?>

                    
                    <div class="honeypot" aria-hidden="true">
                        <label for="website">Leave this field empty</label>
                        <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                    </div>

                    <?php if($product): ?>
                        <input type="hidden" name="product_slug" value="<?php echo e($product->slug); ?>">
                        <div class="form-status" style="background:#f4ecd8; border-color:var(--turmeric); color:var(--ink);">
                            Enquiring about: <strong><?php echo e($product->name); ?></strong>
                        </div>
                    <?php endif; ?>

                    <div class="form-field">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="form-error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="grid grid--2" style="gap:18px;">
                        <div class="form-field">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="form-error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-field">
                            <label for="phone">Phone (optional)</label>
                            <input type="text" name="phone" id="phone" value="<?php echo e(old('phone')); ?>">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="form-error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="subject">Subject (optional)</label>
                        <input type="text" name="subject" id="subject" value="<?php echo e(old('subject')); ?>">
                    </div>

                    <div class="form-field">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="6" required><?php echo e(old('message')); ?></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="form-error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="btn btn--primary">Send enquiry</button>
                </form>
            </div>

            <div>
                <div class="card" style="padding:28px;">
                    <h3 style="margin-bottom:16px;">Registered office</h3>
                    <p>
                        <?php echo e(config('company.address.line1')); ?><br>
                        <?php echo e(config('company.address.line2')); ?><br>
                        <?php echo e(config('company.address.city')); ?>, <?php echo e(config('company.address.district')); ?> District<br>
                        <?php echo e(config('company.address.state')); ?> &mdash; <?php echo e(config('company.address.pincode')); ?>

                    </p>
                    <?php if(config('company.contact.email')): ?>
                        <p style="margin-top:16px;">
                            <strong>Email:</strong><br>
                            <a href="mailto:<?php echo e(config('company.contact.email')); ?>" style="color:var(--chili);"><?php echo e(config('company.contact.email')); ?></a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/tom/webapps/laravel/nafpco-portal/resources/views/contact.blade.php ENDPATH**/ ?>