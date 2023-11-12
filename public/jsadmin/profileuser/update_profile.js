$(document).ready(function () {

    $('#form-update-profile').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var alert    = '#alert-2';
        $.ajax({
            type: 'POST',
            url: '/admin/profileuser/update_profile_user',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#nuptk').val(data.user.nuptk);
                $('#nip').val(data.user.nip);
                $('#nama').val(data.user.nama);
                $('#selectJenisKelamin').val(data.user.jeniskelamin);
                $('#alamat').val(data.user.alamat);
                $('#selectPendidikanTerakhir').val(data.user.pendidikanterakhir);
                $('#selectJabatan').val(data.user.jabatan);
                $('#selectTugasTambahan').val(data.user.tugastambahan);

                if (data.user.photos) {
                    $('.profile-photo').attr('src', '/profile_photos/' + data.user.photos);
                } else {
                    $('.profile-photo').attr('src', '/profile_photos/' + data.user.current_photos);
                }

                $(alert).removeClass('hidden').addClass('flex');

				setTimeout(function () {
					$(alert).addClass('hidden').removeClass('flex');
				}, 3000);

            },
            error: function (xhr, textStatus, errorThrown) {
                // Tampilkan pesan error atau feedback lainnya
                alert('Terjadi kesalahan: ' + errorThrown);
            }
        });
    });
});

function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
