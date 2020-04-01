<?php
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Dashboard'; // template name
    include $tpl . 'header.php'; // header included
    include $config . 'conn.php'; // db connection
?>

<div class="row text-center">
<div class="col-md-10 pt-5">
    <a class="btn btn-success" href="?do=req&by=name">Request Search By Name</a>
    <a class="btn btn-success" href="?do=req&by=mobile">Request Search By Mobile</a>
</div>
<div class="col-md-10 pt-5">
    <a class="btn btn-success" href="?do=donor&by=name">Donor Search By Name</a>
    <a class="btn btn-success" href="?do=donor&by=mobile">Donor Search By Mobile</a>
    <a class="btn btn-success" href="?do=donor&by=email">Donor Search By E-mail</a>
</div>
</div>


<?php
    // search box show
    if(isset($_GET['do']) AND isset($_GET['by'])){
        
        if($_GET['do'] == 'req' AND $_GET['by'] == 'name'){
            include $tpl . 'search-req-name.php';
        }

        elseif($_GET['do'] == 'req' AND $_GET['by'] == 'mobile'){
            include $tpl . 'search-req-mobile.php';
        }

        elseif($_GET['do'] == 'donor' AND $_GET['by'] == 'name'){
            include $tpl . 'search-donor-name.php';
        }

        elseif($_GET['do'] == 'donor' AND $_GET['by'] == 'mobile'){
            include $tpl . 'search-donor-mobile.php';
        }

        elseif($_GET['do'] == 'donor' AND $_GET['by'] == 'email'){
            include $tpl . 'search-donor-email.php';
        }     
    } // search box show


?>





<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>