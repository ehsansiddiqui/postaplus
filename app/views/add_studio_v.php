         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
                
                <?php if(@$id != NULL){ ?>
                            
                            
                            
                            <div class="block">
       <h4>EDIT STUDIO</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio/edit_1/'.$id) ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                     
                                    <?php
                                        $r = array();
                                        foreach ($studio_timing as $t){
                                         $r[] = $t->studio_timings;
                                        }
                                    ?>      
                                       
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Timing <small style="color: red">*</small>:</label>
                                        <div class="col-md-3">                                    
                                       <label class="check"><input type="checkbox" name="timing[]"      value="1"  <?php if(in_array(1,$r)){ echo 'checked' ; } ?>  class="icheckbox" />Morning</label>
                                        </div>
                                        <div class="col-md-2">                                    
                                            <label class="check"><input type="checkbox" name="timing[]" value="2" <?php if(in_array(2,$r)){ echo 'checked' ; } ?> class="icheckbox"/>Noon</label>
                                        </div>
                                        <div class="col-md-3">                                    
                                            <label class="check"><input type="checkbox" name="timing[]" value="3 " <?php if(in_array(3,$r)){ echo 'checked' ; } ?> class="icheckbox"/>Evening</label>
                                        </div>
                                        <div class="col-md-2">                                    
                                            <label class="check"><input type="checkbox" name="timing[]" value="4" <?php if(in_array(4,$r)){ echo 'checked' ; } ?> class="icheckbox"/>Night</label>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <?php
                                        
                                         $l = array();
                                        foreach ($studio_location as $loc){
                                         $l[] = $loc->location_id;
                                        }
                                    ?>      
           
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Location <small style="color: red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select multiple class="form-control select" name="location_id[]" data-live-search="true">
                                                <?php foreach ($location as $row): ?>
                                            <option value="<?=$row->location_id?>" <?php if (in_array($row->location_id,$l)){ echo 'selected'; }?>><?=$row->location_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>  
                                       
                                      
                                    
                                    <?php
                                       
                                         $in = array();
                                    
                                        foreach ($studio_intructor as $inst){
                                         $in[] = $inst->instructor_id;
                                        }
                                    ?> 
                                       
                                    
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Instructor :</label>
                                        <div class="col-md-9">                                                                            
                                        <select multiple class="form-control select" name="instructor_id[]" data-live-search="true">
                                                <?php foreach ($instructor as $row): ?>
       <option value="<?=$row->instructor_id?>" <?php if (in_array($row->instructor_id,$in)){ echo 'selected'; }?>><?=$row->instructor_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                       
                                     
                                    
                                       <?php
                                       
                                        $act = array();
                                        foreach ($studio_activity as $acti){
                                         $act[] = $acti->activity_id;
                                        }
                                    ?>
                                    
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activity <small style="color: red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select multiple class="form-control select" name="activity_id[]" data-live-search="true">
                                                <?php foreach ($activity as $row): ?>
       <option value="<?=$row->activity_id?>" <?php if (in_array($row->activity_id,$act)){ echo 'selected'; }?> ><?=$row->activity_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>   

<!--                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Username:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_username" value="<?=$result->username?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Password:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_password" value="<?=$result->password?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>-->
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Name:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_name" value="<?=$result->studio_name?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
<!--                                    <div class="location">                         
                                             
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Place:</label>  
                                        <div class="col-md-9">
          <input class="form-control geocomplete" type="text" placeholder="Type in an address" name="place" value="<?= $result->place ?>" />
      <input class="find" type="button" value="find" />
                                         <span class="help-block"></span>
                                        </div>
                                    </div>             
                                             
                                    <fieldset class="details">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Latitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lat" value="<?= $result->studio_latitude ?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng"  value="<?= $result->studio_longitude ?>" required/>
                                         <span class="help-block"></span>
                                      </div>
                                    </div>
                                    </fieldset>
                          
                      </div>-->
                                    
                                    
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Latitude:</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="studio_latitude" value="<?=$result->studio_latitude?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Longitude:</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="studio_longitude" value="<?=$result->studio_longitude?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    -->
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Payout</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="studio_bundle_price" value="<?=$result->studio_bundle_price?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
 <div class="form-group">
                                        <label class="col-md-3 control-label">Client Payout</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="client_payout" value="<?=$result->client_payout?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                 <div class="form-group">
                                        <label class="col-md-3 control-label">Address:</label>  
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="studio_address" value="" required><?=$result->studio_address?></textarea>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="studio_description" value="" required><?=$result->studio_description?></textarea>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                   <?php if($result->studio_image !=NULL){ ?>
                                    
                                      <div class="form-group">
                                           <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
               <img src="<?=base_url()?>studio/<?=$result->studio_image?>" width="100" height="50" />   
                                         <span class="help-block"></span>
                                        </div>
                                      </div> 
                                   <?php } else { ?>
                                    
                                    <div class="form-group">
                                           <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
                     <img src=" <?= base_url() ?>assets/assets/images/users/noimg.png" width="100" height="50" />
  
                                         <span class="help-block"></span>
                                        </div>
                                    </div> 
                                    
                                  <?php  } ?>
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Image:</label>  
                                        <div class="col-md-9">
                                         <input class="iform-control"  type="file" name="userfile" >
                                         <span class="help-block"></span>
                                        </div>
                                      </div>  
                                    
                                    
                                    
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Slot Duration In Mins:</label>  
                                        <div class="col-md-9">
       <input type="text" class="form-control" name="studio_slot_dutation_in_mins" value="<?=$result->studio_slot_dutation_in_mins?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>    
                                    -->
                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                    </div>                                                                                       
                                </div>                                               
    </form>
           
           </div>              
                            
                            
                            
                <?php }else{ ?>
    
                        <div class="block">
       <h4>ADD STUDIO</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio/add') ?>" method="post" enctype="multipart/form-data">
                               
                                   <div class="panel-body">
                                       
                        
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Timing <small style="color: red">*</small>:</label>
                                        <div class="col-md-3">                                    
                                        <label class="check"><input type="checkbox" name="timing[]" value="1" class="icheckbox"/>Morning</label>
                                        </div>
                                        <div class="col-md-2">                                    
                                        <label class="check"><input type="checkbox" name="timing[]" value="2" class="icheckbox"/>Noon</label>
                                        </div>
                                        <div class="col-md-3">                                    
                                        <label class="check"><input type="checkbox" name="timing[]" value="3 " class="icheckbox"/>Evening</label>
                                        </div>
                                        <div class="col-md-2">                                    
                                        <label class="check"><input type="checkbox" name="timing[]" value="4" class="icheckbox"/>Night</label>
                                        </div>
                                    </div>
                           
                                       
                                       
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Location <small style="color: red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select multiple class="form-control select" name="location_id[]" data-live-search="true">
                                                <?php foreach ($location as $row): ?>
       <option value="<?=$row->location_id?>"><?=$row->location_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>  
                                       
                                       
                                       
                                    
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Instructor <small style="color: red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select multiple class="form-control select" name="instructor_id[]" data-live-search="true">
                                                <?php foreach ($instructor as $row): ?>
       <option value="<?=$row->instructor_id?>"><?=$row->instructor_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                       
                                       
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activity <small style="color: red">*</small>:</label>
                                        <div class="col-md-9">                                                                            
                                        <select multiple class="form-control select" name="activity_id[]" data-live-search="true">
                                                <?php foreach ($activity as $row): ?>
       <option value="<?=$row->activity_id?>"><?=$row->activity_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>   
                                       
                                       
<!--                                <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Username:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_username"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_password"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>-->
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Name <small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_name"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                       
<!--                    <div class="location">                         
                                             
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Place:</label>  
                                        <div class="col-md-9">
          <input class="form-control geocomplete" type="text" name="place" placeholder="Type in an address" value="" />
      <input class="find" type="button" value="find" />
                                         <span class="help-block"></span>
                                        </div>
                                    </div>             
                                             
                                    <fieldset class="details">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Latitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lat" value="" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Longitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng"  value="" required/>
                                         <span class="help-block"></span>
                                      </div>
                                    </div>
                                    </fieldset>
                          
                      </div>  -->
                                    
                                    
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Latitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_latitude"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Longitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_longitude"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>-->
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Payout:</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="studio_bundle_price" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Client Payout:</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="client_payout" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                 <div class="form-group">
                                        <label class="col-md-3 control-label">Address:</label>  
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="studio_address" required></textarea>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="studio_description" required></textarea>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                               
                                    
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Image:</label>  
                                        <div class="col-md-9">
                                         <input class="iform-control"  type="file" name="userfile">
                                         <span class="help-block"></span>
                                        </div>
                                      </div>  
                                    
                                    
                                    
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Slot Duration In Mins:</label>  
                                        <div class="col-md-9">
       <input type="text" class="form-control" name="studio_slot_dutation_in_mins"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>    -->
                                    
                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                    </div>                                                                                       
                                </div>                                               
    </form>
           
                        </div>
                            
                            
                            
                            
                <?php } ?>            
                     
                </div>
                </div>            
       </div>