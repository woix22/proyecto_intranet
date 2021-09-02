<?php
include_once "funciones/sesiones.php";
include_once "funciones/validar_cuenta_suspendida.php";
include_once "funciones/validar_nuevo.php";
include_once "funciones/validar_perfil.php";
include_once "funciones/funciones.php";
?>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        th, td {
            white-space: nowrap;
        }
    </style>
</head>

<body>

    <h3>Listado de usuarios registrados</h3>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>RUT</th>
                <th>Primer nombre</th>
                <th>Segundo nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Fecha de nacimiento</th>
                <th>Genero</th>
                <th>Nacionalidad</th>
                <th>Correo electrónico</th>
                <th>Correo electrónico adicional</th>
                <th>Teléfono</th>
                <th>Teléfono adicional</th>
                <th>Dirección</th>
                <th>Comuna</th>
                <th>Contacto de emergencia</th>
                <th>Teléfono del contacto de emergencia</th>
                <th>Contacto de emergencia 2</th>
                <th>Teléfono del contacto de emergencia 2</th>
                <th>Foto credencial</th>
                <th>Cedula de identidad</th>
                <th>Curriculum Vitae</th>
                <th>Nivel de estudios (Pregrado)</th>
                <th>Institución de estudios (Pregrado)</th>
                <th>Título (Pregrado)</th>
                <th>Duración en semestres de la carrera (Pregrado)</th>
                <th>Fecha de titulación (Pregrado)</th>
                <th>Certificado (Pregrado)</th>
                <th>Nivel de estudios de carrera adicional (Pregrado) </th>
                <th>Institución de estudios de carrera adicional (Pregrado)</th>
                <th>Título de carrera adicional (Pregrado) </th>
                <th>Duración en semestres de carrera adicional (Pregrado) </th>
                <th>Fecha de titulación de carrera adicional (Pregrado)</th>
                <th>Certificado de carrera adicional (Pregrado</th>
                <th>Nivel de estudios (Postgrado)</th>
                <th>Institución de estudios (Postgrado)</th>
                <th>Título (Postgrado)</th>
                <th>Duración en semestres de la carrera (Postgrado)</th>
                <th>Fecha de titulación (Postgrado)</th>
                <th>Certificado (Postgrado)</th>
                <th>Nivel de estudios de carrera adicional (Postgrado) </th>
                <th>Institución de estudios de carrera adicional (Postgrado) </th>
                <th>Título de carrera adicional (Postgrado) </th>
                <th>Duración en semestres de carrera adicional (Postgrado) </th>
                <th>Fecha de titulación de carrera adicional (Postgrado) </th>
                <th>Certificado de carrera adicional (Postgrado) </th>
                <th>Institución bancaria</th>
                <th>Tipo de cuenta</th>
                <th>Número de cuenta</th>
                <th>Perfil</th>
                <th>Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            listar_usuarios_excel();
            ?>
        </tbody>
    </table>
</body>
</html>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.tableToExcel.js"></script>
<script>
    $('table').tblToExcel();
</script>