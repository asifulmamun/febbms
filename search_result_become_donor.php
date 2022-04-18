<?php

    /*
        Template Name: Search

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
    require_once $config . 'conn.php'; // DB Connection
    require_once $config . 'config.php'; // confgi file
?>



<?php

    // Pagination
    $page = !empty($_REQUEST['page']) ? $_REQUEST['page'] : 0;
    $per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 6;
    $count = $page * $per_page; // start from

    /* District Search
    -------------- */
    if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['for'] == 'becomedonor' && isset($_GET['district'])):

    $sql = "SELECT `id`, `bloodGroup`, `district`, `name`, `mobile`, `lastDateOfDonate`, `dob` FROM `becomedonor` WHERE `profileStatus` = 1 AND `bloodGroup` = ? AND `district` = ? ORDER BY `id` DESC LIMIT ?, ?";

    // Getting result_search_donor
    $search_donor = $conn->prepare($sql);
    $search_donor->bind_param('ssii', blood_group($_GET['blood_group_id']), $_GET['district'], $count, $per_page);
    $search_donor->execute();
    $result_search_donor = $search_donor->get_result();
?>

<?php
    /* Global Search
    ------------ */
  elseif($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['for'] == 'becomedonor' && !isset($_GET['district'])):

    $sql = "SELECT `id`, `bloodGroup`, `district`, `name`, `mobile`, `lastDateOfDonate`, `dob` FROM `becomedonor` WHERE `profileStatus` = 1 AND `bloodGroup` = ? ORDER BY `id` DESC LIMIT ?, ?";

    // Getting result_search_donor
    $search_donor = $conn->prepare($sql);
    $search_donor->bind_param('sii', blood_group($_GET['blood_group_id']), $count, $per_page);
    $search_donor->execute();
    $result_search_donor = $search_donor->get_result();
?>



<?php endif; ?>
<div class="mdl-grid">
    <?php while($details_result_search = $result_search_donor->fetch_assoc()): ?>
    <div class="mdl-cell mdl-cell--4-col">
        <div id="card_wrap">
            <div class="card_col blood_group"><?php echo $details_result_search['bloodGroup'];?></div>
            <div class="card_row">
                <div class="card_col id">ID&nbsp;#<?php echo $details_result_search['id'];?></div>
                <div class="card_col district"><?php echo $details_result_search['district'];?></div>
            </div>
            <div class="card_row">
                <div class="card_col"><a
                        href="./details-donor-blood.php?id=<?php echo $details_result_search['id'];?>"><?php echo $details_result_search['name'];?></a>&nbsp;(<?php echo dyas_Calculate($details_result_search['dob']);?>)
                </div>
            </div>
            <div class="card_row">
                <div class="details"><a class="mdl-button mdl-js-button mdl-button--raised"
                        href="./details-donor-blood.php?id=<?php echo $details_result_search['id'];?>">Contact</a></div>
            </div>

        </div>
    </div>
    <?php endwhile; ?>
</div>
<?php $search_donor->close(); // Getting Data ?>