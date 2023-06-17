<?php
session_start();

if(!isset($_SESSION['iduser'])){
    header("refresh:3;url=login.php");
    echo "<h1>Silahkan login/masuk </h1>";
    die();
}
?>