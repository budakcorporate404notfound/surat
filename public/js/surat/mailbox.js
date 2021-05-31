/**
 * Mailbox data table
 **/
surat_mailbox_table = $('#surat-mailbox-data-table').DataTable({
    processing: true, serverSide: true, responsive: true, searching: false, paging: false, info: false,
    ajax: route_surat_mailbox_index,
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "1%"}, 
        {data: 'id_user', name: 'id_user'},
        {data: 'id_parent_mailbox', name: 'id_parent_mailbox'},
        {data: 'id_status_mailbox', name: 'id_status_mailbox'},
        {data: 'id_surat_masuk', name: 'id_surat_masuk'},
        {data: 'id_konsep_surat', name: 'id_konsep_surat'},
        {data: 'id_surat_keluar', name: 'id_surat_keluar'},
        {data: 'ceklist_arahan_surat', name: 'ceklist_arahan_surat'},
        {data: 'ceklist_disposisi_surat', name: 'ceklist_disposisi_surat'},
        {data: 'disposisi_surat', name: 'disposisi_surat'},
        {data: 'waktu_terima', name: 'waktu_terima'},
        {data: 'waktu_baca', name: 'waktu_baca'},
        {data: 'waktu_proses', name: 'waktu_proses'},
        {data: 'waktu_kirim', name: 'waktu_kirim'},
        {
            data: null, name: 'action', width: "5%", orderable: false, searchable: false,
            render: function(data, type, row, meta) {
                btn = `<a href="javascript:void(0)" data-toggle="tooltip" data-id="${data.id}" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm btn-surat-mailbox-edit">Ubah</a>`;
                return btn;
            },
        },
    ]
});


/**
 * Create new mailbox
 **/
$('body').on('click', '#btn-surat-mailbox-create', function () {
    reset_form_data('#surat-mailbox-form');
    $('#surat-mailbox-modal-heading').html("Tambah baru mailbox");
    $('#btn-surat-mailbox-save').val("Simpan mailbox");
    $('#surat-mailbox-ajax-modal').modal('show');
});

/**
 * Edit mailbox
 **/
$('body').on('click', '.btn-surat-mailbox-edit', function () {
    // Reset form
    reset_form_data('#surat-mailbox-form');
    var surat_mailbox_id = $(this).data('id');
    var form_name = '#surat-mailbox-form';
    $.get(`${route_surat_mailbox_index}/${surat_mailbox_id}/edit`, function (data) {
        $('#surat-mailbox-modal-heading').html("Ubah mailbox");
        $('#btn-surat-mailbox-save').val("Simpan mailbox");
        $('#surat-mailbox-ajax-modal').modal('show');
        $('#surat-mailbox-id', form_name).val(data.id);
        $('#surat-mailbox-id_user', form_name).val(data.id_user);
        $('#surat-mailbox-id_parent_mailbox', form_name).val(data.id_parent_mailbox);
        $('#surat-mailbox-id_status_mailbox' + data.id_status_mailbox, form_name).prop('checked', true);
        $('#surat-mailbox-id_surat_masuk', form_name).val(data.id_surat_masuk);
        $('#surat-mailbox-id_konsep_surat', form_name).val(data.id_konsep_surat);
        $('#surat-mailbox-id_surat_keluar', form_name).val(data.id_surat_keluar);
        $('#surat-mailbox-ceklist_arahan_surat', form_name).val(data.ceklist_arahan_surat);
        $('#surat-mailbox-ceklist_disposisi_surat', form_name).val(data.ceklist_disposisi_surat);
        $('#surat-mailbox-disposisi_surat', form_name).val(data.disposisi_surat);
        $('#surat-mailbox-waktu_terima', form_name).val(data.waktu_terima);
        $('#surat-mailbox-waktu_baca', form_name).val(data.waktu_baca);
        $('#surat-mailbox-waktu_proses', form_name).val(data.waktu_proses);
        $('#surat-mailbox-waktu_kirim', form_name).val(data.waktu_kirim);

    })
});

/**
 * Saving mailbox data
 **/
$('body').on('click', '#btn-surat-mailbox-save', function (e) {
    e.preventDefault();
    var result = confirm("Apakah Anda yakin akan mengirim data?");
    if (result) {
        $(this).html('Proses pengiriman data ..');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();
        $.ajax({
            data: $('#surat-mailbox-form').serialize(),
            url: route_surat_mailbox_store,
            type: "POST",
            dataType: 'json',
            success: function (res) {
                if (res.errors) {
                    // On error
                    $.each(res.errors, function(key, value){
                        $('#surat-mailbox-'+key+' + div').html(value);
                    });
                    $('.invalid-feedback').show();
                    toastr.error("Silahkan cek kembali pengisian data Anda.", "Data gagal disimpan");
                } else {
                    // On success
                    $('#surat-mailbox-ajax-modal').modal('hide');
                    surat_mailbox_table.draw();
                    toastr.success("Penyimpanan data berhasil disimpan.", "Data berhasil disimpan.");
                }
                $('#btn-surat-mailbox-save').html('Simpan perubahan');
            },
            error: function (res) {
                $('#btn-surat-mailbox-save').html('Simpan perubahan');
                toastr.error("Silahkan cek ulang data/koneksi jaringan Anda.", "Data gagal disimpan");
            }
        });
    } else {
        return false;
    }
});

/**
 * Deleting mailbox data
 **/
$('body').on('click', '.btn-surat-mailbox-delete', function (){
    var surat_mailbox_id = $(this).data("id");
    var result = confirm("Apakah Anda yakin akan menghapus data?");
    if (result) {
        $.ajax({
            type: "DELETE",
            url: `${route_surat_mailbox_index}/${surat_mailbox_id}`,
            success: function (data) {
                surat_mailbox_table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    } else {
        return false;
    }
});
