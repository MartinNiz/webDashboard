Dropzone.autoDiscover = false;
/**
 * Setup dropzone
 */
$(document).ready(function() {
    $("#image-gallery").dropzone({
        url: uploadRoute, // URL de la acción de carga de archivos
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        maxFilesize: 10000000,
        acceptedFiles: '.png,.jpg,.jpeg,.gif',
        success: function (file, response) {
            document.querySelector('input[name="image"]').value = response.image;
        },
        removedfile: function(){
            document.querySelector('input[name="image"]').value = '';
        }
    });
});