
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Offline Services</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('offlineservices/edit_1/'. $id) ?>"  enctype="multipart/form-data" method="post">
                        <div class="panel-body">

     
                            
                            
                               <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="others_tittle" value="<?=$res->others_tittle?>"  maxlength="255" required/>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Arabic Tittle :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="ar_others_tittle" value="<?=$res->ar_others_tittle?>"  maxlength="255" required/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description:</label>  
                                <div class="col-md-9">  
                             <textarea class="form-control" name="others_description"><?=$res->others_description?></textarea>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Arabic Description:</label>  
                                <div class="col-md-9">  
                            <textarea class="form-control" name="ar_others_description"><?=$res->ar_others_description?></textarea>
                                </div>
                            </div>
            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>  
                                <div class="col-md-9">
                        <img src="<?=base_url()?>others/<?=$res->others_image?>" width="100" height="50"/>        
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Image:</label>  
                                <div class="col-md-9">
                                    <input type="file"  name="userfile"/>
                                </div>
                            </div>
                            
                            
                            <div class="btn-group pull-right">
                                <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                            </div>                                                                                       
                        </div>                                               
                    </form>

                </div>   
            <?php } else { ?>

                <div class="block">
                    <h4>Add Offline Services</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('offlineservices/add') ?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

           
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="others_tittle"   maxlength="255" required/>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Arabic Tittle :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="ar_others_tittle"   maxlength="255" required/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description:</label>  
                                <div class="col-md-9">  
                             <textarea class="form-control" name="others_description"></textarea>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Arabic Description:</label>  
                                <div class="col-md-9">  
                            <textarea class="form-control" name="ar_others_description"></textarea>
                                </div>
                            </div>
            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Image:</label>  
                                <div class="col-md-9">
                                    <input type="file" name="userfile"  required/>
                                </div>
                            </div>    
                            
                            
                            
                            
                            <div class="btn-group pull-right">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                            </div>                                                                                                                          
                        </div>                                               

                    </form>
                </div>
            <?php } ?>

        </div>
    </div>            
</div>