<?php
    # File @included to header file

    // Local Server
    $servername = "localhost"; // datqabase servername
    $username = "asifulmamun"; // database username
    $password = "1998"; // database password
    $dbname = "ahobanbl_febbms"; // database name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Set charset for unicode problem solve
    $conn -> set_charset("utf8");



    // Check connection
    if ($conn->connect_error) {

        die("DB Connection failed: " . $conn->connect_error);

    }

    /* SMTP Configure
    -------------- */
    $smtp_host = NULL;
    $smtp_host_port = NULL;
    $smtp_host_secuirity = NULL; // SSL/TLS
    $smtp_username = NULL;
    $smtp_password = NULL;
    $sender_mail = NULL; // sender mail

?>