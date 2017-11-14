angular.module("MyApp", []).controller("MyController", function($scope,$http) {
    $scope.save_news = function()
    {
        save_news_success_cb = function(data)
        {
            if(data.status == "success")
            {
                alert("Successfully Saved");
                window.location.reload();
            }
        }

        news_heading = $("#news_heading").val() || '';
        news_desc = $("#wysiwyg").val() || '';
        if(news_heading == '')
        {
            alert_box('Please fill News Heading.');
        }else if(news_desc == '')
        {
            alert_box('Please fill News Description.');
        }
        request_data = {};
        request_data['news_heading'] = news_heading;
        request_data['news_desc'] = news_desc;
        SSK.site_call("AJAX",window._site_url+"admin_news/save_news",request_data, save_news_success_cb);
    }

    $scope.edit_news = function()
    {
        edit_news_success_cb = function(data)
        {
            if(data.status == "success")
            {
                alert("Successfully Saved");
                window.location.reload();
            }
        }
        news_heading = $("#news_heading").val() || '';
        news_desc = $("#wysiwyg").val() || '';
        news_id = $("#news_id").val();
        request_data = {};
        request_data['news_heading'] = news_heading;
        request_data['news_desc'] = news_desc;
        request_data['news_id'] = news_id;
        SSK.site_call("AJAX",window._site_url+"admin_news/edit_news",request_data,edit_news_success_cb);
    }

    $scope.delete_user = function(userid)
    {
        if(confirm("Do you want to delete this User?"))
        {
            delete_user_success_cb = function(data)
            {
                if(data.status == "success")
                {
                    alert_box("Successfully deleted");
                    $("#user-id-"+userid).remove();
                }
            }

            request_data = {};
            request_data['userid'] = userid;
            SSK.site_call("AJAX",window._site_url+"admin_users/delete_user",request_data, delete_user_success_cb);            
        }

    }

    $scope.fetch_user_data = function(userid)
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
        request_data['userid'] = userid;
        SSK.site_call("AJAX",window._site_url+"admin_users/get_user_info",request_data, fetch_user_data_success_cb);
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

    $scope.default_profile = 'person.png';
    $scope.default_documents = 'download.png';
    $scope.default_package = 'package.png';
});