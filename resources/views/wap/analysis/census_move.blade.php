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

<script src="{{asset('layui/lib/jquery/jquery-2.1.4.js')}}"></script>

<script type="text/javascript">

    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('demo1'));

    var data1 = [{
        value: {{$data[0]['value']}},
        name: "{{$data[0]['name']}}"
        },
        {
            value: {{$data[1]['value']}},
            name: "{{$data[1]['name']}}"
        },
        {
            value: {{$data[2]['value']}},
            name: "{{$data[2]['name']}}"
        },
        {
            value: {{$data[3]['value']}},
            name: "{{$data[3]['name']}}"
        },
        {
            value: {{$data[4]['value']}},
            name: "{{$data[4]['name']}}"
        },
        {
            value: {{$data[5]['value']}},
            name: "{{$data[5]['name']}}"
        },
        {
            value: {{$data[6]['value']}},
            name: "{{$data[6]['name']}}"
        },
        {
            value: {{$data[7]['value']}},
            name: "{{$data[7]['name']}}"
        },
        {
            value: {{$data[8]['value']}},
            name: "{{$data[8]['name']}}"
        },
        {
            value: {{$data[9]['value']}},
            name: "{{$data[9]['name']}}"
        },
        {
            value: {{$data[10]['value']}},
            name: "{{$data[10]['name']}}"
        },
        {
            value: {{$data[11]['value']}},
            name: "{{$data[11]['name']}}"
        },
        {
            value: {{$data[12]['value']}},
            name: "{{$data[12]['name']}}"
        }

    ];
    //console.log(data1);

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '各县党支部流动党员统计',
            subtext: '真实数据',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['离石市', '孝义市', '汾阳市', '石楼县', '方山县','柳林县','交口县','文水县','交城县','兴县','临县','岚县','中阳县']
        },
        series: [{
            name: '流动党员',
            type: 'pie',
            radius: '55%',
            center: ['50%', '60%'],
            data: data1,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>

</body>

</html>