<?php
include_once "funciones/sesiones.php";
include_once "funciones/validar_cuenta_suspendida.php";
include_once "funciones/validar_nuevo.php";
include_once "funciones/funciones.php";
include_once "templates/header.php";
include_once "templates/barra.php";
include_once "templates/navegacion.php";



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cambio de contraseña</h1>
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
        <h3 class="card-title">Cambiar mi contraseña</h3>
      </div>
      <!-- /.card-header -->

      <!-- form start -->
      <form name="cambiar_contrasena_usuario" id="cambiar_contrasena_usuario" method="post" action="modelo_usuario.php">
        <div class="card-body">
          <div class="form-group">
            <label for="contrasena_actual">Contraseña actual</label>
            <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual" placeholder="Contraseña actual">
          </div>
          <div class="form-group">
            <label for="contrasena_nueva">Contraseña nueva</label>
            <input type="password" class="form-control" id="contrasena_nueva" name="contrasena_nueva" placeholder="Contraseña nueva">
          </div>
          <div class="form-group">
            <label for="contrasena_repetir">Repetir Contraseña</label>
            <input type="password" class="form-control" id="contrasena_repetir" name="contrasena_repetir" placeholder="Repetir Contraseña">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <input type="hidden" name="registro" value="actualizar_contrasena">
          <button type="submit" class="btn btn-primary" id="btn_cambiar_contrasena_usuario">Cambiar mi contraseña</button>
        </div>
      </form>
    </div>
    <!-- /.card-footer-->


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once "templates/footer.php"
?>