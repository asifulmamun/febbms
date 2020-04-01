<?php session_start();

    /* Linkup DIR Header.php included */
    $tpl = 'includes/templates/'; // template dir
    $css = 'layout/css/'; // css dir
    $js = 'layout/js/'; // js dir
    $config = 'configuration/';

    /* Menu Variable */
    $home = '/'; // home url
    $menu1 = 'Home';
    $menu1val = $home; 
    $menu2 = 'Request For Blood';
    $menu2val = $home.'request-blood.php';
    $menu3 = 'Become A Donor';
    $menu3val = $home.'become-donor.php';
    $menu3_1 = 'Search Blood';
    $menu3_1val = $home.'search-blood.php';
    $menu4 = 'Search Blood Request';
    $menu4val = $home.'search-req.php';
    $menu5 = 'Search Donar';
    $menu5val = $home.'search-donor.php';
    $menu5_1 = 'Profile';
    $menu5_1val = $home.'dashboard.php';
    $menu5_2 = 'Edit Profile';
    $menu5_2val = $home.'edit.php';
    // log in log out
    if(isset($_SESSION['id'])){
        $menu6 = 'Log Out';
        $menu6val = $home.'process.php?do=logout';
    }else{
        $menu6 = 'Login';
        $menu6val = $home.'login.php'; 
    }

    
?>