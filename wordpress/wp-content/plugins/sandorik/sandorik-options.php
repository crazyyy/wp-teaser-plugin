<?php
  echo '';
?>

<h1 class="snd-title">Sandorik teasers options</h1>
<div class="snd-main">

  <div class="snd-list-blocks">
    <h6>Blocks <button class="snd-button snd-add">add block</button></h6>
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
    <h6>Block Options</h6>
    <form action="">
      <input type="text" class="full-input" value="Name ID">
      <label class="half-input">
        <input type="radio" checked name="vertical-top" value="vertical-top">
      </label>
      <label class="half-input">
        <input type="radio" name="vertical-bottom" value="vertical-bottom">
      </label>
      <label class="half-input">
        <input type="radio" name="horizontal-right" value="horizontal-right">
      </label>
      <label class="half-input">
        <input type="radio" name="horizontal-left" value="horizontal-left">
      </label>
      <div class="form-config">
        <div class="snd-image">
          <img src="" alt="">
        </div>
        <input type="text" name="link" placeholder="sitename">
        <textarea name="content" id="" cols="30" rows="10">Lorem ipsum dolor sit amet.</textarea>
      </div>
    </form>
  </div><!-- /.snd-form-container -->


</div><!-- /.snd-main -->
