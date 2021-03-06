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

{{--<div id="demo2" style="width: 50%;height:600px;">--}}

{{--</div>--}}
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('demo1'));


    //console.log(data1);

    // 指定图表的配置项和数据
    var option = {
        title : {
            text: '各县党支部状态数据分析',
            subtext: '真实数据'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['软弱涣散','规范建设','创建品牌']
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                data : ['离石市区', '孝义市', '汾阳市', '石楼县', '方山县','柳林县','交口县','文水县','交城县','兴县','临县','岚县','中阳县']
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'软弱涣散',
                type:'bar',
                data:{{$ruan}},
                markPoint : {
                    data : [
                        {type : 'max', name: '最大值'},
                        {type : 'min', name: '最小值'}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name: '平均值'}
                    ]
                }
            },
            {
                name:'规范建设',
                type:'bar',
                data:{{$gui}},
                markPoint : {
                    data : [
                        {type : 'max', name: '最大值'},
                        {type : 'min', name: '最小值'}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name: '平均值'}
                    ]
                }
            },
            {
                name:'创建品牌',
                type:'bar',
                data:{{$chuan}},
                markPoint : {
                    data : [
                        {type : 'max', name: '最大值'},
                        {type : 'min', name: '最小值'}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : '平均值'}
                    ]
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('demo2'));

    // 指定图表的配置项和数据
    var data = genData(50);



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