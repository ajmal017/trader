<?php $this->view('template/includes/header'); ?>
<script src="<?php echo base_url(); ?>assets/js/ng/admin/users.js"></script>
<section class="content">
    <div class="container-fluid">
        <?php $this->view('template/includes/slider'); ?>
        <!--<div class="block-header">
            <h2>PROFILE</h2>
        </div>-->
        <!-- Tabs With Custom Animations -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix" ng-init="fetch_user_data(<?= $userid; ?>);">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#home_animation_2" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#profile_animation_2" data-toggle="tab">Payment Details</a></li>
                                    <li role="presentation"><a href="#messages_animation_2" data-toggle="tab">KYC</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated fadeInRight active" id="home_animation_2">
                                        <h4>Personal Details</h4>
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <img class="img-responsive thumbnail" ng-src="<?= base_url(); ?>/uploads/profile/{{user_info.profile_image || default_profile}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Name : </label>
                                                <span>{{user_info.firstname}} {{user_info.lastname}}</span>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Email-ID : </label>
                                                <span>{{user_info.email}}</span>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Mobile Number : </label>
                                                <span>{{user_info.mobile}}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Invite Link</h4>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <input type="text" value="<?= site_url(); ?>register/{{user_info.username || ''}}" class="form-control"/>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Address Details</h4>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <label>Country : </label>
                                                <span>{{user_info.country}}</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>City : </label>
                                                <span>{{user_info.city}}</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Address : </label>
                                                <span>{{user_info.address}}</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Pincode : </label>
                                                <span>{{user_info.pincode}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated fadeInRight" id="profile_animation_2">
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <label>Account Holder Name : </label>
                                                <span>{{user_info.bank_account_holder_name}}</span>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Bank Name :</label>
                                                <span>{{user_info.bank_name}}</span>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Branch : </label>
                                                <span>{{user_info.branch}}</span>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Account Number : </label>
                                                <span>{{user_info.account_number}}</span>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>IFSC Code : </label>
                                                <span>{{user_info.ifsc_code}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated fadeInRight" id="messages_animation_2">
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <img class="img-responsive thumbnail" ng-src="<?= base_url(); ?>/uploads/documents/{{user_info.pancard_image || default_documents}}" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Pan Card : </label>
                                                <span>{{user_info.pancard}}</span>
                                            </div>
                                            <div class="col-sm-3">
                                                <img class="img-responsive thumbnail" ng-src="<?= base_url(); ?>/uploads/documents/{{user_info.aadhaar_card_image || default_documents}}" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Aadhaar Card : </label>
                                                <span>{{user_info.aadhaar_card}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- #END# Tabs With Custom Animations -->      
    </div>
</section>
<?php $this->view('template/includes/footer'); ?>