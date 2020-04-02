<?php
    // web link
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

    if($actual_link == 'http://blood.easylabpic.com'){ // live server full domain address
        // Live Server    
        $servername = "localhost";
        $username = "easylabp_febbms";
        $password = "#Febbms2020";
        $dbname = "easylabp_febbms";
    }else{
        // Local Server
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "febbms";
    }


    // // Local Server
    // $servername = "localhost"; // datqabase servername
    // $username = "root"; // database username
    // $password = ""; // database password
    // $dbname = "febbms"; // database name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



?>