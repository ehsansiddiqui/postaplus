
<div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
                
                <?php if(@$id != NULL){ ?>
  
                          <div class="block">
       <h4>EDIT CLASS</h4>
     <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio_classes/edit_1_class/'.$id) ?>" method="post" enctype="multipart/form-data">
                                
                                <div class="panel-body">
                                   
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Type <small style="color:red">*</small>:</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="activity_id" data-live-search="true" required>
                                                <?php foreach ($activity as $row): ?>
       <option value="<?=$row->activity_id?>" <?php if($row->activity_id == $res->activity_id){echo 'selected';} ?>><?=$row->activity_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Class Name <small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="studio_classes_name" value="<?=$res->studio_classes_name?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>   -->


                                <div class="form-group">
                    <label class="col-md-3 control-label">Class Name <small style="color:red">*</small>:</label>
                                        <div class="col-md-9">                                                                            
                       <select class="form-control select" name="studio_classes_name" id="classes_name" data-live-search="true" required>
                                                <?php foreach ($class_master as $row): ?>
       <option value="<?=$row->class_name?>" <?php if($row->class_name == $res->studio_classes_name){echo 'selected';} ?>><?=$row->class_name?></option>
                                                <?php endforeach; ?>
                       </select>
                                        </div>
                                </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Level <small style="color:red">*</small>:</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="level_id" data-live-search="true" required>
                                                <?php foreach ($level as $row): ?>
       <option value="<?=$row->level_id?>" <?php if($row->level_id == $res->level_id){echo 'selected';} ?>><?=$row->level_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Instructor Name<small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="instructor_id" data-live-search="true" required>
                                                <?php foreach ($instructor as $row): ?>
       <option value="<?=$row->instructor_id?>" <?php if($row->instructor_id == $res->instructor_id){echo 'selected';} ?>><?=$row->instructor_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                   
<!--                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Start Time:</label>  
                                        <div class="col-md-9">
                                            <input type="datetime" class="form-control" name="start_time" value="<?=$res->start_time?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>-->
                                    
                                    
                                    
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">End Time:</label>  
                                        <div class="col-md-9">
                                            <input type="datetime" class="form-control" name="end_time" value="<?=$res->end_time?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>-->


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Date <small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">             
                                            <input type='text' name="date" class='form-control datepicker-here' data-language='en' value="<?=date('m/d/Y', strtotime($res->date))?>" required=""/> 
                                <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Start Time <small style="color:red">*</small>:</label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text"  name="start_time" value="<?=$res->start_time?>"  class="form-control timepicker24"/>
<!--                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">End Time <small style="color:red">*</small>:</label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" name="end_time" value="<?=$res->end_time?>" class="form-control timepicker24"/>
<!--                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>-->
                                            </div>
                                        </div>
                                    </div>

<!--                                 <div class="form-group">
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
                                    </div>-->

                                     <div id="s"></div>
                                     
                                     <br>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Available Slots <small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">
                 <input type="text" class="form-control" name="total_available_slots" value="<?=$res->total_available_slots?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div> 



<!--                        <div class="form-group">
                                        <label class="col-md-3 control-label">Booking Cut Off Time:</label>  
                                        <div class="col-md-9">
                <input type="text" class="form-control" name="cutoff_time" value="<?=$res->cutoff_time?>"  required/>
                                         <span class="help-block"><small>Hours</small></span>
                                        </div>
                        </div> -->

            
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
                   
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Cancel:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="status" data-live-search="true" required>
                                              <option value="1" <?php if($res->status == 0){echo 'selected';} ?>>YES</option>
                                              <option value="0" <?php if($res->status == 1){echo 'selected';} ?>>NO</option>
                                            </select>
                                        </div>
                                    </div>-->


                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                    </div> 
                                    
                                    
                                </div>                                               
    </form>
           
           </div>              
                            
                            
                            
                <?php }else{ ?>
    
                                         <div class="block">
       <h4>ADD CLASS</h4>
     <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio_classes/add_class') ?>" method="post" enctype="multipart/form-data">
           
                                         <div class="panel-body">
                                   
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Type <small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="activity_id" data-live-search="true" required>
                                                <?php foreach ($activity as $row): ?>
                                     <option value="<?=$row->activity_id?>"><?=$row->activity_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                             
                                             
                                    <div class="form-group">
                 <label class="col-md-3 control-label">Class Name <small style="color:red">*</small> :</label>
                                        <div class="col-md-9">                                                              
                                            <select class="form-control select" name="studio_classes_name" id="classes_name" data-live-search="true" required>
                                   <?php foreach ($class_master as $row): ?>
                                     <option value="<?=$row->class_name?>"><?=$row->class_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>         
                                             
                                             
<!--                                    <div class="form-group">
                <label class="col-md-3 control-label">Class Name <small style="color:red">*</small> :</label>  
                                        <div class="col-md-9">
                                         <input type="text" class="form-control" name="studio_classes_name"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>         -->
                                    
                                    
                                    
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
                                <label class="col-md-3 control-label">Instructor Name<small style="color:red">*</small>:</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="instructor_id" data-live-search="true" required>
                                                <?php foreach ($instructor as $row): ?>
       <option value="<?=$row->instructor_id?>" ><?=$row->instructor_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                 


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Date <small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">
                                            
<!--            <input type='text' name="date" class='form-control datepicker-here' data-language='en'  required=""/> -->
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
                                        <label class="col-md-3 control-label">Start Time <small style="color:red">*</small>:</label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text"  name="start_time"   class="form-control timepicker24"/>
<!--                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">End Time <small style="color:red">*</small>:</label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" name="end_time"  class="form-control timepicker24"/>
<!--                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>-->
                                            </div>
                                        </div>
                                    </div>

<!--                                 <div class="form-group">
                                        <label class="col-md-3 control-label">About</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="description"></textarea>
                                        </div>
                                </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Other Details</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="other_details"></textarea>
                                        </div>
                                    </div>-->

                                <div id="s"></div>
                                             
                                <br>           
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Available Slots <small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">
                                         <input type="text" class="form-control" name="total_available_slots"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                             
                                             
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Booking Cut Off Time:</label>  
                                        <div class="col-md-9">
                                         <input type="text" class="form-control" name="cutoff_time"  required/>
                                         <span class="help-block"><small>Hours</small></span>
                                        </div>
                                    </div>           -->
                                             
                                    
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
                                        <label class="col-md-3 control-label">Latitude <small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lat" value="" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude <small style="color:red">*</small>:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng"  value="" required/>
                                         <span class="help-block"></span>
                                      </div>
                                    </div>
                                   </fieldset>
                          
                      </div>
                                             
      
<!--                            <div class="form-group">
                                        <label class="col-md-3 control-label">Cancell:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="status" data-live-search="true" required>
                                              <option value="1">YES</option>
                                              <option value="0">NO</option>
                                            </select>
                                        </div>
                                </div>-->                                                                                    
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
            
		var e = document.getElementById("classes_name");
                var classes_name = e.options[e.selectedIndex].value; 
                

          
                $.ajax
		({      type: "POST",  
			url: '<?=site_url('studio_classes/get_classes_name')?>',
			data:{classes_names:classes_name},
			cache: false,
			success: function(r)
			{
                            //alert(r);
                            //$("#success").val(r);
		            $("#s").html(r);
			}
		});			
	} 
	getAll();
        
	$("#classes_name").change(function()
	{  
		var classes_name = $(this).find(":selected").val(); ;
                
                $.ajax
		({      type: "POST",
			url: '<?=site_url('studio_classes/get_classes_name')?>',
                    	data: {classes_names:classes_name},
			cache: false,
			success: function(r)
			{
                            // $("#success").val(r);
                            $("#s").html(r);
			} 
		});
	})
});
</script>