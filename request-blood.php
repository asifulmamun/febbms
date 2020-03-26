<?php
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Request For Blood - FEB-BMS'; // template name
    include $tpl . 'header.php'; // header included
?>



    <!-- Heading -->
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="alert alert-success text-center mt-5" role="alert">
                    Request fo Blood
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
                    <label for="name">Patient Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Patient Name">
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
                    <label for="bloodNeedDate">Blood Donate Last Date</label>
                    <input name="bloodNeedDate" type="date" class="form-control">
                </div>
            </div>

            <div class="form-row pt-4">
                <div class="col-md-6 col-sm-12">
                    <label for="mobile">Mobile Number</label>
                    <input name="mobile" type="text" class="form-control" placeholder="Mobile Number">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="bags">Require donate blood bags amount.</label>
                    <input name="bags" type="text" class="form-control" placeholder="Require donate blood bags amount.">
                </div>
            </div>

            <div class="form-row pt-4">
                <div class="col-md-6 col-sm-12">
                    <label for="hospitalNameAndAddress">Hospital Name and Address</label>
                    <textarea name="hospitalNameAndAddress" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Hospital Name and Full Address"></textarea>
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
        if(empty($_POST['name']) OR empty($_POST['mobile'])) exit('<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">Please fill up your Name and Mobile Number.</div></div><div class="col-1"></div></div></div><script>alert("Please fill up your Name and Mobile Number.");</script><script src="https://wowjs.uk/dist/wow.min.js"></script><script>new WOW().init();</script>');


        include $config . 'conn.php'; // db connection

        // Inserting Data
        $stmt = $conn->prepare("INSERT INTO `requestblood` (`name`, `bloodgroup`, `blooddonatelastdate`, `mobile`, `requiredonatebag`, `hospitalandaddress`, `socialurl`, `gender`, `requestdata`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $name, $bloodGroup, $blooddonatelastdate, $mobile, $requiredonatebag, $hospitalandaddress, $socialurl, $gender, $requestdata);
        
        // Get data from form and set value in a variable
        $name = $_POST['name'];
        $bloodGroup = $_POST['bloodGroup'];
        $blooddonatelastdate = $_POST['bloodNeedDate'];
        $mobile = $_POST['mobile'];
        $requiredonatebag = $_POST['bags'];
        $hospitalandaddress = $_POST['hospitalNameAndAddress'];
        $socialurl = $_POST['socialUrl'];
        $gender = $_POST['gender'];
        $requestdata = date("Y-m-d");            
        $stmt->execute(); // stmt executed
        

        // Request Successful Notice
        echo '<link rel="stylesheet" href="https://wowjs.uk/css/libs/animate.css"><div class="container"><div class="row wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s"><div class="col-1"></div><div class="col-10"><div class="alert bg-dark text-light text-center" role="alert">Request Successful.</div></div><div class="col-1"></div></div></div> <script>alert("Request Successful.");</script> <script src="https://wowjs.uk/dist/wow.min.js"></script> <script>new WOW().init();</script>';
        
        $stmt->close();
        $conn->close();

    } // server request POST
?> <!-- Backend Work -->


<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>