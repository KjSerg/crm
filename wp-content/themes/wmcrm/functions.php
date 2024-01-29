<?php
/**
 * wmcrm functions and definitions
 *
 * @package wmcrm
 */

function wmcrm_scripts()
{
    wp_enqueue_style('wmcrm-style', get_stylesheet_uri());

    wp_enqueue_style('wmcrm-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');

    wp_enqueue_style('wmcrm-fix', get_template_directory_uri() . '/assets/css/fix.css', array(), '1.0');

    wp_enqueue_script('wmcrm-jq', get_template_directory_uri() . '/assets/js/jquery.js', array(), '1.0', true);

    wp_enqueue_script('wmcrm-libs', get_template_directory_uri() . '/assets/js/libs.min.js', array(), '1.0', true);

    wp_enqueue_script('wmcrm-scripts', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);

    wp_enqueue_script('wmcrm-fix-scripts', get_template_directory_uri() . '/assets/js/fix.js', array(), '1.0', true);

    wp_localize_script('ajax-script', 'AJAX', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'wmcrm_scripts');

get_template_part('functions/helpers');
get_template_part('functions/settings');
get_template_part('functions/carbon-settings');
get_template_part('functions/ajax-functions');
get_template_part('functions/parsing-functions');
get_template_part('functions/admin-pages/parse-settings-page');