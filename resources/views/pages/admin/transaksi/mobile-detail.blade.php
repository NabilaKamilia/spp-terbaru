
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>
<body>
    <div class="d-flex mt-5 justify-content-between">
        <div class="col-md-3"></div>
        <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-body">
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

                        {{-- <div class="text-right">
                            <button class="btn btn-success" id="btn-bayar" data-id="">Bayar</button>
                        </div> --}}
                    </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>


    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    {{-- @stack('prepend-script') --}}
    @include('includes.script')

    {{-- @yield('script') --}}
    {{-- @stack('addon-script') --}}

    <script>
        var id = 0;
        var snapToken = '';
        $(document).ready(function () {
            console.log(window.location.pathname);
            var data = window.location.pathname.split('/');
            id = window.location.pathname.split('/')[data.length - 1];
            // console.log(id);
            $.ajax({
                url : "/api/transaksi/" + id,
                type : "GET",
                success : function (data) {
                    console.log(data);
                    var res= data.data;
                    $("#detail-kode").html(res.kode_pembayaran);
                    $("#detail-nama").html(res.penempatan.siswa.user.name);
                $("#detail-nisn").html(res.nisn);
                $("#detail-kelas").html(res.penempatan.kelas.kelas ?? "-");
                $("#detail-tahun-ajaran").html(res.penempatan.tahun_ajaran ?? "-");
                $("#detail-bulan").html(res.spp.bulan);
                $("#detail-nominal").html(res.nominal);
                $("#detail-status").html(res.status_pembayaran == 1 ? "Menunggu Bayar" : (res.status_pembayaran == 2 ? "Sudah Bayar" : "Kedaluarsa"));
                $("#detail-bayar").html(res.status_pembayaran == 0 ? "-" : res.updated_at);
                // $("#btn-bayar").data('id', res.snap_token).attr("href", res.snap_token);
                snapToken = res.snap_token;

                },
                })
            })



        $('body').on('click', '#btn-bayar', function (e) {
        e.preventDefault();

        snap.pay(snapToken , {
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
    </script>

</body>
</html>

