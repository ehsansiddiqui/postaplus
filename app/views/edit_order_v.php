<?php
function fill_unit_select_box($product_types)
{
    
 $output = '';
 foreach($product_types as $row)
 {
     
 $output .='<option value="'.$row->product_type_id.'">'.$row->types_name.'-->'.$row->gender.'-->'.$row->product_name.'['.$row->price_package_name.']'.'</option>'; 
 }
 return $output;
}

function fill_unit_select_box1($addons)
{
 $output = '';
 foreach($addons as $row)
 {
    $output .='<option data-price="'.$row->addons_price.'" value="'.$row->addons_id.'">'.$row->addons_name.'</option>'; 
 }
 return $output;
}
?>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
        <!-- START DATATABLE EXPORT -->
        
        <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('order/update_order/' . @$order_id) ?>" method="post">
                    
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">EDIT ORDER DETAILS</h3>&nbsp;
                    
                <div class="btn-group pull-right">
                 <button type="submit" name="submit" class="btn btn-primary  bk" ><i class="fa fa-edit"></i>Save</button>
                </div>
                    
                </div>
                  
                <div class="panel-body">
                    
                    
                    <div class="col-md-6">
                        
                    <table id="customers2" class="table">
                        <thead>
<!--                            <tr>
                                <th></th>
                                <th></th>
                            </tr>-->
                        </thead>
                        <tbody> 
                            <tr>
                                <td style="border-top: 0px"><strong>Order NO</strong></td>
                                <td style="border-top: 0px"><?= $result->order_no ?></td>
                            </tr> 

                            <tr>
                                <td><strong>Customer Name</strong></td>
                                <td>
                           
          <select class="form-control select" name="customer_id" id="customer_id" data-live-search="true" required>
    <?php foreach ($customer as $row): ?>
              <option value="<?= $row->customer_id ?>" <?php if($result->customer_id == $row->customer_id ){ echo 'selected'; } ?>><?= ucfirst($row->first_name).' '.'('.$row->phone_number.')' ?>
            </option>
    <?php endforeach; ?>
         </select>
                               </td>
                               
                            </tr>
                            
                           
                            
                            <tr>
                              
                            <td><strong>Customer Type :</strong></td>
 <td><input type="text"  maxlength="50"  class="form-control" name="customer_types" id="customer_types"  readonly style="color: black;"/></td>
                        
                           </tr>
                            
                            <tr>
                              
                               <td><strong>Customer Phone :</strong></td>
 <td><input type="text"  maxlength="50"  class="form-control" name="phone_number" id="phone_number"  readonly style="color: black;"/></td>
                        
                           </tr>



<!--                         <tr>
                                <td><strong>Address:</strong></td>
    <td><textarea class="form-control" rows="5" name="address" readonly style="color: black;" id="address"></textarea></td>
                           </tr>-->

                        
<!--                        <tr>
                            <td><strong>Address:</strong></td>
    <td>
        <select class="form-control select" name="cus_addr_id" id="classes_name" data-live-search="true" required>   
        </select>
    </td>
                            </tr>-->
                            
                            
                            <tr>
                                <td><strong>Driver Name</strong></td>
                                <td>
    
    
                                    
        <select class="form-control select" name="driver_id" id="driver_id" data-live-search="true" required>
    <?php foreach ($driver as $row): ?>
            <option value="<?=$row->driver_id ?>" <?php if($result->driver_id == $row->driver_id ){ echo 'selected'; } ?>><?= ucfirst($row->first_name).' '.'('.$row->phone_number.')' ?>
            </option>
    <?php endforeach; ?>
        </select>                     
                               </td>
                            </tr>

                            <tr>
                            <td><strong>Order Date</strong></td>  
                            <td><input type="text" class="form-control" name="order_date" value="<?= date('Y-m-d h:i a', strtotime($result->order_date)); ?>" readonly style="color:#000;"  /></td>                                      
                            </tr>


                            <tr>
                        <td><strong>Pickup Date</strong></td>  
                       <td>
                         
                        <div class="col-md-6" >  
                        <input type="text" class="form-control datepicker" name="pickup_date" value="<?= date('Y-m-d', strtotime($result->pickup_date)); ?>"  required/>
                        </div>
                        
                        <div class="col-md-6" >
                 <input type="text" name="pickup_time"  value="<?=date('h:i:a', strtotime($result->pickup_date)); ?>"  class="form-control timepicker"/>
                        </div>
        <input type="hidden" name="current_pickup_date" value="<?=date('Y-m-d',strtotime($result->pickup_date));?>" />
                       </td>
                       
                       
                       
                        </tr>
                            
                            <tr>     
                            <td><strong>Scheduled Date</strong></td>
                                
            <td><input type="text" class="form-control datepicker" name="scheduled_date" value="<?= date('Y-m-d', strtotime($result->scheduled_date)); ?>"  required/>
       <input type="hidden" name="current_scheduled_date" value="<?=date('Y-m-d', strtotime($result->scheduled_date));?>" />
            </td>                           
                                
                            </tr>
                            
                            
                            
                        <tr>
                        <td><strong>Pickup Address:</strong></td>
                        <td>
        <select class="form-control select" name="cus_addr_id" id="classes_name" data-live-search="true" required>   
        </select>
                        </td>
                        </tr>
                            
                            
                            <tr>
                            <td><strong>Pickup Location</strong></td>
                             <td>
                            <div class="location">                         
                                             
                                     <div class="form-group">
                                  
                                        <div class="col-md-12">
    <input class="form-control geocomplete" type="text" name="pickup_address" value="<?=$result->pickup_address?>" />
                                         <span class="help-block"></span>
                                        </div>
                                    </div>             
                                             
                                    <fieldset class="details">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Latitude:</label>  
                                        <div class="col-md-9">
                            <input type="text" class="form-control" name="lat" value="<?=$result->latitude?>" />
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude:</label>  
                                        <div class="col-md-9">
                            <input type="text" class="form-control" name="lng" value="<?=$result->longitude?>" />
                                         <span class="help-block"></span>
                                      </div>
                                    </div>
                                    </fieldset>
                          
                      </div>
    
    
                             </td>
                            </tr>
                            
                            

                           


                            

                          



                        </tbody>
                    </table>
                        
                    </div>
                    
                    
                    <div class="col-md-6">
                        
                    <table id="customers2" class="table">
                        <thead>
                            <tr>
<!--                                <th></th>
                                <th></th> -->
                            </tr>
                        </thead>
                        <tbody> 
                          
                            
                            
                        <tr>
                            <td style="border-top: 0px"><strong>Delivery Address</strong></td>
                             <td style="border-top: 0px">
                                 <textarea class="form-control" rows="5" name="customer_address" readonly style="color: black;" id="customer_address"><?=  ucfirst($result->customer_address);?></textarea>
                                 
                                 
                <input type="hidden" name="delivery_address_id" value="<?=$result->delivery_address_id?>" />     
                             </td>
                        </tr>   
                            

                            <tr>
                                <td><strong>Subcribe</strong></td>
                                <td><?= $result->subcribe_status; ?></td>
                            </tr>
                            
                            
                            <tr>
                                <td ><strong>Pickup Method</strong></td>
                                <td><?= $result->pickup_name; ?></td>
                            </tr>
                            
 

                            <tr>
                                <td><strong>Payment Method</strong></td>
                                <td><?= $result->payment_method; ?></td>
                            </tr>


                            <tr>
                                <td><strong>Notes</strong></td>
                                <td>
        <textarea class="form-control" rows="5" name="notes"><?=$result->notes;?></textarea>                
                                </td>
                            </tr>

                            <tr>
                                <td><strong>Pick Up Bag</strong></td>
                                <td>
                        <input type="text"  maxlength="100"  class="form-control" name="pickup_bag_no" id="pickup_bag_no" value="<?=@$bag->pickup_bag_no;?>"/>        
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td><strong>Delivery Bag</strong></td>
                                <td>
                       <input type="text"  maxlength="100"  class="form-control" name="delivery_bag_no" id="delivery_bag_no" value="<?=@$bag->delivery_bag_no;?>"/>          
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td><strong>Total Amount</strong></td>
                                <td><?= $result->total_amount; ?></td>
                            </tr>

                          
                            <tr>
                                <td><strong>Order Status</strong></td>
                                <td>
                                    
         <select class="form-control select" name="order_status_id" data-live-search="true" required>
                                        <?php foreach ($status as $row): ?>
            <option value="<?= $row->order_status_id ?>" 
     <?php if ($row->order_status == $result->order_status) {
                                                echo 'selected';
                                            }
                                        ?>><?= $row->order_status ?>
            </option>
    <?php endforeach; ?>
        </select>  
                                    
                           <input type="hidden" name="current_status" value="<?=$result->order_status_id?>"/>                    
                               </td>
                            </tr>
                            
                           

                        </tbody>
                    </table>
                        
                    </div>
                    
                    

                   
                    
                   <div class="col-md-12">
                    
                       
                    <br><br><br> 
                    <h3 class="panel-title">CART DETAILS</h3>&nbsp;
                    <br><br>
                    
                     

    <table class="table" id="item_table">
        
      <thead>
        
      <tr>
       <th>Laundry Item</th>
       <th>Quantity</th>
       <th>Price</th>
       <th>Addons</th>
       <th>Total</th>
    <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
      
     </thead>
          
         <tbody>
      
        <?php $i=0; foreach ($order_details as $details){ ?>    
        <tr>
            
        <td>     
            <select name="item_name[]" class="form-control  item_name" id="it<?=$i?>">    
            <?php 
             foreach($product_types as $row)
             {
            ?>    
     <option data-price="<?=$row->product_price?>" value="<?=$row->product_type_id?>" <?php if($row->product_type_id == $details->product_type_id){ echo 'selected' ;} ?>><?=$row->types_name.'-->'.$row->gender.'-->'.$row->product_name.'['.$row->price_package_name.']'?></option> 
            <?php 
             }
            ?>
        </select>
        </td>
        
    <td>
   <input type="text" name="item_quantity[]"  value="<?=$details->quantity?>" id="q<?=$i?>" onkeyup="sum1(<?=$i?>);" class="form-control item_quantity" />
    </td>
   
        
        
    <td>
  <input type="text" name="item_price[]"  value="<?=$details->product_price?>" id="p<?=$i?>" onkeyup="sum1(<?=$i?>);" class="form-control item_price" /></td>
    <td>     
       
        
                                    <?php
                                    
                                    $r = array();
                                    $addon_total = 0;
                                    if($details->addons_id != NULL){
                                        
                                        $addons_i = $details->addons_id;
                                        $addons_id = explode("+", $details->addons_id); 
                                        $sumaddon = implode(",", $addons_id);
                                    $sql = "SELECT sum(addons_price) as addontot FROM addons WHERE addons_id IN($sumaddon)";
                                    $sum = $this->db->query($sql)->row();
                                    $addon_total = $sum->addontot;
                                        
                                        foreach ($addons_id as $t){
                                            $r[] = $t;
                                        }
                                    }else{
                                       $addons_i = NULL; 
                                    }   
                                    ?>  
        
        <select name="item_addon[]" class="form-control" id="wow<?=$i?>"  multiple>    
            <?php 
            
             foreach($addons as $row1)
             {
            ?>    
 <option  data-price="<?=$row1->addons_price?>" value="<?=$row1->addons_id?>" <?php if(in_array($row1->addons_id,@$r)){ echo 'selected' ; } ?> ><?=$row1->addons_name?></option> 
            <?php 
             }
            ?>
        </select>
        
        
        
     <input type="hidden" name="addontotal[]" id="addontotal<?=$i?>"  value="<?=$addon_total?>"/>
     <input type="hidden" name="addons[]" id="addons<?=$i?>"  value="<?=$addons_i?>"/>
    </td>
    
    <td><input type="text" name="total[]" value="<?=$details->total?>" class="form-control total" id="tot<?=$i?>" /></td>    
    
    
    <td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button>
    </td>
    
    </tr>
    
    <?php $i++; }?>
        
        
    </tbody>
    
     <tfoot>
      <th></th>
      <th></th>
      <th></th>   
     <th style="text-align:right">Total:</th>
     <th>
         <span id="sum"></span>
     </th>
     </tfoot>
    
    
    </table>
                    
                    
                          
                  
                        </div>
                    
                    

                </div>
                
           
                
                
            </div>
            
           </form>

        </div>
    </div>

</div>
      

<script>
$(document).ready(function(){    
 var i = 0;   
 $(document).on('click', '.add', function(){   
  i++;  
  var html = '';
  html += '<tr>';
  html += '<td><select name="item_name[]" class="form-control select item_name" id="item_name'+i+'" onchange="getPrice('+i+')"><option value="">Select Type</option><?php echo fill_unit_select_box($product_types); ?></select></td>';
  html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" value="0" id="txt1'+i+'" onkeyup="sum('+i+');" /></td>';
  html += '<td><input type="text" name="item_price[]" class="form-control item_price" value="0" id="txt2'+i+'"  onkeyup="sum('+i+');" /></td>';
  html += '<td><select name="item_addon[]" class="form-control" id="addon'+i+'" onchange="getaddonPrice('+i+')" multiple><?php echo fill_unit_select_box1($addons); ?></select><input type="hidden" name="addontotal[]" id="addontot'+i+'"  value="0"/><input type="hidden" name="addons[]" id="addontotl'+i+'"  value=""/></td>';
  html += '<td><input type="text" name="total[]" class="form-control total" id="txt3'+i+'"/></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>'; 
  $('#item_table').append(html);
 
 });
 

 
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
  
  
            var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2));
  
 });
 
 

});


function sum(i){
           
            var txtFirstNumberValue = document.getElementById('txt1'+i+'').value;
            var txtSecondNumberValue = document.getElementById('txt2'+i+'').value;
            var addontotal = document.getElementById('addontot'+i+'').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+parseInt(addontotal)*parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3'+i+'').value = result.toFixed(2);
                
            var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2));
            }
        }
        
        
  function getPrice(i){
           
            var product_type_id = document.getElementById('item_name'+i+'').value; 
             $.ajax
                    ({  type: "POST",
                        url: '<?= site_url('order/get_price') ?>',
                        data: {product_type_ids: product_type_id},
                        cache: false,
                        success: function (r)
                        {
                            
                        var json = $.parseJSON(r);          
                        $('#txt2'+i+'').val(json.product_price); 
                        var txtFirstNumberValue = document.getElementById('txt1'+i+'').value;
                        var txtSecondNumberValue = document.getElementById('txt2'+i+'').value;
                        var addontotal =  document.getElementById('addontot'+i+'').value;
                        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+ parseInt(addontotal) * parseInt(txtFirstNumberValue);
                        document.getElementById('txt3'+i+'').value = result.toFixed(2);
                        
                         var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2));
                        
                         
                        }
                    });
          
        }
        
 
 function getaddonPrice(i){
   
          $('#addon'+i+'').click(function(){
              
                var g = new Array();
                var sum = 0,
                price;
            $(this).find('option:selected').each(function(){
        // Check that the attribute exist, so that any unset values won't bother
            if ($(this).attr('data-price')){            
            price = $(this).data('price');
            sum += price;
            g.push($(this).val());
            
            }
           });
          
          
           document.getElementById('addontot'+i+'').value = sum;
           document.getElementById('addontotl'+i+'').value = g;
           
            if (sum == 0){
            var txtFirstNumberValue = document.getElementById('txt1'+i+'').value;
            var txtSecondNumberValue = document.getElementById('txt2'+i+'').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(result)){
                document.getElementById('txt3'+i+'').value = result.toFixed(2);
             }
        
    }else{
    
     var txtFirstNumberValue = document.getElementById('txt1'+i+'').value;
     var txtSecondNumberValue = document.getElementById('txt2'+i+'').value;
     var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+ parseInt(sum)*parseInt(txtFirstNumberValue);
     document.getElementById('txt3'+i+'').value = result.toFixed(2);
     
     
             var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2));
     
   
      }
          
    });
 
                   
                   
 }
 
 
     function sum1(i){
     
            var txtFirstNumberValue = document.getElementById('q'+i+'').value;
            var txtSecondNumberValue = document.getElementById('p'+i+'').value;
            var addontotal = document.getElementById('addontotal'+i+'').value
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+parseInt(addontotal)*parseInt(txtFirstNumberValue);
            if (!isNaN(result)){
                document.getElementById('tot'+i+'').value = result.toFixed(2);
                
            var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2));
                
                
            }
            
        }
 
 <?php $i=0; foreach ($order_details as $details){ ?>   
  $('#wow<?=$i?>').change(function(){
    // Remove any previously set values
   var g = new Array();
    var sum = 0,
        price;
    $(this).find('option:selected').each(function() {
        // Check that the attribute exist, so that any unset values won't bother
        if ($(this).attr('data-price')) {            
            price = $(this).data('price');
            sum += price;
            g.push($(this).val());
        }
    });
    
  
     document.getElementById('addontotal<?=$i?>').value = sum;
     document.getElementById('addons<?=$i?>').value = g;
    
    if (sum == 0){
        
            var txtFirstNumberValue = document.getElementById('q<?=$i?>').value;
            var txtSecondNumberValue = document.getElementById('p<?=$i?>').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
             document.getElementById('tot<?=$i?>').value = result.toFixed(2);
        }
        
    }else{
    
     var txtFirstNumberValue = document.getElementById('q<?=$i?>').value;
     var txtSecondNumberValue = document.getElementById('p<?=$i?>').value;
     var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+ parseInt(sum)*parseInt(txtFirstNumberValue);
    
   //var total = document.getElementById('tot').value;
   //var res =  parseInt(total) + parseInt(sum);
   document.getElementById('tot<?=$i?>').value = result.toFixed(2);
   
   }
   
   
   var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2));
   
   
});



    $('#it<?=$i?>').change(function(){   
    var price = $(this).find('option:selected').data("price");
    document.getElementById('p<?=$i?>').value = price;
    var q = document.getElementById('q<?=$i?>').value;
    var p = document.getElementById('p<?=$i?>').value;
    var addontotal =  document.getElementById('addontotal<?=$i?>').value;
    var result = parseInt(q) * parseInt(p)+ parseInt(addontotal)*parseInt(q);
    document.getElementById('tot<?=$i?>').value = result.toFixed(2);
    
    
            var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2));
    
    });

<?php $i++; } ?>


function grand_total(){
            var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2)); 
}
grand_total();

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
                            
                if(JSON.parse(r).status == 100){
                 
                 $.each(JSON.parse(r).res, function(index,value){    
                   $("#phone_number").val(value.phone_number);
                   $("#customer_types").val(value.customer_types);
                 });

                 
                $class ='';
                $class_list = '';
                $name3 = '';
                
                    $.each(JSON.parse(r).addr, function(index, value){
                        $class +='<option value="'+value.cus_addr_id+'" selected >'+value.customer_address+'</option>';
                        $class_list +='<li rel="'+index+'" class=""><a tabindex="0" class="" style=""><span class="text">'+value.customer_address+'</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>';
                       $name3 = value.customer_address;
                    });
                    
   

                }
                            
                $elm1 = $("#classes_name");
		$elm1.html($class); 
                $elm1.siblings().find('.dropdown-toggle').remove('.filter-option');
                $elm1.siblings().find('.dropdown-toggle').html('<span class="filter-option pull-left">'+$name3+'</span><span class="caret"></span>');
                
              
                $elm1.siblings().children().siblings().find('.dropdown-menu').html($class_list);           
                            
                        }
                    });
        }
        getAll();

        $("#customer_id").change(function ()
        {
            getAll();
        })

</script>