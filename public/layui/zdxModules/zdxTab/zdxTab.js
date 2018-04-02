//zdx-tab 选项卡
layui.define(['element'], function(exports) {
	var $ = layui.jquery;
	var element = layui.element;
	var zdx_tab = {
		init: function() {
			$('.zdx-tab-add').on('click', function() {
				var othis = $(this);
				var href = othis.attr("zdx-href");
				var title = othis.html();
				var zdx_tab_id = othis.attr("zdx-tab-id");
				if(zdx_tab_id) {
					zdx_tab.tabChange(zdx_tab_id);
				} else {
					zdx_tab_id = new Date().getTime();
					othis.attr("zdx-tab-id", zdx_tab_id);
					othis.attr("id", "zdx-tab-id-"+zdx_tab_id);
					zdx_tab.tabAdd(zdx_tab_id, title, href);
				}
				zdx_tab.winResize();
			});

			//监听选项卡删除
			element.on('tabDelete(zdx-tab-filter)', function(data) {
				var id=$(this).parent().attr("lay-id");
				$('#zdx-tab-id-'+id).attr("zdx-tab-id","");
			});

		},
		tabAdd: function(id, title, href) {
			//新增一个Tab项
			element.tabAdd('zdx-tab-filter', {
				title: title,
				content: '<iframe class="zdx-iframe" style="width:100%"  src="' + href + '" />',
				id: id //实际使用一般是规定好的id，这里以时间戳模拟下
			})
			element.tabChange('zdx-tab-filter', id);
		},
		tabDelete: function(othis) {
			//删除指定Tab项
			element.tabDelete('zdx-tab-filter', '44');

			othis.addClass('layui-btn-disabled');
		},
		tabChange: function(id) {
			//切换到指定Tab项
			element.tabChange('zdx-tab-filter', id);
		},
		/**
		 * 监听浏览器窗口改变事件
		 */
		winResize: function() {
			$(window).on('resize', function() {
				var currBoxHeight = $('.layui-body').height(); //获取当前容器的高度
				$('.layui-tab-content iframe').height(currBoxHeight - 86);
			}).resize();
		}

	}

	exports('zdxTab', zdx_tab);
});