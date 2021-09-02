<?php
include_once "funciones/sesiones.php";
include_once "funciones/validar_cuenta_suspendida.php";
include_once "funciones/validar_nuevo.php";
include_once "funciones/validar_perfil.php";
include_once "funciones/funciones.php";
include_once "templates/header.php";
include_once "templates/barra.php";
include_once "templates/navegacion.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $usuario = ver_info_usuario($id);
} else {
  redireccionar("lista_usuarios.php");
  exit();
}

?>
<style type="text/css">
  .custom-file-label::after {
    content: "Buscar";
  }
</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-sm-6">
          <h1>Editar usuario</h1>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <!-- form start -->
    <form name="editar_usuario" id="editar_usuario" method="post" action="modelo_usuario.php" enctype="multipart/form-data">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-user-circle"></i> Datos Personales</h3>
        </div>
        <!-- /.card-header -->


        <div class="card-body">
          <p>(*) Campo obligatorio</p>
          <div class="form-group">
            <label for="nombre1">Primer nombre</label>
            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Ej: Pedro" value="<?php echo $usuario["nombre1"] ?>">
          </div>
          <div class="form-group">
            <label for="nombre2">Segundo nombre</label>
            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Ej: José" value="<?php echo $usuario["nombre2"] ?>">
          </div>
          <div class="form-group">
            <label for="apellido1">Apellido paterno</label>
            <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Ej: Perez" value="<?php echo $usuario["apellido1"] ?>">
          </div>
          <div class="form-group">
            <label for="apellido2">Apellido materno</label>
            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Ej: Gonzalez" value="<?php echo $usuario["apellido2"] ?>">
          </div>
          <div class="form-group">
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $usuario["fecha_nacimiento"] ?>">
          </div>
          <div class="form-group">
            <label for="genero">Género</label>
            <div class="form-check">
              <input type="radio" class="form-check-input" id="femenino" name="genero" value="femenino">
              <label for="femenino" class="form-check-label" style="color:black !important;">Femenino</label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" id="masculino" name="genero" value="masculino">
              <label for="masculino" class="form-check-label">Masculino</label>
            </div>
          </div>
          <div class="form-group">
            <label for="nacionalidad">Nacionalidad</label>
            <div class="form-check">
              <input type="radio" class="radio_nacionalidad form-check-input" id="chilena" name="nacionalidad" value="chilena">
              <label for="chilena" class="form-check-label" style="color:black !important;">Chilena</label>
            </div>
            <div class="form-check">
              <input type="radio" class="radio_nacionalidad form-check-input" id="otros" name="nacionalidad" value="">
              <label for="otros" class="form-check-label">Otros</label>
            </div>
            <input type="text" class="form-control" name="nacionalidad_otros" id="txt_otros" style="display:none;">
          </div>
          <div class="form-group">
            <label for="correo">Correo principal</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej: pperez@correo_ejemplo.com" value="<?php echo $usuario["correo"] ?>">
          </div>
          <div class="form-group">
            <label for="correo_adicional">Correo personal</label>
            <input type="email" class="form-control" id="correo_adicional" name="correo_adicional" placeholder="Ej: pperez@correo_ejemplo.com" value="<?php echo $usuario["correo_adicional"] ?>">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">569</span>
              </div>
              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ej: 87654321" value="<?php echo $usuario["telefono"] ?>">
            </div>
            <label for="telefono2">Teléfono 2</label>
            <div class="input-group mb-3" id="div_telefono2">
              <div class="input-group-prepend">
                <span class="input-group-text">569</span>
              </div>
              <input type="text" class="form-control" id="telefono2" name="telefono2" placeholder="Ej: 87654321" value="<?php echo $usuario["telefono2"] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej: Calle Ejemplo 1234" value="<?php echo $usuario["direccion"] ?>">
          </div>
          <div class="form-group">
            <label>Comuna</label>
            <select class="form-control" name="comuna" id="comuna">
              <option value=""></option>
              <option value="Alto Hospicio">Alto Hospicio</option>
              <option value="Iquique">Iquique</option>
              <option value="Camiña">Camiña</option>
              <option value="Colchane">Colchane</option>
              <option value="Huara">Huara</option>
              <option value="Pica">Pica</option>
              <option value="Pozo Almonte">Pozo Almonte</option>
            </select>
          </div>
          <div class="form-group">
            <label for="foto">Fotografía para Credencial</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="foto" name="foto">
              <label class="custom-file-label" for="foto">Escoja el archivo</label>
            </div>
          </div>
          <div class="form-group">
            <label for="cedula">Copia Cédula de Identidad</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="cedula" name="cedula">
              <label class="custom-file-label" for="cedula">Escoja el archivo</label>
            </div>
          </div>
          <div class="form-group">
            <label for="cv">Currículum Vitae</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="cv" name="cv">
              <label class="custom-file-label" for="cv">Escoja el archivo</label>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-phone"></i> Contacto de Emergencia</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="form-group">
            <label for="nombre1">Nombre contacto de emergencia</label>
            <input type="text" class="form-control" id="nombre_emergencia1" name="nombre_emergencia1" placeholder="Ej: Pedro" value="<?php echo $usuario["nombre_emergencia1"] ?>">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono contacto de emergencia</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">569</span>
              </div>
              <input type="text" class="form-control" id="telefono_emergencia1" name="telefono_emergencia1" placeholder="Ej: 87654321" value="<?php echo $usuario["telefono_emergencia1"] ?>">
            </div>
          </div>
          <div id="div_emergencia2">
            <div class="form-group">
              <label for="nombre1">Nombre contacto de emergencia 2</label>
              <input type="text" class="form-control" id="nombre_emergencia2" name="nombre_emergencia2" placeholder="Ej: Pedro" value="<?php echo $usuario["nombre_emergencia2"] ?>">
            </div>
            <div class="form-group">
              <label for="telefono">Teléfono contacto de emergencia 2</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">569</span>
                </div>
                <input type="text" class="form-control" id="telefono_emergencia2" name="telefono_emergencia2" placeholder="Ej: 87654321" value="<?php echo $usuario["telefono_emergencia2"] ?>">
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-graduation-cap"></i> Información Académica</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="form-group">
            <label>Nivel de Estudios (Pregrado)</label>
            <select class="form-control" name="nivel_pregrado" id="nivel_pregrado">
              <option value=""></option>
              <option value="Educación Media Incompleta">Educación Media Incompleta</option>
              <option value="Educación Media Completa">Educación Media Completa</option>
              <option value="Educación Media Técnico-Profesional Incompleta">Educación Media Técnico-Profesional Incompleta</option>
              <option value="Educación Media Técnico-Profesional Completa">Educación Media Técnico-Profesional Completa</option>
              <option value="Técnico Incompleto">Técnico Incompleto</option>
              <option value="Técnico Completo">Técnico Completo</option>
              <option value="Licenciado Incompleto">Licenciado Incompleto</option>
              <option value="Licenciado Completo">Licenciado Completo</option>
              <option value="Profesional Incompleto">Profesional Incompleto</option>
              <option value="Profesional Completo">Profesional Completo</option>
            </select>
          </div>
          <div class="form-group">
            <label for="institucion_pregrado">Institución de Educación (Pregrado)</label>
            <input type="text" class="form-control" id="institucion_pregrado" name="institucion_pregrado" placeholder="Ej: Universidad Ejemplo" value="<?php echo $usuario["institucion_pregrado"] ?>">
          </div>
          <div class="form-group">
            <label for="titulo_pregrado">Título (Pregrado)</label>
            <input type="text" class="form-control" id="titulo_pregrado" name="titulo_pregrado" placeholder="Ej: Licenciado en Matemática" value="<?php echo $usuario["titulo_pregrado"] ?>">
          </div>
          <div class="form-group">
            <label for="semestres_pregrado">Semestres (Pregrado)</label>
            <input type="number" class="form-control" id="semestres_pregrado" name="semestres_pregrado" placeholder="Ej: 8" value="<?php echo $usuario["semestres_pregrado"] ?>">
          </div>
          <div class="form-group">
            <label for="fecha_pregrado">Fecha de Título (Pregrado)</label>
            <input type="date" class="form-control" id="fecha_pregrado" name="fecha_pregrado" value="<?php echo $usuario["fecha_pregrado"] ?>">
          </div>
          <div class="form-group">
            <label for="certificado_pregrado">Certificados Título formato digital (Pregrado)</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="certificado_pregrado" name="certificado_pregrado">
              <label class="custom-file-label" for="certificado_pregrado">Escoja el archivo</label>
            </div>
          </div>
          <div id="div_pregrado2">
            <div class="form-group">
              <label>Nivel de Estudios (Pregrado) 2</label>
              <select class="form-control" name="nivel_pregrado2" id="nivel_pregrado2">
                <option value=""></option>
                <option value="Educación Media Incompleta">Educación Media Incompleta</option>
                <option value="Educación Media Completa">Educación Media Completa</option>
                <option value="Educación Media Técnico-Profesional Incompleta">Educación Media Técnico-Profesional Incompleta</option>
                <option value="Educación Media Técnico-Profesional Completa">Educación Media Técnico-Profesional Completa</option>
                <option value="Técnico Incompleto">Técnico Incompleto</option>
                <option value="Técnico Completo">Técnico Completo</option>
                <option value="Licenciado Incompleto">Licenciado Incompleto</option>
                <option value="Licenciado Completo">Licenciado Completo</option>
                <option value="Profesional Incompleto">Profesional Incompleto</option>
                <option value="Profesional Completo">Profesional Completo</option>
              </select>
            </div>
            <div class="form-group">
              <label for="institucion_pregrado2">Institución de Educación (Pregrado) 2</label>
              <input type="text" class="form-control" id="institucion_pregrado2" name="institucion_pregrado2" placeholder="Ej: Universidad Ejemplo" value="<?php echo $usuario["institucion_pregrado2"] ?>">
            </div>
            <div class="form-group">
              <label for="titulo_pregrado2">Título (Pregrado) 2</label>
              <input type="text" class="form-control" id="titulo_pregrado2" name="titulo_pregrado2" placeholder="Ej: Licenciado en Matemática" value="<?php echo $usuario["titulo_pregrado2"] ?>">
            </div>
            <div class="form-group">
              <label for="semestres_pregrado2">Semestres (Pregrado) 2</label>
              <input type="number" class="form-control" id="semestres_pregrado2" name="semestres_pregrado2" placeholder="Ej: 8" value="<?php echo $usuario["semestres_pregrado2"] ?>">
            </div>
            <div class="form-group">
              <label for="fecha_pregrado2">Fecha de Título (Pregrado) 2</label>
              <input type="date" class="form-control" id="fecha_pregrado2" name="fecha_pregrado2" value="<?php echo $usuario["fecha_pregrado2"] ?>">
            </div>
            <div class="form-group">
              <label for="certificado_pregrado2">Certificados Título formato digital (Pregrado) 2</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="certificado_pregrado2" name="certificado_pregrado2">
                <label class="custom-file-label" for="certificado_pregrado2">Escoja el archivo</label>
              </div>
            </div>
          </div>
          <label>Estudios de Postgrado</label>

          <div id="div_postgrado">
            <div class="form-group">
              <label>Nivel de Estudios (Postgrado)</label>
              <select class="form-control" name="nivel_postgrado" id="nivel_postgrado">
                <option value=""></option>
                <option value="Diplomado Incompleto">Diplomado Incompleto</option>
                <option value="Diplomado Completo">Diplomado Completo</option>
                <option value="Postitulo Incompleto">Postítulo Incompleto</option>
                <option value="Postitulo Completo">Postítulo Completo</option>
                <option value="Magister Incompleto">Magister Incompleto</option>
                <option value="Magister Completo">Magister Completo</option>
                <option value="Doctorado Incompleto">Doctorado Incompleto</option>
                <option value="Doctorado Completo">Doctorado Completo</option>
              </select>
            </div>
            <div class="form-group">
              <label for="institucion_postgrado">Institución de Educación (Postgrado)</label>
              <input type="text" class="form-control" id="institucion_postgrado" name="institucion_postgrado" placeholder="Ej: Universidad Ejemplo" value="<?php echo $usuario["institucion_postgrado"] ?>">
            </div>
            <div class="form-group">
              <label for="titulo_postgrado">Título (Postgrado)</label>
              <input type="text" class="form-control" id="titulo_postgrado" name="titulo_postgrado" placeholder="Ej: Doctor en Matemática" value="<?php echo $usuario["titulo_postgrado"] ?>">
            </div>
            <div class="form-group">
              <label for="semestres_postgrado">Semestres (Postgrado)</label>
              <input type="number" class="form-control" id="semestres_postgrado" name="semestres_postgrado" placeholder="Ej: 8" value="<?php echo $usuario["semestres_postgrado"] ?>">
            </div>
            <div class="form-group">
              <label for="fecha_postgrado">Fecha de Título (Postgrado)</label>
              <input type="date" class="form-control" id="fecha_postgrado" name="fecha_postgrado" value="<?php echo $usuario["fecha_postgrado"] ?>">
            </div>
            <div class="form-group">
              <label for="certificado_postgrado">Certificados Título formato digital (Postgrado)</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="certificado_postgrado" name="certificado_postgrado">
                <label class="custom-file-label" for="certificado_postgrado">Escoja el archivo</label>
              </div>
            </div>
          </div>
          <div id="div_postgrado2">
            <div class="form-group">
              <label>Nivel de Estudios (Postgrado) 2</label>
              <select class="form-control" name="nivel_postgrado2" id="nivel_postgrado2">
                <option value=""></option>
                <option value="Diplomado Incompleto">Diplomado Incompleto</option>
                <option value="Diplomado Completo">Diplomado Completo</option>
                <option value="Postitulo Incompleto">Postítulo Incompleto</option>
                <option value="Postitulo Completo">Postítulo Completo</option>
                <option value="Magister Incompleto">Magister Incompleto</option>
                <option value="Magister Completo">Magister Completo</option>
                <option value="Doctorado Incompleto">Doctorado Incompleto</option>
                <option value="Doctorado Completo">Doctorado Completo</option>
              </select>
            </div>
            <div class="form-group">
              <label for="institucion_postgrado2">Institución de Educación (Postgrado) 2</label>
              <input type="text" class="form-control" id="institucion_postgrado2" name="institucion_postgrado2" placeholder="Ej: Universidad Ejemplo" value="<?php echo $usuario["institucion_postgrado2"] ?>">
            </div>
            <div class="form-group">
              <label for="titulo_postgrado2">Título (Postgrado) 2</label>
              <input type="text" class="form-control" id="titulo_postgrado2" name="titulo_postgrado2" placeholder="Ej: Doctor en Matemática" value="<?php echo $usuario["titulo_postgrado2"] ?>">
            </div>
            <div class="form-group">
              <label for="semestres_postgrado2">Semestres (Postgrado) 2</label>
              <input type="number" class="form-control" id="semestres_postgrado2" name="semestres_postgrado2" placeholder="Ej: 8" value="<?php echo $usuario["semestres_postgrado2"] ?>">
            </div>
            <div class="form-group">
              <label for="fecha_postgrado2">Fecha de Título (Postgrado) 2</label>
              <input type="date" class="form-control" id="fecha_postgrado2" name="fecha_postgrado2" value="<?php echo $usuario["fecha_postgrado2"] ?>">
            </div>
            <div class="form-group">
              <label for="certificado_postgrado2">Certificados Título formato digital (Postgrado) 2</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="certificado_postgrado2" name="certificado_postgrado2">
                <label class="custom-file-label" for="certificado_postgrado2">Escoja el archivo</label>
              </div>
            </div>
          </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-dollar-sign"></i> Información Bancaria</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="form-group">
            <label>Institución Bancaria</label>
            <select class="form-control" name="institucion_bancaria" id="institucion_bancaria">
              <option value=""></option>
              <option value="BANCO DE CHILE">BANCO DE CHILE</option>
              <option value="BANCO DE CREDITO E INVERSIONES">BANCO DE CRÉDITO E INVERSIONES</option>
              <option value="BANCO DEL ESTADO DE CHILE">BANCO DEL ESTADO DE CHILE</option>
              <option value="BANCO FALABELLA">BANCO FALABELLA</option>
              <option value="BANCO SANTANDER-CHILE">BANCO SANTANDER-CHILE</option>
              <option value="ITAÚ CORPBANCA">ITAÚ CORPBANCA</option>
              <option value="SCOTIABANK CHILE">SCOTIABANK CHILE</option>
              <option value="SCOTIABANK AZUL">SCOTIABANK AZUL</option>
              <option value="BANCO BICE">BANCO BICE</option>
              <option value="BANCO BTG PACTUAL CHILE">BANCO BTG PACTUAL CHILE</option>
              <option value="BANCO CONSORCIO">BANCO CONSORCIO</option>
              <option value="BANCO INTERNACIONAL">BANCO INTERNACIONAL</option>
              <option value="BANCO RIPLEY">BANCO RIPLEY</option>
              <option value="BANCO SECURITY">BANCO SECURITY</option>
              <option value="HSBC BANK (CHILE)">HSBC BANK (CHILE)</option>
              <option value="COOPEUCH">COOPEUCH</option>
            </select>
          </div>

          <div class="form-group">
            <label>Tipo de Cuenta</label>
            <select class="form-control" name="tipo_cuenta" id="tipo_cuenta">
              <option value=""></option>
              <option value="Cuenta Corriente">Cuenta Corriente</option>
              <option value="Cuenta Vista">Cuenta Vista</option>
              <option value="Cuenta Rut">Cuenta Rut</option>
            </select>
          </div>
          <div class="form-group">
            <label for="numero_cuenta">Número de cuenta</label>
            <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta" placeholder="Ej: 000123456789" value="<?php echo $usuario["numero_cuenta"] ?>">
          </div>
        </div>
      </div>

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-cog"></i> Permisos</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="form-group">
            <label>Tipo de perfil</label>
            <select class="form-control" name="perfil" id="perfil">
              <option value=""></option>
              <option value="Usuario">Usuario</option>
              <option value="Administrador">Administrador</option>
            </select>
          </div>
          <div class="container" id="cargando" style="display:none;">
            <div class="row justify-content-center">
              <img src="img/cargando.gif" alt="cargando">
            </div>
            <div class="row justify-content-center">
              <h5>Cargando, por favor espere...</h5>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <input type="hidden" name="foto_bd" value="<?php echo $usuario["foto"] ?>">
          <input type="hidden" name="cedula_bd" value="<?php echo $usuario["cedula"] ?>">
          <input type="hidden" name="cv_bd" value="<?php echo $usuario["cv"] ?>">
          <input type="hidden" name="certificado_pregrado_bd" value="<?php echo $usuario["certificado_pregrado"] ?>">
          <input type="hidden" name="certificado_pregrado2_bd" value="<?php echo $usuario["certificado_pregrado2"] ?>">
          <input type="hidden" name="certificado_postgrado_bd" value="<?php echo $usuario["certificado_postgrado"] ?>">
          <input type="hidden" name="certificado_postgrado2_bd" value="<?php echo $usuario["certificado_postgrado2"] ?>">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <input type="hidden" name="registro" value="editar_usuario">
          <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
        </div>
      </div>
      <!-- /.card-body -->
    </form>
  </section>
  <!-- /.content -->
</div>

<?php
include_once "templates/footer.php"
?>

<script>
  var genero = "<?php echo $usuario["genero"] ?>";
  genero = genero.toLowerCase();
  var nacionalidad = "<?php echo $usuario["nacionalidad"] ?>";
  var comuna = "<?php echo $usuario["comuna"] ?>";
  var nivel_pregrado = "<?php echo $usuario["nivel_pregrado"] ?>";
  var nivel_pregrado2 = "<?php echo $usuario["nivel_pregrado2"] ?>";
  var nivel_postgrado = "<?php echo $usuario["nivel_postgrado"] ?>";
  var nivel_postgrado2 = "<?php echo $usuario["nivel_postgrado2"] ?>";
  var institucion_bancaria = "<?php echo $usuario["institucion_bancaria"] ?>";
  var tipo_cuenta = "<?php echo $usuario["tipo_cuenta"] ?>";
  var perfil = "<?php echo $usuario["perfil"] ?>";
  $(function() {
    bsCustomFileInput.init();
  });
</script>
<script src="js/editar_usuario.js"></script>