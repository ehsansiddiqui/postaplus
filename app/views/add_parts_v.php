         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 

                <?php if(@$id != NULL){ ?>
       
                           <div class="block">
       <h4>EDIT PARTS</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('parts/edit_partss/'.$id) ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
                          
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">TYPES :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="parts_type_id" data-live-search="true" required>
                                                <?php foreach ($parts as $row): ?>
       <option value="<?=$row->parts_type_id?>" <?php if($row->parts_type_id == $result->parts_types_id){echo 'selected';} ?>><?=$row->parts_type_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                   
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Short Title:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="short_title" value="<?=$result->short_title?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Detail Title:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="detail_title" value="<?=$result->detail_title?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
              <textarea class="form-control" name="description"  required><?=$result->description?></textarea>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group">
                                           <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
               <img src="<?=base_url()?>assets/udayamotors/images/shop/parts/<?=$result->anchor_image?>" width="100" height="50" />   
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
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price MIN:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="expected_price" value="<?=$result->expected_price?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                     </div>
                                    
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price Max:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="model_price_max" value="<?=$result->model_price_max?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                       </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Featured Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="featured_status" data-live-search="true" required>
                                                <option value="0" <?php if($result->featured_status == 0){echo 'selected';} ?>>NO</option>
                                                <option value="1" <?php if($result->featured_status == 1){echo 'selected';} ?>>YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Recommended Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="recommended_status" data-live-search="true" required>
                                                <option value="0"<?php if($result->recommended_status == 0){echo 'selected';} ?>>NO</option>
                                                <option value="1" <?php if($result->recommended_status == 1){echo 'selected';} ?>>YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Popular Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="popular_status" data-live-search="true" required>
                                                <option value="0" <?php if($result->popular_status == 0){echo 'selected';} ?>>NO</option>
                                                <option value="1" <?php if($result->popular_status == 1){echo 'selected';} ?>>YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Upcoming Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="upcoming_status" data-live-search="true" required>
                                                <option value="0" <?php if($result->upcoming_status == 0){echo 'selected';} ?>>NO</option>
                                                <option value="1" <?php if($result->upcoming_status == 1){echo 'selected';} ?>>YES</option>
                                            </select>
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
       <h4>ADD PARTS</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('parts/add_parts') ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">TYPES :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="parts_type_id" data-live-search="true" required>
                                                <?php foreach ($result as $row): ?>
       <option value="<?=$row->parts_type_id?>"><?=$row->parts_type_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
   
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Short Title:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="short_title" required/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Detail Title:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="detail_title" required/>
                                         <span class="help-block"></span>
                                        </div>
                                </div> 
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="description" required/>
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
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price MIN:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="expected_price" required/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price Max:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="model_price_max" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Featured Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="featured_status" data-live-search="true" required>
                                                <option value="0">NO</option>
                                                <option value="1">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Recommended Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="recommended_status" data-live-search="true" required>
                                                <option value="0">NO</option>
                                                <option value="1">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Popular Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="popular_status" data-live-search="true" required>
                                                <option value="0">NO</option>
                                                <option value="1">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Upcoming Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="upcoming_status" data-live-search="true" required>
                                                <option value="0">NO</option>
                                                <option value="1">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                       
                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                     <!-- <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>
                                    
                                </div>                                               
    </form>
           
           </div>       
                                            
                <?php } ?>

                        </div>
                    </div>            
       </div>