<div class="profile">
    <h4>Profile Information</h4>
    <div class="row_data">
        <div class="col_data_left">Name :</div>
        <div class="col_data_right"><?php echo get_user_info($_SESSION['id'], 'name'); ?></div>
    </div>
    <div class="row_data">
        <div class="col_data_left">Blood Group :</div>
        <div class="col_data_right"><?php echo get_user_info($_SESSION['id'], 'bloodGroup'); ?></div>
    </div>
    <div class="row_data">
        <div class="col_data_left">Date of Birth :</div>
        <div class="col_data_right"><?php echo date("d M, Y", strtotime(get_user_info($_SESSION['id'], 'dob'))); ?></div>
    </div>
    <div class="row_data">
        <div class="col_data_left">Gender :</div>
        <div class="col_data_right"><?php echo get_user_info($_SESSION['id'], 'gender'); ?></div>
    </div>
    <div class="row_data">
        <div class="col_data_left">Mobile :</div>
        <div class="col_data_right"><?php echo get_user_info($_SESSION['id'], 'mobile'); ?></div>
    </div>
    <div class="row_data">
        <div class="col_data_left">Email :</div>
        <div class="col_data_right"><?php echo get_user_info($_SESSION['id'], 'email'); ?></div>
    </div>
    <div class="row_data">
        <div class="col_data_left">Last Date of donated blood :</div>
        <div class="col_data_right"><?php echo date("d M, Y", strtotime(get_user_info($_SESSION['id'], 'lastDateOfDonate'))); ?></div>
    </div>
    <div class="row_data">
        <div class="col_data_left">District :</div>
        <div class="col_data_right"><?php echo get_user_info($_SESSION['id'], 'district'); ?></div>
    </div>
    <div class="row_data">
        <div class="col_data_left">Address :</div>
        <div class="col_data_right"><?php echo get_user_info($_SESSION['id'], 'address'); ?></div>
    </div>
    <div class="row_data">
        <div class="col_data_left">Soical URL :</div>
        <div class="col_data_right"><?php echo get_user_info($_SESSION['id'], 'socialUrl'); ?></div>
    </div>
    <div class="row_data">
        <div class="col_data_left">Member Since :</div>
        <div class="col_data_right"><?php echo date("d M, Y", strtotime(get_user_info($_SESSION['id'], 'reg_date'))); ?></div>
    </div>

</div><!-- .profile -->