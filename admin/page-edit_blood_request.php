<?php

    /* 
        # Template Name: Edit User
        - header files
    ----------- */
    require_once './init.php'; // initial file
    require_once $tpl_config . 'conn.php'; // DB
    require_once $tpl_config . 'info.php'; // static information
    $template_name = basename(__FILE__, '.php'); // template name
    $page_name = 'Edit Request'; // Page Name
    require_once $tpl_global . 'header.php'; // header file

    if(isset($_GET['id'])):
        $user_id = $_GET['id'];
    else:
      $user_id = 0;
    endif;

?>

<!-- Topbar Search -->
<form action="./page-edit_blood_request.php" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input name="id" type="text" class="form-control bg-light border-0 small" placeholder="Search by ID ..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" class="btn btn-primary">Previouse Page</a>

<form action="./page-edit_blood_request.php" method="POST">
  <input name="user_id" value="<?php echo $user_id; ?>" type="hidden">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="name">Name</label>
      <input name="name" value="<?php echo $user_info->table_column('name', 'requestblood', $user_id); ?>" type="text" class="form-control" id="name">
    </div>
    <div class="form-group col-md-3">
      <label for="blood_group">Blood Group</label>
      <select name="bloodGroup" id="blood_group" class="form-control">
        <option value="<?php echo $user_info->table_column('bloodGroup', 'requestblood', $user_id); ?>" selected><?php echo $user_info->table_column('bloodGroup', 'requestblood', $user_id); ?></option>
        <option value="A(+)">A(+)</option>
        <option value="A(-)">A(-)</option>
        <option value="AB(+)">AB(+)</option>
        <option value="AB(-)">AB(-)</option>
        <option value="B(+)">B(+)</option>
        <option value="B(-)">B(-)</option>
        <option value="O(+)">O(+)</option>
        <option value="O(-)">O(-)</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="district">District</label>
      <select name="district" id="district" class="form-control">
        <option value="<?php echo $user_info->table_column('district', 'requestblood', $user_id); ?>" selected><?php echo $user_info->table_column('district', 'requestblood', $user_id); ?></option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="mobile">Mobile</label>
      <input name="mobile" value="<?php echo $user_info->table_column('mobile', 'requestblood', $user_id); ?>" type="text" class="form-control" id="mobile">
    </div>
    <div class="form-group col-md-4">
      <label for="blooddonatelastdate">Last date of Donate</label>
      <input name="blooddonatelastdate" value="<?php echo $user_info->table_column('blooddonatelastdate', 'requestblood', $user_id); ?>" type="date" class="form-control" id="blooddonatelastdate">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control">
            <option value="<?php echo $user_info->table_column('gender', 'requestblood', $user_id); ?>" selected><?php echo $user_info->table_column('gender', 'requestblood', $user_id); ?></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="form-group col-md-4">
      <label for="hospitalandaddress">Hospital</label>
      <input name="hospitalandaddress" value="<?php echo $user_info->table_column('hospitalandaddress', 'requestblood', $user_id); ?>" type="text" class="form-control" id="hospitalandaddress">
    </div>
    <div class="form-group col-md-4">
      <label for="socialurl">Social Url</label>
      <input name="socialurl" value="<?php echo $user_info->table_column('socialurl', 'requestblood', $user_id); ?>" type="text" class="form-control" id="socialurl">
    </div>
  </div>

  <div>
  Update By: <span class="badge badge-pill badge-warning"><?php echo $user_info->table_column('name', 'requestblood', $_SESSION['id']); ?>&nbsp;&nbsp;<span class="badge badge-light"><?php echo $_SESSION['id']; ?></span></span>
  </div><br>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

<script>
    /* Get District with json
--------- */
var getJSON = function(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';

    xhr.onload = function() {

        var status = xhr.status;

        if (status == 200) {
            callback(null, xhr.response);
        } else {
            callback(status);
        }
    };

    xhr.send();
};

getJSON('./../layout/assets/resource/bd_district.json', function(err, data) {

    if (err != null) {
        console.error(err);
    } else {

        // District Add to select>form with value
        function district_set(value) {
            let select_district = document.getElementById('district'); // get the select
            let x = document.createElement("option");

            // add value to option
            x.setAttribute("value", value);
            let t = document.createTextNode(value);
            x.appendChild(t);
            select_district.appendChild(x);
        }

        for (let i = 0; i < 64; i++) {
            var district = data.districts[i].name;
            district_set(district);
        }
    }
});
</script>



<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'):

    /* Get data
    ---------------- */
    $name =  $_POST['name'];
    $bloodGroup =  $_POST['bloodGroup'];
    $district =  $_POST['district'];
    $mobile =  $_POST['mobile'];
    $blooddonatelastdate =  $_POST['blooddonatelastdate'];
    $gender =  $_POST['gender'];
    $hospitalandaddress =  $_POST['hospitalandaddress'];
    $socialurl =  $_POST['socialurl'];
    $UpdatedOrAcceptBy =  $_SESSION['id'];
    $user_id = $_POST['user_id'];


    /* Inserting Data
    ----------- */
    $sql_stmt = "UPDATE `requestblood` SET 
        `name` = ?, 
        `bloodGroup` = ?, 
        `district` = ?,  
        `mobile` = ?,
        `blooddonatelastdate` = ?, 
        `gender` = ?, 
        `hospitalandaddress` = ?, 
        `socialurl` = ?, 
        `UpdatedOrAcceptBy` = ? 
    WHERE `requestblood`.`id` = ?";

  
    $stmt = $conn->prepare($sql_stmt);
    if ( false===$stmt ) {
        
        // die('prepare() failed: ' . htmlspecialchars($mysqli->error));
        echo 'Error, Please contact with Administration.';
    }

    $rc = $stmt->bind_param("ssssssssii", $name, $bloodGroup, $district, $mobile, $blooddonatelastdate, $gender, $hospitalandaddress, $socialurl, $UpdatedOrAcceptBy, $user_id);
    if ( false===$rc ) {

        // die('bind_param() failed: ' . htmlspecialchars($stmt->error));
        echo 'Error, Please contact with Administration.';
    }

    $rc = $stmt->execute();
    if ( false===$rc ):
    // die('execute() failed: ' . htmlspecialchars($stmt->error));
?>

<!-- Error Messege -->
<div class="messege_error">
    <p>Update failed.</p>
</div>
<?php else: ?>

<br><br>
<!-- Success Message -->
<div class="card bg-success text-white shadow">
    <div class="card-body">
        Update Successfully
    </div>
</div>


<?php
    endif;
    $stmt->close();
  endif; // If POST Method
?>


<?php

    /* footer file
    ----------- */
    require_once $tpl_global . 'footer.php';

?>