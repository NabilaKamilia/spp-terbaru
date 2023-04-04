$(function () {
    $("#table-kelas").DataTable({
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

    $("#table-kelas").on("click", ".btn-edit-kelas", function () {
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
                $('#form-edit-kelas').attr('action', `${APP_URL}/${url}`);
                $('#nama_edit').val(res.data.nama)
            },
        });
    });

    $("#table-kelas").on("click", ".btn-delete-kelas", function () {
        var id = $(this).data('id');
        $("#form-delete-kelas").on("submit", function (e) {
            var url = APP_URL + "/kelas/" + id
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                success: function (res) {
                    $("#deleteKelasModal").modal("hide");
                    $("#table-kelas").DataTable().ajax.reload();
                },
                error: (e, x, settings, exception) => {
                },
            });
            e.preventDefault();
        });
    });
});
