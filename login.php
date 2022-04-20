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
$page_name = $site_name_short . ' - Login Page';
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

<?php
// for facebook login in future
if(file_exists('./login-facebook.php')):
    require_once './login-facebook.php';
endif;

?>

<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <div class="notice_msg notice_red">
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'):

                    /* Declared Variable
                    ---------- */
                    $ume = $_POST['ume']; // username/mobile/email
                    $pass = md5($_POST['pass']); // get pass and encrypteds
                    
                    // m_check - verify mobile and pass
                    function m_check(){
                        global $conn, $ume, $pass;
            
                        // stmt
                        $m_check = $conn->prepare("SELECT `mobile`,`password` FROM `becomedonor` WHERE `mobile`=? AND `password`=?");
                        $m_check->bind_param('ss', $ume, $pass);
                        $m_check->execute();

                        $ress = $m_check->get_result();
                        if($ress->num_rows === 0){
                            
                            return false;
                        } else{

                            return true;
                        }
                    
                        $m_check->close(); // stmt close
                    } // m_check - verify mobile and pass

                    // e_check - verify mobile and pass
                    function e_check(){
                        global $conn, $ume, $pass;
                
                        // stmt
                        $e_check = $conn->prepare("SELECT `email`,`password` FROM `becomedonor` WHERE `email`=? AND `password`=?");
                        $e_check->bind_param('ss', $ume, $pass);
                        $e_check->execute();

                        $ress = $e_check->get_result();
                        if($ress->num_rows === 0){
                            
                            return false;
                        } else{

                            return true;
                        }
                    
                        $e_check->close(); // stmt close
                    } // e_check - verify mobile and pass


                    /* User Info Matching
                    --------------------- */
                    $ume_check = $conn->prepare("SELECT * FROM becomedonor WHERE mobile=? OR email=?");
                    $ume_check->bind_param('ss', $ume, $ume);
                    $ume_check->execute();
                    $ume_result = $ume_check->get_result();
                    
                    // UME Check
                    if($ume_result->num_rows === 0):
                        echo 'Your are not registered member. Please first register as Become A Donor.';
                    else:

                        // UME Verify with password
                        if(m_check() == true || e_check() == true):
                            
                            // echo 'Login Success.';
                            $row = $ume_result->fetch_assoc();
                            
                            class Manager_info{
                                // check user exist or not and get role
                                public function exist_user($tablename, $donor_id){
                                    global $conn;
                            
                                    // Getting Result
                                    $req_data = $conn->prepare("SELECT `donor_id`, `role` FROM $tablename WHERE `donor_id` = ?");
                                    $req_data->bind_param('i', $donor_id);
                                    $req_data->execute();
                                    $result = $req_data->get_result();
                            
                                    return $result->num_rows; // results how many rows in table
                            
                                    $req_data->close(); // Getting Data
                                }
                            }
                            $managed_info = new Manager_info;
                            
                            /* session creating
                            ----------- */
                            if($managed_info->exist_user('users', $row['id']) > 0):

                                // donor id, role added to session
                                $_SESSION['id'] = $row['id'];
                                $_SESSION['role'] = $managed_info->exist_user('users', $row['id']);
                            
                                // if session create then go to admin panel
                                if($_SESSION['id']):
                                    header('Location: ./admin');
                                    echo '<script>window.location.href = "./admin";</script>';
                                    exit;
                                endif;
                            else:

                                // only donor session
                                $_SESSION['id'] = $row['id'];
                                $_SESSION['role'] = 0;

                                // if session create then go to dashboard
                                if($_SESSION['id']):
                                    // header('Location: ./dashboard.php');
                                    echo '<script>history.go(-2);</script>';
                                    exit;
                                endif;

                            endif; // session creating

                            
                        else:

                            echo 'Username & Password Not matched.';
                        endif; // UME Verify with password

                    endif; // UME Check
                    $ume_check->close(); // UME Check Statement Close
                endif; // if request - post method
            ?>
        </div>
    </div>
</div>

<main id="login">
    <form action="./login.php" method="POST" name="login_form" id="login_form">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="ume" class="mdl-textfield__input" type="text" id="ume">
            <label class="mdl-textfield__label" for="ume">Mobile or Email *</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="pass" class="mdl-textfield__input" type="password" id="pass" autocomplete="on">
            <label class="mdl-textfield__label" for="pass">Enter Password *</label>
        </div>
        <button type="submit" id="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Log In</button>
    </form>
    <a class="text_center" href="./forgot_pass.php">Forgot Password?</a>
</main>

<style>
    .text_center{
        display: block;
        margin: 0 auto;
        text-decoration: none;
        margin-top: 1rem;
    }
</style>
<?php

/*
        - @ Don't change this section.
        - This is just web site footer
        - This footer is default file for this app.
    */
require_once $tpl_global . 'footer.php'; // footer included
?>