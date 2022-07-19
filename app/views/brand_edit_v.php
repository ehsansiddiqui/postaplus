         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
    
               
                <?php if(@$id != NULL){ ?>
            
                                 <div class="block">
       <h4>EDIT BRAND</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('vehicle/edit_brand_1/'.$id) ?>" method="post">
                                <div class="panel-body">
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Vehicle Type :</label>
                                        <div class="col-md-9">                                                           
                                 <select class="form-control select" name="category_id" data-live-search="true" required>
                                                <?php foreach ($category as $row): ?>
       <option value="<?=$row->category_id?>" <?php if($row->category_id == $result->category_id){echo 'selected';} ?> ><?=$row->category_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Brand Code:</label>  
                                        <div class="col-md-9">
                         <input type="text" class="form-control" name="brand_cd" value="<?=@$result->brand_cd?>"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Brand Name:</label>  
                                        <div class="col-md-9">
                          <input type="text" class="form-control" name="brand_name" value="<?=@$result->brand_name?>"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
<!--                                <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>                                                                                       
                                </div>                                               
    </form>
           
           </div>             
                            
                            
                            
                <?php }else{ ?>
                            

                            
               
                  <div class="block">
       <h4>ADD BRAND</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('vehicle/add_brand') ?>" method="post">
                                <div class="panel-body">
                                    
                                    
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Vehicle Type :</label>
                                        <div class="col-md-9">                                                           
                                 <select class="form-control select" name="category_id" data-live-search="true" required>
                                                <?php foreach ($category as $row): ?>
                                        <option value="<?=$row->category_id?>"><?=$row->category_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Brand Code:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="brand_cd" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Brand Name:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="brand_name" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
<!--                                <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>                                                                                       
                                </div>                                               
    </form>
           
           </div>                
                            
                            
                            
                <?php } ?>
         
                        </div>
                    </div>            
       </div>