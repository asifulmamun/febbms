<?php
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Details of Request Blood'; // template name
    include $tpl . 'header.php'; // header included
?>


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
    include $config . 'conn.php'; // db connection
    
    // Getting Result
    $req_data = $conn->prepare("SELECT * FROM `requestblood`");
    $req_data->execute();
    $result = $req_data->get_result();
    if($result->num_rows === 0) exit('Request Not Founded.');
    
    echo $result->num_rows;


    // while($row = $result->fetch_assoc()) {
    //     echo $row['id'];
    // } // while for fetch row assoc


    $req_data->close(); // Getting Data
    $conn->close(); // db connection closs

?>
<br>

<center><a class="btn btn-dark" href="index.php">Previouse Page</a></center>

<br><br>

<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>