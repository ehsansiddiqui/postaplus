<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>EDIT PRODUCT PRICE</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('price/edit_1/' . $id) ?>" method="post">
                        <div class="panel-body">


                            
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Category<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="types_id" data-live-search="true" required>
                                                <?php foreach ($category as $row): ?>
       <option value="<?=$row->types_id?>" <?php if($row->types_id == $res->types_id){echo 'selected';} ?>><?=$row->types_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                            
                            
                        <div class="form-group">
                        <label class="col-md-3 control-label">Product<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                               
                                    <select class="form-control select" name="product_id" data-live-search="true" required>
                                                <?php foreach ($product as $row): ?>
       <option value="<?=$row->product_id?>" <?php if($row->product_id == $res->product_id){echo 'selected';} ?>><?=$row->product_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                        </div>     

                            
                            
                        <div class="form-group">
                        <label class="col-md-3 control-label">Type<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                               
                                    <select class="form-control select" name="gender_id" data-live-search="true" required>
                                                <?php foreach ($gender as $row): ?>
       <option value="<?=$row->gender_id?>" <?php if($row->gender_id == $res->gender_id){echo 'selected';} ?>><?=$row->gender?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                        </div>
                            
                            
                        <div class="form-group">
                        <label class="col-md-3 control-label">Price Package<small style="color:red">*</small> :</label>
                                    <div class="col-md-9">                                                               
                  <select class="form-control select" name="price_package_id" data-live-search="true" required>
                                                <?php foreach ($price_package as $row): ?>
       <option value="<?=$row->price_package_id?>" <?php if($row->price_package_id == $res->price_package_id)?>><?=$row->price_package_name?></option>
                                                <?php endforeach; ?>
                                    </select>
                                    </div>
                        </div>
                            
                            
                          <div class="form-group">
                          <label class="col-md-3 control-label">Product Price <small style="color:red">*</small>:</label>  
                                <div class="col-md-9">
<input type="text"  maxlength="50"  class="form-control" name="product_price" value="<?=$res->product_price?>" required/>
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
                    <h4>ADD PRODUCT PRICE</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('price/add') ?>" method="post">

                        <div class="panel-body">


                                         
                       
                        <div class="form-group">
                        <label class="col-md-3 control-label">Category<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                               
                                        <select class="form-control select" name="types_id" data-live-search="true" required>
                                                <?php foreach ($category as $row): ?>
       <option value="<?=$row->types_id?>"><?=$row->types_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                        </div>
                            
                            
                            
                        <div class="form-group">
                        <label class="col-md-3 control-label">Product<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                               
                                    <select class="form-control select" name="product_id" data-live-search="true" required>
                                                <?php foreach ($product as $row): ?>
       <option value="<?=$row->product_id?>"><?=$row->product_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                        </div>     

                            
                            
                        <div class="form-group">
                        <label class="col-md-3 control-label">Type<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                               
                                    <select class="form-control select" name="gender_id" data-live-search="true" required>
                                                <?php foreach ($gender as $row): ?>
       <option value="<?=$row->gender_id?>"><?=$row->gender?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                        </div>  
                            
                            
                        <div class="form-group">
                        <label class="col-md-3 control-label">Price Package<small style="color:red">*</small> :</label>
                                    <div class="col-md-9">                                                               
                  <select class="form-control select" name="price_package_id" data-live-search="true" required>
                                                <?php foreach ($price_package as $row): ?>
       <option value="<?=$row->price_package_id?>"><?=$row->price_package_name?></option>
                                                <?php endforeach; ?>
                                    </select>
                                    </div>
                        </div>     
                            
                            
                          <div class="form-group">
                          <label class="col-md-3 control-label">Product Price <small style="color:red">*</small>:</label>  
                                <div class="col-md-9">
   <input type="text"  maxlength="50"  class="form-control" name="product_price"  required/>
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


