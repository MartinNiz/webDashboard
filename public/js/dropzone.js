Dropzone.autoDiscover = false;
/**
 * Setup dropzone
 */
var myDropzone;
myDropzone = new Dropzone("#image-gallery",{
    url: uploadRoute, // URL de la acción de carga de archivos
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    removedfile:true,
    maxFilesize: 10000000,
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    success: function (file, response) {
        document.querySelector('input[name="image"]').value = response.image;
    },
    removedfile: function(){
        document.querySelector('input[name="image"]').value = '';
    }
});