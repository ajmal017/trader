<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="wrapper">
  <?php $this->view('frontend/includes/header'); ?>
	  <?php $this->view('frontend/banner'); ?>
  
  <div class="clear"></div>
  <div class="content">
    <?php /*?>
    <div class="text-sec">
      <div class="container">
        <h3>ONLINE INVEST CLUB MEMBERS</h3>
        <img src="<?= base_url(); ?>assets/frontend/images/member.jpg">
      </div>
    </div><?php */ ?>
    <div class="join-us">
      <div class="container"> <a href="<?= site_url(); ?>/register">Join Us</a> </div>
    </div>
    <div class="video-sec">
      <div class="container">
        <h3>Watch our Video</h3>
        <ul class="reset">
          <li style="margin-top: 0px;">
            <h4>How to login onlinetradinginstitute.in</h4>
            <iframe src="https://www.youtube.com/embed/AWBECDZhTL0" frameborder="0" allowfullscreen></iframe>
          </li>
          <li style="margin-top: 0px;">
            <h4>Trader Calculation</h4>
            <iframe src="https://www.youtube.com/embed/Ybt9ScBSHss" frameborder="0" allowfullscreen></iframe>
          </li>
        </ul>
      </div>
    </div>
    <div class="our-products">
      <div class="container">
        <h3>Our Products</h3>
        <ul class="reset">
          <?php $package_list = getPackages(); ?>
          <?php foreach($package_list as $row) { ?>
          <li>
            <h4>
              <?= $row['package_name']; ?>
            </h4>
            <img src="<?= base_url(); ?>uploads/packages/<?= $row['package_image']; ?>" style="width:138px;height:127px;"> <span>
            <?= substr(trim(strip_tags($row['package_desc'])), 0, 140); ?>...
            </span> <a href="<?= site_url(); ?>/home/view_package/<?= $row['package_id']; ?>" class="hvr-rectangle-out">Read More</a> </li>
          <?php } ?>
        </ul>
        <div class="clear"></div>
      </div>
    </div>
    <!--<h3>Our Partners</h3>
    <div class="btm_sec">
    	<div class="container">
          <ul class="reset">
            	<li><img src="<?= base_url(); ?>assets/frontend/images/binary.png"/><span>Binary.com </span></li>
                <li><img src="<?= base_url(); ?>assets/frontend/images/Z_logo.svg"/><span>Zerodha</span></li>
            </ul>
           <div class="clear"></div>
    	</div>
    </div>-->
  </div>
  <div class="bg-sec">
    <div class="form_sec">
      <div class="container">
        <h3>GET IN TOUCH</h3>
        <form action="" method="get">
          <ul class="reset">
            <li>
              <input type="text" value="" placeholder="Name" class="name" ng-model="contact_name"/>
            </li>
            <li>
              <input type="text" value="" placeholder="Email" class="name" ng-model="contact_email"/>
            </li>
            <li>
              <input type="text" value="" placeholder="Mobile" class="name" ng-model="contact_mobile"/>
            </li>
            <li>
              <textarea cols="" rows="" placeholder="Enquiry" class="textarea" ng-model="contact_enquiry"></textarea>
            </li>
            <li>
              <input name="Submit" type="button" class="btn" ng-click="save_contact()" value="Submit"/>
            </li>
          </ul>
          <div class="clear"></div>
        </form>
      </div>
    </div>
  </div>
  <?php $this->view('frontend/includes/footer'); ?>
</div>
</div>
</body></html>