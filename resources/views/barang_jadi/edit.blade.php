<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editModuleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Barang Mentah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('barang-jadi')}}/id_placeholder" id="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Harga per Item</label>
                        <input type="number" class="form-control" name="harga_barang" id="harga_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Stok</label>
                        <input type="number" class="form-control" name="stok" id="stok" required>
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


