<?php $this->view('template/includes/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ng/profile.js"></script>
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
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#home_animation_2" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#profile_animation_2" data-toggle="tab">Payment Details</a></li>
                                    <li role="presentation"><a href="#messages_animation_2" data-toggle="tab">KYC</a></li>
                                    <li role="presentation"><a href="#settings_animation_2" data-toggle="tab">Security</a></li>
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
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#personal_details">EDIT</button>
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
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#address_details">EDIT</button>
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
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#payment_details">EDIT</button>
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
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#kyc_details">EDIT</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated fadeInRight" id="settings_animation_2">
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" ng-model="current_password" class="form-control" placeholder="Current Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" ng-model="new_password" class="form-control" placeholder="New Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" ng-model="reenter_password" class="form-control" placeholder="Re enter Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary waves-effect" ng-click="change_password()">SAVE</button>
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
<!-- Large Size -->
<div class="modal fade" id="personal_details" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Personal Details</h4>
            </div>
            <form id="personal_details_form" method="POST" action="<?php echo site_url(); ?>/profile/personal_details" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="firstname" value="{{user_info.firstname}}" class="form-control" placeholder="First Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="middlename" value="{{user_info.middlename}}" class="form-control" placeholder="Middle Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="lastname" value="{{user_info.lastname}}" class="form-control" placeholder="Last Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="email" value="{{user_info.email}}" class="form-control" placeholder="Email" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="mobile" value="{{user_info.mobile}}" class="form-control" placeholder="Mobile" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="datepicker form-control" placeholder="Please choose a date..." data-dtp="dtp_298ey" value="{{user_info.dateofbirth}}" name="dateofbirth">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="hidden" name="profile_image_path" value="{{user_info.profile_image}}">
                                <input type="file" class="form-control" ng-model="profile_image" name="profile_image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect" id="profile_save" >SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Large Size -->
<div class="modal fade" id="address_details" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Address Details</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Country" ng-model="user_info.country"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="State" ng-model="user_info.state"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="City" ng-model="user_info.city"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Address" ng-model="user_info.address"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Pincode" ng-model="user_info.pincode"/>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" ng-click="save_address_details()">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- Large Size -->
<div class="modal fade" id="payment_details" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Bank Details</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Account Holder Name" ng-model="user_info.bank_account_holder_name"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Bank Name" ng-model="user_info.bank_name"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Branch" ng-model="user_info.branch"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Account Number" ng-model="user_info.account_number"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="IFSC Code" ng-model="user_info.ifsc_code"/>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" ng-click="save_bank_details()">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- Large Size -->
<div class="modal fade" id="kyc_details" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">KYC Details</h4>
            </div>
            <form id="kyc_details_form" method="POST" action="<?php echo site_url(); ?>/profile/save_kyc_details" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="pancard" value="{{user_info.pancard}}" class="form-control" placeholder="Pan Card" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" class="form-control" name="pancard_image" />
                                <input type="hidden" name="current_pancard_image" value="{{user_info.pancard_image}}" class="form-control" placeholder="Pan Card Image"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="aadhaar_card" value="{{user_info.aadhaar_card}}" class="form-control" placeholder="Aadhaar Card" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" class="form-control" name="aadhaar_card_image">
                            <input type="hidden" name="current_aadhaar_card_image" value="{{user_info.aadhaar_card_image}}" class="form-control" placeholder="Aadhaar Card Image"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect" id="save_kyc" >SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->view('template/includes/footer'); ?>