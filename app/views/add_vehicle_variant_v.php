         

 <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 

                <?php if(@$id != NULL){ ?>
       
                           <div class="block">
       <h4>EDIT VARIANT</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('variant/edit_variant_vehicless/'.$id.'/'.$variant_id) ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Models Name:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="vehicle_id" data-live-search="true" required>
                                                <?php foreach ($vehicle as $row): ?>
       <option value="<?=$row->vehicle_id?>" <?php if($row->vehicle_id == $result->vehicle_id){echo 'selected';} ?>><?=$row->short_title?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                           
                                    
                                           
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Variant Name:</label>  
                                        <div class="col-md-9">
                          <input type="text" class="form-control" name="variant_name" value="<?=$result->variant_name?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>  

                                    
  
                  
                                    
                                                               
                            <div class="btn-group pull-right">
                                        
                     <input type="hidden" class="form-control" name="variant_id" value="<?=$result->vehicle_variant_id?>"/>    
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
<!--                                <button class="btn btn-primary" type="submit">Submit</button>-->
                            </div>                                                                                       
                        </div>                                               
    </form>
           
           </div>              
                            
                            
                            
                <?php }else{ ?>
    
                                         <div class="block">
       <h4>ADD VARIANT</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('variant/add_variant_vehicles') ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Vehicle Type :</label>
                                        <div class="col-md-9">                                                                        
                   <select class="form-control select" name="category_id" data-live-search="true" required>
                                                <?php foreach ($category as $row): ?>
       <option value="<?=$row->category_id?>"><?=$row->category_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    -->
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Vehicle Type :</label>
                                        <div class="col-md-9">                                                                                
                           <select class="form-control select" name="category_id" data-live-search="true" id="getcategory" >
                                                <?php foreach ($category as $row): ?>
                               <option value="<?=$row->category_id?>"><?=strtoupper($row->category_name)?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div> 
                                    
                                    
                                    
                                    
                                    
<!--                                <div class="form-group">
                                        <label class="col-md-3 control-label">Brand :</label>
                                        <div class="col-md-9">                                                                                
               <select class="form-control select" name="brand_id" data-live-search="true" id="getvariant" required>
                                               <?php foreach ($brand as $row): ?>
       <option value="<?=$row->brand_id?>"><?=$row->brand_name?></option>
                                                <?php endforeach; ?>
               </select>
                                        </div>
                                    </div>-->


                                   <div id="success1"></div> 
                                    
                                   <br>
                                    
                                    
                                    
                                    <div id="success"></div> 
                                    
                                    <br>
                                    
                                    
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Models Name :</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="vehicle_id" data-live-search="true" required>
                                                <?php foreach ($vehicle as $row): ?>
       <option value="<?=$row->vehicle_id?>"><?=$row->short_title?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>-->
                                    
                                    
                                  <div class="form-group">
                                        <label class="col-md-3 control-label">Variant Name:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="variant_name" required/>
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






<script type="text/javascript">
$(document).ready(function()
{	
    
	function getAll(){
            
		var e = document.getElementById("getcategory");
                var id = e.options[e.selectedIndex].value;    
                var cate_id = null ;
                $.ajax
		({      type: "POST",  
			url: '<?=site_url('variant/get_brand')?>',
			data:{ids:id,cate:cate_id},
			cache: false,
			success: function(r)
			{
				$("#success1").html(r);
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
			url: '<?=site_url('variant/get_brand')?>',
                    	data: {ids:id,cate:cate_id},
			cache: false,
			success: function(r)
			{
				$("#success1").html(r);
			} 
		});
	})
});
</script>