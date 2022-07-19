<?php


function fill_unit_select_box($status)
{
 $output = '';
 foreach($status as $row)
 {
    $output .='<option value="'.$row->order_status_id.'">'.$row->order_status.'</option>'; 
 }
 return $output;
}
?>




<!--<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
         START DATATABLE EXPORT 
        
        <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('order/new_order') ?>" method="post">
                    
            <div class="panel panel-default">
               
                  
                <div class="panel-body">
                    
                    
               
                    
                    

                    
                    

                   
                    
                   <div class="col-md-12">
                    
                       
                    <br><br><br> 
                    <h3 class="panel-title">CART DETAILS</h3>&nbsp;
                    <br><br>
                    
                     

    <table class="table" id="item_table">
        
      <thead>
        
      <tr>
       <th> status</th>
    <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
      
     </thead>
          
     <tbody>
         
     </tbody>     
         
     <tfoot>
      <th></th>
    
     </tfoot>    
      
        
    </tbody>      
    </table>
                    
                    
                          
                  
                        </div>
                    
                    

                </div>
                
           
                
                
            </div>
            
           </form>

        </div>
    </div>

</div>
      
      






<script>
    
// jQuery(window).on("load",".select", function(){
//        
//    console.log(this);
//        
//      $($(this)).selectpicker();
//});
    
$(document).ready(function(){
  
// $("body").on("focus", ".select", function () {
//     
//                        $($(this)).selectpicker();
//                    });  
                    
                    
                    
window.addEventListener('load', function () {
 $(".select").selectpicker();
}, false);
  
    
 var i = 0;   

 $(document).on('click', '.add', function(){ 
  i++;  
  var html = '';
  html += '<tr>';
  html += '<td><select name="item_name[]" class="form-control select" id="item_name'+i+'"  data-live-search="true"><option value="">Select Type</option><?php echo fill_unit_select_box($status); ?></select></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>'; 
  $('#item_table').append(html);
  

 
 });
 

 //$('#item_name1')[0].onclick();
 
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
             
  
 });
 
 
       
        });

</script>-->

<input type="text" data-language="en" class="datepicker-here">
            

