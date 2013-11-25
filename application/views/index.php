<form method="GET">

  <select name="height[]" multiple class="selectpicker">
    <? foreach ($heights as $height): ?>
      <option value="<?= $height ?>" <?= in_array($height, $selected_heights) ? 'selected="selected"' : '' ?>><?= $height ?></option>
    <? endforeach; ?>
  </select>

  <select name="width[]" multiple class="selectpicker">
    <? foreach ($widths as $width): ?>
      <option value="<?= $width ?>" <?= in_array($width, $selected_widths) ? 'selected="selected"' : '' ?>><?= $width ?></option>
    <? endforeach; ?>
  </select>

  <input type="submit"></input>
</form>

<? foreach ($wheels as $wheel): ?>
  <p><?= $wheel['name'] ?> - <?= $wheel['width'] ?></p>
<? endforeach; ?>

