<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Trading Institute</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?= base_url(); ?>assets/frontend/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/frontend/css/print.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/frontend/css/responsive.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
<script src="<?= base_url(); ?>assets/frontend/js/jquery-1.11.0.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery-ui.css">
<script src="<?= base_url(); ?>assets/js/angular.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/assets/plugins/bootbox/bootbox.js"></script>
<script src="<?php echo base_url(); ?>assets/js/libs/functions.js"></script>

<script type="text/javascript">
        window._site_url = '<?php echo site_url(); ?>/';
</script>
</head>
<body ng-app="MyApp" ng-controller="MyController">
<div id="wrapper">
  <div class="nav-sec">
    <?php $controller_name = $this->uri->segment(1); ?>
    <ul>
      <?php $username = $session_data['logged_in']['username']; 
      $user_info = getUserInfo(0,$username);
      $profile_image = $user_info['profile_image'] != '' ? $user_info['profile_image'] : 'person.png';
      ?>
      <li><a href="<?= site_url(); ?>profile"><span><img src="<?= imagePath($profile_image,'profile',57,54); ?>" /></span><?= $username; ?></a>
        <div class="clear"></div>
      </li>
      <?php /*?><li><a href="<?= site_url(); ?>/dashboard" <?php if(isset($controller_name) && $controller_name == 'dashboard'){ echo 'class="active"'; } ?>><span><img src="<?= base_url(); ?>assets/frontend/images/dashbord.png" /></span>Dashbord</a></li><?php */ ?>
      <li><a href="<?= site_url(); ?>profile" <?php if(isset($controller_name) && $controller_name == 'profile'){ echo 'class="active"'; } ?> ><span><img src="<?= base_url(); ?>assets/frontend/images/my-profile.png" /></span>My Profile</a></li>
      <li><a href="<?= site_url(); ?>packages" <?php if(isset($controller_name) && $controller_name == 'packages'){ echo 'class="active"'; } ?>><span><img src="<?= base_url(); ?>assets/frontend/images/network-img.png" /></span>My Packages</a></li>
      <li><a href="<?= site_url(); ?>/myteam" <?php if(isset($controller_name) && $controller_name == 'myteam'){ echo 'class="active"'; } ?> ><span><img src="<?= base_url(); ?>assets/frontend/images/network-img.png" /></span>My Team</a></li>
      <li><a href="<?= site_url(); ?>news" <?php if(isset($controller_name) && $controller_name == 'news'){ echo 'class="active"'; } ?>><span><img src="<?= base_url(); ?>assets/frontend/images/news-img.png" /></span>News</a></li>
      <li><a href="<?= site_url(); ?>bonus" <?php if(isset($controller_name) && $controller_name == 'bonus'){ echo 'class="active"'; } ?>><span><img src="<?= base_url(); ?>assets/frontend/images/bonus-img.png" /></span>Bonus</a></li>
    </ul>
  </div>
  <div id="content">
    <div class="content">
    <div class="logout-sec">
    <a href="<?= site_url(); ?>logout" class="log-out">Log Out</a>
    <?php $role_id = $session_data['logged_in']['role_id']; 
    if($role_id == 1)
    {
    ?>
    <a href="<?= site_url(); ?>admin_home" class="log-out" target="_blank_">Admin</a>
    <?php } ?>
     <div class="clear"></div>
     </div>
      <div class="bnr"> 
        <div class="bnrcap">
          <div class="logo"> <a href="#"><img src="<?= base_url(); ?>assets/frontend/images/logo.png" /></a> </div>
          <div class="page-name">
            <h3>My Profile</h3>
          </div>
        </div>
      </div>
    </div>
    <?php 
    $packages = getUserPackages($session_data['logged_in']['userid']);
    $pack = array();
    foreach($packages as $row)
    {
      $pack[] = $row['package_id'];
    }
    ?>
    <?php $notification_list = getNotifications(0,$pack); ?>
    <?php if(count($notification_list) > 0){ ?>
      <marquee direction="left" behavior="right" class="marquee">
          <span>
              <?php foreach ($notification_list as $row) { ?>
                  <?= $row['notification'];?> |    
              <?php } ?>
          </span>
      </marquee>
    <?php } ?>
    
</marquee>



<div id="error_log" class="modal fade" tabindex=-1 role="dialog" style="margin-top:30px;">
    <div class="modal-dialog modal-md" style="float:none;margin:auto;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-danger" style="background:rgba(255, 0, 0, 0.62)">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error Log</h4>
            </div>
            <div class="modal-body" style="overflow:auto;width:100%">
                <center layout="column">
                    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
                        <ul id="error_log_text" style="color:red;">
                        </ul>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>