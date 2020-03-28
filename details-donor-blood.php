<?php
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Details of Request Blood'; // template name
    include $tpl . 'header.php'; // header included
?>


    <!-- Heading -->
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="alert alert-success text-center mt-5" role="alert">
                    Details of Requeseter (Who need blood)
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div><!-- Heading -->

<?php
    $id = $_GET['id']; // get id
    include $config . 'conn.php'; // db connection
    
    // Getting Result
    $req_data = $conn->prepare("SELECT * FROM `becomedonor` WHERE id = '$id'");
    $req_data->execute();
    $result = $req_data->get_result();
    if($result->num_rows === 0) exit('Request Not Founded.');
    while($row = $result->fetch_assoc()) {       
?> 

    <!-- showing result with bootstrap -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center" scope="col-12" ><br>
                                <span class="px-3 py-2 border border-light bg-danger"><?php echo $row['bloodGroup']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">ID :</th>
                            <td class="text-left" scope="col"><?php echo $row['id']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Name :</th>
                            <td class="text-left" scope="col"><?php echo $row['name']; ?> (<?php echo $row['gender']; ?>)</td>
                        </tr>
                        <tr>
                            <th scope="col">Mobile Number | E-amil :</th>
                            <td class="text-left" scope="col"><i class="fas fa-phone-volume"></i> <?php echo $row['mobile']; ?> | <a class="text-light" href="mailto:<?php echo $row['email']; ?>"><i><small><i class="far fa-envelope"></i> <?php echo $row['email']; ?></small></i></a></td>
                        </tr>
                        <tr>
                            <th scope="col">Blood Group :</th>
                            <td class="text-left" scope="col"><?php echo $row['bloodGroup']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Date of Birth & Age :</th>
                            <td class="text-left" scope="col">
                                <?php
                                    // dob
                                    $dob = $row['dob'];
                                    $newFormatDob = date("d-M-Y", strtotime($dob));
                                    echo $newFormatDob;
                                ?>
                                <i class="text-muted"><small>(<?php
                                    // converting
                                    $dobD = date("d", strtotime($dob));
                                    $dobM = date("m", strtotime($dob));
                                    $dobY = date("y", strtotime($dob));
                                    // allocate variable
                                    $dd = $dobD;
                                    $mm = $dobM;
                                    $yy = $dobY;
                                    // configuraton dob
                                    $dob = $mm."/".$dd."/".$yy;
                                    $arr = explode('/',$dob);
                                    //$dateTs=date_default_timezone_set($dob); 
                                    $dateTs=strtotime($dob);
                                    $now=strtotime('today');
                                    if(sizeof($arr)!=3);
                                    if(!checkdate($arr[0],$arr[1],$arr[2]));
                                    if($dateTs>=$now);
                                    // calculate
                                    $ageDays = floor(($now-$dateTs)/86400);
                                    $ageYears = floor($ageDays/365);
                                    $ageMonths = floor(($ageDays-($ageYears*365))/30);
                                    // results
                                    echo  $ageYears . 'y ' . $ageMonths . 'm';
                                ?>)</small></i>
                            </td>
                        </tr>




                        <tr>
                            <th scope="col">Address :</th>
                            <td class="text-left" scope="col"><?php echo $row['address']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Social Url :</th>
                            <td class="text-left" scope="col"><a href="<?php echo $row['socialUrl']; ?>"><?php echo $row['socialUrl']; ?></a></td>
                        </tr>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
<?php   
    } // while for fetch row assoc
    $req_data->close(); // Getting Data
    $conn->close(); // db connection closs
?>
<br>

<center><a class="btn btn-dark" href="index.php">Previouse Page</a></center>

<br><br>

<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>