<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
  <aside id="secondary" class="sidebar widget-area" role="complementary">

    <?php echo do_shortcode("[sandorik id=22,23 col=2]"); ?>
    <?php echo do_shortcode("[sandorik id=22,23,24 fz=16 fs=italic color=orange m=0.9]"); ?>



    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </aside><!-- .sidebar .widget-area -->
<?php endif; ?>
s
