

function AjaxPostActionResult(querystring,url){
    var result = jQuery.ajax({
	    url: url,
	    type: 'POST',
        //dataType : 'html',
		async: false,
	    data: querystring,
		success: function(response, code){
			console.log (response);
			if(code == 'success')
			{return response;}
		}
	});
	return result.responseText;
}


function KDChek(type,value){
    var CodeIndex = 0; //no errors
	if(type == "noempty"){ if(value.length == 0)    { CodeIndex = 1;} }
	if(type == "number") { 
		var ntd = value.replace("+","");
		if(!ntd.match(/^\d+$/)){ CodeIndex = 1;} 
	}
	if(type == "email") {  if(!value.match(/\S+@\S+\.\S+/)){ CodeIndex = 1;} }
	return CodeIndex;
}



jQuery(document).ready(function($) {
	var ajaxurl = "/ajaxworker";
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    //ipad touch
	var ua = navigator.userAgent,
	event = (ua.match(/iPad/i)) ? "touchstart" : "click";

    if(jQuery("button").is("#MakeAuth")){
		
		$(document).on(event, '#MakeAuth', function(){
            
            handler = 0;
            let ContactName = $("#StandMail").val();
            let ContactPwd  = $("#StandPwd").val();

            var ContactNameError = KDChek("noempty",ContactName);
			if(ContactNameError == 1){
				handler = 1;
				//$("#MustangName").parent("div").children("div.InputOnWhiteTextaRError").animate({opacity: 1}, 1000);
			}
				
			var ContactPwdError = KDChek("noempty",ContactPwd);
			if(ContactPwdError == 1){
				handler = 1;
				//$("#MustangPhone").parent("div").children("div.InputOnWhiteTextaRError").animate({opacity: 1}, 1000);
			}

            if(handler == 0){
                alert(12);
            }

            //Route::post('/login', [CmsController::class,  'UserAuth']);

		});
		
	}

   
});