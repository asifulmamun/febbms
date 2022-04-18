<?php

/* 
        - # Don't change or touch to here.
        - All Configration file also come from here.
        - Data come from database but information login come from here.
        - Any data gethering/retrive or all of functionality come from here.
    */
require_once $config . 'config.php';
require_once $config . 'conn.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_name; ?></title>

    <?php
        // facebook Business Verify 
        if($facebook_business_domain_verify){
            echo $facebook_business_domain_verify;
        }
    
    ?>

    <!-- css -->
    <link rel="stylesheet" href="<?php echo style($template_name); ?>">
    <link rel="shortcut icon" href="#">
</head>

<body>
    <!-- Uses a header that scrolls with the text, rather than staying locked at the top -->
    <div class="mdl-layout mdl-js-layout">
        
        <?php require $tpl_global . 'nav.php'; // Navigation/Main Menu ?>
        
        <main class="mdl-layout__content">
            <!-- page content -->
            <div class="page-content">