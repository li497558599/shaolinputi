<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="Keywords" content="<?php echo ($company["keywords"]); ?>"/>
	<meta name="Description" content="<?php echo ($company["description1"]); ?>"/>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title><?php echo ($company["title"]); ?></title>
	<link rel="stylesheet" href="/Public/Mobile/css/main.css" />
	<script src="/Public/Mobile/js/jquery-1.11.1.min.js"></script>
	<script src="/Public/Mobile/js/jquery.touchSlider.js"></script>
	<script src="/Public/Mobile/js/jquery.event.drag-1.5.min.js"></script>
</head>
<body>
	<!--网站头部开始-->
<div class="head">
    <a href="<?php echo U('Mobile/Index/index');?>"><img src="/Public/Mobile/img/index-01.png" alt="" /></a>
</div>
<!--网站导航开始-->
<div class="nav1">
    <ul>
        <li><a href="/">网站首页</a></li>
        <li><a href="<?php echo U('Mobile/About/about');?>">武校简介</a></li>
        <li><a href="<?php echo U('Mobile/Student/student');?>">招生简章</a></li>
        <li><a href="<?php echo U('Mobile/Charge/charge');?>">收费标准</a></li>
        <li><a href="<?php echo U('Mobile/Course/course');?>">课程安排</a></li>
        <li><a href="<?php echo U('Mobile/Question/question');?>">家长问答</a></li>
        <li><a href="<?php echo U('Mobile/Graduate/graduate');?>">毕业去向</a></li>
        <li><a href="<?php echo U('Mobile/Contact/contact');?>">联系我们</a></li>
    </ul>
</div>
<!--网站banner开始-->
<div class="banner">
    <div class="main_visual">
        <div class="flicking_con">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
        </div>
        <div class="main_image">
            <ul>
                <?php if(is_array($banners)): foreach($banners as $key=>$vo): ?><li><span><img src="<?php echo ($vo["pic"]); ?>"/></span></li><?php endforeach; endif; ?>
            </ul>
            <a href="javascript:;" id="btn_prev"></a>
            <a href="javascript:;" id="btn_next"></a>
        </div>
    </div>	
</div>
<!--banner下方的点击咨询-->
<!--<div class="consultation">
        <input type="text" name="" id="" value="" placeholder="学生姓名："/>
        <input type="text" name="" id="" value="" placeholder="您的电话："/>
        <span>立即咨询</span>
</div>-->
	<!--banner下方的点击咨询-->
	<!--<div class="consultation">
		<input type="text" name="" id="" value="" placeholder="学生姓名："/>
		<input type="text" name="" id="" value="" placeholder="您的电话："/>
		<span>立即咨询</span>
	</div>-->
	<!--子页面内容开始-->
	<div class="con">
		<h2><u><img src="/Public/Mobile/img/index-03.png"/>武校简介</u><span>位置：首页>武校简介</span></h2>
		<p><?php echo ($company["profile"]); ?></p>
	</div>
	<!--首页版权信息部分-->
<div class="foot">
    <p>
        <?php echo ($company["banum"]); ?>
        <br /><?php echo ($company["spnum"]); ?>
        <br /><?php echo ($company["address"]); ?>
        <br />联系电话：<?php echo ($company["phone"]); ?>
        <br />手机号：<?php echo ($company["mobile"]); ?>
        <br />
        <img src="/Public/Mobile/img/index-17.png" alt="" />
        <img src="/Public/Mobile/img/index-18.png" alt="" />
        <img src="/Public/Mobile/img/index-19.png" alt="" />
        <!--<img src="img/index-20.png" alt="" />-->
    </p>
</div>
<!--网站底部固定的导航菜单-->
<ul class="nav3">
    <li>
        <a href="tel://<?php echo ($company["phone"]); ?>">
            <img src="/Public/Mobile/img/index-32.png" alt="" />
            <h3>电话咨询</h3>
        </a>
    </li>
    <li>
        <a href="sms:<?php echo ($company["zxmobile"]); ?>">
            <img src="/Public/Mobile/img/index-33.png" alt="" />
            <h3>短信咨询</h3>
        </a>
    </li>
    <li>
        <a href="<?php echo ($link["online"]); ?>" target="_blank">
            <img src="/Public/Mobile/img/index-34.png" alt="" />
            <h3>在线咨询</h3>
        </a>
    </li>
    <li>
        <a href="<?php echo ($link["shool"]); ?>">
            <img src="/Public/Mobile/img/index-35.png" alt="" />
            <h3>乘坐校车</h3>
        </a>
    </li>
</ul>
<!--页面上的弹窗-->
<div class="bg">
    <div class="box">
        <img class="close" src="/Public/Mobile/img/close.png"/>
        <img class="gif" src="/Public/Mobile/img/timg.png" alt="" />
        <h2>官方直属公办院校</h2>
        <form action="<?php echo U('Mobile/Index/call');?>" method="post">
            <h3>
                <input type="text" name="phone" id="" value="" placeholder="请输入手机号码"/>
                <button class="dial_back">免费回电</button>
            </h3>
        </form>
        <p>咨询热线：<a href="tel://<?php echo ($company["phone"]); ?>"><?php echo ($company["phone"]); ?></a></p>
        <h4>
            <a href="tel://<?php echo ($company["phone"]); ?>">
                <img src="/Public/Mobile/img/index-32.png" alt="" />
                <span>电话咨询</span>
            </a>
            <a href="<?php echo U('Mobile/Charge/sign_up');?>">
                <img src="/Public/Mobile/img/index-34.png" alt="" />
                <span>在线预约</span>
            </a>
        </h4>
    </div>
</div>
 <script type="text/javascript">

        $(document).ready(function () {
          

            //点击回拨电话后的验证
            $(".dial_back").click(function () {
                var phone = $(this).prev().val();
                var reg = /^1[34578]\d{9}$/;
                if (!(reg.test(phone))) {
                    alert("请输入正确的手机号码！");
                    return false;
                }
            });

        })
    </script>

	<!--javascript部分-->
	<script type="text/javascript">
		$(document).ready(function(){
			//banner切换效果
			$(function(){
		    	$(".main_image").touchSlider({
					flexible : true,
					speed : 200,
					btn_prev : $("#btn_prev"),
					btn_next : $("#btn_next"),
					paging : $(".flicking_con a"),
					counter : function (e){
						$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
					}
				});
				
				$(".main_image").bind("mousedown", function() {
					$dragBln = false;
				});
				
				$(".main_image").bind("dragstart", function() {
					$dragBln = true;
				});
				
				timer = setInterval(function(){
					$("#btn_next").click();
				}, 3000);
				
				$(".main_visual").hover(function(){
					clearInterval(timer);
				},function(){
					timer = setInterval(function(){
						$("#btn_next").click();
					},3000);
				});
				
				$(".main_image").bind("touchstart",function(){
					clearInterval(timer);
				}).bind("touchend", function(){
					timer = setInterval(function(){
						$("#btn_next").click();
					}, 3000);
				});
				$(window).on("load resize",function(){
					var w = $(".banner").width();
					var h = w*0.506;
					var top = h-30;
					$(".banner").height(h);
					$(".banner div.flicking_con").css("top",top)
				})
			})
			//网站foot的paading-bottom的值
			$(window).on("load resize",function(){
				var h = $(".nav3").css("height");
				$(".foot").css("margin-bottom",h);
			})
			
			//弹窗样式以及效果
			//setTimeout(function(){$(".bg").show();},5000);
			$(".bg .close").click(function(){
				$(".bg").hide();
				showbox();
			})
			function showbox(){
				setTimeout(function(){
					$(".bg").show();
				},10000)
			}
		})
	</script>
</body>
</html>