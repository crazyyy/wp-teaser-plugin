<?php
/*
 * Plugin Name: Sandorik
 * Version: 2016.08.08
 * Description: Small widget plugin
 * Author: Vitalii Antoniuk
 * Author URI: #
 * Plugin URI: #
 * Text Domain: sandorik
 * Domain Path: /languages
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0
*/



global $snd_db_version;
$snd_db_version = "1.0";

register_activation_hook(__FILE__,'snd_install');
function snd_install () {
  global $wpdb;
  global $snd_db_version;

  $charset_collate = $wpdb->get_charset_collate();
  $table_name = $wpdb->prefix . "sandorik";

  if( $wpdb->get_var("show tables like '$table_name'") != $table_name) {

    $sql = "CREATE TABLE " . $table_name . " (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      views smallint(5) NOT NULL,
      clicks smallint(5) NOT NULL,
      name tinytext NOT NULL,
      text text NOT NULL,
      url VARCHAR(55) NOT NULL,
      UNIQUE KEY id (id)
      ) " . $charset_collate . ";";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

      dbDelta($sql);
      add_option("snddb_version", $snd_db_version);
   }
}

/*
function get_my_product( $product_id ) {
    global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'my_products';

    $product = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE `id` = %d LIMIT 1;", $product_id ) );
    return $product;
}
*/


/*
//http://codex.wordpress.org/AJAX_in_Plugins
add_action('wp_ajax_nopriv_my_qc_form', 'my_qc_form_callback');
add_action('wp_ajax_my_qc_form','my_qc_form_callback');
function my_qc_form_callback() {
  global $wpdb; // this is how you get access to the database

  $table_name = $wpdb->prefix . "sandorik";

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $rows_affected = $wpdb->insert( $table_name, array(
    'id' => null,
    'time' => current_time('mysql'),
    'name' => $name,
    'email' => $email,
    'message' => $message
  ));

  if($rows_affected==1){
    echo "Your message was sent.";
  } else {
    echo "Error, try again later.";
  }
  die(); // this is required to return a proper result
}
*/


function ajax_form(){
  global $wpdb;

  $table_name = $wpdb->prefix . "sandorik";

  $post_name = $_POST['data']['name'];
  $post_url = $_POST['data']['url'];
  $post_content = $_POST['data']['text'];


  $wpdb->insert(
    $table_name,
      array( 'name' => $post_name, 'url' => $post_url, 'text' => $post_content ),
      array( '%s', '%s' )
    );

    //echo something here to return a value...
    exit(); //prevent 0 in the return





}
add_action( 'wp_ajax_ajax_form', 'ajax_form' ); //admin side
add_action( 'wp_ajax_nopriv_ajax_form', 'ajax_form' ); //for frontend
















add_action('admin_menu', 'sandorik_options');
function sandorik_options() {
  add_menu_page( 'Teasers', 'Teasers', 'edit_posts', 'sandorik', 'sandorik_options_page', '', 24);
}

add_action( 'admin_enqueue_scripts', 'load_sandorik_admin_files' );
function load_sandorik_admin_files() {
  wp_register_style( 'sandorik_admin_styles', plugin_dir_url( __FILE__ ) . 'css/snd-admin.css', false, '1.0.0' );
  wp_enqueue_style( 'sandorik_admin_styles' );

  wp_register_script( 'jquery', plugin_dir_url( __FILE__ ) . 'js/jquery.js', false, '1.12.4' );
  wp_enqueue_script( 'jquery' );

  wp_register_script( 'sandorik_admin_scripts', plugin_dir_url( __FILE__ ) . 'js/snd-admin.js', false, '1.0.0' );
  wp_enqueue_script( 'sandorik_admin_scripts' );

  wp_localize_script( 'inkthemes', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
}

function sandorik_options_page() {
  include 'sandorik-options.php';
}
