<?php
include_once "funciones/sesiones.php";
include_once "funciones/validar_cuenta_suspendida.php";
include_once "funciones/validar_nuevo.php";
include_once "funciones/funciones.php";
include_once "templates/header.php";
include_once "templates/barra.php";
include_once "templates/navegacion.php";

$categoria1 = contador_contenido("categoria1");
$categoria2 = contador_contenido("categoria2");
$categoria3 = contador_contenido("categoria3");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Home</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">       
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $categoria1['categoria1']; ?></h3>
              <p>Categoría 1</p>
            </div>
            <div class="icon">
              <i class="fas fa-star"></i>
            </div>
            <a href="categoria1.php" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">          
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $categoria2['categoria2']; ?></h3>

              <p>Categoría 2</p>
            </div>
            <div class="icon">
              <i class="fas fa-star"></i>
            </div>
            <a href="categoria2.php" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">          
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $categoria3['categoria3']; ?></h3>

              <p>Categoría 3</p>
            </div>
            <div class="icon">
              <i class="fas fa-star"></i>
            </div>
            <a href="categoria3.php" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">   
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="card">
      <div class="card-body">
        <div class="row mb-4">
          <h3 class="m-0">Video youtube</h3>
        </div>

        <div class="row mb-4">
          <div class="col-sm-6">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YbJOTdZBX1g" allowfullscreen></iframe>
            </div>

          </div>
        </div>
        <div class="row mb-4">
          <h3 class="m-0">Enlaces de interés</h3>
        </div><!-- /.col -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody>
              <?php
              mostrar_contenido_categoria("enlaces");
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once "templates/footer.php"
?>