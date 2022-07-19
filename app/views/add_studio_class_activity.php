                                  
                                  <?php if(@$edit_id){  ?>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Type<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="activity_id" data-live-search="true" required>
                                                <?php foreach ($activity as $row): ?>
                                     <option value="<?=$row->activity_id?>" <?php if($row->activity_id == $res->activity_id){echo 'selected';} ?>><?=$row->activity_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                   
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Instructor Name<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="instructor_id" data-live-search="true">
                                                <?php foreach ($instructor as $row): ?>
       <option value="<?=$row->instructor_id?>" <?php if($row->instructor_id == $res->instructor_id){echo 'selected';} ?>><?=$row->instructor_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                  <?php }else{ ?>     

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Type<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="activity_id" data-live-search="true" required>
                                                <?php foreach ($activity as $row): ?>
                                     <option value="<?=$row->activity_id?>"><?=$row->activity_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                   
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Instructor Name<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="instructor_id" data-live-search="true">
                                                <?php foreach ($instructor as $row): ?>
       <option value="<?=$row->instructor_id?>" ><?=$row->instructor_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>


                                  <?php } ?>