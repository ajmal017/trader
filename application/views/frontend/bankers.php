<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="wrapper">
  <?php $this->view('frontend/includes/header'); ?>
   <div class="example-animation">
    <div data-lazy-background="<?= base_url(); ?>assets/frontend/images/inner-bnr.jpg">
      <h3 data-pos="['27%', '110%', '27%', '40%']" data-duration="1500" data-effect="move">Bankers</h3>
    </div>
  </div>
  <div class="clear"></div>
  <div class="textsec">
    <div class="container bank-details bank_details">
       
      <div class="lf">
        <h2>Bank Details</h2>
        <ul class="reset">
          <li>Account Name : <span>Online Trading Institute</span></li>
          <li>Bank Name : <span>Kotak Bank</span></li>
          <li>Branch Name : <span>Manickpur Branch</span></li>
          <li>Account Number : <span>2012208108</span></li>
          <li>IFSC : <span>KKBK0000659</span></li>
        </ul>
      </div>
      
      <div class="rf">
      <h2>Paytm</h2>
      <img src="<?= base_url(); ?>assets/frontend/images/Paytm-Logo.png" />
      <br />
      <img src="<?= base_url(); ?>assets/frontend/images/barcode.png" class="nth-child"/>
      <p>42153865</p>
      </div>
      <div class="clear"></div>
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