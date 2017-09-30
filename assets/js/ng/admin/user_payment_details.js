angular.module("MyApp", []).controller("MyController", function($scope,$http) {
    $scope.release_payment = function(payment_method)
    {
        if(confirm("Do you really want to release payment?"))
        {
            var success_cb = function(data)
            {
                if(data.status == "success")
                {
                    $scope.rp_release_amount = 0;
                    $scope.rp_payment_desc = '';
                    $("#release_payment").modal('hide');
                    if(!$scope.$$phase) $scope.$apply();
                    alert_box('successfully Released Payment.');
                }
            }

            request_data = {};
            request_data['userid'] = $scope.rp_userid;
            request_data['release_amount'] = $scope.rp_release_amount;
            request_data['payment_desc'] = $scope.rp_payment_desc || '';
            request_data['payment_method'] = payment_method;
            SSK.site_call("AJAX",window._site_url+"admin_user_payment_details/release_payment",request_data, success_cb);
        }
    }
    $scope.data_message = 'abcd';
    $scope.release_payment_modal = function(userid,payment_method)
    {
        var success_cb = function(data)
        {
            if(data.status == "success")
            {
                $scope.rp_userid = data.message.userid;
                $scope.rp_username = data.message.username;
                $scope.rp_total_amount = data.message.Total_Amount;
                $scope.rp_amount_paid = data.message.Paid_Amount;
                $scope.rp_amount_remaining = data.message.Remaining_Amount;
                $("#release_payment").modal('show');
                if(!$scope.$$phase) $scope.$apply();
            }
        }

        request_data = {};
        request_data['userid'] = userid;
        request_data['payment_method'] = payment_method;
        SSK.site_call("AJAX",window._site_url+"admin_user_payment_details/get_payment_details",request_data, success_cb);
        
    }
});