<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
            <title><?php echo ($shoufei["title"]); ?></title>
            <meta name="Keywords" content="<?php echo ($shoufei["keywords"]); ?>"/>
            <meta name="Description" content="<?php echo ($shoufei["description1"]); ?>"/>
            <link rel="stylesheet" type="text/css" href="/Public/Home/css/main.css"/>
            <link rel="stylesheet" href="/Public/Home/css/banner.css" />
            <script src="/Public/Home/js/jquery-1.11.1.min.js"></script>
    </head>
    <body>
     
        <!--网站头部开始-->
<div class="head">
    <img class="head1" src="/Public/Home/img/index-22.png"/>
    <div class="mid">
        <div class="head2">
            <a class="left" href="/"><img src="<?php echo ($config[0][pic]); ?>"/></a>
            <div class="right">
                <a href=""><img src="/Public/Home/img/index-05.png"/></a>
                <a href=""><img src="/Public/Home/img/index-06.png"/></a>
            </div>
        </div>
    </div>
</div>

<!--网站导航开始-->
<div class="nav">
    <div class="mid">
        <ul>
            <li><a href="/">武校首页</a></li>
            <li><a href="/about">武校简介</a></li>
            <li><a href="/student">招生简章</a></li>
            <li><a href="/charge">收费标准</a></li>
            <li><a href="/course">课程安排</a></li>
            <li><a href="/environment">教学环境</a></li>
            <li><a href="/question">家长问答</a></li>
            <li><a href="/graduate">毕业去向</a></li>
            <li><a href="/contact">联系我们</a></li>
        </ul>
    </div>
</div>
<div id="solid">
    <div class="solid0"></div><div class="solid1"></div><div class="solid2"></div>
    <ul>
        <?php if(is_array($banners)): foreach($banners as $key=>$vo): ?><li><a href="/"><img src="<?php echo ($vo["pic"]); ?>" /></a></li><?php endforeach; endif; ?>
    </ul>
    <div id="btt"><span></span> <span></span> <span></span></div>
</div>
<script src="/Public/Home/js/banner.js"></script>
<!--banner下方的回拨电话-->
    <div class="banner-02">
        <div class="mid">
            <span class="s1">登封市嵩山少林寺文武学院2017年暑期招生报名全面开启！现在可提前报名预留名额！</span>
            <input type="text" name="phone" class="myphone" value="" placeholder="请输入您的电话号码"/>
            <button  onclick="return check10()" >免费回拨电话</button>
        </div>
    </div>
<!--武校简介内容开始-->
<div class="about">
    <div class="mid">
        <div class="left">
            <h2>特色栏目</h2>
            <ul class="list1">
                <li><a href="/charge">收费标准</a></li>
                <li><a href="/student">招生简章</a></li>
                <li><a href="/question_route">乘坐校车</a></li>
                <li><a href="">在线咨询</a></li>
            </ul>
            <ul class="list2">
                <a href="/student">学武指南</a>
                <a href="/charge">招生收费</a>
                <a href="/sign_up">在线报名</a>
                <a href="">立即咨询</a>
            </ul>
            <h3>联系方式</h3>
            <div class="list3">
                <p>
                    登封市嵩山少林寺文武学院
                    <br />办公电话：<span><?php echo ($company["bphone"]); ?></span>
                    <br />咨询手机：<span><?php echo ($company["zxmobile"]); ?></span>
                    <br />微       信：<span><?php echo ($company["weixin"]); ?></span>
                </p>
            </div>
            <h3>在线报名</h3>
            <div class="list4">
<!--                <form action="<?php echo U('Home/Index/online');?>" method="post">-->
                    <p><u>学员姓名：</u><input type="text" name="name" class="myname1" placeholder="必填"/></p>
                    <p><u>联系电话：</u><input type="text" name="years" class="myyears1" placeholder="必填"/></p>
                    <p><u>微信/qq号：</u><input type="text"  name="phone" class="myphones1" placeholder="选填"/></p>
                    <p><textarea name="content" class="content2" placeholder="请输入留言内容（选填）"></textarea></p>
                    <p><button onclick="return check8()">提交信息</button></p>
                <!--</form>-->
            </div>
        </div>

        <script>

          function check8() {
                var url = "<?php echo U('Index/online');?>";
                var data = {};
                var myname = $(".myname1").val();
                var myyears = $(".myyears1").val();
                var myphones = $(".myphones1").val();
                var content = $(".content2").val();
                if (myname == "")
                {
                    alert("请填写学员姓名！");
                    return false;
                }
                if (myyears == "")
                {
                    alert("请填写联系电话！");
                    return false;
                }
                if (myphones == "")
                {
                    alert("请填写微信/qq号！");
                    return false;
                }
                data.name = myname;
                data.years = myyears;
                data.phone1 = myphones;
                data.content = content;
                $.post(url, data, function (res) {
                    console.log(res);
                    if (res.status == 1) {
                        alert(res.msg);
                    } else {
                        alert(res.msg);
                    }

                })
            }
            
            
             function check10() {
                var url = "<?php echo U('Index/call');?>";
                var data = {};
                var myphone = $(".myphone").val();
                var partten = /^1[3,5,8]\d{9}$/;
                if (myphone == "")
                {
                    alert("请填写手机号！");
                    return false;
                }
                if (!partten.test(myphone))
                {
                    alert("手机号码格式不正确！");
                    return false;
                }
                data.phone = myphone;
                $.post(url, data, function (res) {

                    if (res.status == 1) {
                        alert(res.msg);
                    } else {
                        alert(res.msg);
                    }

                })
            }

        </script>

        
                <div class="right">
                    <h2 class="title1">
                        <u>收费标准</u>
                        <span>当前位置：<a href="/">网站首页</a>><a href="/charge">收费标准</a></span>
                    </h2>
                    <?php echo ($shoufei["dis"]); ?>
                </div>
            </div>
        </div>

      <!--悬浮的服务导航-->
		<div class="box1">
			<h3>服务导航</h3>
			<ul>
				<li><a href="charge">收费标准</a></li>
				<li><a href="student">招生简章</a></li>
				<li><a href="question_route">乘坐校车</a></li>
				<li><a href="">在线咨询</a></li>
			</ul>
			<img class="img1" src="<?php echo ($company["pic1"]); ?>"/>
			<p class="p1">
				扫一扫<br />关注我们
			</p>
			<p class="p2">咨询电话：<br /><?php echo ($company["mobile"]); ?><br /></p>
		</div>
		<!--立即咨询的弹窗-->
		<div class="box2">
			<span class="close"><img src="/Public/Home/img/close.png"/></span>
			<a href=""><img class="img1" src="/Public/Home/img/swt1.gif"/></a>
		</div>
		
		<!--网站底部开始-->
		<div class="foot">
			<div class="mid">
				<h2>
					
                                        	        <a href="/">武校首页</a>
			                    <a href="about">武校简介</a>
			                    <a href="student">招生简章</a>
			                    <a href="charge">收费标准</a>
			                    <a href="course">课程安排</a>
			                    <a href="environment">教学环境</a>
			                    <a href="question">家长问答</a>
			                    <a href="graduate">毕业去向</a>
			                    <a href="contact">联系我们</a>
				</h2>
				<img class="logo" src="/Public/Home/img/index-16.png"/>
				<div class="foot-info">
					<div class="left">
						<p>
						           客服热线：<?php echo ($company["phone"]); ?>
						    <br />学院地址：<?php echo ($company["address"]); ?>
							<br /> <?php echo ($company["banum"]); ?>
							<br /><?php echo ($company["spnum"]); ?></p>
						<p></p>
						<p></p>
						<p></p>
					</div>
					<div class="right">
						<img src="/Public/Home/img/index-21.png" alt="" />
						<img src="/Public/Home/img/index-17.png" alt="" />
						<img src="/Public/Home/img/index-18.png" alt="" />
						<img src="/Public/Home/img/index-19.png" alt="" />
						<img src="/Public/Home/img/index-20.png" alt="" />
					</div>
				</div>
			</div>
		</div>
		

        <!--JavaScript部分-->
        <script type="text/javascript">
            $(document).ready(function () {
                //左侧悬浮的服务窗口
                $(window).scroll(function () {
                    var h1 = 600;
                    var h = $(window).scrollTop();
                    if (h > h1) {
                        $(".box1").show();
                    } else {
                        $(".box1").hide();
                    }
                })
//                //网站中间的弹窗
//                setTimeout(function(){$(".box2").show()},5000);
//                
//                $(".box2 .close").click(function () {
//                    $(".box2").hide();
//                    showbox2();
//                })
//                function showbox2() {
//                    setTimeout(function () {
//                        $(".box2").show();
//                    }, 10000)
//                }
                //点击回拨电话后的验证
                $(".dial_back").click(function () {
                    var phone = $(this).prev().val();
                    var reg = /^1[34578]\d{9}$/;
                    if (!(reg.test(phone))) {
                        alert("请输入正确的手机号码！");
                        return false;
                    }
                })
                //在线报名中的提交按钮的验证
                $(".about form button").click(function () {
                    var phone = $(this).parents("form").find("p").eq(1).find("input").val();
                    var name = $(this).parents("form").find("p").eq(0).find("input").val();
                    var reg_name = /^[ ]+$/;
                    var reg_phone = /^1[34578]\d{9}$/;
                    if (name == "" || reg_name.test(name)) {
                        alert("请您输入学院姓名！");
                        return false;
                    } else {
                        if (!(reg_phone.test(phone))) {
                            alert("请输入正确的手机号码！");
                            return false;
                        }
                    }
                })
            })

        </script>
    </body>
</html>