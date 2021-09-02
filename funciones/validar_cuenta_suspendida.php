<?php

if($_SESSION["cuenta_suspendida"] == 1){
    header("Location:cuenta_suspendida.php");
    exit();
}