<form method="GET">

<select name="height[]" multiple>
  <? foreach ($heights as $height): ?>
    <option value="<?= $height ?>"><?= $height ?></option>
  <? endforeach; ?>
</select>

<select name="width[]" multiple>
  <? foreach ($widths as $width): ?>
    <option value="<?= $width ?>"><?= $width ?></option>
  <? endforeach; ?>
</select>


<input type="submit"></input>
