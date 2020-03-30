    <nav class="navbar-dark sticky-top">
        <div class="text-center my-3">
            <a class="navbar-brand" href="<?php echo $home; ?>">
                <?php
                    if($site_logo != ""){
                        echo '<img style="max-width:60%;" src="' . $site_logo . '" alt="' . $site_name . '">';
                    }else{
                        echo $site_short_name; 
                    }
                ?>
            </a>
        </div>
        <div class="flex-column">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>