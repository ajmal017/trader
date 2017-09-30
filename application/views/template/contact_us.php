<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="wrapper">
<?php $this->view('frontend/includes/header'); ?>
<div class="example-animation">
    <div data-lazy-background="<?= imagePath('assets/frontend/images/Contact-us.jpg','',1286,182); ?>">
      <h3 data-pos="['27%', '110%', '27%', '40%']" data-duration="1500" data-effect="move">Contact Us</h3>
    </div>
  </div>
   <div class="clear"></div>
<div class="contact-sec">
  <div class="container">
    <div class="text">
      <p class="email">E-mail : <a href="mailto:" class="hvr-underline-from-center">info@onlinetradinginstitute.in</a></p>
      <p class="phone">Phone Number : <a href="tel:" class="hvr-underline-from-center">9970236208</a></p>
      
    </div>
  </div>

</div>
<div class="form-sec">
  <div class="container">
    <h3>GET IN TOUCH</h3>
    <form action="" method="get">
      <ul class="reset">
        <li>
          <input type="text" placeholder="Name" class="name" ng-model="contact_name">
        </li>
        <li>
          <input type="text" placeholder="Email" class="name" ng-model="contact_email">
        </li>
        <li>
          <input type="text" placeholder="Mobile" class="name" ng-model="contact_mobile">
        </li>
        <li>
          <textarea cols="" rows="" placeholder="Enquiry" class="textarea" ng-model="contact_enquiry"></textarea>
        </li>
        <li>
          <input name="Submit" type="button" class="btn" value="Submit" ng-click="save_contact()">
        </li>
      </ul>
      <div class="clear"></div>
    </form>
  </div>
</div>
<?php $this->view('frontend/includes/footer'); ?>
