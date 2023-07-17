<style>
    .page-break {
        page-break-after: always;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table td, .table th {
        padding: 8px;
    }

    .text-center {
        text-align: center;
    }
    .header {
        height: 100px;
        width: 100%;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .row.col-8 {
        width: 60%;
    }

    .row.col-4{
        width: 33.33%;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    </style>
    <div class="header">
        <table class="table">
            <tr>
                <td style="width:100px">
                    <div class="text-center">
                        <img src="https://proiptek.com/cms/unggah/LOGO-MI-web.png" style="max-height: 80px;"  class="img-fluid" alt="">
                    </div>
                </td>
                <td>

                    <p style="font-size: 13px">MI AL HUDA Kota Malang</p>
                    <p style="font-size: 13px">Jalan Selat Sunda VIII D9-20 Lesanpuro, Kota Malang, Jawa Timur</p>
                    <p style="font-size: 13px">Telp. (0341) 717 303</p>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <div class="text-center">
        <h3>BUKTI PEMBAYARAN</h3>
    </div>
    <table class="table">
        <tr>
            <td style="width: 200px">NISN</td>
            <td >: {{$data->nisn ?? "-"}}</td>
        </tr>
        <tr>
            <td style="width: 200px">Nama</td>
            <td>: {{$data->user->user->name ?? "-"}}</td>
        </tr>
        <tr>
            <td style="width: 200px">Kelas</td>
            <td>: {{$data->user->penempatan->kelas->kelas ?? "-"}}</td>
        </tr>
        <tr>
            <td style="width: 200px">Tahun Ajaran</td>
            <td>: {{$data->user->penempatan->tahun_ajaran ?? "-"}} </td>
        </tr>
        <tr>
            <td style="width: 200px">Bulan Tahun</td>
            <td>: {{$data->spp->bulan ?? "-"}} </td>
        </tr>
        <tr>
            <td style="width: 100px">Nominal</td>
            <td>: Rp. {{$data->spp->nominal ?? "0"}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: {{$data->status_pembayaran == 1 ? "Menunggu Pembayaran" : ($data->status_pembayaran == 2 ? "Pembayaran Selesai" : "Kedaluarsa" )}} </td>
        </tr>
        <tr>
            <td>Kode Pembayaran</td>
            <td>: {{$data->kode_pembayaran}}</td>
        </tr>
        <tr>
            <td>Waktu Pembayaran</td>
            <td>: {{$data->created_at}}</td>
        </tr>
    </table>
