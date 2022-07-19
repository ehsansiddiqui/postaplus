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
                    <option value=""> اختر نوع الطباعة </option>
                    <?php foreach ($print_type as $row){ ?>
                    <option value="<?=$row->print_type_id?>"><?=$row->pri_type_name?></option>
                    <?php } ?>
                  </select>
                </div>
                  
                <div class="form-group">
                    <select name="printing_id"  class="form-control" id="classes_name"> 
                          <option value=""> اختر اللون </option>
                  </select>
                </div>
                  
                  
                                <div class="form-group upload-btn-wrapper"> 
                            <button class="btn"> <i class="icon-cloud-upload mr5"></i> ارفع المستند</button>
                            <input class="iform-control form-control-file"  type="file" name="userfile" id="imgInp">
                            <br>
                     <img id="blah" src="#" alt="your image" style="width: 500px;height: 250px;display:none" />
                            <span class="help-block"></span>
                            <small>Please upload image in 500px X 250px (jpg or jpeg) dimension for optimal view</small>  
                                </div> 



                <div class="form-group">
          <input type="number"  name="qty" class="form-control" id="exampleFormControlInput1" placeholder="حدد الكمية">
                </div>
                    
                <div class="form-group">
                    <select name="type"  class="form-control" id="type"> 
                        <option value="Delivery">توصيل</option>
                        <option value="pickup">استلام</option>
                    </select>
                </div>
                  
                  <div class="form-group" id="delivery" style="display:none">
            <input type="text" name="delivery_addr" class="form-control" id="exampleFormControlInput1" placeholder="ادخل عنوان التوصيل">
            <small>The order will be delivered in 24 hours</small>
                </div>
                  
                  
            <div class="form-group" style="display:none" id="pickup">
                    <select name="branch_id" class="form-control">
                    <option value=""> اختر فرع الاستلام </option>
                    <?php foreach ($branch as $row){ ?>
                    <option value="<?=$row->branch_id?>"><?=$row->branch_name?></option>
                    <?php } ?>
                  </select>
                   <small>سيكون الطلب جاهزًا في الفرع بعد 12-24 ساعة
</small>
            </div>
                  
            
            <div class="form-group">
                
                <label><input type="radio" name="payment_option"  value="knet" /> كي نت</label>&nbsp;
                <label><input type="radio" name="payment_option"  value="MiGS" /> فيزا/ماستركارد </label>
                
            </div>     
                  
                  <button type="submit" name="submit" class="btn btn-primary btn-block">إرسال</button>
                  
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

       