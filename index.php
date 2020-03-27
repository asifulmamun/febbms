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

<?php
    include $config . 'conn.php'; // db connection
    $page = !empty($_REQUEST['page']) ? $_REQUEST['page'] : 0 ;
    $count = $page*3; // start from
    $per_page = 3; // perpage
?> 


    <!-- showing result with bootstrap -->
    <div class="container">
        <div class="row">
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
                    if($result->num_rows === 0) exit('Request Not Founded.');
                    while($row = $result->fetch_assoc()) {    
                ?>

                <!-- TABLE FOR GET RESULTS -->
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center" scope="col-12" ><br><span class="px-3 py-2 border border-light bg-danger"><?php echo $row['bloodgroup']; ?></span><div class="mt-2"><?php echo $row['requiredonatebag']; ?> Bags <i class="fas fa-procedures"></i></div></td>
                        </tr>
                        <tr>
                            <th scope="col">Name :</th>
                            <td class="text-left" scope="col"><?php echo $row['name']; ?> (<?php echo $row['gender']; ?>)</td>
                        </tr>
                        <tr>
                            <th scope="col">Requested Date :</th>
                            <td class="text-left" scope="col"><?php echo $row['requestdata']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-danger" scope="col">Last Date of Require Blood :</th>
                            <td class="text-left" scope="col"><span class="px-3 py-2 border border-light bg-danger"><?php echo $row['blooddonatelastdate']; ?></span></td>
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
                    $conn->close(); // db connection closs
                ?>    
            </div>



            <!-- right side -->
            <?php include 'check.php'; ?>







        </div>
    </div>


<center>
    <!-- pagination -->
    <a class="btn btn-dark" href="?page=<?php echo ($page == 0 ) ? 0 : $page-1 ?>">Previous</a>
    <?php $page++; ?>
    <a class="btn btn-dark" href="?page=<?php echo $page?>"> Next</a>
</center>

<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>