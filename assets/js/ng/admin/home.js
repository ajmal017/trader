angular.module("MyApp", []).controller("MyController", function($scope,$http) {

	$scope.clear_cache = function()
	{
		clear_cache_success_cb = function(data){
			alert_box('Cleared Cache..!!');
		}
		request_data = {};
		SSK.site_call("AJAX",window._site_url+"admin_home/clear_all_cache",request_data, clear_cache_success_cb);
	}

	$scope.return_of_interest_and_loyality_payout = function()
	{
		if(confirm("Do you want to Generate Return Of Interest and Loyality Payout for this Month?"))
		{
			var success_cb = function(data){
				alert_box(data.message);
			}
			var failure_cb = function(data){
				alert_box(data.message);
			}
			request_data = {};
			request_data['q'] = 1;
			SSK.site_call("AJAX",window._site_url+"admin_payout/return_of_interest_and_loyality_payout",request_data, success_cb,failure_cb);	
		}
	}


	$scope.referral_income_payout = function()
	{
		if(confirm("Do you want to Generate Referral Income Payout for this Month?"))
		{
			var success_cb = function(data){
				alert_box(data.message);
			}
			var failure_cb = function(data){
				alert_box(data.message);
			}
			request_data = {};
			request_data['q'] = 1;
			SSK.site_call("AJAX",window._site_url+"admin_payout/referral_income_payout",request_data, success_cb,failure_cb);	
		}
	}
});