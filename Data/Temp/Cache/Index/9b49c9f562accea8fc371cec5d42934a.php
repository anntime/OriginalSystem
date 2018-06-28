<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="ch">
  <head>
    <meta charset="utf-8">
    <title>历史模块</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="/originalsystem/Application/Index/View/Public/history/css/bootstrap.css" rel="stylesheet">
    <link href="/originalsystem/Application/Index/View/Public/history/css/theme.css" rel="stylesheet">
    <link href="/originalsystem/Application/Index/View/Public/history/css/font-awesome.min.css" rel="stylesheet"> 
	<link href="/originalsystem/Application/Index/View/Public/history/minimal-his.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script type="text/javascript" src="/originalsystem/Application/Index/View/Public/history/js/jquery.min.js"></script>
    <script type="text/javascript" src="/originalsystem/Application/Index/View/Public/history/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/originalsystem/Application/Index/View/Public/history/js/raphael-min.js"></script>
    <script type="text/javascript" src="/originalsystem/Application/Index/View/Public/history/js/bootstrap.js"></script>  
    <script type="text/javascript" src="/originalsystem/Application/Index/View/Public/history/js/jquery.dataTables.min.js"></script>   
    <script type="text/javascript" src="/originalsystem/Application/Index/View/Public/history/js/jquery.masonry.min.js"></script>   
    <script type="text/javascript" src="/originalsystem/Application/Index/View/Public/history/js/jquery.imagesloaded.min.js"></script>    
    <script type="text/javascript" src="/originalsystem/Application/Index/View/Public/history/js/jquery.knob.js"></script> 
    <script type="text/javascript" src="/originalsystem/Application/Index/View/Public/history/js/realm.js"></script> 
	<script src="/originalsystem/Application/Index/View/Public/js/avalon.js"></script>
		<script>
            avalon.config({
                loader: false,
				interpolate:["{%","%}"]
            })
        </script>
		<script src="/originalsystem/Application/Index/View/Public/js/echarts.js"></script>
		<script src="/originalsystem/Application/Index/View/Public/js/history.js">
		
		</script> 
		<script>
			require.config({
				paths: {
					echarts: '/originalsystem/Application/Index/View/Public/js'
				}
			});
			require(
				[
					'echarts',
					'echarts/chart/map',
					'echarts/chart/pie',
					'echarts/chart/bar',
					'echarts/chart/scatter',
					'echarts/chart/force',
					'echarts/chart/line'
				],
				InitEharts
			); 
		</script> 	 
  </head>
  <body>
    <div id="wrap">
		<!-- Fixed navbar -->
		<div id="navbar" class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top">
			<!-- Branding -->
			<div class="navbar-header col-md-2">
				<a class="navbar-brand" href="#">
					<strong>历史</strong>模块
				</a>
				<div class="sidebar-collapse">
				  <a href="#">
					<i class=" icon-reorder"></i>
				  </a>
				</div>
			</div>
			<!-- Branding end -->
			<!-- .nav-collapse -->
			<div class="navbar-collapse"> 
				<!-- Sidebar -->
				<ul tabindex="5000" style="overflow: hidden;" class="nav navbar-nav side-nav" id="sidebar">
					<li class="navigation" id="navigation">
						<a href="#collapse1" class="sidebar-toggle" data-toggle="#collapse1">历史设置 
						<i class="icon-chevron-down"></i>
						</a>
						<ul class="menu" id="collapse1">
							<li class="active">
								<a href="#system">
								  <i class="icon-dashboard"></i> 历史参数 
								</a>
							</li>

							<li class="dropdown">
								<a href="#todyInter" class="dropdown-toggle" data-toggle="dropdown">
								  <i class="icon-reorder"></i> 当天动态交互次数 <b class="fa fa-plus dropdown-plus"></b>
								</a> 
							</li> 
							<li class="dropdown">
								<a href="#todyUser" class="dropdown-toggle" data-toggle="dropdown">
								  <i class="icon-tasks"></i> TOP 10用户访问 <b class="fa fa-plus dropdown-plus"></b>
								</a> 
							</li>
							<li class="">
								<a href="#server">
								  <i class=" icon-qrcode"></i> 服务器承载
								</a>
							</li>
							<li class="">
							<a href="#authrity">
							  <i class=" icon-laptop"></i> 各类权限访问次数
							</a>
							</li> 
							<li class="dropdown">
								<a href="#topLast" class="dropdown-toggle" data-toggle="dropdown">
								  <i class="icon-check"></i> 最近10次用户访问 <b class="fa fa-plus dropdown-plus"></b>
								</a> 
							</li> 
						</ul>
					</li>
					<li class="navigation" id="summary">
						<a href="#collapse2" class="sidebar-toggle" data-toggle="#collapse2">资源请求参数
						<i class="icon-chevron-down"></i>
						</a>
						<ul class="menu" id="collapse2">
							<li class="">
								<a href="resRequest">
								  <i class="icon-rss"></i>资源请求热力图 
								</a>
							</li>

							<li class="dropdown">
								<a href="resRequest" class="dropdown-toggle" data-toggle="dropdown">
								  <i class=" icon-cogs"></i> 省市资源请求 <b class="fa fa-plus dropdown-plus"></b>
								</a> 
							</li> 
							<li class="dropdown">
								<a href="resRequest" class="dropdown-toggle" data-toggle="dropdown">
								  <i class=" icon-exchange"></i> 详细交互数据 <b class="fa fa-plus dropdown-plus"></b>
								</a> 
							</li> 
						</ul> 
					</li> 
				</ul>
				<!-- Sidebar end--> 
			</div>
			<!-- .nav-collapse end-->
		</div>
		<!-- Fixed navbar Over-->

		<div class="container-fluid"> 
			<!-- Main window -->
			<div class="main_container" id="dashboard_page">
				<div class="row-fluid">
					<div class="overview_boxes">
						<div class="box_row clearfix">
						  <div class="widget-tasks-statistics">
							<div class="userstats clearfix" style="margin-top: 25px;">
								<a href="javascript:void(0)" data-toggle="modal" data-target="#example_modal2">
									<div class="white">
										<i style="color:#E28271" class="icon-thumbs-up"></i>
										<p style="color:#E28271">+85%</p>
									</div>
									<div class="widget">
										<input class="knob" data-width="120" data-height="120" data-displayInput=false data-readOnly=true data-thickness=".15" value="85">   
									</div>
										<p><strong>+530</strong>诚信节点个数</p>
								</a>
						</div>
					  </div>
						  <div class="widget-tasks-statistics">
							<div class="userstats clearfix" style="margin-top: 25px;">
								<a href="javascript:void(0)" data-toggle="modal" data-target="#example_modal2">
								<div class="white">
								  <i style="color:#98E5EA" class=" icon-exchange"></i>
								  <p style="color:#98E5EA">+13%</p>
								</div>
								<div class="widget">
								  <input class="knob" data-width="120" data-height="120" data-displayInput=false data-readOnly=true data-thickness=".15" value="13">   
								</div>
								<p><strong>57</strong>交互节点个数</p>

							  </a>
							</div>
						  </div>
						  <div class="widget-tasks-statistics">
							<div class="userstats clearfix" style="margin-top: 25px;">
								<a href="javascript:void(0)" data-toggle="modal" data-target="#example_modal2">
								<div class="white">
								  <i style="color:#AEEA98" class="icon-thumbs-down"></i>
								  <p style="color:#AEEA98">+15%</p>
								</div>
								<div class="widget">
								  <input class="knob" data-width="120" data-height="120" data-displayInput=false data-readOnly=true data-thickness=".15" value="15">   
								</div>
								<p><strong>35/235</strong>非诚信节点个数</p>
							  </a>
							</div>
						  </div>
						</div> 
						<div class="box_row clearfix">
						  <div class="widget-tasks-statistics">
							<div class="userstats clearfix" style="margin-top: 25px;">
								<a href="javascript:void(0)" data-toggle="modal" data-target="#example_modal2">
								<div class="white">
								  <i style="color:#98AEEA" class="icon-sitemap"></i>
								  <p style="color:#98AEEA">+55%</p>
								</div>
								<div class="widget">
								  <input class="knob" data-width="120" data-height="120" data-displayInput=false data-readOnly=true data-thickness=".15" value="55">   
								</div>
								<p><strong>$14,230</strong>推荐域实体个数</p>
							  </a>
							</div>
						  </div>
						  <div class="widget-tasks-statistics">
							<div class="userstats clearfix" style="margin-top: 25px;">
								<a href="javascript:void(0)" data-toggle="modal" data-target="#example_modal2">
								<div class="white">
								  <i style="color:#EA98AB" class="icon-time"></i>
								  <p style="color:#EA98AB">+35%</p>
								</div>
								<div class="widget">
								  <input class="knob" data-width="120" data-height="120" data-displayInput=false data-readOnly=true data-thickness=".15" value="35">   
								</div>
								<p><strong>152</strong>时间窗口</p>
							  </a>
							</div>
						  </div>
						  <div class="widget-tasks-statistics">
							<div class="userstats clearfix" style="margin-top: 25px;">
								<a href="javascript:void(0)" data-toggle="modal" data-target="#example_modal2">
								<div class="white">
								  <i style="color:#F6BF99" class=" icon-th-list"></i>
								  <p style="color:#F6BF99">+97%</p>
								</div>
								<div class="widget">
								  <input class="knob" data-width="120" data-height="120" data-displayInput=false data-readOnly=true data-thickness=".15" value="97">   
								</div>
								<p><strong>592</strong>决策属性个数</p>
							  </a>
							</div>
						  </div>
						</div>  
					</div>
				</div>  

				
				<div class="row-fluid"> 
					<div class="widget widget-padding span12">
					  <div class="widget-header">
						<i class="icon-bar-chart"></i>
						<h5>诚信节点分布图</h5>
						<div class="widget-buttons">
							<a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
						</div>
					  </div>
					  <div class="widget-body clearfix"   id="widget-tasks">
						<div style="position: relative;height:270px;width:980px;" id="point" ></div>
					  </div>
					</div>
				</div><!-- /row-fluid -->
				
				
				<!-- CHARTS  -->
				<div class="row-fluid">
					<div class="widget  widget-padding span4">
						<!--  widget header -->
						<div class="widget-header">
							<i class="icon-bar-chart"></i>
							<h5>节点诚信状态查询</h5>
							<div class="widget-buttons">
								<a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
							</div>
						</div> 
						<!--  /widget header -->
						<!--  widget body -->
						<div class="widget-body  clearfix">
							<div class="widget-forms clearfix">
								<div class="controls">
									<div class="alert"> 
										<h4>提醒!</h4>
										请在此处输入节点名称，将在右侧显示节点的诚信状况。
									</div>
								</div>
								<form class="form-horizontal"> 
											<div class="control-group">
												<label class="control-label" style="left:-10px;">节点名称</label>
												<div class="controls">
													<input class="span5" type="text" placeholder="名称"> 
												</div> 
											</div>  
											<div class="control-group">
												<label class="control-label">节点归属地</label>
												<div class="controls">
													<input class="span5" type="text" placeholder="归属地"> 
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">节点IP</label>
												<div class="controls">
													<input class="span5" type="text" placeholder="IP"> 
												</div>
											</div>
									 
								</form>
							</div>
						</div>
						<!-- /widget body -->
						<!-- widget footer -->
						<div class="widget-footer">
							<button class="btn btn-primary" type="submit">查询</button>
							<button class="btn" type="button">重置</button>
						</div>
						<!-- /widget footer --> 
					</div> <!-- /widget span12 -->
					<div class="widget span8">
						<div class="widget-header">
							<i class="icon-credit-card"></i>
							<h5>节点诚信状态显示</h5>
							<div class="widget-buttons"> 
								<a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
							</div>
						</div>
						<div class="widget-body">
							<div style="position: relative;height:323px;width:680px;" id="line" ></div>
						</div>
					</div>
				</div>
				<!-- /row-fluid -->

				<div class="row-fluid">
					<div class="widget widget-padding span4">
						<div class="widget-header">
							<i class="icon-circle"></i>
							<h5>节点信任度查询</h5>
							<div class="widget-buttons">
								<a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
							</div>
						</div>
						<div class="widget-body">
							 <div class="widget-forms clearfix">
								<div class="controls">
									<div class="alert"> 
										<h4>提醒!</h4>
										请在此处输入节点名称，将在右侧显示节点的诚信状况。
									</div>
								</div>
								<form class="form-horizontal"> 
									<div class="control-group">
										<label class="control-label" style="left:-10px;">节点名称</label>
										<div class="controls">
											<input class="span5" type="text" placeholder="名称"> 
										</div> 
									</div>  
									<div class="control-group">
										<label class="control-label">交互时间</label>
										<div class="controls">
											<input class="span5" type="text" placeholder="时间"> 
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">节点IP</label>
										<div class="controls">
											<input class="span5" type="text" placeholder="IP"> 
										</div>
									</div> 
								</form>
							</div>
						</div><!-- /widget-body -->
						<!-- widget footer -->
						<div class="widget-footer">
							<button class="btn btn-primary" type="submit">查询</button>
							<button class="btn" type="button">重置</button>
						</div>
						<!-- /widget footer --> 
						
						
					</div><!-- /widget -->
			   
					<div class="widget widget-padding span8">
					  <div class="widget-header">
						<i class="icon-bar-chart"></i>
						<h5>诚信节点分布图</h5>
						<div class="widget-buttons">
							<a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
						</div>
					  </div>
					  <div class="widget-body clearfix"   id="widget-tasks">
						<div style="position: relative;height:292px;width:670px;" id="bar" ></div>
					  </div>
					</div>
				</div><!-- /row-fluid -->



				<div class="row-fluid">
				  <div class="widget span4">
					<div class="widget-header">
						<i class="icon-lightbulb"></i>
						<h5>推荐域相关参数</h5>
						<div class="widget-buttons">
							<a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
						</div>
					</div>  
					<div class="widget-body clearfix" style="height:280px;overflow:hidden"> 
							<table class="table table-striped">
							<thead>
								<tr>
								  <th>参数</th>
								  <th>数值</th>
								</tr>
							</thead>
							<tbody>
							  <tr>
								<td>最大值</td>
								<td><strong>15</strong></td>
							  </tr>
							  <tr>
								<td>推荐域实体</td>
								<td><strong>7</strong></td>
							  </tr>
							  <tr>
								<td>时间窗口</td>
								<td><strong>最近3小时</strong></td>
							  </tr>
							  <tr>
								<td>参数一</td>
								<td><strong>X</strong></td>
							  </tr>
							  <tr>
								<td>参数二</td>
								<td><strong>Y</strong></td>
							  </tr>
							  <tr>
								<td>参数三</td>
								<td><strong>Z</strong></td>
							  </tr>   
							</tbody>      
						  </table> 
					</div><!--/widget-body-->
					<div class="widget-footer">
					更多参数...	
					</div>
				  </div> <!-- /widget span5 -->

				  <div class="widget span8">
					<div class="widget-header">
					  <i class="icon-comment-alt"></i>
					  <h5>推荐域节点变化</h5>
					  <div class="widget-buttons">
						  <a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
					  </div>
					</div>  
					<div class="widget-body" style="height:320px;overflow:hidden">
						<div style="position: relative;height:292px;width:670px;" id="line2" ></div>
					</div><!--/widget-body--> 
				  </div> <!-- /widget span5 -->
				</div> <!-- /row-fluid -->


				<div class="row-fluid">
					<div class="widget widget-padding span12" style="overflow:visible;">
						<div class="widget-header"><i class="icon-signal"></i><h5>决策属性及权重</h5>
							<div class="widget-buttons">
							  <a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
							</div>
						</div>	
						<div class="widget-body clearfix">
							<a class="btn btn-box bubble bubble-danger span2 tips" data-title="bubble-danger" href="#" data-bubble="0.1"><i class="icon-user"></i><span>属性一</span></a>
							<a class="btn btn-box bubble bubble-info span2 tips" href="#"data-bubble="0.3"><i class="icon-plus-sign"></i><span>属性二</span></a>
							<a class="btn btn-box bubble bubble-success span2 tips" href="#" data-bubble="0.2"><i class="icon-calendar"></i><span>属性三</span></a>
							<a class="btn btn-box bubble bubble-warning span2 tips" data-title="bubble-info" href="#" data-bubble="0.2"><i class="icon-signal"></i><span>属性四</span></a>
							<a class="btn btn-box bubble bubble-danger span2 tips" href="#" data-bubble="0.1"><i class="icon-lightbulb"></i><span>属性五</span></a>
							<a class="btn btn-box bubble bubble-success span2 tips" data-title="bubble-success" href="#" data-bubble="0.1"><i class="icon-sitemap"></i><span>属性六</span></a>
						</div>
					</div><!-- /widget -->
				</div><!-- /row-fluid -->

				<div class="row-fluid">
					<div class="widget span9">
					  <div class="widget-header"><i class="icon-signal"></i><h5>节点关系图</h5>
					  <div class="widget-buttons">
						  <a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
					  </div>
					  </div>
					  <div class="widget-body clearfix">
						<div style="position: relative;height:340px;width:670px;"  id="force"></div>
					  </div>
					</div>
				 
					<div class="widget span3">
					  <div class="widget-header"><i class="icon-signal"></i><h5>Most active pages</h5>
						<div class="widget-buttons">
						  <a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
						</div>
					  </div>
						<div class="widget-header-under">The most visited pages by your users</div>
						<div class="widget-body clearfix" style="min-height: 319px;">
						   
						</div>
					</div>
				</div> 
		  
			</div>
			<!-- /Main window -->
      
		</div><!--/.fluid-container-->
		 
	</div><!-- wrap ends-->
 
</body>
</html>