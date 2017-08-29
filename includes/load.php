<?php 
//Add Scripts
function addScripts (){
    //Add Main CSS
    wp_enqueue_style('main-styles', plugins_url(). '/youtubesubs/css/style.css');

    //Add Main JS
    wp_enqueue_script('main-scripts', plugins_url(). '/youtubesubs/js/main.js');

    //Add YouTube Script
    wp_register_script('google', 'https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');
    
}

add_action('wp_enqueue_scripts', 'addScripts');