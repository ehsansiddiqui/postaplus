<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form class="form-horizontal" method="post" action="<?php echo site_url('tournament/add_tournament') ?>"   enctype="multipart/form-data">
                    <fieldset>
                        <legend>Add Tournament</legend>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Tournament Venue</label>
                            <div class="controls">
                                <input type="text" class="span6" id="typeahead"  name="tournament_venue" data-provide="typeahead" data-items="4" required="">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Tournament Date</label>
                            <div class="controls">
                                <input type="text"  name="tournament_date" class="input-xlarge datepicker" id="date01" required="">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Tournament time</label>
                            <div class="controls">
                                <input type="text" class="span6" id="typeahead"  name="tournament_time" data-provide="typeahead" data-items="4"  placeholder="H:i:s" required="">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Award Prize</label>
                            <div class="controls">
                                <input type="text" class="span6" name="award_prize"  id="typeahead"  data-provide="typeahead" data-items="4"  required="" >     
                            </div>
                        </div>
                       
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Category Type</label>
                            <div class="controls">
                            <?php
                            $i = 0 ;      
                            foreach ($category_type as $p){ ?>
                                <input type="radio" name="category_type"  class="checker" id="category_type<?=$i?>" onclick="update_order('<?=$p->category_type_id?>','<?=$i?>')" value="<?=$p->category_type_id ?>" >&nbsp;<?=$p->category_type?>&nbsp;&nbsp;
                           <?php } ?>
                           </div>
                        </div>

                         <div id="success" ></div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Organized By</label>
                            <div class="controls">
                                <input type="text" class="span6" name="organized_by"  id="typeahead"  data-provide="typeahead" data-items="4"  required="" >     
                            </div>
                        </div>
                        
                        <div class="control-group">
                             <label class="control-label" for="typeahead">Registration fee</label>
                            <div class="controls">
                                <input type="text" class="span6" name="registration_fee"  id="typeahead"  data-provide="typeahead" data-items="4"  required="" >     
                            </div>
                        </div>
                        
                         
                         
                         <div class="control-group">
                             <label class="control-label" for="typeahead">Lattitude</label>
                            <div class="controls">
                                <input type="text" class="span6" name="lattitude"  id="typeahead"  data-provide="typeahead" data-items="4"  required="" >     
                            </div>
                        </div>
                         
                         
                        <div class="control-group">
                             <label class="control-label" for="typeahead">Longitude</label>
                            <div class="controls">
                                <input type="text" class="span6" name="longitude"  id="typeahead"  data-provide="typeahead" data-items="4"  required="" >     
                            </div>
                        </div>

                        <!-- <div class="control-group">
                           <label class="control-label" for="typeahead">Place Description</label>
                           <div class="controls">    
                               <textarea type="text" class="span6" name="registration_status"  id="typeahead"  required="" ></textarea>
                           </div>
                         </div> -->
                        
                        <div class="control-group">
                           <label class="control-label" for="fileInput">Tournaament Image</label>
                           <div class="controls">
                               <input class="input-file uniform_on" id="fileInput" type="file" name="userfile">
                           </div>
                        </div> 
                        
                        <div class="form-actions">
                            <input type="submit"  name="submit" class="btn btn-primary" value="Save changes">
                            <button type="reset" class="btn">Reset</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /block -->
</div>



 <script type="text/javascript">
  function update_order(cat_id,id)
  {    
        var order = document.getElementById("category_type"+id).value;
	$.ajax({
		 type: "POST",
		 dataType:'html',
		 url: '<?=base_url()?>admin.php/tournament/category',
		 		 data:{ 'id' : cat_id},
		success: function(data){  
		$('#success').html(data);	
		 }
	});
  }
</script>
        