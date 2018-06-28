
/*
*堆积折线图选项初始化
*/
var optionStackedLine  = {
     tooltip : {
        trigger: 'axis'
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            data : ['凌晨12点','1点','2点','3点','4点','5点','6点','7点','8点','9点','10点','11点','12点','13点','14点','15点','16点','17点','18点','19点','20点','21点','22点','23点'],
			axisLabel : {
				show:true,
				textStyle: {
					color: 'white',
					fontFamily: 'sans-serif',
					fontSize: 12,
					fontStyle: 'italic', 
				}
			},
			axisLine:{
				show:true,
				lineStyle:{
					color: 'gray',
					width: 0.5,
					type: 'solid'
				} 
			},
			splitLine:{
				show:false
			}
        }
    ],
    yAxis : [
        {
            type : 'value',
			axisLabel : {
				show:true,
				textStyle: {
					color: 'white',
					fontFamily: 'sans-serif',
					fontSize: 12,
					fontStyle: 'italic', 
				}
			},
			axisLine:{
				show:true,
				lineStyle:{
					color: 'gray',
					width: 0.5,
					type: 'solid'
				} 
			},
			splitLine:{
				lineStyle:{
					color: ['#ccc'],
					width: 0.5,
					type: 'solid'
				} 
			},
			splitArea:{
				show:true
			}
        }
    ],
	
    series : [
        {
            name:'交互次数',
            type:'line',
            stack: '总量',
			smooth: true,
			symbol:"emptyCircle",
			symbolSize: 5,
            data:[820, 932, 901, 934, 1290, 1330, 1320,820, 932, 901, 934, 1290, 1330, 1320,820, 932, 901, 934, 1290, 1330, 1320,1330, 1320,1234],
			 itemStyle: {
                normal: {
                    color: 'white',
                    lineStyle: {        // 系列级个性化折线样式
                        width: 1
                    }
                }
            }
        }
    ]
};
 /*
*标准饼图初始化
*/	
var optionStandPie = {
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
     legend: {
        orient : 'horizontal',
		
        y: 'bottom' ,
		itemGap:10,
		itemHeight:0, 
		textStyle:{color:"white"},
        data:['访问权限','读写权限','读写删权限']
    },
    calculable : true,
    series : [
        {
            name:'访问资源次数',
            type:'pie',
            radius : ['50%', '70%'],
            itemStyle : {
                normal : {
                    label : {
                        show : false
                    },
                    labelLine : {
                        show : false
                    }
                },
                emphasis : {
                    label : {
                        show : true,
                        position : 'center',
                        textStyle : {
                            fontSize : '24',
                            fontWeight : 'bold'
                        }
                    }
                }
            },
            data:[
                {value:335, name:'访问权限'},
                {value:310, name:'读写权限'},
                {value:234, name:'读写删权限'} 
            ]
        }
    ]
};
/*
*Echarts初始化
*/
function InitEharts(echarts){ 
	var myStackedLine = echarts.init(document.getElementById('stackedLine'));
	myStackedLine.setOption(optionStackedLine);
	var myStandPie = echarts.init(document.getElementById('standPie'));
	myStandPie.setOption(optionStandPie);	
}
 //avalon初始化设置
var model=avalon.define({
	$id:"avalon",
	istrue:false;
	topArr:[
		{name:"用户1",ip:"127.0.0.1",num:"23"},
		{name:"用户1",ip:"127.0.0.1",num:"23"},
		{name:"用户1",ip:"127.0.0.1",num:"23"},
		{name:"用户1",ip:"127.0.0.1",num:"23"},
		{name:"用户1",ip:"127.0.0.1",num:"23"},
		{name:"用户1",ip:"127.0.0.1",num:"23"},
		{name:"用户1",ip:"127.0.0.1",num:"23"},
		{name:"用户1",ip:"127.0.0.1",num:"23"},
		{name:"用户1",ip:"127.0.0.1",num:"23"},
		{name:"用户1",ip:"127.0.0.1",num:"23"}
	],
	topNum:[
		{name:"用户1",ip:"127.0.0.1",auth:"访问",res:"是"},
		{name:"用户1",ip:"127.0.0.1",auth:"读写",res:"是"},
		{name:"用户1",ip:"127.0.0.1",auth:"读写删",res:"是"},
		{name:"用户1",ip:"127.0.0.1",auth:"访问",res:"是"},
		{name:"用户1",ip:"127.0.0.1",auth:"访问",res:"是"},
		{name:"用户1",ip:"127.0.0.1",auth:"读写删",res:"是"},
		{name:"用户1",ip:"127.0.0.1",auth:"读写",res:"是"},
		{name:"用户1",ip:"127.0.0.1",auth:"读写删",res:"是"},
		{name:"用户1",ip:"127.0.0.1",auth:"访问",res:"是"},
		{name:"用户1",ip:"127.0.0.1",auth:"读写删",res:"是"}
	],
	showDialog:function(){
		model.istrue=true;
	}

});
  