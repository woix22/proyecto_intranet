<?php
include_once "funciones/sesiones.php";
include_once "funciones/validar_cuenta_suspendida.php";
include_once "funciones/validar_nuevo.php";
include_once "funciones/validar_perfil.php";
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
          <h1>Usuarios</h1>
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
        <h3 class="card-title">Agregar Usuario</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form name="nuevo_usuario" id="nuevo_usuario" method="post" action="modelo_usuario.php">
        <div class="card-body">
          <div class="form-group">
            <label for="rut_nuevo">RUT * <small>(Ingrese el RUT de la persona que desea agregar)</small></label>
            <input type="text" class="form-control rut" id="rut_nuevo" name="rut_nuevo" placeholder="Ej: 12345678-9">
          </div>
          <div class="form-group">
            <label for="correo_nuevo">Correo * <small>(Ingrese el correo electrónico de la persona que desea agregar)</small></label>
            <input type="email" class="form-control" id="correo_nuevo" name="correo_nuevo" placeholder="Ej: pperez@correocorporativo.com">
          </div>
          <div class="form-group">
            <label for="perfil">Perfil * <small>(Seleccione el perfil que tendrá la persona que desea agregar)</small></label>
            <select class="form-control" name="perfil">
              <option value=""></option>
              <option value="usuario">Usuario</option>
              <option value="administrador">Administrador</option>
            </select>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="container" id="cargando" style="display:none;">
          <div class="row justify-content-center">
            <img src="img/cargando.gif" alt="cargando">
          </div>
          <div class="row justify-content-center">
            <h5>Cargando, por favor espere...</h5>
          </div>
        </div>
        <div class="card-footer">
          <input type="hidden" name="registro" value="nuevo">
          <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
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