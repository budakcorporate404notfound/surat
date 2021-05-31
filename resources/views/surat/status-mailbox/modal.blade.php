<div class="modal fade" id="surat-status-mailbox-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="min-width:75%; max-width:95%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row col-md-12 modal-title" id="surat-status-mailbox-modal-heading">
                    <div class="col-md-6"><h4>Tambah status mailbox</h4></div>
                    <div class="text-right col-md-6"></div>
                </div>
                <button type="button" class="close" data-dismiss="#surat-status-mailbox-ajax-modal" data-target="#surat-status-mailbox-ajax-modal" aria-label="Close" onclick="$('#surat-status-mailbox-ajax-modal').modal('hide');" style="margin-left:-10px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('surat.status-mailbox.form')
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary" id="btn-surat-status-mailbox-save" value="create">Simpan perubahan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="#surat-status-mailbox-ajax-modal" data-target="#surat-status-mailbox-ajax-modal" onclick="$('#surat-status-mailbox-ajax-modal').modal('hide');">Tutup</button>
            </div>
        </div>
    </div>
</div>
