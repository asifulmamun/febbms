<?php

    /* 
        # Template Name: Home
        - header files
    ----------- */
    require_once './init.php'; // initial file
    require_once $tpl_config . 'conn.php'; // DB
    require_once $tpl_config . 'info.php'; // static information
    $template_name = basename(__FILE__, '.php'); // template name
    $page_name = 'Dashboard'; // Page name
    require_once $tpl_global . 'header.php'; // header file

?>

<?php

    /* footer file
    ----------- */
    require_once $tpl . 'content-index.php';

?>


<?php

    /* footer file
    ----------- */
    require_once $tpl_global . 'footer.php';

?>