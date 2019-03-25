
var myChart1 = echarts.init(document.getElementById('main-1'));
option1 = {
    title : {
        text: 'Organ Demand in Ontario',
        y:'4%',
        x:'30%'
    },
    xAxis: {
        type: 'category',
        data: ['2012', '2013', '2014', '2015', '2016', '2017', '2018']
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        data: [820, 932, 901, 934, 1290, 1330, 1630],
        type: 'line'
    }]
};

myChart1.setOption(option1);

var myChart2 = echarts.init(document.getElementById('main-2'));
option2 = {
    title : {
        text: 'Received Lifesaving Organ Transplant Since 2003',
       
        x:'center',
        y:'5%'
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        data: [820, 932, 901, 934, 1290, 1330, 1320],
        type: 'line',
        areaStyle: {}
    }]
};

myChart2.setOption(option2);

var myChart3 = echarts.init(document.getElementById('main-3'));
option3 = {
    title : {
        text: 'Ontarians Have Registered To Become Organ Donors',
       
        x:'center',
        y:'5%'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        y:'15%'
        // data: ['Potential','邮件营销','联盟广告','视频广告','搜索引擎']
    },
    series : [
        {
            // name: '访问来源',
            type: 'pie',
            radius : '55%',
            center: ['45%', '50%'],
            data:[
                {value:168650, name:'Donor'},
           
                {value:83066, name:'Potential Dnoor'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
myChart3.setOption(option3);

var myChart4 = echarts.init(document.getElementById('main-4'));
option4 = {
    title : {
        text: 'Total Ontarians have registered in Ontario',
       
        x:'center',
        y:'5%'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        y:'15%'
        // data: ['Potential','邮件营销','联盟广告','视频广告','搜索引擎']
    },
    series : [
        {
            // name: '访问来源',
            type: 'pie',
            radius : '55%',
            center: ['45%', '50%'],
            data:[
                {value:420000, name:'Donor'},
           
                {value:1250000, name:'Potential Dnoor'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
myChart4.setOption(option4);