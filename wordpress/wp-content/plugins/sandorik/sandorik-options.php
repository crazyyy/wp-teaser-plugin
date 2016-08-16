<?php
  echo '';
?>

<h1 class="snd-title">Sandorik teasers options</h1>
<div class="snd-main">

  <div class="snd-list-blocks">
    <h6 class="box-title">Blocks <button class="snd-button snd-add"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></h6>
    <table>
      <tr>
        <th>
          ID & name
        </th>
        <th>
          shortcode
        </th>
        <th>

        </th>
        <th>

        </th>
      </tr>

      <?php

        global $wpdb;

        $table_name = $wpdb->prefix . "sandorik";

        $results = $wpdb->get_results("SELECT id, time, views, clicks, name, text, url FROM $table_name");

        if (!$results) {
          echo "DB is clean\n";
        }

        foreach( $results as $result) { ?>

        <tr>
          <td><?php echo $result->id; ?> <?php echo $result->name; ?></td>
          <td>
            <span class="shortcode">
              [sandorik id="<?php echo $result->id; ?>" <?php echo $result->name; ?>]
            </span>
          </td>
          <td>
            <button class="snd-button snd-edit" title="edit <?php echo $result->name; ?>" data-id="<?php echo $result->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
          </td>
          <td>
            <button class="snd-button snd-remove" title="remove <?php echo $result->name; ?>" data-id="<?php echo $result->id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </td>
        </tr>
      <? } ?>

    </table>

    <div class="snd-settings">
      <h6 class="box-title">Shortcode Block Settings</h6>
      <hr>
      <span class="example">[sandorik id="28" fz="16" ]</span> - "font-size" in pixels
      <hr>
      <span class="example">[sandorik id="28" fw="bold" ]</span> - "font-weight" 100-900, normal, bold,extrabold... http://www.w3schools.com/cssref/pr_font_weight.asp  // default "normal"
      <hr>
      <span class="example">[sandorik id="28" fs="italic" ]</span> - "font-style" http://www.w3schools.com/cssref/pr_font_font-style.asp // default "normal"
      <hr>
      <span class="example">[sandorik id="28" color="#f5f5f5" ]</span> or <span class="example">[sandorik id="28" color="orange" ]</span> - font "color" property http://www.w3schools.com/cssref/css_colors.asp
      <hr>
      <span class="example">[sandorik id="28" imgbd="5" ]</span> - image border size in px
      <hr>
      <span class="example">[sandorik id="28" imgbdc="red" ]</span> - image border color
      <hr>
      <span class="example">[sandorik id="28" bgc="red" ]</span> - background color
      <hr>
      <span class="example">[sandorik id="28" bd="5" ]</span> - block border size in px
      <hr>
      <span class="example">[sandorik id="28" bdc="orange" ]</span> - block border color
      <hr>
      <span class="example">[sandorik id="28" m="0.8" ]</span> - horizontal margin between teasers in %
      <hr>
      <span class="example">[sandorik id="28" h="400" ]</span> - block elements height in px
      <hr>
      <span class="example">[sandorik id="28" w="400" ]</span> - block elements width in px
    </div><!-- /.snd-settings -->

    <div class="snd-examples">
      <h6 class="box-title">Shortcode Examples</h6>
      <hr>
      <span class="example">[sandorik id="28" Name ID]</span> or <span class="example">[sandorik id="28" col="0" Name ID]</span>- one teaser with ID = 28
      <hr>
      <span class="example">[sandorik id="28,22,23" Name ID]</span> or <span class="example">[sandorik id="28,22,23" col="0" Name ID]</span> - 3 horizontal teasers with wide = 33% (100 / 3)
      <hr>
      <span class="example">[sandorik id="28,22,23" col="1" Name ID]</span> - 3 vertical teasers in 1 column
      <hr>
      <span class="example">[sandorik id="28,22,23,28" col="2" Name ID]</span> - 4 vertical teasers, 2 colums
    </div><!-- /.snd-examples -->

  </div><!-- /.snd-list-blocks -->


  <div class="snd-form-container">
    <h6 class="box-title">Block Options <button class="snd-button snd-cancel"><i class="fa fa-ban" aria-hidden="true"></i></button></h6>
    <form action="">
      <input type="text" name="name" class="full-input" value="Name ID">
      <input type="hidden" name="id">
      <label class="half-input">
        <input type="radio" checked name="vertical-top" value="vertical-top">Vertical Top
      </label>
      <label class="half-input">
        <input type="radio" name="vertical-bottom" value="vertical-bottom">Vertical Bottom
      </label>
      <label class="half-input">
        <input type="radio" name="horizontal-right" value="horizontal-right">Horizontal Right
      </label>
      <label class="half-input">
        <input type="radio" name="horizontal-left" value="horizontal-left">Horizontal Left
      </label>
      <input type="hidden" name="block-type" class="block-type" value="vertical-top">
      <div class="form-config vertical-top">
        <div class="snd-image">
          <input type="hidden" name="image_url" id="image_url" class="image-link">
          <input type="button" name="upload-btn" id="upload-btn" class="image-upload">
        </div>
        <input type="text" name="link" placeholder="http://wp-plugin.dev/">
        <textarea name="content" id="content" placeholder="Lorem ipsum dolor sit amet."></textarea>
      </div>
      <button class="full-input snd-button snd-submit"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
    </form>
  </div><!-- /.snd-form-container -->


</div><!-- /.snd-main -->
