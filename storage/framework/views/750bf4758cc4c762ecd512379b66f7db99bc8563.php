

<?php $__env->startSection('content'); ?>
<div class="container">
    
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table id="example" class="table table-head-fixed text-nowrap table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Email pengirim</th>
                                        <th>Subject</th>
                                        <!-- <th>Isi Email</th> -->
                                        <th>Tanggal</th>
                                        <th>Attachment</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $getMails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo e($row['from']); ?></td>
                                        <td><?php echo e($row['subject']); ?></td>
                                        <!-- <td><?php echo e($row['finalMessage']); ?></td> -->
                                        <td><?php echo e($row['date']); ?></td>
                                        
                                        <td></td>
                                        
                                    </tr> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\retrieveemail\index.blade.php ENDPATH**/ ?>