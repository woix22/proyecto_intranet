<?php
$pagina = basename($_SERVER['PHP_SELF']);

if($pagina != "usuario_nuevo.php" and $_SESSION["validado"] == "0"){
    header("Location:usuario_nuevo.php");
    exit();
}

if($pagina == "usuario_nuevo.php" and $_SESSION["validado"] == "1"){
    header("Location:error.php");
    exit();
}