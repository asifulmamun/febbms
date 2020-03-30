<?php
    // Site Name
    $site_name = 'February Blood Management System';
    $site_short_name = 'FEB-BMS';
    $site_logo = "";
    $site_description = 'Donate Blood | Take Blood | Save Life';


    include 'conn.php'; // db connection

    // Counter Functin to Admin index page how many id or row
    function countDonar($tablename){
        Global $conn;
        
        // Getting Result
        $req_data = $conn->prepare("SELECT id FROM `$tablename`");
        $req_data->execute();
        $result = $req_data->get_result();
  
        return $result->num_rows; // results how many rows in table
  
        $req_data->close(); // Getting Data
        $conn->close(); // db connection closs
      }


?>