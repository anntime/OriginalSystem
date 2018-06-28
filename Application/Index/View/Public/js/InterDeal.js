
	//设置绘制地图的大小
	$('#main').css({
            height:$('body').height(),
            width: $('body').width()
    });
	//全局变量 记录权限是否改变
	var Record=[0];
	//全局变量，初始化地图风格设置
	var MapStyle={
            styleJson:[
			{
				featureType:"water",
				elementType:"all",
				stylers:{
					color:"#031628"
				}
			},
			{
				featureType:"land",
				elementType:"geometry",
				stylers:{
					color:"#000102"
				}
			},
			{
				featureType:"highway",
				elementType:"geometry.fill",
				stylers:{
					color:"#000000"
				}
			},
			{
				featureType:"highway",
				elementType:"geometry.stroke",
				stylers:{
					color:"#147a92"
				}
			},
			{
				featureType:"arterial",
				elementType:"geometry.fill",
				stylers:{
					color:"#000000"
				}
			},
			{
				featureType:"arterial",
				elementType:"geometry.stroke",
				stylers:{
					color:"#0b3d51"
				}
			},
			{
				featureType:"local",
				elementType:"geometry",
				stylers:{
					color:"#000000"
				}
			},
			{
				featureType:"railway",
				elementType:"geometry.fill",
				stylers:{
					color:"#000000"
				}
			},
			{
				featureType:"railway",
				elementType:"geometry.stroke",
				stylers:{
					color:"#08304b"
				}
			},
			{
				featureType:"subway",
				elementType:"geometry",
				stylers:{
					lightness:-70
				}
			},
			{
				featureType:"building",
				elementType:"geometry.fill",
				stylers:{
					color:"#000000"
				}
			},
			{
				featureType:"all",
				elementType:"labels.text.fill",
				stylers:{
					color:"#857f7f"
				}
			},
			{
				featureType:"all",
				elementType:"labels.text.stroke",
				stylers:{
					color:"#000000"
				}
			},
			{
				featureType:"building",
				elementType:"geometry",
				stylers:{
					color:"#022338"
				}
			},
			{
				featureType:"green",
				elementType:"geometry",
				stylers:{
					color:"#062032"
				}
			},
			{
				featureType:"boundary",
				elementType:"all",
				stylers:{
					color:"#465b6c"
				}
			},
			{
				featureType:"manmade",
				elementType:"all",
				stylers:{
					color:"#022338"
				}
			},
			{
				featureType:"label",
				elementType:"all",
				stylers:{
					color:"#022338",
					visibility:"off"
				}
			}
		]
	};
	
	//echarts绘制地图的相关设置,全局变量。
		var option = {
			//鼠标悬浮交互时的信息提示
			tooltip : {
				//触发类型，默认数据触发
				trigger: 'item',
				//内容格式地图 : a（系列名称），b（区域名称），c（合并数值）, d（无）
				formatter: function (params) {
					var res;
					var url="../index/InterDeal/getInfoById/id/"+params[2];
					var data={id:params[2]};
					returns=yysAjaxRequest("GET",data,url);
					console.log(returns);
					res="用户名："+returns[0].username+"<br/>地址："+returns[0].province+returns[0].city+"<br/>"+"IP:"+returns[0].ip+"<br/>"+""; 
					return res;
				}
			},
			series: [
				{
					type:'map',
					mapType: 'none',
					data:[],
					geoCoord: GetGeoCoord(),
					
					markPoint : {
						symbol: "circle",
						symbolSize: 2,
						
						itemStyle: {
							normal: {
								label: {
									show: false
								},
								color: "rgba(255,69,0,0.3)"
							}
						},
						data: [
						]
					}

				},
				//series[1]中放的是直接评价
				{
					name: 'DirectUser',
					type: 'map',
					mapType: 'none',
					data:[],
					markLine : {
						smooth:true,
						effect : {
							show: true,
							scaleSize: 1,
							period: 30,
							color: 'orange',
							shadowBlur: 10
						},
						itemStyle : {
							normal: {
								borderWidth:1,
								lineStyle: {
									type: 'solid',
									shadowBlur: 10
								},
								color:'orange'
							}
						},
						data : [
						/*
							[{name:'济南市'}, {name:'朝阳区'}],
							[{name:'太原'}, {name:'朝阳区'}],
							[{name:'南昌市'}, {name:'朝阳区'}],
							[{name:'景德镇'}, {name:'朝阳区'}],
							[{name:'婺源'}, {name:'朝阳区'}],
							[{name:'宜春'}, {name:'朝阳区'}],
							[{name:'井冈山'}, {name:'朝阳区'}]
							*/
						]
					},
					markPoint : {
						symbol: "circle",
						symbolSize: 3,
						
						itemStyle: {
							normal: {
								label: {
									show: false
								},
								color: "rgba(255,69,0,0.3)"
							}
						},
						data : [
/*
							{name:'朝阳区',value:1},
							{name:'济南市',value:2},
							{name:'太原',value:3},
							{name:'南昌市',value:4},
							{name:'景德镇',value:5},
							{name:'婺源',value:6},
							{name:'宜春',value:7},
							{name:'井冈山',value:8}
							*/
						],
						geoCoord: GetGeoCoord()
					}
				},
				//series[2]中放的是间接评价
				{
					
					name: 'IndirectUser',
					type: 'map',
					mapType: 'none',
					data:[],
					markLine : {
						smooth:true,
						effect : {
							show: true,
							scaleSize: 1,
							period: 30,
							color: 'yellow',
							shadowBlur: 10
						},
						itemStyle : {
							normal: {
								borderWidth:1,
								lineStyle: {
									type: 'solid',
									shadowBlur: 10
								},
								color:'yellow'
							}
						},
						data : [
						/*
							[{name:'济南市'}, {name:'朝阳区'}],
							[{name:'太原'}, {name:'朝阳区',value:90}],
							[{name:'南昌市'}, {name:'朝阳区',value:80}],
							[{name:'景德镇'}, {name:'朝阳区',value:70}],
							[{name:'婺源'}, {name:'朝阳区',value:60}],
							[{name:'宜春'}, {name:'朝阳区',value:50}],
							[{name:'井冈山'}, {name:'朝阳区',value:40}]
							*/
						]
					},
					markPoint : {
						symbol: "circle",
						symbolSize: 3,
						
						itemStyle: {
							normal: {
								label: {
									show: false
								},
								color: "rgba(255,69,0,0.3)"
							}
						},
						data : [
						/*
							{name:'朝阳区',value:1},
							{name:'济南市',value:2},
							{name:'太原',value:3},
							{name:'南昌市',value:4},
							{name:'景德镇',value:5},
							{name:'婺源',value:6},
							{name:'宜春',value:7},
							{name:'井冈山',value:8}
							*/
						],
						geoCoord: GetGeoCoord()
					}
				}
			]
		};
		
	//avalon控制模块
	var model=avalon.define({
		//avalon 控制范围声明
		$id:"avalon",
		//权限选择初始化
		authority:"0",
		//控制权限选择表单显示与隐藏
		radioModel:false,
		direct:false,
		indirect:false,
		evaluation:false,
		init:true,
		but:0,
		//间接评价
		indirNameArr:[{name:"香港",value:"2.8"}],
		//直接
		dirNameArr:[],
		goalPoint: "",
		//时间轴控制数组
		timeLine:[
			{id:"ID:1",value:"读"},
			{id:"ID:2",value:"读写"}, 
			{id:"ID:3",value:"读写删"},
			{id:"ID:4",value:"读"},
			{id:"ID:5",value:"读写"},
			{id:"ID:6",value:"读写删"},
			{id:"ID:7",value:"读写"}
		],
		//时间轴当前显示的坐标
		userId:"当前",
		authId:"状态",
		time:"",
		//返回按钮监听事件
		rebackClick:function(){
			window.location.href='../ShowIndex/index';
		},
		changeEvalu:function(tag){
			if($("a").hasClass("current")){
				$("a").removeClass("current");
			}
			$(this).addClass("current");
			if(tag){
				model.direct=true;
				model.indirect=false;
			}else{
				model.direct=false;
				model.indirect=true;
			}
			
		},
		clickTimeLine:function(){
			
		},
		changeBut:function(){
			model.but=1;
		}
	});
	
	//echarts中GeoCoord获得各地的经纬度
	function GetGeoCoord(){
		var a={};
		$(CityGeoCoord).each(
			function(c,d){
				a[d.ProvinceName]=d.LatLng;
				$(d.City).each(
					function(b,d){
						a[d.Name]=d.LatLng
					}
				)
			}
		);
		return a;
	}
	//绘制地图echarts，BMapExtension是引入百度地图api与echarts之后引入的变量
    function DrawEChart(echarts, BMapExtension) {
        // 初始化地图
        var BMapExt = new BMapExtension($('#main')[0], BMap, echarts,{
            enableMapClick: false
        });
        var map = BMapExt.getMap();
        var container = BMapExt.getEchartsContainer();
		//113.114129,35.550339
        var startPoint = {
            x: 113.114129,
            y: 35.550339
        };
        var point = new BMap.Point(startPoint.x, startPoint.y);
		map.centerAndZoom(point, 5);
		map.disableDragging();
		map.disableScrollWheelZoom(true);
		map.disableDoubleClickZoom();
		map.disableInertialDragging();
		var myChart = BMapExt.initECharts(container);
		//地图加载过程中显示等待字样
		/*myChart.showLoading({
			text :"数据加载中",
			effect : 'whirling' ,
			textStyle : {
				fontSize : 20
			}
		});*/
        // 地图自定义样式
        map.setMapStyle(MapStyle);
		/*放置option变量*/
        BMapExt.setOption(option);
		//得到series
		var series=myChart.getSeries();
		initOption(series,myChart);
		BMapExt.refresh();
		console.log(option);
		//隐藏”等待加载“字样
		//myChart.hideLoading();
		var ecConfig = require('echarts/config');
		//单击模拟请求主体
		function clickRequest(param,myChart) {
			//显示权限列表
			model.radioModel=true;
			model.init=false;
			model.evaluation=false;
			model.indirect=false;
			model.direct=false;
			//var authId=model.authority;
			console.log(option.series);
			console.log(param);
			var id=param.value;
			var name=param.name;
			//监控权限值的变化
			watchAuth(name,id,series,myChart,BMapExt);
			var jsonobj;
			jsonobj=initRequest();
			//填充坐标轴
			fillTimeLine(jsonobj.timeline); 
		}
		myChart.on(ecConfig.EVENT.CLICK, clickRequest);
		//BMapExt.refresh();
		//坐标轴点击事件
		model.clickTimeLine=function (id,time){
			if($("div").hasClass("current")){
				$("div").removeClass("current");
			}
			$(this).addClass("current");
			//time=transdate(time);
			if(id!="当前"){
				series[0].markPoint.data.length=0;
				myChart.setSeries(series,true);
				BMapExt.refresh();
				//myChart.clear();
				ajaxTimeLine(series,id,myChart,time);
			}else{
				model.indirect=false;
				model.evaluation=false;
				//清空图表重新加载
				clearChart(myChart,series);
				BMapExt.refresh();
				//myChart.clear();
				initOption(series,myChart);
			}
			
			BMapExt.refresh();
		}
    }
	/*
	*监控authority的变化
	*/
	function watchAuth(name,id,series,myChart,BMapExt){
	
		model.$watch('but', function(newValue, oldValue) { 
			var tag=Record.join().indexOf(id);
			if(newValue!=0&&tag==-1){
				console.log(tag);
				console.log(Record.join());
				//将请求的权限一起传递到后台
				clickAjax(name,id,model.authority,series,myChart);
				Record.push(id);
			 }
			BMapExt.refresh();	
			model.radioModel=false;	
			model.indirect=true;
			model.but=0;
			model.authority=0;
		});
		
		
	}
	/*
	*向后台请求客体信息，初始化地图
	*/
	function initOption(series,myChart){
		var jsonobj;
		jsonobj=initRequest();
		//得到series中的geoCoord
		//var geoCoord=series[0].geoCoord;
		//得到series中markPoint的data
		var markPointData=series[0].markPoint.data;
		//将后台返回的数据填充到series中markPoint的data
		markPointData=makePointData(jsonobj.userInfo,markPointData);
		//更新图表的最新数据
		series[0].markPoint.data=markPointData;
		myChart.setSeries(series,true);
		console.log(series[0].markPoint.data);
		console.log(series);
		//填充坐标轴
		fillTimeLine(jsonobj.timeline);
	}
	
	/*
	*通过Ajax获取图表数据
	*/
	function initRequest(){
		var jsonData;
		//通过Ajax获取图表数据
		jsonData=yysAjaxRequest("GET",{},"../index/InterDeal/InitSimulate");
		return jsonData;
	}
	/*
	*更新CityGeoCoord（没用到）
	*/
	function updateCityGeoCoord(jsonobj){
		for(var i=0;i<jsonobj.length;i++){
			ProvinceName=jsonobj[i].city;
			longitude=jsonobj[i].longitude;
			latitude=jsonobj[i].latitude;
			var LatLng=[longitude,latitude];
			CityGeoCoord.push({ProvinceName:ProvinceName,LatLng:LatLng});
		}
	}
	/*
	*将数据库中的数据填充入series.markPoint.data
	*/
   function makePointData(jsonobj,markPointData){
		for(var i=0;i<jsonobj.length-1;i++){
			console.log(jsonobj);
			name=jsonobj[i].city;
			longitude=jsonobj[i].longitude;
			latitude=jsonobj[i].latitude;
			value=jsonobj[i].userId;
			seriesName=jsonobj[i].username;
			//geoCoord."'"+name+"'"=[longitude+","+latitude];
			markPointData.push({name:name,value:value});
		} 
		return markPointData;
		
	}
	
	/*
	*将数据库中的数据填充入series.markLine.data
	*/
	function makeLineData(jsonobj,markLineIndirect,secondName){
		for(var i=0;i<jsonobj.length;i++){
			firstName=jsonobj[i].city;
			var first={name:firstName};
			var second={name:secondName};
			var tempArr=new Array();
			tempArr.push(first,second); 
			markLineIndirect.push(tempArr);
		} 
		return markLineIndirect;
	}
	/*
	*单击模拟请求主体
	*/
	function clickAjax(name,id,authority,series,myChart){
		series[2].markLine.data.length=0;
		series[2].markPoint.data.length=0;
		var jsonobj;
		jsonobj=yysAjaxRequest("GET",{id:id,request:authority},"../index/InterDeal/DealRequest");
console.log(jsonobj);
		modifyListOfIndirect(jsonobj.IndirectUser,name,id);
		//modifyListOfDirect(jsonobj.DirectUser,name,id)
		/*得到series中markPoint的data
		*series[0]中存放的是点，仅仅是点。
		*series[1]中放的是直接评价
		*series[2]中放的是间接评价
		*/
		//刷新重新绘制地图
		refreshMap(series,jsonobj,myChart,name);
		myChart.setSeries(series,true);
		//model.userId="ID:"+id;
		unix=new Date();
		model.time=unix.getTime();
		//model.authId=getLocalTime(model.time/1000);  
	}
	
	/*
	*刷新重新绘制地图
	*/
	function refreshMap(series,jsonobj,myChart,name){
		
		//填充直接评价
		var markPointDirect=series[1].markPoint.data; 
		markPointDirect=makePointData(jsonobj.DirectUser,markPointDirect);
		series[1].markPoint.data=markPointDirect;
		/*
		var markLineDirect=series[1].markLine.data;
		console.log(markLineDirect);
		markLineDirect=makeLineData(jsonobj.DirectUser,markLineDirect,name);
		series[1].markLine.data=markLineDirect;
		*/
		//填充间接评价
		var markPointIndirect=series[2].markPoint.data;
		markPointIndirect=makePointData(jsonobj.IndirectUser,markPointIndirect);
		series[2].markPoint.data=markPointIndirect;
		var markLineIndirect=series[2].markLine.data;
		markLineIndirect=makeLineData(jsonobj.IndirectUser,markLineIndirect,name);
		series[2].markLine.data=markLineIndirect; 
		myChart.setSeries(series,true);
	}
	/*
	*单击客体之后返回数据修改右侧间接评价
	*/
	function modifyListOfIndirect(jsonobj,goalName,goalId){
		console.log("一次选择");
		model.indirNameArr.length=0;
		var obj=new Array;
		for(var i=0;i<jsonobj.length;i++){
			console.log(jsonobj[i]);
			// var cityName=jsonobj[i].city; 
			var cityName=jsonobj[i].username;
			var score=jsonobj[i].IndirectScore;
			obj[i]={name:cityName,value:score};
		}
		goalName = yysAjaxRequest("GET",{id:goalId},"../index/InterDeal/findNameById");
		console.log(goalName);
		model.indirNameArr=obj; 
		model.goalPoint=goalName; 
		console.log(goalName);
		model.init=false;
		model.evaluation=true;
		model.indirect=true;
	}
	/*
	*单击客体之后返回数据修改右侧直接评价
	
	function modifyListOfDirect(jsonobj,goalName,goalId){
		console.log("一次选择");
		model.dirNameArr.length=0;
		var obj=new Array;
		for(var i=0;i<jsonobj.length;i++){
			console.log(jsonobj[i]);
			// var cityName=jsonobj[i].city; 
			var cityName=jsonobj[i].username;
			var score=jsonobj[i].directScore;
			obj[i]={name:cityName,value:score};
		}
		goalName = yysAjaxRequest("GET",{id:goalId},"../index/InterDeal/findNameById");
		console.log(goalName);
		model.dirNameArr=obj; 
		model.goalPoint=goalName; 
		console.log(goalName);
		model.init=false;
		model.evaluation=true;
		model.indirect=true;
	}*/
	/*
	*填充坐标轴
	*/
	function fillTimeLine(jsonobj){
		model.timeLine.length=0;
		var obj=new Array;
		var len=jsonobj.length;
		for(var i=0;i<len;i++){
			var userId="ID:"+jsonobj[i].userId;
			var authority=jsonobj[i].time;
			time=getLocalTime(authority);
			
			obj[i]={id:userId,value:time,time:authority};
		}
		model.timeLine=obj;
		//model.userId="ID:"+jsonobj[len].userId;
		//model.authId=jsonobj[len].request;
	}
	/*
	*时间轴点击事件ajax请求
	*/
	function ajaxTimeLine(series,id,myChart,time){
		var arr=id.split(":");
		var userId=arr[1];
		var url="../index/InterDeal/getStartTimeline";
		var jsonobj=yysAjaxRequest("GET",{id:userId,time:time},url);
		 var goalCity=jsonobj.MainUser.city;
		var goalName=jsonobj.MainUser.username;
		//清空图表重新加载
		clearChart(myChart,series);
		console.log(jsonobj);
		refreshMap(series,jsonobj,myChart,goalCity); 
		modifyListOfIndirect(jsonobj.IndirectUser,goalName,userId);
		//modifyListOfDirect(jsonobj.DirectUser,goalName,userId);
	}
	/*
	*清空地图重新加载
	*/
	function clearChart(myChart,series){
		series[0].markPoint.data.length=0;
		series[1].markPoint.data.length=0;
		series[1].markLine.data.length=0;
		series[2].markPoint.data.length=0;
		series[2].markLine.data.length=0;
		myChart.setSeries(series,true);
	}
	
	