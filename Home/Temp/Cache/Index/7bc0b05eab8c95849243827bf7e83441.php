<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="ch">
  <head>
    <meta charset="utf-8">
    <title>历史模块</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="__PUBLIC__/history/css/bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__/history/css/theme.css" rel="stylesheet">
    <link href="__PUBLIC__/history/css/font-awesome.min.css" rel="stylesheet"> 
	<link href="__PUBLIC__/history/minimal-his.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script type="text/javascript" src="__PUBLIC__/history/js/jquery.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/history/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/history/js/raphael-min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/history/js/bootstrap.js"></script>  
    <script type="text/javascript" src="__PUBLIC__/history/js/jquery.dataTables.min.js"></script>   
    <script type="text/javascript" src="__PUBLIC__/history/js/jquery.masonry.min.js"></script>   
    <script type="text/javascript" src="__PUBLIC__/history/js/jquery.imagesloaded.min.js"></script>    
    <script type="text/javascript" src="__PUBLIC__/history/js/jquery.knob.js"></script> 
    <script type="text/javascript" src="__PUBLIC__/history/js/realm.js"></script> 
	<script src="__PUBLIC__/js/avalon.js"></script>
		<script>
            avalon.config({
                loader: false,
				interpolate:["{%","%}"]
            })
        </script>
		<script src="__PUBLIC__/js/echarts.js"></script>
		<script src="__PUBLIC__/js/history.js"></script> 
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
					'echarts/chart/scatter',
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
						<div style="position: relative;height:280px;width:680px;" id="line" ></div>
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
					<div style="position: relative;height:270px;width:870px;" id="point" ></div>
				  </div>
				</div>
			</div><!-- /row-fluid -->



        <div class="row-fluid">
          <div class="widget span4">
            <div class="widget-header">
              <i class="icon-lightbulb"></i>
              <h5>Recent Support Tickets</h5>
              <div class="widget-buttons">
                  <a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
              </div>
            </div>  
            <div class="widget-body" style="height:310px;overflow:hidden">
              <div class="widget-tickets clearfix slimscroll">
                <ul>
                  <li class="priority-high">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#example_modal">
                      <img src="__PUBLIC__/history/img/avatars/02.jpg" class="avatar"/>
                      <h5>Javascript error</h5>
                      <p>There's a javascript error on your frontpage if...</p>
                      <div class="date">Thursday</div>
                    </a>
                  </li>
                  <li class="priority-medium">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#example_modal">
                      <img src="__PUBLIC__/history/img/avatars/03.jpg" class="avatar"/>
                      <h5>Login</h5>
                      <p>I can't login, theres an error when I go to the...</p>
                      <div class="date">Thursday</div>
                    </a>
                  </li>
                  <li class="priority-medium">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#example_modal">
                      <img src="__PUBLIC__/history/img/avatars/04.jpg" class="avatar"/>
                      <h5>Problem</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                      <div class="date">Monday</div>
                    </a>
                  </li>
                  <li class="priority-medium">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#example_modal">
                      <img src="__PUBLIC__/history/img/avatars/01.jpg" class="avatar"/>
                      <h5>Problem</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                      <div class="date">Monday</div>
                    </a>
                  </li>
                  <li class="priority-medium">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#example_modal">
                      <img src="__PUBLIC__/history/img/avatars/13.jpg" class="avatar"/>
                      <h5>A Problem</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                      <div class="date">Monday</div>
                    </a>
                  </li>
                  <li class="priority-low">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#example_modal">
                      <img src="__PUBLIC__/history/img/avatars/12.jpg" class="avatar"/>
                      <h5>Big Problem</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                      <div class="date">Yesterday</div>
                    </a>
                  </li>
                  <li class="priority-low">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#example_modal">
                      <img src="__PUBLIC__/history/img/avatars/08.jpg" class="avatar"/>
                      <h5>Big Problem</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                      <div class="date">Yesterday</div>
                    </a>
                  </li>
                  <li class="priority-low">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#example_modal">
                      <img src="__PUBLIC__/history/img/avatars/10.jpg" class="avatar"/>
                      <h5>Big Problem</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                      <div class="date">Yesterday</div>
                    </a>
                  </li>
                  <li class="priority-low">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#example_modal">
                      <img src="__PUBLIC__/history/img/avatars/11.jpg" class="avatar"/>
                      <h5>Big Problem</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                      <div class="date">Yesterday</div>
                    </a>
                  </li>
                </ul>
              </div>
            </div><!--/widget-body-->
            <div class="widget-footer">
              <a href="javascript:void(0)" class="pull-right btn btn-small"><i class="icon-plus"></i> Load More</a>
            </div>
          </div> <!-- /widget span5 -->

          <div class="widget span8">
            <div class="widget-header">
              <i class="icon-comment-alt"></i>
              <h5>Recent Comments</h5>
              <div class="widget-buttons">
                  <a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
              </div>
            </div>  
            <div class="widget-body" style="height:310px;overflow:hidden">
              <div class="widget-comments clearfix slimscroll">
                <ul>
                  <li>
                    <img src="__PUBLIC__/history/img/avatars/04.jpg" class="avatar"/>
                    <div class="comment-bubble">
                      <h4>Anthony Newsfeed - <strong>Anthony23</strong></h4>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna ligula, mattis...
                      <div class="date">Thursday</div>
                      <div class="settings">
                        <a href="javascript:void(0)" class="tip" data-title="Reply"><i class="icon-reply"></i></a><a href="javascript:void(0)" class="tip" data-title="Delete"><i class="icon-trash"></i></a><a href="javascript:void(0)" class="tip" data-title="Edit"><i class="icon-edit"></i></a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <img src="__PUBLIC__/history/img/avatars/05.jpg" class="avatar"/>
                    <div class="comment-bubble">
                      <h4>Christian Tomshed - <strong>Christian01</strong></h4>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna ligula, mattis...
                      <div class="date">Friday</div>
                      <div class="settings">
                        <a href="javascript:void(0)" class="tip" data-title="Reply"><i class="icon-reply"></i></a><a href="javascript:void(0)" class="tip" data-title="Delete"><i class="icon-trash"></i></a><a href="javascript:void(0)" class="tip" data-title="Edit"><i class="icon-edit"></i></a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <img src="__PUBLIC__/history/img/avatars/06.jpg" class="avatar"/>
                    <div class="comment-bubble">
                      <h4>Bill Feenhound - <strong>Bill98</strong></h4>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna ligula, mattis...
                      <div class="date">Sunday</div>
                      <div class="settings">
                        <a href="javascript:void(0)" class="tip" data-title="Reply"><i class="icon-reply"></i></a><a href="javascript:void(0)" class="tip" data-title="Delete"><i class="icon-trash"></i></a><a href="javascript:void(0)" class="tip" data-title="Edit"><i class="icon-edit"></i></a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <img src="__PUBLIC__/history/img/avatars/03.jpg" class="avatar"/>
                    <div class="comment-bubble">
                      <h4>Bill Feenhound - <strong>Bill98</strong></h4>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna ligula, mattis...
                      <div class="date">Sunday</div>
                      <div class="settings">
                        <a href="javascript:void(0)" class="tip" data-title="Reply"><i class="icon-reply"></i></a><a href="javascript:void(0)" class="tip" data-title="Delete"><i class="icon-trash"></i></a><a href="javascript:void(0)" class="tip" data-title="Edit"><i class="icon-edit"></i></a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <img src="__PUBLIC__/history/img/avatars/04.jpg" class="avatar"/>
                    <div class="comment-bubble">
                      <h4>Bill Feenhound - <strong>Bill98</strong></h4>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna ligula, mattis...
                      <div class="date">Sunday</div>
                      <div class="settings">
                        <a href="javascript:void(0)" class="tip" data-title="Reply"><i class="icon-reply"></i></a><a href="javascript:void(0)" class="tip" data-title="Delete"><i class="icon-trash"></i></a><a href="javascript:void(0)" class="tip" data-title="Edit"><i class="icon-edit"></i></a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <img src="__PUBLIC__/history/img/avatars/05.jpg" class="avatar"/>
                    <div class="comment-bubble">
                      <h4>Bill Feenhound - <strong>Bill98</strong></h4>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna ligula, mattis...
                      <div class="date">Sunday</div>
                      <div class="settings">
                        <a href="javascript:void(0)" class="tip" data-title="Reply"><i class="icon-reply"></i></a><a href="javascript:void(0)" class="tip" data-title="Delete"><i class="icon-trash"></i></a><a href="javascript:void(0)" class="tip" data-title="Edit"><i class="icon-edit"></i></a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div><!--/widget-body-->
            <div class="widget-footer">
              <a href="javascript:void(0)" class="pull-right btn btn-small"><i class="icon-plus"></i> Load More</a>
            </div>
          </div> <!-- /widget span5 -->
        </div> <!-- /row-fluid -->


          <div class="row-fluid">
            <div class="widget span12" style="overflow:visible;">
                  <a class="btn btn-box bubble bubble-danger span2 tips" data-title="bubble-danger" href="#" data-bubble="5k"><i class="icon-user"></i><span>Users</span></a>
                  <a class="btn btn-box span2" href="#"><i class="icon-plus-sign"></i><span>Notifications</span></a>
                  <a class="btn btn-box span2" href="#"><i class="icon-calendar"></i><span>Calendar</span></a>
                  <a class="btn btn-box bubble bubble-info span2 tips" data-title="bubble-info" href="#" data-bubble="2"><i class="icon-signal"></i><span>Analytics</span></a>
                  <a class="btn btn-box span2" href="#" data-bubble="2"><i class="icon-lightbulb"></i><span>Tickets</span></a>
                  <a class="btn btn-box bubble bubble-success span2 tips" data-title="bubble-success" href="#" data-bubble="102"><i class="icon-sitemap"></i><span>Categories</span></a>

            </div><!-- /widget -->
          </div><!-- /row-fluid -->

          <div class="row-fluid">
            <div class="widget span6">
              <div class="widget-header"><i class="icon-signal"></i><h5>Bar Chart</h5>
              <div class="widget-buttons">
                  <a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
              </div>
              </div>
              <div class="widget-body clearfix">
                <div class="analytics_item" id="barchart"></div>
              </div>
            </div>
            <div class="widget span3">
                <div class="widget-header"><i class="icon-signal"></i><h5>Browsers</h5>
                <div class="widget-buttons">
                    <a href="javascript:void(0)" class="collapse" data-collapsed="false"><i data-title="Collapse" class="icon-chevron-up"></i></a>
                </div>
                </div>
                <div class="widget-header-under">The preferred browsers of your users</div>
                <div class="widget-body clearfix" style="min-height: 319px;">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Browser</th>
                          <th>Visits</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Firefox</td>
                        <td><strong>5798</strong></td>
                      </tr>
                      <tr>
                        <td>Chrome</td>
                        <td><strong>4855</strong></td>
                      </tr>
                      <tr>
                        <td>Internet Explorer</td>
                        <td><strong>2877</strong></td>
                      </tr>
                      <tr>
                        <td>Safari</td>
                        <td><strong>2705</strong></td>
                      </tr>
                      <tr>
                        <td>Opera</td>
                        <td><strong>1985</strong></td>
                      </tr>
                      <tr>
                        <td>Android Browser</td>
                        <td><strong>1581</strong></td>
                      </tr>
                      <tr>
                        <td>RockMelt</td>
                        <td><strong>1284</strong></td>
                      </tr>
                    </tbody>      
                  </table>
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
                  <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Page</th>
                          <th>Visits</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Categories</td>
                        <td><strong>8790</strong></td>
                      </tr>
                      <tr>
                        <td>Clothing</td>
                        <td><strong>7052</strong></td>
                      </tr>
                      <tr>
                        <td>About</td>
                        <td><strong>6577</strong></td>
                      </tr>
                      <tr>
                        <td>Contact Us</td>
                        <td><strong>5760</strong></td>
                      </tr>
                      <tr>
                        <td>Blog</td>
                        <td><strong>4876</strong></td>
                      </tr>
                      <tr>
                        <td>Prices</td>
                        <td><strong>3866</strong></td>
                      </tr>
                      <tr>
                        <td>Information</td>
                        <td><strong>1876</strong></td>
                      </tr>
                    </tbody>      
                  </table>
                </div>
            </div>
          </div> 
      </div>
      <!-- /Main window -->
      
		</div><!--/.fluid-container-->
    </div><!-- wrap ends-->


    <!-- example modal -->
    <div id="example_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Support Ticket</h3>
      </div>
      <div class="modal-body">
        <p>Here you can view and manage this support ticket.</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
      </div>
    </div> 

    <!-- example modal -->
    <div id="example_modal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Example Modal</h3>
      </div>
      <div class="modal-body">
        <p>Here you can write more information about the object you clicked</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
      </div>
    </div> 



    <!-- task_modal modal -->
    <div id="task_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Task info example</h3>
      </div>
      <div class="modal-body">
        <div class="clearfix">
          <img src="__PUBLIC__/history/img/avatars/11.jpg" class="img-circle" style="float: left; width: 65px; margin-right: 20px;">
           <h3 style="margin:0">John</h3>
           <p class="muted">Marketing</p>
        </div>
        <hr>
        <h5>Task</h5>
        <p>Create a marketing plan for the new campaign</p>
        <h5>status&nbsp;&nbsp;<small>60%</small></h5>
        <div class="progress">
          <div class="bar" style="width: 60%;"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      </div>
    </div> 



    
  </body>
</html>