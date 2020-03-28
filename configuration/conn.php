<?php
    $servername = "localhost";
    $username = "easlabp_febbms";
    $password = "#Febbms2020";
    $dbname = "easlabp_febbms";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>