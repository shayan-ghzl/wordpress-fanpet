                <footer class="site-footer">
                    <div class="inner-content">
                        <?php
                            the_custom_logo();
                            
                            if (has_nav_menu('footer-menu')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'footer-menu',
                                    'container'      => 'nav',
                                    'fallback_cb'    => false
                                ));
                            }
                        ?>
                        تلفن: +989353728642
                        ایمیل: shayan97.tti@gmail.com
                    </div>
                </footer>
            </main>
        </div>
        <?php wp_footer() ?>
    </body>
</html>