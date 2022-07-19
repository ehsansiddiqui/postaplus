         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
                
                <?php if(@$id != NULL){ ?>
<!--                <form class="form-horizontal" method="post" action="<?php echo site_url('banner/edit_banners/'.$id) ?>"   enctype="multipart/form-data">
                 <fieldset>
                        <legend>Edit Banner</legend>
                        
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Banner Tittle</label>
                            <div class="controls">
                                <input type="text" class="span6" id="typeahead"  name="banner_tittle" value="<?=$result->banner_tittle?>" data-provide="typeahead" data-items="4"  required="">
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Banner Description</label>
                            <div class="controls">
  <input type="text" class="span6" id="typeahead"  name="banner_description" value="<?=$result->banner_description?>"  data-provide="typeahead" data-items="4"  required="">
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                        <div class="controls">
        <img src="<?=base_url()?>banner/<?=$result->banner_id?>/<?=$result->banner_image?>" width="100" height="50" />
                        </div>
                        </div>
                        
                        <div class="control-group">
                        <label class="control-label" for="fileInput">Banner Image</label>
                        <div class="controls">
                        <input class="input-file uniform_on" id="fileInput" type="file" name="userfile">
                        </div>
                        </div>
                        
                        
                        
                      <div class="form-actions">
                            <input type="submit"  name="submit" class="btn btn-primary" value="Save changes">
                            <button type="reset" class="btn">Reset</button>
                      </div>
                        
                        
                    </fieldset>
                </form>-->
                            
                            
                                                        <div class="block">
       <h4>EDIT BANNER</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('banner/edit_banners/'.$id) ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Banner Tittle:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="banner_tittle" value="<?=$result->banner_tittle?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="banner_description" value="<?=$result->banner_description?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group">
                                           <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
               <img src="<?=base_url()?>assets/udayamotors/images/banner/<?=$result->banner_image?>" width="100" height="50" />   
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
                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
<!--                                <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>                                                                                       
                                </div>                                               
    </form>
           
           </div>              
                            
                            
                            
                <?php }else{ ?>
    
                                         <div class="block">
       <h4>ADD BANNER</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('banner/add_banner') ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Banner Tittle:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="banner_tittle" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="banner_description" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Image:</label>  
                                        <div class="col-md-9">
                                         <input class="iform-control"  type="file" name="userfile" required>
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