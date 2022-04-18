<?php

session_start();
$_SESSION['id'] = "";

if($_SESSION['id'] == ""){
    session_destroy();
    header('Location: ./dashboard.php');
    exit;
}
?>