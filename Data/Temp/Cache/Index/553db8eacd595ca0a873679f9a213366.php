<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta charset="utf-8">
        <style type="text/css">
            body {
                margin: 0;
            }
            #main {
                height: 100%;
            }
        </style>
		<link href="/OriginalSystem/Application/Index/View/Public/css/main-baidu.css" rel="stylesheet" type="text/css">
		<script src="/OriginalSystem/Application/Index/View/Public/js/json2.js"></script>
		<script src="/OriginalSystem/Application/Index/View/Public/js/avalon.js"></script>
		<script>
            avalon.config({
                loader: false,
				interpolate:["{%","%}"]
            })
        </script>
		<script src="/OriginalSystem/Application/Index/View/Public/js/echarts.js"></script>
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ZUONbpqGBsYGXNIYHicvbAbM"></script>
		
        <script src="/OriginalSystem/Application/Index/View/Public/js/jquery.min.js"></script>
        <script src="/OriginalSystem/Application/Index/View/Public/js/somefunction.js"></script>
		<script src="/OriginalSystem/Application/Index/View/Public/js/CityGeoCoord.js"></script>
        <script src="/OriginalSystem/Application/Index/View/Public/js/InterDeal.js"></script>
		<script>
			require.config({
				paths: {
					echarts: '/OriginalSystem/Application/Index/View/Public/js'
				},
				packages: [
					{
						name: 'BMap',
						location: '/OriginalSystem/Application/Index/View/Public/js/src',
						main: 'main'
					}
				]
			});

			require(
				[
					'echarts',
					'BMap',
					'echarts/chart/map'
				],
				DrawEChart
			); 
		</script>
    </head>
    <body style="-moz-user-select: none;" ms-controller="avalon">
		<div class="content-wrap">
			<!--地图界面-->
				<div class="migration-map"  id="main"></div>
			<!--地图结束-->
			<!--右侧的浮层-->
				<div style="display: block;" class="list-wrap none">
					<!--客体搜索-->
						<div style="" class="search-box input-group fl div_region_container">
							<input city="" province="" style="" autocomplete="off" id="input_cityName" placeholder="请输入省/市" class="form-control input-box" type="text">
							<div class="search-btn text-center" id="btn_city_search">
								<a href="javascript:;" class="input-group-addon ">
								   <i class="i i02"></i>
								</a>
							</div>
						</div>
					<!--客体搜索结束-->
					<div class="search-wrap">
						<!--权限选择-->
						<div class="clearfix" id="div_region_time" ms-visible="radioModel">
							<label>请选择要请求的权限：</label><br/>
								<label>
								  <input type="radio" ms-duplex-string="authority" name="authority" id="1" value="1"> 访问
							   </label>
							   <br/>
							   <label>
								  <input type="radio" ms-duplex-string="authority" name="authority" id="2" value="2"> 读写
							   </label>
							   <br/>
							   <label>
								  <input type="radio" ms-duplex-string="authority" name="authority" id="3" value="3"> 读写删
							   </label> 
							   <div class="button-box b1 tab_china_move drawMap"  >
							   <span class="btn-group " style="top:15px">
									<a class="btn btn-default" command="-1" href="javascript:;" ms-click="changeBut()"> 确定</a>
								</span>
								</div>
						</div>
						<!--权限选择结束-->
					</div>
					<!--默认显示的按钮组-->
					<div class="button-box b1 tab_china_move drawMap" ms-visible="init">
						<span class="btn-group ">
						<a class="btn btn-default" command="-1" href="javascript:;" > 最热线路</a>
						</span>
						<span class="btn-group">
						<a class="btn btn-default" command="0" href="javascript:;">迁入热市</a>
						</span>
						<span class="btn-group">
						<a class="btn btn-default" command="1" href="javascript:;">迁出热市</a>
						</span>
					</div>
					<!--评价按钮组-->
						<div class="button-box b2 tab_city_move" ms-visible="evaluation">
							<span class="btn-group">
								<a class="btn btn-default current" command="2" ms-click="changeEvalu(0)" href="javascript:;">间接评价</a>
							</span>
							<span class="btn-group">
								<a class="btn btn-default" command="3" ms-click="changeEvalu(1)" href="javascript:;">直接评价</a>
							</span>
						</div>
					<!--评价按钮组结束-->
					<!--评价列表显示-->
						<div class="outer-wrap"  >
							<!--间接评价列表-->
							<div class="div_list_container" ms-visible="indirect">
								<div class="row" ms-repeat-el="indirNameArr">
									<span class="serial-number col" >{%$index+1%}</span>
									<a class="col city-name"  href="javascript:;">{%el.name%}</a>
									<i class="col i i11"></i>
									<a class="col-3 city-name" href="javascript:;">{%goalPoint%}</a>
									&nbsp;
									<span class="percent">
										<span data="perMil">{%el.value%}</span>
									</span>
								</div>
								
							</div>
							<!-- 直接评价列表 -->
							<div class="div_list_container" ms-visible="direct">
								<div class="row" >
									<!-- <span class="serial-number col" data="index">{%$index+1%}</span>
									<a class="col city-name" data="startName" href="javascript:;">{%el.name%}</a>
									<i class="col i i11"></i>
									<a class="col-3 city-name" data="endName" href="javascript:;">{%goalPoint%}</a>
									<span class="percent">
									<span data="perMil">{%el.value%}</span>
									</span> -->
									<span class="serial-number col" data="index">1</span>
									<a class="col city-name" data="startName" href="javascript:;">
										环境因素
									</a>
									<i class="col i i11"></i>
									<span class="percent">
										<span data="perMil">4.2</span>
									</span>
								</div>
								<div class="row" >
									<span class="serial-number col" data="index">1</span>
									<a class="col city-name" data="startName" href="javascript:;">
										风险因素
									</a>
									<i class="col i i11"></i>
									<span class="percent">
										<span data="perMil">5.1</span>
									</span>
								</div>
								<div class="row" >
									<span class="serial-number col" data="index">1</span>
									<a class="col city-name" data="startName" href="javascript:;">
										利益因素
									</a>
									<i class="col i i11"></i>
									<span class="percent">
										<span data="perMil">6.2</span>
									</span>
								</div>
								<div class="row" >
									<span class="serial-number col" data="index">1</span>
									<a class="col city-name" data="startName" href="javascript:;">
										奖惩因素
									</a>
									<i class="col i i11"></i>
									<span class="percent">
										<span data="perMil">5.8</span>
									</span>
								</div>
								<div class="row" >
									<span class="serial-number col" data="index">1</span>
									<a class="col city-name" data="startName" href="javascript:;">
										网络因素
									</a>
									<i class="col i i11"></i>
									<span class="percent">
										<span data="perMil">7.3</span>
									</span>
								</div>
								<div class="row" >
									<span class="serial-number col" data="index">1</span>
									<a class="col city-name" data="startName" href="javascript:;">
										社会因素
									</a>
									<i class="col i i11"></i>
									<span class="percent">
										<span data="perMil">1.2</span>
									</span>
								</div>
							</div>
						</div>
					<!--间接评价列表显示结束-->
				</div>
			<!--浮层结束-->
			<!--返回按钮开始-->
				<div style="right: 330px; display: block;" class="other-box none">
					<div class="return btn_back_china block">
						<div  class="back-btn">
							<i ms-click="rebackClick()" class="i i16"></i>
						</div>
						<!--<div class="tip-box">返回<span></span></div>-->
					</div>
				</div>
			<!--返回按钮结束-->
			<!--X坐标日期选择开始-->
				<div class="bottom-box">
					<div class="chart-box">
						<div style="overflow-x: hidden; display: inline-block; width: 100%;">
						</div>
						<!--趋势图切换按钮-->
						<div class="chart-type i i01" id="btn_chart_toggle" style="">
						</div>
					</div>
					<div class="timeline clearfix" id="timeline">
						<div class="leftArrow-btn i i03"></div>
						<div class="rightArrow-btn i i04"></div>
						<div class="line"></div>
						<div class="swiper-container" style="">
							<div style="width: 700px; height: 33px; transform: translate3d(20px, 0px, 0px); transition-duration: 0s;" class="swiper-wrapper" id="div_date_container">
								
								<div style="width: 72px; height: 33px;" class="time-row swiper-slide swiper-slide-visible swiper-slide-active" ms-click="clickTimeLine(el.id,el.time)" ms-repeat="timeLine" >
									<span class="time-container">
										<span data="solar-date">{%el.id%}</span><br>
										<span class="time-down">
											<span data="lunar-date">{%el.value%}</span>
										</span>
										<span></span>
									</span>
								</div>
								<div style="width: 72px; height: 33px;" class="time-row swiper-slide swiper-slide-visible current" ms-click="clickTimeLine(userId,time)">
									<span class="time-container">
										<span data="solar-date">{%userId%}</span><br>
										<span class="time-down">
											<span data="lunar-date">{%authId%}</span>
										</span>
										<span></span>
									</span>
								</div>
							</div>
							<div class="pagination">
								<span class="swiper-pagination-switch"></span>
								<span class="swiper-pagination-switch swiper-visible-switch swiper-active-switch"></span>
								<span class="swiper-pagination-switch swiper-visible-switch"></span>
								<span class="swiper-pagination-switch swiper-visible-switch"></span>
								<span class="swiper-pagination-switch swiper-visible-switch"></span>
								<span class="swiper-pagination-switch swiper-visible-switch"></span>
								<span class="swiper-pagination-switch swiper-visible-switch"></span>
								<span class="swiper-pagination-switch swiper-visible-switch"></span>
								<span class="swiper-pagination-switch swiper-visible-switch"></span>
							</div>
						</div>
					</div>
				</div>
			<!--日期选择结束-->
		</div>
        
    </body>
</html>