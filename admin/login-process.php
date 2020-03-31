<?php
    
    include 'init.php'; // initial file
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
            header( "refresh:3; url=login.php" ); 
            echo '<script>document.getElementById("notice").innerHTML = "<br>Username and Password not matched.<br><br>";</script>';
        }
        // get assoc results
        $row = $ress->fetch_assoc();
        // 
        @session_start();
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