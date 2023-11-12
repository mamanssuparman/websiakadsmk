let baseurl = window.location.origin;

$(document).ready(function () {
    $('#form-update-pass').submit(function (e) {
        e.preventDefault();

		$('.error-messages').html('');

        var formData = {
            pass_old: $('#pass_old').val(),
            pass_new: $('#pass_new').val(),
            confirm_pass: $('#confirm_pass').val(),
            _token: $('input[name="_token"]').val()
        };

        $.ajax({
            url: '/admin/profileuser/change_pass',
            type: 'POST',
            data: formData,
            success: function (data) {
                $('#alert-3').text(data.success).removeClass('hidden').addClass('flex');

                setTimeout(function () {
                    $('#alert-3').addClass('hidden').removeClass('flex');
                }, 3000);

				$('#form-update-pass')[0].reset();

            },
            error: function (error) {
                // Mengelola kesalahan di sini
                $('#alert-4').text(error.responseJSON.error).removeClass('hidden').addClass('flex');

                setTimeout(function () {
                    $('#alert-4').addClass('hidden').removeClass('flex');
                }, 3000);

                if (error.responseJSON && error.responseJSON.errors) {
					$('#old_pass').html(error.responseJSON.errors.pass_old);
					$('#new_pass').html(error.responseJSON.errors.pass_new);
					$('#conf_pass').html(error.responseJSON.errors.confirm_pass);
				}

            }
        });
    });
});
