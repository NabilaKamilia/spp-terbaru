@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Laporan</h1>
          <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan
          </a>
      </div>

      <!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                <form class="float-right form-inline" id="searchForm" method="get" action="" role="search">
                    <div class="form-group mb-3 mt-3">
                        <input type="text" name="keyword" class="form-control" id="Keyword" aria-describedby="Keyword" placeholder="Nama" value="">
                    </div>
                    <button type="submit" class="btn btn-outline-info mx-2">Cari</button>
                    <a href="">
                        <button type="button" class="btn btn-outline-danger">Reset</button>
                    </a>
                </form>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Bulan</th>
                          <th>Kode Pembayaran</th>
                          <th>Waktu Transaksi</th>
                          <th>Jumlah Tagihan</th>
                      </tr>
                      </thead>
                      <tbody>
                      @php
                          $no = 1;
                      @endphp
                      @forelse($data as $item)
                          <tr>
                              <td>{{ $no }}</td>
                              <td>{{ $item->user->user->name }}</td>
                              <td>{{ $item->spp->bulan }}</td>
                              <td>{{ $item->kode_pembayaran }}</td>
                              <td>{{$item->created_at}}</td>
                              <td>{{$item->spp->nominal}}</td>
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
              </div>
          </div>
      </div>
    </div>
    <!-- /.container-fluid -->
@endsection
