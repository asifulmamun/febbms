<?php

    /* Linkup DIR Header.php included */
    $tpl = 'includes/templates/'; // template dir
    $css = '../layout/css/'; // css dir
    $admin_css = 'layout/css/'; // css dir for admin
    $js = '../layout/js/'; // js dir
    $config = '../configuration/';

    /* Menu Variable */
    $home = '/admin/'; // home url (if root folder '/admin/' if other folder '/othter-Folder/admin/')
    $menu1 = 'Dashboard';
    $menu1val = $home; 
    $menu1_1 = 'Search';
    $menu1_1val = 'search.php';
    $menu2 = 'Unpublished Profile';
    $menu2val = $home.'unpublished.php';
    $menu3 = 'Log Out';
    $menu3val = $home.'index.php?do=logout';

?>