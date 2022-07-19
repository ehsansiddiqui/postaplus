         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
                                         <div class="block">
       <h4>ENQUIRY DETAILS</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('enquiry/send_mail/'.$enquiry_id) ?>" method="post" enctype="multipart/form-data">
      
                                <div class="panel-body">
                       
                                    
   
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Type:</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="short_title" value="<?=$result->enquiry_type_name?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Customer Name:</label>  
                                        <div class="col-md-9">
              <input type="text" class="form-control" name="detail_title" value="<?=$result->name?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label"> Email:</label>  
                                        <div class="col-md-9">
              <input type="text" class="form-control" name="detail_title" value="<?=$result->email?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                 <div class="form-group">
                                        <label class="col-md-3 control-label">Phone Number:</label>  
                                        <div class="col-md-9">
              <input type="text" class="form-control" name="detail_title" value="<?=$result->phone?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">City:</label>  
                                        <div class="col-md-9">
              <input type="text" class="form-control" name="detail_title" value="<?=$result->city?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>    
                                    
                                 
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Message:</label>  
                                        <div class="col-md-9">
                                    <textarea class="form-control" name="detail_title"><?=$result->message?></textarea>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    <hr>
                                    
                                <?php if(!empty($new)){ ?>
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Model :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$new->short_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Model Name :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$new->detail_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Tittle :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$new->detail_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    
                                <div class="form-group">
                                           <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
               <img src="<?=base_url()?>assets/udayamotors/images/shop/new/<?=$new->anchor_image?>" width="100" height="50" />   
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
              <textarea class="form-control" name="description" ><?=$new->description?></textarea>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price MIN:</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="expected_price" value="<?=$new->expected_price?>" />
                                         <span class="help-block"></span>
                                        </div>
                                     </div>
                                    
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price Max:</label>  
                                        <div class="col-md-9">
<input type="number" class="form-control" name="model_price_max" value="<?=$new->model_price_max?>"  />
                                         <span class="help-block"></span>
                                        </div>
                                       </div>  
                                    
                                    
                                    
                                <?php } ?>
                                    
                                    
                                    
                                    
                                                                 <?php if(!empty($used)){ ?>
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Model :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$used->short_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Model Name :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$used->detail_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Tittle :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$used->detail_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    
                                <div class="form-group">
                                           <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
               <img src="<?=base_url()?>assets/udayamotors/images/shop/used/<?=$used->anchor_image?>" width="100" height="50" />   
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
              <textarea class="form-control" name="description" ><?=$used->description?></textarea>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price MIN:</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="expected_price" value="<?=$used->expected_price?>" />
                                         <span class="help-block"></span>
                                        </div>
                                     </div>
                                    
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price Max:</label>  
                                        <div class="col-md-9">
<input type="number" class="form-control" name="model_price_max" value="<?=$used->model_price_max?>"  />
                                         <span class="help-block"></span>
                                        </div>
                                       </div>  
                                    
                                    
                                    
                                <?php } ?>  
                                    
                                    
                                    
                                    
                            <?php if(!empty($parts)){  ?>
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Model :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$parts->short_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Model Name :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$parts->detail_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Tittle :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$parts->detail_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    
                                <div class="form-group">
                                           <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
               <img src="<?=base_url()?>assets/udayamotors/images/shop/parts/<?=$parts->anchor_image?>" width="100" height="50" />   
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
              <textarea class="form-control" name="description" ><?=$parts->description?></textarea>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price MIN:</label>  
                                        <div class="col-md-9">
               <input type="number" class="form-control" name="expected_price" value="<?=$parts->expected_price?>" />
                                         <span class="help-block"></span>
                                        </div>
                                     </div>
                                    
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price Max:</label>  
                                        <div class="col-md-9">
        <input type="number" class="form-control" name="model_price_max" value="<?=$parts->model_price_max?>"  />
                                         <span class="help-block"></span>
                                        </div>
                                       </div>  

                                <?php } ?> 
                                    
                                    
                                <?php if(!empty($acess)){  ?>
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Model :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$acess->short_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Model Name :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$acess->detail_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Tittle :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="detail_title" value="<?=$acess->detail_title?>"/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    
                                <div class="form-group">
                                           <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
               <img src="<?=base_url()?>assets/udayamotors/images/shop/accessories/<?=$acess->anchor_image?>" width="100" height="50" />   
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
              <textarea class="form-control" name="description" ><?=$acess->description?></textarea>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price MIN:</label>  
                                        <div class="col-md-9">
               <input type="number" class="form-control" name="expected_price" value="<?=$acess->expected_price?>" />
                                         <span class="help-block"></span>
                                        </div>
                                     </div>
                                    
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price Max:</label>  
                                        <div class="col-md-9">
        <input type="number" class="form-control" name="model_price_max" value="<?=$acess->model_price_max?>"  />
                                         <span class="help-block"></span>
                                        </div>
                                       </div>  

                                <?php } ?>        
                                    
                                    

                                    
                                                           
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="send mail">
                                    </div>
                                    
                                </div>                                               
    </form>
           
           </div>       
                                            
            

                        </div>
                    </div>            
       </div>