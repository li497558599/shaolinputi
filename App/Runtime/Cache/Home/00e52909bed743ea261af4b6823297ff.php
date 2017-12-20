<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
            <title><?php echo ($config["title"]); ?></title>
            <meta name="Keywords" content="<?php echo ($config["keywords"]); ?>"/>
            <meta name="Discription" content="<?php echo ($config["discription"]); ?>"/>
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
                    <a class="left" href="/"><img src="<?php echo ($config["pic"]); ?>"/></a>
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

        <!--网站banner部分-->
        <div id="solid">
            <div class="solid0"></div><div class="solid1"></div><div class="solid2"></div>
            <ul>
                <?php if(is_array($banners)): foreach($banners as $key=>$vo): ?><li><a href="/"><img src="<?php echo ($vo["pic"]); ?>" /></a></li><?php endforeach; endif; ?>
            </ul>
            <div id="btt"><span></span> <span></span> <span></span></div>
        </div>
        <script src="/Public/Home/js/banner.js"></script>
        <!--banner下方的回拨电话-->
        <!--        <form action="<?php echo U('Home/Index/call');?>" method="post">-->
        <div class="banner-02">
            <div class="mid">
                <span class="s1">登封市嵩山少林寺文武学院2017年暑期招生报名全面开启！现在可提前报名预留名额！</span>
                <input type="text" name="phone" class="myphone" value="" placeholder="请输入您的电话号码"/>
                <button onclick="return check()" >免费回拨电话</button>
            </div>
        </div>
        <!--</form>-->
        <!--首页内容开始-->
        <div class="content">
            <div class="mid">
                <!--武校简介开始-->
                <div class="cont cont1">
                    <h2>
                        <img src="/Public/Home/img/index-07.png"/>
                        <div class="h2-info">
                            <u>文武并重，习武先修德！育人为先！</u>
                        </div>
                    </h2>
                    <div class="cont-info">
                        <div class="left">
                            <img src="<?php echo ($company["pic"]); ?>" alt="" />
                        </div>
                        <div class="right">
                            <h3>武校简介</h3>
                            <p><?php echo (mb_substr($company["description"],0,300,utf8)); ?></p>
                            <a href="about">查看详情</a>
                        </div>
                    </div>
                    <ul class="list1">
                        <li>
                            <h4>文化教学</h4>
                            <p>
                                <?php if(is_array($cates1)): foreach($cates1 as $key=>$vo): ?><a href="/info1/<?php echo ($vo["id"]); ?>"><?php echo ($vo["cates"]); ?></a><?php endforeach; endif; ?>
                            </p>
                        </li>
                        <li>
                            <h4>武术教学</h4>
                            <p>
                                <?php if(is_array($cates2)): foreach($cates2 as $key=>$vo): ?><a href="/info1/<?php echo ($vo["id"]); ?>"><?php echo ($vo["cates"]); ?></a><?php endforeach; endif; ?>
                            </p>
                        </li>
                        <li>
                            <h4>毕业安排</h4>
                            <p>
                                <?php if(is_array($cates3)): foreach($cates3 as $key=>$vo): ?><a href="info1/<?php echo ($vo["id"]); ?>"><?php echo ($vo["cates"]); ?></a><?php endforeach; endif; ?>
                            </p>
                        </li>
                        <li>
                            <h4>来校须知</h4>
                            <p>
                                <?php if(is_array($cates4)): foreach($cates4 as $key=>$vo): ?><a href="/info1/<?php echo ($vo["id"]); ?>"><?php echo ($vo["cates"]); ?></a><?php endforeach; endif; ?>
                            </p>
                        </li>
                        <li>
                            <h4>报名须知</h4>
                            <p>
                                <?php if(is_array($cates5)): foreach($cates5 as $key=>$vo): ?><a href="/info1/<?php echo ($vo["id"]); ?>"><?php echo ($vo["cates"]); ?></a><?php endforeach; endif; ?>
                            </p>
                        </li>
                    </ul>
                    <ul class="list2">
                        <li class="active">校园设施</li>
                        <li>宿舍环境</li>
                        <li>校园餐厅</li>
                        <li>光荣入伍</li>
                        <li>文化课教室</li>
                        <li class="consult">点击咨询</li>
                    </ul>
                    <ul class="list3 active">
                        <?php if(is_array($environinfo1)): foreach($environinfo1 as $key=>$vo): ?><li>
                                <a href="/environment"><img src="<?php echo ($vo["pic"]); ?>"/></a>
                                <h3><?php echo ($vo["name"]); ?></h3>
                            </li><?php endforeach; endif; ?>
                    </ul>
                    <ul class="list3">
                        <?php if(is_array($environinfo2)): foreach($environinfo2 as $key=>$vo): ?><li>
                                <a href="/environment"><img src="<?php echo ($vo["pic"]); ?>"/></a>
                                <h3><?php echo ($vo["name"]); ?></h3>
                            </li><?php endforeach; endif; ?>
                    </ul>
                    <ul class="list3">
                        <?php if(is_array($environinfo3)): foreach($environinfo3 as $key=>$vo): ?><li>
                                <a href="/environment"><img src="<?php echo ($vo["pic"]); ?>"/></a>
                                <h3><?php echo ($vo["name"]); ?></h3>
                            </li><?php endforeach; endif; ?>

                        </li>
                    </ul>
                    <ul class="list3">
                        <?php if(is_array($environinfo4)): foreach($environinfo4 as $key=>$vo): ?><li>
                                <a href="/environment"><img src="<?php echo ($vo["pic"]); ?>"/></a>
                                <h3><?php echo ($vo["name"]); ?></h3>
                            </li><?php endforeach; endif; ?>
                        </li>
                    </ul>
                    <ul class="list3">
                        <?php if(is_array($environinfo5)): foreach($environinfo5 as $key=>$vo): ?><li>
                                <a href="/environment"><img src="<?php echo ($vo["pic"]); ?>"/></a>
                                <h3><?php echo ($vo["name"]); ?></h3>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
                <!--课程安排开始-->
                <div class="cont cont2">
                    <!--<form action="<?php echo U('Home/Index/call');?>" method="post">-->
                    <h2>
                        <img src="/Public/Home/img/index-08.png"/>
                        <div class="h2-info">
                            <input type="text" name="phone" class="myphone2" value="" placeholder="请输入您的电话号码"/>
                            <button onclick="return check2()">免费回拨电话</button>
                        </div>
                    </h2>
                    <!--</form>-->
                    <p><?php echo ($clas["dis"]); ?></p>
                    <ul>
                        <?php if(is_array($kcpics)): foreach($kcpics as $key=>$vo): ?><li>
                                <a href="/course"><img src="<?php echo ($vo["pic"]); ?>"/></a>
                                <a href="/course"> <h3> <?php echo ($vo["name"]); ?></h3></a>
                            </li><?php endforeach; endif; ?>
                    </ul>
                    <p>
                        <?php echo ($clas["dis2"]); ?>
                    </p>
                </div>
                <!--招生简章开始-->
                <div class="cont cont3">
                    <!--<form action="<?php echo U('Home/Index/call');?>" method="post">-->
                    <h2>
                        <img src="/Public/Home/img/index-09.png"/>
                        <div class="h2-info">
                            <input type="text" name="phone" class="myphone3" value="" placeholder="请输入您的电话号码"/>
                            <button onclick="return check3()">免费回拨电话</button>
                        </div>
                    </h2>
                    <!--</form>-->
                    <div class="cont-info">
                        <div class="left">
                            <img src="<?php echo ($zhaosheng["pic"]); ?>"/>
                        </div>
                        <div class="right">
                            <?php echo ($zhaosheng["description"]); ?>
                        </div>
                    </div>
                </div>
                <!--收费标准开始-->
                <div class="cont cont4">
                    <!--<form action="<?php echo U('Home/Index/call');?>" method="post">-->
                    <h2>
                        <img src="/Public/Home/img/index-11.png"/>
                        <div class="h2-info">
                            <input type="text" name="phone" class="myphone4" value="" placeholder="请输入您的电话号码"/>
                            <button onclick="return check4()">免费回拨电话</button>
                        </div>
                    </h2>
                    <!--</form>-->
                    <ul>
                        <?php if(is_array($sfinfo)): foreach($sfinfo as $key=>$vo): ?><li>
                                <div class="li-1">
                                    <h3><?php echo ($vo["name"]); ?></h3>
                                    <p><?php echo ($vo["dis"]); ?></p>
                                </div>
                                <div class="li-2">
                                    <?php echo ($vo["content"]); ?>
                                    <a href="/charge">查看详情</a>
                                </div>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
                <!--毕业走向开始-->
                <div class="cont cont5">
                    <!--<form action="<?php echo U('Home/Index/call');?>" method="post">-->
                    <h2>
                        <img src="/Public/Home/img/index-10.png"/>
                        <div class="h2-info">
                            <input type="text" name="phone" class="myphone5" value="" placeholder="请输入您的电话号码"/>
                            <button onclick="return check5()" >免费回拨电话</button>
                        </div>
                    </h2>
                    <!--</form>-->
                    <p><?php echo ($goes["dis"]); ?></p>	
                    <ul class="list4">
                        <?php if(is_array($pics)): foreach($pics as $key=>$vo): ?><li>
                                <a href="/graduate"><img src="<?php echo ($vo["pic"]); ?>"/></a>
                                <h3><?php echo ($vo["name"]); ?></h3>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
                <!--新闻资讯开始-->
                <div class="cont cont6">
                    <h2>
                        <img src="/Public/Home/img/index-26.png"/>
                        <div class="h2-info">
                            <input type="text" name="phone" class="myphone6" value="" placeholder="请输入您的电话号码"/>
                            <button  onclick="return check6()">免费回拨电话</button>
                        </div>
                    </h2>
                    <div class="list">
                        <ul>
                            <h3>新闻资讯</h3>
                            <?php if(is_array($news1)): foreach($news1 as $key=>$vo): ?><li>
                                    <div class="pic">
                                        <a href="/news_in/<?php echo ($vo["id"]); ?>"><img src="<?php echo ($vo["pic"]); ?>"/></a>
                                    </div>
                                    <div class="word">
                                        <h4><a href="/news_in/<?php echo ($vo["id"]); ?>"><?php echo (mb_substr($vo["title"],0,15,utf8)); ?>...</a></h4>
                                        <p><?php echo (mb_substr($vo["dis"],0,55,utf8)); ?>...</p>
                                    </div>
                                </li><?php endforeach; endif; ?>
                        </ul>
                        <ul>
                            <h3>问题解答</h3>
                            <?php if(is_array($question)): foreach($question as $key=>$vo): ?><li>
                                    <div class="pic">
                                        <a href="/question_in/<?php echo ($vo["id"]); ?>"><img src="<?php echo ($vo["pic"]); ?>"/></a>
                                    </div>
                                    <div class="word">
                                        <h4><a href="/question_in/<?php echo ($vo["id"]); ?>"><?php echo (mb_substr($vo["title"],0,15,utf8)); ?>...</a></h4>
                                        <p><?php echo (mb_substr($vo["dis"],0,55,utf8)); ?>...</p>
                                    </div>
                                </li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--在线报名开始-->
        <div class="cont cont7">
            <div class="mid">
                <h2>
                    <img src="/Public/Home/img/index-12.png"/>
                    <div class="h2-info">
                        <u>文武并重，习武先修德！育人为先！</u>
                    </div>
                </h2>
                <div class="cont-info">
                    <div class="left">
                        <p><u>咨询热线：</u><span><?php echo ($company["phone"]); ?></span></p>
                        <p><u>联系电话：</u><span><?php echo ($company["mobile"]); ?></span></p>
                        <p><u>学院地址：</u><?php echo ($company["address"]); ?></p>
                        <div class="QR">
                            <img src="<?php echo ($company["pic1"]); ?>" alt="" />
                            <h5>扫一扫<br />关注微信公众号</h5>
                        </div>
                    </div>
                    <div class="right">
                        <!--<form action="<?php echo U('Home/Index/online');?>" method="post">-->
                            <p><u>学员姓名：</u><input type="text"  class="myname" name="name" placeholder="必填"/></p>
                            <p><u>联系电话：</u><input type="text" class="myyears" name="years" placeholder="必填"/></p>
                            <p><u>微信/qq号：</u><input type="text" class="myphones" name="phone" placeholder="选填"/></p>
                            <p><u>留言内容：</u><textarea name="content"  class="content1"  placeholder="选填"></textarea></p>
                            <p><button onclick="return check7()">提交信息</button></p>
                        <!--</form>-->
                    </div>
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
                //武校简介板块中 列表2点击切换图片
                $(".cont1 .list2 li").click(function () {
                    var len = $(".cont1 .list2 li").length;
                    var index = $(this).index();
                    if (index != (len - 1)) {
                        $(this).addClass("active").siblings().removeClass("active");
                        $(".cont1 .list3").hide().eq(index).fadeIn(500);
                    }
                })
                $(".cont1 .list3 li").hover(function () {
                    $(this).find("h3").stop(true).animate({height: "0"}, 500)
                }, function () {
                    $(this).find("h3").stop(true).animate({height: "40px"}, 200)
                })

                //左侧悬浮的服务窗口
                $(window).scroll(function () {
                    var h1 = 820;
                    var h = $(window).scrollTop();
                    if (h > h1) {
                        $(".box1").show();
                    } else {
                        $(".box1").hide();
                    }
                })
                //网站中间的弹窗
//                setTimeout(function () {
//                    $(".box2").show()
//                }, 5000);
//
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
                });
                //学院招生板块
                $(function () {
                    var h0 = $(".cont4 li .li-2").eq(0).height();
                    var h1 = $(".cont4 li .li-2").eq(1).height();
                    var h2 = $(".cont4 li .li-2").eq(2).height();
                    var h = Math.max(h0, h1, h2);
                    $(".cont4 li .li-2").height(h);
                })


                //在线报名中的提交按钮的验证
                $(".cont7 form button").click(function () {
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

        <script>

            function check() {
                var url = "<?php echo U('call');?>";
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
            
            function check2() {
                var url = "<?php echo U('call');?>";
                var data = {};
                var myphone = $(".myphone2").val();
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


            function check3() {
                var url = "<?php echo U('call');?>";
                var data = {};
                var myphone = $(".myphone3").val();
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


            function check4() {
                var url = "<?php echo U('call');?>";
                var data = {};
                var myphone = $(".myphone4").val();
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


            function check5() {
                var url = "<?php echo U('call');?>";
                var data = {};
                var myphone = $(".myphone5").val();
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


            function check6() {
                var url = "<?php echo U('call');?>";
                var data = {};
                var myphone = $(".myphone6").val();
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
            
            

            function check7() {
                var url = "<?php echo U('online');?>";
                var data = {};
                var myname = $(".myname").val();
                var myyears = $(".myyears").val();
                var myphones = $(".myphones").val();
                var content = $(".content1").val();
              
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


        </script>
    </body>
</html>