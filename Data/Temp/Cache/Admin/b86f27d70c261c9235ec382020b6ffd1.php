<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>原型系统(GT-DACS)|管理首页</title>
    <link href="/OriginalSystem.one/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/originalsystem/Application/Admin/View/Public/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/originalsystem/Application/Admin/View/Public/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/originalsystem/Application/Admin/View/Public/css/module.css">
    <link rel="stylesheet" type="text/css" href="/originalsystem/Application/Admin/View/Public/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="/originalsystem/Application/Admin/View/Public/css/default_color.css" media="all">
    <script type="text/javascript" src="/originalsystem/Application/Admin/View/Public/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/originalsystem/Application/Admin/View/Public/js/jquery.mousewheel.js"></script>
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->
        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($Menu["main"])): $i = 0; $__LIST__ = $Menu["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="">
                    <a href="<?php echo (U($menu["Url"])); ?>"><?php echo ($menu["Title"]); ?></a>
                </li>
                <li>&nbsp;</li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- 主导航 -->
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
    <!-- 边栏 -->
    
        <!-- 子导航 -->
        <div class="sidebar">
            <div id="subnav" class="subnav">
                <ul class="side-sub-menu">
                    <?php if(is_array($Menu["subMenu"])): $i = 0; $__LIST__ = $Menu["subMenu"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                            <a class="item" href="<?php echo (U($menu["Url"])); ?>"><?php echo ($menu["Title"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <!-- /子导航 --> 
    <!-- /边栏 -->
    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">

            
    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            <div class="main-title">
                <h2>评估设置</h2>
            </div>
            <form action="<?php echo U('/Admin/Evalue/saveEvalueSetting','','');?>" method="post" class="form-horizontal">
                <div class="form-item">
                    <label class="item-label">
                        模拟用户数
                        <span class="check-tips">（默认用户数为10）</span>
                    </label>
                    <div class="controls">
                        <input type="text" class="text input-SMALL" name="simulateNum" value="<?php echo (getSimulateNum($num)); ?>"/>
                    </div>
                </div>
                <div class="form-item">
                    <label class="item-label">
                        间接信任用户所占比重(单位：%)
                        <span class="check-tips"></span>
                    </label>
                    <div class="controls">
                        <input type="text" class="text input-small" name="SimulatePercent" value="<?php echo (getSimulatePercent($copy)); ?>"/>
                    </div>
                </div>
                <div class="form-item">
                    <button class="btn submit-btn"  type="submit" >确 定</button>
                    <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
                </div>
            </form>

        </div>
    </div>
    <!-- /内容区 -->


        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl"><?php echo (getCopyRight($inf)); ?></div>
                <div class="fl">&nbsp;&nbsp;&nbsp;系统版本：<?php echo (getVersion($ver)); ?></div>
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