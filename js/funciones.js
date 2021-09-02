$(document).ready(function () {

    $("#cb_nombre2").click(function () {
        if ($(this).prop("checked")) {
            $("#nombre2").prop("disabled", true);
            $("#nombre2-error").hide(); 
        }
        else {
            $("#nombre2").prop("disabled", false);
            $("#nombre2-error").show(); 
        };
    });

    $(".radio_nacionalidad").change(function () {
        if ($("#otros").prop("checked")) {
            $("#txt_otros").show(400, "swing");
            $("#txt_otros").prop("disabled", false);
            $("#txt_otros-error").show(); 
            
            
        }
        else {
            $("#txt_otros").hide(400, "swing");
            $("#txt_otros").prop("disabled", true);
            $("#txt_otros-error").hide();            
        }
    });

    $("#txt_otros").focusout(function () {
        $("#otros").val($("#txt_otros").val());
    });

    $("#cb_telefono2").click(function () {
        if ($(this).prop("checked")) {
            $("#div_telefono2").show(400, "swing");
            $("#div_telefono2 :input").prop("disabled", false);
        }
        else {
            $("#div_telefono2").hide(400, "swing");
            $("#div_telefono2 :input").prop("disabled", true);
        };
    });

    $("#cb_emergencia2").click(function () {
        if ($(this).prop("checked")) {
            $("#div_emergencia2").show(400, "swing");
            $("#div_emergencia2 :input").prop("disabled", false);
        }
        else {
            $("#div_emergencia2").hide(400, "swing");
            $("#div_emergencia2 :input").prop("disabled", true);
        };
    });

    $("#cb_pregrado2").click(function () {
        if ($(this).prop("checked")) {
            $("#div_pregrado2").show(400, "swing");
            $("#div_pregrado2 :input").prop("disabled", false);
        }
        else {
            $("#div_pregrado2").hide(400, "swing");
            $("#div_pregrado2 :input").prop("disabled", true);
        };
    });

    $("#cb_postgrado").click(function () {
        if ($(this).prop("checked")) {
            $("#div_postgrado :input").prop("disabled", true);
            $("#div_postgrado2 :input").prop("disabled", true);
        }
        else {
            $("#div_postgrado :input").prop("disabled", false);
            $("#div_postgrado2 :input").prop("disabled", false);
        };
    });

    $("#cb_postgrado2").click(function () {
        if ($(this).prop("checked")) {
            $("#div_postgrado2").show(400, "swing");
            $("#div_postgrado2 :input").prop("disabled", false);
        }
        else {
            $("#div_postgrado2").hide(400, "swing");
            $("#div_postgrado2 :input").prop("disabled", true);
        };
    });

    $(".rut").rut({ formatOn: 'keyup' });

    $(".borrar_registro_contenido").on("click", function (e) {
        e.preventDefault();
        var id = $(this).attr("data_id");

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Un registro eliminado no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    data: {
                        "id": id,
                        "registro": "eliminar"
                    },
                    url: "modelo_contenido.php",
                    success: function (data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == "exito") {
                            Swal.fire(
                                '¡Eliminado!',
                                'El registro ha sido borrado exitosamente',
                                'success'
                            )
                            jQuery('[data_id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                        }
                    }
                });

            } else {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'No se pudo eliminar el registro',
                })
            }
        });
    });

    $(".borrar_registro").on("click", function (e) {
        e.preventDefault();
        var id = $(this).attr("data_id");

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Un usuario eliminado no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    data: {
                        "id": id,
                        "registro": "eliminar"
                    },
                    url: "modelo_usuario.php",
                    success: function (data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == "exito") {
                            Swal.fire(
                                '¡Eliminado!',
                                'El usuario ha sido borrado exitosamente',
                                'success'
                            )
                            jQuery('[data_id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                        }
                    }
                });

            } else {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'No se pudo eliminar al usuario',
                })
            }
        });
    });

    $(".suspender").on("click", function (e) {
        e.preventDefault();
        var id = $(this).attr("data_id");

        Swal.fire({
            title: '¿Desea suspender a este usuario?',
            text: "Un usuario suspendido no puede ingresar al sitio",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, suspender',
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    data: {
                        "id": id,
                        "registro": "suspender"
                    },
                    url: "modelo_usuario.php",
                    success: function (data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == "exito") {
                            Swal.fire(
                                '¡Suspendido!',
                                'El usuario ha sido bloqueado exitosamente',
                                'success'
                            )
                            setTimeout(function () {
                                window.location.href = "lista_usuarios.php";
                            }, 2000);
                        }
                    }
                });

            } else {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'No se pudo suspender al usuario',
                })
            }
        });
    });

    $(".habilitar").on("click", function (e) {
        e.preventDefault();
        var id = $(this).attr("data_id");

        Swal.fire({
            title: '¿Desea habilitar a este usuario?',
            text: "El usuario podrá navegar libremente por el sitio",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, habilitar',
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    data: {
                        "id": id,
                        "registro": "habilitar"
                    },
                    url: "modelo_usuario.php",
                    success: function (data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == "exito") {
                            Swal.fire(
                                '¡Habilitado!',
                                'El usuario ha sido desbloqueado exitosamente',
                                'success'
                            )
                            setTimeout(function () {
                                window.location.href = "lista_usuarios.php";
                            }, 2000);
                        }
                    }
                });

            } else {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'No se pudo habilitar al usuario',
                })
            }
        });
    });
})