
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>
            
            
            <script type="text/javascript">
    $(document).ready(function () {
        
       function getradio(){
          
          if ($("#bod").val() == "bod") {
              
            $("#head").show();
            
        }else {
                $("#head").hide();
                // $("#bod").show();
            }
       
          if($('input:radio[name=user]:checked').val() =="head"){
               $("#head").hide();
          }
          else{
               $("#head").show();

          }
        
       } 
        
        getradio(); 
        $("input:radio").click(function () {
            if ($(this).val() == "bod") {
                $("#head").show();
                //$("#bod").hide();
            } else {
                $("#head").hide();
                // $("#bod").show();
            }
        });
    });
</script>
            
            

                <div class="block">
                    <h4>EDIT VOUCHER</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('voucher/edit_1/' . $id) ?>" method="post">
                        <div class="panel-body">



                         
                            <div class="form-group">
                                <label class="col-md-3 control-label">Voucher Code:</label>  
                                <div class="col-md-9">
                                    <input type="text"  maxlength="10"  class="form-control" name="voucher_code" value="<?= $result->voucher_code ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>


                            <?php
                            $in = array();

                            foreach ($voucher_user as $vuser) {
                                $in[] = $vuser->user_id;
                            }
                            ?> 

                           

                                <?php if (!empty($in)) { ?>
                             <div class="form-group">
                                <label class="col-md-3 control-label">User Type:</label>


                                    <div class="col-md-4"> 
                                     <input type="radio" name="user" value="head" >All Users
                                    </div>

                                    <div class="col-md-4">                                    
                                        <input type="radio" name="user" id ="bod"  value="bod" checked=""> User Select         
                                    </div>
                                </div>
                            
                            

                                    <?php } else { ?>
                              <div class="form-group">
                                <label class="col-md-3 control-label">User Type:</label>


                                    <div class="col-md-4"> 
                                     <input type="radio" name="user" value="head" checked="">All Users
                                    </div>

                                    <div class="col-md-4">                                    
                                        <input type="radio" name="user" id="bod" value="bod"> User Select         
                                    </div>
                                </div>

                                  <?php } ?>      



                                

                                <div class="form-group" id="head" style="display:none;">    

                                    <label class="col-md-3 control-label">User :</label>
                                    <div class="col-md-9">                                                                            
                                        <select multiple class="form-control select" name="user_id[]" data-live-search="true">
                                            <?php foreach ($user as $row): ?>
                                                <option value="<?= $row->user_id ?>" <?php if (in_array($row->user_id, $in)) {
                                        echo 'selected';
                                    } ?>><?= $row->first_name ?></option>
        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-md-3 control-label">Voucher type :</label>
                                    <div class="col-md-9">                                                                            
                                        <select  class="form-control select" name="voucher_type" value="<?= $result->voucher_type ?>" required>

                                            <option value="1" <?php if ($result->voucher_type == 1) { ?> selected="" <?php } ?> >Price Reduction</option>
                                            <option value="2" <?php if ($result->voucher_type == 2) { ?> selected="" <?php } ?>>Percentage Reduction</option>

                                        </select>
                                    </div>
                                </div> 


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Voucher Reduction :</label>  
                                    <div class="col-md-9">
 <input type="number" class="form-control" name="voucher_reduction" value="<?= $result->voucher_reduction ?>"  maxlength="50" required/>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                            
                            
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Expiry Date:</label>  
                                    <div class="col-md-9">
                                        <input type="text" name="expiry_date" value="<?= $result->expiry_date ?>"  data-language="en" class="form-control datepicker-here" required>
                                        <span class="help-block"></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Voucher Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" rows="5" name="voucher_desc"><?= $result->voucher_desc ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Minimum Price :</label>  
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="minimum_amount" value="<?= $result->minimum_amount ?>"  maxlength="50" required/>
                                        <span class="help-block"></span>
                                    </div>

                                </div>







                                <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                </div>                                                                                       
                            </div>                                               
                        </form>

                    </div>   
    <?php } else { ?>

<script type="text/javascript">
    $(document).ready(function () {
        

        $("input:radio").click(function () {
            if ($(this).val() == "bod") {
                $("#head").show();
                //$("#bod").hide();
            } else {
                $("#head").hide();
                // $("#bod").show();
            }
        });
    });
</script>


                    <div class="block">
                        <h4>ADD VOUCHER</h4>
                        <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('voucher/add/') ?>" method="post">

                            <div class="panel-body">




                                <div class="form-group">
                                    <label class="col-md-3 control-label">Voucher Code :</label>  
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="voucher_code"   maxlength="50" required/>
                                        <span class="help-block"></span>
                                    </div>

                                </div>



                                <div class="form-group">
                                    <label class="col-md-3 control-label">User Type:</label>


                                    <div class="col-md-4">                                    

                                        <input type="radio" name="user" value="head" checked="">All Users
                                    </div>

                                    <div class="col-md-4">                                    
                                        <input type="radio" name="user" value="bod"> User Select         
                                    </div>



                                </div>




                                <div class="form-group" id="head" style="display:none;">

                                    <label class="col-md-3 control-label">User :</label>
                                    <div class="col-sm-9">                                                                            
       <select multiple class="form-control select" id="user_id" style="display:none;" name="user_id[]" data-live-search="true">

                                            <?php foreach ($user as $row): ?>
                                                <option value="<?= $row->user_id ?>"><?= $row->first_name ?></option>
        <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div> 



                                <div class="form-group">
                                    <label class="col-md-3 control-label">Voucher type :</label>
                                    <div class="col-md-9">                                                                            
                                        <select  class="form-control select" name="voucher_type"  required>

                                            <option value="1">Percentage Reduction</option>
                                            <option value="2">Price Reduction</option>

                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Voucher Reduction :</label>  
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="voucher_reduction"   maxlength="50" required/>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Expiry Date:</label>  
                                    <div class="col-md-9">
                                        <input type="text" name="expiry_date"  data-language="en" class="form-control datepicker-here" required>
                                        <span class="help-block"></span>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-3 control-label">Voucher Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" rows="5" name="voucher_desc"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Minimum Price :</label>  
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="minimum_amount"   maxlength="50" required/>
                                        <span class="help-block"></span>
                                    </div>

                                </div>




                                <div class="btn-group pull-right">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                                </div>                                                                                                                          
                            </div>                                               





                        </form>



                    </div>


    <?php } ?>


        </div>
    </div>            
</div>


