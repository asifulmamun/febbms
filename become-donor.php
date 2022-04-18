<?php

    /*
        Template Name: Become Donor

        - # Do not change in this section.
        - There is initital file (All global information and site meta information come from here).
            @ All of global information of site come from here.
            @ You can go to init file and change this any data but don't touch this section.
            @ Do not change any data if you have not experience or understable knowledge.
            @ If you know or if you exist knoledge how to change you can change, but have a suggestion from me: Please try to with documentation.
        - # template name don't touch here.
        - # header includ, don't touch here.
    */
    require_once './init.php'; // initital file
    $template_name = basename(__FILE__, '.php'); // template name
    $page_name = $site_name_short . ' - Become Donor';
    require_once $tpl_global . 'header.php'; // header - config.php & conn.php included

    if($_SESSION['id']){
        header('Location: ./dashboard.php');
        exit;
    }
?>

<!-- Heading -->
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <div class="site_heading">
            <?php echo $page_name; ?>
        </div>
    </div>
</div>

<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                /* 
                    - Template for Who need blood or request lists
                    - If POST method or filled up Form
                    - # Don't touch here
                */
                require_once $tpl . 'become-donor/data.php';
            }else{
                /* 
                    - Template for Who need blood or request lists
                    - If GET method or regular visit
                    - # Don't touch here
                */
                require_once $tpl . 'become-donor/content.php';
            }

        ?>
    </div>
</div>

<?php

    /*
        - @ Don't change this section.
        - This is just web site footer
        - This footer is default file for this app.
    */
    require_once $tpl_global . 'footer.php'; // footer included
?>