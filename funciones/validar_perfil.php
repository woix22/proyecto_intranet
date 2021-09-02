<?php
if($_SESSION["perfil"] == "Usuario"){
    header("Location:error.php");
    exit();
}

