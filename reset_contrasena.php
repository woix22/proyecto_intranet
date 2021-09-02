<?php
include_once "funciones/funciones.php";
include_once "templates/header.php";

if (isset($_GET["pass_id"]) and isset($_GET["id"])) {
  if ($_GET["pass_id"] != "" and $_GET["id"] != "") {
    $pass_id = $_GET["pass_id"];
    $id = $_GET["id"];
  }
} else {
  header("location: login.php");
}

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

        <p class="login-box-msg">Recuperación de contraseña</p>

        <form name="reset_contrasena" id="reset_contrasena" action="modelo_usuario.php" method="post">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" class="form-control" id="contrasena_nueva_rec" name="contrasena_nueva_rec" placeholder="Contraseña nueva">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" class="form-control" id="contrasena_repetir_rec" name="contrasena_repetir_rec" placeholder="Repetir Contraseña">
          </div>
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="registro" value="reset_contrasena">
              <input type="hidden" name="pass_id" value="<?php echo $pass_id; ?>">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <button type="submit" class="btn btn-primary btn-block">Cambiar contraseña</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-3 mb-1">
          <a href="login.php">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

  <?php
  include_once "templates/footer.php"
  ?>