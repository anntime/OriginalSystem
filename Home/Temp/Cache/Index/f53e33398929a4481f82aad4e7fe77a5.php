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
	    <!--link href="__PUBLIC__/monitor/font-awesome.css" rel="stylesheet"-->
		<link href="__PUBLIC__/monitor/minimal.css" rel="stylesheet">
		<link href="__PUBLIC__/monitor/rickshaw.css" rel="stylesheet">	
		<link href="__PUBLIC__/monitor/morris.css" rel="stylesheet"> 
		<link href="__PUBLIC__/monitor/summernote-bs3.css" rel="stylesheet"> 
		
		
		<script src="__PUBLIC__/js/somefunction.js"></script> 
		<script src="__PUBLIC__/js/jquery.min.js"></script> 
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
		<script src="__PUBLIC__/js/monitor01.js"></script> 
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
	<body style="position: relative;" class="bg-1" ms-controller="avalon" onload="init()">
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
							<!-- Search  
							<div class="search" id="main-search">
							  <i class="fa fa-search"></i> 
							  <input placeholder="Search..." type="text">
							</div>
							 Search end -->
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
											<a href="#system">
											  <i class="fa fa-tachometer"></i> 系统参数
											  <!--span class="badge badge-red">1</span-->
											</a>
										</li>

										<li class="dropdown">
											<a href="#todyInter" class="dropdown-toggle" data-toggle="dropdown">
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
											<a href="#todyUser" class="dropdown-toggle" data-toggle="dropdown">
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
											<a href="#server">
											  <i class="fa fa-tint"></i> 服务器承载
											</a>
										</li>
											<li class="">
											<a href="#authrity">
											  <i class="fa fa-th"></i> 各类权限访问次数
											</a>
											</li>

										<li class="dropdown">
											<a href="#topLast" class="dropdown-toggle" data-toggle="dropdown">
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
									<a href="#" class="sidebar-toggle" data-toggle="#summary">资源请求参数
									<i class="fa fa-angle-up"></i>
									</a>
									<ul class="menu">
										<li class="">
											<a href="resRequest">
											  <i class="fa fa-bar-chart-o"></i>资源请求热力图
											  <!--span class="badge badge-red">1</span-->
											</a>
										</li>

										<li class="dropdown">
											<a href="resRequest" class="dropdown-toggle" data-toggle="dropdown">
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
											<a href="resRequest" class="dropdown-toggle" data-toggle="dropdown">
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
				<div> <a name="system"> </a>
					<div tabindex="5001" style="overflow: hidden; padding-left: 265px;" id="content" class="col-md-12">
						<!-- page header -->
						<div class="pageheader"> 
							<h2>
								<i class="fa fa-tachometer"></i> 
								系统参数
								<span>在此一览...</span>
							</h2> 
							 
						</div>
						<!-- /page header -->
						<!-- content main container -->
						<div class="main"> 
							<!-- cards -->
							<div class="row cards">
								<div class="card-container col-lg-3 col-sm-6 col-sm-12">
									<div class="card card-redbrown hover">
										<div class="front">
											<div class="media">
												<span class="pull-left">
												<i class="fa fa-exchange fa-4x"></i>
												</span>
												<div class="media-body">
													<small>今日交互次数</small>
													<h2 class="media-heading animate-number" data-value="3659" data-animation-duration="1500">{%interNum%}</h2>
												</div>
											</div>
											<div class="progress-list">
												<div class="details">
													<div class="title">占历史次数的百分比</div>
												</div>
												<div class="status pull-right bg-transparent-black-1">
													<span class="animate-number" data-animation-duration="1500" data-value="83">{%interPer%}</span>%
												</div>
												<div class="clearfix"></div>
												<div class="progress progress-little progress-transparent-black">
													<div class="progress-bar animate-progress-bar" data-percentage="83%" ms-css-width="interPer"></div>
												</div>
											</div>
										</div>
										<div class="back">
											<a href="#">
											<i class="fa fa-bar-chart-o fa-4x"></i>
											<span>Check Summary</span>
											</a>
										</div>
									</div>
								</div>
								<div class="card-container col-lg-3 col-sm-6 col-sm-12">
									<div class="card card-blue hover">
										<div class="front">
											<div class="media">
												<span class="pull-left">
												<i class="fa fa-users media-object"></i>
												</span>
												<div class="media-body">
													<small>用户总数</small>
													<h2 class="media-heading animate-number" data-value="3659" data-animation-duration="1500">{%userNum%}</h2>
												</div>
											</div>
											<div class="progress-list">
												<div class="details">
													<div class="title">占系统可承受的百分比</div>
												</div>
												<div class="status pull-right bg-transparent-black-1">
													<span class="animate-number" data-animation-duration="1500" data-value="60">{%userPer%}</span>%
												</div>
												<!--控制进度条-->
												<div class="clearfix"></div>
												<div class="progress progress-little progress-transparent-black">
													<div class="progress-bar animate-progress-bar" data-percentage="60%" ms-css-width="userPer"></div>
												</div>
											</div>
										</div>
										<div class="back">
											<a href="#">
											<i class="fa fa-bar-chart-o fa-4x"></i>
											<span>Check Summary</span>
											</a>
										</div>
									</div>
								</div>
								<div class="card-container col-lg-3 col-sm-6 col-sm-12">
									<div class="card card-greensea  hover">
										<div class="front">
											<div class="media">
												<span class="pull-left">
												<i class="fa fa-globe fa-4x"></i>
												</span>
												<div class="media-body">
													<small>网络环境</small>
													<h2 class="media-heading animate-number" data-value="3659" data-animation-duration="1500">{%netNum%}</h2>
												</div>
											</div>
											<div class="progress-list">
												<div class="details">
													<div class="title">占所有环境的百分比</div>
												</div>
												<div class="status pull-right bg-transparent-black-1">
													<span class="animate-number" data-animation-duration="1500" data-value="83">{%netPer%}</span>%
												</div>
												<div class="clearfix"></div>
												<div class="progress progress-little progress-transparent-black">
													<div class="progress-bar animate-progress-bar" data-percentage="24%" ms-css-width="netPer"></div>
												</div>
											</div>
										</div>
										<div class="back">
											<a href="#">
											<i class="fa fa-bar-chart-o fa-4x"></i>
											<span>Check Summary</span>
											</a>
										</div>
									</div>
								</div>
								<div class="card-container col-lg-3 col-sm-6 col-sm-12">
									<div class="card card-slategray  hover">
										<div class="front">
											<div class="media">
												<span class="pull-left">
												<i class="fa fa-key fa-4x"></i>
												</span>
												<div class="media-body">
													<small>请求权限</small>
													<h2 class="media-heading animate-number" data-value="3659" data-animation-duration="1500">{%authNum%}</h2>
												</div>
											</div>
											<div class="progress-list">
												<div class="details">
													<div class="title">占所有权限的百分比</div>
												</div>
												<div class="status pull-right bg-transparent-black-1">
													<span class="animate-number" data-animation-duration="1500" data-value="20">{%authPer%}</span>%
												</div>
												<div class="clearfix"></div>
												<div class="progress progress-little progress-transparent-black">
													<div class="progress-bar animate-progress-bar" data-percentage="20%" ms-css-width="authPer"></div>
												</div>
											</div>
										</div>
										<div class="back">
											<a href="#">
											<i class="fa fa-bar-chart-o fa-4x"></i>
											<span>Check Summary</span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /cards -->
							<!-- row -->
							<div class="row">
								<!-- col 8 -->
								<div class="col-lg-8 col-md-12">
									<!-- tile -->
									<section class="tile transparent">
										<!-- tile header --><a name="todyInter"></a>
										<div class="tile-header color transparent-black textured rounded-top-corners">
											<h1><strong>当天动态</strong>交互次数：</h1>
											<div class="controls">
											  <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
											  <a href="#" class="remove"><i class="fa fa-times"></i></a>
											</div>
										</div>
										<!-- /tile header -->
										<!-- tile widget -->
											<!--绘制表格-->
											<div class="tile-widget color transparent-black textured" style="height: 265px;  position: relative;">
												<div   id="stackedLine" style="height: 350px;position: relative;margin: 0px;padding: 0px;top:-80px;left:-45px;  "  ></div>
											</div> 
											<!--表格绘制结束-->
										<!--/title widget-->
									</section>
									<!--/title-->
									<!--tile--> 
									<section class="tile color transparent-black">
										<!-- tile header --><a name="todyUser"></a>
										<div class="tile-header">
											<h1><strong>TOP 10</strong>用户访问</h1>
											<div class="controls">
											  <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
											  <a href="#" class="remove"><i class="fa fa-times"></i></a>
											</div>
										</div>
										<!-- /tile header -->
										<!-- tile body -->
										<div class="tile-body no-vpadding">
											<div class="table-responsive">
												<table class="table table-custom table-sortable nomargin">
													<thead>
													  <tr>
														<th class="sortable sort-numeric sort-asc">排名</th>
														<th class="sortable sort-alpha">名称</th>
														<th class="sortable">IP地址</th>
														<th class="sortable sort-amount">请求次数</th>
														<th class="text-right">当前信任值</th>
													  </tr>
													</thead>
													<tbody>
														<tr ms-repeat-el="topArr" ms-click="showDialog(1)">
															<td class="color-hotpink">
															 {%$index+1%} 
															</td>
															<td class="color-orange priority">{%el.name%}</td>
															<td class="color-green priority">{%el.ip%}</td>
															<td class="progress-cell">
															  <div class="progress-info">
																<div class="percent"><span class="animate-number" data-value="50" data-animation-duration="1500">{%el.num%}</span>次</div>
															  </div>
															  <div class="progress progress-little">
																<div ms-css-width="el.num" class="progress-bar progress-bar-transparent-blue animate-progress-bar"  ></div>
															  </div>
															</td>
															<td class="text-right color-amethyst">{%el.auth%} </td>
														</tr>
													<tbody>
												</table>
												
											</div>
											<!--弹出框-->
											<div id="modalDialog" class="modal fade in" tabindex="-1" ms-visible="istrue">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button class="close" type="button" ms-click="showDialog(0)">Close</button>
															<h3 id="modalDialogLabel" class="modal-title">
																<strong>详细信息显示</strong> 
															</h3>
														</div>
														<div class="modal-body">
															<div class="modal-body">
																<p>用户评价：</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--tile body-->
									</section>
									<!--/tile--> 
								</div>
								<!--/col 8-->
								<!-- col 4 -->
								<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
									<!-- tile --> <a name="server"></a>
									<section class="tile color transparent-black textured">
										<!-- tile header -->
										<div class="tile-header"> 
											<h1><strong>服务器</strong>承载</h1>
											<div class="controls">
											  <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
											  <a href="#" class="remove"><i class="fa fa-times"></i></a>
											</div>
										</div>
										<!-- /tile header -->
										<!-- tile widget -->
										<div class="tile-widget"> 
											<div class="progress-list with-heading">
											  <div class="details">
												<div class="title"><h2><i class="fa fa-hdd-o"></i> <span class="animate-number" data-value="394" data-animation-duration="1600">394</span>GB</h2></div>
											  </div>
											  <div class="status pull-right bg-transparent-black-1">
												<span class="animate-number" data-value="42" data-animation-duration="1500">42</span>%
											  </div>
											  <div class="clearfix"></div>
											  <div class="progress progress-little progress-transparent-black" style="margin-bottom: 5px">
												<div style="width: 42%;" class="progress-bar animate-progress-bar" data-percentage="42%"></div>
											  </div>
											</div>  
											<p class="description"><strong>394GB</strong> used of <strong class="white-text">2,048GB</strong> on File Server</p>
										</div>
										<!-- /tile widget -->
										<!-- tile body -->
										<div class="tile-body paddingtop">
											<div class="rickshaw_graph" id="serverload-chart">
											<div style="left: 44.449px;" class="detail inactive">
											</div>
											</div>
										</div>
										<!-- /tile body -->
									</section>
									<!-- /tile -->
									<!-- tile --><a name="authrity"></a>
									<section class="tile color transparent-black">
										<!-- tile header -->
										<div class="tile-header">
											<h1><strong>各类权限</strong>访问次数</h1> 
											<div class="controls">
											  <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
											  <a href="#" class="remove"><i class="fa fa-times"></i></a>
											</div>
										</div>
										<!-- /tile header -->
										<!--tile body-->
										<div class="tile-body">
											<div id="browser-usage" >
												<div id="standPie"style="height:350px;width:300px;position: relative;margin: 0px;padding: 0px;top:-40px; "></div>
											</div>
										</div>
										<!--/tile body-->
									</section>
									<!--/title-->
								</div>
								<!-- /col 4 -->
								<div  class="col-md-12">
									<!--tile--> <a name="topLast"></a>
									<section class="tile color transparent-black">
										<!-- tile header -->
										<div class="tile-header">
											<h1><strong>最近10次</strong>用户访问</h1>
											<div class="controls">
											  <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
											  <a href="#" class="remove"><i class="fa fa-times"></i></a>
											</div>
										</div>
										<!-- /tile header -->
										<!-- tile body -->
										<div class="tile-body no-vpadding">
											<div class="table-responsive">
												<table class="table table-custom table-sortable nomargin">
													<thead>
													  <tr>
														<th class="sortable sort-numeric sort-asc">顺序</th>
														<th class="sortable sort-alpha">名称</th>
														<th class="sortable">IP地址</th>
														<th class="sortable">归属地</th>
														<th class="sortable sort-amount">请求权限</th>
														<th class="text-right">是否授权</th>
													  </tr>
													</thead>
													<tbody>
														<tr ms-repeat-el="topNum" ms-click="showDialog(1)">
															<td class="color-amethyst">{%$index+1%}</td>
															<td class="color-green priority">{%el.name%}</td>
															<td class="color-blue priority">{%el.ip%}</td>
															<td class="color-redbrown text-center">{%el.city%}</td>
															<td class="progress-cell">
															  <div class="progress-info">
																<div class="percent"><span class="animate-number color-orange" data-value="50" data-animation-duration="1500">{%el.auth%}</span></div>
															  </div>
															  
															</td>
															<td class="text-right color-hotpink">{%el.isPass%} </td>
														</tr>
													<tbody>
												</table>
											</div>
											
										</div>
										<!--tile body-->
									</section>
									<!--/tile-->
								</div>
							</div>
							<!-- /row -->
						</div>
						<!-- /content main container -->
					</div>
					</div> 
					<!-- /Page content -->
					
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