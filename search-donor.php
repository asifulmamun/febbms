<?php
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Search Donor'; // template name
    include $tpl . 'header.php'; // header included
    include $config . 'conn.php'; // db connection

?>

<br>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-10 col-sm-12 col-xs-12">
            <center>
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
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
        </div>
    </div>
</div>


<div class="container">

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
        if($res_donor->num_rows === 0) exit('Please Search.<br><a class="btn btn-dark" href="dashboard.php">Dashboard</a>');
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
          <td><a class="btn btn-success" href="details-donor-blood.php?id=<?php echo $rows['id'];?>">Details</a></td>
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
    </div>
<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>