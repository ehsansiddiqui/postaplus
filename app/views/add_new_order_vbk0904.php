<?php
function fill_unit_select_box($product_types)
{
    
 $output = '';
 foreach($product_types as $row)
 {
     
    $output .='<option value="'.$row->product_type_id.'">'.$row->types_name.'-->'.$row->gender.'-->'.$row->product_name.'</option>'; 
  //$output .= '<option value="'.$row->types_id.'">'.$row->types_name.'</option>';
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
        
        <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('order/new_order') ?>" method="post">
                    
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">ADD ORDER </h3>&nbsp;
                    
                <div class="btn-group pull-right">
                 <button type="submit" name="submit" class="btn btn-primary  bk" ><i class="fa fa-edit"></i>Save</button>
                </div>
                    
                </div>
                  
                <div class="panel-body">
                    
                    
                    <div class="col-md-6">
                        
                    <table id="customers2" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                            <td><strong>Order NO</strong></td>
                            <td><input type="text"  maxlength="50"  class="form-control" name="order_number" id="order_number" value="<?=$order_number?>" readonly style="color:#000"/></td>
                            </tr> 

                            <tr>
                                <td><strong>Customer Name</strong></td>
                                <td>
                           
          <select class="form-control select" name="customer_id" id="customer_id" data-live-search="true" required>
    <?php foreach ($customer as $row): ?>
            <option value="<?= $row->customer_id ?>"><?= $row->first_name.' '.'('.$row->phone_number.')' ?>
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



                            <tr>
                                <td><strong>Address:</strong></td>
    <td><textarea class="form-control" rows="5" name="address" readonly style="color: black;" id="address"></textarea></td>
                            </tr>

                        
                            
                            
                            <tr>
                                <td><strong>Driver Name</strong></td>
                                <td>
    
    
                                    
        <select class="form-control select" name="driver_id" id="driver_id" data-live-search="true" required>
    <?php foreach ($driver as $row): ?>
            <option value="<?=$row->driver_id ?>"><?= $row->first_name.' '.'('.$row->phone_number.')' ?>
            </option>
    <?php endforeach; ?>
        </select>                     
                               </td>
                            </tr>

                            <tr>
                            <td><strong>Order Date</strong></td>  
                            <td><input type="text" class="form-control datepicker" name="order_date"   required autocomplete="off"/></td>                                      
                            </tr>


                             <tr>
                            <td><strong>Pickup Date</strong></td>  
                            <td><input type="text" class="form-control datepicker" name="pickup_date" required autocomplete="off"/></td>                                      
                            </tr>
                            
                            <tr>     
                            <td><strong>Scheduled Date</strong></td>              
                            <td><input type="text" class="form-control datepicker" name="scheduled_date" required autocomplete="off"/></td>   
                            </tr>

                            
                           
                            <tr>
                            <td><strong>Pickup Address</strong></td>
                             <td>
                            <div class="location">                         
                                             
                                     <div class="form-group">
                                  
                                        <div class="col-md-12">
    <input class="form-control geocomplete" type="text" name="pickup_address" placeholder="Type in an address" value="" />
                                         <span class="help-block"></span>
                                        </div>
                                    </div>             
                                             
                                    <fieldset class="details">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Latitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lat" value="" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng"  value="" required/>
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
                                <th></th>
                                <th></th> 
                            </tr>
                        </thead>
                        <tbody> 
                          

                            <tr>
                                <td><strong>Pickup Method</strong></td>
                            <td>
                                
                                <input type="radio" name="pickup_method" value="1" checked/> Free &nbsp;
                                <input type="radio" name="pickup_method" value="2"/> Express &nbsp;
                                <input type="radio" name="pickup_method" value="3"/>Store
                               
                            
                            </td>
                            </tr>

                            <tr>
                                <td><strong>Payment Method</strong></td>
                                <td>
                                    <input type="radio" name="payment_method" value="CASH" checked/> CASH
                                </td>
                            </tr>


                            <tr>
                                <td><strong>Notes</strong></td>
                                <td>
        <textarea class="form-control" rows="5" name="notes"></textarea>                
                                </td>
                            </tr>

<!--                            <tr>
                                <td><strong>Pick Up Bag</strong></td>
                                <td>
                <input type="text"  maxlength="100"  class="form-control" name="pickup_bag_no" id="pickup_bag_no"/>
                                </td>
                            </tr>-->
                            
                            
<!--                            <tr>
                                <td><strong>Delivery Bag</strong></td>
                                <td>
                <input type="text"  maxlength="100"  class="form-control" name="delivery_bag_no" id="delivery_bag_no"/>          
                                </td>
                            </tr>-->
                            
                            

                          
                            <tr>
                                <td><strong>Order Status</strong></td>
                                <td>    
        <select class="form-control select" name="order_status_id" data-live-search="true" required>
           <?php foreach ($status as $row): ?>
            <option value="<?= $row->order_status_id ?>"><?= $row->order_status ?></option>
           <?php endforeach; ?>
        </select>                    
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
         
     <tfoot>
      <th></th>
      <th></th>
      <th></th>   
     <th style="text-align:right">Total:</th>
     <th>
         <span id="sum"></span>
         <input type="hidden" class="form-control" name="grand_total" id="grand_total"/>
     </th>
     </tfoot>    
      
        
    </tbody>      
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
            $('#grand_total').val(sum.toFixed(2));
             
  
 });
 
 
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
                            
                         var json = $.parseJSON(r); 
                            $("#phone_number").val(json.phone_number);   
                            $("#address").val(json.customer_address);
                            $("#customer_types").val(json.customer_types);
                            
                          //$("#s").html(r);
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
                            
                         var json = $.parseJSON(r);
                         $("#phone_number").val(json.phone_number);
                         $("#address").val(json.customer_address);
                         $("#customer_types").val(json.customer_types); 
                         
                        }
                    });
        })
 

});


function sum(i){
           
            var txtFirstNumberValue = document.getElementById('txt1'+i+'').value;
            var txtSecondNumberValue = document.getElementById('txt2'+i+'').value;
            var addontotal = document.getElementById('addontot'+i+'').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+parseInt(addontotal);
            if (!isNaN(result)) {
                document.getElementById('txt3'+i+'').value = result.toFixed(2);
             var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2));
            $('#grand_total').val(sum.toFixed(2));
            
                
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
                        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+ parseInt(addontotal);
                        document.getElementById('txt3'+i+'').value = result.toFixed(2);
                        
                          var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2));
            $('#grand_total').val(sum.toFixed(2));
                         
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
     var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+ parseInt(sum);;
     document.getElementById('txt3'+i+'').value = result.toFixed(2);
     
     
   
      }
      
          var sum = 0;
            $(".total").each(function(){
            sum += parseInt($(this).val());
            });
            $('#sum').text(sum.toFixed(2));
            $('#grand_total').val(sum.toFixed(2));
      
          
    });
 
                   
                   
 }

</script>