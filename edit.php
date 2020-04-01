<?php
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Dashboard'; // template name
    include $tpl . 'header.php'; // header included
    include $config . 'conn.php'; // db connection

    if(!isset($_SESSION['id'])){
      echo '<script type="text/javascript">window.location.replace("login.php");</script>';
    }
?>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3 class="border-bottom px-4 py-3">Welcome to your profile Mr. <?php echo $_SESSION['name']; ?></h3>
        <?php 
          if($_SESSION['profileStatus'] == 0){
            echo '<h5 class="bg-danger text-light px-3 py-2">Your Profile is now PENDING, wait or contact with Admin.</h5>';
          }else{
            echo '<h5 class="mx-4 bg-success text-light px-3 py-2">Your Profile has published.</h5>';
          }
        ?>
      </div>
    </div>
  </div>
           
    <!-- Heading -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="alert alert-success text-center mt-5" role="alert">
                    <?php echo $template_name; ?>
                </div>
            </div>
        </div>
    </div><!-- Heading -->

<?php
    $id = $_SESSION['id']; // get id
    include $config . 'conn.php'; // db connection

    // Getting Result
    $req_data = $conn->prepare("SELECT * FROM `becomedonor` WHERE id = '$id'");
    $req_data->execute();
    $result = $req_data->get_result();
    if($result->num_rows === 0) exit('Request Not Founded.');
    while($row = $result->fetch_assoc()) {       
?> 





 <!-- Form -->
 <div class="container">
        <form method="POST">
            <div class="form-row pt-4">
                <div class="col-md-6 col-sm-12">
                    <label for="name">Name</label>
                    <input value="<?php echo $row['name']; ?>" name="name" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-3 col-sm-12">
                    <label for="bloodGroup">Blood Group</label>
                    <select name="bloodGroup" class="form-control">
                        <option value="<?php echo $row['bloodGroup']; ?>" selected><?php echo $row['bloodGroup']; ?></option>
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
                <div class="col-md-3 col-sm-12">
                    <label for="dob">Date of Birth</label>
                    <input value="<?php echo $row['dob']; ?>" name="dob" type="date" class="form-control">
                </div>
            </div>
            <div class="form-row pt-4">
                <div class="col-md-6 col-sm-12">
                    <label for="mobile">Mobile Number</label>
                    <input value="<?php echo $row['mobile']; ?>" name="mobile" type="text" class="form-control" placeholder="Mobile Number">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="email">E-mail</label>
                    <input value="<?php echo $row['email']; ?>" name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
            </div>
            <div class="form-row pt-4">
                <div class="col-md-6 col-sm-12">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Full Address"><?php echo $row['address']; ?></textarea>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="socialUrl">Facebook or Social URL</label>
                    <input value="<?php echo $row['socialUrl']; ?>" name="socialUrl" type="text" class="form-control" placeholder="Facebook or Social URL">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-row pt-4">
                <div class="col-md-6 col-sm-12">
                    <label for="password1">Password</label>
                    <input name="password1" type="password" class="form-control" id="inputPassword2" placeholder="Password">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="password2">Re-type Password</label>
                    <input name="password2" type="password" class="form-control" id="inputPassword2" placeholder="Re-type Password">
                </div>
            </div>
            <div class="form-row pt-5 mb-5">
                <div class="col-12">
                    <button type="submit" class="btn btn-success py-2 px-4">Submit</button>
                </div>
            </div>
        </form>
    </div> <!-- Form -->

<!-- Backend Work -->
<?php
    // check request method if not post nothing
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // if empty name and mobile field give notice
        if(empty($_POST['name']) OR empty($_POST['mobile'])){
            die('<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">Please fill up your Name and Mobile Number.</div></div><div class="col-1"></div></div></div><script>alert("Please fill up your Name and Mobile Number.");</script><script src="https://wowjs.uk/dist/wow.min.js"></script><script>new WOW().init();</script>');
        }else{

            // Password Verify if not matched give notice
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            if($password1 != $password2){
                die('<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">Password does not matched.<br>Try Again.</div></div><div class="col-1"></div></div></div><script>alert("Password does not matched, try again.");</script><script src="https://wowjs.uk/dist/wow.min.js"></script><script>new WOW().init();</script>');
            }
            // Get data from form and set value in a variable
            $name = $_POST['name'];
            $bloodGroup = $_POST['bloodGroup'];
            $mobile = $_POST['mobile'];
            $password = MD5($password1);
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $address = $_POST['address'];
            $socialUrl = $_POST['socialUrl'];
            $gender = $_POST['gender'];
            $id = $_SESSION['id'];      
            
            // Inserting Data
            $stmt = $conn->prepare("UPDATE `becomedonor` SET `profileStatus` = '0', `name` = '$name', `bloodGroup` = '$bloodGroup', `mobile` = '$mobile', `password` = '$password', `email` = '$email', `dob` = '$dob', `address` = '$address', `socialUrl` = '$socialUrl', `gender` = '$gender' WHERE `id` = '$id'");
            $stmt->execute(); // stmt executed
            
            // Register Successful Notice
            echo '<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">Update Successful.</div></div><div class="col-1"></div></div></div> <script>alert("Update Successful.");window.location.replace("edit.php");</script> <script src="https://wowjs.uk/dist/wow.min.js"></script> <script>new WOW().init();</script>';
            
            $stmt->close();
            $conn->close();
        } // empty name and mobile
    } // server request POST
?> <!-- Backend Work -->



<?php   
    } // while for fetch row assoc
    $req_data->close(); // Getting Data
?>


<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>