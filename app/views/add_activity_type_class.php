         <div class="page-content-wrap">                
             <a href="activity_type_class.php"></a>
                    <div class="row">
                        <div class="col-md-6">                        
 
       
               
     

                <?php if(@$studio_activity_acitivity_id != NULL){ ?>
                
               <div class="block">
       <h4>EDIT ACTIVITY TYPE</h4>
  <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('activity_type/edit_1_class_activity/'.$studio_activity_acitivity_id. '/' .$activity_id) ?>" method="post">
                                <div class="panel-body">
                                    
                                    
                                  
                                     <div class="form-group">
                                <label class="col-md-3 control-label">Activity Type:</label>
                                <div class="col-md-9">                                                                            
                                    <select  class="form-control select" name="activity_type" data-live-search="true" required>
                                        <?php foreach ($activity as $row): ?>
                                            <option value="<?= $row->activity_name ?>" <?php if ($result->activity_name == $row->activity_name) { ?> selected="" <?php } ?> ><?= $row->activity_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> 
<!--                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Type :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="activity_type" data-live-search="true" required>
                                                <?php foreach ($activity as $row): ?>
                                     <option value="<?=$row->activity_id?>"><?=$row->activity_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>-->
                                     
                                       
                                    
                                   
                                   
                                                                                       
                                    <div class="btn-group pull-right">
                                      <input type="submit"  name="submit" class="btn btn-primary" value="Save">
<!--                                  <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>                                                                                       
                                </div>                                               
</form>
                      
        </div>   
                <?php }else{ ?>
                
      <div class="block">
       <h4>ADD ACTIVITY TYPE</h4>
  <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('activity_type/add_class_activity/') ?>" method="post">

                                <div class="panel-body">
                                       
                                  
                                    
                                     <div class="form-group">
                                <label class="col-md-3 control-label">Activity Type :</label>
                                <div class="col-md-9">                                                                            
                                    <select  class="form-control select" name="activity_type" data-live-search="true" required>
                                        <?php foreach ($activity as $row): ?>
                                            <option value="<?= $row->activity_name ?>" ><?= $row->activity_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> 
                            
                                    
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Type :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="activity_type" data-live-search="true" required>
                                                <?php foreach ($activity as $row): ?>
                                     <option value="<?=$row->activity_id?>"><?=$row->activity_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>-->
                                    
                                    
                                    
                                     
                                    
                                    <div class="btn-group pull-right">
<!--                                        <button class="btn btn-primary" type="button" onClick="jvalidate.resetForm();$('#gender').next('.bootstrap-select').removeClass('error').removeClass('valid')">Hide prompts</button>-->
                                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
<!--                                        <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>                                                                                                                          
                                </div>                                               
                      
             



    </form>
            
       
       
           </div>
                            
                            
                <?php } ?>
       
                 
                        </div>
                    </div>            
                </div>


