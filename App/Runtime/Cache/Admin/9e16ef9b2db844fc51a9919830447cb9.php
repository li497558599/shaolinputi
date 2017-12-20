<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>管理员登录</title>
        <link rel="shortcut icon" href="<?php echo (session('logo')); ?>" type="image/x-icon">

        <!-- Bootstrap core CSS -->
        <link href="/Public/Admin/assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="/Public/Admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="/Public/Admin/assets/css/style.css" rel="stylesheet">
        <link href="/Public/Admin/assets/css/style-responsive.css" rel="stylesheet">
        <script src="/Public/Admin/assets/js/jquery.js"></script>
        <script src="/Public/Admin/layer/layer.js"></script> 

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="/Public/Admin/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="/Public/Admin/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->

        <div id="login-page">
            <div class="container">

                <form class="form-login">
                    <h2 class="form-login-heading">管理员登录</h2>
                    <div class="login-wrap">
                        <input type="text" name="username" class="form-control" placeholder="账号" autofocus>
                        <br>
                        <input type="password" name="password" class="form-control" placeholder="密码">
                        <br/>
                        <input style="width:50%;float: left;" type="text" name="code" class="form-control" placeholder="验证码"><img style="float: right;cursor: pointer;" width="40%" src="<?php echo U('Login/verify');?>" alt="验证码" onclick="change(this)">
                        <br/>
                        <br/>
                        <br/>
                        <a class="btn btn-theme btn-block" onclick="check()"><i class="fa fa-lock"></i> 立即登录</a>
                        <hr>

                        <div class="login-social-link centered">
                            <p>如果您不小心忘记了密码？请联系我们！</p>
                            <a href="#">电话：0371-55661102</a>
                        </div>
                    </div>
                </form>	  	

            </div>
        </div>
        <script>
            function change(obj) {
                $(obj).attr("src", $(obj).attr("src") + "?");
            }
            function check() {
                var url = "/admin.php/Login/dologin";
                var data = {};
                data.username = $("input[name = 'username']").val();
                data.password = $("input[name = 'password']").val();
                data.code = $("input[name = 'code']").val();

                $.post(url, data, function (res) {
                    res = JSON.parse(res);
                    if (res.status == 1) {
                        window.location.href = res.url;
                    } else {
                        layer.alert(res.msg, {icon: 5});
                    }
                })
            }
        </script>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="/Public/Admin/assets/js/jquery.js"></script>

        <!--BACKSTRETCH-->
        <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
        <script type="text/javascript" src="/Public/Admin/assets/js/jquery.backstretch.min.js"></script>
        <script>
                  $.backstretch("/Public/Admin/assets/img/bg.jpg", {speed: 500});
        </script>


    </body>
</html>