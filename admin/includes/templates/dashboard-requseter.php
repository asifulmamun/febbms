<!-- Requester Lists -->
<div id="req" class="row">
  <div class="col-md-12">
    <!-- HEADING -->
    <div class="alert alert-success text-center mt-5" role="alert">
        Blood Requested List
    </div>
    <?php
        $page = !empty($_REQUEST['page']) ? $_REQUEST['page'] : 0 ;
        $count = $page*3; // start from
        $per_page = 3; // perpage

        // Getting Result
        $req_data = $conn->prepare("SELECT * FROM `requestblood`  WHERE requeststatus = '1' ORDER BY id DESC LIMIT $count, $per_page ");
        $req_data->execute();
        $result = $req_data->get_result();
        if($result->num_rows === 0) exit('Blood Request Not Founded.<br><a class="btn btn-dark" href="dashboard.php">Dashboard</a>');
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
          while($row = $result->fetch_assoc()) {    
        ?>
        <tr>
          <th scope="row"><?php echo $row['id'];?></th>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['mobile'];?></td>
          <td><?php echo $row['bloodgroup'];?></td>
          <td><a class="btn btn-success" href="edit-req.php?action=edit&id=<?php echo $row['id'];?>">Details & Edit</a>  <a class="btn btn-danger" href="edit-req.php?action=delete&id=<?php echo $row['id'];?>">Delete</a></td>
        </tr>
        <!-- ENDING LOOP -->
        <?php   
            } // while for fetch row assoc
            $req_data->close(); // Getting Data
        ?>
      </tbody>
    </table>
    <center>
        <!-- pagination -->
        <a class="btn btn-dark" href="?page=<?php echo ($page == 0 ) ? 0 : $page-1 ?>#req">Previous</a>
        <?php $page++; ?>
        <a class="btn btn-dark" href="?page=<?php echo $page?>#req"> Next</a>
    </center> 
  </div>
</div>