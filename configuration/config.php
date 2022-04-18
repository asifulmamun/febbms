<?php
/*
    # File @included to header file
    - Style for template
    @ Every Template has Unique Stylesheet.
    - This function for stylesheet unique and compressed css.
  */
function style($template_name){
  global $css, $css_extension;

  // index page
  if ($template_name) {

    return $css . $template_name . '/style' . $css_extension;
  }
}



/* 
  - # Don't Touch here
  - This just menu showing function
  - @ If need to change anything go to - init.php
*/

function main_menu(){
    // array name of menu - init.php
    global $main_menu;

    foreach ($main_menu as $menu_name => $menu_value) {

      echo '<a class="mdl-navigation__link" href="'. $menu_value .'">'. $menu_name .'</a>';

    }
}


/*
  -- Getting how many data in table
  @ Call function with parameter of table name (DB)
*/
function countDonar($tablename){
  global $conn; // db connection

  // Getting Result
  $req_data = $conn->prepare("SELECT `id` FROM $tablename WHERE `profileStatus` = 1");
  $req_data->execute();
  $result = $req_data->get_result();

  return $result->num_rows; // results how many rows in table

  $req_data->close(); // Getting Data
  // $conn->close(); // db connection closs
}

/* Blood Group Filter By ID
--------------------------- */
function blood_group($blood_group_id){
  if( $blood_group_id == 1 ){
    $blood_group = 'A(+)';
  } elseif( $blood_group_id == 2 ){
      $blood_group = 'A(-)';
  } elseif( $blood_group_id == 3 ){
      $blood_group = 'AB(+)';
  } elseif( $blood_group_id == 4 ){
      $blood_group = 'AB(-)';
  } elseif( $blood_group_id == 5 ){
      $blood_group = 'B(+)';
  } elseif( $blood_group_id == 6 ){
      $blood_group = 'B(-)';
  } elseif( $blood_group_id == 7 ){
      $blood_group = 'O(+)';
  } elseif( $blood_group_id == 8 ){
      $blood_group = 'O(-)';
  }else{
    $blood_group = NULL;
  }

  return $blood_group;
}


/* 
  - @ Date Calculator
  - # Don't Change
----------------- */
function dyas_Calculate($date){

  // converting
  $dobD = date("d", strtotime($date));
  $dobM = date("m", strtotime($date));
  $dobY = date("y", strtotime($date));

  // allocate variable
  $dd = $dobD;
  $mm = $dobM;
  $yy = $dobY;

  // configuraton dob
  $dob = $mm . "/" . $dd . "/" . $yy;
  $arr = explode('/', $dob);

  //$dateTs=date_default_timezone_set($dob); 
  $dateTs = strtotime($dob);
  $now = strtotime('today');
  if (sizeof($arr) != 3);
  if (!checkdate($arr[0], $arr[1], $arr[2]));
  if ($dateTs >= $now);

  // calculate
  $ageDays = floor(($now - $dateTs) / 86400);
  $ageYears = floor($ageDays / 365);
  $ageMonths = floor(($ageDays - ($ageYears * 365)) / 30);
  
  // results
  return  $ageYears . 'y ' . $ageMonths . 'm';
}


/* Get user data by id
------------------- */
function get_user_info($id, $row_name){
  global $conn;

  // stmt
  $get_user_info = $conn->prepare("SELECT * FROM `becomedonor` WHERE `id`=?");
  $get_user_info->bind_param('i', $id);
  $get_user_info->execute();

  $result = $get_user_info->get_result();
  if($result->num_rows === 0){
      
      return NULL;
  } else{

      $row = $result->fetch_assoc();
      return $row[$row_name];
  }

  $get_user_info->close(); // stmt close
}

// Logged User Operation
class Logged_user_info{

  // Get user single information ('column_name', 'table_name', 'id')
  public function table_column($get_data, $tablename, $id){
    global $conn;

    // Getting Result
    $req_data = $conn->prepare("SELECT `$get_data` FROM $tablename WHERE `id` = ?");
    $req_data->bind_param('i', $id);
    $req_data->execute();
    $result = $req_data->get_result();
    $rows = $result->fetch_assoc();

    return $rows[$get_data]; // result

    $req_data->close(); // Getting Data
  }

  // Update user single information                                     
  public function update_table_column($table_name, $update_column_name, $update_column_value, $where_column_name, $where_column_value){
    global $conn;

    // Getting Result
    $req_data = $conn->prepare("UPDATE `$table_name` SET `$update_column_name` = ? WHERE `$where_column_name` = ?");
    $req_data->bind_param('ss', $update_column_value, $where_column_value);
    $req_data->execute();
    $req_data->close(); // Getting Data
  }

  // check user exist or not with two column
  public function exist_data_0_1_two_column($get_columns, $table_name, $where_column_name, $where_column_value, $where_column_name_2, $where_column_value_2){
    global $conn;

    // Getting Result
    $req_data = $conn->prepare("SELECT `$get_columns` FROM `$table_name` WHERE `$table_name`.`$where_column_name` = ? AND `$table_name`.`$where_column_name_2` = ?");
    $req_data->bind_param('ss', $where_column_value, $where_column_value_2);
    $req_data->execute();
    $result = $req_data->get_result();

    return $result->num_rows; // result

    $req_data->close(); // Getting Data
  }

   // check user exist or not with single column
   public function exist_data_0_1_single_column($get_columns, $table_name, $where_column_name, $where_column_value){
    global $conn;

    // Getting Result
    $req_data = $conn->prepare("SELECT `$get_columns` FROM `$table_name` WHERE `$table_name`.`$where_column_name` = ?");
    $req_data->bind_param('s', $where_column_value);
    $req_data->execute();
    $result = $req_data->get_result();

    return $result->num_rows; // result

    $req_data->close(); // Getting Data
  }
}
$logged_user_info = new Logged_user_info;



?>