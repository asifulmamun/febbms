<br>
<center>
<form>
  <div class="form-group row">
    <div class="col-sm-12">
      <input name="do" value="req" type="hidden">
      <input name="by" value="mobile" type="hidden">
      <input name="keyword" type="text" class="form-control" placeholder="Search By Requester Mobile">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </div>
</form>
</center>


<!-- Requester Lists -->
<div id="req" class="row">
  <div class="col-md-12">
    <!-- HEADING -->
    <div class="alert alert-success text-center mt-5" role="alert">
        Blood Requested List
    </div>
    <?php
        if(isset($_GET['keyword'])){
          $keyword = $_GET['keyword']; // get key of search
        }else{
          $keyword = "a";
        }
        // Getting Result
        $req_data = $conn->prepare("SELECT * FROM `requestblood`  WHERE `mobile` LIKE '%$keyword%'");
        $req_data->execute();
        $result = $req_data->get_result();
        if($result->num_rows === 0) exit('Search Please.<br><a class="btn btn-dark" href="dashboard.php">Dashboard</a>');
    ?>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Mobile</th>
          <th scope="col">Blood Group</th>
          <th scope="col">
            <small>
              Registration Date<br>Last Date
            </small>
          </th>
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
          <td>
            <small>
              <?php
                $requestdata = $row['requestdata']; 
                $newrequestdata = date("d-M-Y", strtotime($requestdata));
                echo $newrequestdata;
              ?>
              <br>
              <span class="px-1 py-1 border border-light bg-danger">
              <?php
                $blooddonatelastdate = $row['blooddonatelastdate']; 
                $newblooddonatelastdate = date("d-M-Y", strtotime($blooddonatelastdate));
                echo $newblooddonatelastdate;
              ?>
              </span>
            </small>
          </td>
          <td><a class="btn btn-success" href="edit-details.php?action=editReq&id=<?php echo $row['id'];?>">Details</a>  <a class="btn btn-danger" href="edit-details.php?action=deleteReq&id=<?php echo $row['id'];?>">Delete</a></td>
        </tr>
        <!-- ENDING LOOP -->
        <?php   
            } // while for fetch row assoc
            $req_data->close(); // Getting Data
        ?>
      </tbody>
    </table>
  </div>
</div>