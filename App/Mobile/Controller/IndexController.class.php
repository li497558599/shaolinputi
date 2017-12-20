<?php

namespace Mobile\Controller;

use Think\Controller;

class IndexController extends CommonController {

    // 首页
    public function index() {
        session("title", "嵩山少林寺文武专修学院-首页");
        $this->assign('banners', M("lbpics")->where("cates='手机轮播图片'")->order("id")->where("cates='手机轮播图片'")->select());

        $this->assign('config', M('config')->find());
        $this->assign('company', M('company')->find());

        $this->assign("environinfo1", M("environinfo")->where("cates='校园设施'")->limit(1)->order('id desc')->find());
        $this->assign("environinfo2", M("environinfo")->where("cates='宿舍环境'")->find());
        $this->assign("environinfo3", M("environinfo")->where("cates='校园餐厅'")->find());
        $this->assign("environinfo4", M("environinfo")->where("cates='新生入伍'")->find());
        $this->assign("environinfo5", M("environinfo")->where("cates='女生练功图片'")->limit(1)->order('id desc')->find());

        $this->assign("cates1", M("cates")->where("dis='教学体系'")->select());
        $this->assign("cates2", M("cates")->where("dis='机构管理'")->select());
        $this->assign("cates3", M("cates")->where("dis='在校生活'")->select());
        $this->assign("cates4", M("cates")->where("dis='来校须知'")->select());
//        $this->assign("cates5", M("cates")->where("dis='报名须知'")->select());
        $this->assign('clas', M('clas')->find());
        $this->assign('zhaosheng', M('zhaosheng')->find());

        $this->assign('sfinfo', M('sfinfo')->order('id')->select());

        $this->assign('news1', M('news')->order('id desc')->limit(5)->select());

        $this->assign('question', M('question')->order('id desc')->limit(5)->select());

        $this->assign('kcpics', M('kcpics')->order('id desc')->limit(4)->select());
        
        $this->assign('kcpics1', M('kcpics')->where("id=3")->find());
        $this->assign('kcpics2', M('kcpics')->where("id=4")->find());
        $this->assign('kcpics3', M('kcpics')->where("id=6")->find());
        $this->assign('kcpics4', M('kcpics')->where("id=8")->find());
        
        $this->assign('pics', M('pics')->order('id desc')->limit(4)->select());
        $this->assign('goes', M('goes')->find());
        $this->display();
    }


    public function info($id) {
//        $this->assign('banners', M("lbpics")->order("id")->select());
        $products = M('products')->where("c_id={$id}")->order('id desc')->find();

        M("products")->where("id = {$id}")->setInc('visit', 1);

        $this->assign('config', M('config')->find());
        $this->assign('products', $products);
        $this->display();
    }
   

    //在线报名
    public function online() {

        header("content-type:text/html;charset=utf-8");
        $mode = M('online');
        $data['name'] = $_POST['name'];
        $data['years'] = $_POST['years'];
        $data['phone'] = $_POST['phone'];
        $data['content'] = $_POST['content'];
        $data['ctime'] = date("Y-m-d H:i:s");
        $res = $mode->add($data);

        if ($res) {
            die("<script charset='gb2312'>alert('恭喜你！提交成功');location='" . __MODULE__ . "/Index/index';</script>");
        } else {
            die("<script>alert('提交失败！');window.history.back();</script>");
        }
    }

//    立即咨询
    public function question() {
        header("content-type:text/html;charset=utf-8");
        $mode = M('question');
        $data['name'] = $_POST['name'];
        $data['phone'] = $_POST['phone'];
        $data['ctime'] = date("Y-m-d H:i:s");

        $res = $mode->add($data);
        if ($res) {
            die(json_encode(["status" => 1, "msg" => "提交成功！", "url" => __MODULE__ . "/Index/index"]));
        } else {
            die(json_encode(["status" => 0, "msg" => "提交失败！"]));
        }
    }

    public function call() {
        header("content-type:text/html;charset=utf-8");
        $mode = M('call');
        $data['phone'] = $_POST['phone'];
        $data['ctime'] = date("Y-m-d H:i:s");

        $res = $mode->add($data);
        if ($res) {
            die("<script charset='gb2312'>alert('恭喜你！提交成功');location='" . __MODULE__ . "/Index/index';</script>");
        } else {
            die("<script>alert('提交失败！');window.history.back();</script>");
        }
    }

}
