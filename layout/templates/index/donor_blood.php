<h3 class="text_center"><span class="Donor_List_Heading">List of Donor</span></h3>

<?php
$pages = !empty($_REQUEST['pages']) ? $_REQUEST['pages'] : 0;
$counts = $pages * 10; // start from
$per_pages = 10; // perpage

// Getting res_donor
$donor_data = $conn->prepare("SELECT * FROM `becomedonor` WHERE profileStatus = '1' ORDER BY id DESC LIMIT ?, ?");
$donor_data->bind_param('ii', $counts, $per_pages);
$donor_data->execute();
$res_donor = $donor_data->get_result();

if ($res_donor->num_rows === 0) echo('Donor List Not Founded.');

while ($rows = $res_donor->fetch_assoc()) {
?>

    <!-- Two Line List with secondary info and action -->
    <style>
        .demo-list-two {
            width: 300px;
        }
    </style>

    <ul id="donor_lists" class="demo-list-two mdl-list">
        <li class="mdl-list__item mdl-list__item--two-line">
            <span class="mdl-list__item-primary-content">
                <span>
                    <a href="./details-donor-blood.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></a>&nbsp;<span class="id">(ID: <?php echo $rows['id']; ?>)</span>
                </span><br>
                <span class="mdl-list__item-sub-title">
                    <address><?php echo $rows['district']; ?></address>
                    <small><?php echo $rows['lastDateOfDonate']; ?></small>
                </span>
            </span>
            <span class="mdl-list__item-secondary-content">
                <span class="bgroupContent"><span class="blood_group"><?php echo $rows['bloodGroup']; ?></span></span>
            </span>
        </li>
    </ul>


<?php
} // while for fetch rows assoc
$donor_data->close(); // Getting Data Close
?>

<center>
    <!-- pagination -->
    <a class="btn btn-dark" href="?pages=<?php echo ($pages == 0) ? 0 : $pages - 1 ?>#donor_lists">Previous</a>
    <?php $pages++; ?>
    <a class="btn btn-dark" href="?pages=<?php echo $pages ?>#donor_lists"> Next</a>
</center>