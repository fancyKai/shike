function ydcountdown(s,obj){
	// console.log(s);
	//console.log(obj);
	var remain_seconds = s;
	//remain_seconds = remain_seconds%(3600*24);
	var hour = parseInt(remain_seconds/3600);
	hour = (hour<10?'0'+hour:hour);
	var minutes = parseInt(remain_seconds%3600/60);
	minutes = (minutes<10?'0'+minutes:minutes);
	var seconds = parseInt(remain_seconds%60);
	seconds = (seconds<10)?'0'+seconds:seconds;
	if(s<0){
		return;
	}
	// console.log(s);
	// console.log(obj);
	var timestring = '还剩'+hour+'小时'+minutes+'分'+seconds+'秒';
	var objid = obj.attr('id');
	if(!objid){
		return;
	}
	obj.text(timestring);
	//console.log(objid);
	//console.log(typeof objid);
	var order_id = objid.substring(9);
	//console.log(objid.substring(9));
	if(s == 0){
		// $.ajax({
		// url : admin.url+'merchant_personal/cancle_order',
		// type : 'POST',
		// dataType: "json",
		// cache : false,
		// timeout : 20000,
		// data : {orderid:order_id},
		// success : function (result){
		// 	// console.log(result);
			window.location.reload();
	// 	},
	// 	error : function (XMLHttpRequest, textStatus){
	// 		console.log(XMLHttpRequest);
	// 		console.log(textStatus);
	// 	}
	// })
	}
	setTimeout("ydcountdown("+(s-1)+",$(\"#"+objid+"\"))","1000");
}