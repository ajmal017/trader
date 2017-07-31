
function phoneNumberValidation(phone)
{
	var phone = phone.toString() || '';
    intRegex = /[0-9 -()+]+$/;
	if((phone.length < 6) || (!intRegex.test(phone)))
	{
	     return false;
	}else{
		return true;
	}
}

function show_image(image_path,image_type)
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

function signout()
{                                                     
    var request = new XMLHttpRequest();                                        
    request.open("post", "/logout", false, "false", "false");                                                                                                                               
    request.send();
    if(request.status == 200)
    {
        window.location.reload();
    }
}


function ExportToExcel() {
	var htmltable= document.getElementById('max');
	var html = htmltable.outerHTML;
	window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
}

function format_number(d){
    if(window._locale == "india-en")
    {
        if(d >= 10000000 || d <= -10000000){
			var a=Math.round(d/100000)/100+"cr";
            return a;
        }else if(d >= 100000 || d <= -100000){
			var a=Math.round(d/1000)/100+"lakh";
            return a;
        }if(d >= 1000 || d <= -1000){
			var a=Math.round(d/10)/100+"k";
            return a;
        }else{
			var a=Math.round(d*100)/100;;
            return a;
        }        
    }else
    {
        if(d >= 100000000 || d <= -100000000){
            return Math.round(d/1000000)/100+"bln";
        }else if(d >= 1000000 || d <= -1000000){
            return Math.round(d/10000)/100+"mln";
        }if(d >= 1000 || d <= -1000){
            return Math.round(d/10)/100+"k";
        }else{
            return Math.round(d*100)/100;
        }
    }
	return d;
}
function sortResults(data,prop, asc) {
    data = data.sort(function(a, b) {
        if (asc) {
            return (a[prop] > b[prop]) ? 1 : ((a[prop] < b[prop]) ? -1 : 0);
        } else {
            return (b[prop] > a[prop]) ? 1 : ((b[prop] < a[prop]) ? -1 : 0);
        }
    });
    return data
}
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};
function show_loader(show)
{
    if(show == true)
    {
        $('#loading-image').show();    
    }else if(show == false)
    {
        $('#loading-image').hide();    
    }
}

function checkVariable(data)
{
	if(typeof data == "undefined" || data == '' || data == null)
	{
		return false;
	}else
	{
		return true;
	}
}


function alert_box(message)
{
    bootbox.alert({
        message: message,
        callback: function () {
        },
        className: 'bootbox-sm'
    });
}

function fail_callback(data)
{
    window._error_log = {};    
    $.each(data['message'], function( key, value ) {
        window._error_log[key]=value;
    });
    
    var error_string = '';
    console.log(window._error_log)
    $.each(window._error_log, function( key, value ) {
        error_string += value+'</br>';
    });
    alert_box(error_string);
}

SSK = {    
    web_call : function( url, method,body, callback_func ,fail_cb ,async ) {
    body = body || {};
    if(typeof async == 'undefined' )
    {
        async = true;    
    }
        ws_base_url = window._ws_url;
        $.ajax({
            url : ws_base_url + url, 
            crossDomain: true,
            data:body,
            type:method,
            async:async,
            beforeSend: function (xhr) {
                
                xhr.setRequestHeader ("auth_token", window._token);
                xhr.setRequestHeader ("user_name", window._user);
            },
                      
            headers: {
                "Accept" : "application/json",
                "Content-Type" : "application/json", 
                "auth_token" :  window._token,
                "user_name" : window._user
            },
           
            success: function(data){
            
                callback_func(data);
            },
            
            error : function( data ){
                
                fail_cb(data);
                error_message = JSON.parse( data.responseText );
                
                //console.log("There was an error processing your request. \n\n Reason : \n " + error_message.reason);
                
            }
        
        });

    
    },

    site_call : function($http, site_url,body, callback_func ,fail_cb,method ,headers,async){
        body = body || {};
        method = method || 'POST';
        headers = headers || {};
        async = async || true;
        show_loader(true);

        if(typeof $http == 'function')
        {
            $http({ 
                method: method, 
                url: site_url,
                headers: headers,
                data: body
            })
            .success(function(data, status, headers, config) {
                callback_func(data);
                show_loader(false);
            })
            .error(function(data,status, headers, config) {
                if(typeof fail_cb == 'function' )
                {
                    fail_cb(data);
                }

                fail_callback(data);
                show_loader(false);
            });
        }else
        {
            $.ajax({
                url : site_url, 
                data:body,
                type:method,
                async:async,
                headers: headers,
                success: function(data){
                    //data  = JSON.parse(data);
                    show_loader(false);
                    callback_func(data);
                },
                error : function( data ){
                    error_message = JSON.parse( data.responseText );
                    if(typeof fail_cb == 'function' )
                    {
                        fail_cb(error_message);
                    }
                    fail_callback(error_message);
                    show_loader(false);
                }
            });
        }    
    },

    site_upload_call : function($http,site_url,body, callback_func ,fail_cb ,headers,async){
        body = body || {};
        headers = headers || {"Content-Type" : "application/json"};
        async = async || true;
        show_loader(true);
        $http.post(site_url,body,{headers: headers})
            .success(function(data, status, headers, config){
                callback_func(data);
                show_loader(false);
            })
            .error(function(data,status, headers, config) {
                if(typeof fail_cb == 'function' )
                {
                    fail_cb(data);
                }else
                {
                    fail_callback(data);
                }
                show_loader(false);
            });
    }
}
