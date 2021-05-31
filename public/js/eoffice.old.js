$(function () {
    /**
     * Surat keluar konsep data table
     **/
    var surat_surat_keluar_konsep_table = $(
        "#surat-surat-keluar-konsep-data-table"
    ).DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        searching: false,
        paging: false,
        info: false,
        ajax: route_surat_surat_keluar_konsep_index,
        columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex", width: "1%" },
            { data: "status", name: "status" },
            { data: "id_user", name: "id_user" },
            { data: "id_arahan_surat", name: "id_arahan_surat" },
            { data: "id_surat_masuk", name: "id_surat_masuk" },
            { data: "id_jenis_dokumen", name: "id_jenis_dokumen" },
            { data: "nomor_surat", name: "nomor_surat" },
            { data: "tanggal_surat", name: "tanggal_surat" },
            { data: "kepada", name: "kepada" },
            { data: "perihal", name: "perihal" },
            { data: "lampiran", name: "lampiran" },
            { data: "alamat", name: "alamat" },
            { data: "kota_penandatangan", name: "kota_penandatangan" },
            { data: "jabatan_penandatangan", name: "jabatan_penandatangan" },
            { data: "isi_surat", name: "isi_surat" },
            {
                data: "id_sifat_keamanan_surat",
                name: "id_sifat_keamanan_surat",
            },
            {
                data: "id_sifat_penyelesaian_surat",
                name: "id_sifat_penyelesaian_surat",
            },
            { data: "tanggal_mulai", name: "tanggal_mulai" },
            { data: "tanggal_selesai", name: "tanggal_selesai" },
            { data: "mulai_pukul", name: "mulai_pukul" },
            { data: "selesai_pukul", name: "selesai_pukul" },
            {
                name: "action",
                width: "5%",
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    btn = `<a href="javascript:void(0)" data-toggle="tooltip" data-id="${data.id}" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm btn-surat-surat-keluar-konsep-edit">Ubah</a>`;
                    return btn;
                },
            },
        ],
    });

    // new $.fn.dataTable.FixedHeader( surat_surat_keluar_konsep_table );

    /**
     * Create new surat keluar konsep
     **/
    $("body").on("click", "#btn-surat-surat-keluar-konsep-create", function () {
        reset_form_data("#surat-surat-keluar-konsep-form");
        $("#surat-surat-keluar-konsep-model-heading").html(
            "Tambah baru surat keluar konsep"
        );
        $("#btn-surat-surat-keluar-konsep-save").val(
            "Simpan surat keluar konsep"
        );
        $("#surat-surat-keluar-konsep-ajax-modal").modal("show");
    });

    /**
     * Edit surat keluar konsep
     **/
    $("body").on("click", ".btn-surat-surat-keluar-konsep-edit", function () {
        // Reset form
        reset_form_data("#surat-surat-keluar-konsep-form");
        var surat_surat_keluar_konsep_id = $(this).data("id");
        var form_name = "#surat-surat-keluar-konsep-form";
        $.get(
            `${route_surat_surat_keluar_konsep_index}/${surat_surat_keluar_konsep_id}/edit`,
            function (data) {
                $("#surat-surat-keluar-konsep-model-heading").html(
                    "Ubah surat keluar konsep"
                );
                $("#btn-surat-surat-keluar-konsep-save").val(
                    "Simpan surat keluar konsep"
                );
                $("#surat-surat-keluar-konsep-ajax-modal").modal("show");
                $("#surat-surat-keluar-konsep-id", form_name).val(data.id);
                $("#surat-surat-keluar-konsep-status", form_name).val(
                    data.status
                );
                $("#surat-surat-keluar-konsep-id_user", form_name).val(
                    data.id_user
                );
                $(
                    "#surat-surat-keluar-konsep-id_arahan_surat" +
                        data.id_arahan_surat,
                    form_name
                ).prop("checked", true);
                $("#surat-surat-keluar-konsep-id_surat_masuk", form_name).val(
                    data.id_surat_masuk
                );
                $(
                    "#surat-surat-keluar-konsep-id_jenis_dokumen" +
                        data.id_jenis_dokumen,
                    form_name
                ).prop("checked", true);
                $("#surat-surat-keluar-konsep-nomor_surat", form_name).val(
                    data.nomor_surat
                );
                $("#surat-surat-keluar-konsep-kepada", form_name).val(
                    data.kepada
                );
                $("#surat-surat-keluar-konsep-perihal", form_name).val(
                    data.perihal
                );
                $("#surat-surat-keluar-konsep-lampiran", form_name).val(
                    data.lampiran
                );
                $("#surat-surat-keluar-konsep-alamat", form_name).val(
                    data.alamat
                );
                $(
                    "#surat-surat-keluar-konsep-kota_penandatangan",
                    form_name
                ).val(data.kota_penandatangan);
                $(
                    "#surat-surat-keluar-konsep-jabatan_penandatangan",
                    form_name
                ).val(data.jabatan_penandatangan);
                $(
                    "#surat-surat-keluar-konsep-id_sifat_keamanan_surat" +
                        data.id_sifat_keamanan_surat,
                    form_name
                ).prop("checked", true);
                $(
                    "#surat-surat-keluar-konsep-id_sifat_penyelesaian_surat" +
                        data.id_sifat_penyelesaian_surat,
                    form_name
                ).prop("checked", true);
            }
        );
    });

    /**
     * Saving surat keluar konsep data
     **/
    $("body").on("click", "#btn-surat-surat-keluar-konsep-save", function (e) {
        e.preventDefault();
        var result = confirm("Apakah Anda yakin akan mengirim data?");
        if (result) {
            $(this).html("Proses pengiriman data ..");
            $(".invalid-feedback").html("");
            $(".invalid-feedback").hide();
            $.ajax({
                data: $("#surat-surat-keluar-konsep-form").serialize(),
                url: route_surat_surat_keluar_konsep_store,
                type: "POST",
                dataType: "json",
                success: function (res) {
                    if (res.errors) {
                        // Failed
                        $.each(res.errors, function (key, value) {
                            $(
                                "#surat-surat-keluar-konsep-" + key + " + div"
                            ).html(value);
                        });
                        $(".invalid-feedback").show();
                        toastr.error(
                            "Silahkan cek kembali pengisian data Anda.",
                            "Data gagal disimpan"
                        );
                    } else {
                        // Success
                        $("#surat-surat-keluar-konsep-ajax-modal").modal(
                            "hide"
                        );
                        surat_surat_keluar_konsep_table.draw();
                        toastr.success(
                            "Penyimpanan data surat keluar berhasil disimpan.",
                            "Data berhasil disimpan."
                        );
                    }
                    $("#btn-surat-surat-keluar-konsep-save").html(
                        "Simpan perubahan"
                    );
                },
                error: function (res) {
                    $("#btn-surat-surat-keluar-konsep-save").html(
                        "Simpan perubahan"
                    );
                    toastr.error(
                        "Silahkan cek ulang data/koneksi jaringan Anda.",
                        "Data gagal disimpan"
                    );
                },
            });
        } else {
            return false;
        }
    });

    /**
     * Deleting surat keluar konsep data
     **/
    $("body").on("click", ".btn-surat-surat-keluar-konsep-delete", function () {
        var surat_surat_keluar_konsep_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data?");
        if (result) {
            $.ajax({
                type: "DELETE",
                url: `${route_surat_surat_keluar_konsep_index}/${surat_surat_keluar_konsep_id}`,
                success: function (data) {
                    surat_surat_keluar_konsep_table.draw();
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        } else {
            return false;
        }
    });

    /**
     * Surat masuk data table
     **/
    var surat_surat_masuk_table = $("#surat-surat-masuk-data-table").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        searching: false,
        paging: false,
        info: false,
        ajax: route_surat_surat_masuk_index,
        columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex", width: "1%" },
            { data: "asal_surat_masuk", name: "asal_surat_masuk" },
            { data: "pejabat_pengirim_surat", name: "pejabat_pengirim_surat" },
            { data: "nomor_surat", name: "nomor_surat" },
            { data: "tanggal_surat", name: "tanggal_surat" },
            { data: "kepada", name: "kepada" },
            { data: "perihal", name: "perihal" },
            {
                data: "id_sifat_keamanan_surat",
                name: "id_sifat_keamanan_surat",
            },
            {
                data: "id_sifat_penyelesaian_surat",
                name: "id_sifat_penyelesaian_surat",
            },
            {
                data: "tenggat_waktu_tindak_lanjut",
                name: "tenggat_waktu_tindak_lanjut",
            },
            { data: "mulai_pukul", name: "mulai_pukul" },
            { data: "selesai_pukul", name: "selesai_pukul" },
            { data: "nomor_agenda", name: "nomor_agenda" },
            { data: "tanggal_agenda", name: "tanggal_agenda" },
            {
                data: "id_asal_ekspedisi_surat_masuk",
                name: "id_asal_ekspedisi_surat_masuk",
            },
            { data: "email_pengirim", name: "email_pengirim" },
            { data: "alamat_pengirim", name: "alamat_pengirim" },
            { data: "id_arahan_surat", name: "id_arahan_surat" },
            { data: "id_jenis_surat_masuk", name: "id_jenis_surat_masuk" },
            { data: "meta", name: "meta" },
            {
                data: null,
                name: "action",
                width: "5%",
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    btn = `<a href="javascript:void(0)" data-toggle="tooltip" data-id="${data.id}" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm btn-surat-surat-masuk-edit">Ubah</a>`;
                    return btn;
                },
            },
        ],
    });

    // new $.fn.dataTable.FixedHeader( surat_surat_masuk_table );

    /**
     * Create new surat masuk
     **/
    $("body").on("click", "#btn-surat-surat-masuk-create", function () {
        reset_form_data("#surat-surat-masuk-form");
        $("#surat-surat-masuk-model-heading").html("Tambah baru surat masuk");
        $("#btn-surat-surat-masuk-save").val("Simpan surat masuk");
        $("#surat-surat-masuk-ajax-modal").modal("show");
    });

    /**
     * Edit surat masuk
     **/
    $("body").on("click", ".btn-surat-surat-masuk-edit", function () {
        // Reset form
        reset_form_data("#surat-surat-masuk-form");
        var surat_surat_masuk_id = $(this).data("id");
        var form_name = "#surat-surat-masuk-form";
        $.get(
            `${route_surat_surat_masuk_index}/${surat_surat_masuk_id}/edit`,
            function (data) {
                $("#surat-surat-masuk-model-heading").html("Ubah surat masuk");
                $("#btn-surat-surat-masuk-save").val("Simpan surat masuk");
                $("#surat-surat-masuk-ajax-modal").modal("show");
                $("#surat-surat-masuk-id", form_name).val(data.id);
                $("#surat-surat-masuk-asal_surat_masuk", form_name).val(
                    data.asal_surat_masuk
                );
                $("#surat-surat-masuk-pejabat_pengirim_surat", form_name).val(
                    data.pejabat_pengirim_surat
                );
                $("#surat-surat-masuk-nomor_surat", form_name).val(
                    data.nomor_surat
                );
                $("#surat-surat-masuk-kepada", form_name).val(data.kepada);
                $("#surat-surat-masuk-perihal", form_name).val(data.perihal);
                $(
                    "#surat-surat-masuk-id_sifat_keamanan_surat" +
                        data.id_sifat_keamanan_surat,
                    form_name
                ).prop("checked", true);
                $(
                    "#surat-surat-masuk-id_sifat_penyelesaian_surat" +
                        data.id_sifat_penyelesaian_surat,
                    form_name
                ).prop("checked", true);
                $("#surat-surat-masuk-nomor_agenda", form_name).val(
                    data.nomor_agenda
                );
                $(
                    "#surat-surat-masuk-id_asal_ekspedisi_surat_masuk" +
                        data.id_asal_ekspedisi_surat_masuk,
                    form_name
                ).prop("checked", true);
                $("#surat-surat-masuk-email_pengirim", form_name).val(
                    data.email_pengirim
                );
                $("#surat-surat-masuk-alamat_pengirim", form_name).val(
                    data.alamat_pengirim
                );
                $(
                    "#surat-surat-masuk-id_arahan_surat" + data.id_arahan_surat,
                    form_name
                ).prop("checked", true);
                $(
                    "#surat-surat-masuk-id_jenis_surat_masuk" +
                        data.id_jenis_surat_masuk,
                    form_name
                ).prop("checked", true);
                $("#surat-surat-masuk-meta", form_name).val(data.meta);
            }
        );
    });

    /**
     * Saving surat masuk data
     **/
    $("body").on("click", "#btn-surat-surat-masuk-save", function (e) {
        e.preventDefault();
        var result = confirm("Apakah Anda yakin akan mengirim data?");
        if (result) {
            $(this).html("Proses pengiriman data ..");
            $(".invalid-feedback").html("");
            $(".invalid-feedback").hide();
            $.ajax({
                data: $("#surat-surat-masuk-form").serialize(),
                url: route_surat_surat_masuk_store,
                type: "POST",
                dataType: "json",
                success: function (res) {
                    if (res.errors) {
                        // Failed
                        $.each(res.errors, function (key, value) {
                            $(
                                "#surat-surat-keluar-konsep-" + key + " + div"
                            ).html(value);
                        });
                        $(".invalid-feedback").show();
                        toastr.error(
                            "Silahkan cek kembali pengisian data Anda.",
                            "Data gagal disimpan"
                        );
                    } else {
                        // Success
                        $("#surat-surat-masuk-ajax-modal").modal("hide");
                        surat_surat_masuk_table.draw();
                        toastr.success(
                            "Penyimpanan data surat keluar berhasil disimpan.",
                            "Data berhasil disimpan."
                        );
                    }
                    $("#btn-surat-surat-masuk-save").html("Simpan perubahan");
                },
                error: function (res) {
                    $("#btn-surat-surat-masuk-save").html("Simpan perubahan");
                    toastr.error(
                        "Silahkan cek ulang data/koneksi jaringan Anda.",
                        "Data gagal disimpan"
                    );
                },
            });
        } else {
            return false;
        }
    });

    /**
     * Deleting surat masuk data
     **/
    $("body").on("click", ".btn-surat-surat-masuk-delete", function () {
        var surat_surat_masuk_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data?");
        if (result) {
            $.ajax({
                type: "DELETE",
                url: `${route_surat_surat_masuk_index}/${surat_surat_masuk_id}`,
                success: function (data) {
                    surat_surat_masuk_table.draw();
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        } else {
            return false;
        }
    });
});
