         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 

                <?php if(@$id != NULL){ ?>
       
                           <div class="block">
       <h4>EDIT EVENT</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('events/edit_eventss/'.$id) ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
          
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Tittle:</label>  
                                        <div class="col-md-9">
     <input type="text" class="form-control" name="title" value="<?=$result->title?>" required/>
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
       <img src="<?=base_url()?>assets/udayamotors/images/shop/events/<?=$result->image?>" width="100" height="50" />   
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
                                        <label class="col-md-3 control-label">Date:</label>  
                                        <div class="col-md-9">
                         <input type="date" class="form-control" name="dates" value="<?=$result->date?>" required/>
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
       <h4>ADD EVENTS </h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('events/add_events') ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
            
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Tittle :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="title" required/>
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
                                         <input class="iform-control"  type="file" name="userfile" required>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Date:</label>  
                                        <div class="col-md-9">
                                            <input type="date" class="form-control" name="dates" required/>
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