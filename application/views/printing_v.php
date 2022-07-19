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
<!--                    <form class="default-form"   id="form_id" method="post" enctype="multipart/form-data">-->

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
                            <img id="blah" src="#" alt="your image" style="width: 500px;height: 250px;display:none" />
                            <span class="help-block"></span>
                            <small>Please upload image in 500px X 250px (jpg or jpeg) dimension for optimal view</small>
                        </div>



                        <div class="form-group">
                            <input type="number"  name="qty" class="form-control" id="qty" placeholder="Enter Qantity">
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
                            <select id="branch_id" name="branch_id" class="form-control">
                                <option value=""> Select Your Pickup Branch </option>
                                <?php foreach ($branch as $row){ ?>
                                    <option value="<?=$row->branch_id?>"><?=$row->branch_name?></option>
                                <?php } ?>
                            </select>
                            <small>The order will be ready in branch after 12-24 hours</small>
                        </div>


<!--                        <div class="form-group">-->
<!---->
<!--                            <label><input type="radio" name="payment_option"  value="knet" /> K NET</label>&nbsp;-->
<!--                            <label><input type="radio" name="payment_option"  value="MiGS" /> VISA/MASTER CARD </label>-->
<!---->
<!--                        </div>-->

                        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>

<!--                        <a class="btn btn-primary btn-block"onmousedown="ahrefsend();" href="--><?//=site_url('printing')?><!--" onclick="this.href = url">Add to Cart</a>-->
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!--<script type="text/javascript">-->
<!--    var imgGet = "";-->
<!--    function ahrefsend(){-->
<!--        // --javascript array code inserted here---->
<!--        var e = document.getElementById("print_type_id");-->
<!--        var print_type_id = e.options[e.selectedIndex].value;-->
<!---->
<!--        var f = document.getElementById("classes_name");-->
<!--        var printing_id = f.options[f.selectedIndex].value;-->
<!---->
<!--        var qty = document.getElementById("qty").value;-->
<!--        // var qty = g.options[g.selectedIndex].value;-->
<!---->
<!--        // var imgInp =  console.log(this.files[0].mozFullPath);-->
<!--        // alert(imgInp);-->
<!--        // var imgInp = h.options[h.selectedIndex].value;-->
<!---->
<!--        var i = document.getElementById("type");-->
<!--        var type = i.options[i.selectedIndex].value;-->
<!---->
<!--        // var j = document.getElementById("type");-->
<!--        // var type = j.options[j.selectedIndex].value;-->
<!---->
<!--        //url = --><?////=site_url('printing/addToCart&id=')?><!--//// +  print_type_id-->
<!--//        url = 'printing/addToCart/' +  print_type_id + '/' + printing_id + '/' + qty + '/' + type + '/' + imgGet-->
<!--//    }-->

</script>


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

        $("#imgInp").change(function(event) {
            readURL(this);
            // $('#imgInp').change( function(event) {
            //     var tmppath = URL.createObjectURL(event.target.files[0]);
            //     imgGet = URL.createObjectURL(event.target.files[0]);
            // });
            imgGet  = URL.createObjectURL(event.target.files[0]);


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

