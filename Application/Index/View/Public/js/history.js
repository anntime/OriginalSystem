 
/*
*折线图选项初始化
*/
var optionLine  = { 
	  title : {
        text: 'XX信任度变化', 
    },
    tooltip : {
        trigger: 'axis'
    },  
    calculable : true,
    xAxis : [
        {
            type : 'category',
			name:'交互次数',
            boundaryGap : false,
            data : ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18']
        }
    ],
    yAxis : [
        {
            type : 'value',
			name:'信任度' 
        }
    ],
    series : [
        {
            name:'信任度变化',
            type:'line', 
			itemStyle : {
				normal: {
					borderWidth:1,
					lineStyle: {
						type: 'solid',
						shadowBlur: 10
					},
					color:'pink'
				}
			},
			data:[12,34,46,23,34,45,67,78,89,90,52,60, 56, 74, 83, 62, 93, 70],
            markPoint : {
                data : [
                    {type : 'max', name: '信任度'} 
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name: '信任度平均值'}
                ]
            }
        } 
    ]
};

/*
*散点图选项初始化
*/
var optionPoint = {
    title : {
        text: '节点诚信度分布图'
    },
    tooltip : {
        trigger: 'axis',
        showDelay : 0, 
        axisPointer:{
            type : 'cross',
            lineStyle: {
                type : 'dashed',
                width : 1
            }
        }
    }, 
    xAxis : [
        {
            type : 'value',
            scale:true,
            name:'交互次数'
        }
    ],
    yAxis : [
        {
            type : 'value',
            scale:true,
            name:'信任度'
        }
    ],
    series : [ 
        {
            name:'诚信',
            type:'scatter',
			 
            data: [
				[1.1, 51.6], [1.2, 59.0], [1.3, 49.2], [1.4, 33.0], [1.5, 53.6],
                [1.6, 59.0], [1.7, 47.6], [1.8, 29.8], [1.9, 26.8], [1.0, 15.2],
                [2.0, 55.2], [2.1, 54.2], [2.2, 12.5], [2.4 ,42.0], [2.5, 50.0],
                [2.6, 49.8], [2.7, 49.2], [2.8, 23.2], [2.9, 47.8], [2.3, 38.8],
                [3, 30.6], [3.1, 22.5], [3.2, 17.2], [3.3, 27.8], [3.4, 32.8],
                [3.5, 24.5], [3.6, 39.8], [3.7, 47.3], [3.8, 27.8], [3.9, 37.0],
                [4, 46.2], [4.1, 55.0], [4.2, 13.0], [4.3, 34.4], [4.4, 25.8],
                [4.5, 53.6], [4.7, 33.2], [4.8, 32.1], [4.9, 37.9], [4.6, 36.6],
                [5.0, 22.3], [5.1, 18.5], [5.2, 24.5], [5.3, 20.2], [5.4, 40.3],
                [5.5, 18.3], [5.6, 16.2], [5.7, 20.2], [5.8, 42.9], [5.9, 19.8],
                [6.0, 31.0], [6.1, 39.1], [6.2, 25.9], [6.3, 46.5], [6.4, 14.3],
				[6.5, 31.0], [6.6, 39.1], [6.7, 15.9], [6.8, 46.5], [6.9, 24.3],
                [7.5, 24.8], [7.6, 40.7], [7.7, 40.0], [7.8, 32.0], [7.9, 20.3],
                [7.0, 12.7], [7.1, 24.3], [7.2, 32.0], [7.3, 43.1], [7.4, 20.0],
                [8.0, 34.7], [8.1, 53.2], [8.2, 15.7], [8.3, 21.1], [8.4, 55.7],
                [9.0, 48.7], [9.1, 52.3], [9.2, 50.0], [9.3, 59.3], [9.4, 32.5],
                [8.5, 25.7], [8.6, 24.8], [8.7, 45.9], [8.8, 30.6], [8.9, 47.2],
                [9.5, 29.4], [9.6, 18.2], [9.7, 14.8], [9,8, 21.6], [9,9, 52.8],
                [10.0, 19.8], [10.1, 49.0], [10.2, 50.0], [10.3, 39.2], [10.4, 55.9],
                [10.5, 43.4], [0.6, 58.2], [10.7, 58.6], [10.8, 45.7], [10.9, 52.2],
                [11.0, 48.6], [11.1, 17.8], [11.2, 55.6], [0.3, 46.8], [11.4, 49.4],
                [11.5, 53.6], [11.6, 23.2], [11.7, 53.4], [0.8,30], [11.9, 48.4],
                [12.0, 56.2], [12.1, 10.6], [12.2, 29.8], [12.3, 32.0], [12.4, 45.2],
                [0.5, 56.6], [12.6, 25.2], [0.7, 51.8], [12.8, 33.4], [0.9, 59.0], 
                [15.0, 46.4], [15.1, 34.4], [15.2, 48.8], [15.3, 42.2], [15.4, 55.5],
                [17.5, 57.8], [0.6, 14.6], [17.7, 59.2], [17.8, 52.7], [17.9, 53.2],
                [16.0, 14.5], [16.1, 51.8], [0.2, 16.0], [0.3, 23.6], [16.4, 33.2], 
                [19.0, 20.0], [4.1, 58.2], [19.2, 22.7], [19.3, 54.1], [0.4, 19.1],
                [18.5, 35.9], [18.6, 55.0], [3.7, 7.3], [2.8, 15.0], [18.9, 35.5],
                [1.0, 15.5], [0.3, 48.6], [3.2, 38.6], [3.3, 33.6], [1.4, 15.2],
                [1.5, 12.7], [5.6, 26.6], [4.7, 13.9], [2.8, 43.2], [2.9, 23.6] 
            ],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            } 
        },
        {
            name:'非诚信',
            type:'scatter',
		 
            data: [
				[1.0, 65.6], [1.1, 71.8], [1.2, 60.7], [1.3, 72.6], [1.4, 78.8],
                [1.5, 74.8], [1.6, 66.4], [1.7, 78.4], [1.8, 62.0], [1.9, 61.6],
                [2.0, 76.6], [2.1, 83.6], [2.2, 70.0], [2.3, 74.6], [2.4, 71.0], 
                [3.0, 78.8], [3.1, 77.8], [3.2, 66.2], [3.3, 86.4], [3.4, 81.8], 
                [4.0, 74.8], [4.1, 70.0], [4.2, 72.4], [4.3, 84.1], [4.4, 69.1], 
                [5.0, 87.8], [5.1, 84.7], [5.2, 73.4], [5.3, 72.1], [5.4, 82.6],
                [5.5, 88.7], [5.6, 84.1], [5.7, 94.1], [5.8, 74.9], [5.9, 89.1],
                [6.0, 75.6], [6.1, 86.2], [6.2, 75.3], [6.3, 87.1], [6.4, 65.2],
                [6.5, 77.0], [6.6, 61.4], [6.7, 76.8], [6.8, 86.8], [6.9, 72.2],
                [7.0, 71.6], [7.1, 84.8], [7.2, 68.2], [7.3, 66.1], [7.4, 72.0],
                [7.5, 64.6], [7.6, 74.8], [7.7, 70.0], [7.8, 78], [7.9, 63.2],
                [8.0, 79.1], [8.1, 78.9], [8.2, 67.7], [8.3, 66.0], [8.4, 68.2],
                [8.5, 63.9], [8.6, 72.0], [8.7, 66.8], [8.8, 74.5], [8.9, 90.9],
                [9.0, 93.0], [9.1, 80.9], [9.2, 72.7], [9.3, 68.0], [9.4, 70.9],
                [9.5, 72.5], [9.6, 72.5], [9.7, 83.4], [9.8, 75.5], [9.9, 73.0],
                [10.1, 70.2], [10.2, 73.4], [10.3, 70.5], [10.4, 68.9], [10.5, 92.3],
                [10.6, 68.4], [10.7, 85.9], [10.8, 75.7], [10.9, 84.5], [10.0, 87.7],
                [11.0, 86.4], [11.1, 73.2], [11.2, 83.9], [11.3, 72.0], [11.4, 55.5],
                [11.5, 68.4], [11.6, 83.2], [11.7, 72.7], [11.8, 64.1], [11.9, 72.3],
                [12.0, 65.0], [12.1, 86.4], [12.2, 65.0], [12.3, 88.6], [12.4, 84.1],
                [12.5, 66.8], [12.6, 75.5], [12.7, 93.2], [12.8, 82.7], [12.9, 58.0],
                [13.0, 79.5], [13.1, 78.6], [13.2, 71.8], [13.3, 76.4], [13.4, 72.2],
                [13.5, 83.6], [13.6, 85.5], [13.7, 90.9], [13.8, 85.9], [13.9, 89.1],
                [14.0, 75.0], [14.1, 77.7], [14.2, 86.4], [14.3, 90.9], [14.4, 73.6],
                [14.5, 76.4], [14.6, 69.1], [14.7, 84.5], [14.8, 64.5], [14.9, 69.1],
                [15.0, 88.6], [15.1, 86.4], [15.2, 80.9], [15.3, 87.7], [15.4, 94.5],
                [15.5, 80.2], [15.6, 72.0], [15.7, 71.4], [15.8, 72.7], [15.9, 84.1],
                [16.0, 76.8], [16.1, 63.6], [16.2, 80.9], [16.3, 80.9], [16.4, 85.5],
                [16.5, 68.6], [16.6, 67.7], [16.7, 66.4], [16.8, 72.3], [16.9, 70.5],
                [17.0, 95.9], [17.1, 84.1], [17.2, 87.3], [17.3, 71.8], [17.4, 65.9],
                [17.5, 95.9], [17.6, 91.4], [17.7, 81.8], [17.8, 96.8], [17.9, 69.1],
                [18.0, 82.7], [18.1, 75.5], [18.2, 79.5], [18.3, 73.6], [18.4, 91.8],
                [18.5, 84.1], [18.6, 85.9], [18.7, 81.8], [18.8, 82.5], [18.9, 80.5],
                [19.0, 70.0], [19.1, 81.8], [19.2, 84.1], [19.3, 90.5], [19.4, 91.4],
                [19.5, 89.1], [19.6, 85.0], [19.7, 69.1], [19.8, 73.6], [19.9, 80.5],
                [20.0, 82.7], [20.1, 86.4], [20.2, 67.7], [20.3, 92.7], [20.4, 93.6],
                [20.5, 70.9], [20.6, 75.0], [20.7, 93.2], [20.8, 93.2], [20.9, 77.7] 
            ],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            } 
        }
    ]
};
   
/*
柱状图选项初始化
*/
  var optionBar=  {
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    legend: {
        data:['推荐域信任度','非推荐域信任度' ]
    }, 
    calculable : true,
    xAxis : [
        {
            type : 'category',
            data : ['属性一','属性二','属性三','属性四','属性五','属性六','属性七','属性八']
        }
    ],
    yAxis : [
        {
            type : 'value',
			name:'信任度'
        }
    ],
    series : [
        {
            name:'推荐域信任度',
            type:'bar',
			itemStyle : {
				normal: {
					borderWidth:1,
					lineStyle: {
						type: 'solid',
						shadowBlur: 10
					},
					color:'#FF66CC'
				}
			}, 
            data:[32, 33, 30, 33, 39, 33, 32,29]
        },
        {
            name:'非推荐域信任度',
            type:'bar', 
			itemStyle : {
				normal: {
					borderWidth:1,
					lineStyle: {
						type: 'solid',
						shadowBlur: 10
					},
					color:'#CC99CC'
				}
			}, 
            data:[12, 13, 10, 13, 9, 23, 21,32]
        }  
    ]
};
                    
/*
推荐域的折线图选项初始化
*/ 
var optionLine2=  { 
	  title : {
        text: '推荐域实体变化' 
    },
    tooltip : {
        trigger: 'axis'
    },  
    calculable : true,
    xAxis : [
        {
            type : 'category',
			name:'时间节点',
            boundaryGap : false,
            data : ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24']
        }
    ],
    yAxis : [
        {
            type : 'value',
			name:'历史个数' 
        }
    ],
    series : [
        {
            name:'实体变化变化',
            type:'line', 
			itemStyle : {
				normal: {
					borderWidth:1,
					lineStyle: {
						type: 'solid',
						shadowBlur: 10
					},
					color:'#00CC33'
				}
			}, 
			data:[10,5,7,9,11,4,7,8,9,10,12,6, 5, 7, 3, 6, 13, 7,14,11,8,9,10,7],
            markPoint : {
                data : [
                    {type : 'max', name: '实体个数'} 
                ],
				itemStyle : {
					normal: {
						borderWidth:1,
						lineStyle: {
							type: 'solid',
							shadowBlur: 10
						},
						color:'#98AEEA'
					}
				}
            },
            markLine : {
                data : [
                    {type : 'average', name: '个数平均值'}
                ],
				itemStyle : {
					normal: {
						borderWidth:1,
						lineStyle: {
							type: 'solid',
							shadowBlur: 10
						},
						color:'#98E5EA'
					}
				}
            }
        } 
    ]
};

 /*
 *关系节点图
 */
 var optionForce={ 
    tooltip : {
        trigger: 'item',
        formatter: '{a} : {b}'
    }, 
    legend: {
        x: 'left',
        data:['家人','朋友']
    },
    series : [
        {
            type:'force',
            name : "人物关系",
            ribbonType: false,
            categories : [
                {
                    name: '人物'
                },
                {
                    name: '家人'
                },
                {
                    name:'朋友'
                }
            ],
            itemStyle: {
                normal: {
                    label: {
                        show: true,
                        textStyle: {
                            color: '#333'
                        }
                    },
                    nodeStyle : {
                        brushType : 'both',
                        borderColor : 'rgba(255,215,0,0.4)',
                        borderWidth : 1
                    },
                    linkStyle: {
                        type: 'curve'
                    }
                },
                emphasis: {
                    label: {
                        show: false
                        // textStyle: null      // 默认使用全局文本样式，详见TEXTSTYLE
                    },
                    nodeStyle : {
                        //r: 30
                    },
                    linkStyle : {}
                }
            },
            useWorker: false,
            minRadius : 15,
            maxRadius : 25,
            gravity: 1.1,
            scaling: 1.1,
            roam: 'move',
            nodes:[
                {category:0, name: '乔布斯', value : 10, label: '乔布斯\n（主要）'},
                {category:1, name: '丽萨-乔布斯',value : 2},
                {category:1, name: '保罗-乔布斯',value : 3},
                {category:1, name: '克拉拉-乔布斯',value : 3},
                {category:1, name: '劳伦-鲍威尔',value : 7},
                {category:2, name: '史蒂夫-沃兹尼艾克',value : 5},
                {category:2, name: '奥巴马',value : 8},
                {category:2, name: '比尔-盖茨',value : 9},
                {category:2, name: '乔纳森-艾夫',value : 4},
                {category:2, name: '蒂姆-库克',value : 4},
                {category:2, name: '龙-韦恩',value : 1},
            ],
            links : [
                {source : '丽萨-乔布斯', target : '乔布斯', weight : 1, name: '女儿'},
                {source : '保罗-乔布斯', target : '乔布斯', weight : 2, name: '父亲'},
                {source : '克拉拉-乔布斯', target : '乔布斯', weight : 1, name: '母亲'},
                {source : '劳伦-鲍威尔', target : '乔布斯', weight : 2},
                {source : '史蒂夫-沃兹尼艾克', target : '乔布斯', weight : 3, name: '合伙人'},
                {source : '奥巴马', target : '乔布斯', weight : 1},
                {source : '比尔-盖茨', target : '乔布斯', weight : 6, name: '竞争对手'},
                {source : '乔纳森-艾夫', target : '乔布斯', weight : 1, name: '爱将'},
                {source : '蒂姆-库克', target : '乔布斯', weight : 1},
                {source : '龙-韦恩', target : '乔布斯', weight : 1},
                {source : '克拉拉-乔布斯', target : '保罗-乔布斯', weight : 1},
                {source : '奥巴马', target : '保罗-乔布斯', weight : 1},
                {source : '奥巴马', target : '克拉拉-乔布斯', weight : 1},
                {source : '奥巴马', target : '劳伦-鲍威尔', weight : 1},
                {source : '奥巴马', target : '史蒂夫-沃兹尼艾克', weight : 1},
                {source : '比尔-盖茨', target : '奥巴马', weight : 6},
                {source : '比尔-盖茨', target : '克拉拉-乔布斯', weight : 1},
                {source : '蒂姆-库克', target : '奥巴马', weight : 1}
            ]
        }
    ]
};
 
 
 /*
*Echarts初始化
*/
function InitEharts(echarts){ 
	var myLine = echarts.init(document.getElementById('line'));
	myLine.setOption(optionLine);
	//在折线图上绑定单击事件
	var ecConfig = require('echarts/config');
		//单击模拟请求主体
		function clickRequest(param,myLine) {
			/*
			*此处应该写单击事件，
			*这个单击事件的作用是，响应折线图上的点击事件，
			*然后向后台传输节点名称，以及在此处是第几次请求权限，
			*然后接受到后台的数据，绘制下面tab的柱状图，是属性-信任度的图
			*各个属性的推荐与非推荐的信任度。鼠标放在某个柱柱上面显示这个属性的各个节点的评价。
			*/
			console.log("点击事件");
		}
		myLine.on(ecConfig.EVENT.CLICK, clickRequest); 
	//散点图初始化	
	var myPoint = echarts.init(document.getElementById('point'));
	myPoint.setOption(optionPoint);
	//柱状图初始化
	var myBar = echarts.init(document.getElementById('bar'));
	myBar.setOption(optionBar);
	//折线图2初始化
	var myLine2 = echarts.init(document.getElementById('line2'));
	myLine2.setOption(optionLine2);
	//关系图初始化
	var myForce = echarts.init(document.getElementById('force'));
	myForce.setOption(optionForce);
}
 //avalon初始化设置
var model=avalon.define({
	$id:"avalon",
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
	]

});
  //数据处理模块。
  