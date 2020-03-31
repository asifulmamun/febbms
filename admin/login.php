<?php session_start();
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Login'; // template name
    include $config . 'config.php';
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
</head>
<body class="bg-success">


<div class="container customzier">
    <div class="row justify-content-md-center">
        <!-- Heading -->
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="mt-4 text-center">
                <div class="border-bottom border-light"><h3 class="text-light"><?php echo $site_name; ?></h3></div>
                <h5 class="text-light pt-1 pb-4"><?php echo $site_description; ?></h5>
                <h6 id="notice" class="text-light bg-danger"></h6>
            </div>               
        </div>
        <!-- Login Form -->
        <div class="col-md-6 col-sm-10 col-xs-10 text-center py-5 px-5 bg-light border border-primary rounded">
            <form method="POST">
                <label class="sr-only" for="inlineFormInputGroup">Username or Mobile or Email</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                    <input name="ume" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username or Mobile or Email">
                </div>
                <label class="sr-only" for="inlineFormInputGroup">Password</label>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    </div>
                    <input name="pass" type="password" class="form-control" id="inlineFormInputGroup" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary"><small><i class="fas fa-fingerprint"></i></small> Submit</button>
            </form>
        </div> <!-- Login Form -->
    </div> <!-- row -->
</div>

<style>
    .customzier form{
        padding: 20px 0px;
    }
    .customzier{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>


    <!-- Jquery -->
    <script src="<?php echo $js; ?>jquery.min.js"></script>
    <!-- Proper JS -->
    <script src="<?php echo $js; ?>propper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo $js; ?>bootstrap.min.js"></script>
</body>   
</html>

<?php
    include $config . 'conn.php'; // db connection

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // User Info Matching
        $stmt = $conn->prepare("SELECT * FROM users WHERE username =? OR mobile=? OR email=?");
        $stmt->bind_param('sss', $ume, $ume, $ume);
        $ume = $_POST['ume']; // username or mobile or email
        $stmt->execute();
        $res = $stmt->get_result();
        if($res->num_rows === 0){
            // header('Location: login.php');
            // echo '<script>alert("UME not matched.")</script>';
        }
        // get assoc resutls
        $rows = $res->fetch_assoc();
        $username = $rows['username']; // Store Username
        $stmt->close(); // user

        // pass & username Matching
        $stmts = $conn->prepare("SELECT * FROM users WHERE username=? AND pass=?");
        $stmts->bind_param('ss', $username, $pass);
        $pass = sha1($_POST['pass']); // get pass and encrypted
        $stmts->execute();
        $ress = $stmts->get_result();
        if($ress->num_rows === 0){
            // session_destroy();
            // header( "refresh:3; url=login.php" ); 
            echo '<script>document.getElementById("notice").innerHTML = "<br>Username and Password not matched.<br><br>";</script>';
        }
        // get assoc results
        $row = $ress->fetch_assoc();

        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];
        echo $_SESSION['id'];
        echo $_SESSION['name'];
        echo $_SESSION['role'];
        header("Location: check.php");

        $stmts->close(); // pass
        // $conn->close(); // db connection closs
    }
?>