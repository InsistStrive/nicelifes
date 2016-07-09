function callapi(uri,callback){
	
	$.ajax({
		url:uri,
		success:function(rps){
			if(callback){
				var json = JSON.parse(rsp);
				alert('callapi');
				callback(json);
			}
		}
	});
}

function postapi(uri,postdata,callback){
	$.post(uri,postdata,function(rsp){
		if(callback){
			alert(rsp);
			var json = jQuery.parseJSON(rsp);
			alert(json.code);
			callback(json);
		}
	});
}