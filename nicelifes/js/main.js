function callapi(uri,callback){
	$.ajax({
		url:uri,
		dataType:'json',
		crossDomain: true,
		success:function(result){
			if(callback){
				callback(result);
			}
		},
	
	error:function(data){
		alert('eror');
	},
	complete:function(){
		alert('complete');
	}
	});
}

function postapi(uri,postdata,callback){
	$.post(uri,postdata,function(rsp){
		if(callback){
			var json = jQuery.parseJSON(rsp);
			callback(json);
		}
	});
}