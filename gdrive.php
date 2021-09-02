<?php

include "api-google/vendor/autoload.php";

$clave = "proyecto.json";
$id_carpeta = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";

putenv("GOOGLE_APPLICATION_CREDENTIALS=".$clave);

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->SetScopes(["https://www.googleapis.com/auth/drive.file"]);

$service = new Google_Service_Drive($client);

function subir_archivo($file_path, $file_name){
    try{
        global $service;
        global $id_carpeta;
        $file = new Google_Service_Drive_DriveFile();
        $file->setName($file_name);
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $file_path);
        $file->setParents(array($id_carpeta));
        $file->setDescription("Archivo cargado desde proyecto_intranet");
        $file->setMimeType($mime_type);
        $resultado = $service->files->create(
            $file,
            array(
                "data" => file_get_contents($file_path),
                "mimeType" => $mime_type,
                "uploadType" => "media"
            )
        );        
        
        return $resultado->id;

    }catch(Google_Service_Exception $gs){

        $mensaje = json_decode($gs->getMessage());
        echo $mensaje->error->message();

    } catch(Exception $e){

        echo $e->getMessage();
    }
}

function borrar_archivo($fileId) {
    global $service;
    try {
      $service->files->delete($fileId);
    } catch (Exception $e) {
      print "An error occurred: " . $e->getMessage();
    }
  }
   
function link_archivo($id){    
    $link = '<a href="https://drive.google.com/file/d/' . $id . '/view" target="_blank">Ver archivo</a>';
    return $link;
}

function nombre_archivo($_path, $nombre){
    $path = $_path;
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $nombre_archivo = $nombre.".".$ext;
    return $nombre_archivo;
}