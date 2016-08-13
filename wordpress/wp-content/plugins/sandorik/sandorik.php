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

/** First Time Init */

global $snd_db_version;
$snd_db_version = "1.0";
/** install plugin, create new DB */
register_activation_hook(__FILE__,'snd_install');
function snd_install () {
  global $wpdb;
  global $snd_db_version;

  $charset_collate = $wpdb->get_charset_collate();
  $table_name = $wpdb->prefix . "sandorik";

  if( $wpdb->get_var("show tables like '$table_name'") != $table_name) {

    $sql = "CREATE TABLE " . $table_name . " (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      name text NOT NULL,
      url text NOT NULL,
      text text NOT NULL,
      image text NOT NULL,
      type text NOT NULL,
      time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      views smallint(5) NOT NULL,
      clicks smallint(5) NOT NULL,
      UNIQUE KEY id (id)
      ) " . $charset_collate . ";";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

      dbDelta($sql);

      add_option("snd_db_version", $snd_db_version);
   }
}

/** Submit Functions */
add_action( 'wp_ajax_snd_form_add', 'snd_form_add' ); //admin side
add_action( 'wp_ajax_nopriv_snd_form_add', 'snd_form_add' ); //for frontend
function snd_form_add(){
  global $wpdb;

  $table_name = $wpdb->prefix . "sandorik";

  $post_name = $_POST['data']['name'];
  $post_url = $_POST['data']['url'];
  $post_content = $_POST['data']['text'];
  $post_image = $_POST['data']['image'];
  $post_type = $_POST['data']['type'];

  $insert_row = $wpdb->insert(
    $table_name,
      array(
        'name' => $post_name,
        'url' => $post_url,
        'text' => $post_content,
        'image' => $post_image,
        'type' => $post_type,
        'time' => current_time('mysql')
      ),
      array( '%s', '%s' )
  );

  if ( $insert_row == 1 ){
    $response_status = "true";
  } else {
    $response_status = "false";
  }

  echo $wpdb->insert_id;
  exit(); //prevent 0 in the return
}
/** Remove Row From DB Function */
add_action( 'wp_ajax_snd_form_remove', 'snd_form_remove' ); //admin side
add_action( 'wp_ajax_nopriv_snd_form_remove', 'snd_form_remove' ); //for frontend
function snd_form_remove(){
  global $wpdb;

  $table_name = $wpdb->prefix . "sandorik";

  $post_id = $_POST['data']['id'];

  $remove_row = $wpdb->delete(
    $table_name,
      array(
        'id' => $post_id
      ),
      array( '%d' )
  );

  if ( $remove_row == 1 ){
    $remove_status = "true";
  } else {
    $remove_status = "false";
  }
  echo $remove_status;
  exit(); //prevent 0 in the return
}

/** Remove Row From DB Function */
add_action( 'wp_ajax_snd_form_edit', 'snd_form_edit' ); //admin side
add_action( 'wp_ajax_nopriv_snd_form_edit', 'snd_form_edit' ); //for frontend
function snd_form_edit(){
  global $wpdb;

  $table_name = $wpdb->prefix . "sandorik";

  $post_id = $_POST['data']['id'];

  $results = $wpdb->get_results("SELECT name, url, text, image, type, time, views, clicks FROM $table_name WHERE id = " . $post_id . " ");

  if (!$results) {
    echo "Not found in DB\n";
  }

  echo json_encode($results[0]);
  exit(); //prevent 0 in the return
}




add_action( 'admin_enqueue_scripts', 'sandorik_media_files' );
function sandorik_media_files() {
  wp_enqueue_media();
}

add_action('admin_menu', 'sandorik_options');
function sandorik_options() {
  add_menu_page( 'Sandorik', 'Sandorik', 'edit_posts', 'sandorik', 'sandorik_options_page', '', 24);
}

add_action( 'admin_enqueue_scripts', 'load_sandorik_admin_files' );
function load_sandorik_admin_files() {
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
