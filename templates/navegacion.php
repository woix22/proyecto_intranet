 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->

   <a href="#" class="brand-link">
      <img src="img/logo.png" alt="PROYECTO_INTRANET Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">P_<b>INTRANET</b></span>
    </a>

   <!-- Sidebar -->
   <div class="sidebar">

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="categoria1.php" class="nav-link">
             <i class="nav-icon fas fa-star"></i>
             <p>
               Categoría 1
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="categoria2.php" class="nav-link">
             <i class="nav-icon fas fa-star"></i>
             <p>
             Categoría 2
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="categoria3.php" class="nav-link">
             <i class="nav-icon fas fa-star"></i>
             <p>
             Categoría 3
             </p>
           </a>
         </li>

         <?php if ($_SESSION["perfil"] == "Administrador") : ?>

           <li class="nav-header"><b>ADMINISTRACIÓN</b></li>
           <li class="nav-item menu-closed">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-users"></i>
               <p>
                 Usuarios
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="lista_usuarios.php" class="nav-link">
                   <i class="nav-icon fas fa-list"></i>
                   <p>Ver Usuarios</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="lista_no_validados.php" class="nav-link">
                   <i class="nav-icon fas fa-user-lock"></i>
                   <p>Usuarios por Validar</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="agregar_usuario.php" class="nav-link">
                   <i class="nav-icon fas fa-user-plus"></i>
                   <p>Agregar Usuario</p>
                 </a>
               </li>
             </ul>
           </li>
           <li class="nav-item menu-closed">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-download"></i>
               <p>
                 Contenido
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="lista_contenido.php" class="nav-link">
                   <i class="nav-icon fas fa-list"></i>
                   <p>Ver Contenido</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="agregar_contenido.php" class="nav-link">
                   <i class="nav-icon fas fa-plus-circle"></i>
                   <p>Agregar Contenido</p>
                 </a>
               </li>
             </ul>
           </li>
         <?php endif; ?>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>