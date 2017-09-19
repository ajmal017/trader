<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="wrapper">
<?php $this->view('frontend/includes/header'); ?>
  
  <div class="clear"></div>

<div id="register">
  <div class="container">
    <div class="register">
      <h3>Forgot Password</h3>
      <form class="cd-form">
        <ul class="reset">
          <li>
            <label class="image-replace cd-email" for="signup-email">E-mail</label>
            <input class="full-width has-padding has-border" id="signup-email" type="text" placeholder="E-mail" ng-model="forgot_email">
          </li>
          <li>
            <input class="full-width has-padding submit" type="button" value="Submit" ng-click="forgot_password()">
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