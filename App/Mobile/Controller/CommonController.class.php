<?php

namespace Mobile\Controller;

use Think\Controller;

class CommonController extends Controller {

    /**
     * 析构函数
     */
    function __construct() {
      
        parent::__construct();
     
            //轮播图片
            $this->assign('banners', M("lbpics")->where("cates='手机轮播图片'")->order("id")->select());
            $this->assign('school', M('school')->order('id desc')->select());
            $this->assign('company', M('company')->order('id desc')->field('address,phone,mobile,banum,spnum,bphone,zxmobile,weixin')->find());
            $this->assign('news', M('news')->order('ctime desc')->limit('0,5')->select());
            $this->assign('link', M('link')->find());
            $this->assign('company',M('company')->find());
            $link = M('link')->select();
            foreach ($link as $k => $v) {
                $link[$k]['arr'] = explode("，", $v['phone']);
            }

            $this->assign('link1', $link);
            $this->assign('config', M('config')->select());
        }

    }

