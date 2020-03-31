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
?>


<!-- Requester Lists -->
<div id="donar" class="row">
  <div class="col-md-12">
    <!-- HEADING -->
    <div class="alert alert-success text-center mt-5" role="alert">
        Unpublished Profile Blood Donar List
    </div>
    <?php
        $pages = !empty($_REQUEST['pages']) ? $_REQUEST['pages'] : 0 ;
        $counts = $pages*10; // start from
        $per_pages = 10; // perpage

        // Getting res_donor
        $donor_data = $conn->prepare("SELECT * FROM `becomedonor` WHERE profileStatus = '0' ORDER BY id DESC LIMIT $counts, $per_pages ");
        $donor_data->execute();
        $res_donor = $donor_data->get_result();
        if($res_donor->num_rows === 0) exit('Donor List Not Founded.<br><a class="btn btn-dark" href="dashboard.php">Dashboard</a>');
    ?>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Mobile</th>
          <th scope="col">Blood Group</th>
          <th scope="col">Control</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($rows = $res_donor->fetch_assoc()) {
        ?>
        <tr>
          <th scope="row"><?php echo $rows['id'];?></th>
          <td><?php echo $rows['name'];?></td>
          <td><?php echo $rows['mobile'];?></td>
          <td><?php echo $rows['bloodGroup'];?></td>
          <td><a class="btn btn-success" href="edit-details.php?action=editDonor&id=<?php echo $rows['id'];?>">Details & Edit</a>  <a class="btn btn-success" href="edit-details.php?action=publishDonor&id=<?php echo $rows['id'];?>">Publish</a></td>
        </tr>
        <!-- ENDING LOOP -->
        <?php   
            } // while for fetch row assoc
            $donor_data->close(); // Getting Data
        ?>
      </tbody>
    </table>
    <center>
      <!-- pagination -->
      <a class="btn btn-dark" href="?pages=<?php echo ($pages == 0 ) ? 0 : $pages-1 ?>">Previous</a>
      <?php $pages++; ?>
      <a class="btn btn-dark" href="?pages=<?php echo $pages?>"> Next</a>
    </center>
  </div>
</div>





<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>