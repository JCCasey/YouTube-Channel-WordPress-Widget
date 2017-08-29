<?php
/*
Plugin Name: YouTube Subs
Plugin URI: https://devwrangler.com/
Description: Display YouTube Button & Count
Version: 1.0.0
Author: Justin Casey
Author URI: https://devwrangler.com/
*/

//Exit if accessed directly
if(!defined('ABSPATH')){
    exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/load.php');

// Load Class
require_once(plugin_dir_path(__FILE__).'/includes/class.php');

// Register Widget
function register_youtubesubs(){
    register_widget('YouTube_Subs_Widget');
}

// Hook in function
add_action('widgets_init', 'register_youtubesubs');