<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
          <a href="index.php" class="nav-link">
            <i class="fas fa-home"></i>
            <span class = "d-none d-sm-inline-block"><b>Home</b></span>            
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-user"></i>
            <span class="d-none d-md-inline">
              <b>
                <?php
                echo $_SESSION["nombre1"] . " " . $_SESSION["apellido1"];
                ?>
              </b>
            </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            <li class="user-footer">
              <a href="cambiar_contrasena.php" class="btn btn-primary btn-flat">Mis Datos</a>
              <a href="login.php?cerrar_sesion=true" class="btn btn-secondary btn-flat float-right">Cerrar Sesión</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->