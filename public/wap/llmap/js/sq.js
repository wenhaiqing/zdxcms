var sqajax = new Object();
sqajax.getDate = function (page,opinion){
    this._getAjaxDate(page,opinion);
	};
sqajax._getAjaxDate = function (url1,opinion){
	$.ajax({
		url: ""+url1,
		type : "GET",
		data : opinion,
		dataType : "text",
		success: function(result){
            console.log(result);
            sqajax.checkRetno(result,opinion.type);
           //layer.msg(result[0].name);
		},
        error:function (xhr){
			console.log(opinion.type+"--"+JSON.stringify(xhr));
		}
	});
};
sqajax.checkRetno = function (result,type){
		switch (result.status){
		case 100 :
			//layer.msg("无效参数！");
          	break;
		case 0 :
            //layer.msg(result.msg);
		break;
		case 60 :
			openURL(result.src);
			break;
		case 1 :
			window[type](result);
		break;
		default :
           window[type](result);
		break;
		}
	};
sqajax.openURL = function(url){
	 window.location.href = url;
	};
sqajax.thisInfo = function(obj) {
    var o = new Object();
    o.id = $(obj).attr("id");
    o.title = $(obj)[0].textContent.replace(/\n/g,"");
    o.obj = $(obj);
    return o;
};
sqajax.adaptation = function (obj) {
	var w = obj.width();
	var h = obj.height();
	$(obj).width(window.innerWidth);
    $(obj).height(parseInt(window.innerWidth*h/w));
	console.log(w+"--"+h);
};
$(window).resize(function(){
    sqajax.adaptation($("svg"));
});