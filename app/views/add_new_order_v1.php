<div class="page-content-wrap"> 
    
     <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('order/new_order') ?>" method="post">
    <div class="row">
        <div class="col-md-6">                        

                <div class="block">
                    <h4>ADD ORDER</h4>

                        <div class="panel-body">

                        <div class="form-group">  
                        <div class="col-md-8"> 
            <label>Customer<small style="color:red">*</small> :</label>
            <select class="form-control select" name="customer_id" id="customer_id" data-live-search="true" required>
    <?php foreach ($customer as $row): ?>
            <option value="<?= $row->customer_id ?>"><?= $row->first_name.' '.'('.$row->phone_number.')' ?>
            </option>
    <?php endforeach; ?>
            </select>
                        </div>
                        </div>
      
                           
                            
                    <div id="s"></div>
                    
                    <br>
                    
                    
                      <div class="form-group">  
                        <div class="col-md-8"> 
            <label>Pickup Method<small style="color:red">*</small> :</label>
                    <select class="form-control select" name="pickup_id" data-live-search="true" required>
    <?php foreach ($pickup as $row): ?>
            <option value="<?= $row->pickup_id ?>"><?= $row->pickup_name?></option>
    <?php endforeach; ?>
                    </select>
            
                        </div>
                     </div>
                    
                    
                    
                      <div class="form-group">  
                    <div class="col-md-8"> 
            <label>Store<small style="color:red">*</small> :</label>
                    <select class="form-control select" name="store_id" data-live-search="true" required>
    <?php foreach ($store as $row): ?>
            <option value="<?= $row->store_id ?>"><?=$row->store_name?></option>
    <?php endforeach; ?>
                    </select>
                    </div>
                   </div>
                    
                    
                    
                <div class="form-group">  
                    <div class="col-md-8"> 
                   <label>Order Date<small style="color:red">*</small> :</label>
                    <input type="text" class="form-control datepicker" name="order_date"  required/>
                    </div>
                </div>
                         
                         
                <div class="form-group">  
                    <div class="col-md-8"> 
                   <label>Delivery Date<small style="color:red">*</small> :</label>
                    <input type="text" class="form-control datepicker" name="delivery_date"  required/>
                    </div>
                </div>
                         
                         
                 <div class="form-group">  
                    <div class="col-md-8"> 
                   <label>Pickup Bag<small style="color:red">*</small> :</label>
                    <input type="text" class="form-control" name="pickup_bag"  required/>
                    </div>
                </div>
                    
                    
                         
                                 


                                                                                                                                                     
                        </div>                                               

                 
                </div>
   

        </div>
        
        
                <div class="col-md-6">                        

                <div class="block">
            


                        <div class="panel-body">

                          
      
                            
                           
                         
                              
                        
                            
                            <div class="input_fields_wrap">
                                
                                
                            <div class="form-group">
                               
                                <div class="col-md-8">
                               <label>Choose Item :</label>
            <select class="form-control" name="product_type_id" id="types_id"  data-live-search="true" required>
    <?php foreach ($product_types as $row): ?>
           <option value="<?= $row->product_type_id ?>"><?= $row->types_name."-->".$row->gender."-->".$row->product_name ?></option>
    <?php endforeach; ?>
            </select>   
                                </div>         
                            
                            </div>
                                
                                
                                
                                
                            <div class="form-group"> 
                                <div class="col-md-8">
                                    <label>Quantity :</label>
                             <input type="text"  maxlength="50"  class="form-control" name="qty"  required/>
                                </div>
                            </div>
                                
                                
                   <div class="form-group">   
                    <div class="col-md-8"> 
                      <label>Select Addons :</label>
                   <select multiple class="form-control" name="addons_id[]" id="types_id"  data-live-search="true">
    <?php foreach ($addons as $row): ?>
                     <option value="<?= $row->addons_id ?>"><?= $row->addons_name ?></option>
                         <?php endforeach; ?>
                      </select>
                      <a href="#" class="add_field_button"><i class="fa fa-plus pull-right"></i></a>
                    </div>
                       
                   </div>    
                                
                                 
                                
                  </div>
                            
                            
                           
                            
                        <div class="btn-group pull-right">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                            </div>                                                                                                                           
                  </div>                                               

                </div>
   

        </div>
        
        
        
    </div> 
</form>
    
    
    
</div>


<script type="text/javascript">
    $(document).ready(function ()
    {
        
        function getAll() {

            var e = document.getElementById("customer_id");
            var customer_id = e.options[e.selectedIndex].value;


            $.ajax
                    ({type: "POST",
                        url: '<?= site_url('order/get_customer') ?>',
                        data: {customer_ids: customer_id},
                        cache: false,
                        success: function (r)
                        {
                            //$("#success").val(r);
                            $("#s").html(r);
                        }
                    });
        }
        getAll();

        $("#customer_id").change(function ()
        {
            var customer_id = $(this).find(":selected").val();
           

            $.ajax
                    ({type: "POST",
                        url: '<?= site_url('order/get_customer') ?>',
                        data: {customer_ids: customer_id},
                        cache: false,
                        success: function (r)
                        {
                            // $("#success").val(r);
                            $("#s").html(r);
                        }
                    });
        })
    });
</script>



<script type="text/javascript">
    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="input_fields_wrap"><div class="form-group"><div class="col-md-8"><label>Choose Item :</label><select class="form-control" name="product_type_id" id="types_id"  data-live-search="true" required><?php foreach ($product_types as $row): ?><option value="<?= $row->product_type_id ?>"><?= $row->types_name."-->".$row->gender."-->".$row->product_name ?></option><?php endforeach; ?></select></div></div><div class="form-group"><div class="col-md-8"><label>Quantity :</label><input type="text"  maxlength="50"  class="form-control" name="qty"  required/></div></div><div class="form-group"><div class="col-md-8"><label>Select Addons :</label><select multiple class="form-control" name="addons_id[]" id="types_id"  data-live-search="true"><?php foreach ($addons as $row): ?><option value="<?= $row->addons_id ?>"><?= $row->addons_name ?></option><?php endforeach; ?></select></div></div><a href="#" class="remove_field"><i class="fa fa-minus"></i></a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>