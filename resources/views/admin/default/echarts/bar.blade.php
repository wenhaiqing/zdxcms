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

<div id="demo2" style="width: 50%;height:600px;">

</div>

<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('demo1'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '吕梁智慧云党建系统党员数据分析'
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
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('demo2'));

    // 指定图表的配置项和数据
    var option = {
        tooltip: {
            trigger: 'axis',
            axisPointer: { // 坐标轴指示器，坐标轴触发有效
                type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        legend: {
//            data: ['直接访问', '邮件营销', '联盟广告', '视频广告', '搜索引擎']
            data: ['学生', '企事业单位', '党政机关', '农牧渔民', '其他']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'value'
        },
        yAxis: {
            type: 'category',
            data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
        },
        series: [{
            name: '学生',
            type: 'bar',
            stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'insideRight'
                }
            },
            data: [320, 302, 301, 334, 390, 330, 320]
        },
            {
                name: '企事业单位',
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: [120, 132, 101, 134, 90, 230, 210]
            },
            {
                name: '党政机关',
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: [220, 182, 191, 234, 290, 330, 310]
            },
            {
                name: '农牧渔民',
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: [150, 212, 201, 154, 190, 330, 410]
            },
            {
                name: '其他',
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: [820, 832, 901, 934, 1290, 1330, 1320]
            }
        ]
    };;

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>

</body>

</html>