<?php
include_once "funciones/sesiones.php";
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
        
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="error-page">



      <div>
        <h2><i class="fas fa-exclamation-triangle text-danger"></i> ¡Acceso no autorizado!</h2>

        <h5>          
          Su cuenta ha sido suspendida, por favor, póngase en contacto con su administrador.          
        </h5>


      </div>
    </div>
    <!-- /.error-page -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once "templates/footer.php"
?>