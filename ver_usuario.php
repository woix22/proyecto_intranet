<?php
include_once "funciones/sesiones.php";
include_once "funciones/validar_cuenta_suspendida.php";
include_once "funciones/validar_nuevo.php";
include_once "funciones/funciones.php";
include_once "gdrive.php";
include_once "funciones/validar_perfil.php";
include_once "templates/header.php";
include_once "templates/barra.php";
include_once "templates/navegacion.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $usuario = ver_info_usuario($id);

  $nombre_usuario = $usuario["nombre1"] . " " . $usuario["apellido1"];
  $fecha_nac = date("d/m/Y", strtotime($usuario["fecha_nacimiento"]));
  $fecha_pregrado = date("d/m/Y", strtotime($usuario["fecha_pregrado"]));
  $creado = date("d/m/Y - G:i", strtotime($usuario["creado"]));

  if ($usuario["editado"] != null) {
    $editado = date("d/m/Y - G:i", strtotime($usuario["editado"]));
  } else {
    $editado = "N/A";
  }
}else{  
  redireccionar("lista_usuarios.php");
  exit();
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Usuarios (<?php echo $nombre_usuario; ?>)</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Datos personales</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

        <strong>RUT:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["rut"]; ?>
        </p>
        <hr>
        <strong>Primer nombre:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["nombre1"]; ?>
        </p>
        <hr>
        <strong>Segundo nombre:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["nombre2"] != NULL) {
            echo $usuario["nombre2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Apellido paterno:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["apellido1"]; ?>
        </p>
        <hr>
        <strong>Apellido materno:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["apellido2"]; ?>
        </p>
        <hr>
        <strong>Fecha de nacimiento:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $fecha_nac; ?>
        </p>
        <hr>
        <strong>G??nero:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["genero"]; ?>
        </p>
        <hr>
        <strong>Nacionalidad:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["nacionalidad"]; ?>
        </p>
        <hr>
        <strong>Correo:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["correo"]; ?>
        </p>
        <hr>
        <strong>Correo personal:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["correo_adicional"]; ?>
        </p>
        <hr>
        <strong>Tel??fono:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          (569) <?php echo $usuario["telefono"]; ?>
        </p>
        <hr>
        <strong>Tel??fono 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["telefono2"] != NULL) {
            echo "(569) " . $usuario["telefono2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Direcci??n:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["direccion"]; ?>
        </p>
        <hr>
        <strong>Comuna:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["comuna"]; ?>
        </p>
        <hr>
        <strong>Foto Credencial:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["foto"] != NULL) {
            echo link_archivo($usuario["foto"]);
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>C??dula:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo link_archivo($usuario["cedula"]); ?>
        </p>
        <hr>
        <strong>Curr??culum Vitae:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo link_archivo($usuario["cv"]); ?>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-footer-->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Informaci??n de emergencia</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <strong>Nombre del contacto de emergencia 1:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["nombre_emergencia1"]; ?>
        </p>
        <hr>
        <strong>Tel??fono del contacto de emergencia 1:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          (569) <?php echo $usuario["telefono_emergencia1"]; ?>
        </p>
        <hr>
        <strong>Nombre del contacto de emergencia 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["nombre_emergencia2"] != NULL) {
            echo $usuario["nombre_emergencia2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Tel??fono del contacto de emergencia 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["telefono2"] != NULL) {
            echo "(569) " . $usuario["telefono_emergencia2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
      </div>
    </div>

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Informaci??n Acad??mica</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

        <strong>Nivel de estudios (Pregrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["nivel_pregrado"]; ?>
        </p>
        <hr>
        <strong>Instituci??n de Educaci??n (Pregrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["institucion_pregrado"]; ?>
        </p>
        <hr>
        <strong>T??tulo (Pregrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["titulo_pregrado"]; ?>
        </p>
        <hr>
        <strong>Semestres (Pregrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["semestres_pregrado"]; ?>
        </p>
        <hr>
        <strong>Fecha de T??tulo (Pregrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $fecha_pregrado; ?>
        </p>
        <hr>
        <strong>Certificado T??tulo formato digital (Pregrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo link_archivo($usuario["certificado_pregrado"]); ?>
        </p>
        <hr>

        <strong>Nivel de estudios (Pregrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["nivel_pregrado2"] != NULL) {
            echo $usuario["nivel_pregrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Instituci??n de Educaci??n (Pregrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["institucion_pregrado2"] != NULL) {
            echo $usuario["institucion_pregrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>T??tulo (Pregrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["titulo_pregrado2"] != NULL) {
            echo $usuario["titulo_pregrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Semestres (Pregrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["semestres_pregrado2"] != NULL) {
            echo $usuario["semestres_pregrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Fecha de T??tulo (Pregrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["fecha_pregrado2"] != NULL) {
            echo $usuario["fecha_pregrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Certificado T??tulo formato digital (Pregrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["certificado_pregrado2"] != NULL) {
            echo link_archivo($usuario["certificado_pregrado2"]);
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>

        <strong>Nivel de estudios (Postgrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["nivel_pregrado2"] != NULL) {
            echo $usuario["nivel_pregrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Instituci??n de Educaci??n (Postgrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["institucion_postgrado"] != NULL) {
            echo $usuario["institucion_postgrado"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>T??tulo (Postgrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["titulo_postgrado"] != NULL) {
            echo $usuario["titulo_postgrado"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Semestres (Postgrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["semestres_postgrado"] != NULL) {
            echo $usuario["semestres_postgrado"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Fecha de T??tulo (Postgrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["fecha_postgrado"] != NULL) {
            echo $usuario["fecha_postgrado"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Certificado T??tulo formato digital (Postgrado):</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["certificado_postgrado"] != NULL) {
            echo link_archivo($usuario["certificado_postgrado"]);
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>

        <strong>Nivel de estudios (Postgrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["nivel_postgrado2"] != NULL) {
            echo $usuario["nivel_postgrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Instituci??n de Educaci??n (Postgrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["institucion_postgrado2"] != NULL) {
            echo $usuario["institucion_postgrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>T??tulo (Postgrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["titulo_postgrado2"] != NULL) {
            echo $usuario["titulo_postgrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Semestres (Postgrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["semestres_postgrado2"] != NULL) {
            echo $usuario["semestres_postgrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Fecha de T??tulo (Postgrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["fecha_postgrado2"] != NULL) {
            echo $usuario["fecha_postgrado2"];
          } else {
            echo "N/A";
          };
          ?>
        </p>
        <hr>
        <strong>Certificado T??tulo formato digital (Postgrado) 2:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php
          if ($usuario["certificado_postgrado2"] != NULL) {
            echo link_archivo($usuario["certificado_postgrado2"]);
          } else {
            echo "N/A";
          };
          ?>
        </p>
      </div>
    </div>

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Informaci??n Bancaria</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

        <strong>Instituci??n bancaria:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["institucion_bancaria"]; ?>
        </p>
        <hr>
        <strong>Tipo de cuenta:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["tipo_cuenta"]; ?>
        </p>
        <hr>
        <strong>N??mero de cuenta:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $usuario["numero_cuenta"]; ?>
        </p>
      </div>
    </div>

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Informaci??n adicional</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

        <strong>Perfil:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo ucfirst($usuario["perfil"]); ?>
        </p>
        <hr>
        <strong>Fecha de creaci??n:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $creado; ?>
        </p>
        <hr>
        <strong>??ltima edici??n:</strong>
        <p class="text-muted" style="font-size:1.3rem; text-indent: 1em">
          <?php echo $editado; ?>
        </p>
      </div>
      <div class="card-footer">
        <a href="lista_usuarios.php" class="btn btn-primary">Volver</a>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once "templates/footer.php"
?>