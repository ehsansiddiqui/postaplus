                          <div class="form-group">
                                        <label class="col-md-3 control-label">Brand:</label>
                                        <div class="col-md-9">                                                                                
         <select class="form-control select" name="brand_id" data-live-search="true" id="getvariant">
                                                <?php foreach ($brand as $row): ?>
                                                <option value="<?=$row->brand_id?>" <?php if($row->brand_id == @$result->brand_id){echo 'selected';} ?>><?=ucfirst($row->brand_name)?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>





<script type="text/javascript">
$(document).ready(function()
{	
	function getAll(){
                
		var e = document.getElementById("getvariant");
                var id = e.options[e.selectedIndex].value;

                $.ajax
		({      type: "POST",  
			url: '<?=site_url('variant/dropdown_fetch')?>',
			data:{ids:id},
			cache: false,
			success: function(r)
			{
				$("#success").html(r);
			}
		});			
	}
        
	getAll();
	
	$("#getvariant").change(function()
	{  
		var id = $(this).find(":selected").val();
                $.ajax
		({      type: "POST",
			url: '<?=site_url('variant/dropdown_fetch')?>',
                    	data: {ids:id},
			cache: false,
			success: function(r)
			{
				$("#success").html(r);
			} 
		});
	})
});
</script>