<?php

    /* 
        # Template Name: Total Donor
        - header files
    ----------- */
    require_once './init.php'; // initial file
    $template_name = basename(__FILE__, '.php'); // template name
    $page_name = 'Total Donors'; // Page Name
    require_once $tpl_config . 'conn.php'; // DB
    require_once $tpl_config . 'info.php'; // static information
    require_once $tpl_global . 'header.php'; // header file

?>


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Donors List</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><a class="btn btn-info" href="./page-total_donors.php">All Donor List</a></h6>
    </div>

    <div id="control">
        <select id="per_page">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
        </select>

        <div class="alert alert-success page_count_area" role="alert">
            Page : <span id="count_page">0</span>
        </div>
        <div class="pagination_btn">
            <button id="prev_btn" type="button" class="btn btn-info">Prev</button>
            <button id="next_btn" type="button" class="btn btn-info">Next</button>                           
        </div>

        <form name="donor_search" id="donor_search" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <select id="search_by" name="search_by" class="form-control">
                    <option value="name">By Name</option>
                    <option value="id">By ID</option>
                    <option value="mobile">By Mobile</option>
                    <option value="email">By Email</option>
                </select>
                <input name="donor_search_keyword" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button id="btn_donor_search" class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="show_by_status">
            <button id="show_by_status_1" type="button" class="btn btn-success">Approved List</button>
            <button id="show_by_status_0" type="button" class="btn btn-warning">Pending List</button>                           
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>BG</th>
                        <th>Name</th>
                        <th>District</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>BG</th>
                        <th>District</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
                <tbody id="result">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    // page redirection after click
    const show_by_status_1 = document.getElementById('show_by_status_1');
    show_by_status_1.addEventListener('click', (event) => {
        window.location.href = "./page-total_donors-approved.php";
    });
    const show_by_status_0 = document.getElementById('show_by_status_0');
    show_by_status_0.addEventListener('click', (event) => {
        window.location.href = "./page-total_donors-pending.php";
    });

    /* Status Update
    ------------ */
    function action_update_0(user_id){

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                // action button change
                document.getElementById(`user_id_${this.responseText}_action_update`).innerHTML = `<button id="user_id_${this.responseText}_user_id_action_update" onClick="action_update_1(${this.responseText})" type="button" class="btn btn-success">Approve</button>`;

                // status change
                document.getElementById(`user_id_${this.responseText}_profile_status`).innerHTML = `<span class="btn btn-warning">Pending</span>`;

            }
        };

        let get_url = `./process-donor.php?id=${user_id}&status=0`;
        xmlhttp.open("GET", get_url, true);
        xmlhttp.send();

    }

    function action_update_1(user_id){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                // action button change
                document.getElementById(`user_id_${this.responseText}_action_update`).innerHTML = `<button id="user_id_${this.responseText}_user_id_action_update" onClick="action_update_0(${this.responseText})" type="button" class="btn btn-danger">Un Approve</button>`;

                // status change
                document.getElementById(`user_id_${this.responseText}_profile_status`).innerHTML = `<span class="btn btn-primary">Approved</span>`;

            }
        };

        let get_url = `./process-donor.php?id=${user_id}&status=1`;
        xmlhttp.open("GET", get_url, true);
        xmlhttp.send();
    }

    /* Pagination and Page per selection
    ------------------------------------- */
    // Per Page Selection
    const selection_per_page = document.getElementById('per_page');
    selection_per_page.addEventListener('change', (event) => {
        show_page(`./page-total_donors-list.php?per_page=${selection_per_page.value}`);
    });

    // Pagination Controler
    const prev_btn = document.getElementById('prev_btn');
    const next_btn = document.getElementById('next_btn');
    const count_page = document.getElementById('count_page');

    // previous button
    prev_btn.addEventListener('click', (event) => {

        let page_count = count_page.innerText;
        --page_count;

        if (count_page.innerText > 0) {
            count_page.innerText = page_count;
            show_page(`./page-total_donors-list.php?per_page=${selection_per_page.value}&page=${page_count}`);
        }
        
    });

    // next button
    next_btn.addEventListener('click', (event) => {

        let page_count = count_page.innerText;
        page_count++;
        count_page.innerText = page_count;
        
        show_page(`./page-total_donors-list.php?per_page=${selection_per_page.value}&page=${page_count}`);
    });

    /* Search
    ------------- */
    const donor_search_search_by = document.donor_search.search_by;
    const donor_search_keyword = document.donor_search.donor_search_keyword;
    const btn_donor_search = document.getElementById('btn_donor_search');
    btn_donor_search.addEventListener('click', (event) => {

        show_page(`./page-total_donors-list.php?search_by=${donor_search_search_by.value}&search_keyword=${donor_search_keyword.value}&per_page=${selection_per_page.value}`);
        
        console.log(donor_search_search_by.value + ' ' + donor_search_keyword.value);
    });


    /* Showong List
    ----------- */
    function show_page(get_url){
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", get_url, true);
        xmlhttp.send();
    }
    show_page(`./page-total_donors-list.php?per_page=5`);
</script>


<?php

/* footer file
----------- */
require_once $tpl_global . 'footer.php';

?>