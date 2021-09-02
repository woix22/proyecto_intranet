$().ready(function () {

    // validar formulario nuevo usuario
    $("#nuevo_usuario").validate({
        rules: {

            rut: {
                required: true,
                validar_rut: true
            },

            correo_nuevo: {
                required: true,
                email: true,
                correo_corporativo: false
            },

            perfil: "required"

        },
        messages: {

            rut: {
                required: "Por favor, ingrese un RUT",
                validar_rut: "Por favor, ingrese un RUT válido"
            },

            correo_corp: {
                required: "Por favor, ingrese un correo electrónico",
                email: "Por favor, ingrese un correo electrónico válido",
                correo_corporativo: 'El correo debe terminar en "@correocorporativo.com"'
            },

            perfil: "Por favor, seleccione un perfil"

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

            var form = $("#nuevo_usuario");
            var datos = $(form).serializeArray();
            $.ajax({
                type: $(form).attr("method"),
                data: datos,
                url: $(form).attr("action"),
                dataType: "json",
                beforeSend: function () {
                    $('#guardar').attr("disabled", "disabled");
                    $('#cargando').show(400, "swing");
                },
                success: function (data) {
                    var resultado = data;
                    if (resultado.respuesta == "exito") {
                        Swal.fire(
                            '¡Muy bien!',
                            'Se ha enviado el correo exitosamente',
                            'success'
                        )
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: 'No se pudo enviar el correo',
                        })
                    }
                    $('#guardar').removeAttr("disabled");
                    $('#cargando').hide(400, "swing");
                }


            })
        }
    });
    // validar formulario de primera edición
    $("#primera_edicion").validate({
        rules: {

            nombre1: "required",

            nombre2: "required",

            apellido1: "required",

            apellido2: "required",

            fecha_nacimiento: "required",

            genero: "required",

            nacionalidad: "required",

            nacionalidad_otros: "required",

            correo_adicional: {
                required: true,
                email: true
            },

            telefono: {
                required: true,
                digits: true,
                minlength: 8,
                maxlength: 8
            },

            telefono2: {
                required: true,
                digits: true,
                minlength: 8,
                maxlength: 8
            },

            direccion: "required",

            comuna: "required",

            foto: {
                accept: "image/*"
            },

            cedula: {
                required: true,
                accept: "application/msword,vnd.openxmlformats-officedocument.wordprocessingml.document,vnd.oasis.opendocument.text,pdf,rtf"
            },

            cv: {
                required: true,
                accept: "application/msword,vnd.openxmlformats-officedocument.wordprocessingml.document,vnd.oasis.opendocument.text,pdf,rtf"
            },

            nombre_emergencia1: "required",

            telefono_emergencia1: {
                required: true,
                digits: true,
                minlength: 8,
                maxlength: 8
            },

            nombre_emergencia2: "required",

            telefono_emergencia2: {
                required: true,
                digits: true,
                minlength: 8,
                maxlength: 8
            },

            nivel_pregrado: "required",

            institucion_pregrado: "required",

            titulo_pregrado: "required",

            semestres_pregrado: "required",

            fecha_pregrado: "required",

            certificado_pregrado: {
                required: true,
                accept: "image/*, application/pdf"
            },

            nivel_pregrado2: "required",

            institucion_pregrado2: "required",

            titulo_pregrado2: "required",

            semestres_pregrado2: "required",

            fecha_pregrado2: "required",

            certificado_pregrado2: {
                required: true,
                accept: "image/*, application/pdf"
            },

            nivel_postgrado: "required",

            institucion_postgrado: "required",

            titulo_postgrado: "required",

            semestres_postgrado: "required",

            fecha_postgrado: "required",

            certificado_postgrado: {
                required: true,
                accept: "image/*, application/pdf"
            },

            nivel_postgrado2: "required",

            institucion_postgrado2: "required",

            titulo_postgrado2: "required",

            semestres_postgrado2: "required",

            fecha_postgrado2: "required",

            certificado_postgrado2: {
                required: true,
                accept: "image/*, application/pdf"
            },

            institucion_bancaria: "required",

            tipo_cuenta: "required",

            numero_cuenta: {
                required: true,
                digits: true
            },

            contrasena_actual: {
                required: true,
                minlength: 6
            },
            contrasena_nueva: {
                required: true,
                minlength: 6
            },
            contrasena_repetir: {
                required: true,
                minlength: 6,
                equalTo: "#contrasena_nueva"
            },

            cb_declaracion: "required"

        },
        messages: {

            nombre1: "Por favor, ingrese su primer nombre",

            nombre2: "Por favor, ingrese su segundo nombre",

            apellido1: "Por favor, ingrese su apellido paterno",

            apellido2: "Por favor, ingrese su apellido materno",

            fecha_nacimiento: "Por favor, ingrese su fecha de nacimiento",

            genero: "Por favor, indique su género",

            nacionalidad: "Por favor, indique su nacionalidad",

            nacionalidad_otros: "Por favor, indique su nacionalidad",

            correo_adicional: {
                required: "Por favor, ingrese su correo electrónico personal",
                email: "Por favor, ingrese un correo electrónico válido"
            },

            telefono: {
                required: "Por favor, ingrese un número de contacto",
                digits: "Por favor, solo ingrese números",
                minlength: "El número debe contener 8 dígitos",
                maxlength: "El número debe contener 8 dígitos"
            },

            telefono2: {
                required: "Por favor, ingrese un número de contacto",
                digits: "Por favor, solo ingrese números",
                minlength: "El número debe contener 8 dígitos",
                maxlength: "El número debe contener 8 dígitos"
            },

            direccion: "Por favor, ingrese su dirección",

            comuna: "Por favor, indique su comuna",

            foto: {
                accept: "Formatos aceptados: solo imágenes"
            },

            cedula: {
                required: "Por favor, suba copia de su cédula de identidad (ambos lados)",
                accept: "Formatos aceptados: .DOC, .DOCX, .ODT, RTF, PDF"
            },

            cv: {
                required: "Por favor, suba su currículum vitae actualizado",
                accept: "Formatos aceptados: .DOC, .DOCX, .ODT, RTF, PDF"
            },

            nombre_emergencia1: "Por favor ingrese nombre completo de su contacto de emergencia",

            telefono_emergencia1: {
                required: "Por favor, ingrese el número de teléfono de su contacto de emergencia",
                digits: "Por favor, solo ingrese números",
                minlength: "El número debe contener 8 dígitos",
                maxlength: "El número debe contener 8 dígitos"
            },

            nombre_emergencia2: "Por favor ingrese nombre completo de su contacto de emergencia",

            telefono_emergencia2: {
                required: "Por favor, ingrese el número de teléfono de su contacto de emergencia",
                digits: "Por favor, solo ingrese números",
                minlength: "El número debe contener 8 dígitos",
                maxlength: "El número debe contener 8 dígitos"
            },

            nivel_pregrado: "Por favor, indique su nivel de estudios",

            institucion_pregrado: "Por favor, ingrese el nombre de la institución académica en donde estudió",

            titulo_pregrado: "Por favor, ingrese su título",

            semestres_pregrado: "Por favor, ingrese la duración de su carrera en semestres",

            fecha_pregrado: "Por favor, indique la fecha de su titulación",

            certificado_pregrado: {
                required: "Por favor, suba su certificado",
                accept: "Formatos aceptados: Imágenes y .PDF"
            },

            nivel_pregrado2: "Por favor, indique su nivel de estudios",

            institucion_pregrado2: "Por favor, ingrese el nombre de la institución académica en donde estudió",

            titulo_pregrado2: "Por favor, ingrese su título",

            semestres_pregrado2: "Por favor, ingrese la duración de su carrera en semestres",

            fecha_pregrado2: "Por favor, indique la fecha de su titulación",

            certificado_pregrado2: {
                required: "Por favor, suba su certificado",
                accept: "Formatos aceptados: Imágenes y .PDF"
            },

            nivel_postgrado: "Por favor, indique su nivel de estudios",

            institucion_postgrado: "Por favor, ingrese el nombre de la institución académica en donde estudió",

            titulo_postgrado: "Por favor, ingrese su título",

            semestres_postgrado: "Por favor, ingrese la duración de su carrera en semestres",

            fecha_postgrado: "Por favor, indique la fecha de su titulación",

            certificado_postgrado: {
                required: "Por favor, suba su certificado",
                accept: "Formatos aceptados: Imágenes y .PDF"
            },

            nivel_postgrado2: "Por favor, indique su nivel de estudios",

            institucion_postgrado2: "Por favor, ingrese el nombre de la institución académica en donde estudió",

            titulo_postgrado2: "Por favor, ingrese su título",

            semestres_postgrado2: "Por favor, ingrese la duración de su carrera en semestres",

            fecha_postgrado2: "Por favor, indique la fecha de su titulación",

            certificado_postgrado2: {
                required: "Por favor, suba su certificado",
                accept: "Formatos aceptados: Imágenes y .PDF"
            },

            institucion_bancaria: "Por favor, seleccione su institución bancaria",

            tipo_cuenta: "Por favor, indique su tipo de cuenta",

            numero_cuenta: {
                required: "Por favor, ingrese su número de cuenta",
                digits: "Debe ingresar números solamente"
            },

            contrasena_actual: {
                required: "Por favor, ingrese su contraseña actual",
                minlength: "Su contraseña debe tener al menos 6 caracteres"
            },
            contrasena_nueva: {
                required: "Por favor, ingrese una contraseña nueva",
                minlength: "Su contraseña debe tener al menos 6 caracteres",

            },
            contrasena_repetir: {
                required: "Por favor, repita la contraseña anterior",
                minlength: "Su contraseña debe tener al menos 6 caracteres",
                equalTo: "Por favor, ingrese la misma contraseña en ambos campos"
            },

            cb_declaracion: "Por favor, debe marcar la casilla"

        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else if (element.prop("type") === "radio") {
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
            var form = document.getElementById("primera_edicion");
            $.ajax({
                type: $(form).attr("method"),
                url: $(form).attr("action"),
                data: new FormData(form),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#guardar').attr("disabled", "disabled");
                    $('#cargando').show(400, "swing");
                },

                success: function (respuesta) {

                    if (respuesta.estado == "exito") {
                        Swal.fire(
                            '¡Muy bien!',
                            'Sus datos se han guardado correctamente y su cuenta se encuentra activa',
                            'success'
                        )

                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 2000);

                    } else if (respuesta.estado == "error_contrasena") {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: 'La contraseña es incorrecta'
                        })
                    } else if (respuesta.estado == "error") {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: 'No fue posible actualizar sus datos'
                        })
                    }

                    $('#guardar').removeAttr("disabled");
                    $('#cargando').hide(400, "swing");
                }
            })
        }
    });

    // validar formulario de editar usuario
    $("#editar_usuario").validate({
        rules: {

            telefono: {
                digits: true,
                minlength: 8,
                maxlength: 8
            },

            telefono2: {
                digits: true,
                minlength: 8,
                maxlength: 8
            },

            correo: {
                email: true
            },

            correo_adicional: {
                email: true
            },

            numero_cuenta: {
                digits: true
            }

        },
        messages: {

            telefono: {
                digits: "Ingrese números solamente",
                minlength: "El número debe contener 8 dígitos",
                maxlength: "El número debe contener 8 dígitos"
            },

            telefono2: {
                digits: "Ingrese números solamente",
                minlength: "El número debe contener 8 dígitos",
                maxlength: "El número debe contener 8 dígitos"
            },

            correo: {
                email: "Ingrese una dirección de correo electrónico válido"
            },

            correo_adicional: {
                email: "Ingrese una dirección de correo electrónico válido"
            },

            numero_cuenta: {
                digits: "Ingrese números solamente",
            }

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
            var form = document.getElementById("editar_usuario");
            $.ajax({
                type: $(form).attr("method"),
                url: $(form).attr("action"),
                data: new FormData(form),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#guardar').attr("disabled", "disabled");
                    $('#cargando').show(400, "swing");
                },

                success: function (respuesta) {

                    if (respuesta.estado == "exito") {
                        Swal.fire(
                            '¡Muy bien!',
                            'Los datos se han actualizado correctamente',
                            'success'
                        )

                        setTimeout(function () {
                            window.location.href = "lista_usuarios.php";
                        }, 2000);

                    } else if (respuesta.estado == "error") {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: 'No se pudo editar al usuario'
                        })
                    }

                    $('#guardar').removeAttr("disabled");
                    $('#cargando').hide(400, "swing");
                }
            })
        }
    });

    // validar formulario login
    $("#login_form").validate({
        rules: {
            login_rut: {
                required: true,
                validar_rut: true
            },

            login_contrasena: "required"
        },
        messages: {

            login_rut: {
                required: "Por favor, ingrese su RUT",
                validar_rut: "Por favor, ingrese un RUT válido"
            },

            login_contrasena: "Por favor, ingrese su contraseña"

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

            var form = $("#login_form");
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
                            'Login correcto',
                            '¡Bienvenid@ ' + resultado.usuario + '!',
                            'success'
                        )
                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: 'El correo o la contraseña son incorrectos'
                        })
                    }
                }
            })
        }
    });

    // validar formulario olvido de contraseña
    $("#olvide_contrasena").validate({
        rules: {
            olvide_correo: {
                required: true,
                email: true,
                correo_corporativo: false
            }
        },
        messages: {

            olvide_correo: {
                required: "Por favor, ingrese su correo electrónico",
                email: "Por favor, ingrese un correo electrónico válido",
                correo_corporativo: 'El correo debe terminar en "@correocorporativo.com"'
            }
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

            var form = $("#olvide_contrasena");
            var datos = $(form).serializeArray();
            $.ajax({
                type: $(form).attr("method"),
                data: datos,
                url: $(form).attr("action"),
                dataType: "json",
                beforeSend: function () {
                    $('#guardar').attr("disabled", "disabled");
                    $('#cargando').show(400, "swing");
                },
                success: function (data) {
                    var resultado = data;
                    if (resultado.respuesta == "exito") {
                        Swal.fire(
                            '¡Muy bien!',
                            'Se ha enviado un correo para restablecer su contraseña',
                            'success'
                        )
                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: 'Lo sentimos, no se ha podido restablecer su contraseña',
                            footer: "El correo ingresado podría no estar registrado"
                        })
                    }
                    $('#guardar').removeAttr("disabled");
                    $('#cargando').hide(400, "swing");
                }
            })
        }
    });

    // validar formulario reseteo de contraseña
    $("#reset_contrasena").validate({
        rules: {
            contrasena_nueva_rec: {
                required: true,
                minlength: 6
            },
            contrasena_repetir_rec: {
                required: true,
                minlength: 6,
                equalTo: "#contrasena_nueva_rec"
            },
        },
        messages: {

            contrasena_nueva_rec: {
                required: "Por favor, ingrese una contraseña nueva",
                minlength: "Su contraseña debe tener al menos 6 caracteres",

            },
            contrasena_repetir_rec: {
                required: "Por favor, repita la contraseña anterior",
                minlength: "Su contraseña debe tener al menos 6 caracteres",
                equalTo: "Por favor, ingrese la misma contraseña en ambos campos"
            }
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

            var form = $("#reset_contrasena");
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
                            'Su contraseña se ha cambiado exitosamente',
                            'success'
                        )
                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: 'Lo sentimos, no se ha podido cambiar la contraseña'
                        })
                    }
                }
            })
        }
    });

    // Cambiar contraseña usuario
    $("#cambiar_contrasena_usuario").validate({
        rules: {

            contrasena_actual: {
                required: true,
                minlength: 6
            },
            contrasena_nueva: {
                required: true,
                minlength: 6
            },
            contrasena_repetir: {
                required: true,
                minlength: 6,
                equalTo: "#contrasena_nueva"
            },


        },
        messages: {

            contrasena_actual: {
                required: "Por favor, ingrese su contraseña actual",
                minlength: "Su contraseña debe tener al menos 6 caracteres"
            },
            contrasena_nueva: {
                required: "Por favor, ingrese una contraseña nueva",
                minlength: "Su contraseña debe tener al menos 6 caracteres",

            },
            contrasena_repetir: {
                required: "Por favor, repita la contraseña anterior",
                minlength: "Su contraseña debe tener al menos 6 caracteres",
                equalTo: "Por favor, ingrese la misma contraseña en ambos campos"
            }
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

            var form = $("#cambiar_contrasena_usuario");
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
                            'Cambio correcto',
                            '¡Su contraseña ha sido cambiada exitosamente!',
                            'success'
                        )
                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: 'No se pudo cambiar la contraseña'
                        })
                    }
                }
            })
        }
    });
});

jQuery.validator.addMethod("correo_corporativo", function (value, element) {
    return this.optional(element) || /^.+@correocorporativo.com$/.test(value);
});

$.validator.addMethod("validar_rut", function (value, element) {
    return this.optional(element) || $.validateRut(value);
});