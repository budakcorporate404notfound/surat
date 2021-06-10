<?php $__env->startSection('content'); ?>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-envelope-open-text"></i> Surat masuk</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-outline-success" href="<?php echo e(route('suratMasuk.create')); ?>"><i class="fas fa-plus"></i> Tambah surat masuk</a>
            
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        

        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th>Asal & Nomor Surat</th>
                <th>Perihal</th>
                
                
            </tr>
            <?php $__currentLoopData = $suratMasuks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suratMasuk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-center"><?php echo e(++$i); ?></td>
                <td>
                    <b><?php echo e($suratMasuk->asal_surat_masuk); ?></b> &lt;<?php echo e($suratMasuk->pejabat_pengirim_surat); ?>&gt;
                    <br><span style="font-size: 70%"><?php echo e($suratMasuk->nomor_surat); ?> (<?php echo e($suratMasuk->tanggal_surat); ?>)</span>
                </td>
                <td><a class="" href="<?php echo e(route('suratMasuk.show',$suratMasuk->id)); ?>"><?php echo e($suratMasuk->perihal); ?></a></td>
                
                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

    </div>
    <!-- /.card-body -->
    
</div>
        <div class="text-right"><?php echo $suratMasuks->links(); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_ASLI_LAMA\suratMasuk\index.blade.php ENDPATH**/ ?>