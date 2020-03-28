<?php
    // // Local Server
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "febbms";

    // Live Server    
    $servername = "localhost";
    $username = "easylabp_febbms";
    $password = "#Febbms2020";
    $dbname = "easylabp_febbms";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>