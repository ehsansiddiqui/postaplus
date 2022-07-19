                          <div class="form-group">
                                        <label class="col-md-3 control-label">Brand:</label>
                                        <div class="col-md-9">                                                                                
                    <select class="form-control select" name="brand_id" data-live-search="true">
                                                <?php foreach ($brand as $row): ?>
                                                <option value="<?=$row->brand_id?>" <?php if($row->brand_id == @$result->brand_id){echo 'selected';} ?>><?=ucfirst($row->brand_name)?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>



