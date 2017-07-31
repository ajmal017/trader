<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="wrapper">
  <?php $this->view('frontend/includes/header'); ?>
   <div class="example-animation">
    <div data-lazy-background="<?= base_url(); ?>assets/frontend/images/inner-bnr.jpg">
      <h3 data-pos="['27%', '110%', '27%', '40%']" data-duration="1500" data-effect="move">FAQs</h3>
    </div>
  </div>
  <div class="textsec">
    <div class="container">
      <div class="attorny-sec  first-class">
        <div class="container">
          <div class="ques-1">
            <h4><span>Q1.</span> What is online trading institute ? </h4>
            <p><span>Ans:</span> Online trading institute is an start up plateform covering a financial topics including stock investment to trading and more. Developed by fiinance experts is highly structured and easy to understand way so maximum people get financial freedom.</p>
          </div>
          <div class="ques-1">
            <h4><span>Q2.</span> How I login website ? </h4>
            <p><span>Ans:</span> Go to <a href="<?= site_url(); ?>/register">REGISTER</a>. Fill all details.After registration email verification link is send to your email ID. Click on verfication link given in your email ID.Registartion Completed</p>
          </div>
          <div class="ques-1">
            <h4><span>Q3.</span> What income am I eligible to qualify for after joining the online trading institute ? </h4>
            <p><span>Ans:</span> There are two types of income that the online trading institute give to its members.
            </br>a)  Binary (Matching Income)</br>b)  Direct Sales Income</p>
          </div>
          <div class="ques-1">
            <h4><span>Q4.</span> How can I obtain a online trading institute certificate ? </h4>
            <p><span>Ans:</span> You have to successfully complete all chapters in your online trading institute (given your package) in order to obtain a certificate. After you successfully pass a result page is generated that contains your certificate. You can download your certificate.</p>
          </div>

          <div class="ques-1">
            <h4><span>Q5.</span> I have registered myself for a free package but I have not paid anything yet. When do I have to pay in order not to lose my position ? </h4>
            <p><span>Ans:</span> There is no particular time period which you are obliged to pay. If you only have a free package, please note that you cannot take full advantage of online trading institue. Please note that it is highly recommended  to initiate your payment as soon as possible to gain access to products and since unused accounts are deleted on regular basis.</p>
          </div>
          <div class="ques-1">
            <h4><span>Q6.</span> What is kyc ? </h4>
            <p><span>Ans:</span> The kyc means know your customer. The kyc policy adopted by online trading institute includes identifying the user & verifying the identity by examing reliable and independent documents. The kyc information requested includes name, residentential address and date of birth, country, and bank details like account number, branch, ifsc code etc.</p>
          </div>
          <div class="clear"></div>
        </div>
      </div>
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