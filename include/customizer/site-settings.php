<?php
/*
* Slider Section
*/
$wp_customize->add_section('slider_section_sub_panel', array(
    'title' => __('Slider Section', 'fanpet'),
    'panel'    => 'fanpet_panel',
    'priority' => 120,
));
// ------------------------------
$wp_customize->add_setting('show_slider_setting', array(
    'default'           => 1,
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_checkbox',
));
$wp_customize->add_control('show_slider_control', array(
    'label'    => __('Show Slider', 'fanpet'),
    'section'  => 'slider_section_sub_panel',
    'settings' => 'show_slider_setting',
    'type'     => 'checkbox',
));
for ($i = 1; $i <= 3; $i++) {
    $wp_customize->add_setting("slider_picture_{$i}_setting", array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "slider_picture_{$i}_control", array(
        'label'    => __("Picture {$i}", 'fanpet'),
        'section'  => 'slider_section_sub_panel',
        'settings' => "slider_picture_{$i}_setting",
    )));
    $wp_customize->add_setting("slider_small_title_{$i}_setting", array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("slider_small_title_{$i}_control", array(
        'label'    => __("Small Title {$i}", 'fanpet'),
        'section'  => 'slider_section_sub_panel',
        'settings' => "slider_small_title_{$i}_setting",
        'type'     => 'text',
    ));
    $wp_customize->add_setting("slider_title_{$i}_setting", array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control("slider_title_{$i}_control", array(
        'label'    => __("Title {$i}", 'fanpet'),
        'section'  => 'slider_section_sub_panel',
        'settings' => "slider_title_{$i}_setting",
        'type'     => 'text',
    ));
    $wp_customize->add_setting("slider_description_{$i}_setting", array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control("slider_description_{$i}_control", array(
        'label'    => __("Description {$i}", 'fanpet'),
        'section'  => 'slider_section_sub_panel',
        'settings' => "slider_description_{$i}_setting",
        'type'     => 'textarea',
    ));
    $wp_customize->add_setting("slider_button_label_{$i}_setting", array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("slider_button_label_{$i}_control", array(
        'label'    => __("Button Label {$i}", 'fanpet'),
        'section'  => 'slider_section_sub_panel',
        'settings' => "slider_button_label_{$i}_setting",
        'type'     => 'text',
    ));
    $wp_customize->add_setting("slider_button_link_{$i}_setting", array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control("slider_button_link_{$i}_control", array(
        'label'    => __("Button Link {$i}", 'fanpet'),
        'section'  => 'slider_section_sub_panel',
        'settings' => "slider_button_link_{$i}_setting",
        'type'     => 'url',
    ));
}
/*
* Feature Section
*/
$wp_customize->add_section('feature_section_sub_panel', array(
    'title' => __('Feature Section', 'fanpet'),
    'panel'    => 'fanpet_panel',
    'priority' => 120,
));
// ------------------------------
$wp_customize->add_setting('show_feature_setting', array(
    'default'           => 1,
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_checkbox',
));
$wp_customize->add_control('show_feature_control', array(
    'label'    => __('Show Feature', 'fanpet'),
    'section'  => 'feature_section_sub_panel',
    'settings' => 'show_feature_setting',
    'type'     => 'checkbox',
));
for ($i = 1; $i <= 4; $i++) {
    $wp_customize->add_setting("feature_icon_{$i}_setting", array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "feature_icon_{$i}_control", array(
        'label'    => __("Feature Icon {$i}", 'fanpet'),
        'section'  => 'feature_section_sub_panel',
        'settings' => "feature_icon_{$i}_setting",
    )));
    $wp_customize->add_setting("feature_title_{$i}_setting", array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("feature_title_{$i}_control", array(
        'label'    => __("Feature Title {$i}", 'fanpet'),
        'section'  => 'feature_section_sub_panel',
        'settings' => "feature_title_{$i}_setting",
        'type'     => 'text',
    ));
    $wp_customize->add_setting("feature_description_{$i}_setting", array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control("feature_description_{$i}_control", array(
        'label'    => __("Feature Description {$i}", 'fanpet'),
        'section'  => 'feature_section_sub_panel',
        'settings' => "feature_description_{$i}_setting",
        'type'     => 'textarea',
    ));
}
/*
* Footer Section
*/
$wp_customize->add_section('footer_section_sub_panel', array(
    'title' => __('Footer Section', 'fanpet'),
    'panel'    => 'fanpet_panel',
    'priority' => 120,
));
// ------------------------------
$wp_customize->add_setting('show_designer_info_setting', array(
    'default'           => 1,
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_checkbox',
));
$wp_customize->add_control('show_designer_info_control', array(
    'label'    => __('Show Designer Info', 'fanpet'),
    'section'  => 'footer_section_sub_panel',
    'settings' => 'show_designer_info_setting',
    'type'     => 'checkbox',
));
$wp_customize->add_setting('phone_number_setting', array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('phone_number_control', array(
    'label'    => __('Phone Number', 'fanpet'),
    'section'  => 'footer_section_sub_panel',
    'settings' => 'phone_number_setting',
    'type'     => 'text',
));
$wp_customize->add_setting('email_address_setting', array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_email',
));
$wp_customize->add_control('email_address_control', array(
    'label'    => __('Email Address', 'fanpet'),
    'section'  => 'footer_section_sub_panel',
    'settings' => 'email_address_setting',
    'type'     => 'email',
));
/*
* Colors
*/
$wp_customize->add_section('color_palete_sub_panel', array(
    'title' => __('Colors', 'fanpet'),
    'panel'    => 'fanpet_panel',
    'priority' => 120,
));
// ------------------------------
$wp_customize->add_setting('header_footer_color_setting', array(
    'default'     => '#613abc',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'header_footer_color_control',
    array(
        'label' => __('Header and Footer Color', 'fanpet'),
        'section'    => 'color_palete_sub_panel',
        'settings'   => 'header_footer_color_setting',
    )
));
$wp_customize->add_setting('primary_color_setting', array(
    'default'     => '#613abc',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'primary_color_control',
    array(
        'label' => __('Primary Color', 'fanpet'),
        'section'    => 'color_palete_sub_panel',
        'settings'   => 'primary_color_setting',
    )
));
/*
* Components Colors
*/
$wp_customize->add_section('components_color_palete_sub_panel', array(
    'title' => __('Components Colors', 'fanpet'),
    'panel'    => 'fanpet_panel',
    'priority' => 120,
));
// ------------------------------
$components_colors = [
    // Button Colors
    'button_color' => ['#fff', __('Button Text Color', 'fanpet')],
    'button_hover_color' => ['#fff', __('Button Text Hover Color', 'fanpet')],
    'button_active_color' => ['#fff', __('Button Text Active Color', 'fanpet')],
    'button_bg_color' => ['#613abc', __('Button Background Color', 'fanpet')],
    'button_hover_bg_color' => ['#4d2e95', __('Button Hover Background Color', 'fanpet')],
    'button_active_bg_color' => ['#4d2e95', __('Button Active Background Color', 'fanpet')],
    'button_border_color' => ['#000', __('Button Border Color', 'fanpet')],
    'button_hover_border_color' => ['#000', __('Button Hover Border Color', 'fanpet')],
    'button_active_border_color' => ['#000', __('Button Active Border Color', 'fanpet')],
    // Input Colors
    'input_color' => ['#2c2c2c', __('Input Text Color', 'fanpet')],
    'input_background_color' => ['#fff', __('Input Background Color', 'fanpet')],
    'input_border_color' => ['#613abc', __('Input Border Color', 'fanpet')],
    'input_focus_border_color' => ['#613abc', __('Input Focus Border Color', 'fanpet')],
];
foreach ($components_colors as $key => $value) {
    $wp_customize->add_setting("{$key}_setting", [
        'default' => $value[0],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        "{$key}_control",
        [
            'label' => $value[1],
            'section' => 'components_color_palete_sub_panel',
            'settings' => "{$key}_setting",
        ]
    ));
}
