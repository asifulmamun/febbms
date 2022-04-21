<?php

/*
        Template Name: Details of Request Blood

        - # Do not change in this section.
        - There is initital file (All global information and site meta information come from here).
            @ All of global information of site come from here.
            @ You can go to init file and change this any data but don't touch this section.
            @ Do not change any data if you have not experience or understable knowledge.
            @ If you know or if you exist knoledge how to change you can change, but have a suggestion from me: Please try to with documentation.
        - # template name don't touch here.
        - # header includ, don't touch here.
    */

    
    // Header Included Part - 1
    require_once './init.php'; // initital file
    $template_name = basename(__FILE__, '.php'); // template name


    /* This is unique data finder from db it's included of top of site for seo friendly
    ------------- */
    $id = $_GET['id']; // get id
    require_once $config . 'conn.php';
    // Getting Result
    $req_data = $conn->prepare("SELECT * FROM `requestblood` WHERE id = ?");
    $req_data->bind_param('i', $id);
    $req_data->execute();
    $result = $req_data->get_result();
    if($result->num_rows === 0) exit('Request Not Founded.');
    while($row = $result->fetch_assoc()):  

    // Header Included Part - 2
    $page_name = $row['name'] . ' Need blood before ' . date("M d, Y" , strtotime($row['blooddonatelastdate'])) .  ' at ' . $row['hospitalandaddress'] . ', ' . $row['district'] . ' - ' . $site_name_short;
    require_once $tpl_global . 'header.php'; // header - config.php & conn.php included

?>

<!-- Heading -->
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <div class="site_heading">
            <?php echo $page_name;?>
        </div>
    </div>
</div>

<!-- showing result with bootstrap -->
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <div id="details">
            <table>
                <tbody>
                    <tr class="heading_table">
                        <td colspan="3" class="class_center">
                            <span class="blood_group"><?php echo $row['bloodgroup']; ?></span>
                            <div class="mt-2">
                                <?php
                                        echo $row['requiredonatebag'];
                                        if($row['requiredonatebag'] == 1){
                                            echo ' bag';
                                        }else{
                                            echo ' bags';
                                        }
                
                                    ?>
                                <i>
                                    <?php
                                        $get_date_1 = $row['blooddonatelastdate'];
                                        $get_date_2 = date('Y-m-d');

                                        $date1=date_create($get_date_2);
                                        $date2=date_create($get_date_1);
                                        $diff=date_diff($date1,$date2);
                                        $days_diff = $diff->format("(%R%a)");
                                        echo ' in ' . $days_diff . ' days';
                                        
                                    ?>
                                </i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">ID</th>
                        <td>:</td>
                        <td class="text-left" scope="col"><?php echo $row['id']; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Name</th>
                        <td>:</td>
                        <td class="text-left" scope="col"><?php echo $row['name']; ?> (<?php echo $row['gender']; ?>)
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Mobile Number</th>
                        <td>:</td>
                        <td class="text-left" scope="col"><?php echo $row['mobile']; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Blood Group</th>
                        <td>:</td>
                        <td class="text-left" scope="col"><?php echo $row['bloodgroup']; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Require Blood Bags</th>
                        <td>:</td>
                        <td class="text-left" scope="col"><span
                                class="px-3 py-2 border border-light bg-danger"><?php echo $row['requiredonatebag']; ?><small>
                                    Bags need in <?php echo $diff->format("(%R%a) days"); ?></small></span></td>
                    </tr>
                    <tr>
                        <th scope="col">Requested Date</th>
                        <td>:</td>
                        <td class="text-left" scope="col"><?php
                                $requestdata = $row['requestdate']; 
                                $newrequestdata = date("d-M-Y", strtotime($requestdata));
                                echo $newrequestdata;
                            ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Last Date Need of Blood</th>
                        <td>:</td>
                        <td class="text-left" scope="col"><span class="px-3 py-2 border border-light bg-danger"><?php
                                $blooddonatelastdate = $row['blooddonatelastdate']; 
                                $newblooddonatelastdate = date("d-M-Y", strtotime($blooddonatelastdate));
                                echo $newblooddonatelastdate;
                            ?></span></td>
                    </tr>
                    <tr>
                        <th scope="col">District</th>
                        <td>:</td>
                        <td class="text-left" scope="col"><?php echo $row['district']; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Hospital & Address</th>
                        <td>:</td>
                        <td class="text-left" scope="col"><?php echo $row['hospitalandaddress']; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Social Url</th>
                        <td>:</td>
                        <td class="text-left" scope="col"><a class="text-light"
                                href="<?php echo $row['socialurl']; ?>"><?php echo $row['socialurl']; ?></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div><!-- showing result with bootstrap -->

<?php   
    endwhile; // while for fetch row assoc
    $req_data->close(); // Getting Data
?>

<!-- Request Or Setttings -->
<div class="mdl-grid management_req">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <div class="donate">
            <span>Do you want to donate blood?</span>
            <button id="donate_button"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"
                type="button">Donate 1 Bag</button>
            <br><br>
            <div id="p3" class="mdl-progress mdl-js-progress"></div>
            <br><br>
            <span id="total_donor_req" class="mdl-badge" data-badge="0">Total interested for donate</span>
            <script>
            document.querySelector('#p3').addEventListener('mdl-componentupgraded', function() {
                this.MaterialProgress.setProgress(33);
                this.MaterialProgress.setBuffer(87);
            });
            </script>
            <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button class="mdl-snackbar__action" type="button"></button>
            </div>
            <script>
            // Donate Button Style and Function
            (function() {
                'use strict';
                var snackbarContainer = document.querySelector('#demo-snackbar-example');
                var showSnackbarButton = document.querySelector('#donate_button');
                var handler = function(event) {
                    showSnackbarButton.style.backgroundColor = '';
                };
                showSnackbarButton.addEventListener('click', function() {
                    'use strict';

                    // After Clicked Donate Button
                    let get_url = './details-request-blood-process.php?id=<?php echo $id; ?>&action=1';
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log(this.responseText);
                            action_response(this.responseText); // Update to Snackbar Button Data
                        }
                    };
                    xmlhttp.open("GET", get_url, true);
                    xmlhttp.send();

                    // Snackbar Button Data
                    function action_response(response_data) {
                        showSnackbarButton.style.backgroundColor = '#' +
                            Math.floor(Math.random() * 0xFFFFFF).toString(16);
                        var data = {
                            message: response_data,
                            timeout: 2000,
                            actionHandler: handler,
                            actionText: 'Undo'
                        };
                        snackbarContainer.MaterialSnackbar.showSnackbar(data);
                    }
                });
            }());
            </script>
        </div>
    </div>
    <br><br><br>

    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <table id="requested">
            <tr>
                <th>SL</th>
                <th>Status</th>
                <th>Name</th>
                <th>Action</th>
                <th>Phone</th>
            </tr>

            <?php
                // Getting Result
                $req_data = $conn->prepare("SELECT `id_requestblood`, `id_becomedonor`, `status`, `name`, `mobile`
                                            FROM `donate_event`
                                            INNER JOIN `becomedonor`
                                            ON becomedonor.id = donate_event.id_becomedonor
                                            WHERE id_requestblood = ?");

                $req_data->bind_param('i', $id);
                $req_data->execute();
                $result = $req_data->get_result();
                if($result->num_rows === 0) exit('Request Not Founded.');
            ?>
            <script>
                const total_donor_req = document.querySelector('#total_donor_req');
                total_donor_req.dataset.badge=<?php echo $result->num_rows; ?>;
            </script>
            <?php
                $sl_no = 0;
                while($row = $result->fetch_assoc()):
                    $sl_no+=1;
            ?>
            <tr>
                <td><?php echo $sl_no; ?></td>
                <td><?php
                    // Status
                    if($row['status']==11){
                        echo 'Approved';
                    }elseif($row['status']==1){
                        echo 'Accepted';
                    }else{
                        echo 'Requested';
                    }
                ?></td>
                <td><a
                        href="./details-donor-blood.php?id=<?php echo $row['id_becomedonor']; ?>"><?php echo $row['name']; ?></a>
                </td>
                <td><?php
                    // Action
                    if($row['status']==11){
                        echo 'Approved';
                    }elseif($row['status']==1){
                        echo '<a href="#">Reject</a>';
                    }else{

                        echo '<a href="#">Accept</a>';
                    }
                ?></td>
                <td><?php echo $row['mobile']; ?></td>

            </tr>
            <?php
                endwhile; // while for fetch row assoc
                $req_data->close(); // Getting Data
                $conn->close(); // db connection closs
            ?>
        </table>
    </div>
</div><!-- Request Or Setttings -->

<div class="prev_btton">
    <a onclick="history.back()" class="button">Previouse Page</a>
</div>

<?php

/*
        - @ Don't change this section.
        - This is just web site footer
        - This footer is default file for this app.
    */
require_once $tpl_global . 'footer.php'; // footer included
?>