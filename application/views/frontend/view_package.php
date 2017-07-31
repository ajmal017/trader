<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="wrapper">
  <?php $this->view('frontend/includes/header'); ?>
   <div class="example-animation">
    <div data-lazy-background="<?= base_url(); ?>assets/frontend/images/inner-bnr.jpg">
      <h3 data-pos="['27%', '110%', '27%', '40%']" data-duration="1500" data-effect="move">OUR PRODUCTS</h3>
    </div>
  </div>
  <div class="clear"></div>
  <div class="textsec">
    <div class="container product-sec">
    <?php $packages = getPackages($package_id);?>
    <div>
      	<h3><?= $packages['package_name'];?>  (₹ <?= $packages['package_amount'];?>)</h3>
        <img src="<?= base_url(); ?>uploads/packages/<?= $packages['package_image']; ?>" style="width:138px;height:127px;"> 
        <p><?= $packages['package_desc'];?></p>      
    </div>
  </div>
  <?php $this->view('frontend/includes/footer'); ?>
</div>
</div>
<script>
$(document).ready(function(){
  $('.bxslider').bxSlider();
});
</script>
</body></html>