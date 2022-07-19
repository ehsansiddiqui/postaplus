
                                    
                            
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">City:</label>
                                        <div class="col-md-9">                                                      
                   <select class="form-control select" name="city_id" data-live-search="true" required>
                                                <?php foreach ($city as $row): ?>
 <option value="<?=$row->city_id?>" ><?=$row->city_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
