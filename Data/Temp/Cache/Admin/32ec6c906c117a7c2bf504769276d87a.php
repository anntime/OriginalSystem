<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>原型系统管理平台</title>
        <link rel="stylesheet" type="text/css" href="/originalsystem/Application/Admin/View/Public/css/login.css" media="all">
       	<link rel="stylesheet" type="text/css" href="/originalsystem/Application/Admin/View/Public/css/default_color.css" media="all">
        <script type="text/javascript" src="/originalsystem/Application/Admin/View/Public/js/login.js"></script>
        <script type="text/javascript" src="/originalsystem/Application/Admin/View/Public/Js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="/originalsystem/Application/Admin/View/Public/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript">
            var verifyURL = '<?php echo U('/Admin/Login/verify','','');?>'
        </script>
    </head>
    <body id="login-page">
        <div id="main-content">

            <!-- 主体 -->
            <div class="login-body">
                <div class="login-main pr">
                    <form action="<?php echo U('/Admin/Login/login');?>" method="post" class="login-form">
                        <h3 class="welcome"><i class="login-logo"></i>原型系统管理平台</h3>
                        <div id="itemBox" class="item-box">
                            <div class="item">
                                <i class="icon-login-user"></i>
                                <input type="text" name="username" placeholder="请填写用户名" autocomplete="off" />
                            </div>
                            <span class="placeholder_copy placeholder_un">请填写用户名</span>
                            <div class="item b0">
                                <i class="icon-login-pwd"></i>
                                <input type="password" name="password" placeholder="请填写密码" autocomplete="off" />
                            </div>
                            <span class="placeholder_copy placeholder_pwd">请填写密码</span>
                            <div class="item verifycode">
                                <i class="icon-login-verifycode"></i>
                                <input type="text" name="code" placeholder="请填写验证码"  autocomplete="off">
                                
                            </div>
                            <span class="placeholder_copy placeholder_check">请填写验证码</span>
                            <div>
                                <img class="verifyimg reloadverify"  src="<?php echo U('/Admin/Login/verify','','');?>" id='code'/>
                                <a href="javascript:void(change_code(this));">看不清</a>
                            </div> 
                        </div>
                        <div class="login_btn_panel">
                            <button class="login-btn" type="submit">
                                <span class="in"><i class="icon-loading"></i>登 录 中 ...</span>
                                <span class="on">登 录</span>
                            </button>
                            <div class="check-tips"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	<!--[if lt IE 9]>

    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/originalsystem/Application/Admin/View/Public/JS/jquery-2.0.3.min.js"></script>
    <!--<![endif]-->
</body>
</html>