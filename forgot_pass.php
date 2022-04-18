<?php

/*
        Template Name: Login Page

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
$page_name = $site_name_short . ' - Forgot Password';
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
        <div class="notice_msg notice_red">
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])):
                    
                    if($_POST['pass1'] == $_POST['pass2']){
                        $password = md5($_POST['pass1']);
                    } else{
                        echo 'Your entered new password did not matched. Try again&nbsp;<a href="./forgot_pass.php">recover</a>&nbsp;with email.';
                    }

                    $logged_user_info->update_table_column('becomedonor', 'password', $password, 'email', $_POST['email']);
                    $logged_user_info->update_table_column('becomedonor', 'token', NULL, 'email', $_POST['email']);
                    
                    echo 'You have successfully changed your password. Now You can&nbsp;<a href="./login.php">Login</a>&nbsp;to you account.';

                elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['recover_email']) && $logged_user_info->exist_data_0_1_single_column('id', 'becomedonor', 'email', $_POST['recover_email']) == 0):
                    // if mail not regisered
                    echo '<br><center>You are not registered as a donor please&nbsp;<a href="./become-donor.php">register</a>&nbsp;as a donor.</center><br><br><br>';

                elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['recover_email']) && $logged_user_info->exist_data_0_1_single_column('id', 'becomedonor', 'email', $_POST['recover_email']) == 1):
                    $recover_email = $_POST['recover_email'];
                    $token = rand(1,9999);
                    $token = md5($recover_email.$token);

                    // update token to recover mail
                    $logged_user_info->update_table_column('becomedonor', 'token', $token, 'email', $recover_email);

                    // recover link
                    $recover_url = $actual_link . $_SERVER['PHP_SELF'] . '?email=' . $recover_email . '&token=' . $token;

                    // for image view in mail
                    $mail_header_img_link = $actual_home_link . 'layout/assets/img/default/forgot_pass_header.gif';
                    $mail_logo_link = $actual_home_link . 'layout/assets/img/default/febbms-logo.png';


                    $mail_body = '<!DOCTYPE html><html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml"><head> <title></title> <meta charset="utf-8"/> <meta content="width=device-width,initial-scale=1" name="viewport"/><!--[if mso]> <xml> <o:OfficeDocumentSettings> <o:PixelsPerInch>96</o:PixelsPerInch> <o:AllowPNG/> </o:OfficeDocumentSettings> </xml><![endif]--> <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/> <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/> <style>*{box-sizing: border-box}th.column{padding: 0}a[x-apple-data-detectors]{color: inherit !important; text-decoration: inherit !important}#MessageViewBody a{color: inherit; text-decoration: none}p{line-height: inherit}@media (max-width:620px){.icons-inner{text-align: center}.icons-inner td{margin: 0 auto}.row-content{width: 100% !important}.image_block img.big{width: auto !important}.stack .column{width: 100%; display: block}}</style></head><body style="background-color:#d9dffa;margin:0;padding:0;-webkit-text-size-adjust:none;text-size-adjust:none"> <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#d9dffa" width="100%"> <tbody> <tr> <td> <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#cfd6f4" width="100%"> <tbody> <tr> <td> <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="600"> <tbody> <tr> <th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="100%"> <table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"> <tr> <td style="width:100%;padding-right:0;padding-left:0;padding-top:20px"> <div align="center" style="line-height:10px"><img alt="Header Image" class="big" src="' . $mail_header_img_link . '" style="display:block;height:auto;border:0;width:600px;max-width:100%" title="Card Header with Border and Shadow Animated" width="600"/></div></td></tr></table> </th> </tr></tbody> </table> </td></tr></tbody> </table> <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#d9dffa;background-position:top center;background-repeat:repeat" width="100%"> <tbody> <tr> <td> <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="600"> <tbody> <tr> <th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-left:50px;padding-right:50px" width="100%"> <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"> <tr> <td style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:25px"> <div style="font-family:sans-serif"> <div style="font-size:14px;color:#506bec;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"> <p style="margin:0;font-size:14px"><span style="font-size:24px"><strong><span style="">Forgot your password?</span></strong></span> </p></div></div></td></tr></table> <table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"> <tr> <td> <div style="font-family:sans-serif"> <div style="font-size:14px;color:#40507a;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"> <p style="margin:0;font-size:14px"><span style="font-size:14px">Hey, we received a request to reset your password.</span> </p></div></div></td></tr></table> <table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"> <tr> <td> <div style="font-family:sans-serif"> <div style="font-size:14px;color:#40507a;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"> <p style="margin:0;font-size:14px"><span style="font-size:14px">Lets get you a new one!</span></p></div></div></td></tr></table> <table border="0" cellpadding="0" cellspacing="0" class="button_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"> <tr> <td style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:20px"><!--[if gte mso 12]> <style>div.btnw{display: block !important}</style> <div class="btnw" style="display:none"> <a:roundrect xmlns:a="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="' . $recover_url . '" style="v-text-anchor:middle;width:195px;height:48px;" arcsize="34%" stroke="false" fillcolor="#506bec"> <w:anchorlock/> <v:textbox inset="5px,0px,0px,0px"> <center style="font-family:sans-serif;color:#ffffff;font-size: 14px;"><span style="font-size:14px;line-height:28px;"><strong>Recover Password</strong></span></center> </v:textbox> </a:roundrect> </div><![endif]--> <a href="' . $recover_url . '" style="background-color:#506bec;border-bottom:0 solid TRANSPARENT;border-left:0 solid TRANSPARENT;border-radius:16px;border-right:0 solid TRANSPARENT;border-top:0 solid TRANSPARENT;color:#fff;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;letter-spacing:normal;line-height:200%;width:auto;display:inline-block;text-align:center;text-decoration:none"> <div style="padding-top:8px;padding-right:20px;padding-bottom:8px;padding-left:25px"> <div style="font-size:12px;line-height:24px"> <p style="margin:0;font-size:16px;line-height:32px"> <span style="font-size:14px;line-height:28px"><strong>Recover Password</strong></span> </p></div></div></a> </td></tr></table> <table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"> <tr> <td> <div style="font-family:sans-serif"> <div style="font-size:14px;color:#40507a;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"> <p style="margin:0;font-size:14px"><span style="font-size:14px">If button not working please copy this link and paste your browser then go to this link. Link:<br/><br/><u>' . $recover_url . '</u></span></p></div></div></td></tr></table> <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"> <tr> <td style="padding-bottom:25px;padding-left:10px;padding-right:10px;padding-top:10px"> <div style="font-family:sans-serif"> <div style="font-size:14px;color:#40507a;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"> <p style="margin:0;font-size:14px">Did not request a password reset? You can ignore this message.</p></div></div></td></tr></table> </th> </tr></tbody> </table> </td></tr></tbody> </table> <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"> <tbody> <tr> <td> <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="600"> <tbody> <tr> <th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-left:10px;padding-right:10px" width="100%"> <table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"> <tr> <td style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px;width:100%"> <div align="center" style="line-height:10px"><a href="//github.com/asifulmamun/febbms" style="outline:0" tabindex="-1" target="_blank"><img alt="FEBBMS Logo" src="' . $mail_logo_link . '" style="display:block;height:auto;border:0;width:145px;max-width:100%" title="Your Logo" width="145"/></a><br/>Developed by <a href="//asifulmamun.info">@asifulmamun - Al Mamun</a></div></td></tr></table> </th> </tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table></body></html>';


                    // Mail Sending
                    require_once $config . 'mail.php';
                    // push_mail($sender_mail, $sender_name, $receiver_mail, $receiver_name, $mail_subject, $body, $success_message);
                    push_mail($sender_mail, $site_name_short, $recover_email, 'User', 'Recover Password', $mail_body, 'Check your email for reset password.');
                        
                endif; // if request - post method
            ?>
        </div>
    </div>
</div>

<?php 
    // Get Method
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['email']) && isset($_GET['token'])):

        // token and mail Auth: 0/1 then Change Password
        if($logged_user_info->exist_data_0_1_two_column('id', 'becomedonor', 'email', $_GET['email'], 'token', $_GET['token']) == 1):
?>

<main id="login">
    <form action="./forgot_pass.php" method="POST" name="login_form" id="login_form">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="email" value="<?php echo $_GET['email']; ?>" class="mdl-textfield__input" type="email" id="email">
            <label class="mdl-textfield__label" for="email">Enter Your Email *</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="pass1" class="mdl-textfield__input" type="password" id="pass1">
            <label class="mdl-textfield__label" for="pass1">New Password *</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="pass2" class="mdl-textfield__input" type="password" id="pass2">
            <label class="mdl-textfield__label" for="pass2">Retype New Password *</label>
        </div>
        <button type="submit" id="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Recover</button>
    </form>
    <a class="text_center" href="./login.php">Login</a>
</main>

<?php
        else:
            echo '<br><center>Wrong token, Try again for&nbsp;<a href="./forgot_pass.php">recover</a>&nbsp;your password with email.</center><br><br><br>';
  
        endif; // token and mail Auth: 0/1 then Change Password
    elseif($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['email']) && !isset($_GET['token'])):
?>
<main id="login">
    <form action="./forgot_pass.php" method="POST" name="login_form" id="login_form">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="recover_email" class="mdl-textfield__input" type="recover_email" id="ume">
            <label class="mdl-textfield__label" for="recover_email">Enter You Email *</label>
        </div>
        <button type="submit" id="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Recover</button>
    </form>
    <a class="text_center" href="./login.php">Login</a>
</main>
<?php 
    endif;
?>


<?php

/*
        - @ Don't change this section.
        - This is just web site footer
        - This footer is default file for this app.
    */
require_once $tpl_global . 'footer.php'; // footer included
?>