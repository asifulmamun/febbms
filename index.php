<?php
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Home FEB-BMS'; // template name
    include $tpl . 'header.php'; // header included
?>

    <!-- showing result with bootstrap -->
    <div class="container-fluid">
        <div class="row">
            <!-- pagination number get with GET method and calculate -->
            <?php
                include $config . 'conn.php'; // db connection
                $page = !empty($_REQUEST['page']) ? $_REQUEST['page'] : 0 ;
                $count = $page*3; // start from
                $per_page = 3; // perpage
            ?>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <!-- HEADING -->
                <div class="alert alert-success text-center mt-5" role="alert">
                    Blood Requested List
                </div>

                <?php
                    // Getting Result
                    $req_data = $conn->prepare("SELECT * FROM `requestblood`  WHERE requeststatus = '1' ORDER BY id DESC LIMIT $count, $per_page ");
                    $req_data->execute();
                    $result = $req_data->get_result();
                    if($result->num_rows === 0) exit('Blood Request Not Founded.<br><a class="btn btn-dark" href="index.php">Home</a>');
                    while($row = $result->fetch_assoc()) {    
                ?>

                <!-- TABLE FOR GET RESULTS -->
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center" scope="col-12" ><br>
                                <span class="px-3 py-2 border border-light bg-danger"><?php echo $row['bloodgroup']; ?></span>
                                <div class="mt-2">
                                    <?php echo $row['requiredonatebag']; ?> Bags <i class="fas fa-procedures"></i>
                                    <small><?php
                                        $get_date_1 = $row['blooddonatelastdate'];
                                        $get_date_2 = $row['requestdata'];
                                        $date1=date_create($get_date_2);
                                        $date2=date_create($get_date_1);
                                        $diff=date_diff($date1,$date2);
                                        echo $diff->format("(%R%a) days");
                                    ?></small>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Name :<br><small>Mobile:</small></th>
                            <td class="text-left" scope="col"><?php echo $row['name']; ?> (<?php echo $row['gender']; ?>)<br><small><i class="fas fa-phone-volume"></i> <?php echo $row['mobile']; ?></small></td>
                        </tr>
                        <tr>
                            <th scope="col">Requested Date :</th>
                            <td class="text-left" scope="col"><?php
                                $requestdata = $row['requestdata']; 
                                $newrequestdata = date("d-M-Y", strtotime($requestdata));
                                echo $newrequestdata;
                            ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Last Date Require Blood :</th>
                            <td class="text-left" scope="col"><small><span class="px-2 py-1 border border-light bg-danger"><?php
                                $blooddonatelastdate = $row['blooddonatelastdate']; 
                                $newblooddonatelastdate = date("d-M-Y", strtotime($blooddonatelastdate));
                                echo $newblooddonatelastdate;
                            ?></span></small></td>
                        </tr>
                        <tr>
                            <th scope="col">Hospital & Address :</th>
                            <td class="text-left" scope="col"><small><address><?php echo $row['hospitalandaddress']; ?></address></small></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center" scope="col-12" >
                                <div class="mt-2"></div>
                                <a class="px-3 py-2 border border-light bg-success text-light" href="details-request-blood.php?id=<?php echo $row['id']; ?>">Contact & Details</a>
                                <div class="mt-2"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- ENDING LOOP -->
                <?php   
                    } // while for fetch row assoc
                    $req_data->close(); // Getting Data
                ?>
                <center>
                    <!-- pagination -->
                    <a class="btn btn-dark" href="?page=<?php echo ($page == 0 ) ? 0 : $page-1 ?>">Previous</a>
                    <?php $page++; ?>
                    <a class="btn btn-dark" href="?page=<?php echo $page?>"> Next</a>
                </center> 
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
                <!-- HEADING -->
                <div class="alert alert-success text-center mt-5" role="alert">
                    Donor List
                </div>

                <?php
                    $pages = !empty($_REQUEST['pages']) ? $_REQUEST['pages'] : 0 ;
                    $counts = $pages*3; // start from
                    $per_pages = 3; // perpage

                    // Getting res_donor
                    $donor_data = $conn->prepare("SELECT * FROM `becomedonor` WHERE profileStatus = '1' ORDER BY id DESC LIMIT $counts, $per_pages ");
                    $donor_data->execute();
                    $res_donor = $donor_data->get_result();
                    if($res_donor->num_rows === 0) exit('Donor List Not Founded.<br><a class="btn btn-dark" href="index.php">Home</a>');
                    while($rows = $res_donor->fetch_assoc()) {    
                ?>

                <!-- TABLE FOR GET res_donorS -->
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center py-5" scope="col-12" ><span class="px-3 py-2 border border-light bg-danger"><?php echo $rows['bloodGroup']; ?></span></td>
                        </tr>
                        <tr>
                            <th scope="col">Name :</th>
                            <td class="text-left" scope="col"><?php echo $rows['name']; ?> (<?php echo $rows['gender']; ?>)</td>
                        </tr>
                        <tr>
                            <th scope="col">Date of Birth & Age :</th>
                            <td class="text-left" scope="col">
                                <?php
                                    // dob
                                    $dob = $rows['dob'];
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
                            <th scope="col">Mobile Number | E-amil :</th>
                            <td class="text-left" scope="col"><i class="fas fa-phone-volume"></i> <?php echo $rows['mobile']; ?> | <a class="text-light" href="mailto:<?php echo $rows['email']; ?>"><i><small><i class="far fa-envelope"></i> <?php echo $rows['email']; ?></small></i></a></td>
                        </tr>
                        <tr>
                            <th scope="col">Address :</th>
                            <td class="text-left" scope="col"><small><address><?php echo $rows['address']; ?></address></small></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center" scope="col-12" >
                                <div class="mt-2"></div>
                                <a class="px-3 py-2 border border-light bg-success text-light" href="details-donor-blood.php?id=<?php echo $rows['id']; ?>">Contact & More Details</a>
                                <div class="mt-2"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- ENDING LOOP -->
                <?php   
                    } // while for fetch rows assoc
                    $donor_data->close(); // Getting Data Close
                    $conn->close(); // db connection close
                ?>
                <center>
                    <!-- pagination -->
                    <a class="btn btn-dark" href="?pages=<?php echo ($pages == 0 ) ? 0 : $pages-1 ?>">Previous</a>
                    <?php $pages++; ?>
                    <a class="btn btn-dark" href="?pages=<?php echo $pages?>"> Next</a>
                </center> 
            </div>
        </div>
    </div>



<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>