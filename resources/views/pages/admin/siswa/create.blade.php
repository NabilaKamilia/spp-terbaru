@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Siswa</h1>
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
            <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="NISN">NISN</label>
                    <input type="text" class="form-control" name="nisn" placeholder="NISN">
                </div>

                <div class="form-group">
                    <label>Users</label>
                    <select class="form-control" id="user_id" name="user_id">
                        <option selected hidden disabled>-- Pilih User --</option>
                        @foreach ($user as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option selected hidden disabled>-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label for="TahunAjaran">Tahun Ajaran</label>
                    <input type="text" class="form-control" id="TahunAjaran" name="TahunAjaran" placeholder="Tahun Ajaran">
                </div> --}}
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option selected hidden disabled>-- Pilih Status --</option>
                        <option value="status">Aktif</option>
                        <option value="status">Tidak Aktif</option>
                    </select>
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
