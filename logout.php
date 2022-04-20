<?php

session_start();
$_SESSION['id'] = "";

if($_SESSION['id'] == ""){
    session_destroy();
    // header('Location: ./dashboard.php');
    echo '<script>history.go(-1);</script>';
    exit;
}
?>