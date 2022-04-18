<?php
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        // session isn't started
        session_start();
    }

    /*  - Dir Information
        @ Don't touch here
    ------------- */
    $tpl = './templates/';
    $tpl_global = './templates/global/';
    $tpl_img_default = './../layout/assets/img/default/';

    $tpl_config = './config/';


    /* Permission Manager
    --------------------- */
    require_once $tpl_config . 'permission.php';
?>