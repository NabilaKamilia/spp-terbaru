$(function () {
    $("#table-kategori").DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: `${APP_URL}/kelas`
        }, columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex", className: "text-center", width: "4%", },
            { data: "kelas", name: "kelas", },
            { data: "action", name: "action", className: "text-center", orderable: false, searchable: false, }
        ]
    });

    $("#table-kategori").on("click", ".btn-edit-kategori", function () {
        var id = $(this).data('id');
        var url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: `${APP_URL}/kelas/${id}/edit`,
            beforeSend: function () {
                $('#body-modal-edit').hide();
                $('#loading').show();
            },
            success: function (res) {
                $('#loading').hide();
                $('#body-modal-edit').show();
                $('#form-edit-kategori').attr('action', `${APP_URL}/${url}`);
                $('#nama_edit').val(res.data.nama)
            },
        });
    });

    $("#table-kategori").on("click", ".btn-delete-kategori", function () {
        var id = $(this).data('id');
        $("#form-delete-kategori").on("submit", function (e) {
            var url = APP_URL + "/kelas/" + id
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                success: function (res) {
                    $("#deleteKategoriModal").modal("hide");
                    $("#table-kategori").DataTable().ajax.reload();
                },
                error: (e, x, settings, exception) => {
                },
            });
            e.preventDefault();
        });
    });
});
