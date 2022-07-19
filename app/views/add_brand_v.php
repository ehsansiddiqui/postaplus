         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
    
               
                <?php if(@$id != NULL){ ?>
            
                                 <div class="block">
       <h4>EDIT BRAND</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('brand/edit_1/'.$id) ?>" method="post">
                                <div class="panel-body">
                                    
                                    
                       
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
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Price:</label>  
                                        <div class="col-md-9">
          <input type="text" class="form-control" name="brand_price" value="<?=$result->brand_price?>" required/>
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
       <h4>ADD BRAND</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('brand/add') ?>" method="post">
                                <div class="panel-body">
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Brand Name:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="brand_name" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Brand Name Arabic:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"dir="rtl" name="ar_brand_name" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Price:</label>  
                                        <div class="col-md-9">
                                     <input type="text" class="form-control" name="brand_price"  required/>
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