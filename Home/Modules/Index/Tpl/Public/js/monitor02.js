 /*
*资源请求热力图
*/
//var data=[[],[],[]];
var proData=[];
var optionMap= {
		backgroundColor : '#1b1b1b',
		color : ['rgba(255, 255, 255, 0.8)', 'rgba(14, 241, 242, 0.8)', 'rgba(37, 140, 249, 0.8)'],
		title : {
			text :  "全国各地区资源请求热力图",
			x : 'center',
			textStyle : {
				color : '#fff'
			}
		},
		legend : {
		show : false,
			orient : 'vertical',
			x : 'left',
			data : ['强', '中', '弱'],
			textStyle : {
				color : '#fff'
			}
		},
		toolbox : {
			show : false,
			orient : 'vertical',
			x : 'right',
			y : 'center',
			feature : {
				mark : {
					show : true
				},
				dataView : {
					show : true,
					readOnly : false
				},
				restore : {
					show : true
				},
				saveAsImage : {
					show : true
				}
			}
		},
		series : [{
				name : '弱',
				type : 'map',
				mapType : "china",
				hoverable : false,
				roam : false,
				scaleLimit : {
					max : 2,
					min : 0.8
				},
				itemStyle : {
					normal : {
						borderColor : 'rgba(100,149,237,1)',
						borderWidth : 1.5,
						label : {
							show : true,
							color : "red"
						},
						emphasis : {
							label : {
								show : false
							}
						},
						areaStyle : {
							color : '#1b1b1b'
						}
					}
				},
				data : [],
				markPoint : {
					symbolSize : 1,
					large : true,
					effect : {
						show : false
					},
					data : data[0]
				}
			}, {
				name : '中',
				type : 'map',
				mapType :  "china",
				data : [],
				markPoint : {
					symbolSize : 1,
					large : true,
					effect : {
						show : false
					},
					data : data[1]
				}
			}, {
				name : '强',
				type : 'map',
				backgroundColor : '#1b1b1b',
				mapType :  "china",
				data : [],
				markPoint : {
					symbol : 'diamond',
					symbolSize : 3,
					large : true,
					effect : {
						show : false
					},
					data : data[2]
				}
			}
		]
	};
/*
*各省份的交互数据（南丁格尔玫瑰图）
*/
optionRose = {
    title : {
		text :  "各省份交互数据",
		x : 'center',
		textStyle : {
			color : '#fff'
		}
	},
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        x : 'center',
        y : 'bottom',
		textStyle : {
				color : '#fff'
			},
        data:['rose1','rose2','rose3','rose4','rose5','rose6','rose7','rose8']
    },
    toolbox: {
        show : false,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {
                show: true, 
                type: ['pie', 'funnel']
            },
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    series : [
        
        {
            name:'访问次数',
            type:'pie',
            radius : [60, 200],
            center : ['48%', 290],
            roseType : 'area',
			x:'50%',			// for funnel
            max: 1400,                // for funnel
            sort : 'descending',     // for funnel
            data:[]
        }
    ]
};
                    
/*
*Echarts初始化
*/
function InitEharts(echarts){ 
	var myMap = echarts.init(document.getElementById('map'));
	myMap.setOption(optionMap);
	var myRose = echarts.init(document.getElementById('rose'));
	init();
	fillRose();
	model.province=proData.slice(0,15);
	console.log();
	myRose.setOption(optionRose);
}
 //avalon初始化设置
var model=avalon.define({
	$id:"avalon",
	province:[]
});
/*
*页面初始化
*/
function init(){
	proData=yysAjaxRequest("GET",{},"../Monitor/getCountByProvience");
	console.log(proData);
}
/*
*绘制玫瑰
*/
function fillRose(){
	var roseData=[];
	var legendData=[];
	for(var i=0;i<proData.length;i++){
		var name=proData[i].province;
		var value=proData[i].CountNum;
		roseData.push({name:name,value:value});
		legendData.push(name);
	}
	optionRose.series[0].data=roseData.sort();
	optionRose.legend.data=legendData;
}