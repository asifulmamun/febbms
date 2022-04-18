<?php
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        // session isn't started
        session_start();
    }

    /* Linkup DIR Header.php included
    ---------------- */
    $tpl_global = './layout/templates/global/'; // template dir
    $tpl = './layout/templates/'; // template dir
    $css = './layout/assets/css/'; // template dir
    $css_extension = '.css';
    $js = './layout/assets/js/'; // template dir
    $img = './layout/assets/img/'; // template dir
    $config = './configuration/';

    /* Constant
    ----------- */
    $template_name = NULL; // don't touch
    $page_name = NULL; // don't touch
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";


    /*  @ Information
        @ You can change any value from her no effect to side.
        # Don't change the variable name just you can change only value from below.
    -------------- */

    // - Can Change with your project
    $actual_home_link = $actual_link . ''; // This is actually for external visit not for internal work - if installed sub directory eamplple $actual_home_link = $actual_link . '/febbms/';
    $site_name_short = 'FEBBMS';
    $site_name = 'February Blood Management System';
    $site_description = 'Donate Blood | Save Life';
    $logo_link = '';


    /*
        @ Menu List
        @ You can change link and Menu Name
        @ Also you can add more array (associative) form here.
    --------------------------------------- */
    $main_menu = array('Home' => './');

    // Customize menu here
    $main_menu['Need Blood?'] = './request-blood.php';
    $main_menu['Search Blood'] = './search.php';
    $main_menu['Contact'] = './page/contact.php';

    /*  # Account Menu
        - Don't Touch here
    ---------------------- */
    if($_SESSION['id'] == 0):
        $main_menu['Registration'] = './become-donor.php';
        $main_menu['Login'] = './login.php';

    else:
        $main_menu['My Account'] = './dashboard.php';
        $main_menu['Log Out'] = './logout.php';
    endif;
    
?>