<?php

    /* 
        # This is process page of Request Blood
    */
    require_once './init.php'; // initital file


    /* This is unique data finder from db it's included of top of site for seo friendly
    ------------- */
    $id = $_GET['id']; // get id
    $status = 00;
    $req_by = 1;
    require_once $config . 'conn.php';
    
    if($_SESSION['id'] == ""):

        die('Please <a href="./login.php">login</a> first.');

    endif;

    /* Inserting Data
    ----------- */
    $sql_stmt = "INSERT INTO `donate_event` (`id_requestblood`, `id_becomedonor`, `status`, `req_by_id`, `req_by`) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_stmt);
    if ( false===$stmt ) {
        
        // die('prepare() failed: ' . htmlspecialchars($mysqli->error));
        echo 'Error, Please contact with Administration.';
    }

    $rc = $stmt->bind_param("sssss", $id, $_SESSION['id'], $status, $_SESSION['id'], $req_by);
    if ( false===$rc ) {

        // die('bind_param() failed: ' . htmlspecialchars($stmt->error));
        echo 'Error, Please contact with Administration.';
    }

    $rc = $stmt->execute();
    if ( false===$rc ):
    die('execute() failed: ' . htmlspecialchars($stmt->error));
?>

    <!-- Error Messege -->
    <div class="messege_error">
        <p>Error</p>
    </div>
    <?php else: ?>

    <!-- Success Message -->
    <div class="messege_success">
        <p>Requested</p>
    </div>

<?php
    endif;
    $stmt->close();
?>