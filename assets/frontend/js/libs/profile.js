$('#personal_details_form').ajaxForm({
    beforeSend: function() {
        console.log('beforeSend')
        var percentVal = '0%';
       	$('#profile_save').attr('disabled',true);                
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
    },
    success: function() {
        var percentVal = '100%';
    },
    complete: function(xhr) {
        console.log(xhr)
        
        var response = xhr.responseJSON;
        if(response.status == 'success')
        {
            alert_box('Profile added successfully');
            angular.element($("body")).scope().fetch_user_data();
            $('#personal_details').modal('hide');
            /*setTimeout(function(){
                window.location.reload();
            }, 2000);*/

        } else if(response.status == 'error') {
            fail_callback(response);
        }
        $('#profile_save').attr('disabled',false);
        
    }
});

$('#kyc_details_form').ajaxForm({
    beforeSend: function() {
        var percentVal = '0%';
        $('#save_kyc').attr('disabled',true);                
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
    },
    success: function() {
        var percentVal = '100%';
    },
    complete: function(xhr) {
        console.log(xhr)

        var response = xhr.responseJSON;
        if(response.status == 'success')
        {
            alert_box('KYC details added successfully');
            angular.element($("body")).scope().fetch_user_data();
            $('#kyc_details').modal('hide');
            /*setTimeout(function(){
                window.location.reload();
            }, 2000);*/
        } else if(response.status == 'error') {
            fail_callback(response);
        }
        $('#save_kyc').attr('disabled',false);
        
    }
});

angular.module("MyApp", []).controller("MyController", function($scope,$http) {

    $scope.save_address_details = function()
    {
        save_address_details_success_cb = function(data)
        {
            alert_box('updated successfully');
            $scope.fetch_user_data();
            $('#address_details').modal('hide');
        }
        request_data = {};
        request_data['country'] = $scope.user_info.country;
        request_data['state'] = $scope.user_info.state;
        request_data['city'] = $scope.user_info.city;
        request_data['address'] = $scope.user_info.address;
        request_data['pincode'] = $scope.user_info.pincode;
        SSK.site_call("AJAX",window._site_url+"profile/address_details",request_data, save_address_details_success_cb);
    }

    $scope.save_bank_details = function()
    {
        save_bank_details_success_cb = function(data)
        {
            alert_box('updated successfully');
            $scope.fetch_user_data();
            $('#bank_details').modal('hide');
        }
        request_data = {};
        request_data['bank_account_holder_name'] = $scope.user_info.bank_account_holder_name;
        request_data['bank_name'] = $scope.user_info.bank_name;
        request_data['branch'] = $scope.user_info.branch;
        request_data['account_number'] = $scope.user_info.account_number;
        request_data['ifsc_code'] = $scope.user_info.ifsc_code;
        SSK.site_call("AJAX",window._site_url+"profile/bank_details",request_data, save_bank_details_success_cb);
    }

    $scope.change_password = function()
    {
        change_password_success_cb = function(data)
        {
            if(data.status == 'failure')
            {
                alert_box('Current Password not matching');    
            }else
            {
                alert_box('Password Changed.')
            }
            
            //$scope.fetch_user_data();
        }
        if($scope.current_password == '')
        {
            alert_box('Please enter current password');
            return false;
        }else if($scope.new_password == '')
        {
            alert_box('Please enter new password');
            return false;
        }else if($scope.reenter_password == '')
        {
            alert_box('Please enter reenter password');
            return false;
        }
        if($scope.reenter_password != $scope.new_password)
        {
            alert('Please enter new password and reenter password same');
            return false;
        }
        request_data = {};
        request_data['current_password'] = $scope.current_password;
        request_data['new_password'] = $scope.new_password;
        SSK.site_call("AJAX",window._site_url+"profile/change_password",request_data, change_password_success_cb);
    }

    $scope.fetch_user_data = function()
    {
        fetch_user_data_success_cb = function(data)
        {
            $scope.user_info = {}
            if(data.status == 'success')
            {
                $scope['user_info']['userid']= data.message.userid;
                $scope['user_info']['username']= data.message.username;
                $scope['user_info']['firstname']=data.message.firstname;
                $scope['user_info']['middlename']=data.message.middlename;
                $scope['user_info']['lastname']=data.message.lastname;
                $scope['user_info']['email']=data.message.email;
                $scope['user_info']['profile_image']=data.message.profile_image;
                $scope['user_info']['address']=data.message.address;
                $scope['user_info']['city']=data.message.city;
                $scope['user_info']['state']=data.message.state;
                $scope['user_info']['country']=data.message.country;
                $scope['user_info']['pincode']=data.message.pincode;
                $scope['user_info']['dateofbirth']=data.message.dateofbirth;
                $scope['user_info']['mobile']=data.message.mobile;
                $scope['user_info']['gender']=data.message.gender;
                $scope['user_info']['pancard']=data.message.pancard;
                $scope['user_info']['pancard_image']=data.message.pancard_image;
                $scope['user_info']['aadhaar_card']=data.message.aadhaar_card;
                $scope['user_info']['aadhaar_card_image']=data.message.aadhaar_card_image;
                $scope['user_info']['bank_account_holder_name']=data.message.bank_account_holder_name;
                $scope['user_info']['bank_name']=data.message.bank_name;
                $scope['user_info']['branch']=data.message.branch;
                $scope['user_info']['account_number']=data.message.account_number;
                $scope['user_info']['ifsc_code']=data.message.ifsc_code;
                $scope.placement=data.message.user_alignment;
                if(!$scope.$$phase) $scope.$apply();
            }
            //console.log($scope.user_info);
        }
        request_data = {};
        SSK.site_call("AJAX",window._site_url+"profile/get_user_info",request_data, fetch_user_data_success_cb);
    }

    $scope.show_image = function(image_path,image_type)
    {
        path = 'uploads/';
        if(image_type == 'profile' && image_path == '')
        {
            path = path+'person.png';
        }else if(image_type == 'documents' && image_path == '')
        {
            path = path+'download.png';
        }else if(image_type == 'packages' && image_path == '')
        {
            path = path+'package.jpg';
        }
        return window._site_url+path;
    }

    $scope.placement = "left";
    $scope.save_placement = function()
    {
        save_placement_success_cb = function(data)
        {
            if(data.status == 'success')
            {
                alert_box("Successfully changed alignment.");
            }
        }
        request_data = {};
        request_data['placement'] = $scope.placement;
        SSK.site_call("AJAX",window._site_url+"profile/save_placement",request_data, save_placement_success_cb);
    }

    $scope.default_profile = 'person.png';
    $scope.default_documents = 'download.png';
    $scope.default_package = 'package.png';

    $scope.fetch_user_data();
});