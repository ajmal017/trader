angular.module("MyApp", []).controller("MyController", function($scope,$http) {
    $scope.deleteUserPackageRequest = function(user_package_id)
    {
        if(confirm("Do you want to delete this User Package Request?"))
        {
            deleteUserPackageRequest_success_cb = function(data)
            {
                if(data.status == "success")
                {
                    $('#user-package-id-'+user_package_id).remove();
                }
            }
            SSK.site_call("AJAX",window._site_url+"admin_user_packages/deleteUserPackageRequest",{"user_package_id":user_package_id}, deleteUserPackageRequest_success_cb);
        }
    }


    $scope.userPackageRequestAction = function(user_package_id,userid,status)
    {
        if(confirm("Do you want to accept this User Package Request?"))
        {
            deleteUserPackageRequest_success_cb = function(data)
            {
                if(data.status == "success")
                {
                    $('#user-package-id-'+user_package_id).remove();
                }
            }
            SSK.site_call("AJAX",window._site_url+"admin_user_packages/userPackageRequestAction",{"user_package_id":user_package_id,"status":status,"userid":userid}, deleteUserPackageRequest_success_cb);
        }
    }
});