<?php
include_once "funciones/sesiones.php";
include_once "funciones/validar_cuenta_suspendida.php";
include_once "funciones/validar_nuevo.php";
include_once "funciones/funciones.php";
include_once "templates/header.php";
include_once "templates/barra.php";
include_once "templates/navegacion.php";
?>
<style type="text/css">
  .custom-file-label::after {
    content: "Buscar";
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-sm-6">
          <h1>Registro de usuario</h1>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-12">
          <p>Formulario para la recopilación de datos del nuevo empleado</p>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <!-- form start -->
    <form name="primera_edicion" id="primera_edicion" method="post" action="modelo_usuario.php" enctype="multipart/form-data">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-user-circle"></i> Datos Personales</h3>
        </div>
        <!-- /.card-header -->


        <div class="card-body">
          <p>(*) Campo obligatorio</p>          
          <div class="form-group">
            <label for="nombre1">Primer nombre * <small>(Ingrese su primer nombre)</small></label>
            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Ej: Pedro">
          </div>
          <div class="form-group">
            <label for="nombre2">Segundo nombre * <small>(Ingrese su segundo nombre, en caso de no tenerlo marcar la casilla)</small></label>
            <div>
              <input type="checkbox" class="checkbox" id="cb_nombre2">
              <small>No tengo segundo nombre</small>
            </div>
            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Ej: José">
          </div>
          <div class="form-group">
            <label for="apellido1">Apellido paterno * <small>(Ingrese su apellido paterno)</small></label>
            <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Ej: Perez">
          </div>
          <div class="form-group">
            <label for="apellido2">Apellido materno <small>(Ingrese su apellido materno)</small></label>
            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Ej: Gonzalez">
          </div>
          <div class="form-group">
            <label for="fecha_nacimiento">Fecha de nacimiento * <small>(Ingrese su fecha de nacimiento según el formato indicado)</small></label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
          </div>
          <div class="form-group">
            <label for="genero">Género * <small>(Indique su género)</small></label>
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
            <label for="nacionalidad">Nacionalidad * <small>(Indique su nacionalidad, si no es "Chilena", seleccionar la opción "Otros" y escribir)</small></label>
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
            <label for="correo_adicional">Correo personal * <small>(Ingrese su dirección de correo electrónico personal)</small></label>
            <input type="email" class="form-control" id="correo_adicional" name="correo_adicional" placeholder="Ej: pperez@correo_ejemplo.com">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono * <small>(Ingrese su número de teléfono con el formato indicado, si desea agregar otro número más, marque la casilla)</small></label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">569</span>
              </div>
              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ej: 87654321">
            </div>
            <div>
              <input type="checkbox" class="checkbox" id="cb_telefono2">
              <small>Deseo añadir otro número de teléfono</small>
            </div>
            <div class="input-group mb-3" id="div_telefono2" style="display:none;">
              <div class="input-group-prepend">
                <span class="input-group-text">569</span>
              </div>
              <input type="text" class="form-control" id="telefono2" name="telefono2" placeholder="Ej: 87654321">
            </div>
          </div>
          <div class="form-group">
            <label for="direccion">Dirección * <small>(Ingrese su dirección particular: calle y número)</small></label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej: Calle Ejemplo 1234">
          </div>
          <div class="form-group">
            <label>Comuna * <small>(Indique su Comuna)</small></label>
            <select class="form-control" name="comuna">
              <option value=""></option>
              <option value="alto hospicio">Alto Hospicio</option>
              <option value="iquique">Iquique</option>
              <option value="camiña">Camiña</option>
              <option value="colchane">Colchane</option>
              <option value="huara">Huara</option>
              <option value="pica">Pica</option>
              <option value="pozo almonte">Pozo Almonte</option>
            </select>
          </div>
          <div class="form-group">
            <label for="foto">Fotografía para Credencial <small>(Adjuntar fotografía para credencial, en el formato que se indica, con fondo blanco o de color liso claro)</small></label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="foto" name="foto">
              <label class="custom-file-label" for="foto">Escoja el archivo</label>
            </div>
          </div>
          <div class="form-group">
            <label for="cedula">Copia Cédula de Identidad * <small>(Adjuntar copia de su cédula de identidad por ambos lados)</small></label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="cedula" name="cedula">
              <label class="custom-file-label" for="cedula">Escoja el archivo</label>
            </div>
          </div>
          <div class="form-group">
            <label for="cv">Currículum Vitae * <small>(Adjuntar Currículum Vitae Actualizado)</small></label>
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
            <label for="nombre1">Nombre contacto de emergencia * <small>(Ingrese nombre completo (nombres y apellidos) de su contacto de emergencia)</small></label>
            <input type="text" class="form-control" id="nombre_emergencia1" name="nombre_emergencia1" placeholder="Ej: Pedro">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono contacto de emergencia * <small>(Ingrese el número de teléfono con el formato indicado)</small></label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">569</span>
              </div>
              <input type="text" class="form-control" id="telefono_emergencia1" name="telefono_emergencia1" placeholder="Ej: 87654321">
            </div>
          </div>
          <div style="margin-bottom:0.5rem;">
            <input type="checkbox" class="checkbox" id="cb_emergencia2">
            <small>Deseo añadir otro contacto de emergencia</small>
          </div>
          <div id="div_emergencia2" style="display:none;">
            <div class="form-group">
              <label for="nombre1">Nombre contacto de emergencia 2* <small>(Ingrese nombre completo (nombres y apellidos) de su contacto de emergencia)</small></label>
              <input type="text" class="form-control" id="nombre_emergencia2" name="nombre_emergencia2" placeholder="Ej: Pedro">
            </div>
            <div class="form-group">
              <label for="telefono">Teléfono contacto de emergencia 2* <small>(Ingrese el número de teléfono con el formato indicado)</small></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">569</span>
                </div>
                <input type="text" class="form-control" id="telefono_emergencia2" name="telefono_emergencia2" placeholder="Ej: 87654321">
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
            <label>Nivel de Estudios (Pregrado) * <small>(Seleccione el nivel de estudios de su profesión u oficio)</small></label>
            <select class="form-control" name="nivel_pregrado">
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
            <label for="institucion_pregrado">Institución de Educación (Pregrado) * <small>(Ingrese nombre de Institución de Educación que otorgó el título)</small></label>
            <input type="text" class="form-control" id="institucion_pregrado" name="institucion_pregrado" placeholder="Ej: Universidad Ejemplo">
          </div>
          <div class="form-group">
            <label for="titulo_pregrado">Título (Pregrado) * <small>(Ingrese título otorgado (técnico, licenciado o profesional); debe ingresar el nombre exacto que figura en el certificado. Para el "Nivel Educación Media" ingrese: Licencia de enseñanza media)</small></label>
            <input type="text" class="form-control" id="titulo_pregrado" name="titulo_pregrado" placeholder="Ej: Licenciado en Matemática">
          </div>
          <div class="form-group">
            <label for="semestres_pregrado">Semestres (Pregrado) * <small>(Ingrese duración de su carrera en número de semestres. Para Licencia de enseñanza media, agregue el número 8)</small></label>
            <input type="number" class="form-control" id="semestres_pregrado" name="semestres_pregrado" placeholder="Ej: 8">
          </div>
          <div class="form-group">
            <label for="fecha_pregrado">Fecha de Título (Pregrado) * <small>(Ingrese fecha de otorgamiento del título o Licencia de enseñanza media)</small></label>
            <input type="date" class="form-control" id="fecha_pregrado" name="fecha_pregrado">
          </div>
          <div class="form-group">
            <label for="certificado_pregrado">Certificados Título formato digital (Pregrado) * <small>(Adjuntar copia digital del certificado de título declarado. Debe subir copia del documento original. Se autoriza adjuntar documentos con legalizaciones ante Notario, pero igualmente debe adjuntar el documento digital original)</small></label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="certificado_pregrado" name="certificado_pregrado">
              <label class="custom-file-label" for="certificado_pregrado">Escoja el archivo</label>
            </div>
          </div>
          <div style="margin-bottom:0.5rem;">
            <input type="checkbox" class="checkbox" id="cb_pregrado2">
            <small>Deseo añadir otro título de pregrado</small>
          </div>
          <div id="div_pregrado2" style="display:none;">
            <div class="form-group">
              <label>Nivel de Estudios (Pregrado) 2 * <small>(Seleccione el nivel de estudios de su profesión u oficio)</small></label>
              <select class="form-control" name="nivel_pregrado2">
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
              <label for="institucion_pregrado2">Institución de Educación (Pregrado) 2 * <small>(Ingrese nombre de Institución de Educación que otorgó el título)</small></label>
              <input type="text" class="form-control" id="institucion_pregrado2" name="institucion_pregrado2" placeholder="Ej: Universidad Ejemplo">
            </div>
            <div class="form-group">
              <label for="titulo_pregrado2">Título (Pregrado) 2 * <small>(Ingrese título otorgado (técnico, licenciado o profesional); debe ingresar el nombre exacto que figura en el certificado. Para el "Nivel Educación Media" ingrese: Licencia de enseñanza media)</small></label>
              <input type="text" class="form-control" id="titulo_pregrado2" name="titulo_pregrado2" placeholder="Ej: Licenciado en Matemática">
            </div>
            <div class="form-group">
              <label for="semestres_pregrado2">Semestres (Pregrado) 2* <small>(Ingrese duración de su carrera en número de semestres. Para Licencia de enseñanza media, agregue el número 8)</small></label>
              <input type="number" class="form-control" id="semestres_pregrado2" name="semestres_pregrado2" placeholder="Ej: 8">
            </div>
            <div class="form-group">
              <label for="fecha_pregrado2">Fecha de Título (Pregrado) 2 * <small>(Ingrese fecha de otorgamiento del título o Licencia de enseñanza media)</small></label>
              <input type="date" class="form-control" id="fecha_pregrado2" name="fecha_pregrado2">
            </div>
            <div class="form-group">
              <label for="certificado_pregrado2">Certificados Título formato digital (Pregrado) 2 * <small>(Adjuntar copia digital del certificado de título declarado. Debe subir copia del documento original. Se autoriza adjuntar documentos con legalizaciones ante Notario, pero igualmente debe adjuntar el documento digital original)</small></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="certificado_pregrado2" name="certificado_pregrado2">
                <label class="custom-file-label" for="certificado_pregrado2">Escoja el archivo</label>
              </div>
            </div>
          </div>
          <label>Estudios de Postgrado <small>(En caso de contar con postgrado, puede indicarlo en esta sección, de lo contrario, marcar la casilla)</small></label>
          <div style="margin-bottom:0.5rem;">
            <input type="checkbox" class="checkbox" id="cb_postgrado">
            <small>No dispongo de estudios de Postgrado</small>
          </div>
          <div id="div_postgrado">
            <div class="form-group">
              <label>Nivel de Estudios (Postgrado) * <small>(Seleccione el nivel de estudios de su postgrado)</small></label>
              <select class="form-control" name="nivel_postgrado">
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
              <label for="institucion_postgrado">Institución de Educación (Postgrado) * <small>(Ingrese nombre de Institución de Educación que otorgó el título)</small></label>
              <input type="text" class="form-control" id="institucion_postgrado" name="institucion_postgrado" placeholder="Ej: Universidad Ejemplo">
            </div>
            <div class="form-group">
              <label for="titulo_postgrado">Título (Postgrado) * <small>(Ingrese título otorgado; debe ingresar el nombre exacto que figura en el certificado)</small></label>
              <input type="text" class="form-control" id="titulo_postgrado" name="titulo_postgrado" placeholder="Ej: Doctor en Matemática">
            </div>
            <div class="form-group">
              <label for="semestres_postgrado">Semestres (Postgrado) * <small>(Ingrese duración de su carrera en número de semestres)</small></label>
              <input type="number" class="form-control" id="semestres_postgrado" name="semestres_postgrado" placeholder="Ej: 8">
            </div>
            <div class="form-group">
              <label for="fecha_postgrado">Fecha de Título (Postgrado) * <small>(Ingrese fecha de otorgamiento del título)</small></label>
              <input type="date" class="form-control" id="fecha_postgrado" name="fecha_postgrado">
            </div>
            <div class="form-group">
              <label for="certificado_postgrado">Certificados Título formato digital (Postgrado) * <small>(Adjuntar copia digital del certificado de título declarado. Debe subir copia del documento original. Se autoriza adjuntar documentos con legalizaciones ante Notario, pero igualmente debe adjuntar el documento digital original)</small></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="certificado_postgrado" name="certificado_postgrado">
                <label class="custom-file-label" for="certificado_postgrado">Escoja el archivo</label>
              </div>
            </div>
            <div style="margin-bottom:0.5rem;">
              <input type="checkbox" class="checkbox" id="cb_postgrado2">
              <small>Deseo añadir otro título de postgrado</small>
            </div>
          </div>
          <div id="div_postgrado2" style="display:none;">
            <div class="form-group">
              <label>Nivel de Estudios (Postgrado) 2 * <small>(Seleccione el nivel de estudios de su postgrado)</small></label>
              <select class="form-control" name="nivel_postgrado2">
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
              <label for="institucion_postgrado2">Institución de Educación (Postgrado) 2 * <small>(Ingrese nombre de Institución de Educación que otorgó el título)</small></label>
              <input type="text" class="form-control" id="institucion_postgrado2" name="institucion_postgrado2" placeholder="Ej: Universidad Ejemplo">
            </div>
            <div class="form-group">
              <label for="titulo_postgrado2">Título (Postgrado) 2 * <small>(Ingrese título otorgado; debe ingresar el nombre exacto que figura en el certificado)</small></label>
              <input type="text" class="form-control" id="titulo_postgrado2" name="titulo_postgrado2" placeholder="Ej: Doctor en Matemática">
            </div>
            <div class="form-group">
              <label for="semestres_postgrado2">Semestres (Postgrado) 2 * <small>(Ingrese duración de su carrera en número de semestres)</small></label>
              <input type="number" class="form-control" id="semestres_postgrado2" name="semestres_postgrado2" placeholder="Ej: 8">
            </div>
            <div class="form-group">
              <label for="fecha_postgrado2">Fecha de Título (Postgrado) 2 * <small>(Ingrese fecha de otorgamiento del título)</small></label>
              <input type="date" class="form-control" id="fecha_postgrado2" name="fecha_postgrado2">
            </div>
            <div class="form-group">
              <label for="certificado_postgrado2">Certificados Título formato digital (Postgrado) 2 * <small>(Adjuntar copia digital del certificado de título declarado. Debe subir copia del documento original. Se autoriza adjuntar documentos con legalizaciones ante Notario, pero igualmente debe adjuntar el documento digital original)</small></label>
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
            <label>Institución Bancaria * <small>(Seleccione la institución bancaria donde tiene su cuenta personal para el pago de sus servicios)</small></label>
            <select class="form-control" name="institucion_bancaria">
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
            <label>Tipo de Cuenta * <small>(Seleccione el tipo de cuenta donde se realizará el pago de sus servicios)</small></label>
            <select class="form-control" name="tipo_cuenta">
              <option value=""></option>
              <option value="Cuenta Corriente">Cuenta Corriente</option>
              <option value="Cuenta Vista">Cuenta Vista</option>
              <option value="Cuenta Rut">Cuenta Rut</option>
            </select>
          </div>
          <div class="form-group">
            <label for="numero_cuenta">Número de cuenta * <small>(Ingrese el número de cuenta. Recuerde ingresar solo números)</small></label>
            <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta" placeholder="Ej: 000123456789">
          </div>
        </div>
      </div>
      <!-- /.card-body -->


      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-key"></i> Contraseña</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="form-group">
            <label for="contrasena_actual">Contraseña actual</label>
            <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual" placeholder="Contraseña actual">
          </div>
          <div class="form-group">
            <label for="contrasena_nueva">Contraseña nueva</label>
            <input type="password" class="form-control" id="contrasena_nueva" name="contrasena_nueva" placeholder="Contraseña nueva">
          </div>
          <div class="form-group">
            <label for="contrasena_repetir">Repetir Contraseña</label>
            <input type="password" class="form-control" id="contrasena_repetir" name="contrasena_repetir" placeholder="Repetir Contraseña">
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-check-square"></i> DECLARACIÓN</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="form-group">
            <p>
              La información contenida en este formulario, así como en cualquiera de sus contenidos y documentación entregada, es confidencial y está dirigida exclusivamente al destinatario indicado. Cualquier uso, reproducción, divulgación o distribución por otras personas distintas de él está estrictamente prohibida.
            </p>
          </div>
          <div class="form-group">
            <label>DECLARACIÓN DEL FUNCIONARIO (A) *</label>
            <p>
              Doy fe que toda la información entregada en este formulario es verídica y los documentos enviados son copia fiel del original.
            </p>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="cb_declaracion" name="cb_declaracion">
              <label class="form-check-label" style="color:black !important;">Sí, acepto</label>
            </div>
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
          <input type="hidden" name="registro" value="primera_edicion">
          <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once "templates/footer.php"
?>
<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>