         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
  
                            
                            <div class="block">
       <h4>EDIT STUDIO</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio/edit_1_studio') ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
          

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
<div class="form-group">
                                        <label class="col-md-3 control-label">Phone Number 1st:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_phone_number1" value="<?=$result->studio_phone_number1?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
<div class="form-group">
                                        <label class="col-md-3 control-label">Phone Number 2nd:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_phone_number2" value="<?=$result->studio_phone_number2?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                           
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Website:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_website" value="<?=$result->studio_website?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                           <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Email:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_email_id" value="<?=$result->studio_email_id?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                          </div>


                            <?php
                                        $r = array();
                                        foreach ($studio_timing as $t){
                                         $r[] = $t->studio_timings;
                                        }
                                    ?>      
                                       
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Timing:</label>
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
                                    
                                    
                                      <div class="form-group">
                                           <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
                              <?php if(!empty($result->studio_image)){ ?>              
               <img src="<?=base_url()?>studio/<?=$result->studio_image?>" width="100" height="50" />
                              <?php }else{ ?>
                <img src=" <?= base_url() ?>assets/assets/images/users/noimg.png" width="100" height="50" />
                              <?php } ?>
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
                                    

                                 <input type="hidden"  name="studio_id" value="<?= $result->studio_id ?>" required/>

                                                                        
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                    </div>                                                                                       
                                </div>                                               
    </form>
           
           </div>              
                            
                            
              
                </div>
                </div>            
       </div>