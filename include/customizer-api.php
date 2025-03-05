<?php
function sanitize_checkbox($checked)
{
    return (isset($checked) && $checked == 1) ? 1 : 0;
}
function sanitize_rgba_color($color)
{
    if (preg_match('/^rgba?\((\d{1,3}),\s?(\d{1,3}),\s?(\d{1,3}),\s?(0|1|0?\.\d{1,2})\)$/', $color, $matches)) {
        if ($matches[1] > 255 || $matches[2] > 255 || $matches[3] > 255) {
            return 'rgba(0,0,0,0)';
        }
        return $color;
    }
    return 'rgba(0,0,0,0)';
}
class Fanpet_Customizer
{
    public function __construct()
    {
        add_action('customize_register', array($this, 'register'));
    }

    public function register(WP_Customize_Manager $wp_customize)
    {
        $wp_customize->add_panel('fanpet_panel', array(
            'priority'       => 10,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Fanpet', 'fanpet'),
            'description' => __('Fanpet Customization Description', 'fanpet'),
        ));

        require_once get_template_directory() . '/include/customizer/site-settings.php';
    }
}
new Fanpet_Customizer;
