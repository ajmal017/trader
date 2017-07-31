<!doctype html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Online Trading Institute</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!--<link rel="shortcut icon" href="/favicon.ico">-->
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/iriy-admin.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/demo/css/demo.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/font-awesome/css/font-awesome.css">


        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/rickshaw.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/morris.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/jquery-dataTables.min.css">
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootbox/bootbox.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/libs/functions.js"></script>
        <script src=https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js></script>
    </head>
    <script type="text/javascript">
        window._site_url = '<?php echo site_url(); ?>/';
    </script>
    <body class="" ng-app="MyApp" ng-controller="MyController">
        <header>
            <nav class="navbar navbar-default navbar-static-top no-margin" role="navigation">
                <div class="navbar-brand-group">
                    <a class="navbar-sidebar-toggle navbar-link" data-sidebar-toggle>
                        <i class="fa fa-lg fa-fw fa-bars"></i>
                    </a>
                    <a class="navbar-brand hidden-xxs" href="index.html">
                        <span class="sc-visible">
                            I
                        </span>
                        <span class="sc-hidden">
                            <span class="semi-bold">Online Trading Institute</span>
                            
                        </span>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-nav-expanded pull-right margin-md-right">
                    
                    <!--<li class="dropdown dropdown-xs-center">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i class="glyphicon glyphicon-envelope"></i>
                            <span class="badge badge-up badge-dark badge-small">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages pull-right">
                            <li class="dropdown-title bg-inverse">New Messages</li>
                            <li class="unread">
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="<?php echo base_url(); ?>/assets/admin/demo/images/avatars/1.jpg">

                                    <div class="message-body">
                                        <strong>Ernest Kerry</strong><br>
                                        Hello, You there?<br>
                                        <small class="text-muted">8 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="<?php echo base_url(); ?>/assets/admin/demo/images/avatars/3.jpg">

                                    <div class="message-body">
                                        <strong>Don Mark</strong><br>
                                        I really appreciate your &hellip;<br>
                                        <small class="text-muted">21 hours</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="<?php echo base_url(); ?>/assets/admin/demo/images/avatars/8.jpg">

                                    <div class="message-body">
                                        <strong>Jess Ronny</strong><br>
                                        Let me know when you free<br>
                                        <small class="text-muted">5 days ago</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="<?php echo base_url(); ?>/assets/admin/demo/images/avatars/7.jpg">

                                    <div class="message-body">
                                        <strong>Wilton Zeph</strong><br>
                                        If there is anything else &hellip;<br>
                                        <small class="text-muted">06/10/2014 5:31 pm</small>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer">
                                <a href="javascript:;"><i class="fa fa-share"></i> See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-xs-center">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i class="glyphicon glyphicon-globe"></i>
                            <span class="badge badge-up badge-danger badge-small">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-notifications pull-right">
                            <li class="dropdown-title bg-inverse">Notifications (3)</li>
                            <li>
                                <a href="javascript:;" class="notification">
                                    <div class="notification-thumb pull-left">
                                        <i class="fa fa-clock-o fa-2x text-info"></i>
                                    </div>
                                    <div class="notification-body">
                                        <strong>Call with John</strong><br>
                                        <small class="text-muted">8 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="notification">
                                    <div class="notification-thumb pull-left">
                                        <i class="fa fa-life-ring fa-2x text-warning"></i>
                                    </div>
                                    <div class="notification-body">
                                        <strong>New support ticket</strong><br>
                                        <small class="text-muted">21 hours ago</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="notification">
                                    <div class="notification-thumb pull-left">
                                        <i class="fa fa-exclamation fa-2x text-danger"></i>
                                    </div>
                                    <div class="notification-body">
                                        <strong>Running low on space</strong><br>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="notification">
                                    <div class="notification-thumb pull-left">
                                        <i class="fa fa-user fa-2x text-muted"></i>
                                    </div>
                                    <div class="notification-body">
                                        New customer registered<br>
                                        <small class="text-muted">06/18/2014 12:31 am</small>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer">
                                <a href="javascript:;"><i class="fa fa-share"></i> See all notifications</a>
                            </li>
                        </ul>
                    </li>-->
                    <li class="dropdown">
                        <?php $username = $session_data['logged_in']['username']; ?>
                        <a data-toggle="dropdown" class="dropdown-toggle navbar-user" href="javascript:;">
                            <img class="img-circle" src="<?php echo base_url(); ?>/assets/admin/demo/images/profile.jpg">
                            <span class="hidden-xs"><?= $username; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu pull-right-xs">
                            <li class="arrow"></li>
                            <li><a href="pages-profile.html">Profile</a></li>
                            <!--<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                            <li><a href="javascript:;">Messages</a></li>-->
                            <li><a href="javascript:;">Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url(); ?>/logout">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="page-wrapper">
            <aside class="sidebar sidebar-default">
                <div class="sidebar-profile">
                    <img class="img-circle profile-image" src="<?php echo base_url(); ?>/assets/admin/demo/images/profile.jpg">

                    <div class="profile-body">
                        <h4><?= $username; ?></h4>

                        <!--<div class="sidebar-user-links">
                            <a class="btn btn-link btn-xs" href="pages-profile.html" data-placement="bottom" data-toggle="tooltip" data-original-title="Profile"><i class="fa fa-user"></i></a>
                            <a class="btn btn-link btn-xs" href="javascript:;"       data-placement="bottom" data-toggle="tooltip" data-original-title="Messages"><i class="fa fa-envelope"></i></a>
                            <a class="btn btn-link btn-xs" href="javascript:;"       data-placement="bottom" data-toggle="tooltip" data-original-title="Settings"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-link btn-xs" href="<?php echo site_url(); ?>/admin/logout" data-placement="bottom" data-toggle="tooltip" data-original-title="Logout"><i class="fa fa-sign-out"></i></a>
                        </div>-->
                    </div>
                </div>
                <nav>
                    <h5 class="sidebar-header">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <!--<li class="nav-dropdown active open">
                            <a href="#" title="Dashboards">
                                <i class="fa fa-lg fa-fw fa-home"></i> Dashboards
                            </a>
                            <ul class="nav-sub">
                                <li class="active open">
                                    <a href="index.html" title="Dashboard">
                                        <i class="fa fa-fw fa-caret-right"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="analytics-overview.html" title="Analytics Overview">
                                        <i class="fa fa-fw fa-caret-right"></i> Analytics Overview
                                        <span class="label label-success pull-right">Hot</span>
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                        <li class="nav-dropdown">
                            <a href="#" title="Users">
                                <i class="fa fa-lg fa-fw fa-th-list"></i> Masters
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="<?= site_url(); ?>/admin_packages" title="Packages Master">
                                        <i class="fa fa-fw fa-caret-right"></i> Packages Master
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= site_url(); ?>/admin_notifications" title="Notification Master">
                                        <i class="fa fa-fw fa-caret-right"></i> Notification Master
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= site_url(); ?>/admin_news" title="News Master">
                                        <i class="fa fa-fw fa-caret-right"></i> News Master
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-dropdown">
                            <a href="#" title="Users">
                                <i class="fa fa-lg fa-fw fa-th-list"></i> Users
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="<?= site_url(); ?>/admin_user_packages" title="User Packages Request">
                                        <i class="fa fa-fw fa-caret-right"></i> User Packages Request
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= site_url(); ?>/admin_user_payment_details" title="User Payment Details">
                                        <i class="fa fa-fw fa-caret-right"></i> User Payment Details
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </aside>

            <div class="page-content">