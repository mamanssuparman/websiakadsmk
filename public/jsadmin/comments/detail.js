$(document).ready(function () {
    $('#rejectBtn').on('click', function () {
        var commentId = $(this).data('comment-id');

        $.ajax({
            url: '/admin/comment/reject/' + commentId,
            type: 'POST',
            dataType: 'json',
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
            url: '/admin/comment/approve/' + commentId,
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                alert(data.message);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error: ' + errorThrown);
            }
        });
    });
});
