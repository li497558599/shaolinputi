<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="Keywords" content="<?php echo ($config["keywords"]); ?>"/>
        <meta name="Description" content="<?php echo ($config["discription"]); ?>"/>
        <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title><?php echo ($config["title"]); ?></title>
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

    <!--首页内容开始-->
    <div class="content">
        <div class="cont cont1">
            <h2><u><img src="/Public/Mobile/img/index-03.png"/>武校简介</u><a href="<?php echo U('Mobile/About/about');?>">更多<img src="/Public/Mobile/img/index-04.png"/></a></h2>
            <p><?php echo (mb_substr($company["description"],0,500,utf8)); ?></p>
            <p><img src="<?php echo ($company["pic"]); ?>" alt="" /></p>
            <ul class="list1">
                <ul>
                    <h3>教学体系</h3>
                    <?php if(is_array($cates1)): foreach($cates1 as $key=>$vo): ?><li><a href="/Index/info/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["cates"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
                <ul>
                    <h3>机构管理</h3>
                    <?php if(is_array($cates2)): foreach($cates2 as $key=>$vo): ?><li><a href="/Index/info/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["cates"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
                <ul>
                    <h3>在校生活</h3>
                    <?php if(is_array($cates3)): foreach($cates3 as $key=>$vo): ?><li><a href="/Index/info/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["cates"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
                <ul>
                    <h3>来校须知</h3>
                    <?php if(is_array($cates4)): foreach($cates4 as $key=>$vo): ?><li><a href="/Index/info/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["cates"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
            </ul>
        </div>
        <div class="cont cont2">
            <h2><u><img src="/Public/Mobile/img/index-03.png"/>校园风采</u><!--<a href="">更多<img src="img/index-04.png"/></a>--></h2>
            <ul class="list2">
                <li class="active">
                    <img src="/Public/Mobile/img/index-10-2.png" alt="" />
                    <img src="/Public/Mobile/img/index-10.png" alt="" />
                    <span>女生练功图片</span>
                </li>
                <li>
                    <img src="/Public/Mobile/img/index-11.png" alt="" />
                    <img src="/Public/Mobile/img/index-11-02.png" alt="" />
                    <span>校园设施</span>
                </li>
                <li>
                    <img src="/Public/Mobile/img/index-12.png" alt="" />
                    <img src="/Public/Mobile/img/index-12-02.png" alt="" />
                    <span>宿舍环境</span>
                </li>
                <li>
                    <img src="/Public/Mobile/img/index-13.png" alt="" />
                    <img src="/Public/Mobile/img/index-13-02.png" alt="" />
                    <span>校园餐厅</span>
                </li>
                <li>
                    <img src="/Public/Mobile/img/index-15.png" alt="" />
                    <img src="/Public/Mobile/img/index-15-02.png" alt="" />
                    <span>新生入伍</span>
                </li>
                <li>
                    <a href="">
                        <img src="/Public/Mobile/img/index-14.png" alt="" />
                        <span>点击咨询</span>
                    </a>
                </li>
            </ul>
            <div class="pic">
                <img class="img1" src="<?php echo ($environinfo5["pic"]); ?>"/>
                <img class="img1" src="<?php echo ($environinfo1["pic"]); ?>"/>
                <img class="img1" src="<?php echo ($environinfo2["pic"]); ?>"/>
                <img class="img1" src="<?php echo ($environinfo3["pic"]); ?>"/>
                <img class="img1" src="<?php echo ($environinfo4["pic"]); ?>"/>
            </div>
        </div>


        <div class="cont cont3">
            <h2><u><img src="/Public/Mobile/img/index-03.png"/>课程安排</u><a href="<?php echo U('Mobile/Course/course');?>">更多<img src="/Public/Mobile/img/index-04.png"/></a></h2>
            <ul class="list3">
                <p class="title"><?php echo ($clas["dis"]); ?></p>
                <li>

                    <div class="">
                        <a href="<?php echo U('Mobile/Course/course');?>"><img src="<?php echo ($kcpics1["pic"]); ?>"/></a>
                    </div>
                    <a href="<?php echo U('Mobile/Course/course');?>"> <h3><?php echo ($kcpics1["name"]); ?></h3></a>

                </li>
                <li>
                    <div class="">
                        <a href="<?php echo U('Mobile/Course/course');?>"><img src="<?php echo ($kcpics2["pic"]); ?>"/></a>
                    </div>
                    <a href="<?php echo U('Mobile/Course/course');?>"><h3><?php echo ($kcpics2["name"]); ?></h3></a>
                </li>
                <li>
                    <div class="">
                        <a href="<?php echo U('Mobile/Course/course');?>"><img src="<?php echo ($kcpics3["pic"]); ?>"/></a>
                    </div>
                     <a href="<?php echo U('Mobile/Course/course');?>"><h3><?php echo ($kcpics3["name"]); ?></h3></a>
                </li>
                <li>
                    <div class="">
                         <a href="<?php echo U('Mobile/Course/course');?>"><img src="<?php echo ($kcpics4["pic"]); ?>"/>></a>
                    </div>
                    <a href="<?php echo U('Mobile/Course/course');?>"><h3><?php echo ($kcpics4["name"]); ?></h3></a>
                </li>
            </ul>
        </div>




        <ul class="nav2">
            <li>
                <a href="tel://<?php echo ($company["phone"]); ?>">
                    <img src="/Public/Mobile/img/index-32.png"/>
                    <h3>电话咨询</h3>
                </a>
            </li>
            <li>
                <a href="sms:<?php echo ($company["zxmobile"]); ?>">
                    <img src="/Public/Mobile/img/index-33.png"/>
                    <h3>短信咨询</h3>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="/Public/Mobile/img/index-34.png"/>
                    <h3>在线咨询</h3>
                </a>
            </li>
            <li>
                <a href="#zxbm" >
                    <img src="/Public/Mobile/img/index-35.png"/>
                    <h3>在线报名</h3>
                </a>
            </li>
        </ul>
        <div class="cont cont4">
            <h2><u><img src="/Public/Mobile/img/index-03.png"/>毕业去向</u><a href="<?php echo U('Mobile/Graduate/graduate');?>">更多<img src="/Public/Mobile/img/index-04.png"/></a></h2>
            <p><?php echo ($goes["dis"]); ?></p>	
            <ul class="list4">
                <?php if(is_array($pics)): foreach($pics as $key=>$vo): ?><li>
                        <img src="<?php echo ($vo["pic"]); ?>"/>
                        <h3><?php echo ($vo["name"]); ?></h3>
                    </li><?php endforeach; endif; ?>

            </ul>
        </div>
        <div class="cont cont5">
            <h2><u><img src="/Public/Mobile/img/index-03.png"/>新闻资讯</u><a href="<?php echo U('Mobile/News/news');?>">更多<img src="/Public/Mobile/img/index-04.png"/></a></h2>
            <ul class="list5">
                <?php if(is_array($news1)): foreach($news1 as $key=>$vo): ?><li>
                        <a href="/News/news_in/id/<?php echo ($vo["id"]); ?>">
                            <div class="li_l">
                                <img src="<?php echo ($vo["pic"]); ?>"/>
                            </div>
                            <div class="li_r">
                                <h3><?php echo ($vo["title"]); ?></h3>
                                <p><?php echo (mb_substr($vo["dis"],0,40,utf8)); ?></p>
                            </div>
                        </a>
                    </li><?php endforeach; endif; ?>

            </ul>
        </div>
        <div class="cont cont6" id="#sign_up"><a name="zxbm"></a>
            <h2><u><img src="/Public/Mobile/img/index-03.png"/>在线报名</u><a href="<?php echo U('Mobile/Charge/sign_up');?>">更多<img src="/Public/Mobile/img/index-04.png"/></a></h2>
            <form action="<?php echo U('Mobile/Index/online');?>"  method="post">
                <p><u>学生姓名：</u><input type="text" name="name" id="" value="" placeholder="必填"/></p>
                <p><u>联系电话：</u><input type="text" name="years" id="" value="" placeholder="必填"/></p>
                <p><u>微信/qq号：</u><input type="text" name="phone" id="" value="" placeholder="必填"/></p>
                <p><u>留言内容：</u><input type="text" name="content" id="" value="" placeholder="可不填"/></p>
                <p><button type="submit">提交信息</button></p>
            </form>
        </div>
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

        $(document).ready(function () {
            //banner切换效果
            $(function () {
                $(".main_image").touchSlider({
                    flexible: true,
                    speed: 200,
                    btn_prev: $("#btn_prev"),
                    btn_next: $("#btn_next"),
                    paging: $(".flicking_con a"),
                    counter: function (e) {
                        $(".flicking_con a").removeClass("on").eq(e.current - 1).addClass("on");
                    }
                });

                $(".main_image").bind("mousedown", function () {
                    $dragBln = false;
                });

                $(".main_image").bind("dragstart", function () {
                    $dragBln = true;
                });

                timer = setInterval(function () {
                    $("#btn_next").click();
                }, 3000);

                $(".main_visual").hover(function () {
                    clearInterval(timer);
                }, function () {
                    timer = setInterval(function () {
                        $("#btn_next").click();
                    }, 3000);
                });

                $(".main_image").bind("touchstart", function () {
                    clearInterval(timer);
                }).bind("touchend", function () {
                    timer = setInterval(function () {
                        $("#btn_next").click();
                    }, 3000);
                });
                $(window).on("load resize", function () {
                    var w = $(".banner").width();
                    var h = w * 0.506;
                    var top = h - 30;
                    $(".banner").height(h);
                    $(".banner div.flicking_con").css("top", top)
                })
            })
            //网站foot的paading-bottom的值
            $(window).on("load resize", function () {
                var h = $(".nav3").css("height");
                $(".foot").css("margin-bottom", h);
            })
            //学校风采板块 点击切换图片效果
            $(function () {
                var w = $(".pic").width();
                $(".pic").height(w * 0.57);
                $(".list2 li").click(function () {
                    var num = $(this).index();
                    $(this).addClass("active");
                    $(this).siblings().removeClass("active");
                    $(".pic img").fadeOut();
                    $(".pic img").eq(num).fadeIn();
                    var h2 = $(".pic img").eq(num).height();
                    $(".pic").height(h2);
                });
                $(".list2 li").eq(5).unbind("click");
            })
            //学院招生板块
            $(function () {
                setTimeout(list3pic, 2000);
                function list3pic() {
                    var h0 = $(".list3 li").eq(0).height();
                    var h1 = $(".list3 li").eq(1).height();
                    var h2 = $(".list3 li").eq(2).height();
                    var h3 = $(".list3 li").eq(3).height();
                    var h = Math.min(h0, h1, h2, h3);
                    $(".list3 li").height(h + 30);
                }
            });
//            //弹窗样式以及效果
//            setTimeout(function () {
//                $(".bg").show();
//            }, 5000);
//            $(".bg .close").click(function () {
//                $(".bg").hide();
//                showbox();
//            });
//            function showbox() {
//                setTimeout(function () {
//                    $(".bg").show();
//                }, 10000);
//            }
            //教学体系各个板块的高度计算
            $(function () {
                var list1_w = $(".list1 ul").width();
                var list1_h = list1_w * 0.625;
                $(".list1 ul").height(list1_h);
            })
            $(window).resize(function () {
                var list1_w = $(".list1 ul").width();
                var list1_h = list1_w * 0.625;
                $(".list1 ul").height(list1_h);
            })
            //在线报名中的提交按钮的验证
            $(".cont6 form button").click(function () {
                var phone = $(this).parents("form").find("p").eq(1).find("input").val();
                var name = $(this).parents("form").find("p").eq(0).find("input").val();
                var reg_name = /^[ ]+$/;
                var reg_phone = /^1[34578]\d{9}$/;
                if (name == "" || reg_name.test(name)) {
                    alert("请您输入学员姓名！");
                    return false;
                } else {
                    if (!(reg_phone.test(phone))) {
                        alert("请输入正确的手机号码！");
                        return false;
                    }
                }
            })

            //点击回拨电话后的验证
            $(".dial_back").click(function () {
                var phone = $(this).prev().val();
                var reg = /^1[34578]\d{9}$/;
                if (!(reg.test(phone))) {
                    alert("请输入正确的手机号码！");
                    return false;
                }
            });
            $(function () {
                setTimeout(picheight, 2000);
                function picheight() {
                    var h0 = $(".cont4 .list4 li").eq(0).outerHeight();
                    var h1 = $(".cont4 .list4 li").eq(1).outerHeight();
                    var h2 = $(".cont4 .list4 li").eq(2).outerHeight();
                    var h3 = $(".cont4 .list4 li").eq(3).outerHeight();
                    var h = Math.max(h0, h1, h2, h3);
                    $(".cont4 .list4 li").height(h);
                }
            })

        })
    </script>
</body>
</html>