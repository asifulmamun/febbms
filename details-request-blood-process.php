<?php

    /* 
        # This is process page of Request Blood
        $action = 1 - donate request send
        $action = 2 - Check Session is or not for blood details $_session['req_id']
    */
    require_once './init.php'; // initital file


    /* This is unique data finder from db it's included of top of site for seo friendly
    ------------- */
    $id = $_GET['id']; // get id
    $action = $_GET['action'];
    require_once $config . 'conn.php';




    
    // Data insert / donate if action 1
    if($action == 1){

        // Check logged user or not
        if($_SESSION['id'] == ""):
            die('Please login first');
        endif;

        // Check Donated Count
        $req_data = $conn->prepare("SELECT `id_becomedonor`
                                    FROM `donate_event`
                                    WHERE id_requestblood = ? AND id_becomedonor = ?");
        $req_data->bind_param('ii', $id, $_SESSION['id']);
        $req_data->execute();
        $result = $req_data->get_result();
        if($result->num_rows>2)die("Can't send more than 3 bags request."); // More than 3 times Donate request not possible
        $req_data->close(); // Getting Data

        // vairable
        $status = 00;
        $req_by = 1;
            
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
    Donate Request Send 1 Bag.
<?php
        endif; // error handaling insert execute stmt
        $stmt->close();
    }  // Data insert / donate if action 0
?>

<?php
    // Check Blood Request Mobile and Password for session create
    if($action == 2){
        if(isset($_SESSION['req_id'])){
            echo '1';
        }else{
            echo '0';
        }
    } // action

?>