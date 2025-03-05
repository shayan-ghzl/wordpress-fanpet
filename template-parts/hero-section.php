<section class="hero">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php
            for ($i = 1; $i <= 3; $i++) {
                $picture = fanpet_get_theme_mod("slider_picture_{$i}_setting");
                $small_title = fanpet_get_theme_mod("slider_small_title_{$i}_setting");
                $title = fanpet_get_theme_mod("slider_title_{$i}_setting");
                $description = fanpet_get_theme_mod("slider_description_{$i}_setting");
                $button_label = fanpet_get_theme_mod("slider_button_label_{$i}_setting");
                $button_link  = fanpet_get_theme_mod("slider_button_link_{$i}_setting");
                if ($picture) :
            ?>
                    <div class="swiper-slide">
                        <div class="content">
                            <?php if ($small_title) : ?><h3><?php echo esc_html($small_title); ?></h3><?php endif; ?>
                            <?php if ($title) : ?><h1><?php echo wp_kses_post($title); ?></h1><?php endif; ?>
                            <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                            <a class="button" href="<?php echo esc_url($button_link); ?>">
                                <?php echo esc_html($button_label ? $button_label : 'خرید کنید'); ?>
                            </a>
                        </div>
                        <img src="<?php echo esc_url($picture); ?>" alt="<?php echo esc_attr($title ? $title : 'تصویر اسلایدر'); ?>">
                    </div>
            <?php
                endif;
            }
            ?>
        </div>
    </div>
</section>