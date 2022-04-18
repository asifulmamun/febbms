<?php
    require_once './init.php'; // init
    require_once $tpl_config . 'conn.php'; // DB

    $action = $_GET['action']; // action = 0 means delete
    $id = $_GET['id'];

    if($action == 0){
        $sql = "DELETE FROM `requestblood` WHERE `requestblood`.`id` = ?";
    }else{
        $sql = NULL;
    }

    // Getting action
    $update_info = $conn->prepare($sql);
    $update_info->bind_param('i', $id);
    $update_info->execute();
    echo $id;

    $update_info->close(); // Getting Data

?>