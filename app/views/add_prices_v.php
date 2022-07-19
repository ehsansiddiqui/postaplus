         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 

                <?php if(@$id != NULL){ ?>
       
                           <div class="block">
       <h4>EDIT ON ROAD PRICE</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('prices/edit_pricess/'.$id) ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" >State:</label>
                                        <div class="col-md-9">                                                      
                <select class="form-control select" name="state_id" data-live-search="true" required>
                                  <option value="" > --select one --</option>
                                                <?php foreach ($state as $row): ?>
        
          <option value="<?=$row->state_id?>" <?php if($row->state_id == $result->state_id){echo 'selected';} ?> ><?=$row->state_name?></option>
                                                <?php endforeach; ?>
                </select>
                                        </div>
                                    </div>    
                                    
                                    
                                    
                                                      <div class="form-group">
                                        <label class="col-md-3 control-label" >State:</label>
                                        <div class="col-md-9">                                                      
                <select class="form-control select" name="city_id" data-live-search="true" required>
               
                                                <?php foreach ($city as $row): ?>
        
          <option value="<?=$row->city_id?>" <?php if($row->city_id == $result->city_id){echo 'selected';} ?> ><?=$row->city_name?></option>
                                                <?php endforeach; ?>
                </select>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                    
                              <div class="form-group">
                                        <label class="col-md-3 control-label">Models Name && Variant:</label>
                                        <div class="col-md-9">                                                                                
                 <select class="form-control select" name="vehicle_to_variant_id" data-live-search="true" required>
                                                <?php foreach ($vehicle_to_variant as $row): ?>
       <option value="<?=$row->vehicle_to_variant_id?>" <?php if($row->vehicle_to_variant_id == $result->vehicle_to_variant_id){echo 'selected';} ?>><?=$row->short_title?>---><?=$row->variant_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                </div> 
                                    
                                    
                                    
                                    
                                    

                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label"> Onroad Price:</label>  
                                        <div class="col-md-9">
         <input type="text" class="form-control" name="onroad_price"  value="<?=$result->onroad_price?>" required/>
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
       <h4>ADD ON ROAD PRICE</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('prices/add_prices') ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" >State:</label>
                                        <div class="col-md-9">                                                      
                <select class="form-control select" name="state_id" data-live-search="true" onchange="fetch_select(this.value);" required>
                                  <option value="" >--select one --</option>
                                                <?php foreach ($state as $row): ?>
        
          <option value="<?=$row->state_id?>" ><?=$row->state_name?></option>
                                                <?php endforeach; ?>
                </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div id="display"></div><br>
                                    

                                    
                                    
                   <!--          <div class="form-group">
                                        <label class="col-md-3 control-label">Models Name && Variant:</label>
                                        <div class="col-md-9">                                                                                
                 <select class="form-control select" name="vehicle_to_variant_id" data-live-search="true" required>
                                                <?php //foreach ($vehicle_to_variant as $row): ?>
       <option value="<?php //$row->vehicle_to_variant_id?>"><?php //$row->short_title?>---><?php //$row->variant_name?>

<!--</option>-->
                                                <?php //endforeach; ?>
<!--                                            </select>
                                        </div>
                               </div>-->
                                    
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
                                    
                                    
                                    
                                 
                                <div id="success1"></div> 
                                <br>
   
                                <div id="success"></div>      
                                <br>   
                                         
                               <div id="success2"></div>   
                                <br>          



  
                                <div class="form-group">
                                        <label class="col-md-3 control-label"> Onroad Price:</label>  
                                        <div class="col-md-9">
                           <input type="text" class="form-control" name="onroad_price"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                </div>
                                                                                           
                                <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                </div>
                                    
                                </div>                                               
    </form>
           
           </div>       
                            
                            
                            
                            
                <?php } ?>


                        </div>
                    </div>            
       </div>


<script type="text/javascript">
    
function fetch_select(val)
{
	$.ajax({
		 type: "POST",
		 dataType:'html',
		 url: '<?=site_url('prices/get_state')?>',
		 		 data:{'ids' : val},
		success: function(data){  
		$('#display').html(data);	
		 }
	});   
}
</script>


<script type="text/javascript">
$(document).ready(function()
{	
    
	function getAll(){
            
		var e = document.getElementById("getcategory");
                var id = e.options[e.selectedIndex].value;    
                var cate_id = null ;
                $.ajax
		({      type: "POST",  
			url: '<?=site_url('specifications/get_brand')?>',
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
			url: '<?=site_url('specifications/get_brand')?>',
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