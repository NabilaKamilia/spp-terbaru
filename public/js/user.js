$(function () {
    $("#table-users").DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: `${APP_URL}/user`
        }, columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex", className: "text-center", width: "4%", },
            { data: "nama", name: "nama", },
            { data: "email", name: "email", },
            { data: "alamat", name: "alamat", },
            { data: "no_hp", name: "no_hp", },
            { data: "action", name: "action", className: "text-center", orderable: false, searchable: false, }
        ]
    });

    $("#table-users").on("click", ".btn-edit-user", function () {
        var id = $(this).data('id');
        var url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: `${APP_URL}/user/${id}/edit`,
            beforeSend: function () {
                $('#body-modal-edit').hide();
                $('#loading').show();
            },
            success: function (res) {
                $('#loading').hide();
                $('#body-modal-edit').show();
                $('#form-edit-user').attr('action', `${APP_URL}/${url}`);
                $('#nama').val(res.data.nama)
                $('#email').val(res.data.email)
                $('#no_hp').val(res.data.no_hp)
                $('#alamat').val(res.data.alamat)
            },
        });
    });

    $("#table-users").on("click", ".btn-delete-user", function () {
        var id = $(this).data('id');
        $("#form-delete-user").on("submit", function (e) {
            var url = APP_URL + "/user/" + id
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                success: function (res) {
                    $("#deleteUserModal").modal("hide");
                    $("#table-users").DataTable().ajax.reload();
                },
                error: (e, x, settings, exception) => {
                },
            });
            e.preventDefault();
        });
    });

})
