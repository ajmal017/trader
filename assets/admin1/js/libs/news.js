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