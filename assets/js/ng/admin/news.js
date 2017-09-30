angular.module("MyApp", []).controller("MyController", function($scope,$http) {
    $scope.save_news = function()
    {
        var success_cb = function(data)
        {
            if(data.status == "success")
            {
                alert("Successfully Saved");
                window.location.reload();
            }
        }

        if($scope.news_heading == '')
        {
            alert_box('Please fill News Heading.');
        }else if($scope.news_desc == '')
        {
            alert_box('Please fill News Description.');
        }
        request_data = {};
        request_data['news_heading'] = $scope.news_heading;
        request_data['news_desc'] = $scope.news_desc;
        SSK.site_call("AJAX",window._site_url+"admin_news/save_news",request_data, success_cb);
    }

    $scope.edit_news = function()
    {
        var success_cb = function(data)
        {
            if(data.status == "success")
            {
                alert("Successfully Saved");
                window.location.reload();
            }
        }
        news_heading = $scope.news_heading || '';
        news_desc = $scope.news_desc || '';
        news_id = $scope.news_id || 0;
        request_data = {};
        request_data['news_heading'] = news_heading;
        request_data['news_desc'] = news_desc;
        request_data['news_id'] = news_id;
        SSK.site_call("AJAX",window._site_url+"admin_news/edit_news",request_data,success_cb);
    }

    $scope.delete_news = function(news_id)
    {
        if(confirm("Do you want to delete this News?"))
        {
            delete_news_success_cb = function(data)
            {
                if(data.status == "success")
                {
                    alert_box("Successfully deleted");
                    $("#news-id-"+news_id).remove();
                }
            }

            request_data = {};
            request_data['news_id'] = news_id;
            SSK.site_call("AJAX",window._site_url+"admin_news/delete_news",request_data, delete_news_success_cb);            
        }

    }
});