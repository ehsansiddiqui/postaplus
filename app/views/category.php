<div class="control-group">
    <label class="control-label" for="select01">Category</label>
    <div class="controls">
        <select id="select01" name="category_id_fk" class="chzn-select" required>
            <option value="">---Select One---</option>
            <?php foreach ($category as $b) { ?>
                <option value="<?php echo $b->category_id; ?>"><?php echo $b->category_name; ?></option>
            <?php } ?>
        </select>
    </div>
</div>