<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        

            <div class="block">
                <h4>ADD ACTIVITIES</h4>
                
                <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('order/add_activity/'.$order_id) ?>" method="post" enctype="multipart/form-data">

                    <div class="panel-body">
                        
                        
                        <div class="form-group">
                            
                           <label class="col-md-3 control-label"></label>
                            <div class="col-md-2">                                    
            <label class="check"><input type="checkbox" name="activities[]" value="1" class="icheckbox"/>SMS</label>
                            </div>
                            <div class="col-md-4">                                    
            <label class="check"><input type="checkbox" name="activities[]" value="2" class="icheckbox"/>Notifications</label>
                            </div>
                            <div class="col-md-3">                                    
            <label class="check"><input type="checkbox" name="activities[]" value="3 " class="icheckbox"/>Email</label>
                            </div>
                        </div>




                        <div class="form-group">
                            <label class="col-md-3 control-label">Template:</label>
                            <div class="col-md-9">                                                                            
         <select  class="form-control select" name="template_id" id="template_id" data-live-search="true">
                                    <?php foreach ($result as $row): ?>
                                        <option value="<?= $row->template_id ?>"><?= $row->template_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>  



                        <div class="form-group">
                            <label class="col-md-3 control-label">Message:</label>  
                            <div class="col-md-9">
                                <textarea class="form-control" name="message"  cols="5" id="message" required></textarea>
                            </div>
                        </div>



                        <div class="btn-group pull-right">
                            <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                        </div>                                                                                       
                    </div>                                               
                </form>
            </div>
        </div>
    </div>            
</div>


<script type="text/javascript">
    $(document).ready(function ()
    {
        
        function getAll(){
        
            var e = document.getElementById("template_id");
            var template_id = e.options[e.selectedIndex].value;


            $.ajax
                    ({type: "POST",
                        url: '<?= site_url('order/get_templates') ?>',
                        data: {template_ids: template_id},
                        cache: false,
                        success: function (r)
                        {
                            
                         var json = $.parseJSON(r); 
                            $("#message").val(json.template_message);   
                    
                        }
                    });
        }
        getAll();

        $("#template_id").change(function ()
        {
          getAll();
        })
    });
</script>