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
  add_menu_page( 'Teasers', 'Teasers', 'edit_posts', 'sandorik', 'sandorik_options_page', '', 24);
}

add_action( 'admin_enqueue_scripts', 'load_sandorik_admin_styles' );
function load_sandorik_admin_styles() {
  wp_register_style( 'sandorik_admin_styles', plugin_dir_url( __FILE__ ) . 'css/snd-admin.css', false, '1.0.0' );
  wp_enqueue_style( 'sandorik_admin_styles' );

  wp_register_script( 'jquery', plugin_dir_url( __FILE__ ) . 'js/jquery.js', false, '1.12.4' );
  wp_enqueue_script( 'jquery' );

  wp_register_script( 'sandorik_admin_scripts', plugin_dir_url( __FILE__ ) . 'js/snd-admin.js', false, '1.0.0' );
  wp_enqueue_script( 'sandorik_admin_scripts' );
}

function sandorik_options_page() {
  include 'sandorik-options.php';
}
