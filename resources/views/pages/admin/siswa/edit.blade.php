@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Siswa {{ $item->nama}}</h1>
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
            <form action="{{ route('siswa.update', $item->nisn) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="NISN">NISN</label>
                    <input type="text" class="form-control" name="nisn" placeholder="NISN" value="{{ $item->nisn }}">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    {{-- <input type="text" class="form-control" name="jenis_kelamin" placeholder="jenis_kelamin" value="{{ $item->jenis_kelamin }}"> --}}
                    <select name="jenis_kelamin" class="form-control" id="">
                        <option value="Laki-Laki" {{$item->jenis_kelamin == "Laki-Laki" ? "selected" : ""}}>Laki-Laki</option>
                        <option value="Perempuan"  {{$item->jenis_kelamin == "Perempuan" ? "selected" : ""}}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control">

                        @foreach ($kelas as $cls)
                        {{-- <input type="text" class="form-control" name="kelas" placeholder="kelas" value="{{ $item->kelas }}"> --}}
                            <option value="{{$cls->id}}" {{$item->kelas_id == $cls->id}}>{{$cls->kelas}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="NIS">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$item->alamat}}" placeholder="alamat">
                </div>
                <div class="form-group">
                    <label for="NIS">No. Telp</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$item->no_hp}}" placeholder="0128301">
                </div>
                {{-- <div class="form-group">
                    <label for="TahunAjaran">Tahun Ajaran</label>
                    <input type="text" class="form-control" name="TahunAjaran" placeholder="TahunAjaran" value="{{ $item->TahunAjaran }}">
                </div> --}}
               {{-- <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Status
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Aktif</a>
                        <a class="dropdown-item" href="#">Tidak Aktif</a>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control" id="">
                        <option value="aktif" {{$item->status == 'aktif' ? "selected" : ""}}>Aktif</option>
                        <option value="tidak_aktif" {{$item->status == 'tidak_aktif' ? "selected" : ""}}>Tidak Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
