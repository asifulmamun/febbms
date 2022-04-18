<?php

/* Dashboard Information
------------------------- */
class Site_info{

    /* Static Informatin
    --------------------- */
    public $name_short = 'FEBBMS';
    public $name = 'February Blood Management System';


    public function logo(){
        global $tpl_img_default;
        return $tpl_img_default . 'febbms-logo.png';
    }

    public function count($tablename, $profile_staus){
        global $conn;
        
        // Getting Result
        $req_data = $conn->prepare("SELECT `id` FROM $tablename WHERE `profileStatus` = ?");
        $req_data->bind_param('i', $profile_staus);
        $req_data->execute();
        $result = $req_data->get_result();

        return $result->num_rows; // results how many rows in table

        $req_data->close(); // Getting Data
    }

}
$site_info = new Site_info;

// User information ('column_name', 'table_name', 'id')
class User_info{

    public function table_column($get_data, $tablename, $id){
        global $conn;

        // Getting Result
        $req_data = $conn->prepare("SELECT `$get_data` FROM $tablename WHERE `id` = ?");
        $req_data->bind_param('i', $id);
        $req_data->execute();
        $result = $req_data->get_result();
        $rows = $result->fetch_assoc();

        return $rows[$get_data]; // results how many rows in table

        $req_data->close(); // Getting Data
    }
}
$user_info = new User_info;