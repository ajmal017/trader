<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Online Trading Institute</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url(); ?>assets/template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url(); ?>assets/template/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url(); ?>assets/template/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?= base_url(); ?>assets/template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url(); ?>assets/template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    
    <!-- Custom Css -->
    <link href="<?= base_url(); ?>assets/template/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url(); ?>assets/template/css/themes/all-themes.css" rel="stylesheet" />

    <!-- Jquery Core Js -->
    <script src="<?= base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/angular.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/libs/functions.js"></script>
</head>
<script type="text/javascript">
        window._site_url = '<?php echo site_url(); ?>';
</script>
<body class="theme-red" ng-app="MyApp" ng-controller="MyController">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">ONLINE TRADING INSTITUTE</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <?php 
        $controller_name = $this->uri->segment(1);
        $function_name = $this->uri->segment(2);
        $username = $session_data['logged_in']['username']; 
        $role_id = $session_data['logged_in']['role_id'];
        $user_info = getUserInfo(0,$username);
        $name = $user_info['firstname']." ".$user_info['lastname'];
        $email = $user_info['email'];
        $profile_image = $user_info['profile_image'] != '' ? $user_info['profile_image'] : 'person.png';
        ?>
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= imagePath($profile_image,'profile',48,48); ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $name; ?></div>
                    <div class="email"><?= $email;?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!--<li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li role="seperator" class="divider"></li>-->
                            <li><a href="<?= site_url(); ?>logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if(isset($controller_name) && $controller_name == 'dashboard'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo site_url(); ?>dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li <?php if(isset($controller_name) && $controller_name == 'profile'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo site_url(); ?>profile">
                            <i class="material-icons">face</i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li <?php if(isset($controller_name) && $controller_name == 'packages'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo site_url(); ?>packages">
                            <i class="material-icons">card_giftcard</i>
                            <span>Packages</span>
                        </a>
                    </li>
                    <li <?php if(isset($controller_name) && $controller_name == 'myteam'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo site_url(); ?>myteam">
                            <i class="material-icons">group_work</i>
                            <span>My Team</span>
                        </a>
                    </li>
                    <!--<li <?php if(isset($controller_name) && $controller_name == 'bonus'){ echo 'class="active"'; } ?>>
                        <a href="<?php echo site_url(); ?>bonus">
                            <i class="material-icons">stars</i>
                            <span>Bonus</span>
                        </a>
                    </li>-->
                    <li <?php if(isset($controller_name) && $controller_name == 'payment_details'){ echo 'class="active"'; } ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">stars</i>
                            <span>Payment Details</span>
                        </a>
                        <ul class="ml-menu">
                            <!--<li <?php if(isset($controller_name) && $controller_name == 'payment_details' && $function_name == ''){ echo 'class="active"'; } ?>>
                                <a href="<?php echo site_url(); ?>payment_details">
                                    <span>Payment dashboard</span>
                                </a>
                            </li>-->
                            <li <?php if(isset($controller_name) && $controller_name == 'payment_details' && isset($function_name) && $function_name == 'roi'){ echo 'class="active"'; } ?>>
                                <a href="<?php echo site_url(); ?>payment_details/roi">
                                    <span>Return of interest</span>
                                </a>
                            </li>
                            <li <?php if(isset($controller_name) && $controller_name == 'payment_details' && isset($function_name) && $function_name == 'loyality_income'){ echo 'class="active"'; } ?>>
                                <a href="<?php echo site_url(); ?>payment_details/loyality_income">
                                    <span>Loyality Income</span>
                                </a>
                            </li>
                            <li <?php if(isset($controller_name) && $controller_name == 'payment_details' && isset($function_name) && $function_name == 'referral_income'){ echo 'class="active"'; } ?>>
                                <a href="<?php echo site_url(); ?>payment_details/referral_income">
                                    <span>Referral Income</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php if($role_id == 1){ ?>
                    <li <?php if(isset($controller_name) && in_array($controller_name,array('admin_packages','admin_users','admin_notifications','admin_news','admin_user_packages','admin_user_payment_details','admin_payout'))){ echo 'class="active"'; } ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>Admin</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Masters</span>
                                </a>
                            <ul class="ml-menu">
                                <li <?php if(isset($controller_name) && $controller_name == 'admin_packages'){ echo 'class="active"'; } ?>>
                                    <a href="<?php echo site_url(); ?>admin_packages" <?php if(isset($controller_name) && $controller_name == 'admin_packages'){ echo 'class="toggled waves-effect waves-block"'; } ?>>
                                        <span>Packages Master</span>
                                    </a>
                                </li>
                                <li <?php if(isset($controller_name) && $controller_name == 'admin_notifications'){ echo 'class="active"'; } ?>>
                                    <a href="<?php echo site_url(); ?>admin_notifications" <?php if(isset($controller_name) && $controller_name == 'admin_notifications'){ echo 'class="toggled waves-effect waves-block"'; } ?>>
                                        <span>Notification Master</span>
                                    </a>
                                </li>
                                <li <?php if(isset($controller_name) && $controller_name == 'admin_news'){ echo 'class="active"'; } ?>>
                                    <a href="<?php echo site_url(); ?>admin_news" <?php if(isset($controller_name) && $controller_name == 'admin_news'){ echo 'class="toggled waves-effect waves-block"'; } ?>>
                                        <span>News Master</span>
                                    </a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Users</span>
                                </a>
                                <ul class="ml-menu">
                                    <li <?php if(isset($controller_name) && $controller_name == 'admin_users'){ echo 'class="active"'; } ?>>
                                        <a href="<?php echo site_url(); ?>admin_users" <?php if(isset($controller_name) && $controller_name == 'admin_users'){ echo 'class="toggled waves-effect waves-block"'; } ?>>
                                            <span>User Master</span>
                                        </a>
                                    </li>
                                    <li <?php if(isset($controller_name) && $controller_name == 'admin_user_packages'){ echo 'class="active"'; } ?>>
                                        <a href="<?php echo site_url(); ?>admin_user_packages" <?php if(isset($controller_name) && $controller_name == 'admin_user_packages'){ echo 'class="toggled waves-effect waves-block"'; } ?>>
                                            <span>User Packages Request</span>
                                        </a>
                                    </li>
                                    <li <?php if(isset($controller_name) && $controller_name == 'admin_user_packages'){ echo 'class="active"'; } ?>>
                                        <a href="<?php echo site_url(); ?>admin_user_packages/view_user_package_list" <?php if(isset($controller_name) && $controller_name == 'admin_user_packages'){ echo 'class="toggled waves-effect waves-block"'; } ?>>
                                            <span>User Packages Accepted Requests</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Payment Details</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="<?php echo site_url(); ?>admin_payout">
                                            <span>Payout</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url(); ?>admin_user_payment_details">
                                            <span>Payment dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url(); ?>admin_user_payment_details/roi">
                                            <span>Return of interest payouts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url(); ?>admin_user_payment_details/loyality_income">
                                            <span>Loyality income payouts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url(); ?>admin_user_payment_details/referral_income">
                                            <span>Referral income payouts</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    
                    
                    <!--<li>
                        <a href="../changelogs.html">
                            <i class="material-icons">update</i>
                            <span>Changelogs</span>
                        </a>
                    </li>-->
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>