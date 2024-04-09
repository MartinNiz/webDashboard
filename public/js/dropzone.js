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
    maxFilesize: 10000000,
    addRemoveLinks: true, 
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    sending: function (file, xhr, formData) {
        // Agrega el ID del producto a los datos enviados con la imagen
        formData.append('product_id', $('#product_id').val()); // Suponiendo que tengas un campo de entrada hidden con el ID del producto en tu formulario
    },
    success: function (file, response) {
        console.log(response.image)
    },
});

myDropzone.on("removedfile", function(file) {
    // Envía una solicitud AJAX para eliminar la imagen
    $.ajax({
        url: deleteRoute, // Ruta para eliminar la imagen
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            path: file.name // Envía la ruta de la imagen a eliminar
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr) {
            console.error(xhr);
        }
    });
});