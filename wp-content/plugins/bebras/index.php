<?php

/**
* Plugin Name: La
* Plugin URI: https://www.yourwebsiteurl.com/
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: Your Name Here
* Author URI: http://yourwebsiteurl.com/
**/



add_action('admin_menu', function(){
    add_menu_page( 'Control Panel Puslapis', 'CPanel', 'manage_options', 'panel', 'contolPanel' );
});
function contolPanel(){
    echo '<h3>Control Panel</h3>';
}