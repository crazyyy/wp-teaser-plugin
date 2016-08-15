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
