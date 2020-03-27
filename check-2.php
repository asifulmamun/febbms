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










<div class="col-md-6 col-sm-12 col-xs-12">
    <!-- HEADING -->
    <div class="alert alert-success text-center mt-5" role="alert">
        Donor List
    </div>

    <?php
        // Getting res_donor
        $donor_data = $conn->prepare("SELECT * FROM `becomedonor` WHERE profileStatus = '0' ORDER BY id DESC LIMIT $count, $per_page ");
        $donor_data->execute();
        $res_donor = $donor_data->get_result();
        if($res_donor->num_rows === 0) exit('Request Not Founded.');
        while($rows = $res_donor->fetch_assoc()) {    
    ?>

    <!-- TABLE FOR GET res_donorS -->
    <table class="table table-hover table-dark">
        <tbody>
            <tr>
                <th scope="col">Name :</th>
                <td class="text-left" scope="col"><?php echo $rows['name']; ?> (<?php echo $rows['gender']; ?>)</td>
            </tr>
        </tbody>
    </table>

    <!-- ENDING LOOP -->
    <?php   
        } // while for fetch rows assoc
        $donor_data->close(); // Getting Data
        $conn->close(); // db connection closs
    ?>
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