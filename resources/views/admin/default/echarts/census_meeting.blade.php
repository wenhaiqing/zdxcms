<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="{{asset('layui/lib/echarts/echarts.min.js')}}"></script>
</head>

<body>

<!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->

<div id="demo2" style="width: 50%;height:600px;">

</div>

<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('demo2'));

    var data1 = {{json_encode($data[0]['value'])}};
    console.log(data1);

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
            data: ["{{$data[0]['name']}}", "{{$data[1]['name']}}", "{{$data[2]['name']}}", "{{$data[3]['name']}}",
                "{{$data[4]['name']}}","{{$data[5]['name']}}","{{$data[6]['name']}}","{{$data[7]['name']}}","{{$data[8]['name']}}",
                "{{$data[9]['name']}}","{{$data[10]['name']}}","{{$data[11]['name']}}","{{$data[12]['name']}}"]
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
            data: ['一月', '二月', '三月', '四月', '五月', '六月', '七月','八月','九月','十月','十一月','十二月']
        },
        series: [{
            name: "{{$data[0]['name']}}",
            type: 'bar',
            stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'insideRight'
                }
            },
            data: {{json_encode($data[0]['value'])}}
        },
            {
                name: "{{$data[1]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[1]['value'])}}
            },
            {
                name: "{{$data[2]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[2]['value'])}}
            },
            {
                name: "{{$data[3]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[3]['value'])}}
            },
            {
                name: "{{$data[4]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[4]['value'])}}
            },
            {
                name: "{{$data[5]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[5]['value'])}}
            },
            {
                name: "{{$data[6]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[6]['value'])}}
            },
            {
                name: "{{$data[7]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[7]['value'])}}
            },
            {
                name: "{{$data[8]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[8]['value'])}}
            },
            {
                name: "{{$data[9]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[9]['value'])}}
            },
            {
                name: "{{$data[10]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[10]['value'])}}
            },
            {
                name: "{{$data[11]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[11]['value'])}}
            },
            {
                name: "{{$data[12]['name']}}",
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: {{json_encode($data[12]['value'])}}
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>

</body>

</html>