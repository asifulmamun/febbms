<?php

/*
        Template Name: Details of Donor

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
$page_name = $site_name_short . ' - Dashboard';
require_once $tpl_global . 'header.php'; // header - config.php & conn.php included
?>

<!-- Redirecting to loginpage -->
<?php if($_SESSION['id'] < 1): ?>
    <script type="text/javascript">
        window.location.replace("./login.php");
    </script>
<?php endif; ?>

<!-- Heading -->
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <div class="site_heading">
            <?php echo $page_name; ?>
        </div>
    </div>
</div>

<div class="mdl-grid">

    <!-- Sidebar -->
    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
        <div class="sidebar">
            <nav class="dashboard_nav">
                <ul>
                    <li><a href="./dashboard.php?action=profile">Profile</a></li>
                    <li><a href="./dashboard.php?action=edit_profile">Edit Profile</a></li>
                    <li><a href="./dashboard.php?action=edit_password">Change Password</a></li>
                    <li><a href="//gravatar.com/connect/?source=_signup">Change Profile Picture</a></li>
                    <li><a href="./dashboard.php?action=certificate">Get Certificate</a></li>
                    <li><a href="./dashboard.php?action=certificate">Appointment with admin</a></li>
                </ul>
            </nav>
        </div>
    </div><!-- sidebar -->


    <!-- content -->
    <div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet mdl-cell--8-col-phone">
        <div id="content">

            <!-- Account Status -->
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
            <h4>
                <?php
                    if(get_user_info($_SESSION['id'], 'profileStatus') < 1){    
                        echo '<span style="color:red;font-weight:bold;text-decoration:underline;">Your Account have not Approved yet. Please contact with Administration.</span>';
                    }
                ?>
            </h4><!-- Account Status -->

            <?php if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'profile'): // Profile ?>
                <?php require_once $tpl . 'dashboard/profile.php'; ?>

            <?php elseif($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'edit_profile'): ?>
                <?php require_once $tpl . 'dashboard/edit_profile.php'; ?>
            <?php elseif($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'edit_profile_update'): ?>
                <?php require_once $tpl . 'dashboard/edit_profile_update.php'; ?>
              
            <?php elseif($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'edit_password'): ?>
                <?php require_once $tpl . 'dashboard/edit_password.php'; ?>
            <?php elseif($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'edit_password_update'): ?>
                <?php require_once $tpl . 'dashboard/edit_password_update.php'; ?>

            <?php else: ?>
            <?php require_once $tpl . 'dashboard/profile.php'; ?>
            <?php endif; // Profile ?>
        </div>
    </div><!-- content -->

</div><!-- .mdl-grid -->


<?php

/*
        - @ Don't change this section.
        - This is just web site footer
        - This footer is default file for this app.
    */
require_once $tpl_global . 'footer.php'; // footer included
?>