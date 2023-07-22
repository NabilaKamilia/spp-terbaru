@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tarif SPP</h1>
        <a href="{{ route('tarifspp.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i> Tambah TarifSpp
          </a>
      </div>

      <!-- Content Row -->
      <div class="row">
        <div class="card w-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan\Tahun</th>
                            <th>Nominal</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->bulan }}</td>
                                <td>{{ $item->nominal }}</td>
                                <td>
                                    <a href="{{ route('tarifspp.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>


                                </td>
                            </tr>
                        @empty
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $items->links() }}
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
@endsection
