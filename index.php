<?php

    /*
        Author: Al Mamun
        Author Username: asifulmamun
        Contact: https://github.com/asifulmamun

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
    $page_name = $site_name_short . ' - Home Page';
    require_once $tpl_global . 'header.php'; // header - config.php & conn.php included
?>

<?php
    /* 
        - Added slider to here from global template
        - # Don't touch here
    */
    require_once $tpl_global . 'slider.php';
?>

<?php
if(isset($_SESSION['id'])):
    if($logged_user_info->table_column('profileStatus', 'becomedonor', $_SESSION['id']) == 0): // if not active user
    
?>
<div id="logged_user_notice" class="mdl-color--teal mdl-color-text--white">
    <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div><br>
    <span>Your Account is now <b>pending</b>.<br>Please <a class="font_color" href="./page/contact.php">contact</a> with admin for approved.</span>
</div>
<?php
    endif; // if not active user
endif;  // session exist

?>


<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet mdl-cell--12-col-phone">
        <?php
            /* 
                - Template for Who need blood or request lists
                - # Don't touch here
            */
            require_once $tpl . 'index/request_blood.php';
        ?>
  </div>
  <div class="mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet mdl-cell--12-col-phone">
    <?php
        /* 
            - Template for who donate blood or donor lists
            - # Don't touch here
        */
        require_once $tpl . 'index/donor_blood.php';
    ?>
  </div>
  <div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
    <?php
        /* 
            - Template for latest notice/news etc
            - # Don't touch here
        */
        require_once $tpl . 'index/update_blood.php';
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