<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <section>
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="col_full">

            <div class="content_center">
              <h3 class="sub_head"> <?=@$category->gift_cate_name?></h3>
              
             <?php if($category->gift_cate_image){  ?>    
            <p><img src="<?=base_url()?>/gift/<?=@$category->gift_cate_image?>" alt="your image" style="width:500px;height:250px;" /></p>
             <?php }else{ ?>             
            <p><img src="https://dummyimage.com/500x250/000/fff" alt=""></p>
             <?php  } ?>
            <form class="default-form" id="form_id" method="post" enctype="multipart/form-data">
               
                <div id="msg"></div>
                  
<!--                <div class="form-group">
                    <select name="gift_id[]"  class="form-control" id="size"> 
                          <option value=""> Select Your Size </option>
                  </select>
                </div>
                
                
                <div class="form-group">
                    <select name="gift_id[]"  class="form-control" id="colour"> 
                          <option value=""> Select Your Colour </option>
                  </select>
                </div>-->
                  
                  
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
                <input type="hidden" name="gift_category_id" value="<?=$category->gift_category_id?>"/>
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                  
              </form>

            </div>
          </div>
        </div>
      </div>
    </section>

<script>
    
    $(document).ready(function(){
        
        var gift_category_id = '<?=$category->gift_category_id?>';
        
            $.ajax({
            url: '<?=site_url('gift/get_gift')?>',
            type: 'GET',
            data: {gift_category_id: gift_category_id}, 
           // dataType: 'json',      
            success: function(msg)
            {     
              $('#msg').html(msg);
            }
         });
        
});
    
    $('#form_id').submit(function(event){    
          event.preventDefault();
          $('#overlay').show(); 
      //$('#btn_sub').html('Processing...');
         var formData = new FormData(this);
          $.ajax({
            url: '<?=site_url('gift/order')?>',
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
                $('#form_id')[0].reset();
                setTimeout(function(){location.href="<?=site_url('gift?category_id=')?>"+msg.id} , 1000);   
                }
            },
            cache: false,
            contentType: false,
            processData: false
         });
          return false;
        });
        
        
//$(document).ready(function(){
//    function readURL(input) {
//
//  if (input.files && input.files[0]) {
//    var reader = new FileReader();
//
//    reader.onload = function(e) {
//      $('#blah').css('display', 'block');
//      $('#blah').attr('src', e.target.result);
//    }
//
//    reader.readAsDataURL(input.files[0]);
//  }
//}
//
//$("#imgInp").change(function() {
//  readURL(this);
//});
//
//});


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

       