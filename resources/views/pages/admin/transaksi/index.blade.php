@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->





      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
          <a href="{{ url('admin/transaksi/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Transaksi
          </a>
      </div>

      @if ($message = Session::get('success'))

      <div class="alert alert-success alert-block">

          <button type="button" class="close" data-dismiss="alert">×</button>

          <strong>{{ $message }}</strong>

      </div>
      @endif

      @if ($message = Session::get('error'))

      <div class="alert alert-danger alert-block">

          <button type="button" class="close" data-dismiss="alert">×</button>

          <strong>{{ $message }}</strong>

      </div>
      @endif

      <!-- Content Row -->
      {{-- <div class="row"> --}}
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="table-responsive">
                  <form class="float-right form-inline" id="searchForm" method="get" action="{{ route('user.index') }}" role="search">
                      <div class="form-group mb-3 mt-3">
                          <input type="text" name="keyword" class="form-control" id="Keyword" aria-describedby="Keyword" placeholder="Nama" value="{{request()->query('keyword')}}">
                      </div>
                      <button type="submit" class="btn btn-outline-info mx-2">Cari</button>
                      <a href="{{ route('user.index') }}">
                          <button type="button" class="btn btn-outline-danger">Reset</button>
                      </a>
                  </form>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                          <th>Kode Pembayaran</th>
                          <th>Waktu Transaksi</th>
                          <th>Jumlah Tagihan</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          @php
                              $no = 1;
                          @endphp
                          @foreach ($data as $item)
                              <tr>
                                  <td>{{$no}}</td>
                                  <td>{{$item->user->user->name}}</td>
                                  <td>{{$item->kode_pembayaran}}</td>
                                  <td>{{$item->waktu_transaksi}}</td>
                                  <th>{{$item->spp->nominal}}</th>
                                  <th> <span class="badge badge-pills {{$item->status_pembayaran == 1 ? "badge-warning" : ($item->status_pembayaran == 2 ? "badge-success" : "badge-danger") }}">{{$item->status_pembayaran == 1 ? "Menunggu Pembayaran" : ($item->status_pembayaran == 2 ? "Pembayaran Selesai" : "Kedaluarsa" )}}</span></th>
                                  <th>
                                    <button class="btn btn-sm btn-primary btn-bayar" data-id={{$item->snap_token}}>Bayar</button>
                                    <button class="btn btn-sm btn-info btn-detail" data-id={{$item->id}}><i class="fas fa-eye"></i></button>
                                      <button class="btn btn-sm btn-info btn-tf" data-id={{$item->id}} data-href="https://simulator.sandbox.midtrans.com/bca/va/index">TF</button>
                                  </th>
                              </tr>
                              @php
                                    $no++;
                              @endphp
                          @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      {{-- </div> --}}
    </div>
    <!-- /.container-fluid -->

    <div class="modal fade" id="modal-bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
          <div class="modal-content ">
            <div class="modal-body" style="height: 700px">
                <iframe src="https://simulator.sandbox.midtrans.com/bca/va/index" frameborder="0" style="height: 500px"></iframe>
              </div>
            {{-- <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
          </div>
        </div>
      </div>


    <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " >
          <div class="modal-content ">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Pembayaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td class="border-0">Kode Bayar</td>
                            <td class="border-0" id="detail-kode"></td>
                        </tr>
                        <tr>
                            <td class="border-0">Nama</td>
                            <td class="border-0" id="detail-nama"></td>
                        </tr>
                        <tr>
                            <td class="border-0">NISN</td>
                            <td class="border-0" id="detail-nisn"></td>
                        </tr>
                        <tr>
                            <td class="border-0">Kelas</td>
                            <td class="border-0" id="detail-kelas"></td>
                        </tr>
                        <tr>
                            <td class="border-0">Tahun Ajaran</td>
                            <td class="border-0" id="detail-tahun-ajaran"></td>
                        </tr>
                        <tr>
                            <td class="border-0">Bulan</td>
                            <td class="border-0" id="detail-bulan"></td>
                        </tr>
                        <tr>
                            <td class="border-0">Nominal</td>
                            <td class="border-0" id="detail-nominal"></td>
                        </tr>
                        <tr>
                            <td class="border-0">Status</td>
                            <td class="border-0" id="detail-status"></td>
                        </tr>
                        <tr>
                            <td class="border-0">Waktu Pembayaran</td>
                            <td class="border-0" id="detail-bayar"></td>
                        </tr>
                    </table>
                  </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
@endsection


@section('script')
<script>
    // const payButton = document.querySelector('#pay-button');

    $('body').on('click', '.btn-bayar', function (e) {
        e.preventDefault();

        snap.pay($(this).data('id') , {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            }
        });
    })

    $('body').on('click', '.btn-tf', function () {
        // $('#modal-bayar .modal-body').load($(this).data('href'), function () {
            $('#modal-bayar').modal('show')
            $('#modal-bayar .modal-body').html('<iframe src="'+$(this).data('href')+'" width="100%" height="100%"></iframe>')
        // })
        // $('#modal-bayar').modal('show')
    })

    $("body").on('click', '.btn-detail', function () {
        $("#modal-detail").modal('show')
        $.ajax({
            url : "/api/transaksi/"+$(this).data('id'),
            type : "GET",
            success : function (data) {
                console.log(data);
                var res= data.data;
                $("#detail-kode").html(res.kode_pembayaran);
                $("#detail-nama").html(res.user.user.name);
                $("#detail-nisn").html(res.nisn);
                $("#detail-kelas").html(res.kelas ?? "-");
                $("#detail-tahun-ajaran").html(res.tahun_ajaran ?? "-");
                $("#detail-bulan").html(res.spp.bulan);
                $("#detail-nominal").html(res.spp.nominal);
                $("#detail-status").html(res.status_pembayaran == 1 ? "Menunggu Bayar" : (res.status_pembayaran == 2 ? "Sudah Bayar" : "Kedaluarsa"));
                $("#detail-bayar").html(res.status_pembayaran == 0 ? "-" : res.updated_at);
            }
        })
    })


</script>
@endsection
