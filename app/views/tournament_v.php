<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"> Manage Tournament </div>

        </div>
        <div class="block-content collapse in" >
            <div class="span12">
                <div class="table-toolbar">
                    <div class="btn-group">

<!-- <form method="post" action="<?php // echo site_url('order/search') ; ?>" >  
   <input type="text"  name="from" class="input-xlarge datepicker" id="date01"  placeholder="Start date" required="">
   <input type="text" name="to"  class="input-xlarge datepicker" id="date01"  placeholder="End date" style="margin-left: 18px;" required="">
<input type="submit"  name="submit" class="btn btn-primary" value="Search" style="margin-top: -8px;margin-left: 10px;">
</form> -->

                    </div>
                    <div class="btn-group pull-right">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <!--                                        <li><a href="#">Print</a></li>-->
                            <li><a href="#" onclick="printDiv('printableArea')">Save as PDF</a></li>
                            <!--                                        <li><a href="javascript:doit()">Save as PDF</a></li>-->
                            <!--                                        <li><a href="<?php //echo site_url('booking/csv') ; ?>">Export to CSV</a></li>-->
                        </ul>
                    </div>
                </div>
                <div id="printableArea">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                        <thead>
                            <tr>
                        <th><center>Tournament Venue</center></th>
                        <th><center>Tournament Date</center></th>
                        <th><center>Award Prize</center></th>
                        <th><center>Tournament image </center></th>
                        <th><center>Action</center></th>

                        </tr>
                        </thead>

                        <?php if ($result) { ?>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($result as $row) {
                                    $i++;
                                    ?>        
        <?php if ($i % 2 == 0) {
            $i = 0;
            $i++; ?> <tr class="even gradeC"> <?php } else { ?>
                                        <tr class="odd gradeX"> <?php } ?>
                                        <td><center><?php echo $row->tournament_venue; ?></center></td>
                                <td><center><?php echo $row->tournament_date; ?></center></td>
                                <td><center><?php echo $row->award_prize; ?></center></td>
                                <td><center><img src="<?php echo base_url() ?>Tournament/<?php echo $row->tournament_id ?>/<?php echo $row->tournament_big_image; ?>" title="edit" height="50" width="100" /></center></td>
                                <td class="center">
                                <center><a href="<?php echo site_url('tournament/edit_tournament/' . $row->tournament_id) ?>"><img src="<?php echo base_url() ?>assets/images/edit-icon.png" title="edit" /></a>
                                    <a href="<?php echo site_url('tournament/delete_tournament/' . $row->tournament_id) ?>"><img src="<?php echo base_url() ?>assets/images/delete-icon.png" title="Delete" onclick="return confirm('Are  you sure you want to delete this ')"/> </a>
                                </center>    
                                </td>   
                                </tr>

    <?php }
} else { ?>
                            <tbody> 

                                <tr class="even gradeC">
                            
                            <td><center><?php echo "No record Found"; ?></center></td>
                            <td><center><?php echo "No record Found"; ?></center></td>  
                            <td><center><?php echo "No record Found"; ?></center></td>
                            <td><center><?php echo "No record Found"; ?></center></td>
                            <td><center><?php echo "No record Found"; ?></center></td>

                            </tr>  
<?php } ?>

                        </tbody>   
                    </table>
                </div>   

            </div>
        </div>
    </div>

    <!-- /block -->
</div>                                       
