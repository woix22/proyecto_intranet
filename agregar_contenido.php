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
          <h1>Contenido</h1>
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
        <h3 class="card-title">Agregar Contenido</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form name="guardar_registro_contenido" id="guardar_registro_contenido" method="post" action="modelo_contenido.php">
        <div class="card-body">
          <div class="form-group">
            <label for="nombre_contenido">Nombre del contenido</label>
            <input type="text" class="form-control" id="nombre_contenido" name="nombre_contenido" placeholder="Nombre del contenido">
          </div>
          <div class="form-group">
            <label for="enlace_contenido">Enlace del contenido</label>
            <input type="text" class="form-control" id="enlace_contenido" name="enlace_contenido" placeholder="http://www.contenido.ej">
          </div>
          <div class="form-group">
            <label for="descripcion_contenido">Descripción del contenido</label>
            <textarea class="form-control" rows="3" id="descripcion_contenido" name="descripcion_contenido" placeholder="Breve descripción del contenido"></textarea>
          </div>
          <div class="form-group">
            <label for="categoria_contenido">Categoría del contenido</label>
            <select class="form-control" id="categoria_contenido" name="categoria_contenido">
              <option value=""></option>
              <option value="categoria1">Categoría 1</option>
              <option value="categoria2">Categoría 2</option>
              <option value="categoria3">Categoría 3</option>
              <option value="enlaces">Links de Interés</option>
            </select>
          </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <input type="hidden" name="registro" value="nuevo">
          <button type="submit" class="btn btn-primary" id="guardar_contenido">Guardar</button>
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