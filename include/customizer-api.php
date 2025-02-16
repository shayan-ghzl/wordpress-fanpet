<?php
function sanitize_checkbox($checked)
{
    return (isset($checked) && $checked == 1) ? 1 : 0;
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
