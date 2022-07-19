         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 

                <?php if(@$id != NULL){ ?>
       
                           <div class="block">
       <h4>EDIT VEHICLE MODEL</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('models/edit_modelss/'.$id) ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Category :</label>
                                        <div class="col-md-9">                                                                                
                          <select class="form-control select" name="category_id" data-live-search="true" id="getcategory">
                                                <?php foreach ($category as $row): ?>
       <option value="<?=$row->category_id?>" <?php if($row->category_id == $result->category_id){echo 'selected';} ?> ><?=$row->category_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                         <div id="success"></div><br>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Body Type:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="vehicle_body_type_id" data-live-search="true" required>
                                                <?php foreach ($body_type as $row): ?>
 <option value="<?=$row->vehicle_body_type_id?>" <?php if($row->vehicle_body_type_id == $result->vehicle_body_type_id){echo 'selected';} ?> ><?=$row->body_type_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
      
                                    
                                   
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Model Name :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="short_title" value="<?=$result->short_title?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Tittle:</label>  
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
               <img src="<?=base_url()?>assets/udayamotors/images/shop/new/<?=$result->anchor_image?>" width="100" height="50" />   
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
                                            <input type="number" class="form-control" name="expected_price" value="<?=$result->expected_price?>" id="MinimumPrice"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                     </div>
                                    
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price Max:</label>  
                                        <div class="col-md-9">
  <input type="number" class="form-control" name="model_price_max" value="<?=$result->model_price_max?>" id="MaximumPrice" required/>
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
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Bestoffer Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="bestoffer_status" data-live-search="true" required>
                                                <option value="0" <?php if($result->bestoffer_status == 0){echo 'selected';} ?>>NO</option>
                                                <option value="1"<?php if($result->bestoffer_status == 1){echo 'selected';} ?>>YES</option>
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
       <h4>ADD VEHICLE MODEL</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('models/add_models') ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Vehicle Type :</label>
                                        <div class="col-md-9">                                                                                
                           <select class="form-control select" name="category_id" data-live-search="true" id="getcategory" >
                                                <?php foreach ($category as $row): ?>
                                                <option value="<?=$row->category_id?>"><?=$row->category_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div id="success"></div><br>
                                    
                                    
<!--                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Brand:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="brand_id" data-live-search="true" required>
                                                <?php foreach ($brand as $row): ?>
                                                <option value="<?=$row->brand_id?>"><?=$row->brand_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>-->
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Body Type:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="vehicle_body_type_id" data-live-search="true" required>
                                                <?php foreach ($body_type as $row): ?>
                                                <option value="<?=$row->vehicle_body_type_id?>"><?=$row->body_type_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
<!--                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Fuel Type:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="vehicle_fuel_type_id" data-live-search="true" required>
                                                <?php foreach ($fuel_type as $row): ?>
                                                <option value="<?=$row->vehicle_fuel_type_id?>"><?=$row->fuel_type_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>-->
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Model Name:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="short_title" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Tittle :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="detail_title" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
                                         
                            <textarea class="form-control" name="description"  required></textarea>
                                            
                                   <!-- <input type="text" class="form-control" name="description" required/>-->
                            
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
                                        <label class="col-md-3 control-label">Expected Price MIN:</label>  
                                        <div class="col-md-9">
                           <input type="number" class="form-control" name="expected_price" id="MinimumPrice" required/>
                                         <span class="help-block"></span>
                                        </div>
                                     </div>
                                    
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Price Max:</label>  
                                        <div class="col-md-9">
                        <input type="number" class="form-control" name="model_price_max" id="MaximumPrice" required/>
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
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Bestoffer Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="bestoffer_status" data-live-search="true" required>
                                                <option value="0">NO</option>
                                                <option value="1">YES</option>
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
                            
                            
                            
                            
                <?php } ?>



                        </div>
                    </div>            
       </div>



<?php if(@$id != NULL){  ?>

<script type="text/javascript">
$(document).ready(function()
{	
    
	function getAll(){
		var e = document.getElementById("getcategory");
                var id = e.options[e.selectedIndex].value;    
                var cate_id = <?=$id?>;
     

                $.ajax
		({      type: "POST",  
			url: '<?=site_url('models/get_brand')?>',
			data:{ids:id,cate:cate_id},
			cache: false,
			success: function(r)
			{
				$("#success").html(r);
			}
		});			
	} 
	getAll();
	$("#getcategory").change(function()
	{  
		var id = $(this).find(":selected").val();
                var cate_id = <?=$id?>;
                
                $.ajax
		({      type: "POST",
			url: '<?=site_url('models/get_brand')?>',
                    	data: {ids:id,cate:cate_id},
			cache: false,
			success: function(r)
			{
				$("#success").html(r);
			} 
		});
	})
});
</script>

<?php }  else {  ?>



<script type="text/javascript">
$(document).ready(function()
{	
    
	function getAll(){
		var e = document.getElementById("getcategory");
                var id = e.options[e.selectedIndex].value;    
                var cate_id = null ;
                $.ajax
		({      type: "POST",  
			url: '<?=site_url('models/get_brand')?>',
			data:{ids:id,cate:cate_id},
			cache: false,
			success: function(r)
			{
				$("#success").html(r);
			}
		});			
	} 
	getAll();
	$("#getcategory").change(function()
	{  
		var id = $(this).find(":selected").val();
                var cate_id = null ;
                
                $.ajax
		({      type: "POST",
			url: '<?=site_url('models/get_brand')?>',
                    	data: {ids:id,cate:cate_id},
			cache: false,
			success: function(r)
			{
				$("#success").html(r);
			} 
		});
	})
});
</script>
<?php } ?>

<script type="text/javascript">  
$("#MinimumPrice, #MaximumPrice").change(function (e) {
    var lil = parseInt($("#MinimumPrice").val(), 10);
    var big = parseInt($("#MaximumPrice").val(), 10);

    if (lil > big) {
        var targ = $(e.target);
        if (targ.is("#MaximumPrice")) {
            alert("Max must be greater than Min");
            $('#MaximumPrice').val(lil);
        }
        if (targ.is("#MinimumPrice")) {
            alert("Min must be less than Max");
            $('#MinimumPrice').val(big);
        }
    }
});
</script>
