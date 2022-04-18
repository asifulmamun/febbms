<?php
    require_once './init.php'; // init
    require_once $tpl_config . 'conn.php'; // DB

    $profileStatus = $_GET['status'];
    $id = $_GET['id'];

    $sql = "UPDATE `requestblood` SET `profileStatus` = ? WHERE `requestblood`.`id` = ?";

    // Getting action
    $update_info = $conn->prepare($sql);
    $update_info->bind_param('ii', $profileStatus, $id);
    $update_info->execute();
    echo $id;

    $update_info->close(); // Getting Data

?>