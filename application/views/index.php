<form method="GET">
    <input id="page" type="hidden" name="page" value="<?= $query_data['page'] ?>"/>
    <input type="hidden" name="limit" value="<?= $query_data['limit'] ?>"/>
    <input id="skip" type="hidden" name="skip" value="<?= $query_data['skip'] ?>"/>

    <div class="row">

        <div class="col-md-3 input-block">
            <label class="input-label" for="height[]">Name:</label>
            <input type="text" name="name" class="form-control text-input" placeholder="Name..." value="<?= $query_data['name'] ?>"/>
        </div>

        <div class="col-md-3 input-block">
            <label class="input-label" for="height[]">Height:</label>
            <select name="height[]" multiple class="selectpicker show-tick">
                <? foreach ($heights as $height): ?>
                    <option value="<?= $height ?>" <?= in_array($height, $query_data['height']) ? 'selected="selected"' : '' ?>><?= $height ?></option>
                <? endforeach; ?>
            </select>
        </div>

        <div class="col-md-3 input-block">
            <label class="input-label" for="width[]">Width:</label>
            <select name="width[]" multiple class="selectpicker">
                <? foreach ($widths as $width): ?>
                    <option value="<?= $width ?>" <?= in_array($width, $query_data['width']) ? 'selected="selected"' : '' ?>><?= $width ?></option>
                <? endforeach; ?>
            </select>
        </div>

        <div class="col-md-3 input-block">
            <label class="input-label"></label>
            <button type="submit" name="submit" class="btn btn-default text-input" value="1">Search...</button>
        </div>
    </div>

    <table id="table" class="table">
        <tr>
            <th>Name</th>
            <th>Manufacturing Method</th>
            <th>Height</th>
            <th>Width</th>
            <th>Weight (lbs)</th>
        </tr>
        <? foreach ($wheels as $wheel): ?>
            <tr>
                <td><?= $wheel['name'] ?></td>
                <td><?= $wheel['method'] ?></td>
                <td><?= $wheel['height'] ?></td>
                <td><?= $wheel['width'] ?></td>
                <td><?= $wheel['weight'] ?></td>
            </tr>
        <? endforeach; ?>
    </table>

    <div class="row">
        <span id="pagination-block">
            <? if ($pagination_links['prev']): ?>
                <button id="first-link" class="pagination-link btn btn-sm" type="submit"
                        data-page="<?= $pagination_links['first']['page'] ?>"
                        data-skip="<?= $pagination_links['first']['skip'] ?>"
                    >First</button>
                <button id="prev-link" class="pagination-link btn btn-sm" type="submit"
                        data-page="<?= $pagination_links['prev']['page'] ?>"
                        data-skip="<?= $pagination_links['prev']['skip'] ?>"                        
                    ><?= $pagination_links['prev']['page'] ?></button>
            <? endif; ?>
            <span class="pagination-link"><?= $query_data['page'] ?></span>
            <? if ($pagination_links['next']): ?>
                <button id="next-link" class="pagination-link btn btn-sm" type="submit"
                        data-page="<?= $pagination_links['next']['page'] ?>"
                        data-skip="<?= $pagination_links['next']['skip'] ?>"                        
                    ><?= $pagination_links['next']['page'] ?></button>
                <button id="last-link" class="pagination-link btn btn-sm" type="submit"
                        data-page="<?= $pagination_links['last']['page'] ?>"
                        data-skip="<?= $pagination_links['last']['skip'] ?>"                        
                    >Last</button>
            <? endif; ?>
        </span>
    </div>
</form>
