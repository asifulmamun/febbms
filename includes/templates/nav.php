    <!-- Nav Main -->
    <div class="container-fluid sticky-top">
    <div class="row">
        <div class="col-12 bg-success">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="<?php echo $home; ?>">
                <?php
                    if($site_logo != ""){
                        echo '<img style="max-width:60%;" src="' . $site_logo . '" alt="' . $site_name . '">';
                    }else{
                        echo $site_short_name; 
                    }
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $menu1val; ?>"><?php echo $menu1; ?><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $menu2val; ?>"><?php echo $menu2; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $menu3val; ?>"><?php echo $menu3; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $menu3_1val; ?>"><?php echo $menu3_1; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $menu4val; ?>"><?php echo $menu4; ?></a>
                    </li>
                   <li class="nav-item">
                        <a class="nav-link" href="<?php echo $menu5val; ?>"><?php echo $menu5; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $menu5_1val; ?>"><?php echo $menu5_1; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $menu5_2val; ?>"><?php echo $menu5_2; ?></a>
                    </li>
                    <!-- login logout -->
                   <li class="nav-item">
                        <a class="nav-link" href="<?php echo $menu6val; ?>"><?php echo $menu6; ?></a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
    </div>
    </div><!-- Nav Main -->