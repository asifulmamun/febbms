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
    $template_name = basename(__FILE__, '.php'); // template name
    $page_name = $site_name_short . ' - Search';
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

<div class="mdl-grid">

    <!-- Sidebar -->
    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
        <div class="sidebar">
            <nav class="dashboard_nav">
                <ul>
                    <li><a href="./search.php?action=global_search">Global Search</a></li>
                    <li><a href="./search.php?action=district_search">Find Donor From Your District</a></li>
                </ul>
            </nav>
        </div>
    </div><!-- sidebar -->


    <!-- content -->
    <div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet mdl-cell--8-col-phone">
        <div id="content">

            <?php if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'global_search'): // Global Search ?>
            <?php require_once $tpl . 'search/global_search.php'; ?>


            <?php elseif($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'district_search'): ?>
            <?php require_once $tpl . 'search/district_search.php'; ?>

            <?php else: ?>
            <?php require_once $tpl . 'search/global_search.php'; ?>
            <?php endif; // Profile ?>
        </div>
    </div><!-- content -->

    <!-- Show Result -->
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
        <!-- Pagination -->
        <div class="text_center">
            <button id="prev_btn" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Prev</button>
            <button id="next_btn" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Next</button>
        </div>
        <br>
        <div class="text_center">
            Page: <span id="count_page">0</span>
        </div>
        <div id="result"></div>
    </div>

</div><!-- .mdl-grid -->

<script>
function prev_btn() {
    let prev_btn = document.getElementById('prev_btn');

    if (prev_btn) {
        prev_btn.addEventListener('click', function() {

            let page_count = document.getElementById('count_page').innerText;
            --page_count;

            if (document.getElementById('count_page').innerText > 0) {
                document.getElementById('count_page').innerText = page_count;

                let blood_group_id = document.search_become_donor.blood_group_id.value; // blood group id
                let district = document.search_become_donor.district; // district

                if (district) {
                    showUser(blood_group_id, district.value, 6, page_count);

                } else{

                    showUser(blood_group_id, 6, page_count);
                }
            }
        });
    }
}
prev_btn();

function next_btn() {
    let next_btn = document.getElementById('next_btn');

    if (next_btn) {
        next_btn.addEventListener('click', function() {

            let page_count = document.getElementById('count_page').innerText;
            page_count++;
            document.getElementById('count_page').innerText = page_count;

            let blood_group_id = document.search_become_donor.blood_group_id.value; // blood group id
            let district = document.search_become_donor.district; // district

            if (district) {
                showUser(blood_group_id, district.value, 6, page_count);

            } else {

                showUser(blood_group_id, 6, page_count);
            }
        });
    }
}
next_btn();
</script>

<?php

    /*
        - @ Don't change this section.
        - This is just web site footer
        - This footer is default file for this app.
    */
    require_once $tpl_global . 'footer.php'; // footer included
?>