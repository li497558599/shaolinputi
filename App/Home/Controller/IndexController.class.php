<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends BaseController {

    // 首页
    public function index() {
        //免费回电
        $a = I("post.phone");
        if ($a) {
            $data['phone'] = $_POST['phone'];
            $this->call($data);
            die();
        }
        //在线报名
        $b = I('post.name');
        if ($b) {
            $data['name'] = $_POST['name'];
            $data['phone'] = $_POST['years'];
            $data['years'] = $_POST['phone1'];
            $data['content'] = $_POST['content'];
            $this->online($data);
            die();
        }

        session("title", "嵩山少林寺文武专修学院-首页");
        $this->assign('banners', M("lbpics")->where("cates='电脑轮播图片'")->order("id")->select());

        $this->assign('config', M('config')->find());
        $this->assign('company', M('company')->find());

        $this->assign("environinfo1", M("environinfo")->where("cates='校园设施'")->select());
        $this->assign("environinfo2", M("environinfo")->where("cates='宿舍环境'")->select());
        $this->assign("environinfo3", M("environinfo")->where("cates='校园餐厅'")->select());
        $this->assign("environinfo4", M("environinfo")->where("cates='新生入伍'")->select());
        $this->assign("environinfo5", M("environinfo")->where("cates='女生练功图片'")->select());

        $this->assign("cates1", M("cates")->where("dis='教学体系'")->order('id desc')->limit(4)->select());
        $this->assign("cates2", M("cates")->where("dis='机构管理'")->order('id desc')->limit(4)->select());
        $this->assign("cates3", M("cates")->where("dis='在校生活'")->order('id desc')->limit(4)->select());
        $this->assign("cates4", M("cates")->where("dis='来校须知'")->order('id desc')->limit(4)->select());
        $this->assign("cates5", M("cates")->where("dis='报名须知'")->order('id desc')->limit(4)->select());
        $this->assign('clas', M('clas')->find());
        $this->assign('zhaosheng', M('zhaosheng')->find());

        $this->assign('sfinfo', M('sfinfo')->order('id')->select());

        $this->assign('news1', M('news')->order('id desc')->limit(3)->select());

        $this->assign('question', M('question')->order('id desc')->limit(3)->select());

        $this->assign('clas', M('clas')->find());

        $this->assign('kcpics', M('kcpics')->select());

        $this->assign('goes', M('goes')->find());
        $this->assign('pics', M('pics')->order('id desc')->limit(5)->select());
        $this->display();
    }

    public function info1($id) {
         $this->assign('company', M('company')->find());
        $products = M('products')->where("c_id={$id}")->order('id desc')->find();
        $this->assign('banners', M("lbpics")->where("cates='电脑轮播图片'")->order("id")->select());
        M("products")->where("id = {$id}")->setInc('visit', 1);

        $this->assign('config', M('config')->find());
        $this->assign('products', $products);
        $this->display();
    }

    //在线报名
    public function online($data) {

        header("content-type:text/html;charset=utf-8");
        $mode = M('online');

        $data['ctime'] = date("Y-m-d H:i:s");

        $res = $mode->add($data);

        if ($res) {
            $data1['msg'] = "提交成功";
            $data1['status'] = 1;
            $this->ajaxReturn($data1);
        } else {
            $data1['msg'] = "提交失败";
            $data1['status'] = 0;
            $this->ajaxReturn($data1);
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

    public function call($data) {
        header("content-type:text/html;charset=utf-8");
        $mode = M('call');
        $data['ctime'] = date("Y-m-d H:i:s");

        $res = $mode->add($data);
        if ($res) {
            $data['msg'] = "提交成功";
            $data['status'] = 1;
            $this->ajaxReturn($data);

//            die("<script charset='gb2312'>alert('恭喜你！提交成功');location='" . __MODULE__ . "/Index/index';</script>");
        } else {
            $data['msg'] = "提交失败";
            $data['status'] = 0;
            $this->ajaxReturn($data);
//            die("<script>alert('提交失败！');window.history.back();</script>");
        }
    }

}
