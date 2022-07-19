  <?php 
    function is_in_array($array, $key, $key_value){
      $within_array = 'no';
      foreach( $array as $k=>$v ){
        if( is_array($v) ){
            $within_array = is_in_array($v, $key, $key_value);
            if( $within_array == 'yes' ){
                break;
            }
        } else {
                if( $v == $key_value && $k == $key ){
                        $within_array = 'yes';
                        break;
                }
        }
      }
      return $within_array;
}

$res = json_encode($res);
$res = json_decode($res,TRUE);



        if (is_in_array($res,'attributes_group_name', 'Size')=='yes'){
        ?>
    <div class="form-group">
        <select name="gift_id[]"  class="form-control"  required> 
                          <option value=""> Select Your Size </option>
                         <?php
                         foreach ($res as $row){ 
                            if($row['attributes_group_name'] =='Size'){ 
                             ?>
                          <option value="<?=$row['gift_id']?>"><?=$row['attributes_name']?></option>
                          <?php } } ?>
       </select>
    </div>
  <?php  } ?>

<?php if (is_in_array($res,'attributes_group_name', 'Colour')=='yes'){ ?>
   <div class="form-group">
        <select name="gift_id[]"  class="form-control"  required> 
                          <option value=""> Select Your Colour </option>
                         <?php
                         foreach ($res as $row){ 
                            if($row['attributes_group_name'] =='Colour'){ 
                             ?>
                          <option value="<?=$row['gift_id']?>"><?=$row['attributes_name']?></option>
                          <?php } } ?>
       </select>
    </div>
<?php } ?>


<?php if (is_in_array($res,'attributes_group_name', 'Print Side')=='yes'){ ?>
   <div class="form-group">
        <select name="gift_id[]"  class="form-control"  required> 
                          <option value=""> Select Your Printing Side </option>
                         <?php
                         foreach ($res as $row){ 
                            if($row['attributes_group_name'] =='Print Side'){ 
                             ?>
                          <option value="<?=$row['gift_id']?>"><?=$row['attributes_name']?></option>
                          <?php } } ?>
       </select>
    </div>
<?php } ?>


<?php if (is_in_array($res,'attributes_group_name', 'gift printing type')=='yes'){ ?>
   <div class="form-group">
        <select name="gift_id[]"  class="form-control"  required> 
                          <option value=""> Select Your printing type </option>
                         <?php
                         foreach ($res as $row){ 
                            if($row['attributes_group_name'] =='gift printing type'){ 
                             ?>
                          <option value="<?=$row['gift_id']?>"><?=$row['attributes_name']?></option>
                          <?php } } ?>
       </select>
    </div>
<?php } ?>

<?php if (is_in_array($res,'attributes_group_name', 'gift printing type')=='yes'){ ?>
   <div class="form-group">
        <select name="gift_id[]"  class="form-control"  required> 
                          <option value=""> Select Your printing type </option>
                         <?php
                         foreach ($res as $row){ 
                            if($row['attributes_group_name'] =='gift printing type'){ 
                             ?>
                          <option value="<?=$row['gift_id']?>"><?=$row['attributes_name']?></option>
                          <?php } } ?>
       </select>
    </div>
<?php } ?>

<?php if (is_in_array($res,'attributes_group_name', 'Phone model')=='yes'){ ?>
   <div class="form-group">
        <select name="gift_id[]"  class="form-control"  required> 
                          <option value=""> Select Your Phone model </option>
                         <?php
                         foreach ($res as $row){ 
                            if($row['attributes_group_name'] =='Phone model'){ 
                             ?>
                          <option value="<?=$row['gift_id']?>"><?=$row['attributes_name']?></option>
                          <?php } } ?>
       </select>
    </div>
<?php } ?>

<?php if (is_in_array($res,'attributes_group_name', 'Style')=='yes'){ ?>
   <div class="form-group">
        <select name="gift_id[]"  class="form-control"  required> 
                          <option value=""> Select Your Style </option>
                         <?php
                         foreach ($res as $row){ 
                            if($row['attributes_group_name'] =='Style'){ 
                             ?>
                          <option value="<?=$row['gift_id']?>"><?=$row['attributes_name']?></option>
                          <?php } } ?>
       </select>
    </div>
<?php } ?>


    