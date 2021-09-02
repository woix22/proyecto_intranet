<?php
session_start();
if (isset($_GET["cerrar_sesion"])) {
  $cerrar_sesion = $_GET["cerrar_sesion"];
  if ($cerrar_sesion) {
    session_destroy();
  }
}

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
            <img src="img/logo.png" alt="PROYECTO_INTRANET">
          </a>
        </div>
        <!-- /.login-logo -->

        <h3 class="login-box-msg">PROYECTO_<b>INTRANET</b></h3>

        <form name="login_form" id="login_form" action="modelo_usuario.php" method="post">
          <label for="correo">RUT</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-id-card"></i></span>
            </div>
            <input type="text" class="form-control rut" id="login_rut" name="login_rut" placeholder="Ej: 12.345.678-9">
          </div>
          <label for="contrasena">Contraseña</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" class="form-control" id="login_contrasena" name="login_contrasena" placeholder="********">
          </div>
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="registro" value="login">
              <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <div class="social-auth-links text-center mb-3">
          <p class="mb-1">
            <a href="olvide_contrasena.php">Olvidé mi contraseña</a>
          </p>
        </div>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

  <?php
  include_once "templates/footer.php"
  ?>