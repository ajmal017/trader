<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="wrapper">
<?php $this->view('frontend/includes/header'); ?>
<?php /*?><?php $this->view('frontend/banner'); ?><?php */?>
  <div class="clear"></div>

<div id="register">
  <div class="container">
    <div class="register" id="registration_step1">
      <h3>Register Your Account</h3>
      <form class="cd-form">
        <ul class="reset">
          <li>
            <label class="image-replace cd-username" for="signup-username">Username</label>
            <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username" ng-model="r_username">
          </li>
          <li>
            <label class="image-replace cd-email" for="signup-email">E-mail</label>
            <input class="full-width has-padding has-border" id="signup-email" type="text" placeholder="E-mail" ng-model="r_email">
          </li>
          <li>
            <label class="image-replace cd-email" for="signup-mobile">Mobile</label>
            <input class="full-width has-padding has-border" id="signup-mobile" type="text" placeholder="Mobile" ng-model="r_mobile">
          </li>
          <li>
            <label class="image-replace cd-password" for="signup-password">Password</label>
            <input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Password" ng-model="r_password">
          </li>
          <li>
            <label class="image-replace cd-password" for="signup-password">Re Enter Password</label>
            <input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Password" ng-model="r_password1">
          </li>
          <li>
            <input class="full-width has-padding submit" type="button" value="Create account" ng-click="register('<?= $sponserUsername; ?>','<?= $placement; ?>')">
          </li>
        </ul>
      </form>
      <!-- <a href="#0" class="cd-close-form">Close</a> -->
    </div>
    <div class="register" style="display:none;" id="registration_step2">
      <h3>Verification</h3>
      <form class="cd-form">
        <ul class="reset">
          <li>
            <label class="image-replace cd-username" for="signup-username">Enter OTP</label>
            <input class="full-width has-padding has-border" type="text" placeholder="Enter OTP" ng-model="otp">
          </li>
          <li>
            <input class="full-width has-padding submit" type="button" value="Submit" ng-click="check_otp()">
            <a style="float:right;" href="javascript: void(0);" ng-click="resend_otp()">Resend OTP</a>
          </li>
        </ul>
      </form>
      <!-- <a href="#0" class="cd-close-form">Close</a> -->
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
</body>
</html>