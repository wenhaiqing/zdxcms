//zdx-theme js   主题皮肤
layui.define(['element'], function(exports) {
	var $ = layui.jquery;
	var element = layui.element;
	var zdxTheme={
		init:function(){
	    // 默认 炫酷蓝
		var themeName=this.getData('themeName')||'zdx-blue-theme';
		this.skin(themeName)
		this.initEvent();
		},
		initEvent:function(){
			var that=this;
		    $(".zdx-theme-skin-switch").click(function(){
				var themeName=$(this).attr('skin')||'zdx-blue-theme';
				that.skin(themeName);
			});
		},
		skin:function(themeName){
			var css="layui-layout-body ";
			$('body').attr('class',css+themeName);
			this.setData('themeName',themeName);
		},
		setData:function(key,val){
			if(window.localStorage){
				 var dataBase=window.localStorage;
			     dataBase[key]=val;
			}else{
				 alert("当前浏览器不支持localStorage存储");
			}
		},
		getData:function(key){
		    if(window.localStorage){
		    	 var dataBase=window.localStorage;
			     return dataBase[key];
			}else{
				 alert("当前浏览器不支持localStorage存储");
			}
		}
	}
	
	exports('zdxTheme', zdxTheme);
});