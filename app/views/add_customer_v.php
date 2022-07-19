<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>EDIT CUSTOMER</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('customer/edit_1/' . $id) ?>"  enctype="multipart/form-data" method="post">
                        <div class="panel-body">



                        <div class="form-group">
                        <label class="col-md-3 control-label">Customer Type<small style="color:red">*</small> :</label>
                            <div class="col-md-9">                                                               
                            <select class="form-control select" name="customer_type_id" data-live-search="true" required>
                                <?php foreach ($result as $row): ?>
                             <option value="<?=$row->customer_type_id?>" <?php if($row->customer_type_id == $res->customer_type_id){ echo 'selected' ;} ?>><?=$row->customer_types?></option>
                                 <?php endforeach; ?>
                            </select>
                             </div>
                        </div>
                            
                            
                            <div class="form-group">
               <label class="col-md-3 control-label">Phone Number <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="phone_number"  value="<?=$res->phone_number?>"  maxlength="20"/>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Password <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
           <input type="text" class="form-control" name="password"  value="<?=$res->phone_number?>" maxlength="50" required/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Name <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
 <input type="text" class="form-control" name="first_name"  value="<?=$res->first_name?>"  maxlength="50" required/>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Last Name <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="last_name" value="<?=$res->last_name?>"  maxlength="50" required/>
                                </div>
                            </div>
                            
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Email ID <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
           <input type="email" class="form-control" name="email_id" value="<?=$res->email_id?>"  maxlength="50" required/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Address <small style="color:red">*</small> : </label>
                                <div class="col-md-9">
                      <textarea class="form-control" rows="5" name="address"><?=$res->address?></textarea>
                                </div>
                            </div>
                        
                            
                            
                                      <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <?php if($res->customer_image == NULL) { ?>
                <img src="<?= base_url() ?>assets/assets/images/users/no-image.jpg" width="50" height="50" />
                
                                   <?php } else { ?>
                
  <img src="<?= base_url() ?>customer/<?= $res->customer_image ?>" width="50" height="50" />
<a href="<?=site_url('customer/disable_image/' .$res->customer_id)?>"<i class="fa fa-times-circle" aria-hidden="true" title="delete" style="position: absolute;top:0px;right: 250px;z-index: 96;"></i></a>
                                   
                                    <?php } ?>    
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
                            </div>                                                                                       
                        </div>                                               
                    </form>

                </div>   
            <?php } else { ?>

                <div class="block">
                    <h4>ADD CUSTOMER</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('customer/add') ?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

                            
                        <div class="form-group">
                        <label class="col-md-3 control-label">Customer Type<small style="color:red">*</small> :</label>
                            <div class="col-md-9">                                                               
                            <select class="form-control select" name="customer_type_id" data-live-search="true" required>
                                <?php foreach ($result as $row): ?>
                             <option value="<?=$row->customer_type_id?>"><?=$row->customer_types?></option>
                                 <?php endforeach; ?>
                            </select>
                             </div>
                        </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone Number <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="phone_number"   maxlength="20" required/>
    <!--                         <span class="help-block">min size = 2, max size = 8</span>-->
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Password <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="password"   maxlength="50" required/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Name <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="first_name"   maxlength="50" required/>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Last Name <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="last_name"   maxlength="50" required/>
                                </div>
                            </div>
                            
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Email ID <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email_id"   maxlength="50" required/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Address <small style="color:red">*</small> : </label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="5" name="address" required></textarea>
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
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                            </div>                                                                                                                          
                        </div>                                               

                    </form>
                </div>
            <?php } ?>

        </div>
    </div>            
</div>


