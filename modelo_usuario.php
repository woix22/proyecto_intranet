<?php
include_once "funciones/funciones.php";
include_once "gdrive.php";

if ($_POST["registro"] == "nuevo") {
    $rut = $_POST["rut_nuevo"];
    $correo = $_POST["correo_nuevo"];
    $perfil = ucfirst($_POST["perfil"]);
    $nombre1 = "Nuevo";
    $apellido1 = ucfirst($perfil);
    $opciones = array(
        "cost" => 12
    );
    $contrasena = generar_contrasena(8);
    $contrasena_hashed = password_hash($contrasena, PASSWORD_BCRYPT, $opciones);
    $asunto = "Creación de cuenta proyecto_intranet";
    $mensaje = "
    <html>\n
    <body style=\"font-family:Verdana, Verdana, Geneva, sans-serif; font-size:12px; color:#000000;\">\n 
    <b>Creación de nueva cuenta</b><br><br>http://localhost/proyecto_intranet/index.php <br> <b>Usuario:</b> $correo <br><b>Contraseña:</b> $contrasena\n
    </body>\n
    </html>
    ";

    try {
        $conn = conectar_bd();
        $stmt = $conn->prepare("INSERT INTO usuarios (rut, nombre1, apellido1, correo, contrasena, perfil) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $rut, $nombre1, $apellido1, $correo, $contrasena_hashed, $perfil);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        include_once "funciones/correo.php";
        if ($id_registro > 0) {
            mandar_correo($correo, $asunto, $mensaje);
            $respuesta = array(
                "respuesta" => "exito",
                "id_usuario" => $id_registro
            );
        } else {
            $respuesta = array(
                "respuesta" => "error"
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));
}

if ($_POST["registro"] == "primera_edicion") {
    session_start();

    $rut = $_SESSION["rut"];

    $campos_post = [
        "nombre1",
        "nombre2",
        "apellido1",
        "apellido2",
        "fecha_nacimiento",
        "genero",
        "nacionalidad",
        "correo_adicional",
        "telefono",
        "telefono2",
        "direccion",
        "comuna",
        "nombre_emergencia1",
        "telefono_emergencia1",
        "nombre_emergencia2",
        "telefono_emergencia2",
        "nivel_pregrado",
        "institucion_pregrado",
        "titulo_pregrado",
        "semestres_pregrado",
        "fecha_pregrado",
        "nivel_pregrado2",
        "institucion_pregrado2",
        "titulo_pregrado2",
        "semestres_pregrado2",
        "fecha_pregrado2",
        "nivel_postgrado",
        "institucion_postgrado",
        "titulo_postgrado",
        "semestres_postgrado",
        "fecha_postgrado",
        "nivel_postgrado",
        "institucion_postgrado2",
        "titulo_postgrado2",
        "semestres_postgrado2",
        "fecha_postgrado2",
        "institucion_bancaria",
        "tipo_cuenta",
        "numero_cuenta",
        "contrasena_actual",
        "contrasena_nueva"
    ];

    $campos_file = [
        "foto",
        "cedula",
        "cv",
        "certificado_pregrado",
        "certificado_pregrado2",
        "certificado_postgrado",
        "certificado_postgrado2"
    ];

    foreach ($campos_post as $campo) {
        if (isset($_POST[$campo])) {
            if ($_POST[$campo] != "") {
                if ($campo == "contrasena_actual" or $campo == "contrasena_nueva") {
                    $$campo = $_POST[$campo];
                } else {
                    $$campo = ucwords($_POST[$campo]);
                }
            }
        } else {
            $$campo = NULL;
        }
    }

    foreach ($campos_file as $campo) {
        if (isset($_FILES[$campo])) {
            if ($_FILES[$campo]["tmp_name"] != "") {
                $file_path = $_FILES[$campo]["tmp_name"];
                $file_name = nombre_archivo($_FILES[$campo]["name"], $campo . "_" . $rut . "_" . $nombre1 . "_" . $apellido1);
                $$campo = subir_archivo($file_path, $file_name);
            } else {
                $$campo = NULL;
            }
        } else {
            $$campo = NULL;
        }
    }

    $id = $_SESSION["id"];
    $validado = 1;

    $opciones = array(
        "cost" => 12
    );
    $contrasena_hashed = password_hash($contrasena_nueva, PASSWORD_BCRYPT, $opciones);

    $correo_admin = "proyecto_intranet@yopmail.com";
    $nombre_completo = $nombre1 . " " . $apellido1;
    $asunto = $nombre_completo . " ha terminado de completar sus datos";
    $mensaje = "
    <html>\n
    <body style=\"font-family:Verdana, Verdana, Geneva, sans-serif; font-size:12px; color:#000000;\">\n 
    <b>El usuario $nombre_completo ha terminado de completar sus datos y su cuenta ha sido validada, puede revisar sus datos en el siguiente enlace:<br>
    http://localhost/proyecto_intranet/ver_usuario.php?id=$id 
    </body>\n
    </html>
    ";

    try {
        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT contrasena FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($contrasena_bd);
        $stmt->fetch();

        if (password_verify($contrasena_actual, $contrasena_bd)) {
            $conn2 = conectar_bd();
            $stmt2 = $conn2->prepare("UPDATE usuarios SET nombre1 = ?, nombre2 = ?, apellido1 = ?, apellido2 = ?, fecha_nacimiento = ?, genero = ?, nacionalidad = ?, correo_adicional = ?, telefono = ?, telefono2 = ?, direccion = ?, comuna = ?, foto = ?, cedula = ?, cv = ?, nombre_emergencia1 = ?, telefono_emergencia1 = ?, nombre_emergencia2 = ?, telefono_emergencia2 = ?, nivel_pregrado = ?, institucion_pregrado = ?, titulo_pregrado = ?, semestres_pregrado = ?, fecha_pregrado = ?, certificado_pregrado = ?, nivel_pregrado2 = ?, institucion_pregrado2 = ?, titulo_pregrado2 = ?, semestres_pregrado2 = ?, fecha_pregrado2 = ?, certificado_pregrado2 = ?, nivel_postgrado = ?, institucion_postgrado = ?, titulo_postgrado = ?, semestres_postgrado = ?, fecha_postgrado = ?, certificado_postgrado = ?, nivel_postgrado2 = ?, institucion_postgrado2 = ?, titulo_postgrado2 = ?, semestres_postgrado2 = ?, fecha_postgrado2 = ?, certificado_postgrado2 = ?, institucion_bancaria = ?, tipo_cuenta = ?, numero_cuenta = ?, contrasena = ?, validado = ? WHERE id = ?");
            $stmt2->bind_param("ssssssssssssssssssssssisssssisssssisssssissssssii", $nombre1, $nombre2, $apellido1, $apellido2, $fecha_nacimiento, $genero, $nacionalidad, $correo_adicional,  $telefono, $telefono2, $direccion, $comuna, $foto, $cedula, $cv, $nombre_emergencia1, $telefono_emergencia1, $nombre_emergencia2, $telefono_emergencia2, $nivel_pregrado, $institucion_pregrado, $titulo_pregrado, $semestres_pregrado, $fecha_pregrado, $certificado_pregrado, $nivel_pregrado2, $institucion_pregrado2, $titulo_pregrado2, $semestres_pregrado2, $fecha_pregrado2, $certificado_pregrado2, $nivel_postgrado, $institucion_postgrado, $titulo_postgrado, $semestres_postgrado, $fecha_postgrado, $certificado_postgrado, $nivel_postgrado2, $institucion_postgrado2, $titulo_postgrado2, $semestres_postgrado2, $fecha_postgrado2, $certificado_postgrado2, $institucion_bancaria, $tipo_cuenta, $numero_cuenta, $contrasena_hashed, $validado, $id);
            $stmt2->execute();
            if ($stmt2->affected_rows == 1) {
                include_once "funciones/correo.php";
                mandar_correo($correo_admin, $asunto, $mensaje);
                $respuesta = array(

                    "estado" => "exito",

                );
                $_SESSION["nombre1"] = $nombre1;
                $_SESSION["apellido1"] = $apellido1;
                $_SESSION["validado"] = $validado;
            } else {
                $respuesta = array(
                    "estado" => "error"
                );
            }
            $stmt2->close();
            $conn2->close();
        } else {
            $respuesta = array(
                "estado" => "error_contrasena"
            );
        }
        if ($respuesta["estado"] != "exito") {
            $archivos = [
                $foto,
                $cedula,
                $cv,
                $certificado_pregrado,
                $certificado_pregrado2,
                $certificado_postgrado,
                $certificado_postgrado2
            ];
            foreach ($archivos as $archivo) {
                if ($archivo != NULL or $archivo != "") {
                    borrar_archivo($archivo);
                }
            }
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {

        $respuesta = array(
            "estado" => $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}

if ($_POST["registro"] == "editar_usuario") {
    
    session_start();
    $rut = $_SESSION["rut"];

    $campos_post = [
        "id",
        "nombre1",
        "nombre2",
        "apellido1",
        "apellido2",
        "fecha_nacimiento",
        "genero",
        "nacionalidad",
        "correo",
        "correo_adicional",
        "telefono",
        "telefono2",
        "direccion",
        "comuna",
        "nombre_emergencia1",
        "telefono_emergencia1",
        "nombre_emergencia2",
        "telefono_emergencia2",
        "nivel_pregrado",
        "institucion_pregrado",
        "titulo_pregrado",
        "semestres_pregrado",
        "fecha_pregrado",
        "nivel_pregrado2",
        "institucion_pregrado2",
        "titulo_pregrado2",
        "semestres_pregrado2",
        "fecha_pregrado2",
        "nivel_postgrado",
        "institucion_postgrado",
        "titulo_postgrado",
        "semestres_postgrado",
        "fecha_postgrado",
        "nivel_postgrado",
        "institucion_postgrado2",
        "titulo_postgrado2",
        "semestres_postgrado2",
        "fecha_postgrado2",
        "institucion_bancaria",
        "tipo_cuenta",
        "numero_cuenta",
        "perfil",
    ];

    $campos_file = array(
        array("foto", "foto_bd"),
        array("cedula", "cedula_bd"),
        array("cv", "cv_bd"),
        array("certificado_pregrado", "certificado_pregrado_bd"),
        array("certificado_pregrado2", "certificado_pregrado2_bd"),
        array("certificado_postgrado", "certificado_postgrado_bd"),
        array("certificado_postgrado2", "certificado_postgrado2_bd")
    );

    foreach ($campos_post as $campo) {
        if (isset($_POST[$campo])) {
            if ($_POST[$campo] != "") {
                $$campo = ucwords($_POST[$campo]);
            } else {
                $$campo = NULL;
            }
        } else {
            $$campo = NULL;
        }
    }





    for ($i = 0; $i < count($campos_file); $i++) {

        if (isset($_FILES[$campos_file[$i][0]])) {

            if ($_FILES[$campos_file[$i][0]]["tmp_name"] != "") {

                $file_path = $_FILES[$campos_file[$i][0]]["tmp_name"];
                $file_name = nombre_archivo($_FILES[$campos_file[$i][0]]["name"], $campos_file[$i][0] . "_" . $rut . "-" . $nombre1 . "_" . $apellido1);
                ${$campos_file[$i][0]} = subir_archivo($file_path, $file_name);
                ${$campos_file[$i][1]} = $_POST[$campos_file[$i][1]];
            } else if (isset($_POST[$campos_file[$i][1]])) {

                if ($_POST[$campos_file[$i][1]] != "") {

                    ${$campos_file[$i][0]} = $_POST[$campos_file[$i][1]];
                } else {

                    ${$campos_file[$i][0]} = NULL;
                }
            } else {

                ${$campos_file[$i][0]} = NULL;
            }
        }
    }

    try {

        $conn = conectar_bd();
        $stmt = $conn->prepare("UPDATE usuarios SET nombre1 = ?, nombre2 = ?, apellido1 = ?, apellido2 = ?, fecha_nacimiento = ?, genero = ?, nacionalidad = ?, correo = ?, correo_adicional = ?, telefono = ?, telefono2 = ?, direccion = ?, comuna = ?, foto = ?, cedula = ?, cv = ?, nombre_emergencia1 = ?, telefono_emergencia1 = ?, nombre_emergencia2 = ?, telefono_emergencia2 = ?, nivel_pregrado = ?, institucion_pregrado = ?, titulo_pregrado = ?, semestres_pregrado = ?, fecha_pregrado = ?, certificado_pregrado = ?, nivel_pregrado2 = ?, institucion_pregrado2 = ?, titulo_pregrado2 = ?, semestres_pregrado2 = ?, fecha_pregrado2 = ?, certificado_pregrado2 = ?, nivel_postgrado = ?, institucion_postgrado = ?, titulo_postgrado = ?, semestres_postgrado = ?, fecha_postgrado = ?, certificado_postgrado = ?, nivel_postgrado2 = ?, institucion_postgrado2 = ?, titulo_postgrado2 = ?, semestres_postgrado2 = ?, fecha_postgrado2 = ?, certificado_postgrado2 = ?, institucion_bancaria = ?, tipo_cuenta = ?, numero_cuenta = ?, perfil = ?, editado = NOW() WHERE id = ?");
        $stmt->bind_param("sssssssssssssssssssssssisssssisssssisssssissssssi", $nombre1, $nombre2, $apellido1, $apellido2, $fecha_nacimiento, $genero, $nacionalidad, $correo, $correo_adicional,  $telefono, $telefono2, $direccion, $comuna, $foto, $cedula, $cv, $nombre_emergencia1, $telefono_emergencia1, $nombre_emergencia2, $telefono_emergencia2, $nivel_pregrado, $institucion_pregrado, $titulo_pregrado, $semestres_pregrado, $fecha_pregrado, $certificado_pregrado, $nivel_pregrado2, $institucion_pregrado2, $titulo_pregrado2, $semestres_pregrado2, $fecha_pregrado2, $certificado_pregrado2, $nivel_postgrado, $institucion_postgrado, $titulo_postgrado, $semestres_postgrado, $fecha_postgrado, $certificado_postgrado, $nivel_postgrado2, $institucion_postgrado2, $titulo_postgrado2, $semestres_postgrado2, $fecha_postgrado2, $certificado_postgrado2, $institucion_bancaria, $tipo_cuenta, $numero_cuenta, $perfil, $id);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $respuesta = array(

                "estado" => "exito",
                "id_actualizado" => $stmt->insert_id
            );
        } else {
            $respuesta = array(
                "estado" => "error"
            );
        }

        if ($respuesta["estado"] != "exito") {
            $archivos = [
                $foto,
                $cedula,
                $cv,
                $certificado_pregrado,
                $certificado_pregrado2,
                $certificado_postgrado,
                $certificado_postgrado2
            ];
            foreach ($archivos as $archivo) {
                if ($archivo != NULL) {
                    borrar_archivo($archivo);
                }
            }
        } else if ($respuesta["estado"] == "exito") {
            $archivos = [
                "foto_bd",
                "cedula_bd",
                "cv_bd",
                "certificado_pregradobd",
                "certificado_pregrado2bd",
                "certificado_postgradobd",
                "certificado_postgrado2bd"
            ];
            foreach ($archivos as $archivo) {
                if (isset(${$archivo})) {
                    borrar_archivo(${$archivo});
                }
            }
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {

        $respuesta = array(
            "estado" => $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}

if ($_POST["registro"] == "eliminar") {
    $id_borrar = $_POST["id"];

    try {
        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT foto, cedula, cv, certificado_pregrado, certificado_pregrado2, certificado_postgrado, certificado_postgrado2 FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id_borrar);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $archivos = $resultado->fetch_assoc();               
        if ($stmt->affected_rows) {
            $conn2 = conectar_bd();
            $stmt2 = $conn2->prepare("DELETE FROM usuarios WHERE id = ?");
            $stmt2->bind_param("i", $id_borrar);
            $stmt2->execute();
            if ($stmt2->affected_rows) {
                $respuesta = array(
                    "respuesta" => "exito",
                    "id_eliminado" => $id_borrar
                );
            } else {
                $respuesta = array(
                    "respuesta" => "error"
                );
            }
            $stmt2->close();
            $conn2->close();
        } else {
            $respuesta = array(
                "respuesta" => "error"
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {

        $respuesta = array(
            "respuesta" => $e->getMessage()
        );
    }
    if ($respuesta["respuesta"] == "exito") {
   
        foreach ($archivos as $archivo) {
            if ($archivo != NULL or $archivo != "") {
                borrar_archivo($archivo);
            }
        }
    }
    die(json_encode($respuesta));
}

if ($_POST["registro"] == "suspender") {
    $id_suspender = $_POST["id"];
    $suspender = 1;

    try {
        $conn = conectar_bd();
        $stmt = $conn->prepare("UPDATE usuarios SET cuenta_suspendida = ? WHERE id = ?");
        $stmt->bind_param("ii", $suspender, $id_suspender);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                "respuesta" => "exito",
                "id_suspendido" => $id_suspender
            );
        } else {
            $respuesta = array(
                "respuesta" => "error"
            );
        }
    } catch (Exception $e) {

        $respuesta = array(
            "respuesta" => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

if ($_POST["registro"] == "habilitar") {
    $id_habilitar = $_POST["id"];
    $habilitar = 0;

    try {
        $conn = conectar_bd();
        $stmt = $conn->prepare("UPDATE usuarios SET cuenta_suspendida = ? WHERE id = ?");
        $stmt->bind_param("ii", $habilitar, $id_habilitar);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                "respuesta" => "exito",
                "id_habilitado" => $id_habilitar
            );
        } else {
            $respuesta = array(
                "respuesta" => "error"
            );
        }
    } catch (Exception $e) {

        $respuesta = array(
            "respuesta" => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

if ($_POST["registro"] == "actualizar_contrasena") {

    include_once "funciones/sesiones.php";
    $id = $_SESSION["id"];
    $contrasena_actual = $_POST["contrasena_actual"];
    $contrasena_nueva = $_POST["contrasena_nueva"];
    $opciones = array(
        "cost" => 12
    );
    $contrasena_hashed = password_hash($contrasena_nueva, PASSWORD_BCRYPT, $opciones);


    try {

        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT contrasena FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($contrasena_bd);
        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if ($existe) {

                if (password_verify($contrasena_actual, $contrasena_bd)) {
                    $conn2 = conectar_bd();
                    $stmt2 = $conn2->prepare("UPDATE usuarios SET contrasena = ? WHERE id = ?");
                    $stmt2->bind_param("si", $contrasena_hashed, $id);
                    $stmt2->execute();
                    $stmt2->close();
                    $conn2->close();
                    $respuesta = array(
                        "respuesta" => "exito",
                    );
                } else {
                    $respuesta = array(
                        "respuesta" => "error"
                    );
                }
            } else {
                $respuesta = array(
                    "respuesta" => "error"
                );
            }
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {

        echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));
}

if ($_POST["registro"] == "login") {

    $rut = $_POST["login_rut"];
    $contrasena = $_POST["login_contrasena"];

    try {

        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT id, rut, correo, contrasena, nombre1, apellido1, perfil, validado, cuenta_suspendida FROM usuarios WHERE rut = ?;");
        $stmt->bind_param("s", $rut);
        $stmt->execute();
        $stmt->bind_result($id_bd, $rut_bd, $correo_bd, $contrasena_bd, $nombre1_bd, $apellido1_bd, $perfil_bd, $validado_bd, $cuenta_suspendida_bd);

        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if ($existe) {

                if (password_verify($contrasena, $contrasena_bd)) {

                    if (isset($_SESSION)) {
                        session_destroy();
                    }
                    session_start();

                    $_SESSION["id"] = $id_bd;
                    $_SESSION["rut"] = $rut_bd;
                    $_SESSION["correo"] = $correo_bd;
                    $_SESSION["nombre1"] = $nombre1_bd;
                    $_SESSION["apellido1"] = $apellido1_bd;
                    $_SESSION["perfil"] = $perfil_bd;
                    $_SESSION["validado"] = $validado_bd;
                    $_SESSION["cuenta_suspendida"] = $cuenta_suspendida_bd;
                    $nombre = $nombre1_bd . " " . $apellido1_bd;

                    $respuesta = array(
                        "respuesta" => "exito",
                        "usuario" => $nombre
                    );
                } else {
                    $respuesta = array(
                        "respuesta" => "error1"
                    );
                }
            } else {
                $respuesta = array(
                    "respuesta" => "error2"
                );
            }
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {

        echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));
}

if ($_POST["registro"] == "olvide_contrasena") {
    include_once "funciones/correo.php";
    $correo = $_POST["olvide_correo"];
    $pass_id = md5(uniqid(mt_rand()));
    $asunto = "Recuperación de contraseña";

    try {

        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?;");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->bind_result($id_bd);
        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if ($existe) {
                $link = "http://localhost/proyecto_intranet/reset_contrasena.php?pass_id=$pass_id&id=$id_bd";
                $mensaje = "
                <html>\n
                <body style=\"font-family:Verdana, Verdana, Geneva, sans-serif; font-size:12px; color:#000000;\">\n 
                <b>Recuperación de contraseña</b><br><br>Ingrese al siguiente link para recuperar su contraseña: <br> $link\n
                </body>\n
                </html>
                ";
                $conn2 = conectar_bd();
                $stmt2 = $conn2->prepare("UPDATE usuarios SET contrasena_id = ? WHERE id = ?");
                $stmt2->bind_param("si", $pass_id, $id_bd);
                $stmt2->execute();
                if ($stmt2->affected_rows) {
                    mandar_correo($correo, $asunto, $mensaje);
                    $respuesta = array(
                        "respuesta" => "exito"
                    );
                } else {
                    $respuesta = array(
                        "respuesta" => "error"
                    );
                }
                $stmt2->close();
                $conn2->close();
            } else {
                $respuesta = array(
                    "respuesta" => "error"
                );
            }
        } else {
            $respuesta = array(
                "respuesta" => "error"
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {

        echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));
}

if ($_POST["registro"] == "reset_contrasena") {
    $id = $_POST["id"];
    $pass_id = $_POST["pass_id"];
    $contrasena = $_POST["contrasena_nueva_rec"];
    $opciones = array(
        "cost" => 12
    );
    $contrasena_hashed = password_hash($contrasena, PASSWORD_BCRYPT, $opciones);

    try {

        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT contrasena_id FROM usuarios WHERE id = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($contrasena_id_bd);

        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if ($existe) {
                if ($contrasena_id_bd == $pass_id) {
                    $conn2 = conectar_bd();
                    $stmt2 = $conn2->prepare("UPDATE usuarios SET contrasena = ?, contrasena_id = '' WHERE id = ?");
                    $stmt2->bind_param("si", $contrasena_hashed, $id);
                    $stmt2->execute();
                    if ($stmt2->affected_rows) {
                        $respuesta = array(
                            "respuesta" => "exito"
                        );
                    } else {
                        $respuesta = array(
                            "respuesta" => "error"
                        );
                    }
                    $stmt2->close();
                    $conn2->close();
                } else {
                    $respuesta = array(
                        "respuesta" => "error"
                    );
                }
            } else {
                $respuesta = array(
                    "respuesta" => "error"
                );
            }
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {

        echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));
}
