@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
        </div>
        <div class="col text-right">
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btn-penempatan-kelas">
                <i class="fas fa-user fa-sm text-white-50"></i> Penempatan Kelas
            </button>
            <a href="{{ route('siswa.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Siswa
            </a>

        </div>
      </div>

      <!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                <form class="float-right form-inline" id="searchForm" method="get" action="{{ route('siswa.index') }}" role="search">
                    <div class="form-group mb-3 mt-3">
                        <input type="text" name="keyword" class="form-control" id="Keyword" aria-describedby="Keyword" placeholder="Nama" value="{{request()->query('keyword')}}">
                    </div>
                    <button type="submit" class="btn btn-outline-info mx-2">Cari</button>
                    <a href="{{ route('siswa.index') }}">
                        <button type="button" class="btn btn-outline-danger">Reset</button>
                    </a>
                </form>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>NISN</th>
                          <th>Username</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @php
                            $no = 1;
                        @endphp
                      @forelse($siswas as $item)
                          <tr>
                              <td>{{ $no}}</td>
                              <td>{{ $item->nisn }}</td>
                              <td>{{ $item->User->name }}</td>
                              <td>{{ $item->User->username }}</td>
                              <td>{{$item->jenis_kelamin}}</td>
                              <td>{{$item->status}}</td>

                              <td>
                                  <a href="{{ route('siswa.edit', $item->nisn) }}" class="btn btn-warning">
                                      <i class="fa fa-pencil-alt"></i>
                                  </a>
                                  <button class="btn btn-info btn-detail-siswa" data-id="{{$item->nisn}}"><i class="fas fa-eye"></i></button>
                                  <form action="{{route( 'user.destroy', $item->nisn) }}" method="post" class="d-inline">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger">
                                          <i class="fa fa-trash"></i>
                                      </button>
                                  </form>

                              </td>
                          </tr>
                          @php
                              $no++;
                          @endphp
                      @empty
                          <td colspan="7" class="text-center">
                              Data Kosong
                          </td>
                      @endforelse
                      </tbody>
                  </table>
                  {{ $siswas->links() }}
              </div>
          </div>
      </div>
    </div>
    <!-- /.container-fluid -->

    <div class="modal fade" id="modal-penempatan-kelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Penempatan Kelas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Siswa</label>
                    {{-- <input type="text" clas> --}}
                    <select name="" class="form-control" id="siswa"></select>
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="" class="form-control" id="kelas"></select>
                </div>
                <div class="form-group">
                    <label for="">Tahun Ajaran</label>
                    <input name="" class="form-control" id="tahun_ajaran"/>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btn-save-penempatan-kelas">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <div class="modal fade" id="modal-detail-siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Penempatan Kelas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Siswa</label>
                    <input type="text" class="form-control" id="siswa-detail">
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <input type="text" class="form-control" id="kelas-detail">
                    {{-- <select name="" class="form-control" id="kelas"></select> --}}
                </div>
                <div class="form-group">
                    <label for="">Tahun Ajaran</label>
                    <input name="" class="form-control" id="tahun_ajaran-detail"/>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection


@section('script')
    <script>
        $('#btn-penempatan-kelas').on('click', function () {
            $('#modal-penempatan-kelas').modal('show')

            $.ajax({
                url : "/api/siswa",
                type : "GET",
                success : function (data) {
                    // console.log(data);
                    var res = data.data;
                    $('#siswa').empty().append("<option disabled selected> -- Pilih siswa -- </option>")
                    res.forEach(el => {
                        $('#siswa').append(`<option value=${el.NISN}>${el.user.name} </option>`)
                    });
                }
            })

            $.ajax({
                url : "/api/kelas",
                type : "GET",
                success : function (data) {
                    console.log(data);
                    var res = data.data;
                    $('#kelas').empty().append("<option disabled selected> -- Pilih kelas -- </option>")
                    res.forEach(el => {
                        $('#kelas').append(`<option value=${el.id}>${el.kelas} </option>`)
                    });
                }
            })
        })

        $('#btn-save-penempatan-kelas').on('click', function () {
            $.ajax({
                url : '/api/penempatan-kelas',
                type : "POST",
                data : {
                    "nisn" : $('#siswa').val(),
                    "kelas_id" : $("#kelas").val(),
                    "tahun_ajaran" : $("#tahun_ajaran").val()
                },
                success : function (data) {
                    window.location.reload()
                }
            })
        })

        $("body").on('click', '.btn-detail-siswa', function () {
            var id = $(this).data("id");
            console.log(id);
            $('#modal-detail-siswa').modal("show")
            $.ajax({
                url : "/api/siswa/" + id,
                type : "GET",
                success : function (data) {
                    // console.log(data);
                    var res = data.data;
                    $('#siswa-detail').val(res.user.name).attr("disabled",true)
                    $('#kelas-detail').val(res.penempatan.kelas.kelas).attr("disabled",true)
                    $('#tahun_ajaran-detail').val(res.penempatan.tahun_ajaran).attr("disabled",true)
                }
            })
        })
    </script>
@endsection
