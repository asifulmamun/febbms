<?php
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Details & Edit Page'; // template name
    include $tpl . 'header.php'; // header included
    include $config . 'conn.php'; // db connection
?>

<!-- Backend Work -->
<?php
    // check request method if not post nothing
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        die('<script type="text/javascript">window.location.replace("dashboard.php");</script>');
    }
        
    if(isset($_POST['do']) AND $_POST['do'] == 'donor'){

        // if empty name and mobile field give notice
        if(empty($_POST['name']) OR empty($_POST['mobile'])){
            die('<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">Please fill up your Name and Mobile Number.</div></div><div class="col-1"></div></div></div><script>alert("Please fill up your Name and Mobile Number.");</script><script src="https://wowjs.uk/dist/wow.min.js"></script><script>new WOW().init();</script>');
        }else{
            // Password Verify if not matched give notice
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            if($password1 != $password2){
                die('<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">Password does not matched.<br>Try Again.</div></div><div class="col-1"></div></div></div><script>alert("Password does not matched, try again.");</script><script src="https://wowjs.uk/dist/wow.min.js"></script><script>new WOW().init();</script>');
            }

        
            // Get data from form and set value in a variable
            $id = $_POST['id'];
            $name = $_POST['name'];
            $bloodGroup = $_POST['bloodGroup'];
            $mobile = $_POST['mobile'];
            $password = MD5($password1);
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $address = $_POST['address'];
            $socialUrl = $_POST['socialUrl'];
            $gender = $_POST['gender'];  


            // Update Data
            $stmt = $conn->prepare("UPDATE `becomedonor` SET `profileStatus` = '1', `name` = '$name', `bloodGroup` = '$bloodGroup', `mobile` = '$mobile', `password` = '$password', `email` = '$email', `dob` = '$dob', `address` = '$address', `socialUrl` = '$socialUrl', `gender` = '$gender' WHERE `becomedonor`.`id` = '$id'");
            $stmt->execute(); // stmt executed
            
            // Register Successful Notice
            echo '<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">Edit Profile Update Successful.</div></div><div class="col-1"></div></div></div> <script>alert("Edit Profile Update Successful.");</script> <script src="https://wowjs.uk/dist/wow.min.js"></script> <script>new WOW().init();</script>';
            
            $stmt->close();
            $conn->close();
        } // empty name and mobile
    } // isset
?> <!-- Backend Work -->


<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>
