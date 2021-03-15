<?php
    // Main Domain Link
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

    // Local Server
    $servername = "localhost"; // datqabase servername
    $username = "root"; // database username
    $password = ""; // database password
    $dbname = "febbms"; // database name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {

        die("DB Connection failed: " . $conn->connect_error);

    }

?>