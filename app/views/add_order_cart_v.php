<div class="form-group">
    <label class="col-md-3 control-label">Type<small style="color:red">*</small> :</label>
    <div class="col-md-9">                                                               
        <select class="form-control select" name="gender_id" id="gender"  data-live-search="true" required>
            <?php foreach ($gender_type as $row): ?>
                <option value="<?= $row->gender_id ?>"><?= $row->gender ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function()
{	
    
 
  
  	function getAll1(){
            
		var e = document.getElementById("gender");
                var gender_id = e.options[e.selectedIndex].value;
                var types_id = <?php echo $types_id ?>;
                var order_id = <?php echo $order_id ?>;
   
                $.ajax
		({      type: "POST",  
			url: '<?=site_url('order/get_products1')?>',
			data:{gender_ids:gender_id,types_ids:types_id,order_ids:order_id},
			cache: false,
			success: function(r)
			{
                            //$("#success").val(r);
		            $("#s1").html(r);
			}
		});			
	 } 
	getAll1();


	$("#gender").change(function()
	{  
		var gender_id = $(this).find(":selected").val();
                var types_id = <?php echo $types_id ?>;
                var order_id = <?php echo $order_id ?>;
                
                $.ajax
		({      type: "POST",
			url: '<?=site_url('order/get_products1')?>',
                    	data:{gender_ids:gender_id,types_ids:types_id,order_ids:order_id},
			cache: false,
			success: function(r)
			{
                           // $("#success").val(r);
                            $("#s1").html(r);
			} 
		});
	})
});
</script>