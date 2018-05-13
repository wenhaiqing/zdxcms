<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=0" />
    <title></title>
    <script src="{{asset('layui/lib/echarts/echarts.min.js')}}"></script>
</head>

<body>

<!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
<div id="demo1" style="width: 100%;height:600px;">

</div>


<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('demo1'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '吕梁智慧云党建系统党员学历分析'
        },
        tooltip: {},
        legend: {
            data: ['学历分布']
        },
        xAxis: {
            data: ["研究生以上", "大学本科", "大学专科", "高中", "初中", "其他"]
        },
        yAxis: {},
        series: [{
            name: '学历分布',
            type: 'bar',
            data: {{$records}}
        }]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>


</body>

</html>