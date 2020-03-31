<?php session_start();

    // no logged redirect login page
    if(!isset($_SESSION['id'])){
        // redirecting dashboard
        header('Location: login.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $template_name; ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $css; ?>bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo $css; ?>all.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo $admin_css; ?>backend.css">

    <!-- Configaration -->
    <?php
        include $config . 'config.php';
    ?>
</head>
<body>

<div class="container-fluid">
<div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12 bg-dark">

        <!-- NAV -->
        <?php include 'nav.php'; ?>

    </div><!-- col-md-3 -->
    <div class="col-md-9 col-sm-12 col-xs-12">

        <!-- site name -->
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="mt-4 text-center">
                        <div class="border-bottom border-success"><h3><?php echo $site_name; ?></h3></div>
                        <h5 class="text-success pt-1"><?php echo $site_description; ?></h5>
                    </div>               
                </div>
            </div>
        </div>

