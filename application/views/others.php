<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="col_full">

            <div class="content_center">
              <h3 class="sub_head"><?=@$others->others_tittle?></h3>
              <img src="<?=base_url()?>others/<?=@$others->others_image?>" alt="" width="500" height="250">

              <hr>
             <?=@$others->others_description?>
            </div>
          </div>
        </div>
      </div>
    </section>
