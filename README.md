Proyecto Intranet

Es un sistema personalizado que hice para el área administrativa de una institución académica y cuenta con las siguientes características:

• Se utiliza HTML, CSS, JAVASCRIPT, AJAX, JQUERY y PHP.
• Base de datos MYSQL.
• CRUD en la base de datos para los usuarios y los contenidos, esto se realiza con sentencias preparadas para evitar inyecciones SQL a la base de datos.
• Sesiones de usuario de manera segura utilizando contraseñas encriptadas.
• Perfiles de usuario y administrador, el administrador tiene acceso a todas las funcionalidades y páginas del sistema mientras que el usuario solo puede ver la información que le compete como usuario.
• Validación de campos en todos los formularios, cada campo dispone de reglas y ayudas para que se ingrese la información correcta.
• Recuperación de contraseña por si el usuario la olvidó.
• Envío automático de correos electrónicos, esto se utiliza para la creación de cuentas nuevas, notificaciones al administrador y olvido de contraseña.
• API de Google drive para almacenamiento de los archivos.
• Exportación de tabla usuarios a Excel


Credenciales:

RUT: 32.123.456-9
Contraseña: administrador

Instrucciones de uso:

bd_conexion.php: modificar las constantes para el acceso a la base de datos.

Ejemplo:

define('HOST', "localhost");
define('USER', "root");
define('PASS', "");
define('DB', "base_de_datos");

correo.php: modificar función mandar_correo().

Ejemplo:

$mail->Host       = 'smtp.correo.com';
$mail->Username   = 'mi_correo@correo.com';
$mail->Password   = 'contraseña1234';
$mail->setFrom('mi_correo@correo.com', 'Correo de prueba');

gdrive.php: modificar variables de clave y carpeta además de la variable file->setDescription() de la función subir_archivo().

Ejemplo:

$clave = "proyecto-123456-6630b4dne03d.json";
$id_carpeta = "2GoabzXaO033_XZKRN7zTsrGbkT4oi4Q9";
$file->setDescription("Archivo cargado desde PHP");

modelo_usuario.php: modificar todas las variables relacionadas con correos electrónicos en los casos “nuevo”, “primera edición” y “olvide_contraseña”.

Ejemplo:

$correo_admin = "admin@correo.com";
$link = "http://www.google.com";
$asunto = "Asunto";
$mensaje = "Mensaje";

Disclaimer (Descargo de responsabilidad):

Este sistema fue realizado por mí, utilizando como base un trabajo realizado en un curso de Juan Pablo de la Torre Valdez. Se utiliza la plantilla AdminLTE, además de diversos plugins de JQUERY y scripts de distintos autores.
