             <div class="form-group">
            <label class="col-md-3 control-label">Model Name:</label>
             <div class="col-md-9">                                                      
        <select class="form-control select" name="vehicle_id" data-live-search="true" id="variant">
              <?php foreach ($models as $row): ?>
              <option value="<?=$row->vehicle_id?>" ><?=ucfirst($row->short_title)?></option>
             <?php endforeach; ?>
            </select>
            </div>
            </div>




<script type="text/javascript">
$(document).ready(function()
{	
	function getAll(){
                
		var e = document.getElementById("variant");
                var id = e.options[e.selectedIndex].value;

                $.ajax
		({      type: "POST",  
			url: '<?=site_url('specifications/dropdown_fetch_variant')?>',
			data:{ids:id},
			cache: false,
			success: function(r)
			{
				$("#success2").html(r);
			}
		});			
	}
        
	getAll();
	
	$("#variant").change(function()
	{  
		var id = $(this).find(":selected").val();
                $.ajax
		({      type: "POST",
			url: '<?=site_url('specifications/dropdown_fetch_variant')?>',
                    	data: {ids:id},
			cache: false,
			success: function(r)
			{
				$("#success2").html(r);
			} 
		});
	})
});
</script>
                                    
                                    
