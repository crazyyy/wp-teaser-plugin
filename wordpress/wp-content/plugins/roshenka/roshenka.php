<?php
/*
 * Plugin Name: Roshenka
 * Version: 2016.09.04
 * Description: Scrolling wiget plugin
 * Author: Vitalii Antoniuk
 * Author URI: #
 * Plugin URI: #
 * Text Domain: sandorik
 * Domain Path: /languages
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0
 * Example: http://pastebin.com/B8DEv4UF
 * Sorce: https://wp-dreams.com/articles/2014/03/creating-a-wordpress-widget-a-simple-text-widget/
*/

/** create widget class */

class Roshenka_Widget extends WP_Widget {

  public function __construct() {
    $widget_ops = array(
      'classname' => 'roshenka',
      'description' => 'Displays any sticked widgets!'
      );
      $this->WP_Widget('Roshenka_Widget', 'Roshenka', $widget_ops);
  }

  function widget($args, $instance) {
    // PART 1: Extracting the arguments + getting the values
    extract($args, EXTR_SKIP);
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $text = empty($instance['text']) ? '' : $instance['text'];

    // Before widget code, if any
    echo (isset($before_widget)?$before_widget:'');

    // PART 2: The title and the text output
    if (!empty($title))
      echo $before_title . $title . $after_title;;
    if (!empty($text))
      echo $text;

    // After widget code, if any
    echo (isset($after_widget)?$after_widget:'');
  }

  public function form( $instance ) {

     // PART 1: Extract the data from the instance variable
     $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
     $title = $instance['title'];
     $text = $instance['text'];

     // PART 2-3: Display the fields
     ?>
     <!-- PART 2: Widget Title field START -->
     <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title:
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
               name="<?php echo $this->get_field_name('title'); ?>" type="text"
               value="<?php echo attribute_escape($title); ?>" />
      </label>
      </p>
      <!-- Widget Title field END -->

     <!-- PART 3: Widget Text field START -->
     <p>
      <label for="<?php echo $this->get_field_id('text'); ?>">Content:
        <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" rows="10" /><?php echo attribute_escape($text); ?></textarea>
      </label>
      </p>
      <!-- Widget Text field END -->
     <?php

  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['text'] = $new_instance['text'];
    return $instance;
  }

}

add_action( 'widgets_init', create_function('', 'return register_widget("Roshenka_Widget");') );

/** work fith frontend  */

/** add js and css */
add_action('init', 'roshenka_frontend'); // Add Scripts to wp_head
function roshenka_frontend() {
  if (!is_admin()) {

    wp_register_style( 'roshenka_front_styles', plugin_dir_url( __FILE__ ) . 'css/roshenka-front.css', false, '1.0.0' );
    wp_enqueue_style( 'roshenka_front_styles' );

    //  Load footer scripts (footer.php)
    wp_register_script('roshenka_front_scripts', get_template_directory_uri() . '/js/roshenka-front.js', array(), '1.0.0', true); // Custom scripts
    wp_enqueue_script('roshenka_front_scripts'); // Enqueue it!
  }
}
