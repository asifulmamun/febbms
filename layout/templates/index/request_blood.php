<h3 class="text_center"><span class="Donor_List_Heading">Request For Blood</span></h3>


<!-- pagination number get with GET method and calculate -->
<?php

$page = !empty($_REQUEST['page']) ? $_REQUEST['page'] : 0;
$count = $page * 10; // start from
$per_page = 10; // perpage

// Getting Result
$req_data = $conn->prepare("SELECT * FROM `requestblood`  WHERE requeststatus = '1' ORDER BY id DESC LIMIT ?, ?");
$req_data->bind_param('ii', $count, $per_page);
$req_data->execute();
$result = $req_data->get_result();

if ($result->num_rows === 0) echo('Blood Request Not Founded.');

while ($row = $result->fetch_assoc()) {
?>

    <!-- Two Line List with secondary info and action -->
    <style>
        .demo-list-two {
            width: 300px;
        }
    </style>

<ul id="request_lists" class="demo-list-two mdl-list">
        <li class="mdl-list__item mdl-list__item--two-line">
            <span class="mdl-list__item-primary-content">
                <span><a href="./details-request-blood.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></span><br>
                <span class="mdl-list__item-sub-title">
                    <address title="Hospital: <?php echo $row['hospitalandaddress']; ?>"><?php echo $row['district']; ?></address>
                    <small class="mobile" title="Contact, Click to for Call"><a href="tel:<?php echo $row['mobile']; ?>"><?php echo $row['mobile']; ?></a></small>
                </span>
            </span>
            <span class="mdl-list__item-secondary-content">
                <span class="bgroupContent" title="Blood Group"><span class="blood_group"><?php echo $row['bloodgroup']; ?></span></span>
                <span class="bloodRequireBlood" title="How many blood need to her"><?php echo ($row['requiredonatebag'] > 1) ? $row['requiredonatebag'] . ' bags':$row['requiredonatebag'] . ' bag'; ?></span>
            </span>
        </li>
    </ul>


<?php
} // while for fetch row assoc
$req_data->close(); // Getting Data
?>

<center>
    <!-- pagination -->
    <a class="btn btn-dark" href="?page=<?php echo ($page == 0) ? 0 : $page - 1 ?>#request_lists">Previous</a>
    <?php $page++; ?>
    <a class="btn btn-dark" href="?page=<?php echo $page ?>#request_lists"> Next</a>
</center>