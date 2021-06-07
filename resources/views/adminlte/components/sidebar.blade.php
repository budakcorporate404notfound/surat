<div class="sidebar">
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      @if (auth()->user()->foto)
      <img src="https://sikep.mahkamahagung.go.id/uploads/foto_pegawai/{{ auth()->user()->foto }}"
        class="img-circle img-circular elevation-2" alt="User Image">
      @else
      <img src="{{ asset('img/avatar.jpg') }}" class="img-circle img-circular elevation-2" alt="User Image">
      @endif
    </div>
    <div class="info">
      <a href="#" class="d-block">{{ auth()->user()->name ?? 'No Name' }}</a>
      <a href="#" class="d-block">{{ auth()->user()->nip ?? 'No Name' }}</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      {{--
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  User Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{ route('user.create') }}" class="nav-link">
      <i class="far fa-circle nav-icon"></i>
      <p>Create User</p>
      </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('user.list') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>List User</p>
        </a>
      </li>
    </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-circle"></i>
        <p>
          Inventory
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('inventory.create') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Item</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('inventory.list') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>List Item</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-circle"></i>
        <p>
          Report
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('report.user') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>User Report</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('report.inventory') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Inventory Report</p>
          </a>
        </li>
      </ul>
    </li>
    --}}
    <li class="nav-item has-treeview">
      <a href="{{url('surat/surat_masuk')}}" class="nav-link"><i class="nav-icon fas fa-envelope"></i>
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


        {{--
                <li class="nav-item"><a href="/disposisi_pimpinan" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Disposisi pimpinan</p></a></li>
                <li class="nav-item"><a href="/disposisi_surat" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Disposisi surat</p></a></li>
                <li class="nav-item"><a href="/dokumen_surat" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Dokumen surat</p></a></li>
                <li class="nav-item"><a href="/file_surat_keluar" class="nav-link"><i class="far fa-circle nav-icon"></i><p>File surat keluar</p></a></li>
                <li class="nav-item"><a href="/file_tanggapan" class="nav-link"><i class="far fa-circle nav-icon"></i><p>File tanggapan</p></a></li>
                <li class="nav-item"><a href="/memo_disposisi" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Memo disposisi</p></a></li>
                <li class="nav-item"><a href="/tembusan_surat" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Tembusan surat</p></a></li>
                <li class="nav-item"><a href="/counter_surat" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Counter surat</p></a></li>
--}}
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link"><i class="nav-icon far fa-user"></i>
        <p>Personal<i class="right fas fa-angle-left"></i></p>
      </a>
      <ul class="nav nav-treeview">

        <li class="nav-item"><a href="{{url('surat/changepassword')}}" target="_blank"
            class="surat_masuk_link_to nav-link"><i class="fas fa-cog nav-icon"></i>
            <p><span class="badge badge-pill badge-secondary">ganti password</span></p>
          </a></li>
      </ul>
    </li>
    {{--
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-file-alt"></i><p>Referensi<i class="right fas fa-angle-left"></i></p></a>
              <ul class="nav nav-treeview">
                <li class="nav-item"><a href="/arahan_surat" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Arahan surat</p></a></li>
                <li class="nav-item"><a href="/asal_ekspedisi_surat_masuk" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Asal ekspedisi surat masuk</p></a></li>
                <li class="nav-item"><a href="/jenis_disposisi" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Jenis disposisi</p></a></li>
                <li class="nav-item"><a href="/jenis_dokumen" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Jenis dokumen</p></a></li>
                <li class="nav-item"><a href="/jenis_file" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Jenis file</p></a></li>
                <li class="nav-item"><a href="/jenis_surat_masuk" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Jenis surat masuk</p></a></li>
                <li class="nav-item"><a href="/sifat_keamanan_surat" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Sifat keamanan surat</p></a></li>
                <li class="nav-item"><a href="/sifat_penyelesaian_surat" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Sifat penyelesaian surat</p></a></li>
                <li class="nav-item"><a href="/status_disposisi" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Status disposisi</p></a></li>
                <li class="nav-item"><a href="/unit" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Unit</p></a></li>
              </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
    <i class="fas fa-circle nav-icon"></i>
    <p>Logout</p>
    </a>
    </li>
    --}}

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>