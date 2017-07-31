<!doctype html>
<html class="no-js">
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
                <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Iriy Admin &middot; Sign In </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!--<link rel="shortcut icon" href="/favicon.ico">-->
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/css/iriy-admin.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/demo/css/demo.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/assets/font-awesome/css/font-awesome.css">
        <script src="<?php echo base_url(); ?>/assets/admin/assets/libs/jquery/jquery.min.js"></script>
        <!--[if lt IE 9]>
        <script src="assets/libs/html5shiv/html5shiv.min.js"></script>
        <script src="assets/libs/respond/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="body-sign-in">
    <div class="container">
        <div class="panel panel-default form-container">
            <div class="panel-body">
                <form role="form" method="POST">
                    <h3 class="text-center margin-xl-bottom">Welcome Back!</h3>
                    <div class="alert alert-block alert-danger" <?php if($this->session->flashdata('message') == ''){ echo 'style="display:none;"'; } ?> >
                        <button data-dismiss="alert" class="close" type="button">×</button>
                        <p><?php echo $this->session->flashdata('message'); ?></p>
                    </div>
                    <div class="form-group text-center">
                        <label class="sr-only" for="email">Email Address</label>
                        <input type="email" class="form-control input-lg" id="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group text-center">
                        <label class="sr-only" for="password">Password</label>
                        <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
                    </div>

                    <input type="submit" class="btn btn-primary btn-block btn-lg" value="SIGN IN" name="signin">
                </form>
            </div>
            <div class="panel-body text-center">
                <div class="margin-bottom">
                    <a class="text-muted text-underline" href="javascript:;">Forgot Password?</a>
                </div>
                <div>
                    Don't have an account? <a class="text-primary-dark" href="pages-sign-up.html">Sign up here</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url(); ?>/assets/admin/assets/bs3/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/plugins/jquery-navgoco/jquery.navgoco.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/js/main.js"></script>
</html>
