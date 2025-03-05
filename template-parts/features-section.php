<section class="features">
    <?php for ($i = 1; $i <= 4; $i++) :
        $icon = fanpet_get_theme_mod("feature_icon_{$i}_setting");
        $title = fanpet_get_theme_mod("feature_title_{$i}_setting");
        $description = fanpet_get_theme_mod("feature_description_{$i}_setting");

        if ($icon || $title || $description) : ?>
            <div class="card">
                <?php if ($icon) : ?>
                    <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title ? $title : 'آیکون تصویر'); ?>">
                <?php endif; ?>
                <div class="content">
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endfor; ?>
</section>