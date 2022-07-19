         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
    
               
                <?php if(@$id != NULL){ ?>
            
                                 <div class="block">
       <h4>EDIT SUMMERY</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('brand/edit_1/'.$id) ?>" method="post">
                                <div class="panel-body">
                                    
                                    
                                  
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Class :</label>
                                        <div class="col-md-9">                                                           
                                 <select class="form-control select" name="class_id" data-live-search="true" required>
                                                <?php foreach ($class as $row): ?>
                                        <option value="<?=$row->class_id?>" <?php if($row->class_id == $result->class_id){echo 'selected';} ?>><?=$row->class_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                      
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Brand Name:</label>  
                                        <div class="col-md-9">
            <input type="text" class="form-control" name="brand_name" value="<?=$result->brand_name?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Brand Name Arabic:</label>  
                                        <div class="col-md-9">
    <input type="text" class="form-control"dir="rtl" name="ar_brand_name" value="<?=$result->ar_brand_name?>" required/>
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
       <h4>ADD SUMMERY</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('brand/add') ?>" method="post">
                                <div class="panel-body">
                                    
                                    
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Class :</label>
                                        <div class="col-md-9">                                                           
                                 <select class="form-control select" name="class_id" data-live-search="true" required>
                                                <?php foreach ($class as $row): ?>
                                        <option value="<?=$row->class_id?>"><?=$row->class_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Brand :</label>
                                        <div class="col-md-9">                                                           
                                 <select class="form-control select" name="brand_id" data-live-search="true" required>
                                                <?php foreach ($brand as $row): ?>
                                        <option value="<?=$row->brand_id?>"><?=$row->brand_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                      
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Summary Tittle:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="summary_tittle" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Summary Arabic:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"dir="rtl" name="ar_summary_tittle" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Price:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="summary_price" required/>
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