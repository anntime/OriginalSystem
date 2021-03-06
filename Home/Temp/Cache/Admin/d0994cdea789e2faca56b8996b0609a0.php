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
            <?php if(is_array($Menu["main"])): $i = 0; $__LIST__ = $Menu["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="">
                    <a href="<?php echo (u($menu["Url"])); ?>"><?php echo ($menu["Title"]); ?></a>
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
                            <a class="item" href="<?php echo (u($menu["Url"])); ?>"><?php echo ($menu["Title"]); ?></a>
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
            <!-- 标题栏 -->
            <div class="main-title">
                <h2>用户列表</h2>
            </div>
            <!-- 数据列表 -->
            <div class="data-table table-striped">
                <table class="">
                    <thead>
                        <tr>
                            <th class="">ID</th>
                            <th class="">昵称</th>
                            <th class="">地址</th>
                            <th class="">访问时间</th>
                            <th class="">IP地址</th>
                            <th class="">经度</th>
                            <th class="">纬度</th>
                            <th class="">操作</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(is_array($userinfo)): foreach($userinfo as $key=>$v): ?><tr>
                                <td><?php echo ($v["id"]); ?></td>
                                <td><?php echo ($v["username"]); ?></td>
                                <td><?php echo ($v["province"]); ?>&nbsp;&nbsp;<?php echo ($v["city"]); ?></td>
                                <td><?php echo (date('y-m-d H:i',$v["visittime"])); ?></td>
                                <td><?php echo ($v["ip"]); ?></td>
                                <td><?php echo ($v["longitude"]); ?></td>
                                <td><?php echo ($v["latitude"]); ?></td>
                                <td name=<?php echo ($id = $v["id"]); ?>>
                                    <a href="<?php echo U('/Admin/UserManage/userDel/id/'.$id,'','');?>" class="confirm ajax-get">删除</a>
                                </td>
                            </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="page">
                <div></div>
            </div>
        </div>
    </div>


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
    </script></body>
</html>