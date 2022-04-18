<?php

    /* Get from form
    ---------------- */
    $name =  $_POST['name'];
    $bloodGroup =  $_POST['bloodGroup'];
    $mobile =  $_POST['mobile'];
    // Reqired bag of blood
    if(!empty($_POST['blooddonatelastdate'])){
        $blooddonatelastdate =  $_POST['blooddonatelastdate'];
    }else{
        $blooddonatelastdate =  null;
    }
    $requiredonatebag = $_POST['requiredonatebag'];
    $district =  $_POST['district'];
    $hospitalandaddress =  $_POST['hospitalandaddress'];
    // Social Url - No Required
    if(!empty($_POST['socialUrl'])){
        $socialUrl =  $_POST['socialUrl'];
    }else{
        $socialUrl =  null;
    }
    $gender =  $_POST['gender'];


    /* Inserting Data
    ----------- */
    $sql_stmt = "INSERT INTO `requestblood` (`name`, `bloodGroup`, `mobile`, `blooddonatelastdate`, `requiredonatebag`, `district`, `hospitalandaddress`, `socialUrl`, `gender`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_stmt);
    if ( false===$stmt ) {
        
        // die('prepare() failed: ' . htmlspecialchars($mysqli->error));
        echo 'Error, Please contact with Administration.';
    }

    $rc = $stmt->bind_param("sssssssss", $name, $bloodGroup, $mobile, $blooddonatelastdate, $requiredonatebag, $district, $hospitalandaddress, $socialUrl, $gender);
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
    <p>Request Submitted.</p>
</div>

<?php
    endif;
    $stmt->close();
?>