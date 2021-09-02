
$().ready(function () {

    // validate signup form on keyup and submit
    $("#guardar_registro_contenido").validate({
        rules: {
            nombre_contenido: "required",

            enlace_contenido: {
                required: true,
                url: true
            },

            descripcion_contenido: "required",

            categoria_contenido: "required"
        },
        messages: {
            nombre_contenido: "Por favor, ingrese un nombre",

            enlace_contenido: {
                required: "Por favor, ingrese un enlace",
                url: "Por favor, ingrese una URL válida (ej: http://www.pagina.com)"
            },

            descripcion_contenido: "Por favor, ingrese una descripción",

            categoria_contenido: "Por favor, seleccione una categoría"

        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        submitHandler: function () {
            var form = $("#guardar_registro_contenido");
            var datos = $(form).serializeArray();
            $.ajax({
                type: $(form).attr("method"),
                data: datos,
                url: $(form).attr("action"),
                dataType: "json",
                success: function (data) {
                    var resultado = data;
                    if (resultado.respuesta == "exito") {
                        Swal.fire(
                            '¡Muy bien!',
                            'El registro se guardó exitosamente',
                            'success'
                        )
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: 'No se pudo guardar el registro',
                        })
                    }
                }
            })
        }
    });
});
