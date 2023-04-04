$(function () {
    $("#table-transaksi").DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: `${APP_URL}/transaksi`
        }, columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex", className: "text-center", width: "4%", },
            { data: "nama", name: "nama", className: "text-center" },
            { data: "no_invoice", name: "no_invoice", className: "text-center" },
            { data: "jumlah", name: "jumlah", className: "text-center" },
            { data: "total", name: "total", className: "text-center" },
            { data: "status_pembayaran", name: "status_pembayaran", className: "text-center" },
            { data: "status_pengiriman", name: "status_pengiriman", className: "text-center" },
            { data: "action", name: "action", className: "text-center", orderable: false, searchable: false, width: "8%" }
        ]
    });

    $("#table-transaksi").on("click", ".btn-delete-transaksi", function () {
        var id = $(this).data('id');
        $("#form-delete-transaksi").on("submit", function (e) {
            var url = APP_URL + "/transaksi/" + id
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                success: function (res) {
                    $("#deleteTransaksiModal").modal("hide");
                    $("#table-transaksi").DataTable().ajax.reload();
                },
                error: (e, x, settings, exception) => {
                },
            });
            e.preventDefault();
        });
    });


    $("#table-transaksi").on("click", ".btn-edit-transaksi", function () {
        var id = $(this).attr('data-id')
        $.ajax({
            type: "GET"
            , url: `${APP_URL}/transaksi/${id}/edit`
            , success: function (res) {
                $('#body-edit-status-transaksi').html(res.html)
            }
            , error: function (err) {
            }
        });
    });
});
