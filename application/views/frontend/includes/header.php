<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Online Trading Institute</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="<?= base_url(); ?>assets/frontend/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/frontend/css/print.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/frontend/css/responsive.css" rel="stylesheet" type="text/css">
<link href="<?= base_url(); ?>assets/frontend/css/jquery.bxslider.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="<?= base_url(); ?>assets/frontend/js/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/frontend/js/modernizr.js"></script>
<script src="<?= base_url(); ?>assets/frontend/js/jquery.bxslider.js"></script>
<script src="<?= base_url(); ?>assets/frontend/js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/libs/functions.js"></script>
<script src="<?= base_url(); ?>assets/admin/assets/plugins/bootbox/bootbox.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/libs/header.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.devrama.slider-0.9.4.js"></script>
<script type="text/javascript">
        window._site_url = '<?php echo site_url(); ?>/';
</script>
<script type="text/javascript">
            $(document).ready(function(){
                $('.example-animation').DrSlider(); //Yes! that's it!
            });
        </script>
</head>
<body ng-app="MyApp" ng-controller="MyController">
<div class="admin-sec">
  <div class="container">
    <div class="logo-section"> <a href="#"><img src="<?= base_url(); ?>assets/frontend/images/logo.png"> </a> </div>
    <div id="nav">
      <div class="nav">
        <ul>
          <li><a href="<?php echo site_url(); ?>" class="hvr-rectangle-out">Home</a></li>
          <li><a href="<?php echo site_url(); ?>business_plan" class="hvr-rectangle-out">Business Plan</a></li>
          <li class="dropdown">
              <button class="dropbtn hvr-rectangle-out">Trading</button>
              <ul class="dropdown-content">
                  <a href="<?php echo site_url(); ?>algo_trade">Algo Trade</a>
                  <a data-toggle="modal" data-target="#zerodha_modal">Zerodha</a>
                  <!--<a href="http://record.binary.com/_eS213wp_cXxTD9wuhZQfkmNd7ZgqdRLk/1/" target="_blank_">Option Trading</a>-->
              </ul>
           </li>
          <li><a href="<?php echo site_url(); ?>about_us" class="hvr-rectangle-out">About Us</a></li>
          <li><a href="<?php echo site_url(); ?>testimonials" class="hvr-rectangle-out">Testimonials</a></li>
          <li><a href="<?php echo site_url(); ?>legal" class="hvr-rectangle-out">Legal</a></li>
          <li><a href="<?php echo site_url(); ?>bankers" class="hvr-rectangle-out">Bankers</a></li>
          <li><a href="<?php echo site_url(); ?>faqs" class="hvr-rectangle-out">FAQ's</a></li>
          <li><a href="<?php echo site_url(); ?>contact_us" class="hvr-rectangle-out">Contact Us</a></li>
          </ul>
        <div class="clear"></div>
      </div>
    </div>
    <nav class="main-nav">
      <ul>
        <!-- inser more links here -->
        <?php if(isset($session_data['logged_in']['userid'])){ ?>
        <li><a href="<?php echo site_url(); ?>profile">Profile</a></li>
        <li><a href="<?php echo site_url(); ?>logout">Logout</a></li>
        <?php }else{ ?>
        <li><a data-toggle="modal" data-target="#login_modal">Login</a></li>
        <li><a class="cd-signup" href="<?php echo site_url(); ?>register">Register</a></li>
        <?php } ?>
      </ul>
    </nav>
    <div class="cd-user-modal">
      <!-- this is the entire modal form, including the background -->
      <div class="cd-user-modal-container">
        <!-- this is the container wrapper -->
        <div id="cd-login">
          <!-- log in form -->
          <form class="cd-form">
            <p class="fieldset">
              <label class="image-replace cd-email" for="signin-username">Username</label>
              <input class="full-width has-padding has-border" ng-model="username" type="text" placeholder="Username">
              <span class="cd-error-message" id="username-error"></span> </p>
            <p class="fieldset">
              <label class="image-replace cd-password" for="signin-password">Password</label>
              <input class="full-width has-padding has-border" ng-model="password" type="password"  placeholder="Password">
              <a href="#0" class="hide-password">Hide</a> <span class="cd-error-message" id="password-error"></span> </p>
            <!--<p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">Remember me</label>
					</p>-->
            <p class="fieldset">
              <input class="full-width has-padding" type="button" value="Login" ng-click="login()">
            </p>
          </form>
          <p class="cd-form-bottom-message"><a href="<?= site_url(); ?>login/forgot_password">Forgot your password?</a></p>
          <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div>
        <!-- cd-login -->
        <div id="cd-signup">
          <!-- sign up form -->
          <form class="cd-form">
            <p class="fieldset">
              <label class="image-replace cd-username" for="signup-username">Username</label>
              <input class="full-width has-padding has-border" ng-model="r_username" type="text" placeholder="Username">
              <span class="cd-error-message" id="r_username-error"></span> </p>
            <p class="fieldset">
              <label class="image-replace cd-email" for="signup-email">E-mail</label>
              <input class="full-width has-padding has-border" ng-model="r_email" type="text" placeholder="E-mail">
              <span class="cd-error-message" id="r_email-error"></span> </p>
            <p class="fieldset">
              <label class="image-replace cd-password" for="signup-password">Password</label>
              <input class="full-width has-padding has-border" ng-model="r_password" type="password"  placeholder="Password">
              <a href="#0" class="hide-password">Hide</a> <span class="cd-error-message" id="r_password-error"></span> </p>
            <p class="fieldset">
              <label class="image-replace cd-password" for="signup-password">Re-enter Password</label>
              <input class="full-width has-padding has-border" ng-model="r_password1" type="password"  placeholder="Password">
              <a href="#0" class="hide-password">Hide</a> <span class="cd-error-message"></span> </p>
            <!--<p class="fieldset">
						<input type="checkbox" id="accept-terms">
						<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
					</p>-->
            <p class="fieldset">
              <input class="full-width has-padding" type="button" value="Create account" ng-click="register('<?php echo @$sponserUsername; ?>')">
            </p>
          </form>
          <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div>
        <!-- cd-signup -->
        <div id="cd-reset-password">
          <!-- reset password form -->
          <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
          <form class="cd-form">
            <p class="fieldset">
              <label class="image-replace cd-email" for="reset-email">E-mail</label>
              <input class="full-width has-padding has-border" id="reset-email" type="text" ng-model="forgot_email" placeholder="E-mail">
              <span class="cd-error-message">Error message here!</span> </p>
            <p class="fieldset">
              <input class="full-width has-padding" type="button" value="Reset password" ng-click="forgot_password()">
            </p>
          </form>
          <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
        </div>
        <!-- cd-reset-password -->
        <a href="#0" class="cd-close-form">Close</a> </div>
      <!-- cd-user-modal-container -->
    </div>
  </div>
</div>
<div class="clear"></div>


<!-- Modal -->
<div class="modal fade" id="zerodha_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Zerodha</h4>
            </div>
                <div class="modal-body" style="overflow:auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label>Name : </label>
                            <input type="text" class="form-control" ng-model="zerodha_name" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone : </label>
                            <input type="text" class="form-control" ng-model="zerodha_phone" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email : </label>
                            <input type="text" class="form-control" ng-model="zerodha_email" />
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-click="zerodha_lead()">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </div>    
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="otp_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Verification</h4>
            </div>
                <div class="modal-body" style="overflow:auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-6" style="display:none;">
                            <label>Username : </label>
                            <input type="text" class="form-control" ng-model="r_username" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>OTP : </label>
                            <input type="text" class="form-control" ng-model="otp" />
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-click="check_otp()">Check OTP</button>
                <button type="button" class="btn btn-success" ng-click="resend_otp()">Resend OTP</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>
        </div>    
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="login_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Login</h4>
            </div>
                <div class="modal-body" style="overflow:auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label>Username : </label>
                            <input type="text" class="form-control" ng-model="login_username" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password : </label>
                            <input type="password" class="form-control" ng-model="login_password" />
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                <p class="cd-form-bottom-message"><a data-toggle="modal" data-target="#forgot_password_modal" onClick="$('#login_modal').modal('hide');">Forgot your password?</a></p>
                <button type="button" class="btn btn-primary" ng-click="login()">Login</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </div>    
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="forgot_password_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Forgot Password</h4>
            </div>
                <div class="modal-body" style="overflow:auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-8">
                            <label>Username : </label>
                            <input type="text" class="form-control" ng-model="forgot_username" />
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                <p class="cd-form-bottom-message"><a data-toggle="modal" data-target="#login_modal" onClick="$('#forgot_password_modal').modal('hide');">Login</a></p>
                <button type="button" class="btn btn-primary" ng-click="forgot_password()">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </div>    
    </div>
</div>