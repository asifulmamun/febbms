<?php session_start();

    if(isset($_GET['do']) AND $_GET['do'] == 'logout'){
        session_destroy();
        die('<script type="text/javascript">window.location.replace("login.php");</script>');
    }else{
        die('<script type="text/javascript">window.location.replace("login.php");</script>');
    }

?>