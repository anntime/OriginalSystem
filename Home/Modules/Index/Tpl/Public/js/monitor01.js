//avalon初始化设置
var model=avalon.define({
	$id:"avalon",
	//控制弹出框是否显示
	istrue:false,
	//显示系统参数
	//权限数目
	authNum:0,
	authPer:0,
	//今日交互次数
	interNum:0,
	interPer:0,
	//网络环境数目
	netNum:0,
	netPer:0,
	//用户数量
	userNum:0,
	userPer:0,
	Xtime:[],
	Ytime:[],
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
	showDialog:function(data){
		model.istrue=data;
	}

});
/*
*堆积折线图选项初始化
*/ 
var optionStackedLine;
var myStackedLine;
 /*
*标准饼图初始化
*/	
var myStandPie;
var optionStandPie = {
	color : ['#ffc100', '#418bca', '#ff0066'],
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
     legend: {
        orient : 'horizontal',
        y: 'bottom' ,
		itemGap:15,
		itemHeight:15, 
		textStyle:{color: 'auto'},
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
            data:[]
        }
    ]
};
            
/*
*Echarts初始化
*/
function InitEharts(echarts){  
	myStandPie = echarts.init(document.getElementById('standPie'));
	//myStandPie.setOption(optionStandPie); 
	myStackedLine = echarts.init(document.getElementById('stackedLine')); 
}
 
/*
*页面初始化
*/
var monitorData;
function init(){
	monitorData=yysAjaxRequest("GET",{},"../Monitor/InitMonitor");
	console.log(monitorData);
	//填充四个小卡片
	fillSystemPara(monitorData.SystemPara);
	fillTodayInter(monitorData.TodayInterTimes);
	fillTopTime(monitorData.Top10ByTimes);
	fillLastTop(monitorData.Last10);
	fillAuthNum(monitorData.PowerTimes);
}
/*
*填充小卡片（系统参数）
*/
function fillSystemPara(sysPara){
	model.authNum=sysPara.AuthSetting.AuthNum;
	var authTotleNum=sysPara.AuthSetting.MaxAuthNum;
	model.authPer=model.authNum/authTotleNum;
	
	model.interNum=sysPara.MutualTimes.TodayInterTimes;
	var interTotleNum=sysPara.MutualTimes.AllTimes;
	model.interPer=model.interNum/interTotleNum;
	
	model.netNum=sysPara.NetSetting.NetNum;
	var netTotleNum=sysPara.NetSetting.MaxNet;
	model.netPer=model.netNum/netTotleNum;
	
	model.userNum=sysPara.UserNum.CurrentUserNum;
	var userTotleNum=sysPara.UserNum.MaxUserNum;
	model.userPer=model.userNum/userTotleNum;
}
/*
*填充当天动态交互次数
*/
function fillTodayInter(interData){
	var XaxisStr=interData.Xtime;
	
	var YaxisStr=interData.Times;
	var Xarr=XaxisStr.split(",");
	console.log(XaxisStr);
	var Yarr=YaxisStr.split(",");
	optionStackedLine={
		 tooltip : {
			trigger: 'axis'
		},
		calculable : true,
		xAxis : [
			{
				type : 'category',
				data : Xarr.reverse(),
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
				data:Yarr.reverse(),
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
	myStackedLine.setOption(optionStackedLine);
}
/*
*填充top10用户访问表格
*/
function fillTopTime(timeData){
	var obj=[];
	for(var i=0;i<10;i++){
		var name=timeData[i].username;
		var ip=timeData[i].ip;
		var num=timeData[i].times;
		var auth=timeData[i].totalScore;
		obj.push({name:name,ip:ip,num:num,auth:auth});
	}
	model.topArr=obj;
}
/*
*填充最近top10用户访问表格
*/
function fillLastTop(lastData){
	var authArr=["读","读写","读写删"]
	var obj=[];
	for(var i=0;i<lastData.length;i++){
		var name=lastData[i].username;
		var ip=lastData[i].ip;
		var isPass=lastData[i].isPass;
		var auth=lastData[i].request;
		var city=lastData[i].province+lastData[i].city;
		obj.push({name:name,ip:ip,isPass:isPass,city:city,auth:authArr[auth]});
	}
	model.topNum=obj;
}
/*
*填充各类访问权限次数
*/
function fillAuthNum(authNum){
	var series=optionStandPie.series;
	console.log(series);
	var seriesData=[];
	for(var i=0;i<authNum.length;i++){
		var value=authNum[i].Times;
		var name=authNum[i].requestName;
		seriesData.push({value:value,name:name});
	}
	optionStandPie.series[0].data=seriesData;
	console.log(optionStandPie);
	myStandPie.setOption(optionStandPie);
}