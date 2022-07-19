<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>EDIT CUSTOMER TYPE</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('customer_type/edit_1/' . $id) ?>"  enctype="multipart/form-data" method="post">
                        <div class="panel-body">



                        <div class="form-group">
                        <label class="col-md-3 control-label">Price package<small style="color:red">*</small> :</label>
                            <div class="col-md-9">                                                               
                            <select class="form-control select" name="price_package_id" data-live-search="true" required>
                                <?php foreach ($result as $row): ?>
                             <option value="<?=$row->price_package_id?>" <?php if($row->price_package_id == $res->price_package_id){ echo 'selected' ;} ?>><?=$row->price_package_name?></option>
                                 <?php endforeach; ?>
                            </select>
                             </div>
                        </div>
                            
                            
                            <div class="form-group">
               <label class="col-md-3 control-label">Customer type <small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="customer_types"  value="<?=$res->customer_types?>"  maxlength="200"/>
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
                    <h4>ADD CUSTOMER TYPE</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('customer_type/add') ?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

                            
                        <div class="form-group">
                        <label class="col-md-3 control-label">price package<small style="color:red">*</small> :</label>
                            <div class="col-md-9">                                                               
                            <select class="form-control select" name="price_package_id" data-live-search="true" required>
                                <?php foreach ($result as $row): ?>
                             <option value="<?=$row->price_package_id?>"><?=$row->price_package_name?></option>
                                 <?php endforeach; ?>
                            </select>
                             </div>
                        </div>
                            
                            
                            <div class="form-group">
                          <label class="col-md-3 control-label">Customer Types<small style="color:red">*</small> :</label>  
                                <div class="col-md-9">
                        <input type="text" class="form-control" name="customer_types"   maxlength="100" required/>
  
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


