/**
 * Status mailbox data table
 **/
surat_status_mailbox_table = $('#surat-status-mailbox-data-table').DataTable({
    processing: true, serverSide: true, responsive: true, searching: false, paging: false, info: false,
    ajax: route_surat_status_mailbox_index,
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "1%"}, 
        {data: 'status_mailbox', name: 'status_mailbox'},
        {
            data: null, name: 'action', width: "5%", orderable: false, searchable: false,
            render: function(data, type, row, meta) {
                btn = `<a href="javascript:void(0)" data-toggle="tooltip" data-id="${data.id}" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm btn-surat-status-mailbox-edit">Ubah</a>`;
                return btn;
            },
        },
    ]
});


/**
 * Create new status mailbox
 **/
$('body').on('click', '#btn-surat-status-mailbox-create', function () {
    reset_form_data('#surat-status-mailbox-form');
    $('#surat-status-mailbox-modal-heading').html("Tambah baru status mailbox");
    $('#btn-surat-status-mailbox-save').val("Simpan status mailbox");
    $('#surat-status-mailbox-ajax-modal').modal('show');
});

/**
 * Edit status mailbox
 **/
$('body').on('click', '.btn-surat-status-mailbox-edit', function () {
    // Reset form
    reset_form_data('#surat-status-mailbox-form');
    var surat_status_mailbox_id = $(this).data('id');
    var form_name = '#surat-status-mailbox-form';
    $.get(`${route_surat_status_mailbox_index}/${surat_status_mailbox_id}/edit`, function (data) {
        $('#surat-status-mailbox-modal-heading').html("Ubah status mailbox");
        $('#btn-surat-status-mailbox-save').val("Simpan status mailbox");
        $('#surat-status-mailbox-ajax-modal').modal('show');
        $('#surat-status-mailbox-id', form_name).val(data.id);
        $('#surat-status-mailbox-status_mailbox', form_name).val(data.status_mailbox);

    })
});

/**
 * Saving status mailbox data
 **/
$('body').on('click', '#btn-surat-status-mailbox-save', function (e) {
    e.preventDefault();
    var result = confirm("Apakah Anda yakin akan mengirim data?");
    if (result) {
        $(this).html('Proses pengiriman data ..');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();
        $.ajax({
            data: $('#surat-status-mailbox-form').serialize(),
            url: route_surat_status_mailbox_store,
            type: "POST",
            dataType: 'json',
            success: function (res) {
                if (res.errors) {
                    // On error
                    $.each(res.errors, function(key, value){
                        $('#surat-status-mailbox-'+key+' + div').html(value);
                    });
                    $('.invalid-feedback').show();
                    toastr.error("Silahkan cek kembali pengisian data Anda.", "Data gagal disimpan");
                } else {
                    // On success
                    $('#surat-status-mailbox-ajax-modal').modal('hide');
                    surat_status_mailbox_table.draw();
                    toastr.success("Penyimpanan data berhasil disimpan.", "Data berhasil disimpan.");
                }
                $('#btn-surat-status-mailbox-save').html('Simpan perubahan');
            },
            error: function (res) {
                $('#btn-surat-status-mailbox-save').html('Simpan perubahan');
                toastr.error("Silahkan cek ulang data/koneksi jaringan Anda.", "Data gagal disimpan");
            }
        });
    } else {
        return false;
    }
});

/**
 * Deleting status mailbox data
 **/
$('body').on('click', '.btn-surat-status-mailbox-delete', function (){
    var surat_status_mailbox_id = $(this).data("id");
    var result = confirm("Apakah Anda yakin akan menghapus data?");
    if (result) {
        $.ajax({
            type: "DELETE",
            url: `${route_surat_status_mailbox_index}/${surat_status_mailbox_id}`,
            success: function (data) {
                surat_status_mailbox_table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    } else {
        return false;
    }
});
