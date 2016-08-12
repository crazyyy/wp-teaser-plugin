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

      <tr>
        <td>
          ID & name
        </td>
        <td>
          shortcode
        </td>
        <td>
          <button class="snd-button snd-edit" data-id="ID"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
        </td>
        <td>
          <button class="snd-button snd-remove" data-id="ID"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </td>
      </tr>

    </table>
  </div><!-- /.snd-list-blocks -->


  <div class="snd-form-container">
    <h6 class="box-title">Block Options <button class="snd-button snd-cancel"><i class="fa fa-ban" aria-hidden="true"></i></button></h6>
    <form action="">
      <input type="text" class="full-input" value="Name ID">
      <label class="half-input">
        <input type="radio" checked name="vertical-top" value="vertical-top">Vertical Top
      </label>
      <label class="half-input">
        <input type="radio" name="vertical-bottom" value="vertical-bottom">Vertical Иottom
      </label>
      <label class="half-input">
        <input type="radio" name="horizontal-right" value="horizontal-right">Horizontal Right
      </label>
      <label class="half-input">
        <input type="radio" name="horizontal-left" value="horizontal-left">Horizontal Left
      </label>
      <div class="form-config horizontal-left">
        <div class="snd-image">
          <img src="" alt="">
        </div>
        <input type="text" name="link" placeholder="teaser uri">
        <textarea name="content" id="content" placeholder="Lorem ipsum dolor sit amet."></textarea>
      </div>
      <button class="full-input snd-button snd-submitt"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
    </form>
  </div><!-- /.snd-form-container -->


</div><!-- /.snd-main -->
