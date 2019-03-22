var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
title : {
    text: 'Waiting List by Ethnicity(4/2018)',
    subtext: 'organdonor.gov',
    x:'center'
},
tooltip : {
    trigger: 'item',
    formatter: "{a} <br/>{b} : {c} ({d}%)"
},
legend: {
    orient: 'vertical',
    left: 'left',
    data: ['Caucasian','African American','Hispanic','Asian','other']
},
series : [
    {
        name: 'waiting List',
        type: 'pie',
        radius : '55%',
        center: ['50%', '60%'],
        data:[
            {value:900, name:'Caucasian'},
            {value:630, name:'Afican American'},
            {value:424, name:'Hispanic'},
            {value:173, name:'Asian'},
            {value:50, name:'other'}
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
;
if (option && typeof option === "object") {
myChart.setOption(option, true);
}

$(document).on("click", '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });