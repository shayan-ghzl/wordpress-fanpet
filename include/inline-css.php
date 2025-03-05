<?php
$header_footer_color_setting = sanitize_hex_color(fanpet_get_theme_mod('header_footer_color_setting', '#000'));
$primary_color_setting = sanitize_hex_color(fanpet_get_theme_mod('primary_color_setting', '#000'));

$button_color_setting = sanitize_hex_color(fanpet_get_theme_mod('button_color_setting', '#000'));
$button_hover_color_setting = sanitize_hex_color(fanpet_get_theme_mod('button_hover_color_setting', '#000'));
$button_active_color_setting = sanitize_hex_color(fanpet_get_theme_mod('button_active_color_setting', '#000'));
$button_bg_color_setting = sanitize_hex_color(fanpet_get_theme_mod('button_bg_color_setting', '#000'));
$button_hover_bg_color_setting = sanitize_hex_color(fanpet_get_theme_mod('button_hover_bg_color_setting', '#000'));
$button_active_bg_color_setting = sanitize_hex_color(fanpet_get_theme_mod('button_active_bg_color_setting', '#000'));
$button_border_color_setting = sanitize_hex_color(fanpet_get_theme_mod('button_border_color_setting', '#000'));
$button_hover_border_color_setting = sanitize_hex_color(fanpet_get_theme_mod('button_hover_border_color_setting', '#000'));
$button_active_border_color_setting = sanitize_hex_color(fanpet_get_theme_mod('button_active_border_color_setting', '#000'));

$input_color_setting = sanitize_hex_color(fanpet_get_theme_mod('input_color_setting', '#000'));
$input_background_color_setting = sanitize_hex_color(fanpet_get_theme_mod('input_background_color_setting', '#000'));
$input_border_color_setting = sanitize_hex_color(fanpet_get_theme_mod('input_border_color_setting', '#000'));
$input_focus_border_color_setting = sanitize_hex_color(fanpet_get_theme_mod('input_focus_border_color_setting', '#000'));

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

$header_footer_rgb_color_setting = hex_to_rgb($header_footer_color_setting);
$primary_rgb_color_setting = hex_to_rgb($primary_color_setting);

$button_rgb_color_setting = hex_to_rgb($button_color_setting);
$button_hover_rgb_color_setting = hex_to_rgb($button_hover_color_setting);
$button_active_rgb_color_setting = hex_to_rgb($button_active_color_setting);
$button_bg_rgb_color_setting = hex_to_rgb($button_bg_color_setting);
$button_hover_bg_rgb_color_setting = hex_to_rgb($button_hover_bg_color_setting);
$button_active_bg_rgb_color_setting = hex_to_rgb($button_active_bg_color_setting);
$button_border_rgb_color_setting = hex_to_rgb($button_border_color_setting);
$button_hover_border_rgb_color_setting = hex_to_rgb($button_hover_border_color_setting);
$button_active_border_rgb_color_setting = hex_to_rgb($button_active_border_color_setting);

$input_rgb_color_setting = hex_to_rgb($input_color_setting);
$input_background_rgb_color_setting = hex_to_rgb($input_background_color_setting);
$input_border_rgb_color_setting = hex_to_rgb($input_border_color_setting);
$input_focus_border_rgb_color_setting = hex_to_rgb($input_focus_border_color_setting);

return "
    :root {
        --header-footer-color: {$header_footer_color_setting};
        --header-footer-rgb-color: {$header_footer_rgb_color_setting};
        --primary-color: {$primary_color_setting};
        --primary-rgb-color: {$primary_rgb_color_setting};

        --button-color: {$button_color_setting};
        --button-hover-color: {$button_hover_color_setting};
        --button-active-color: {$button_active_color_setting};
        --button-background-color: {$button_bg_color_setting};
        --button-hover-background-color: {$button_hover_bg_color_setting};
        --button-active-background-color: {$button_active_bg_color_setting};
        --button-border-color: {$button_border_color_setting};
        --button-hover-border-color: {$button_hover_border_color_setting};
        --button-active-border-color: {$button_active_border_color_setting};
        --button-rgb-color: {$button_rgb_color_setting};
        --button-hover-rgb-color: {$button_hover_rgb_color_setting};
        --button-active-rgb-color: {$button_active_rgb_color_setting};
        --button-background-rgb-color: {$button_bg_rgb_color_setting};
        --button-hover-background-rgb-color: {$button_hover_bg_rgb_color_setting};
        --button-active-background-rgb-color: {$button_active_bg_rgb_color_setting};
        --button-border-rgb-color: {$button_border_rgb_color_setting};
        --button-hover-border-rgb-color: {$button_hover_border_rgb_color_setting};
        --button-active-border-rgb-color: {$button_active_border_rgb_color_setting};

        --input-color: {$input_color_setting};
        --input-background-color: {$input_background_color_setting};
        --input-border-color: {$input_border_color_setting};
        --input-focus-border-color: {$input_focus_border_color_setting};
        --input-rgb-color: {$input_rgb_color_setting};
        --input-background-rgb-color: {$input_background_rgb_color_setting};
        --input-border-rgb-color: {$input_border_rgb_color_setting};
        --input-focus-border-rgb-color: {$input_focus_border_rgb_color_setting};
    }
";