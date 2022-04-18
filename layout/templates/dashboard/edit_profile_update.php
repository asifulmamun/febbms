<?php


    /* Get data
    ---------------- */
    $id = $_SESSION['id'];
    $name =  $_POST['name'];
    $bloodGroup =  $_POST['bloodGroup'];

    // Last dae of donae - No required
    if(!empty($_POST['lastDateOfDonate'])){
        $lastDateOfDonate =  $_POST['lastDateOfDonate'];
    }else{
        $lastDateOfDonate =  null;
    }

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
    $sql_stmt = "UPDATE `becomedonor` SET 
        `name` = ?, 
        `bloodGroup` = ?, 
        `lastDateOfDonate` = ?,  
        `dob` = ?, 
        `district` = ?, 
        `address` = ?, 
        `socialUrl` = ?, 
        `gender` = ? 
    WHERE `becomedonor`.`id` = ?";
    
    $stmt = $conn->prepare($sql_stmt);
    if ( false===$stmt ) {
        
        // die('prepare() failed: ' . htmlspecialchars($mysqli->error));
        echo 'Error, Please contact with Administration.';
    }

    $rc = $stmt->bind_param("ssssssssi", $name, $bloodGroup, $lastDateOfDonate, $dob, $district, $address, $socialUrl, $gender, $id);
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
    <p>Update failed.</p>
</div>
<?php else: ?>

<!-- Success Message -->
<div class="messege_success">
    <p>Update successfully.</p>
</div>

<?php
    endif;
    $stmt->close();
?>