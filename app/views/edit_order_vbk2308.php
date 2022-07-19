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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">EDIT ORDER DETAILS</h3>&nbsp;
                    
                    <div class="btn-group pull-right">
<!--                        <a href="<?php echo site_url('order/edit_order/'.$result->order_id) ?>"><button class="btn btn-primary  bk" ><i class="fa fa-edit"></i>Edit</button></a>-->
<!--                        <ul class="dropdown-menu">
                            <li> </li>
                        </ul>-->
                    </div>                                    
                </div>
                
            <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('order/order_edit_1/' . @$order_id) ?>" method="post"> 
                          
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
                                <td><strong>1).Order NO</strong></td>
                                <td><?= $result->order_no ?></td>
                            </tr> 

                            <tr>
                                <td><strong>2).Customer Name</strong></td>
                                <td>
                           
          <select class="form-control select" name="customer_id" id="customer_id" data-live-search="true" required>
    <?php foreach ($customer as $row): ?>
            <option value="<?= $row->customer_id ?>" <?php if($result->customer_id == $row->customer_id ){ echo 'selected'; } ?>><?= $row->first_name.' '.'('.$row->phone_number.')' ?>
            </option>
    <?php endforeach; ?>
         </select>
                               </td>
                               
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
                                <td><strong>3).Driver Name</strong></td>
                                <td>
    
    
                                    
        <select class="form-control select" name="driver_id" id="driver_id" data-live-search="true" required>
    <?php foreach ($driver as $row): ?>
            <option value="<?=$row->driver_id ?>" <?php if($result->driver_id == $row->driver_id ){ echo 'selected'; } ?>><?= $row->first_name.' '.'('.$row->phone_number.')' ?>
            </option>
    <?php endforeach; ?>
        </select>                     
                               </td>
                            </tr>

                            <tr>
                            <td><strong>4).Order Date</strong></td>  
                       <td><input type="text" class="form-control datepicker" name="order_date" value="<?= date('Y-m-d', strtotime($result->order_date)); ?>"  required/></td>                                      
                            </tr>


                            <tr>
                                <td><strong>5).Scheduled Date</strong></td>
                                
            <td><input type="text" class="form-control datepicker" name="order_date" value="<?= date('Y-m-d', strtotime($result->scheduled_date)); ?>"  required/></td>                           
                                
                            </tr>

                            <tr>
                                <td><strong>6).Delivery Address</strong></td>
                                <td><?= $result->customer_address; ?></td>
                            </tr>


                            <tr>
                                <td><strong>7).Subcribe</strong></td>
                                <td><?= $result->subcribe_status; ?></td>
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
                                <td><strong>8).Pickup Method</strong></td>
                                <td><?= $result->pickup_name; ?></td>
                            </tr>

                            <tr>
                                <td><strong>9).Payment Method</strong></td>
                                <td><?= $result->payment_method; ?></td>
                            </tr>


                            <tr>
                                <td><strong>10).Notes</strong></td>
                                <td><?= $result->notes; ?></td>
                            </tr>

                            <tr>
                                <td><strong>11).Pick Up Bag</strong></td>
                                <td><?= @$bag->pickup_bag_no; ?></td>
                            </tr>
                            
                            
                            <tr>
                                <td><strong>11).Delivery Bag</strong></td>
                                <td><?= @$bag->delivery_bag_no; ?></td>
                            </tr>
                            
                            
                            <tr>
                                <td><strong>13).Total Amount</strong></td>
                                <td><?= $result->total_amount; ?></td>
                            </tr>

                            <tr>
                                <td><strong>14).Order Status</strong></td>
                                <td>
                                
                                
                                <?php             
                                if($result->order_status == 'New'){ ?>
    <button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#exampleModal"><?=$result->order_status?></button>        
                                <?php }else{ ?>
      <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#exampleModal"><?=$result->order_status?></button> 
                                <?php } ?>
                                
                                
                               </td>
                            </tr>



                        </tbody>
                    </table>
                        
                    </div>
                    
                    

                   
                    
                   <div class="col-md-12">
                    
<!--        <input type="button" value="Add Row" onclick="addRow(&#39;dataTable&#39;)">
	<input type="button" value="Delete Row" onclick="deleteRow(&#39;dataTable&#39;)">-->
                       
                    <br><br><br> 
                    <h3 class="panel-title">CART DETAILS</h3>&nbsp;
<!--            <a href="<?=site_url('order/add/'.$result->order_id)?>"><i class="fa fa-plus icon-bk"></i></a>-->
                    <br><br>
                    
                     

<!--                    <table id="POITable" class="table datatable">
                        
                        <thead>
                            <tr>
                              <td>SiNo</td>
            <td>Laundry Type</td>
            <td>Longitude</td>
            <td>Delete?</td>
            <td>Add Rows?</td>
                            </tr>
                        </thead>
                        <tbody>
                      
        <tr>
            <td>1</td>
            <td><input  type="text" class="form-control" id="latbox" /></td>
            <td><input  type="text" class="form-control" id="lngbox" /></td>
            <td><input type="button" id="delPOIbutton" value="Delete" onclick="deleteRow(this)"/></td>
            <td><input type="button" id="addmorePOIbutton" value="Add More POIs" onclick="insRow()"/></td>
        </tr>    
                                   
                  
                        </tbody>
                        
                    </table>-->
                          
                      
                    
    <span id="error"></span>                
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
     <option data-price="<?=$row->product_price?>" value="<?=$row->product_type_id?>" <?php if($row->product_type_id == $details->product_type_id){ echo 'selected' ;} ?>><?=$row->types_name.'-->'.$row->gender.'-->'.$row->product_name?></option> 
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
                                        $addons_id = explode("+", $details->addons_id); 
                                        $sumaddon = implode(",", $addons_id);
                                    $sql = "SELECT sum(addons_price) as addontot FROM addons WHERE addons_id IN($sumaddon)";
                                    $sum = $this->db->query($sql)->row();
                                    $addon_total = $sum->addontot;
                                        
                                        foreach ($addons_id as $t){
                                            $r[] = $t;
                                        }
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
        
        
        
        <input type="hidden" name="addontotal<?=$i?>" id="addontotal<?=$i?>"  value="<?=$addon_total?>"/>
    
    </td>
    
    <td><input type="text" name="total[]" value="<?=$details->total?>" class="form-control total" id="tot<?=$i?>" /></td>    
    
    
    <td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button>
    </td>
    
    </tr>
    
        <?php $i++; }?>
        
        
         </tbody>
         
    </table>
                    
                    
                          
                  
                        </div>
                    
                    

                </div>
                
              </form>
                
                
            </div>

        </div>
    </div>

</div>         
<!-- END PAGE CONTENT WRAPPER -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      
      
   <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('order/order_edit_1/' . @$order_id) ?>" method="post"> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT ORDER STATUS</h5>
      </div>
<!--      <div class="modal-body">-->
       
          
          
             <div class="block">
           
   
                        <div class="panel-body">
          
          
          
                            <div class="form-group">
                
                                <div class="col-md-12">                                                                         
                               <label>Order Status<small style="color:red">*</small> :</label>     
                                    
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
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group">
                              
                                <div class="col-md-12">
                                      <label>Notes</label>
              <textarea class="form-control" rows="5" name="notes"><?=@$result->notes?></textarea>
                                </div>
                            </div>
                            
          
                        </div>
                  
             </div>
          
          
             
<!--      </div>-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary" value="Save changes" />
      </div>



    </div>
        </form>
      
      
  </div>
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
                            
                         var json = $.parseJSON(r); 
                            $("#phone_number").val(json.phone_number);   
                            $("#address").val(json.customer_address);
                    
                            
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
                         
                        }
                    });
        })
    });
</script>




<script>
$(document).ready(function(){    
 var i = 0;   
 $(document).on('click', '.add', function(){   
  i++;  
  var html = '';
  html += '<tr>';
  html += '<td><select name="item_name[]" class="form-control select item_name" id="item_name'+i+'" onchange="getPrice('+i+')"><?php echo fill_unit_select_box($product_types); ?></select></td>';
  html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" value="0" id="txt1'+i+'" onkeyup="sum('+i+');" /></td>';
  html += '<td><input type="text" name="item_price[]" class="form-control item_price" value="0" id="txt2'+i+'"  onkeyup="sum('+i+');" /></td>';
  html += '<td><select name="item_addon[]" class="form-control" id="addon'+i+'" onchange="getaddonPrice('+i+')" multiple><?php echo fill_unit_select_box1($addons); ?></select><input type="hidden" name="addontot'+i+'" id="addontot'+i+'"  value="0"/></td>';
  html += '<td><input type="text" name="total[]" class="form-control total" id="txt3'+i+'"/></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>'; 
  $('#item_table').append(html);
 
 });
 

 
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
  
 });
 
 

});


function sum(i){
           
            var txtFirstNumberValue = document.getElementById('txt1'+i+'').value;
            var txtSecondNumberValue = document.getElementById('txt2'+i+'').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3'+i+'').value = result.toFixed(2);
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
                         var t = "0";
                         $('#txt1'+i+'').val(t);
                         $('#txt2'+i+'').val(json.product_price); 
                         $('#txt3'+i+'').val(t);
                        }
                    });
          
        }
        
 
 function getaddonPrice(i){
   
            $('#addon'+i+'').click(function(){   
                var sum = 0,
                price;
            $(this).find('option:selected').each(function(){
        // Check that the attribute exist, so that any unset values won't bother
            if ($(this).attr('data-price')){            
            price = $(this).data('price');
            sum += price;
            }
           });
           
           alert(sum);
          
           document.getElementById('addontot'+i+'').value = sum;
          
          
          
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
          
    });
 
//            var addons_id = document.getElementById('addon'+i+'').value; 
//
//
//            if(addons_id != '0' ){
//                
//             $.ajax
//                    ({  type: "POST",
//                        url: '<?= site_url('order/get_add_price') ?>',
//                        data: {addons_ids: addons_id},
//                        cache: false,
//                        success: function (r)
//                        {               
//                         var json = $.parseJSON(r);   
//                         var total = document.getElementById('txt3'+i+'').value;
//                         var result = json.addons_price; 
//                         var res =  parseInt(total) + parseInt(result);
//                         $('#txt3'+i+'').val(res);
//                        }
//                    });
//                    
//                    }else{
//                    
//                      var txtFirstNumberValue = document.getElementById('txt1'+i+'').value;
//            var txtSecondNumberValue = document.getElementById('txt2'+i+'').value;
//            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
//            if (!isNaN(result)) {
//                document.getElementById('txt3'+i+'').value = result.toFixed(2);
//            }
//                    
//                    }
                    
                    

 }
 
 
     function sum1(i){
     
            var txtFirstNumberValue = document.getElementById('q'+i+'').value;
            var txtSecondNumberValue = document.getElementById('p'+i+'').value;
            var addontotal = document.getElementById('addontotal'+i+'').value
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+parseInt(addontotal);
            if (!isNaN(result)){
                document.getElementById('tot'+i+'').value = result.toFixed(2);
            }
            
        }
 
 <?php $i=0; foreach ($order_details as $details){ ?>   
  $('#wow<?=$i?>').change(function(){
    // Remove any previously set values
    var sum = 0,
        price;
    $(this).find('option:selected').each(function() {
        // Check that the attribute exist, so that any unset values won't bother
        if ($(this).attr('data-price')) {            
            price = $(this).data('price');
            sum += price;
        }
    });
    
     document.getElementById('addontotal<?=$i?>').value = sum;
    
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
     var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+ parseInt(sum);
    
   //var total = document.getElementById('tot').value;
   //var res =  parseInt(total) + parseInt(sum);
   document.getElementById('tot<?=$i?>').value = result.toFixed(2);
   
   }
});



    $('#it<?=$i?>').change(function(){   
    var price = $(this).find('option:selected').data("price");
    document.getElementById('p<?=$i?>').value = price;
    var q = document.getElementById('q<?=$i?>').value;
    var p = document.getElementById('p<?=$i?>').value;
    var addontotal =  document.getElementById('addontotal<?=$i?>').value;
    var result = parseInt(q) * parseInt(p)+ parseInt(addontotal);
    document.getElementById('tot<?=$i?>').value = result.toFixed(2);
    
    });

<?php $i++; } ?>


</script>



