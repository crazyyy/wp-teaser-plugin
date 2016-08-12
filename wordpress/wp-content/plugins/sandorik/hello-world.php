<?php
/*
 * Plugin Name: Sandorik
 * Version: 2016.08.08
 * Description: Small widget plugin
 * Author: Vitalii Antoniuk
 * Author URI: http://saitobaza.ru
 * Plugin URI: https://github.com/crazyyy
 * Text Domain: sandorik
 * Domain Path: /languages
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0
*/


add_action('admin_menu', 'sandorik_options');
function sandorik_options() {
  add_menu_page( 'Teasers', 'Teasers', 'edit_posts', 'awesome_page', 'my_awesome_page_display', '', 24);
}

function my_awesome_page_display() {
  include 'sandorik-options.php';
}
