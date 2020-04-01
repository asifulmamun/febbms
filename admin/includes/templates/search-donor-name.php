<br>
<center>
<form>
  <div class="form-group row">
    <div class="col-sm-12">
      <input name="do" value="donor" type="hidden">
      <input name="by" value="name" type="hidden">
      <input name="keyword" type="text" class="form-control" placeholder="Search By Donor Name">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </div>
</form>
</center>

<?php
  if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword']; // get key of search
  }else{
    $keyword = "0";
  }
?>

<!-- Requester Lists -->
<div id="donar" class="row">
  <div class="col-md-12">
    <!-- HEADING -->
    <div class="alert alert-success text-center mt-5" role="alert">
        Blood Donar List
    </div>
    <?php

        // Getting res_donor
        $donor_data = $conn->prepare("SELECT * FROM `becomedonor` WHERE `name` LIKE '%$keyword%'");
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
          <th scope="col"><small>E-mail</small></th>
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
          <td><small><?php echo $rows['email'];?></small></td>
          <td><?php echo $rows['bloodGroup'];?></td>
          <td><a class="btn btn-success" href="edit-details.php?action=editDonor&id=<?php echo $rows['id'];?>">Details & Edit</a>  <a class="btn btn-danger" href="edit-details.php?action=deleteDonor&id=<?php echo $rows['id'];?>">Delete</a></td>
        </tr>
        <!-- ENDING LOOP -->
        <?php   
            } // while for fetch row assoc
            $donor_data->close(); // Getting Data
        ?>
      </tbody>
    </table>
  </div>
</div>