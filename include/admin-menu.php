<?php
function custom_admin_page()
{
    add_menu_page(
        'قالب فن پت',
        'آموزش ها',
        'manage_options', // only super admin can see
        'fanpet', // slug
        'custom_admin_page_content', // function name
        'dashicons-wordpress-alt', // icon
        4 // menu order
    );
}

add_action('admin_menu', 'custom_admin_page');

function custom_admin_page_content()
{
?>
    <div class="wrap">
        <h1 class="wp-heading-inline">قالب فن پت</h1>
        <p><strong>نسخه قالب:</strong> 1.0.0</p>
        
        <hr>

        <h2>🚀 نسخه بعدی در راه است!</h2>
        <p><strong>تاریخ انتشار نسخه بعدی:</strong> 25 اسفند 1403 - ساعت 00:00</p>
        
        <hr>

        <h2>ویدیو آموزشی کار با سایت</h2>
        <video width="600" controls>
            <source src="<?php echo esc_url(get_template_directory_uri() . '/assets/videos/tutorial.mp4'); ?>" type="video/mp4">
            مرورگر شما از ویدیو پشتیبانی نمی‌کند.
        </video>
    </div>
<?php
}