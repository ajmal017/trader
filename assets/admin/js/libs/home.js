angular.module("MyApp", []).controller("MyController", function($scope,$http) {

	$scope.clear_cache = function()
	{
		clear_cache_success_cb = function(data){
			alert_box('Cleared Cache..!!');
		}
		request_data = {};
		SSK.site_call("AJAX",window._site_url+"admin_home/clear_all_cache",request_data, clear_cache_success_cb);
	}

	$scope.generate_payout = function()
	{
		if(confirm("Do you want to Generate Payout for this Week?"))
		{
			generate_payout_success_cb = function(data){
				alert_box(data.message);
			}

			generate_payout_failure_cb = function(data){
				alert_box(data.message);
			}
			request_data = {};
			request_data['q'] = 1;
			SSK.site_call("AJAX",window._site_url+"admin_payout/generate_payout",request_data, generate_payout_success_cb,generate_payout_failure_cb);	
		}
		
	}
});