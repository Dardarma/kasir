@extends('layout')
@section('style')

@endsection
@section('content')

<div class="container-fluid mt-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
           
            <h3 class="card-title">Barang Mentah</h3>
            <div class="card-tools d-flex align-items-center ml-auto">
                <form method="GET" action="{{ url('/barang-gudang') }}" class="d-flex align-items-center">
                    <div class="input-group input-group-sm" style="width: 80px; margin-right: 10px;">
                        <select class="custom-select" name="paginate" onchange="this.form.submit()">
                            <option value="10" {{ request('paginate') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('paginate') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('paginate') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('paginate') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>

                    <div class="input-group input-group-sm" style="width: 80px; margin-right: 10px;">
                      <select class="custom-select" name="type" onchange="this.form.submit()">
                        <option value="Langsung" {{ request('type') == 'Langsung' ? 'selected' : '' }}>Langsung</option>
                        <option value="Tidak Langsung" {{ request('type') == 'Tidak Langsung' ? 'selected' : '' }}>Tidak Langsung</option>
                    </select>                    
                  </div>
                
                    <div class="input-group input-group-sm" style="width: 150px; margin-right: 10px;">
                        <input type="text" name="table_search" class="form-control" placeholder="Search" value="{{ request('table_search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>                        
        
                <!-- Add Level Button -->
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add" >+ Barang</button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="data" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="width:5vw">No</th>
                <th>Nama Barang</th>
                <th>Harga @</th>
                <th>Satuan</th>
                <th>Type</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($barangGudang as $key => $item)
                <tr>
                    <td> {{$key+1}} </td>
                    <td> {{$item->nama_barang}} </td>
                    <td> {{$item->harga_barang}} </td>
                    <td> {{$item->satuan->nama_satuan}} </td>
                    <td> {{$item->type_barang}} </td>
                    <td> {{$item->stok}} </td>
                    <td>
                        <a 
                          href="#" 
                          class="btn btn-warning btn-sm btn-edit"
                          data-toggle="modal"
                          data-target="#edit"
                          data-id="{{$item->id}}"
                          data-nama_barang="{{$item->nama_barang}}"
                          data-harga_barang="{{$item->harga_barang}}"
                          data-stok="{{$item->stok}}"
                          data-id_satuan="{{$item->id_satuan}}"
                          data-type_barang="{{$item->type_barang}}"
                          ><i class="fa-solid fa-pencil"></i></a>
                        <form method="POST" id="delete-form-{{ $item->id }}" action=" {{url('barang-gudang/'.$item->id)}} ">
                            @csrf
                            @method('DELETE')
                          <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $item->id }}"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>

  </div>
  @include('barang_gudang.add')
  @include('barang_gudang.edit')
  @endsection
  @section('script')

  <script>

  document.addEventListener('DOMContentLoaded',function(){
    document.querySelectorAll('.btn-delete').forEach(function(button){
        button.addEventListener('click',function(){
            let formId = button.getAttribute('data-id');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-'+ formId).submit();
                }
        })
    })
    })
  })

  $('.btn-edit').on('click', function () {
    let id = $(this).data('id');
    let nama_barang = $(this).data('nama_barang');
    let harga_barang = $(this).data('harga_barang');
    let stok = $(this).data('stok');
    let id_satuan = $(this).data('id_satuan');
    let type_barang = $(this).data('type_barang');

    // Isi data di modal
    $('#edit').find('input[name="id"]').val(id);
    $('#edit').find('input[name="nama_barang"]').val(nama_barang);
    $('#edit').find('input[name="harga_barang"]').val(harga_barang);
    $('#edit').find('input[name="stok"]').val(stok);
    $('#edit').find('select[name="id_satuan"]').val(parseInt(id_satuan)).trigger('change');   
    $('#edit').find('select[name="type_barang"]').val(type_barang);

    // Ganti action URL dengan ID yang dipilih
    $('#edit-form').attr('action', `{{url('barang-gudang')}}/${id}`);

    // Tampilkan modal
    $('#edit').modal('show');
});


  </script>
  @endsection