<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
    <section>
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="col_full">

            <div class="content_center">
              <h3 class="sub_head"> Login </h3>

              <form class="default-form" id="form_id" method="post" enctype="multipart/form-data">       
                <div class="form-group">
                    <input type="text"  name="phone_number" class="form-control" id="exampleFormControlInput1" placeholder="Phone number" required>
                </div>  
                <div class="form-group">
                    <input type="password"  name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" required>
   
                </div>
             <input type="hidden" name="page" value="<?php if(isset($page)){ echo $page ;}else{ echo 'index';} ?>" />
             <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
             </form>
              
              
            </div>
          </div>
        </div>
      </div>
    </section>

<script>
    $('#form_id').submit(function(event){    
          event.preventDefault();
          $('#overlay').show(); 
         var formData = new FormData(this);
          $.ajax({
            url: '<?=site_url('login/verify_chekout')?>',
            type: 'POST',
            data: formData, 
            dataType: 'json',      
            success: function(msg)
            { 
              if(msg.status == 'error'){ 
                //$('#btn_sub').html('<i class="fa fa-plus-square" aria-hidden="true"></i> Save');
                sweetAlert('Error!', msg.msg, "error");
                $('#form_id')[0].reset();
                $('#overlay').hide();
              }else{ 
                sweetAlert('Success!', '', "success");
                $('#overlay').hide();
                //$("#imgInp").hide();
                $('#form_id')[0].reset();
                
                //alert(msg.page);
                setTimeout(function(){location.href=msg.page} , 1000);   
                }
            },
            cache: false,
            contentType: false,
            processData: false
         });
          return false;
        });               
</script>

       