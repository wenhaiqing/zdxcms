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
            text: '各县现在注册人数统计',
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
            data: ['离石市区', '孝义市', '汾阳市', '石楼县', '方山县','柳林县','交口县','文水县','交城县','兴县','临县','岚县','中阳县']
        },
        series: [{
            name: '注册人数',
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
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('demo2'));

    // 指定图表的配置项和数据
    var data = genData(50);

    var option = {
        title: {
            text: '同名数量统计',
            subtext: '纯属虚构',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            type: 'scroll',
            orient: 'vertical',
            right: 10,
            top: 20,
            bottom: 20,
            data: data.legendData
        },
        series: [{
            name: '姓名',
            type: 'pie',
            radius: '55%',
            center: ['40%', '50%'],
            data: data.seriesData,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }]
    };

    function genData(count) {
        var nameList = [
            '赵', '钱', '孙', '李', '周', '吴', '郑', '王', '冯', '陈', '褚', '卫', '蒋', '沈', '韩', '杨', '朱', '秦', '尤', '许', '何', '吕', '施', '张', '孔', '曹', '严', '华', '金', '魏', '陶', '姜', '戚', '谢', '邹', '喻', '柏', '水', '窦', '章', '云', '苏', '潘', '葛', '奚', '范', '彭', '郎', '鲁', '韦', '昌', '马', '苗', '凤', '花', '方', '俞', '任', '袁', '柳', '酆', '鲍', '史', '唐', '费', '廉', '岑', '薛', '雷', '贺', '倪', '汤', '滕', '殷', '罗', '毕', '郝', '邬', '安', '常', '乐', '于', '时', '傅', '皮', '卞', '齐', '康', '伍', '余', '元', '卜', '顾', '孟', '平', '黄', '和', '穆', '萧', '尹', '姚', '邵', '湛', '汪', '祁', '毛', '禹', '狄', '米', '贝', '明', '臧', '计', '伏', '成', '戴', '谈', '宋', '茅', '庞', '熊', '纪', '舒', '屈', '项', '祝', '董', '梁', '杜', '阮', '蓝', '闵', '席', '季', '麻', '强', '贾', '路', '娄', '危'
        ];
        var legendData = [];
        var seriesData = [];
        for(var i = 0; i < 50; i++) {
            name = Math.random() > 0.65 ?
                makeWord(4, 1) + '·' + makeWord(3, 0) :
                makeWord(2, 1);
            legendData.push(name);
            seriesData.push({
                name: name,
                value: Math.round(Math.random() * 100000)
            });
        }

        return {
            legendData: legendData,
            seriesData: seriesData
        };

        function makeWord(max, min) {
            var nameLen = Math.ceil(Math.random() * max + min);
            var name = [];
            for(var i = 0; i < nameLen; i++) {
                name.push(nameList[Math.round(Math.random() * nameList.length - 1)]);
            }
            return name.join('');
        }
    }

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>

</body>

</html>