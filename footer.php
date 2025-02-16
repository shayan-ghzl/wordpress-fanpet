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
                    </div>
                </footer>
            </div>
        </div>
        <?php wp_footer() ?>
    </body>
</html>