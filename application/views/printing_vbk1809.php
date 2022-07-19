<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <section>
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="col_full">

            <div class="content_center">
              <h3 class="sub_head"> Printing </h3>

              <form class="default-form"  action="<?=site_url('printing/order')?>" id="form_id" method="post" enctype="multipart/form-data">
               
                <div class="form-group">
                    <select name="print_type_id" class="form-control" id="print_type_id" onchange="printing();" required>
                    <option value=""> Select Your Printing Type </option>
                    <?php foreach ($print_type as $row){ ?>
                    <option value="<?=$row->print_type_id?>"><?=$row->pri_type_name?></option>
                    <?php } ?>
                  </select>
                </div>
                  
                <div class="form-group">
                    <select name="printing_id"  class="form-control" id="classes_name"> 
                          <option value=""> Select Your  Colour </option>
                  </select>
                </div>
                  
                  
                                <div class="form-group upload-btn-wrapper"> 
                            <button class="btn"> <i class="icon-cloud-upload mr5"></i> Upload a file</button>
                            <input class="iform-control form-control-file"  type="file" name="userfile" id="imgInp">
                            <br>
                     <img id="blah" src="#" alt="your image" style="width: 340px;height: 175px;display:none" />
                            <span class="help-block"></span>
                            <small>Please upload image in 340px X 175px (jpg or jpeg) dimension for optimal view</small>  
                                </div> 



                <div class="form-group">
          <input type="number"  name="qty" class="form-control" id="exampleFormControlInput1" placeholder="Enter Qantity">
                </div>
                    
                <div class="form-group">
                    <select name="type"  class="form-control" id="type"> 
                        <option value="Delivery">Delivery</option>
                        <option value="pickup">Pickup</option>
                    </select>
                </div>
                  
                  <div class="form-group" id="delivery" style="display:none">
            <input type="text" name="delivery_addr" class="form-control" id="exampleFormControlInput1" placeholder="Enter Delivery Location">
                </div>
                  
                  
            <div class="form-group" style="display:none" id="pickup">
                    <select name="branch_id" class="form-control">
                    <option value=""> Select Your Pickup Branch </option>
                    <?php foreach ($branch as $row){ ?>
                    <option value="<?=$row->branch_id?>"><?=$row->branch_name?></option>
                    <?php } ?>
                  </select>
            </div>
                  
            
            <div class="form-group">
                
                <label><input type="radio" name="payment_option"  value="knet" /> K NET</label>&nbsp;
                <label><input type="radio" name="payment_option"  value="MiGS" /> VISA/MASTER CARD </label>
                
            </div>     
                  
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                  
            </form>

            </div>
          </div>
        </div>
      </div>
    </section>

<script>
    
    function printing(){
        
        var e = document.getElementById("print_type_id");
        var print_type_id = e.options[e.selectedIndex].value;
        
            $.ajax({
            url: '<?=site_url('printing/get_printing')?>',
            type: 'GET',
            data: {print_type_id: print_type_id}, 
            dataType: 'json',      
            success: function(msg)
            {   
                 $print_type = '';
                 if(msg.status == '200'){
                   $.each(msg.res, function(index, value){
                       $print_type +='<option value="'+value.printing_id+'" selected>'+value.attributes_name+'</option>';
                    });            
                   $("#classes_name").html($print_type);
                  }  
              
            }
         });
        
    }
    
    $('#form_id').submit(function(event){    
        event.preventDefault();
        $('#overlay').show(); 
      //$('#btn_sub').html('Processing...');
         var formData = new FormData(this);
          $.ajax({
            url: '<?=site_url('printing/order')?>',
            type: 'POST',
            data: formData, 
            dataType: 'json',      
            success: function(msg)
            { 
              if(msg.status == 'error'){ 
                //$('#btn_sub').html('<i class="fa fa-plus-square" aria-hidden="true"></i> Save');
                //sweetAlert('Error!', msg.msg, "error");
                setTimeout(function(){location.href="<?=site_url('login')?>"} ,0); 
              }else{ 
                sweetAlert('Success!', '', "success");
                $('#overlay').hide();
                //$("#imgInp").hide();
               // $('#form_id')[0].reset();
                
               if(msg.payment_option == 'knet'){
                   
      // setTimeout(function(){location.href="<?=base_url()?>SendPerformREQuest.php?total_amount=10&order_id=1"} , 1000);  
     setTimeout(function(){location.href="https://www.postastc.com/postaplus`SendPerformREQuest.php?total_amount=10&order_id=1"} , 1000);
                  }else{
                      
                      
                      
                      
      setTimeout(function(){location.href="https://www.postastc.com/postaplus`payment/PHP_VPC_3Party_Order_DO.php?Title=PHP VPC 3 Party Transacion&virtualPaymentClientURL=https://migs.mastercard.com.au/vpcpay&vpc_Version=1&vpc_Command=pay&vpc_AccessCode=9FE0FA38&vpc_MerchTxnRef=3&vpc_Merchant=TESTGBK_KWD&vpc_OrderInfo=1&vpc_Amount=5&vpc_ReturnURL=http://printechsindia.com/payment/PHP_VPC_3Party_Order_DR.php&vpc_Locale=en_AU&vpc_Currency=KWD&SubButL=Pay Now!"} , 1000);
                      
                      }
                
                }
            },
            cache: false,
            contentType: false,
            processData: false
         });
          return false;
        });
        
        
$(document).ready(function(){
    function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').css('display', 'block');
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

});


                    $(document).ready(function ()
                    {

                        function getAlls(){
                            var e = document.getElementById("type");
                            var type = e.options[e.selectedIndex].value;
                            
                             if(type=='pickup'){
                                $("#pickup").show();
                                $("#delivery").hide();
                            }else{
                                $("#delivery").show();
                                $("#pickup").hide();
                             }
                           
                        }
                        getAlls();

                        $("#type").change(function ()
                        {
                            //var type = $(this).find(":selected").val();
                           getAlls();
                            
                        })
                    });
               
</script>

       