layui.config({base: '/layadmin/modul/common/'}).use(['form','dialog', 'his'],function(){
    var form = layui.form,
        dialog = layui.dialog
        ,his = layui.his;

    $('.tree').treegrid({initialState: 'collapsed'});

    //添加分类
    $(".categoryAdd_btn").click(function(){
        dialog.open('添加分类', '/admin/category/create');
    })

    //编辑分类
    $("body").on("click",".category_edit",function(){  //编辑
        var id = $(this).attr('data-id');
        dialog.open('编辑权限', '/admin/category/'+id+'/edit');
    })

    $("body").on("click",".category_del",function(){  //删除
        var _this = $(this);
        var id = $(this).attr('data-id');
        dialog.confirm('确定删除此信息？', function () {
            var loadIndex = dialog.load('信息删除中');
            his.ajax({
                url: '/admin/category'
                ,type: 'delete'
                ,data: {id: id}
                ,complete: function () {
                    dialog.close(loadIndex);
                }
                ,error: function (msg) {
                    dialog.error(msg);
                }
                ,success: function (msg, data, meta) {
                    dialog.msg("删除成功");
                    _this.parents("tr").remove();
                }
            });
        });

    })

    form.on('switch(isCheck)', function(data){
        var id = $(this).attr('data-id');
        var orig = $(this).prop('checked');
        var check;
        if (orig) {
            check = 1;
        } else {
            check = 0;
        }
        var loadIndex = dialog.load('修改中，请稍候');
        his.ajax({
            url: '/admin/category'
            ,type: 'patch'
            ,data: {id: id, val: check, key: 'check'}
            ,complete: function(){
                dialog.close(loadIndex);
            }
            ,error: function(msg){
                dialog.error(msg, function () {
                    location.reload();
                });
            }
            ,success: function(msg, data, meta){
                dialog.msg("已更改成功");
            }
        });
        return false;
    })

    form.on('switch(isShow)', function(data){
        var id = $(this).attr('data-id');
        var orig = $(this).prop('checked');
        var status;
        if (orig) {
            status = 1;
        } else {
            status = 0;
        }
        var loadIndex = dialog.load('修改中，请稍候');
        his.ajax({
            url: '/admin/category'
            ,type: 'patch'
            ,data: {id: id, val: status, key: 'status'}
            ,complete: function(){
                dialog.close(loadIndex);
            }
            ,error: function(msg){
                dialog.error(msg, function () {
                    location.reload();
                });
            }
            ,success: function(msg, data, meta){
                dialog.msg("已更改成功");
            }
        });
        return false;
    })

    $('.sort_input').change(function(){
        var id = $(this).attr('data-id');
        var sort = $(this).val();
        sort = Number(sort);
        var loadIndex = dialog.load('修改中，请稍候');
        his.ajax({
            url: '/admin/category'
            ,type: 'patch'
            ,data: {id: id, val: sort, key: 'sort'}
            ,complete: function(){
                dialog.close(loadIndex);
            }
            ,error: function(msg){
                dialog.error(msg, function () {
                    location.reload();
                });
            }
            ,success: function(msg, data, meta){
                dialog.msg("已更改成功");
            }
        });
        return false;
    });

})