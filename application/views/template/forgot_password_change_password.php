<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="wrapper">
<script>
window._forgot_password_token = '<?= $forgot_password_token; ?>';
</script>
<?php $this->view('frontend/includes/header'); ?>
  
<div id="register">
  <div class="container">
    <div class="register">
      <h3>Change Password</h3>
      <form class="cd-form">
        <ul class="reset">
          <li>
            <label class="image-replace cd-email" for="signup-email">New Password</label>
            <input class="full-width has-padding has-border" id="signup-email" type="password" placeholder="New Password" ng-model="new_password">
          </li>
          <li>
            <label class="image-replace cd-email" for="signup-email">Re-enter Password</label>
            <input class="full-width has-padding has-border" id="signup-email" type="password" placeholder="Re-enter Password" ng-model="reenter_password">
          </li>
          <li>
            <input class="full-width has-padding submit" type="button" value="Submit" ng-click="change_password()">
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