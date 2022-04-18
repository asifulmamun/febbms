<?php

    // !no registered member
    if(!$_SESSION['id']):

        echo '<script type="text/javascript">alert("You are not registered user");</script>';
        echo '<script type="text/javascript">window.location.replace("./../login.php");</script>';
    else:
        // !no admin access
        if($_SESSION['id'] > 0 && $_SESSION['role'] < 1):      

            echo '<script type="text/javascript">alert("Access denied..! go to dashboard.");</script>';
            echo '<script type="text/javascript">window.location.replace("./../login.php");</script>';
        endif;
    endif;