<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?php echo $_SESSION['title'];$_SESSION['title']=null;;?></title>
    <link rel="shortcut icon" href="<?php echo (session('logo')); ?>" type="image/x-icon">

     <!-- Bootstrap core CSS -->
    <link href="/Public/Admin/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/Public/Admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/assets/lineicons/style.css"> 
    <link href="/Public/Admin/assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/Admin/assets/css/to-do.css">


    
    <!-- Custom styles for this template -->
    <link href="/Public/Admin/assets/css/style.css" rel="stylesheet">
    <link href="/Public/Admin/assets/css/style-responsive.css" rel="stylesheet">

    <script src="/Public/Admin/assets/js/chart-master/Chart.js"></script>
     <!-- js placed at the end of the document so the pages load faster -->
    <script src="/Public/Admin/assets/js/jquery.js"></script>
    <script src="/Public/Admin/assets/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/Admin/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/Public/Admin/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/Public/Admin/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/Public/Admin/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/Public/Admin/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="/Public/Admin/assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="/Public/Admin/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="/Public/Admin/assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="/Public/Admin/assets/js/sparkline-chart.js"></script>    
  <script src="/Public/Admin/assets/js/zabuto_calendar.js"></script> 
  <script src="/Public/Admin/layer/layer.js"></script> 
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/Public/Admin/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="/Public/Admin/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .infor_tx img{border-radius:50%; -moz-border-radius:50%; -webkit-border-radius:50%;  border:0.01rem solid #ff8447; transition:0.5s; overflow:hidden;}
        .infor_tx img:hover{transform:rotate(360deg); cursor:pointer;}
         .page{
                                       margin:2% 35%;
                                }
                            .prev,.next,.current, .num{
                                                                  color: #a94442;
                                                                  float: left;
                                                                  padding: 5px 15px;
                                                                  text-decoration: none;
                                                                  transition: background-color .3s;
                                                                  border: 1px solid #dedede;
                                                                  margin: 0 4px;
                                                        }
    </style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="http://shaolin.zzbgp.uendc.com" class="logo"><b>嵩山少林寺文武学院</b></a>1
            <!--logo end-->
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/admin.php/Login/out">退出</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered infor_tx"><a href="/admin.php/Admin/admin_info"><img src="<?php echo (session('adminpic')); ?>" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo (session('adminusername')); ?></h5>
                    
                  <li class="mt">
                      <a class="active" href="/admin.php/Index/index">
                          <i class="glyphicon glyphicon-home"></i>
                          <span>首页</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-user"></i>
                          <span>个人中心</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Admin/admin_info">我的信息</a></li>
                          <li><a  href="/admin.php/Admin/change_info">修改信息</a></li>
                          <li><a  href="/admin.php/Admin/change_pass">修改密码</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-cogs"></i>
                          <span>网站管理</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Config/config">网站配置</a></li>
                          <li><a  href="/admin.php/Config/change">修改配置</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-desktop"></i>
                          <span>教学体系</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Products/pro_cates">体系列表</a></li>
                          <li><a  href="/admin.php/Products/add_cates">添加体系</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-flag"></i>
                          <span>武校简介</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Company/profile">武校简介</a></li>
                          <li><a  href="/admin.php/Company/lianxi">联系方式</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-font"></i>
                          <span>招生简章</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Zhaosheng/profile">招生简介</a></li>
<!--                          <li><a  href="/admin.php/Zhaosheng/info">招生详情</a></li>
                          <li><a  href="/admin.php/Zhaosheng/school">学院招生</a></li>-->
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-magnet"></i>
                          <span>收费标准</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Shoufei/dis">收费简介</a></li>
                          <li><a  href="/admin.php/Shoufei/info">收费标准</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-bell"></i>
                          <span>课程安排</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Company/clasDis">课程简介</a></li>
                          <li><a  href="/admin.php/Company/clas">课程安排</a></li>
                          <li><a  href="/admin.php/Company/pics">课程安排图集</a></li>
                      </ul>
                  </li>
                      <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-earphone"></i>
                          <span>教学环境</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Environment/dis">内容简介</a></li>
                          <li><a  href="/admin.php/Environment/info">校园风采</a></li>
                      </ul>
                  </li>
                    <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-comments"></i>
                          <span>家长问答</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Question/news">问题列表</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-send"></i>
                          <span>毕业去向</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Work/change_dis">毕业简介</a></li>
                          <li><a  href="/admin.php/Work/change">毕业去向</a></li>
                          <li><a  href="/admin.php/Work/pics">毕业图集</a></li>
                      </ul>
                  </li>
                
                    <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-comments"></i>
                          <span>新闻资讯</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/News/news">资讯列表</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-comments"></i>
                          <span>联系我们</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Contact/contact">联系我们</a></li>
                      </ul>
                  </li>
              
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-users"></i>
                          <span>报名管理</span>
                      </a>
                      <ul class="sub">
                          <li><a href="/admin.php/Report/call">免费回电</a></li>
<!--                          <li><a href="/admin.php/Report/question">咨询列表</a></li>-->
                          <li><a href="/admin.php/Report/online">在线报名</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-picture"></i>
                          <span>轮播图管理</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Lbpics/sy_list">首页轮播图</a></li>
                          <li><a  href="/admin.php/Lbpics/sy_add">添加轮播图</a></li>
                      </ul>
                  </li>
<!--                   <li class="sub-menu">
                      <a href="#" >
                          <i class="glyphicon glyphicon-picture"></i>
                          <span>底部导航链接地址</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/admin.php/Link/link">链接地址</a></li>
                      </ul>
                  </li>-->
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <script>
          $(document).ready(function(){
            //当前页面的判断
            var title1 = $(".wrapper").find(".fa-angle-right").parents("h3").text();
            var title2 = $(".wrapper").find(".fa-angle-right").parents("h4").text();
            //alert(title1);
            if(title1===""){
            	$("li.mt").find("a").addClass("active");
            }else{
            	if(title1==="个人中心"){title1=0;}
	            else if(title1==="网站管理"){title1=1;}
	            else if(title1==="教学体系"){title1=2;}
	            else if(title1==="武校简介"){title1=3;}
	            else if(title1==="招生简章"){title1=4;}
	            else if(title1==="收费标准"){title1=5;}
	            else if(title1==="课程安排"){title1=6;}
	            else if(title1==="教学环境"){title1=7;}
	            else if(title1==="家长问答"){title1=8;}
	            else if(title1==="毕业去向"){title1=9;}
	            else if(title1==="新闻资讯"){title1=10;}
	            else if(title1==="报名管理"){title1=11;}
	            else if(title1==="轮播图管理"){title1=12;}
	            else if(title1==="底部导航链接地址"){title1=13;}
	            
	            if(title2==="我的信息"||title2==="网站配置"||title2==="体系列表"||title2==="武校简介"||title2==="招生简介"||title2==="收费简介"||title2==="课程简介"||title2==="内容简介"||title2==="问题列表"||title2==="毕业简介"||title2==="咨询列表"||title2==="免费回电"||title2==="首页轮播图"||title2==="链接地址"){title2=0;}
	            else if(title2==="修改信息"||title2==="修改配置"||title2==="添加体系"||title2==="联系方式"||title2==="收费标准"||title2==="课程安排"||title2==="校园风采"||title2==="毕业去向"||title2==="在线报名"||title2==="添加轮播图"){title2=1;}
	            else if(title2==="修改密码"||title2==="客场安排图集"||title2==="毕业图集"){title2=2;}
	
	
	            $(".sub-menu").eq(title1).find("ul").css("display","block").find("li").eq(title2).addClass("active");
	            $(".sub-menu").eq(title1).find(".dcjq-parent").addClass("active");
	            $(".mt").find("a").removeClass("active");
            }
            
            
        });
      </script>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>武校简介</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i>联系方式</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>二维码</th><th style="font-size:23px;"><img src="<?php echo ($info["pic1"]); ?>" width="150px" height="100px">  </th>
                            </tr>
                            <tr>
                                <th>地址</th><th style="font-size:23px;"><?php echo ($info["address"]); ?></th>
                            </tr>
                            <tr>
                                <th>电话</th><th style="font-size:23px;"><?php echo ($info["phone"]); ?></th>
                            </tr>
                            <tr>
                                <th>手机号</th><th style="font-size:23px;"><?php echo ($info["mobile"]); ?></th>
                            </tr>
                            <tr>
                                <th>备案号</th><th style="font-size:23px;"><?php echo ($info["banum"]); ?></th>
                            </tr>
                            <tr>
                                <th>审批号</th><th style="font-size:23px;"><?php echo ($info["spnum"]); ?></th>
                            </tr>
                            <tr>
                                <th>办公手机</th><th style="font-size:23px;"><?php echo ($info["bphone"]); ?></th>
                            </tr>
                            <tr>
                                <th>咨询手机</th><th style="font-size:23px;"><?php echo ($info["zxmobile"]); ?></th>
                            </tr>
                            <tr>
                                <th>微信</th><th style="font-size:23px;"><?php echo ($info["weixin"]); ?></th>
                            </tr>
                            <tr>
                                <th style="width:10%;"></th><th><a style="width:30%;" href="/admin.php/Company/change1" class="btn btn-success">修改</a></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div><!-- /col-md-12 -->
        </div><!-- row -->
    </section>
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<!--footer start-->
<footer class="site-footer">
    <div style="cursor: pointer;" class="text-center" onclick="hid()">
        温馨提示：为了保证您的数据安全！请您离开时，一定要记得退出后台！
    </div>
</footer>
<script>
    function hid()
    {
        $(".site-footer").hide();
    }
    var words = ['温馨提示：为了保证您的数据安全！请您离开时，一定要记得退出后台！', '温馨提示：删除数据时，一定要谨慎操作！内存有现，数据无价！', '温馨提示：登录密码要牢记！忘记请联系我们！', '温馨提示：要是您对网站有什么问题，请致电我们公司，我们会详细为您解答！'];

    $(".text-center").html(words[Math.round(Math.random() * 3 + 1)]);



</script>
<!--footer end-->
</section>
</body>
</html>