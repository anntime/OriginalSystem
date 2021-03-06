<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>原型系统(GT-DACS)|管理首页</title>
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
            <li class="">
                <a href="<?php echo U('/Admin/Index/index');?>">首页</a>
            </li>
            <li>&nbsp;</li>
            <li class="">
                <a href="<?php echo U('/Admin/UserManage/index');?>">用户管理</a>
            </li>
            <li>&nbsp;</li>
            <li class="">
                <a href="<?php echo U('/Admin/Evalue/index');?>">信任评估</a>
            </li>
            <li>&nbsp;</li>
            <li class="">
                <a href="<?php echo U('/Admin/RoleMap/index');?>">权限映射</a>
            </li>
            <li>&nbsp;</li>
            <li class="">
                <a href="<?php echo U('/Admin/System/index');?>">系统设置</a>
            </li>
        </ul>
        <!-- /主导航 -->
        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"> <i class="icon-user"></i>
            </a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">
                    你好， <em title="Admin">Admin</em>
                </li>
                <li>
                    <a href="<?php echo U('/Admin/Index/logout');?>">退出</a>
                </li>
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
        
            
                <!-- 这里写界面的主要内容 -->
            

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl"><?php echo (getcopyright($inf)); ?></div>
                <div class="fl">&nbsp;&nbsp;&nbsp;系统版本：<?php echo (getversion($ver)); ?></div>
            </div>
        </div>
    </div>
    
        <!-- 这里写javascript -->
    
        <script type="text/javascript">
    /*
    *获取当前链接，定位current
    */
        function  getUrlCurrent(RequestUrl){
            var  URL="";
            URL=window.location.pathname; 
            $.ajax({
                type:"POST",
                url:"<?php echo U('/Admin/Common/getUrl','','');?>",
                data:{url:URL,},
                async:false,
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    console.log("Error:"+XMLHttpRequest.readyState+"   "+XMLHttpRequest.responseText);
                },
                success:function(data){
                    console.log(data);
                    var obj = eval(data);
                    console.log(obj);
                    if(obj!=null){
                        var urls="<?php echo U('/Admin/"+obj[0]+"');?>";
                        
                        if(obj[1]==null){
                            $(".header").find("a[href='" + urls + "']").parent().addClass("current");
                        }
                        else{
                            var urlroot = "<?php echo U('/Admin/"+obj[1]+"');?>";
                            $("#subnav").find("a[href='" + urls + "']").parent().addClass("current");
                            $(".header").find("a[href='" + urlroot + "']").parent().addClass("current");
                        }
                    }

                }
            });
        }
        /*
        *二级标签定位current
        */
        function getSecondUrl(tab){
            var  url="";
            url=window.location.pathname;
            console.log(url);
            var $subnav = $(tab); 
             $subnav.find("a[href='" + url + "']").parent().addClass("current");
            console.log(url);
        }
        $(document).ready(function() {
                getUrlCurrent();
                getSecondUrl("#subnav");
                getSecondUrl(".tab-wrap");
        });
    </script>




        <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();
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
</body>
</html>