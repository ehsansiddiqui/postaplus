<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <section>
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="col_full">

            <div class="content_center">
              <h3 class="sub_head"> GOVERNMENT PAPPERS </h3>

              <form class="default-form" id="form_id" method="post" enctype="multipart/form-data">
               
                <div class="form-group">
                    <select name="government_paper_category_id" class="form-control" id="government_paper_category_id" onchange="printing();" required>
                    <option value="">  Select From Category </option>
                    <?php foreach ($category as $row){ ?>
                    <option value="<?=$row->government_paper_category_id?>"><?=$row->government_paper_cate_name?></option>
                    <?php } ?>
                  </select>
                </div>
                  
                <div class="form-group">
                    <select name="government_paper_id"  class="form-control" id="classes_name"> 
                          <option value="">  The requirement info documents  </option>
                  </select>
                </div>
                  
                  
                                <div class="form-group upload-btn-wrapper"> 
                            <button class="btn"> <i class="icon-cloud-upload mr5"></i> Upload a file</button>
                            <input class="iform-control form-control-file"  type="file" name="userfile[]" id="imgInp" multiple="">
                            
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
        
        var e = document.getElementById("government_paper_category_id");
        var government_paper_category_id = e.options[e.selectedIndex].value;
        
            $.ajax({
            url: '<?=site_url('government_pappers/get_government_pappers')?>',
            type: 'GET',
            data: {government_paper_category_id: government_paper_category_id}, 
            dataType: 'json',      
            success: function(msg)
            {   
                 $print_type = '';
                 if(msg.status == '200'){
                   $.each(msg.res, function(index, value){
                       $print_type +='<option value="'+value.government_paper_id+'" selected>'+value.government_paper_title+'</option>';
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
            url: '<?=site_url('government_pappers/order')?>',
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
                setTimeout(function(){location.href="<?=site_url('government_pappers')?>"} , 1000);   
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
 var str =input.files[0].name;
 var res = str.split(".");
 
 if(res[1] == 'jpeg'|| res[1] == 'jpg'|| res[1] == 'png'){
   reader.readAsDataURL(input.files[0]);
    }else{   
      $('#blah').css('display', 'block');
      $('#blah').attr('src','https://r3infosolutions.com/dataconnect/journal/pdf-icon.png');
     // $('#blah').attr('title',input.files[0].name);
    }
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

       