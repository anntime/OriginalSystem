<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>监控模块</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<!--导航栏-->
		<link href="__PUBLIC__/monitor/bootstrap.css" rel="stylesheet">
		<link href="__PUBLIC__/monitor/jquery.css" rel="stylesheet"> 
		<link href="__PUBLIC__/css/font-awesome.css" rel="stylesheet"> 
		<link href="__PUBLIC__/monitor/minimal.css" rel="stylesheet">
		<link href="__PUBLIC__/monitor/rickshaw.css" rel="stylesheet">	
		<link href="__PUBLIC__/monitor/morris.css" rel="stylesheet"> 
		
		<script src="__PUBLIC__/js/china.js"></script> 
		<script src="__PUBLIC__/js/jquery.min.js"></script> 
		<script src="__PUBLIC__/js/somefunction.js"></script> 
		<script type="text/javascript" src="__PUBLIC__/monitor/jquery.nicescroll.js"></script>
		<script type="text/javascript" src="__PUBLIC__/monitor/jquery_005.js"></script>
		<script>
			  $(document).ready(function() {
				var nice = $("html").niceScroll(); 
			  });
		</script>
		<script src="__PUBLIC__/monitor/raphael-min.js"></script> 
		<script src="__PUBLIC__/monitor/d3.js"></script> 
		<script src="__PUBLIC__/monitor/rickshaw.js"></script>
		<script src="__PUBLIC__/monitor/summernote.js"></script>
		<script src="__PUBLIC__/monitor/chosen.js"></script>
		<script src="__PUBLIC__/monitor/minimal.js"></script>
		<!--不知道为什么要引入啊。。。我是笨蛋啊。。-->
		<script src="__PUBLIC__/js/avalon.js"></script>
		<script>
            avalon.config({
                loader: false,
				interpolate:["{%","%}"]
            })
        </script>
		<script src="__PUBLIC__/js/echarts.js"></script>
		<script src="__PUBLIC__/js/monitor02.js"></script> 
		<script>
			require.config({
				paths: {
					echarts: '../Public/js'
				}
			});
			require(
				[
					'echarts',
					'echarts/chart/map',
					'echarts/chart/pie',
					'echarts/chart/bar',
					'echarts/chart/line'
				],
				InitEharts
			); 
		</script> 	 
	</head>
	<body style="position: relative;" class="bg-1" ms-controller="avalon">
		<div class="mm-page">
			<div class="adcenter">	
			</div>
			<div class="mask" style="display:none">
				<div id="loader" style="display:none"></div>
			</div>
			<div id="wrap">
				<!-- Make page fluid -->
				<div class="row">
					<!-- Fixed navbar -->
					<div id="navbar" class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top">
						<!-- Branding -->
						<div class="navbar-header col-md-2">
							<a class="navbar-brand" href="#">
								<strong>监控</strong>模块
							</a>
							<div class="sidebar-collapse">
							  <a href="#">
								<i class="fa fa-bars"></i>
							  </a>
							</div>
						</div>
						<!-- Branding end -->
						<!-- .nav-collapse -->
						<div class="navbar-collapse">
							<!-- Page refresh -->
							<ul class="nav navbar-nav refresh">
							  <li class="divided">
								<a href="#" class="page-refresh"><i class="fa fa-refresh"></i></a>
							  </li>
							</ul>
							<!-- /Page refresh -->
							<!-- Quick Actions -->
							<!--ul class="nav navbar-nav quick-actions">
							  
								<li class="dropdown divided">

									<a class="dropdown-toggle button" data-toggle="dropdown" href="#">
									  <i class="fa fa-tasks"></i>
									  <span class="label label-transparent-black">2</span>
									</a>
								</li>
								<li class="dropdown divided">
									<a class="dropdown-toggle button" data-toggle="dropdown" href="#">
									  <i class="fa fa-envelope"></i>
									  <span class="label label-transparent-black">1</span>
									</a>
								</li>
								<li class="dropdown divided">
                
									<a class="dropdown-toggle button" data-toggle="dropdown" href="#">
									  <i class="fa fa-bell"></i>
									  <span class="label label-transparent-black">3</span>
									</a>
								</li>
							</ul-->
							<!-- Sidebar -->
							<ul tabindex="5000" style="overflow: hidden;" class="nav navbar-nav side-nav" id="sidebar">
								<li class="navigation" id="navigation">
									<a href="#" class="sidebar-toggle" data-toggle="#navigation">系统设置 
									<i class="fa fa-angle-up"></i>
									</a>
									<ul class="menu">
										<li class="active">
											<a href="index">
											  <i class="fa fa-tachometer"></i> 系统参数
											  <!--span class="badge badge-red">1</span-->
											</a>
										</li>

										<li class="dropdown">
											<a href="index" class="dropdown-toggle" data-toggle="dropdown">
											  <i class="fa fa-list"></i> 当天动态交互次数 <b class="fa fa-plus dropdown-plus"></b>
											</a>
											<!--ul class="dropdown-menu">
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Common Elements
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Validation
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Form Wizard
												</a>
											  </li>
											</ul-->
										</li> 
										<li class="dropdown">
											<a href="index" class="dropdown-toggle" data-toggle="dropdown">
											  <i class="fa fa-pencil"></i> TOP 10用户访问 <b class="fa fa-plus dropdown-plus"></b>
											</a>
											<!--ul class="dropdown-menu">
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> UI Elements
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Typography
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Tiles
												</a>
											  </li>
											</ul-->
										</li>
										<li class="">
											<a href="index">
											  <i class="fa fa-tint"></i> 服务器承载
											</a>
										</li>
											<li class="">
											<a href="index">
											  <i class="fa fa-th"></i> 各类权限访问次数
											</a>
											</li>

										<li class="dropdown">
											<a href="index" class="dropdown-toggle" data-toggle="dropdown">
											  <i class="fa fa-th-large"></i> 最近10次用户访问 <b class="fa fa-plus dropdown-plus"></b>
											</a>
											<!--ul class="dropdown-menu">
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Bootstrap Tables
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> DataTables
												</a>
											  </li>
											</ul-->
										</li>

										<!--li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											  <i class="fa fa-desktop"></i> Example Pages <b class="fa fa-plus dropdown-plus"></b>
											  <span class="label label-greensea">mails</span>
											</a>
											<ul class="dropdown-menu">
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Login Page
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Calendar
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Page 404
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Page 500
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Page Offline
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Gallery
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Timeline
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Vertical Mail
												  <span class="badge badge-red">5</span>
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Horizontal Mail
												  <span class="label label-greensea">mails</span>
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Vector Maps
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Google Maps
												</a>
											  </li>
											</ul>
										</li>

										<li class="">
											<a href="#">
											  <i class="fa fa-play-circle"></i> Widgets
											</a>
										</li>

										<li class="">
											<a href="#">
											  <i class="fa fa-bar-chart-o"></i> Charts &amp; Graphs
											</a>
										</li-->
									</ul>
								</li>
								<li class="navigation" id="summary">
									<a href="#resource" class="sidebar-toggle" data-toggle="#summary">资源请求参数
									<i class="fa fa-angle-up"></i>
									</a>
									<ul class="menu">
										<li class="">
											<a href="#resource">
											  <i class="fa fa-bar-chart-o"></i>资源请求热力图
											  <!--span class="badge badge-red">1</span-->
											</a>
										</li>

										<li class="dropdown">
											<a href="#province" class="dropdown-toggle" data-toggle="dropdown">
											  <i class="fa fa-list"></i> 省市资源请求 <b class="fa fa-plus dropdown-plus"></b>
											</a>
											<!--ul class="dropdown-menu">
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Common Elements
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Validation
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Form Wizard
												</a>
											  </li>
											</ul-->
										</li> 
										<li class="dropdown">
											<a href="#province" class="dropdown-toggle" data-toggle="dropdown">
											  <i class="fa fa-pencil"></i> 详细交互数据 <b class="fa fa-plus dropdown-plus"></b>
											</a>
											<!--ul class="dropdown-menu">
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> UI Elements
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Typography
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Tiles
												</a>
											  </li>
											</ul-->
										</li>
										<!--li class="">
											<a href="#">
											  <i class="fa fa-tint"></i> Buttons &amp; Icons
											</a>
										</li>
										<li class="">
											<a href="#">
											  <i class="fa fa-th"></i> Grid Layout
											</a>
										</li-->

										<!--li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											  <i class="fa fa-th-large"></i> Tables <b class="fa fa-plus dropdown-plus"></b>
											</a>
											<ul class="dropdown-menu">
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Bootstrap Tables
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> DataTables
												</a>
											  </li>
											</ul>
										</li-->

										<!--li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											  <i class="fa fa-desktop"></i> Example Pages <b class="fa fa-plus dropdown-plus"></b>
											  <span class="label label-greensea">mails</span>
											</a>
											<ul class="dropdown-menu">
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Login Page
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Calendar
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Page 404
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Page 500
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Page Offline
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Gallery
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Timeline
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Vertical Mail
												  <span class="badge badge-red">5</span>
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Horizontal Mail
												  <span class="label label-greensea">mails</span>
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Vector Maps
												</a>
											  </li>
											  <li>
												<a href="#">
												  <i class="fa fa-caret-right"></i> Google Maps
												</a>
											  </li>
											</ul>
										</li-->

										<!--li class="">
											<a href="#">
											  <i class="fa fa-play-circle"></i> Widgets
											</a>
										</li>

										<li class="">
											<a href="#">
											  <i class="fa fa-bar-chart-o"></i> Charts &amp; Graphs
											</a>
										</li-->
									</ul> 
								</li>
								<!--li class="settings" id="general-settings">
									<a href="#" class="sidebar-toggle underline" data-toggle="#general-settings">General Settings <i class="fa fa-angle-up"></i>
									</a> 
									<div class="form-group">
									  <label class="col-xs-8 control-label">Switch ON</label>
									  <div class="col-xs-4 control-label">
										<div class="onoffswitch greensea">
										  <input name="onoffswitch" class="onoffswitch-checkbox" id="switch-on" checked="checked" type="checkbox">
										  <label class="onoffswitch-label" for="switch-on">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										  </label>
										</div>
									  </div>
									</div>

									<div class="form-group">
									  <label class="col-xs-8 control-label">Switch OFF</label>
									  <div class="col-xs-4 control-label">
										<div class="onoffswitch greensea">
										  <input name="onoffswitch" class="onoffswitch-checkbox" id="switch-off" type="checkbox">
										  <label class="onoffswitch-label" for="switch-off">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										  </label>
										</div>
									  </div>
									</div>
								</li-->
							</ul>
							<!-- Sidebar end-->
							
						</div>
						<!-- .nav-collapse end-->
					</div>
					<!-- Fixed navbar Over-->
					<!-- Page content -->
					<div tabindex="5001" style="overflow: hidden; padding-left: 265px;" id="content" class="col-md-12">
						<a name="resource"></a>
						<!-- page header -->
						<div class="pageheader"> 
							<h2>
								<i class="fa fa-bar-chart-o"></i> 
								资源请求参数
								<span>在此一览...</span>
							</h2> 
						</div>
						<!-- /page header -->
						<!-- content main container -->
						<div class="main"> 
							<div class="row">
								<div class="col-md-12"> 
									<section class="tile transparent">
										<div class="jumbotron bg-transparent-black-3"> 
											<!--绘制地图-->
											<div id="map" style="height: 570px;" ></div> 
										</div>
									</section> 
								</div>
								<div class="col-lg-8 col-md-12">
									<section class="tile transparent">
										<div class="jumbotron bg-transparent-black-3"> 
											<a name="province"></a>
											<!--绘制玫瑰-->
											<div id="rose" style="height: 600px;left:-300px"></div> 
										</div>
									</section>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
									<section class="tile color transparent-black">
										<div class="tile-header">
											<h1>
											<strong>详细</strong>
											交互数据
											</h1>
										</div>
										<!--绘制表格-->
										<div class="tile-body">
											<table class="table table-custom table-sortable nomargin">
												<thead>
												  <tr> 
													<th class="sortable sort-numeric sort-asc">序号</th>
													<th class="sortable sort-alpha">省份</th>
													<th class="sortable sort-alpha">次数</th> 
												  </tr>
												</thead>
												<tbody>
													<tr ms-repeat-el="province">
														<td class="color-hotpink priority">{%$index+1%}</td>
														<td class="color-orange priority">{%el.province%}</td>
														<td class="color-green priority">{%el.CountNum%}</td> 
													</tr>
												<tbody>
											<table>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>
					<!-- Page content -->
				</div>
				<!-- Make page fluid Over-->
			</div>
		</div>
	 
	<script>
	 //server load rickshaw chart
      var graph; 
      var seriesData = [ [], []];
      var random = new Rickshaw.Fixtures.RandomData(50); 
      for (var i = 0; i < 50; i++) {
        random.addData(seriesData);
      }
      graph = new Rickshaw.Graph( {
        element: document.querySelector("#serverload-chart"),
        height: 150,
        renderer: 'area',
        series: [
          {
            data: seriesData[0],
            color: '#6e6e6e',
            name:'File Server'
          },{
            data: seriesData[1],
            color: '#fff',
            name:'Mail Server'
          }
        ]
      } );

      var hoverDetail = new Rickshaw.Graph.HoverDetail( {
        graph: graph,
      });

      setInterval( function() {
        random.removeData(seriesData);
        random.addData(seriesData);
        graph.update();

      },1000);
	   $('#projectbar1').sparkline([ [1,4], [2, 3], [3, 2], [4, 1] ], { type: 'bar' });
 
	</script>
	
	  
	</body>
</html>