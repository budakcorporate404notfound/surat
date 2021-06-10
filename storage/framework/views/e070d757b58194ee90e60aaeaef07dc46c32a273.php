 <select class="form-control" name="product_id">

                <option>Select Product</option>

                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>" <?php echo e(( $key == $selectedID) ? 'selected' : ''); ?>>
                    <?php echo e($value); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select><?php /**PATH C:\xampp\htdocs\surat\resources\views\testquery.blade.php ENDPATH**/ ?>