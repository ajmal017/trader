<!-- Modal -->
<div class="modal fade" id="personal_details" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Personal Details</h4>
            </div>
            <form id="personal_details_form" method="POST" action="<?php echo site_url(); ?>/profile/personal_details" enctype="multipart/form-data" >
                <div class="modal-body" style="overflow:auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-4">
                            <label>First Name : </label>
                            <input type="text" class="form-control" name="firstname" value="{{user_info.firstname}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Middle Name : </label>
                            <input type="text" class="form-control" name="middlename" value="{{user_info.middlename}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Last Name : </label>
                            <input type="text" class="form-control" name="lastname" value="{{user_info.lastname}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Email ID : </label>
                            <input type="text" class="form-control" name="email" value="{{user_info.email}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Mobile Number : </label>
                            <input type="text" class="form-control" name="mobile" value="{{user_info.mobile}}"> 
                        </div>
                        <div class="form-group col-md-4">
                            <label>Date Of Birth : </label>
                            <input type="text" class="form-control" name="dateofbirth" id="datepicker" value="{{user_info.dateofbirth}}">
                        </div>
                        <div class="form-group col-md-8">
                            <label>Profile Image : </label>
                            <input type="hidden" name="profile_image_path" value="{{user_info.profile_image}}">
                            <input type="file" class="form-control" ng-model="profile_image" name="profile_image">
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" id="profile_save" value="Submit"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
        </div>    
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="address_details" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Address Details</h4>
            </div>
                <div class="modal-body" style="overflow:auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-4">
                            <label>Country : </label>
                            <input type="text" class="form-control" ng-model="user_info.country">
                        </div>
                        <div class="form-group col-md-4">
                            <label>State : </label>
                            <input type="text" class="form-control" ng-model="user_info.state">
                        </div>
                        <div class="form-group col-md-4">
                            <label>City : </label>
                            <input type="text" class="form-control" ng-model="user_info.city">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Address : </label>
                            <input type="text" class="form-control" ng-model="user_info.address">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Pincode : </label>
                            <input type="text" class="form-control" ng-model="user_info.pincode">
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                {{data}}
                <input type="button" class="btn btn-primary" ng-click="save_address_details()" value="Save"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </div>    
    </div>
</div>
<div class="modal fade" id="bank_details" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Bank Details</h4>
            </div>
                <div class="modal-body" style="overflow:auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-4">
                            <label>Account Holder Name : </label>
                            <input type="text" class="form-control" ng-model="user_info.bank_account_holder_name">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Bank Name : </label>
                            <input type="text" class="form-control" ng-model="user_info.bank_name">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Branch : </label>
                            <input type="text" class="form-control" ng-model="user_info.branch">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Account Number : </label>
                            <input type="text" class="form-control" ng-model="user_info.account_number">
                        </div>
                        <div class="form-group col-md-4">
                            <label>IFSC Code : </label>
                            <input type="text" class="form-control" ng-model="user_info.ifsc_code">
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                {{data}}
                <input type="button" class="btn btn-primary" ng-click="save_bank_details()" value="Save"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </div>    
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="kyc_details" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">KYC Details</h4>
            </div>
            <form id="kyc_details_form" method="POST" action="<?php echo site_url(); ?>/profile/save_kyc_details" enctype="multipart/form-data" >
                <div class="modal-body" style="overflow:auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-4">
                            <label>Pan Card : </label>
                            <input type="text" class="form-control" name="pancard" value="{{user_info.pancard}}" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Pan Card Image : </label>
                            <input type="file" class="form-control" name="pancard_image" />
                            <input type="hidden" name="current_pancard_image" value="{{user_info.pancard_image}}"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Aadhaar Card : </label>
                            <input type="text" class="form-control" name="aadhaar_card" value="{{user_info.aadhaar_card}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Aadhaar Card Image : </label>
                            <input type="file" class="form-control" name="aadhaar_card_image">
                            <input type="hidden" name="current_aadhaar_card_image" value="{{user_info.aadhaar_card_image}}"/>
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit" id="save_kyc"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
        </div>    
    </div>
</div>
<script>
$(document).ready(
function () {
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd',
      yearRange: '1920:' + new Date().getFullYear(),
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  }
);
</script>