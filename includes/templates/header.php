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
    <link rel="stylesheet" href="<?php echo $css; ?>backend.css">

    <!-- Configaration -->
    <?php
        include $config . 'config.php';
    ?>
</head>
<body>

    <!-- NAV -->
    <?php include 'nav.php'; ?>

    <!-- site name -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 offset-md-2">
                <div class="mt-5 text-center">
                    <div class="border-bottom border-success"><h1><?php echo $site_name; ?></h1></div>
                    <h3 class="text-success pt-1"><?php echo $site_description; ?></h3>
                </div>               
            </div>
        </div>
    </div>
