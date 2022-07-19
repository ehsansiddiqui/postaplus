
<div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
                
                <?php if(@$id != NULL){   ?>
                            
                            
                           
  
                          <div class="block">
       <h4>EDIT CLASS</h4>
     <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio_classes/edit_1/'.$id) ?>" method="post" enctype="multipart/form-data">
                                
                                <div class="panel-body">
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio<small style="color:red">*</small>:</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="studio_id" data-live-search="true"  id="getactivity" required>
                                                <?php foreach ($result as $row): ?>
       <option value="<?=$row->studio_id?>" <?php if($row->studio_id == $res->studio_id){echo 'selected';} ?>><?=$row->studio_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Class Name<small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_classes_name" value="<?=$res->studio_classes_name?>"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                    
                                    
                                    
                                    
                                  <div id="success"></div>
                                    
                                    
                                    <br>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Level<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="level_id" data-live-search="true" required>
                                                <?php foreach ($level as $row): ?>
       <option value="<?=$row->level_id?>" <?php if($row->level_id == $res->level_id){echo 'selected';} ?>><?=$row->level_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Date<small style="color:red">*</small> :</label>  
                                        <div class="col-md-9">             
  <input type='text' name="date" class='form-control datepicker-here' data-language='en' value="<?=date('m/d/Y', strtotime($res->date))?>" id="minMaxExample" required=""/> 
                                <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
<!--                                             <script>
                                                 $('#minMaxExample').datepicker({
                                                language: 'en',
                                                 minDate: new Date() // Now can select only dates, which goes after today
                                                 })    
                                             </script> -->
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Start Time<small style="color:red">*</small>:</label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text"  name="start_time" value="<?=$res->start_time?>"  class="form-control timepicker24"/>
<!--                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">End Time<small style="color:red">*</small> :</label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" name="end_time" value="<?=$res->end_time?>" class="form-control timepicker24"/>
<!--                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">About</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="description"><?=$res->description?></textarea>
                                        </div>
                                </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Other Details</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="other_details"><?=$res->other_details?></textarea>
                                        </div>
                                    </div>
                                    
                                    
                                    
                    <div class="form-group">
                                        <label class="col-md-3 control-label">Available Slots<small style="color:red">*</small> :</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="total_available_slots" value="<?=$res->total_available_slots?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                    </div> 



                        <div class="form-group">
                                        <label class="col-md-3 control-label">Booking Cut Off Time <small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">
                <input type="text" class="form-control" name="cutoff_time" value="<?=$res->cutoff_time?>"  required/>
                                         <span class="help-block"><small>Hours</small></span>
                                        </div>
                        </div> 
                                    
                                    
            
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Latitude:</label>  
                                        <div class="col-md-9">
       <input type="text" class="form-control" name="class_latitude" value="<?=$res->class_latitude?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude:</label>  
                                        <div class="col-md-9">
       <input type="text" class="form-control" name="class_longitude" value="<?=$res->class_longitude?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>-->



                                <div class="location">                         
                                             
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Location:</label>  
                                        <div class="col-md-9">
          <input class="form-control geocomplete" type="text" placeholder="Type in an address" value="" />
<!--      <input class="find" type="button" value="find" />-->
                                         <span class="help-block"></span>
                                        </div>
                                    </div>             
                                             
                                    <fieldset class="details">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Latitude<small style="color:red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lat" value="<?=$res->class_latitude?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude<small style="color:red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng"  value="<?=$res->class_longitude?>" required/>
                                         <span class="help-block"></span>
                                      </div>
                                    </div>
                                   </fieldset>
                          
                             </div>

                                                                                                  
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                   </div> 
 
                                </div>                                               
              </form>
           
             </div>              
                            
                            
                            
                <?php }else{ ?>
    
      <div class="block">
       <h4>ADD CLASS</h4>
     <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio_classes/add') ?>" method="post" enctype="multipart/form-data">
                                
                                <div class="panel-body">
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="studio_id" data-live-search="true" id="getactivity" required>
                                                <?php foreach ($result as $row): ?>
       <option value="<?=$row->studio_id?>"><?=$row->studio_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Class Name <small style="color:red">*</small> :</label>  
                                        <div class="col-md-9">
                                         <input type="text" class="form-control" name="studio_classes_name"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                    
                                    
                                    <div id="success"></div>
                                    
                                    
                                    <br>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Level <small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="level_id" data-live-search="true" required>
                                                <?php foreach ($level as $row): ?>
       <option value="<?=$row->level_id?>"><?=$row->level_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Date <small style="color:red">*</small> :</label>  
                                        <div class="col-md-9">
 <input type="text" name="date"  data-multiple-dates="18250" data-multiple-dates-separator=", "  data-language="en" class="form-control datepicker-here" id="minMaxExample" required>
                                <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                            <script>
                                                 $('#minMaxExample').datepicker({
                                                language: 'en',
                                                 minDate: new Date() // Now can select only dates, which goes after today
                                                 })    
                                             </script> 
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Start Time<small style="color:red">*</small> :</label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text"  name="start_time"   class="form-control timepicker24"/>
<!--                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">End Time<small style="color:red">*</small> :</label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" name="end_time"  class="form-control timepicker24"/>
<!--                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>-->
                                            </div>
                                        </div>
                                    </div>

                                 <div class="form-group">
                                        <label class="col-md-3 control-label">About:</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="description"></textarea>
                                        </div>
                                </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Other Details</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="other_details"></textarea>
                                        </div>
                                    </div>
                                             
                                             
                                             
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Available Slots<small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="total_available_slots" value="" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div> 



                        <div class="form-group">
                                        <label class="col-md-3 control-label">Booking Cut Off Time<small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">
                <input type="text" class="form-control" name="cutoff_time" value=""  required/>
                                         <span class="help-block"><small>Hours</small></span>
                                        </div>
                        </div>          
            
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Latitude:</label>  
                                        <div class="col-md-9">
                                      <input type="text" class="form-control" name="class_latitude"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude:</label>  
                                        <div class="col-md-9">
                                        <input type="text" class="form-control" name="class_longitude"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>-->




                            <div class="location">                         
                                             
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Location:</label>  
                                        <div class="col-md-9">
          <input class="form-control geocomplete" type="text" placeholder="Type in an address" value="" />
<!--      <input class="find" type="button" value="find" />-->
                                         <span class="help-block"></span>
                                        </div>
                                    </div>             
                                             
                                    <fieldset class="details">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Latitude<small style="color:red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lat" value="" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude<small style="color:red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng"  value="" required/>
                                         <span class="help-block"></span>
                                      </div>
                                    </div>
                                   </fieldset>
                          
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
$(document).ready(function()
{	
    
	function getAll(){
            
		var e = document.getElementById("getactivity");
                var studio_id = e.options[e.selectedIndex].value; 

                <?php if(isset($id)){?>
                var edit_id = <?=$id?> 
                <?php }else{ ?>
                 var edit_id = '';
                <?php } ?>
                $.ajax
		({      type: "POST",  
			url: '<?=site_url('studio_classes/get_activity')?>',
			data:{ids:studio_id,edit_ids:edit_id},
			cache: false,
			success: function(r)
			{    
                            //$("#success").val(r);
		            $("#success").html(r);
			}
		});			
	} 
	getAll();
        
	$("#getactivity").change(function()
	{  
		var studio_id = $(this).find(":selected").val(); ;
                
                $.ajax
		({      type: "POST",
			url: '<?=site_url('studio_classes/get_activity')?>',
                    	data: {ids:studio_id},
			cache: false,
			success: function(r)
			{
                            // $("#success").val(r);
                            $("#success").html(r);
			} 
		});
	})
});
</script>
