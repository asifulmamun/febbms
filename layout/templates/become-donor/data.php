<?php

    /* Get from form
    ---------------- */
    $name =  $_POST['name'];
    $bloodGroup =  $_POST['bloodGroup'];
    $mobile =  $_POST['mobile'];

    // Last dae of donae - No required
    if(!empty($_POST['lastDateOfDonate'])){
        $lastDateOfDonate =  $_POST['lastDateOfDonate'];
    }else{
        $lastDateOfDonate =  null;
    }

    // Password
    $pass =  $_POST['pass'];
    $repass =  $_POST['repass'];
    if($pass == $repass){
        $password = md5($pass);
    }else{
        $password = null;
    }

    $email =  $_POST['email'];

    // Date of birth - No required
    if(!empty($_POST['dob'])){
        $dob =  $_POST['dob'];
    }else{
        $dob =  null;
    }

    $district =  $_POST['district'];
    $address =  $_POST['address'];

    // Social Url - No Required
    if(!empty($_POST['socialUrl'])){
        $socialUrl =  $_POST['socialUrl'];
    }else{
        $socialUrl =  null;
    }
    $gender =  $_POST['gender'];


    /* Inserting Data
    ----------- */
    $sql_stmt = "INSERT INTO `becomedonor` (`name`, `bloodGroup`, `mobile`, `lastDateOfDonate`, `password`, `email`, `dob`, `district`, `address`, `socialUrl`, `gender`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_stmt);
    if ( false===$stmt ) {
        
        // die('prepare() failed: ' . htmlspecialchars($mysqli->error));
        echo 'Error, Please contact with Administration.';
    }

    $rc = $stmt->bind_param("sssssssssss", $name, $bloodGroup, $mobile, $lastDateOfDonate, $password, $email, $dob, $district, $address, $socialUrl, $gender);
    if ( false===$rc ) {

        // die('bind_param() failed: ' . htmlspecialchars($stmt->error));
        echo 'Error, Please contact with Administration.';
    }

    $rc = $stmt->execute();
    if ( false===$rc ):
    // die('execute() failed: ' . htmlspecialchars($stmt->error));
?>

<!-- Error Messege -->
<div class="messege_error">
    <p>This mobile number already registered.</p>
</div>
<?php else: ?>

<!-- Success Message -->
<div class="messege_success">
    <p>You have successfully registered. Please login again.</p>
</div>

<?php
    endif;
    $stmt->close();
?>