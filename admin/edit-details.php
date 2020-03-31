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

<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // not isset go to dashboard
        if(!isset($_GET['id'])){
            echo '<script type="text/javascript">window.location.replace("dashboard.php");</script>';
        }
        // doing
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            if($_GET['action'] == 'editReq'){
                include $tpl . 'edit-details-req.php'; // include edit details requester
            }
            elseif($_GET['action'] == 'editDonor'){
                include $tpl . 'edit-details-donor.php'; // include edit details donor
            }
            elseif($_GET['action'] == 'deleteDonor'){
                // sql to delete a record
                $sql = "DELETE FROM `becomedonor` WHERE `id` = '$id'";

                if ($conn->query($sql) === TRUE) {
                    die('<script type="text/javascript">
                        alert("Delete Successful.");
                        var delay = 2000;
                        setTimeout(function(){
                            window.location = "dashboard.php";
                        },delay);
                    </script><br><br><center><h1>Delete Successful.</h1></center>');

                } else {
                    die('<script type="text/javascript">
                        alert("Deleting Failed.");
                        var delay = 5000;
                        setTimeout(function(){
                            window.location = "dashboard.php";
                        },delay);
                    </script><br><br><center><h1>Deleting Failed.</h1></center>');
                }
            }
            elseif($_GET['action'] == 'deleteReq'){
                // sql to delete a record
                $sql = "DELETE FROM `requestblood` WHERE `id` = '$id'";

                if ($conn->query($sql) === TRUE) {
                    die('<script type="text/javascript">
                        alert("Delete Successful.");
                        var delay = 2000;
                        setTimeout(function(){
                            window.location = "dashboard.php";
                        },delay);
                    </script><br><br><center><h1>Delete Successful.</h1></center>');

                } else {
                    die('<script type="text/javascript">
                        alert("Deleting Failed.");
                        var delay = 5000;
                        setTimeout(function(){
                            window.location = "dashboard.php";
                        },delay);
                    </script><br><br><center><h1>Deleting Failed.</h1></center>');
                }
            }
            elseif($_GET['action'] == 'publishDonor'){
                // sql to delete a record
                $sql = "UPDATE `becomedonor` SET `profileStatus` = '1' WHERE `becomedonor`.`id` = '$id'";

                if ($conn->query($sql) === TRUE) {
                    die('<script type="text/javascript">
                        alert("Published Successful.");
                        var delay = 2000;
                        setTimeout(function(){
                            window.location = "dashboard.php";
                        },delay);
                    </script><br><br><center><h1>Published Successful.</h1></center>');

                } else {
                    die('<script type="text/javascript">
                        alert("Publishing Failed.");
                        var delay = 5000;
                        setTimeout(function(){
                            window.location = "dashboard.php";
                        },delay);
                    </script><br><br><center><h1>Publishing Failed.</h1></center>');
                }
            }
        } // doing
    }
?>

<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>
