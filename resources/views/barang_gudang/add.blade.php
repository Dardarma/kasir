<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addModuleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Barang Mentah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('/barang-gudang')}}" >
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Harga per Item</label>
                        <input type="number" class="form-control" name="harga_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Stok</label>
                        <input type="number" class="form-control" name="stok" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">satuan</label>
                        <div class="input-group input-group-sm" >
                            <select class="custom-select" name="id_satuan" >
                                @foreach ($satuan as $item)
                                    <option value="{{$item->id}}">{{$item->nama_satuan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Type</label>
                        <div class="input-group input-group-sm" >
                            <select class="custom-select" name="type_barang" >
                                <option value="Langsung">Langsung</option>
                                <option value="Tidak Langsung" >Tidak Langsung</option>
                            </select>
                        </div>
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


