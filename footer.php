                <footer class="site-footer">
                    <div class="inner-content">
                        <?php
                            if (has_nav_menu('footer-menu')) {
                                echo '<div class="footer-widget-block">';
                                echo '<h3>' . __('دسترسی ها:', 'fanpet') . '</h3>';
                                wp_nav_menu(array(
                                    'theme_location' => 'footer-menu',
                                    'container'      => 'nav',
                                    'fallback_cb'    => false
                                ));
                                echo '</div>';
                            }
                        ?>
                        
                        <div class="footer-widget-block">
                            <?php the_custom_logo();  ?>
                            
                            <p><?php bloginfo('description'); ?></p>

                            <a href="mailto:shayan97.tti@gmail.com">ایمیل: shayan97.tti@gmail.com</a>
                            <a href="tel:09353728642">تلفن: 09353728642</a>
                        </div>

                        <p class="designer">طراحی و اجرا توسط <a href="#" target="_blank">لیان وب</a></p>
                    </div>
                </footer>
            </main>
        </div>
        <?php wp_footer() ?>
    </body>
</html>