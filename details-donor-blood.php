<?php

/*
        Template Name: Details of Donor

        - # Do not change in this section.
        - There is initital file (All global information and site meta information come from here).
            @ All of global information of site come from here.
            @ You can go to init file and change this any data but don't touch this section.
            @ Do not change any data if you have not experience or understable knowledge.
            @ If you know or if you exist knoledge how to change you can change, but have a suggestion from me: Please try to with documentation.
        - # template name don't touch here.
        - # header includ, don't touch here.
    */
require_once './init.php'; // initital file
$template_name = basename(__FILE__, '.php'); // template name
$page_name = $site_name_short . ' - Details of Donor';
require_once $tpl_global . 'header.php'; // header - config.php & conn.php included
?>

<!-- Heading -->
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <div class="site_heading">
            <?php echo $page_name; ?>
        </div>
    </div>
</div>

<?php
    $id = $_GET['id']; // get id
    // Getting Result
    $req_data = $conn->prepare("SELECT * FROM `becomedonor` WHERE id = ?");
    $req_data->bind_param('i', $id);
    $req_data->execute();
    $result = $req_data->get_result();

    if ($result->num_rows === 0) exit('Request Not Founded.');
    while ($row = $result->fetch_assoc()):
?>

    <!-- showing result with bootstrap -->
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
            <div id="details">
                <table>
                    <tbody>
                        <tr class="heading_table">
                            <td colspan="3" class="class_center">
                                <span class="blood_group"><?php echo $row['bloodGroup']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <td>:</td>
                            <td><?php echo $row['id']; ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td><?php echo $row['name']; ?> (<?php echo $row['gender']; ?>)</td>
                        </tr>
                        <tr>
                            <th>Mobile Number | E-mail</th>
                            <td>:</td>
                            <td><a href="tel:<?php echo $row['mobile']; ?>"><?php echo $row['mobile']; ?></a>&nbsp;|&nbsp;<a class="text-light" href="mailto:<?php echo $row['email']; ?>"><i><small><?php echo $row['email']; ?></small></i></a></td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td>:</td>
                            <td><?php echo $row['bloodGroup']; ?></td>
                        </tr>
                        <tr>
                            <th>Last Donate Date</th>
                            <td>:</td>
                            <td><?php echo $row['lastDateOfDonate']; ?></td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>:</td>
                            <td><?php echo dyas_Calculate($row['dob']); ?></td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td>:</td>
                            <td><?php echo $row['district']; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>:</td>
                            <td><?php echo $row['address']; ?></td>
                        </tr>
                        <tr>
                            <th>Social Url</th>
                            <td>:</td>
                            <td><a class="text-light" href="<?php echo $row['socialUrl']; ?>"><?php echo $row['socialUrl']; ?></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
endwhile; // while for fetch row assoc
$req_data->close(); // Getting Data
$conn->close(); // db connection closs
?>

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