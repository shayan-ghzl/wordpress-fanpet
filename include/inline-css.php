<?php
$primary_color_setting = sanitize_hex_color(fanpet_get_theme_mod('primary_color_setting', '#000'));
$accent_color_setting = sanitize_hex_color(fanpet_get_theme_mod('accent_color_setting', '#000'));
$secondary_color_setting = sanitize_hex_color(fanpet_get_theme_mod('secondary_color_setting', '#000'));

function hex_to_rgb($hex)
{
    $hex = str_replace('#', '', $hex);

    if (strlen($hex) === 3) {
        $hex = str_repeat(substr($hex, 0, 1), 2) .
            str_repeat(substr($hex, 1, 1), 2) .
            str_repeat(substr($hex, 2, 1), 2);
    }

    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    return "{$r}, {$g}, {$b}";
}

$primary_rgb_color_setting = hex_to_rgb($primary_color_setting);
$accent_rgb_color_setting = hex_to_rgb($accent_color_setting);
$secondary_rgb_color_setting = hex_to_rgb($secondary_color_setting);

return "
    :root {
        --primary-color: {$primary_color_setting};
        --accent-color: {$accent_color_setting};
        --secondary-color: {$secondary_color_setting};

        --primary-rgb-color: {$primary_rgb_color_setting};
        --accent-rgb-color: {$accent_rgb_color_setting};
        --secondary-rgb-color: {$secondary_rgb_color_setting};
    }
";
