<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <section>
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="col_full">

            <div class="content_center">
              <h3 class="sub_head"> PHOTO PRINTING </h3>

              <form class="default-form" id="form_id" action="<?=site_url('photo_printing/order')?>" method="post" enctype="multipart/form-data">
               
                <div class="form-group">
                  <select name="photoprinting_id" class="form-control" id="print_type_id"  required>
                    <option value=""> Select Your Size </option>
                    <?php foreach ($photo_printing as $row){ ?>
                    <option value="<?=$row->photoprinting_id?>"><?=$row->attributes_name.' ('.$row->photoprinting_title.')'?></option>
                    <?php } ?>
                  </select>
                </div>
                  
              
                  
                  
                                <div class="form-group upload-btn-wrapper"> 
                            <button class="btn"> <i class="icon-cloud-upload mr5"></i> Upload a file</button>
                            <input class="iform-control form-control-file"  type="file" name="userfile" id="imgInp">
                            <br>
                     <img id="blah" src="#" alt="your image" style="width: 500px;height: 250px;display:none" />
                            <span class="help-block"></span>
                            <small>Please upload image in 500px X 250px (jpg or jpeg) dimension for optimal view</small>  
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
             <small>The order will be delivered in 24 hours</small>
                </div>
                  
                  
            <div class="form-group" style="display:none" id="pickup">
                    <select name="branch_id" class="form-control">
                    <option value=""> Select Your Pickup Branch </option>
                    <?php foreach ($branch as $row){ ?>
                    <option value="<?=$row->branch_id?>"><?=$row->branch_name?></option>
                    <?php } ?>
                  </select>
             <small>The order will be ready in branch after 12-24 hours</small>     
            </div>
                  
            
<!--            <div class="form-group">-->
<!--                -->
<!--                <label><input type="radio" name="payment_option"  value="knet" /> K NET</label>&nbsp;-->
<!--                <label><input type="radio" name="payment_option"  value="MiGS" /> VISA/MASTER CARD</label>-->
<!--                -->
<!--            </div>     -->
                  
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Add To Cart</button>
                  
              </form>

            </div>
          </div>
        </div>
      </div>
    </section>

<script>
     
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

       