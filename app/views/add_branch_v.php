
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Branch</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('branch/edit_1/'. $id) ?>"  enctype="multipart/form-data" method="post">
                        <div class="panel-body">

     
                             
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="branch_name" value="<?=$res->branch_name?>"  maxlength="255" required/>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Arabic Tittle :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="branch_name_ar" dir="rtl" value="<?=$res->branch_name_ar?>"  maxlength="255" required/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Email :</label>  
                                <div class="col-md-9">
        <input type="email" class="form-control" name="email"  value="<?=$res->branch_email?>"  maxlength="255" required />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Phone Number :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="phone_number" value="<?=$res->phone_number?>"  maxlength="255" required/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Whatsapp No :</label>  
                                <div class="col-md-9">
   <input type="text" class="form-control" name="whatsapp_no" value="<?=$res->whatsapp_no?>"  maxlength="15" required/>
                                </div>
                            </div>
                            
                            
                           <div class="form-group">
                                <label class="col-md-3 control-label"> Location :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="address" value="<?=$res->address?>"  maxlength="255" required/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Google Map URL  :</label>  
                                <div class="col-md-9">
                <input type="text" class="form-control" name="google_map_url" value="<?=$res->google_map_url?>" />
                                </div>
                            </div>
                         
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>  
                                <div class="col-md-9">
                        <img src="<?=base_url()?>branch/<?=$res->branch_image?>" width="100" height="50"/>        
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Image:</label>  
                                <div class="col-md-9">
                                    <input type="file"  name="userfile"/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Password :</label>  
                                <div class="col-md-9">
             <input type="password" class="form-control" name="password" value="<?=@$res->password?>"  required="" maxlength="255"/>
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
                    <h4>Add Branch</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('branch/add') ?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

           
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="branch_name"   maxlength="255" required/>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Arabic Tittle :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="branch_name_ar" dir="rtl"  maxlength="255" required/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Email :</label>  
                                <div class="col-md-9">
                <input type="email" class="form-control" name="email"   maxlength="255" required />
                                </div>
                            </div>
                            
  
                            <div class="form-group">
                                <label class="col-md-3 control-label">  Phone Number :</label>  
                                <div class="col-md-9">
                   <input type="text" class="form-control" name="phone_number"   maxlength="15" required/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Whatsapp No :</label>  
                                <div class="col-md-9">
                <input type="text" class="form-control" name="whatsapp_no"   maxlength="15" required/>
                                </div>
                            </div>
                            
                            
                           <div class="form-group">
                                <label class="col-md-3 control-label"> Location  :</label>  
                                <div class="col-md-9">
                <input type="text" class="form-control" name="address"   maxlength="255" required/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Google Map URL  :</label>  
                                <div class="col-md-9">
                <input type="text" class="form-control" name="google_map_url"  />
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Image:</label>  
                                <div class="col-md-9">
                                    <input type="file" name="userfile"  required/>
                                </div>
                            </div>  
                            
                            
                        <div class="form-group">
                                <label class="col-md-3 control-label"> Password :</label>  
                                <div class="col-md-9">
                  <input type="password" class="form-control" name="password"  required="" maxlength="255"/>
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