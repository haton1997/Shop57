$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('.edit').click(function () {
        $('.error').hide();
        var idCategory = $(this).data("id");
        $.ajax({
            url: ' /admin/category/' + idCategory + '/edit ',
            type: 'get',
            dataType: 'json',
            data: {},
            success: function ($result) {
                console.log($result);
                $('.nameCategory').val($result.name);
                $('.titleCategory').text($result.name);
                if ($result.status == 1) {
                    $('.activeCategory').attr('selected', 'selected');
                } else {
                    $('.unactiveCategory').attr('selected', 'selected');
                }

            }
        });
        $('.update').click(function () {
            let nameCategory = $('.nameCategory').val();
            let statusCategory = $('.statusCategory').val();
            let idCategory = $(this).data('id');
            $.ajax({
                url: '/admin/category/' + idCategory,
                type: 'put',
                dataType: 'json',
                data: {
                    name: nameCategory,
                    status: statusCategory
                },
                success: function ($result) {
                    console.log($result);
                    if ($result.error == 'true') {
                        $('.error').html($result.message.name[0]);
                        $('.error').show();
                    } else {
                        toastr.success($result.success, 'Thông báo', {timeOut: 3000});
                        $('#edit').modal('hide');
                        location.reload();
                    }
                }
            })
        });
    });

    $('.remove').click(function () {
        let id = $(this).data('id');
        $('.del').click(function () {
            $.ajax({
                url: '/admin/category/' + id,
                type: 'delete',
                dataType: 'json',
                data: {},
                success: function ($result) {
                    toastr.success($result.success, 'Thông báo', {timeOut: 3000});
                    $('#edit').modal('hide');
                    location.reload();
                }

            });
        });

    })
});

