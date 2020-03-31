<?php
    session_start();

    // log out
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['do'])){
           if($_GET['do'] == "logout"){
            session_destroy();
            } 
        }
    }else{
        header('Location: dashboard.php');
    }
    
    // if not isset ID not logged and redirect to login page
    if(!isset($_SESSION['id'])){
         // dashboard Redirect
        header('Location: dashboard.php');
    }else{
        header('Location: dashboard.php');
    }
    
   


?>