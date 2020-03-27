<div class="col-md-6 col-sm-12 col-xs-12">
    <!-- HEADING -->
    <div class="alert alert-success text-center mt-5" role="alert">
        Donor List
    </div>

    <?php

    
        $sql = "SELECT * FROM `becomedonor` WHERE profileStatus = '0' ORDER BY id DESC LIMIT $count, $per_page";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row['id'];
            }

        $conn->close();










    ?>
