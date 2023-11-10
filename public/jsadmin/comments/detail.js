let csrfHash = $('input[nama="_token"]').val();
$(document).ready(function () {
    $('#rejectBtn').on('click', function () {
        var commentId = $(this).data('comment-id');

        $.ajax({
            url: '/admin/comment/reject/' + atob(commentId),
            type: 'POST',
            dataType: 'json',
            data: {
                _token: $('input[name="_token"]').val()
            },
            success: function (data) {
                alert(data.message);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error: ' + errorThrown);
            }
        });
    });

    $('#approveBtn').on('click', function () {
        var commentId = $(this).data('comment-id');
        $.ajax({
            url: '/admin/comment/approve/' + atob(commentId),
            type: 'POST',
            dataType: 'json',
            data: {
                _token: csrfHash
            },
            success: function (res) {
                alert(res.message);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error: ' + errorThrown);
            }
        });
    });
});
