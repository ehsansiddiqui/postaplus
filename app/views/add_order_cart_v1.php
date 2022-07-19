<div class="form-group">
    <label class="col-md-3 control-label">Product<small style="color:red">*</small> :</label>
    <div class="col-md-9">                                                               
        <select class="form-control select" name="product_type_id"  data-live-search="true" required>
            <?php foreach ($product as $row): ?>
                <option value="<?= $row->product_type_id ?>"><?= $row->product_name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>