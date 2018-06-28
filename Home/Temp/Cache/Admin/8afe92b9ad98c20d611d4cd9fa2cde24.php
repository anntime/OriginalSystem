<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>原型系统(GT-DACS)|用户管理</title>
    <link href="/OriginalSystem.one/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/module.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/default_color.css" media="all">
    <script type="text/javascript" src="__PUBLIC__/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/jquery.mousewheel.js"></script>

</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <li ><a href="<?php echo U('/Admin/Index/index');?>">首页</a></li>
            <li>&nbsp; </li>
            <!-- <li class=""><a href="/OriginalSystem.one/index.php?s=/Admin/Article/mydocument.html">内容</a></li> -->
            <li class="current"><a href="<?php echo U('/Admin/UserManage/index');?>">用户管理</a></li>
            <li>&nbsp; </li>
            <li class=""><a href="<?php echo U('/Admin/Evalue/index');?>">信任评估</a></li>
            <li>&nbsp; </li>
            <li class=""><a href="<?php echo U('/Admin/RoleMap/index');?>">权限映射</a></li> 
            <li>&nbsp; </li>
            <li class=""><a href="<?php echo U('/Admin/System/index');?>">系统设置</a></li>            
            </ul>
        <!-- 主导航 -->
        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="Admin">Admin</em></li>
                <li><a href="<?php echo U('/Admin/Index/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>

<!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
            <div id="subnav" class="subnav">
                    <h3><i class="icon icon-unfold"></i>用户管理</h3>
                    <ul class="side-sub-menu">
                        <li><a class="item" href="<?php echo U('/Admin/UserManage/index');?>">用户信息</a></li>
                        <li><a class="item" href="<?php echo U('/Admin/UserManage/userSetting');?>">用户设置</a></li>
                    </ul>
            </div>
    </div>
    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
    <div class="main-title">
        <h2>用户设置</h2>
    </div>
    <form action="<?php echo U('/Admin/UserManage/SaveUserSetting','','');?>" method="post" class="form-horizontal">
        <div class="form-item">
            <label class="item-label">模拟用户数<span class="check-tips">（默认用户数为10）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="simulateNum" value="<?php echo (getsimulatenum($num)); ?>"/>
            </div>
        </div>
       
        <div class="form-item">
            <button class="btn submit-btn"  type="submit" >确 定</button>
            <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
        </div>
    </form>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">CopyRight<a href="http://www.bjut.edu.cn" target="_blank">北京工业大学软件学院</a>管理平台</div>
                <div class="fr"><?php echo (getversion($ver)); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "/OriginalSystem.one", //当前网站地址
            "APP"    : "/OriginalSystem.one/index.php?s=", //当前项目地址
            "PUBLIC" : "/OriginalSystem.one/Public", //项目公共目录地址
            "DEEP"   : "/", //PATHINFO分割符
            "MODEL"  : ["3", "", "html"],
            "VAR"    : ["m", "c", "a"]
        }
    })();
    </script>
    <script type="text/javascript" src="/OriginalSystem.one/Public/static/think.js"></script>
    <script type="text/javascript" src="/OriginalSystem.one/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <script type="text/javascript">
        //导航高亮
        highlight_subnav('/OriginalSystem.one/index.php?s=/Admin/User/index.html');
    </script>

</body>
</html>