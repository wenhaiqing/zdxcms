<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="{{asset('layui/lib/echarts/echarts.min.js')}}"></script>
</head>

<body>

<!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
<div id="demo1" style="width: 50%;height:600px;">

</div>

<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('demo1'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '吕梁智慧云党建系统党员年龄分析'
        },
        tooltip: {},
        legend: {
            data: ['年龄统计']
        },
        xAxis: {
            data: ["30岁以下", "30-35", "35-40", "40-45", "45-50", "50-55","55-60","60-65","65-70","70岁以上"]
        },
        yAxis: {},
        series: [{
            name: '年龄统计',
            type: 'bar',
            data: {{$records}}
        }]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>


</body>

</html>