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
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de contenido</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Enlace</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  listar_contenido();                
                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Enlace</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once "templates/footer.php"
?>