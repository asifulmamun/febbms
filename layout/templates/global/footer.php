                <!-- footer -->
                <footer class="mdl-mega-footer">
                    <div class="mdl-mega-footer__middle-section">

                        <div class="mdl-mega-footer__drop-down-section">
                            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
                            <h1 class="mdl-mega-footer__heading">Features</h1>
                            <ul class="mdl-mega-footer__link-list">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Partners</a></li>
                                <li><a href="#">Updates</a></li>
                            </ul>
                        </div>

                        <div class="mdl-mega-footer__drop-down-section">
                            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
                            <h1 class="mdl-mega-footer__heading">Details</h1>
                            <ul class="mdl-mega-footer__link-list">
                                <li><a href="#">Specs</a></li>
                                <li><a href="#">Tools</a></li>
                                <li><a href="#">Resources</a></li>
                            </ul>
                        </div>

                        <div class="mdl-mega-footer__drop-down-section">
                            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
                            <h1 class="mdl-mega-footer__heading">Technology</h1>
                            <ul class="mdl-mega-footer__link-list">
                                <li><a href="#">How it works</a></li>
                                <li><a href="#">Patterns</a></li>
                                <li><a href="#">Usage</a></li>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Contracts</a></li>
                            </ul>
                        </div>

                        <div class="mdl-mega-footer__drop-down-section">
                            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
                            <h1 class="mdl-mega-footer__heading">FAQ</h1>
                            <ul class="mdl-mega-footer__link-list">
                                <li><a href="#">Questions</a></li>
                                <li><a href="#">Answers</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>

                    </div><!-- mdl-mega-footer__middle-section -->

                                           
                    <?php require_once $tpl_global . 'share.php'; // Import Share Button?>

                    <div class="mdl-mega-footer__bottom-section">
                        <div class="mdl-logo">
                            <a class="logo" href="./">
                                <?php if($logo_link == ""):?>
                                    <img src="./layout/assets/img/default/febbms-logo.png" alt="<?php echo $site_name; ?>-logo">
                                <?php else:?>
                                    <img src="<?php echo $logo_link; ?>" alt="<?php echo $site_name; ?>-logo">
                                <?php endif; ?>
                            </a>
                        </div>
                        <ul class="mdl-mega-footer__link-list"><li><a title="Facebook" href="//asifulmamun.info">Developer Al Mamun - @asfiulmamun&nbsp;<img class="rounded-circle" src="//gravatar.com/avatar/<?php echo md5('asifulmamun@gmail.com'); ?>?s=16" alt="asifulmamun"></a></li></ul>
                    </div>
                </footer>

                <!--  js -->
                <script src="<?php echo $js . 'lib/material-design-lite'; ?>/material.min.js"></script>
                <script src="<?php echo $js . 'global'; ?>/global.js"></script>

            </div><!-- page content -->
        </main>
    </div><!-- mdl-layout mdl-js-layout -->
</body>
</html>
<!-- 
  =========== If Any Problem =======
  # Developer: Al Mamun - asifulmamun
  # Contact: hello@asifulmamun.info, +8801721600688, https://facebook.com/asifulmamun.info, WWW.ASIFULMAMUN.INFO
  @ Project: https://github.com/users/asifulmamun/projects/2
  @ Script Source: https://github.com/asifulmamun/febbms
-->