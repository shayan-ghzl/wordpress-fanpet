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

                            <?php
                                $phone_number = fanpet_get_theme_mod('phone_number_setting', '');
                                $email_address = fanpet_get_theme_mod('email_address_setting', '');

                                if (!empty($email_address)) {
                                    echo '<a href="mailto:' . esc_attr($email_address) . '">ایمیل: ' . esc_html($email_address) . '</a>';
                                }

                                if (!empty($phone_number)) {
                                    echo '<a href="tel:' . esc_attr($phone_number) . '">تلفن: ' . esc_html($phone_number) . '</a>';
                                }
                            ?>
                        </div>

                        <?php
                        $show_designer_info = (int) fanpet_get_theme_mod('show_designer_info_setting', 1);
                        if ($show_designer_info) {
                        ?>
                            <p class="designer">طراحی و اجرا توسط <a href="https://shayan-ghzl.github.io/" target="_blank">لیان وب</a></p>
                        <?php  
                        }
                        ?>
                        
                    </div>
                </footer>
            </main>
        </div>
        <?php wp_footer() ?>
    </body>
</html>