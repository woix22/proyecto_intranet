<?php
include_once "funciones/funciones.php";
$conn = conectar_bd();


if ($_POST["registro"] == "nuevo") {
    $nombre = $_POST["nombre_contenido"];
    $enlace = $_POST["enlace_contenido"];
    $descripcion = $_POST["descripcion_contenido"];
    $categoria = $_POST["categoria_contenido"];

    try {

        $stmt = $conn->prepare("INSERT INTO contenido (nombre, enlace, descripcion, categoria) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $nombre, $enlace, $descripcion, $categoria);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if ($id_registro > 0) {
            $respuesta = array(
                "respuesta" => "exito",
                "id_admin" => $id_registro
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

if ($_POST["registro"] == "actualizar") {
    $id = $_POST["id_registro"];
    $nombre = $_POST["nombre_contenido"];
    $enlace = $_POST["enlace_contenido"];
    $descripcion = $_POST["descripcion_contenido"];
    $categoria = $_POST["categoria_contenido"];

    try {


        $stmt = $conn->prepare("UPDATE contenido SET nombre = ?, enlace = ?, descripcion = ?, categoria = ?, editado = NOW() WHERE id = ?");
        $stmt->bind_param("ssssi", $nombre, $enlace, $descripcion, $categoria, $id);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                "respuesta" => "exito",
                "id_actualizado" => $stmt->insert_id
            );
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

    die(json_encode($respuesta));
}

if ($_POST["registro"] == "eliminar") {
    $id_borrar = $_POST["id"];

    try {

        $stmt = $conn->prepare("DELETE FROM contenido WHERE id = ?");
        $stmt->bind_param("i", $id_borrar);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                "respuesta" => "exito",
                "id_eliminado" => $id_borrar
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
