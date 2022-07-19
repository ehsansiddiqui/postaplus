                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Variant:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="variant_id" data-live-search="true" required>
                                                <?php foreach ($variant as $row): ?>
          <option value="<?=$row->vehicle_variant_id?>" ><?=$row->variant_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>




