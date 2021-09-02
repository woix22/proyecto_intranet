<?php
include_once "funciones/funciones.php";
include_once "templates/header.php";
?>
<style>
  body {
    background-image: url("img/imagen_login.jpg");
  }
</style>

<body class="hold-transition login-page">
  <div class="card">
    <div class="card-body">
      <div class="login-box">
        <div class="login-logo">
          <a href="#" class="brand-link">
            <img src="img/logo.png" alt="PROYECTO_INTRANET Logo">
          </a>
        </div>
        <!-- /.login-logo -->


        <p class="login-box-msg">Ingrese su correo electrónico para recibir una contraseña nueva.</p>

        <form name="olvide_contrasena" id="olvide_contrasena" action="modelo_usuario.php" method="post">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <input type="email" class="form-control" id="olvide_correo" name="olvide_correo" placeholder="usuario@correocorporativo.com">
          </div>

          <div class="row">
            <div class="col-12">
              <input type="hidden" name="registro" value="olvide_contrasena">
              <button type="submit" class="btn btn-primary btn-block" id="guardar">Solicitar Nueva Contraseña</button>
            </div>
            <!-- /.col -->
          </div>

        </form>

        <p class="mt-3 mb-1">
          <a href="login.php">Iniciar sesión</a>
        </p>
      </div>
      <div class="container" id="cargando" style="display:none;">
        <div class="row justify-content-center">
          <img src="img/cargando.gif" alt="cargando">
        </div>
        <div class="row justify-content-center">
          <h5>Cargando, por favor espere...</h5>
        </div>
      </div>
      <!-- /.login-card-body -->
    </div>
    <!-- /.login-card-body -->

  </div>

  <?php
  include_once "templates/footer.php"
  ?>