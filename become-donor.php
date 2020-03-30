<?php
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Become A Donor - FEB-BMS'; // template name
    include $tpl . 'header.php'; // header included
?>
    
    <!-- Heading -->
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="alert alert-success text-center mt-5" role="alert">
                    Become A Blood Donor
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div><!-- Heading -->

    <!-- Form -->
    <div class="container">
        <form method="POST">
            <div class="form-row pt-4">
                <div class="col-md-6 col-sm-12">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-3 col-sm-12">
                    <label for="bloodGroup">Blood Group</label>
                    <select name="bloodGroup" class="form-control">
                        <option selected>Blood Group</option>
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
                    <input name="dob" type="date" class="form-control">
                </div>
            </div>
            <div class="form-row pt-4">
                <div class="col-md-6 col-sm-12">
                    <label for="mobile">Mobile Number</label>
                    <input name="mobile" type="text" class="form-control" placeholder="Mobile Number">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="email">E-mail</label>
                    <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
            </div>
            <div class="form-row pt-4">
                <div class="col-md-6 col-sm-12">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Full Address"></textarea>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="socialUrl">Facebook or Social URL</label>
                    <input name="socialUrl" type="text" class="form-control" placeholder="Facebook or Social URL">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control">
                        <option selected>Gender</option>
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
            // include $config . 'conn.php'; // db connection

            // Getting Data Function
            function getData(){
                Global $conn;
                // Getting Result
                $stmt = $conn->prepare("SELECT mobile FROM becomedonor WHERE mobile=?");
                $stmt->bind_param('s', $checkMobile);
                $checkMobile = $_POST['mobile']; // value from post/get method or else
                $stmt->execute();
                $result = $stmt->get_result();
                return $result->num_rows;
                $stmt->close(); // Getting Data
            }

            // Password Verify if not matched give notice
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            if($password1 != $password2){
                die('<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">Password does not matched.<br>Try Again.</div></div><div class="col-1"></div></div></div><script>alert("Password does not matched, try again.");</script><script src="https://wowjs.uk/dist/wow.min.js"></script><script>new WOW().init();</script>');
            }

            // Check Data Exist or not if exist give notice
            if(getData() === 1) exit('<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">User Already Registered with this Mobile Number.<br>Please contact with Admin.<br><a class="text-info" href="' . $home . 'forgot-password/">Forgot Password..!</a></div></div><div class="col-1"></div></div></div><script>alert("User Already Registered with this Mobile Number. Please contact with Admin.");</script><script src="https://wowjs.uk/dist/wow.min.js"></script><script>new WOW().init();</script>');

            // Inserting Data
            $stmt = $conn->prepare("INSERT INTO `becomedonor` (`name`, `bloodGroup`, `mobile`, `password`, `email`, `dob`, `address`, `socialUrl`, `gender`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $name, $bloodGroup, $mobile, $password, $email, $dob, $address, $socialUrl, $gender);
            
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
            $stmt->execute(); // stmt executed
            
            // Register Successful Notice
            echo '<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">Registered Successful.</div></div><div class="col-1"></div></div></div> <script>alert("Registered Successful.");</script> <script src="https://wowjs.uk/dist/wow.min.js"></script> <script>new WOW().init();</script>';
            
            $stmt->close();
            $conn->close();
        } // empty name and mobile
    } // server request POST
?> <!-- Backend Work -->

<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>