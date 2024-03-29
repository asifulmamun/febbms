<?php
    require_once './init.php'; // init
    require_once $tpl_config . 'conn.php'; // DB

    // Pagination
    $page = !empty($_REQUEST['page']) ? $_REQUEST['page'] : 0;
    $per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10;
    $count = $page * $per_page; // start from

    // search
    if(!isset($_GET['show_by_status']) && isset($_GET['search_by']) && isset($_GET['search_keyword'])):

        $search_keyword = '%'.$_GET['search_keyword'].'%';
        
        if($_GET['search_by'] == 'name'){
            $sql = "SELECT `id`, `bloodGroup`, `name`, `district`, `requeststatus` FROM `requestblood` WHERE `name` LIKE ?";
        }elseif($_GET['search_by'] == 'id'){
            $sql = "SELECT `id`, `bloodGroup`, `name`, `district`, `requeststatus` FROM `requestblood` WHERE `id` LIKE ?";
        }elseif($_GET['search_by'] == 'mobile'){
            $sql = "SELECT `id`, `bloodGroup`, `name`, `district`, `requeststatus` FROM `requestblood` WHERE `mobile` LIKE ?";
        }elseif($_GET['search_by'] == 'email'){
            $sql = "SELECT `id`, `bloodGroup`, `name`, `district`, `requeststatus` FROM `requestblood` WHERE `email` LIKE ?";
        }else{
            $sql = "SELECT `id`, `bloodGroup`, `name`, `district`, `requeststatus` FROM `requestblood` WHERE `name` LIKE ?";
        }

        // Getting result_total_donor 
        $total_donor = $conn->prepare($sql);
        $total_donor->bind_param('s', $search_keyword);

    // by status active/pending users/donors By page number and page
    elseif(isset($_GET['show_by_status']) && !isset($_GET['search_by']) && !isset($_GET['search_keyword'])):
        $show_by_status = $_GET['show_by_status'];
        
        $sql = "SELECT * FROM `requestblood` WHERE `requeststatus` = ? ORDER BY `id` DESC LIMIT ?, ?";
        // Getting result_total_donor
        $total_donor = $conn->prepare($sql);
        $total_donor->bind_param('iii', $show_by_status, $count, $per_page);

    // All users/donors By page number and page
    elseif(!isset($_GET['show_by_status']) && !isset($_GET['search_by']) && !isset($_GET['search_keyword'])):

        $sql = "SELECT * FROM `requestblood` ORDER BY `id` DESC LIMIT ?, ?";
        // Getting result_total_donor
        $total_donor = $conn->prepare($sql);
        $total_donor->bind_param('ii', $count, $per_page);

    endif;

    // execute
    $total_donor->execute();
    $result_total_donor = $total_donor->get_result();
    if($result_total_donor->num_rows == 0): echo '<div class="my-3 alert alert-danger" role="alert">No data found..!</div>'; endif;
?>

<?php while($details_result_search = $result_total_donor->fetch_assoc()): // fetch result ?>
<tr>
    <td><?php echo $details_result_search['id']; ?></td>
    <td><button type="button" class="btn btn-info"><?php echo $details_result_search['bloodgroup']; ?></button></td>
    <td><?php echo $details_result_search['name']; ?></td>
    <td><?php 
        echo $details_result_search['hospitalandaddress'] 
        . ' | ' 
        . $details_result_search['district']
        . '<br><span class="text-danger">'
        . $details_result_search['requiredonatebag']
        . '</span>'
        . ' bags blood need before '
        . '<span class="text-danger">'
        . date("M d, Y" , strtotime($details_result_search['blooddonatelastdate']))
        . '<span>';
    ?></td>
    <td>1</td>
    <td id="user_id_<?php echo $details_result_search['id'];?>_action_update">
        <a href="./page-edit_blood_request.php?id=<?php echo $details_result_search['id'];?>" class="btn btn-primary">View/Edit</a>
        <button style="margin-top:.3rem;" onClick="action_update_0('<?php echo $details_result_search['id'];?>')" type="button" class="btn btn-danger" class="btn btn-danger">Delete</button>
    </td>
</tr>
<?php endwhile; ?>

<?php $total_donor->close(); // Getting Data ?>