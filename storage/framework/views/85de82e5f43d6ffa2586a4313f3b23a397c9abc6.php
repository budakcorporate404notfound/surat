<div class="sidebar">
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <?php if(auth()->user()->foto): ?>
      <img src="https://sikep.mahkamahagung.go.id/uploads/foto_pegawai/<?php echo e(auth()->user()->foto); ?>"
        class="img-circle img-circular elevation-2" alt="User Image">
      <?php else: ?>
      <img src="<?php echo e(asset('img/avatar.jpg')); ?>" class="img-circle img-circular elevation-2" alt="User Image">
      <?php endif; ?>
    </div>
    <div class="info">
      <a href="#" class="d-block"><?php echo e(auth()->user()->name ?? 'No Name'); ?></a>
      <a href="#" class="d-block"><?php echo e(auth()->user()->nip ?? 'No Name'); ?></a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
    <li class="nav-item has-treeview">
      <a href="<?php echo e(url('surat/surat_masuk')); ?>" class="nav-link"><i class="nav-icon fas fa-envelope"></i>
        <p>Persuratan<i class="right fas fa-angle-left"></i></p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item"><a href="#" data-id="99" class="surat_masuk_link_to nav-link"><i
              class="far fa-envelope nav-icon"></i>
            <p><span class="badge badge-pill badge-info">semua surat</span></p>
          </a></li>
        <li class="nav-item"><a href="#" data-id="3" class="surat_masuk_link_to nav-link"><i
              class="far fa-envelope nav-icon"></i>
            <p><span class="badge badge-pill badge-primary">kontak masuk</span></p>
          </a></li>
        <li class="nav-item"><a href="#" data-id="1" class="surat_masuk_link_to nav-link"><i
              class="far fa-edit nav-icon"></i>
            <p><span class="badge badge-pill badge-secondary">draft surat</span></p>
          </a></li>
        <li class="nav-item"><a href="#" data-id="2" class="surat_masuk_link_to nav-link"><i
              class="far fa-share-square nav-icon"></i>
            <p><span class="badge badge-pill badge-success">terikirim</span></p>
          </a></li>
        <li class="nav-item"><a href="#" data-id="4" class="surat_masuk_link_to nav-link"><i
              class="far fa-thumbs-up nav-icon"></i>
            <p><span class="badge badge-pill badge-danger">Processed</span></p>
          </a></li>
        <li class="nav-item"><a href="#" data-id="5" class="surat_masuk_link_to nav-link"><i
              class="far fa-check-circle nav-icon"></i>
            <p><span class="badge badge-pill badge-warning">Signed</span></p>
          </a></li>


        
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link"><i class="nav-icon far fa-user"></i>
        <p>Personal<i class="right fas fa-angle-left"></i></p>
      </a>
      <ul class="nav nav-treeview">

        <li class="nav-item"><a href="<?php echo e(url('surat/changepassword')); ?>" target="_blank"
            class="surat_masuk_link_to nav-link"><i class="fas fa-cog nav-icon"></i>
            <p><span class="badge badge-pill badge-secondary">ganti password</span></p>
          </a></li>
      </ul>
    </li>
    

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div><?php /**PATH C:\xampp\htdocs\surat\resources\views\adminlte\components\sidebar.blade.php ENDPATH**/ ?>