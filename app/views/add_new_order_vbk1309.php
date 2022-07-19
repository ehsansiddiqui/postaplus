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
<!--                            <tr>
                                <th></th>
                                <th></th>
                            </tr>-->
                        </thead>
                        <tbody> 
                            <tr>
                            <td style="border-top: 0px"><strong>Order NO</strong></td>
                            <td style="border-top: 0px"><input type="text"  maxlength="50"  class="form-control" name="order_number" id="order_number" value="<?=$order_number?>" readonly style="color:#000"/></td>
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



<!--                            <tr>
                                <td><strong>Address:</strong></td>
    <td>
        
        <textarea class="form-control" rows="5" name="address" readonly style="color: black;" id="address"></textarea>
        <input class="form-control" type="hidden" name="cus_addr_id" id="cus_addr_id" />
    
    </td>
                            </tr>-->
                            
                            
                            
                            
                            <tr>
                                <td><strong>Address:</strong></td>
    <td>
        
        <select class="form-control select" name="cus_addr_id" id="classes_name" data-live-search="true" required>
            
        </select>
    
    </td>
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
                                            <input type="text" class="form-control" name="lat" />
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng" />
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
                                <td style="border-top: 0px"><strong>Pickup Method</strong></td>
                            <td  style="border-top: 0px">
                                
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
                                <td><strong>Subcribe Status</strong></td>
                                <td>
                                    <input type="radio" name="subcribe_status" value="NO"  checked/>  NO &nbsp;
                                    <input type="radio" name="subcribe_status" value="YES" data-toggle="modal" data-target="#exampleModal"/> YES
                                </td>
                               
                                
                            </tr>

                            
                            
                            <tr>
                                <td><strong></strong></td>
                                <td>
        <textarea class="form-control" rows="5" name="notes"id="s_day"></textarea>
        <input type="hidden" id="s_day1" name="subcribe_day" />
        <input type="hidden" id="subscribe_ids" name="subscribe_ids" />
                                </td>
                            </tr>

                            <tr>
                                <td><strong>Notes</strong></td>
                                <td>
        <textarea class="form-control" rows="5" name="notes"></textarea>                
                                </td>
                            </tr>


                          
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
      
      

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      
      
   <form id="form1" role="form" class="form-horizontal"> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SUBSCRIBE DETAILS</h5>
      </div>
<!--      <div class="modal-body">-->
       
          
          
             <div class="block">
           
   
                        <div class="panel-body">
          
          
          
                            <div class="form-group">
                                <div class="col-md-12">
                               <label>SUBSCRIBE<small style="color:red">*</small> :</label>                    
            <select class="form-control select" name="subscribe_id"  id="SUBSCRIBE" data-live-search="true" required>
            <option value="1">Weekly</option>
            <option value="2">Monthly</option>
            <option value="3">By Week</option>
            </select>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group" id="week">
                                <div class="col-md-12">
<!--                               <label> <small style="color:red">*</small> :</label>                    -->
                   <select multiple class="form-control select" name="week[]"  data-live-search="true" required>
            <option value="1">Monday</option>
            <option value="2">Tuesday</option>
            <option value="3">Wednesday</option>
            <option value="4">Thursday</option>
            <option value="5">Friday</option>
            <option value="6">Saturday</option>
            <option value="7">Sunday</option>

                   </select>
                                </div>
                            </div>
                            
                            
                            
                           <div class="form-group" id="month">
                            <div class="col-md-12">
                   <select multiple class="form-control select" name="month[]"  data-live-search="true" required>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
                   </select>
                            </div>
                            </div>  

          
                        </div>
                  
             </div>
          
          
             
<!--      </div>-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary"   id="subsc" value="Save changes" />
      </div>



    </div>
        </form>
      
      
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
                            
//                      var json = $.parseJSON(r); 


             if(JSON.parse(r).status == 100){
                 
                 $.each(JSON.parse(r).res, function(index,value){    
                   $("#phone_number").val(value.phone_number);
                   $("#customer_types").val(value.customer_types);
                 });

                 
                $class ='';
                $class_list = '';
                $name3 = '';
                
                    $.each(JSON.parse(r).addr, function(index, value){
                        $class +='<option value="'+value.cus_addr_id+'" selected>'+value.customer_address+'</option>';
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
                        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+ parseInt(addontotal)*parseInt(txtFirstNumberValue);
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
     var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)+ parseInt(sum)*parseInt(txtFirstNumberValue);
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
 
 
 function subscribe(){
      $("#week").show();
      $("#month").hide();
      $("#s_day").hide();
 }
 
 
   $("#SUBSCRIBE").change(function (){
      
       var e = document.getElementById("SUBSCRIBE");
            var SUBSCRIBE_ID = e.options[e.selectedIndex].value;
      
            if (SUBSCRIBE_ID == "2"){
                $("#month").show();
                $("#week").hide();
            } else {
                $("#week").show();
                $("#month").hide();
            }
        });
        
      subscribe();  
      
      
      
   $("#subsc").click(function(){
       
          var form=$("#form1");
         
          $.ajax({
            type: 'POST',
            url: '<?= site_url('order/get_subscribe') ?>',
            data: form.serialize(),
            success: function (s) {
                
              var json = $.parseJSON(s); 
              
              var subscribe_id = json.subscribe_id;
              $("#subscribe_ids").val(subscribe_id);
              
              if(json.subscribe_id == "2"){
                 
                var moths  = json.month; 
                var text = new Array(); 
                var text1 = new Array(); 
                var i;
              for (i = 0; i < moths.length; i++){
           
                  text1 += moths[i]+',';
                  if(moths[i]=="1"){
                      text += 'January'+',';
                  }
                  if(moths[i]=="2"){
                      text += 'February'+',';
                  }
                  if(moths[i]=="3"){
                      text += 'March'+',';
                  }
                  if(moths[i]=="4"){
                      text += 'April'+',';
                  }
                  if(moths[i]=="5"){
                      text += 'May'+',';
                  }
                  if(moths[i]=="6"){
                      text += 'June'+',';
                  }
                  if(moths[i]=="7"){
                      text += 'July'+',';
                  }
                  if(moths[i]=="8"){
                      text += 'August'+',';
                  }
                  if(moths[i]=="9"){
                      text += 'September'+',';
                  }
                  if(moths[i]=="10"){
                      text += 'October'+',';
                  }
                  if(moths[i]=="11"){
                      text += 'November'+',';
                  }
                  if(moths[i]=="12"){
                      text += 'Descember'+',';
                  }
          }      
                     
                     
                     
               var str = text.replace(/,\s*$/, "")
               var str1 = text1.replace(/,\s*$/, "")
               $("#s_day").val(str);
               $("#s_day1").val(str1);
                     
                 
                 
               }else{
                   
                var weeks  = json.week;
                var text = new Array(); 
                var text1 = new Array(); 
                var i;
              for (i = 0; i < weeks.length; i++) {
           
                  text1 += weeks[i]+',';
                  if(weeks[i]=="1"){
                      text += 'Monday'+',';
                  }
                  if(weeks[i]=="2"){
                      text += 'Tuesday'+',';
                  }
                  if(weeks[i]=="3"){
                      text += 'Wednesday'+',';
                  }
                  if(weeks[i]=="4"){
                      text += 'Thursday'+',';
                  }
                  if(weeks[i]=="5"){
                      text += 'Friday'+',';
                  }
                  if(weeks[i]=="6"){
                      text += 'Saturday'+',';
                  }
                  if(weeks[i]=="7"){
                      text += 'Sunday'+',';
                  }
          }      
                     
                     
                     
               var str = text.replace(/,\s*$/, "")
               var str1 = text1.replace(/,\s*$/, "")
               $("#s_day").val(str);
               $("#s_day1").val(str1);
                
               }
                $("#exampleModal").hide();
                $("#s_day").show();
               
            }
          });

        });

</script>