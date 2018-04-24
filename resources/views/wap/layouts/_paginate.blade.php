

<script>
    window.jsUrlHelper = {
        getUrlParam: function getUrlParam(url, ref) {
            var str = "";

            // 如果不包括此参数
            if (url.indexOf(ref) == -1) return "";

            str = url.substr(url.indexOf('?') + 1);

            arr = str.split('&');
            for (i in arr) {
                var paired = arr[i].split('=');

                if (paired[0] == ref) {
                    return paired[1];
                }
            }

            return "";
        },
        putUrlParam: function putUrlParam(url, ref, value) {

            // 如果没有参数
            if (url.indexOf('?') == -1) return url + "?" + ref + "=" + value;

            // 如果不包括此参数
            if (url.indexOf(ref) == -1) return url + "&" + ref + "=" + value;

            var arr_url = url.split('?');

            var base = arr_url[0];

            var arr_param = arr_url[1].split('&');

            for (i = 0; i < arr_param.length; i++) {

                var paired = arr_param[i].split('=');

                if (paired[0] == ref) {
                    paired[1] = value;
                    arr_param[i] = paired.join('=');
                    break;
                }
            }

            return base + "?" + arr_param.join('&');
        },
        delUrlParam: function delUrlParam(url, ref) {

            // 如果不包括此参数
            if (url.indexOf(ref) == -1) return url;

            var arr_url = url.split('?');

            var base = arr_url[0];

            var arr_param = arr_url[1].split('&');

            var index = -1;

            for (i = 0; i < arr_param.length; i++) {

                var paired = arr_param[i].split('=');

                if (paired[0] == ref) {

                    index = i;
                    break;
                }
            }

            if (index == -1) {
                return url;
            } else {
                arr_param.splice(index, 1);
                return base + "?" + arr_param.join('&');
            }
        }
    };

    layui.use(['laypage', 'layer'], function(){
        var laypage = layui.laypage
            ,layer = layui.layer,
            $ = layui.jquery;
        laypage.render({
            elem: 'paginate-render'
            ,limit: {{config('admin.global.paginate')}}
            ,curr: window.jsUrlHelper.getUrlParam(window.location.href.toString(), 'page')
            ,count: {{ $count }} //数据总数
            ,jump: function(obj, first){
                if(!first){
                    var nUrl = window.jsUrlHelper.putUrlParam( window.location.href.toString(), 'page', obj.curr);
                    nUrl = window.jsUrlHelper.putUrlParam( nUrl, 'limit', obj.limit);
                    window.location.href = nUrl;
                }
            }
        });

        $(".form-delete").click(function(){

            var tUrl = $(this).attr('data-url');

            layer.confirm('确认删除吗？', {
                btn: ['确认', '取消']
            }, function(index){
                $("#delete-form").attr("action",tUrl).submit();
//                console.log(tUrl);
                layer.close(index);
                return false;
            }, function(index){
                layer.close(index);
                return true;
            });

            return false;
        });
        $(".form-jinghua").click(function(){

            var tUrl = $(this).attr('data-url');

            layer.confirm('确认设置为精华吗？', {
                btn: ['确认', '取消']
            }, function(index){
                $("#jinghua-form").attr("action",tUrl).submit();
//                console.log(tUrl);
                layer.close(index);
                return false;
            }, function(index){
                layer.close(index);
                return true;
            });

            return false;
        });
        $(".search-button").click(function(){

            var tUrl = $(this).attr('data-url');
                $("#search-form").attr("action",tUrl).submit();

        });
    });
</script>