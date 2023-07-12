@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data User</h1>
      </div>

      <!-- Content Row -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('transaksi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Pengguna</label>
                        {{-- <input type="text" class="form-control" name="name" placeholder="Nama"> --}}
                        <select name="nisn" class="form-control" id="user"></select>
                    </div>
                    <div class="form-group">
                        <label for="username">Tagihan</label>
                        <select name="spp" class="form-control" id="spp"></select>
                        {{-- <input type="text" class="form-control" name="username" placeholder="Username" > --}}
                    </div>


                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


@endsection

@section('script')
<script>
    console.log("TEST");
    $.ajax({
        url : '/api/spp',
        type : 'GET',

        success : function(data){
            console.log(data);
            $('#spp').empty().prepend('<option value="" disabled selected> -- Pilih Tagihan -- </option>')
            $.each(data.data, function(key, value){
                $('#spp').append('<option value="'+ value.id +'">'+ value.bulan +'</option>');
            });
        }
    })

    $.ajax({
        url : '/api/siswa',
        type : 'GET',

        success : function(data){
            console.log(data);
            $('#user').empty().prepend('<option value="" disabled selected> -- Pilih User -- </option>')
            $.each(data.data, function(key, value){
                $('#user').append('<option value="'+ value.nisn +'">'+ value.user.name +'</option>');
            });
        }
    })
</script>
@endsection

