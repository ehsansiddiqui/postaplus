            <!-- Content
            ============================================= -->
            <section id="content">

                <div class="content-wrap">


                    <div class="container clearfix " style="max-width:80%; margin-left: auto; margin-right:auto;     "> 
                        <div class='row' >
                            <div class="col-md-8 offset-md-2 col-sm-12">
                                <div class="style-msg successmsg" style="margin-left: auto; margin-right:auto;  " >
                                    <!--    --------(to show when changes made)---------- -->
                      <?php if($this->session->flashdata('message')){  ?>              
                      <div class="sb-msg"><i class="icon-thumbs-up"></i>
                          <?=$this->session->flashdata('message');?>
                      </div>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php } ?>             
                                </div>
                                 
                                <div class="clearfix"></div>


                                <div   class="divDevider" >
                                    <div style="background-color:#ea7f1d; width:100%; padding:10px; border-radius: 10px 10px 0px 0px;  ">
                                        <h4 class="nobottommargin" style="color:#fff;">Personal information</h4>
                                    </div>
                                    <form action="<?=site_url('profile')?>" method="post" enctype="multipart/form-data">
                                        
                                        
                                        <div class="col-md-12">
                                            <label for="phone_number" class="label">Mobile Number</label>
                                            <input type="text" name="phone_number" id="number" value="<?=$myprofile->phone_number?>" class="form-control" maxlength="15" readonly/>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label for="full_name" class="label">Full Name</label>
           <input type="text" name="full_name" id="name" class="form-control"  value="<?=$myprofile->full_name?>" required="" maxlength="255" />
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label for="email" class="label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?=$myprofile->email_id?>"  required="" maxlength="255"/>
                                        </div>
                                        
                                        
                                        <div class="col-md-12">
                                            <label for="address" class="label">Address</label>
<textarea name="address" id="address" class="form-control" maxlength="255" required=""><?=$myprofile->address?></textarea>
                                        </div>
                                        
                                        <br>  
                                    <?php if($myprofile->image){ ?>    
                                        <div class="col-md-12">    
                   <img src="<?=base_url()?>user/<?=$myprofile->image?>" style="width:100px;height:50px" />
                                        </div>
                                    <?php } ?>  
                                        <br>
                                        <div class="col-md-12">
                                        
                                                <div class="form-group upload-btn-wrapper"> 
                            <button class="btn"> <i class="icon-cloud-upload mr5"></i>Profile Image</button>
                            <input class="iform-control form-control-file"  type="file" name="userfile" id="imgInp">
                            <br>
                     <img id="blah" src="#" alt="your image" style="width: 500px;height: 250px;display:none" />
                            <span class="help-block"></span>
<!--                            <small>Please upload image in 500px X 250px (jpg or jpeg) dimension for optimal view</small>  -->
                                </div> 
                                            
                                        </div>
                                        
                                      
                                        <div class="col-md-12 center" style="margin-top:20px;">
                                            <input class="button button-3d  " type="submit" name="submit" value="Update"/>
                                        </div>
                                    </form>
                                </div>
                                
                                <br>
                                
<!--                                  <div class="style-msg bg-danger" style="margin-left: auto; margin-right:auto;  " >
                                        --------(to show when changes made)---------- 
                                  
                      <div class="sb-msg"><i class="icon-thumbs-down"></i>
                         mvvv  gfdfgg
                      </div>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               
                                </div>-->
                                
                                <div    class="divDevider bottommargin-lg">
                                    <div style="background-color:#ea7f1d; width:100%; padding:10px; border-radius: 10px 10px 0px 0px;  ">
                                        <h4 class="nobottommargin" style="color:#fff;">Change Password</h4>
                                    </div>
                                    <form action="<?=site_url('profile/change_password')?>" method="post">
                                    
                                        <div class="col-md-12">
                                            <label for="number" class="label">New password</label>
                                            <input type="password" name="password" id="number" value="<?php echo set_value('password'); ?>"  class="form-control"/>
                     <span class="text-danger"><?php echo form_error('password', '<div class="error">', '</div>'); ?></span>                       
                                        </div>
                                        <div class="col-md-12">
                                            <label for="number" class="label">Confirm password</label>
                                            <input type="password" name="confirm_password" id="number" value="<?php echo set_value('confirm_password'); ?>" class="form-control"/>
               <span class="text-danger"><?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?></span>                              
                                        </div>
                                        <div class="col-md-12 center" style="margin-top:20px;">
                    <input  class="button button-3d" type="submit" name="submit"  value="Change">
                                        </div>
                                        </form>
                                    
                                </div>    
                                     
                            </div>





                        </div>




                    </div>

                </div>

            </section><!-- #content end -->
            
            
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
            </script>    