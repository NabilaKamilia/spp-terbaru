@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
          <a href="{{ route('user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data User
          </a>
      </div>

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
                            <th>No</th>
                            <th>Nama</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{$item->email}}</td>

                                <td>
                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{route( 'user.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

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
      {{-- </div> --}}
    </div>
    <!-- /.container-fluid -->
@endsection
