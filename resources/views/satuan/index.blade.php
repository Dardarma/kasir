@extends('layout')
@section('style')

@endsection
@section('content')

<div class="container-fluid mt-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
           
            <h3 class="card-title">Satuan</h3>
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
                <th>Nama Satuan</th>
                <th style="width:5vw">Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($satuan as $key => $item)
                <tr style="">
                    <td> {{$key+1}} </td>
                    <td> {{$item->nama_satuan}} </td>
                    <td class="d-flex justify-content-center " >
                      <a 
                        href="#" 
                        class="btn btn-warning btn-sm btn-edit mx-1"
                        data-toggle="modal"
                        data-target="#edit"
                        data-id="{{$item->id}}"
                        data-nama_satuan="{{$item->nama_satuan}}"
                        ><i class="fa-solid fa-pencil"></i></a>
                        
                      <form method="POST" id="delete-form-{{ $item->id }}" action="{{ url('satuan/'.$item->id) }}">
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
  @include('satuan.add')
  @include('satuan.edit')
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
    let nama_satuan = $(this).data('nama_satuan');
 
    $('#edit').find('input[name="id"]').val(id);
    $('#edit').find('input[name="nama_satuan"]').val(nama_satuan);

    $('#edit-form').attr('action', `{{url('satuan')}}/${id}`);

    $('#edit').modal('show');
});


  </script>
  @endsection