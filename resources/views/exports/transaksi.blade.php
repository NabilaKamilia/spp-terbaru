<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .table{
        border-collapse: collapse;
        width: 100%;
    }

    .table td, .table th{
        border: 1px solid #ddd;
        padding: 8px;
    }
</style>
<body>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Tahun Ajaran</th>
            <th>Bulan Tahun</th>
            <th>Nominal</th>
            <th>Status</th>
          <th>Kode Pembayaran</th>
          <th>Waktu Transaksi</th>


        </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @inject('convert', 'App\Helpers\Convert')
          @foreach ($data as $item)
              <tr>
                  <td>{{ strval($no)}}</td>
                  <td>{{$item->user->nisn}}</td>
                  <td>{{$item->user->user->name}}</td>
                    <td>{{$item->user->penempatan->kelas->kelas}}</td>
                    <td>{{$item->user->penempatan->tahun_ajaran?? "-"}}</td>
                  <td>{{$item->spp->bulan}}</td>
                  <th>{{$item->spp->nominal}}</th>
                  <th> <span class="badge badge-pills {{$item->status_pembayaran == 1 ? "badge-warning" : ($item->status_pembayaran == 2 ? "badge-success" : "badge-danger") }}">{{$item->status_pembayaran == 1 ? "Menunggu Pembayaran" : ($item->status_pembayaran == 2 ? "Pembayaran Selesai" : "Kedaluarsa" )}}</span></th>
                  <td>{{$item->kode_pembayaran}}</td>
                  <td>{{$convert->convertDate($item->created_at)}}</td>

              </tr>
              @php
                    $no++;
              @endphp
          @endforeach

        </tbody>
    </table>
</body>
</html>
