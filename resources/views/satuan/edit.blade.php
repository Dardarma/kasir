<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editModuleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('satuan')}}/id_placeholder" id="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Satuan</label>
                        <input type="text" class="form-control" name="nama_satuan" id="nama_satuan" required>
                    </div>
                    <div class="my-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


