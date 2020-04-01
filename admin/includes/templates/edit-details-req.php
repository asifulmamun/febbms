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
    $id = $_GET['id']; // get id
    include $config . 'conn.php'; // db connection
    
    // Getting Result
    $req_data = $conn->prepare("SELECT * FROM `requestblood` WHERE id = '$id'");
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
                                <span class="px-3 py-2 border border-light bg-danger"><?php echo $row['bloodgroup']; ?></span>
                                <div class="mt-2">
                                    <?php echo $row['requiredonatebag']; ?> Bags <i class="fas fa-procedures"></i>
                                    <i><?php
                                        $get_date_1 = $row['blooddonatelastdate'];
                                        $get_date_2 = $row['requestdata'];

                                        $date1=date_create($get_date_2);
                                        $date2=date_create($get_date_1);
                                        $diff=date_diff($date1,$date2);
                                        echo $diff->format("(%R%a) days");
                                    ?></i>
                                </div>
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
                            <th scope="col">Mobile Number :</th>
                            <td class="text-left" scope="col"><?php echo $row['mobile']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Blood Group :</th>
                            <td class="text-left" scope="col"><?php echo $row['bloodgroup']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Require Blood Bags :</th>
                            <td class="text-left" scope="col"><span class="px-3 py-2 border border-light bg-danger"><?php echo $row['requiredonatebag']; ?><small> Bags need in <?php echo $diff->format("(%R%a) days"); ?></small></span></td>
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
                            <td class="text-left" scope="col"><span class="px-3 py-2 border border-light bg-danger"><?php
                                $blooddonatelastdate = $row['blooddonatelastdate']; 
                                $newblooddonatelastdate = date("d-M-Y", strtotime($blooddonatelastdate));
                                echo $newblooddonatelastdate;
                            ?></span></td>
                        </tr>
                        <tr>
                            <th scope="col">Hospital & Address :</th>
                            <td class="text-left" scope="col"><?php echo $row['hospitalandaddress']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Social Url :</th>
                            <td class="text-left" scope="col"><a class="text-light" href="<?php echo $row['socialurl']; ?>"><?php echo $row['socialurl']; ?></a></td>
                        </tr>
                        <tr>
                            <th scope="col">Action</th>
                            <td class="text-left" scope="col"><a class="btn btn-danger py-1 px-2" href="edit-details.php?action=deleteReq&id=<?php echo $row['id']; ?>">Delete</a></td> 
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

<center><a class="btn btn-dark" href="dashboard.php">Previouse Page</a></center>

<br><br>