<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img width="80px" src="<?php echo $site_info->logo(); // logo ?>" alt="">
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $site_info->name_short; // site name short ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="./">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Donors</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a href="./page-total_donors.php" class="collapse-item p_cursor" id="total_donors_btn">Total Donors</a>
                        <a href="./page-total_donors-approved.php" class="collapse-item p_cursor" id="total_donors_btn">Approved Total Donors</a>
                        <a href="./page-total_donors-pending.php" class="collapse-item p_cursor" id="total_donors_btn">Pending Total Donors</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                User Settings
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a href="./page-edit_user.php" class="collapse-item p_cursor" id="total_donors_btn">Edit User</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <a target="_blank" title="Click here for see Al Mamun - asifulmamun" href="//gravatar.com/avatar/956c43e2b4cdd82d775917bfa1b54e86?s=1024"><img class="sidebar-card-illustration mb-2" src="//gravatar.com/avatar/956c43e2b4cdd82d775917bfa1b54e86?s=64" alt="Al Mamun - asifulmamun"></a>
                <p class="text-center mb-2"><strong>FEBBMS</strong> means February Blood Management System. This is totally free for php version. Which developed by Al Mamun - Asifulmamun. Don't change this credit. If you interest more, contact with him with facebook. <a target="_blank" class="btn btn-info btn-sm" href="//facebook.com/asifulmamun.info">FB</a> | <a target="_blank" class="btn btn-info btn-sm" href="//m.me/asifulmamun.info">Messanger</a>. Thanks Everybody..!</p><br>
                <a target="_blank" class="btn btn-success btn-sm" href="//asifulmamun.info">Visit Website</a>
            </div>

        </ul>
        <!-- End of Sidebar -->