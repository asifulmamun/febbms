<header class="main_menu mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">
            <a class="logo" href="./">
                <div class="logo_bg_animate"></div>
                <?php if($logo_link == ""):?>
                    <img src="./layout/assets/img/default/febbms-logo.png" alt="<?php echo $site_name; ?>-logo">
                <?php else:?>
                    <img src="<?php echo $logo_link; ?>" alt="<?php echo $site_name; ?>-logo">
                <?php endif; ?>
            </a>
        </span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <nav class="mdl-navigation"><?php main_menu(); ?></nav>
    </div>
</header>
<div class="main_menu mdl-layout__drawer">
    <span class="mdl-layout-title">
        <a class="logo" href="./">
            <?php if($logo_link == ""):?>
                <img src="./layout/assets/img/default/febbms-logo.png" alt="<?php echo $site_name; ?>-logo">
            <?php else:?>
                <img src="<?php echo $logo_link; ?>" alt="<?php echo $site_name; ?>-logo">
            <?php endif; ?>
        </a>
    </span>
    <nav class="mdl-navigation"><?php main_menu(); ?></nav>
</div>