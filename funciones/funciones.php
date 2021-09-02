<?php

require_once("./funciones/bd_conexion.php");

function conectar_bd()
{
    $conn = new mysqli(HOST, USER, PASS, DB);

    if ($conn->connect_error) {
        return $conn->connect_error;
    }
    return $conn;
}

function desconectar_bd($conn)
{
    $conn->close();
}

function generar_contrasena($longitud)
{
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $password = "";

    for ($i = 0; $i < $longitud; $i++) {

        $password .= substr($str, rand(0, strlen($str)), 1);
    }

    return $password;
}

function listar_usuarios_validados()
{
    try {
        $validado = 1;
        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT id, nombre1, apellido1, rut, correo, perfil, cuenta_suspendida FROM usuarios WHERE validado = ?");
        $stmt->bind_param("i", $validado);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }

    while ($usuarios = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $usuarios["nombre1"]; ?></td>
            <td><?php echo $usuarios["apellido1"]; ?></td>
            <td><?php echo $usuarios["rut"]; ?></td>
            <td><?php echo $usuarios["correo"]; ?></td>
            <td><?php echo ucfirst($usuarios["perfil"]); ?></td>
            <td class="project-actions text-center">
                <a class="btn btn-primary btn-sm" href="ver_usuario.php?id=<?php echo $usuarios["id"] ?>">
                    <i class="fas fa-folder">
                    </i>
                    Ver
                </a>
                <a class="btn btn-info btn-sm btn" href="editar_usuario.php?id=<?php echo $usuarios["id"] ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editar
                </a>
                <?php if ($usuarios["cuenta_suspendida"] == 0) { ?>
                    <a class="btn btn-warning btn-sm suspender" href="#" data_id="<?php echo $usuarios["id"]; ?>">
                        <i class="fas fa-ban">
                        </i>
                        Suspender
                    </a>
                <?php } else if ($usuarios["cuenta_suspendida"] == 1) { ?>
                    <a class="btn btn-success btn-sm habilitar" href="#" data_id="<?php echo $usuarios["id"]; ?>">
                        <i class="fas fa-check">
                        </i>
                        Habilitar
                    </a>
                <?php } ?>
                <a class="btn btn-danger btn-sm borrar_registro" href="#" data_id="<?php echo $usuarios["id"]; ?>">
                    <i class="fas fa-trash">
                    </i>
                    Eliminar
                </a>
            </td>
        </tr>
    <?php
    }
}

function listar_usuarios_no_validados()
{

    try {
        $validado = 0;
        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT id, rut, correo, perfil FROM usuarios WHERE validado = ?");
        $stmt->bind_param("i", $validado);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }

    while ($usuarios = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $usuarios["rut"]; ?></td>
            <td><?php echo $usuarios["correo"]; ?></td>
            <td><?php echo ucfirst($usuarios["perfil"]); ?></td>
            <td class="project-actions text-center">
                <a class="btn btn-danger btn-sm borrar_registro" href="#" data_id="<?php echo $usuarios["id"]; ?>">
                    <i class="fas fa-trash">
                    </i>
                    Eliminar
                </a>
            </td>
        </tr>
    <?php
    }
}

function listar_usuarios_excel()
{
include_once "gdrive.php"; 

    try {
        $validado = 1;
        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE validado = ?");
        $stmt->bind_param("i", $validado);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }

    

    while ($usuarios = $resultado->fetch_assoc()) { 

    $rut = $usuarios["rut"];
    $nombre1 = $usuarios["nombre1"];
    $nombre2 = $usuarios["nombre2"];
    $apellido1 = $usuarios["apellido1"];
    $apellido2 = $usuarios["apellido2"];
    if($usuarios["fecha_nacimiento"] != NULL){
        $fecha_nacimiento = date("d/m/Y", strtotime($usuarios["fecha_nacimiento"]));
    }else{
        $fecha_nacimiento = "";
    }
    $genero = $usuarios["genero"];
    $nacionalidad = $usuarios["nacionalidad"];
    $correo = $usuarios["correo"];
    $correo_adicional = $usuarios["correo_adicional"];
    $telefono = $usuarios["telefono"];
    $telefono2 = $usuarios["telefono2"];
    $direccion = $usuarios["direccion"];
    $comuna = $usuarios["comuna"];
    $nombre_emergencia1 = $usuarios["nombre_emergencia1"];
    $telefono_emergencia1 = $usuarios["telefono_emergencia1"];
    $nombre_emergencia2 = $usuarios["nombre_emergencia2"];
    $telefono_emergencia2 = $usuarios["telefono_emergencia2"]; 
    if($usuarios["foto"] != NULL){
        $foto = link_archivo($usuarios["foto"]);
    }else{
        $foto = "";
    }
    if($usuarios["cedula"] != NULL){
        $cedula = link_archivo($usuarios["cedula"]);
    }else{
        $cedula = "";
    }
    if($usuarios["cv"] != NULL){
        $cv = link_archivo($usuarios["cv"]);
    }else{
        $cv = "";
    }
    $nivel_pregrado = $usuarios["nivel_pregrado"];
    $institucion_pregrado = $usuarios["institucion_pregrado"];
    $titulo_pregrado = $usuarios["titulo_pregrado"];
    $semestres_pregrado = $usuarios["semestres_pregrado"];
    if($usuarios["fecha_pregrado"] != NULL){
        $fecha_pregrado = date("d/m/Y", strtotime($usuarios["fecha_pregrado"]));
    }else{
        $fecha_pregrado = "";
    }

    if($usuarios["certificado_pregrado"] != NULL){
        $certificado_pregrado = link_archivo($usuarios["certificado_pregrado"]);
    }else{
        $certificado_pregrado = "";
    }

    $nivel_pregrado2 = $usuarios["nivel_pregrado2"];
    $institucion_pregrado2 = $usuarios["institucion_pregrado2"]; 
    $titulo_pregrado2 = $usuarios["titulo_pregrado2"]; 
    $semestres_pregrado2 = $usuarios["semestres_pregrado2"]; 

    if($usuarios["fecha_pregrado2"] != NULL){
        $fecha_pregrado2 = date("d/m/Y", strtotime($usuarios["fecha_pregrado2"]));
    }else{
        $fecha_pregrado2 = "";
    }   

    if($usuarios["certificado_pregrado2"] != NULL){
        $certificado_pregrado2 = link_archivo($usuarios["certificado_pregrado2"]);
    }else{
        $certificado_pregrado2 = "";
    }

    $nivel_postgrado = $usuarios["nivel_postgrado"];
    $institucion_postgrado = $usuarios["institucion_postgrado"];
    $titulo_postgrado = $usuarios["titulo_postgrado"];
    $semestres_postgrado = $usuarios["semestres_postgrado"];
    if($usuarios["fecha_postgrado"] != NULL){
        $fecha_postgrado = date("d/m/Y", strtotime($usuarios["fecha_postgrado"]));
    }else{
        $fecha_postgrado = "";
    }

    if($usuarios["certificado_postgrado"] != NULL){
        $certificado_postgrado = link_archivo($usuarios["certificado_postgrado"]);
    }else{
        $certificado_postgrado = "";
    }

    $nivel_postgrado2 = $usuarios["nivel_postgrado2"];
    $institucion_postgrado2 = $usuarios["institucion_postgrado2"]; 
    $titulo_postgrado2 = $usuarios["titulo_postgrado2"];
    $semestres_postgrado2 = $usuarios["semestres_postgrado2"];
    if($usuarios["fecha_postgrado2"] != NULL){
        $fecha_postgrado2 = date("d/m/Y", strtotime($usuarios["fecha_postgrado2"]));
    }else{
        $fecha_postgrado2 = "";
    }

    if($usuarios["certificado_postgrado2"] != NULL){
        $certificado_postgrado2 = link_archivo($usuarios["certificado_postgrado2"]);
    }else{
        $certificado_postgrado2 = "";
    }

    $institucion_bancaria = $usuarios["institucion_bancaria"];
    $tipo_cuenta = $usuarios["tipo_cuenta"]; 
    $numero_cuenta = $usuarios["numero_cuenta"];
    $perfil = $usuarios["perfil"]; 
    if($usuarios["creado"] != NULL){
        $creado = date("d/m/Y - G:i", strtotime($usuarios["creado"]));
    }else{
        $creado = "";
    }
        
        ?>
        <tr>
            <td><?php echo $rut ; ?></td>
            <td><?php echo $nombre1 ; ?></td>
            <td><?php echo $nombre2 ; ?></td>
            <td><?php echo $apellido1; ?></td>
            <td><?php echo $apellido2 ; ?></td>
            <td><?php echo $fecha_nacimiento; ?></td>
            <td><?php echo $genero; ?></td>
            <td><?php echo $nacionalidad ; ?></td>
            <td><?php echo $correo; ?></td>
            <td><?php echo $correo_adicional ; ?></td>
            <td><?php echo $telefono; ?></td>
            <td><?php echo $telefono2; ?></td>
            <td><?php echo $direccion; ?></td>
            <td><?php echo $comuna ; ?></td>
            <td><?php echo $nombre_emergencia1 ; ?></td>
            <td><?php echo $telefono_emergencia1 ; ?></td>
            <td><?php echo $nombre_emergencia2; ?></td>
            <td><?php echo $telefono_emergencia2 ; ?></td>
            <td><?php echo $foto ; ?></td>
            <td><?php echo $cedula ; ?></td>
            <td><?php echo $cv ; ?></td>
            <td><?php echo $nivel_pregrado ; ?></td>
            <td><?php echo $institucion_pregrado; ?></td>
            <td><?php echo $titulo_pregrado ; ?></td>
            <td><?php echo $semestres_pregrado ; ?></td>
            <td><?php echo $fecha_pregrado ; ?></td>
            <td><?php echo $certificado_pregrado ; ?></td>
            <td><?php echo $nivel_pregrado2  ; ?></td>
            <td><?php echo $institucion_pregrado2  ; ?></td>
            <td><?php echo $titulo_pregrado2  ; ?></td>
            <td><?php echo $semestres_pregrado2  ; ?></td>
            <td><?php echo $fecha_pregrado2 ; ?></td>
            <td><?php echo $certificado_pregrado2; ?></td>
            <td><?php echo $nivel_postgrado ; ?></td>
            <td><?php echo $institucion_postgrado ; ?></td>
            <td><?php echo $titulo_postgrado ; ?></td>
            <td><?php echo $semestres_postgrado ; ?></td>
            <td><?php echo $fecha_postgrado ; ?></td>
            <td><?php echo $certificado_postgrado ; ?></td>
            <td><?php echo $nivel_postgrado2 ; ?></td>
            <td><?php echo $institucion_postgrado2  ; ?></td>
            <td><?php echo $titulo_postgrado2 ; ?></td>
            <td><?php echo $semestres_postgrado2  ; ?></td>
            <td><?php echo $fecha_postgrado2 ; ?></td>
            <td><?php echo $certificado_postgrado2 ; ?></td>
            <td><?php echo $institucion_bancaria ; ?></td>
            <td><?php echo $tipo_cuenta ; ?></td>
            <td><?php echo $numero_cuenta ; ?></td>
            <td><?php echo $perfil; ?></td>
            <td><?php echo $creado ; ?></td>                       
        </tr>
    <?php
    }
}

function ver_info_usuario($id)
{
    try {

        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            $stmt->close();
            $conn->close();
            redireccionar("lista_usuarios.php");
            exit();
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
    }
}

function listar_contenido()
{
    try {
        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT id, nombre, enlace, descripcion, categoria FROM contenido");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }

    while ($contenido = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $contenido["nombre"]; ?></td>
            <td><?php echo $contenido["enlace"]; ?></td>
            <td><?php echo $contenido["descripcion"]; ?></td>
            <td><?php echo ucfirst($contenido["categoria"]); ?></td>
            <td class="project-actions text-center">
                <a class="btn btn-info btn-sm" href="editar_contenido.php?id=<?php echo $contenido["id"] ?>" class="btn bg-orange btn-flat margin">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editar
                </a>
                <a class="btn btn-danger btn-sm borrar_registro_contenido" href="#" data_id="<?php echo $contenido["id"]; ?>">
                    <i class="fas fa-trash">
                    </i>
                    Eliminar
                </a>
            </td>
        </tr>
    <?php
    }
}

function ver_info_contenido($id)
{
    try {

        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT * FROM contenido WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            $stmt->close();
            $conn->close();
            redireccionar("lista_contenido.php");
            exit();
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
    }
}

function mostrar_contenido_categoria($categoria)
{
    try {
        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT nombre, enlace, descripcion FROM contenido WHERE categoria = ?");
        $stmt->bind_param("s", $categoria);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
    }
    while ($contenido = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><a href="<?php echo $contenido["enlace"]; ?>"><?php echo $contenido["nombre"]; ?></a></td>
            <td><?php echo $contenido["descripcion"]; ?></td>
        </tr>
<?php
    }
}

function contador_contenido($categoria)
{
    try {
        $conn = conectar_bd();
        $stmt = $conn->prepare("SELECT COUNT(id) AS $categoria FROM contenido WHERE categoria = ?");
        $stmt->bind_param("s", $categoria);
        $stmt->execute();
        $resultado = $stmt->get_result();        
        $stmt->close();
        $conn->close();
        return $resultado->fetch_assoc();
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
    }   
}

function redireccionar($url)
{
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit;
    }
}
