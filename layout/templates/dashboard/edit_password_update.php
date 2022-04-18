<?php

    /* Get data
    ---------------- */
    $id = $_SESSION['id'];
    $password = md5($_POST['pass']);
    $current_pass = md5($_POST['current_pass']);





    // pass_check - verify mobile and pass
    function pass_check(){
        global $conn, $id, $current_pass;

        // stmt
        $pass_check = $conn->prepare("SELECT `id`,`password` FROM `becomedonor` WHERE `id`=? AND `password`=?");
        $pass_check->bind_param('ss', $id, $current_pass);
        $pass_check->execute();

        $ress = $pass_check->get_result();
        if($ress->num_rows === 0){
            
            return false;
        } else{

            return true;
        }
    
        $pass_check->close(); // stmt close
    } // pass_check - verify mobile and pass

    if(pass_check() == false):
        echo "Current password doesn't matched.";
    else:

        /* Inserting Data
        ----------- */
        $sql_stmt = "UPDATE `becomedonor` SET `password` = ? WHERE `becomedonor`.`id` = ?";
        
        $stmt = $conn->prepare($sql_stmt);
        if ( false===$stmt ) {
            
            // die('prepare() failed: ' . htmlspecialchars($mysqli->error));
            echo 'Error, Please contact with Administration.';
        }

        $rc = $stmt->bind_param("si", $password, $id);
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
    <p>Update Failed.</p>
</div>
    <?php else: ?>

<!-- Success Message -->
<div class="messege_success">
    <p>Update successfully.</p>
</div>

<?php
        endif; // execute
        $stmt->close();
    endif;
?>