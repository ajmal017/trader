angular.module("MyApp", []).controller("MyController", function($scope,$http) {
    $scope.save_notification = function()
    {
        var success_cb = function(data)
        {
            if(data.status == "success")
            {
                alert("Successfully Saved");
                window.location.reload();
            }
        }
        
        packages = $scope.packages || '';
        packages = packages.toString();
        request_data = {};
        request_data['notification'] = $scope.notification || '';
        request_data['packages'] = packages;
        SSK.site_call("AJAX",window._site_url+"admin_notifications/add_notification",request_data,success_cb);
    }

    $scope.edit_notification = function()
    {
        var success_cb = function(data)
        {
            if(data.status == "success")
            {
                alert_box("Successfully Saved")
            }
        }
        notification = $("#wysiwyg").val();
        notification_status = $("#notification_status").val();
        notification_id = $("#notification_id").val();
        request_data = {};
        request_data['notification'] = notification;
        request_data['notification_status'] = notification_status;
        request_data['notification_id'] = notification_id;
        SSK.site_call("AJAX",window._site_url+"admin_notifications/edit_notification",request_data,success_cb);
    }

    $scope.deleteNotification = function(notification_id)
    {
        if(confirm("Do you want to delete this Notification?"))
        {
            delete_notification_success_cb = function(data)
            {
                if(data.status == "success")
                {
                    alert_box("Successfully deleted");
                    $("#notification-id-"+notification_id).remove();
                }
            }

            request_data = {};
            request_data['notification_id'] = notification_id;
            SSK.site_call("AJAX",window._site_url+"admin_notifications/delete_notification",request_data, delete_notification_success_cb);            
        }

    }
});