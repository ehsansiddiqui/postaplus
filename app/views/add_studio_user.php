         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
                
                <?php if(@$id != NULL){ ?>
                            
                            
                            
                            <div class="block">
       <h4>EDIT STUDIO USER</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio_user/edit_1/'.$id) ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                     
          
                                    <?php
                                        
                                        $l = array();
                                        foreach ($studio_user as $loc){
                                         $l[] = $loc->studio_id;
                                        }
                                    ?>      
           
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio <small style="color: red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select multiple class="form-control select" name="studio_id[]" data-live-search="true">
                                                <?php foreach ($studio as $row): ?>
                                            <option value="<?=$row->studio_id?>" <?php if (in_array($row->studio_id,$l)){ echo 'selected'; }?>><?=$row->studio_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>  
                                       

                                                 
                                                 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Username <small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_username" value="<?=$res->username?>"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password <small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_password" value="<?=$res->password?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    

                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                    </div>
                                    
                                </div>                                               
    </form>
           
           </div>              
                            
                            
                            
                <?php }else{ ?>
    
                        <div class="block">
       <h4>ADD STUDIO USER</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio_user/add') ?>" method="post" enctype="multipart/form-data">
                               
                                   <div class="panel-body">
                                       
                        
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studios <small style="color: red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select multiple class="form-control select" name="studio_id[]" data-live-search="true">
                                                <?php foreach ($studio as $row): ?>
       <option value="<?=$row->studio_id?>"><?=$row->studio_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>  
                                                 
                                                 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Username <small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_username"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password <small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_password"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                                                                              
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