<?php

namespace Admin\Controller;

use Think\Controller;

class ShoufeiController extends Controller {

    // 访问控制
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }

    // 收费标准
    public function info() {
        $this->cu();
        $title = "收费标准";
        session("title", $title);
        $mode = M("sfinfo");
        $data = $mode->order("id")->select();
        $this->assign("data", $data);
        $this->display();
    }

    // 修改添加收费标准
    public function addEditInfo() {
        $this->cu();
        $title = "修改添加收费标准";
        session("title", $title);
        if ($_GET['id']) {
            $this->assign("info", M("sfinfo")->where("id={$_GET['id']}")->find());
        }
        $this->display();
    }

    // 执行修改添加收费标准
    public function doData() {
        $this->cu();
        $data['name'] = $_POST['name'];
        $data['dis'] = $_POST['dis'];
        $data['content'] = $_POST['content'];
        $data['ctime'] = date("Y-m-d H:i:s");
        $mode = M("sfinfo");
        if ($_POST['id']) {
            $res = $mode->where("id={$_POST['id']}")->save($data);
        } else {
            $res = $mode->add($data);
        }
        if ($res) {
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Shoufei/info';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    // 删除收费标准
    public function del() {
        $id = $_GET['id'];
        $res = M("sfinfo")->where("id={$id}")->delete();
        if ($res) {
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Shoufei/info';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    // 收费简介
    public function dis() {
        $this->cu();
        $title = "收费简介";
        session("title", $title);
        $mode = M("shoufei");
        $this->assign("info", $mode->where("id=1")->find());
        $this->display();
    }

    // 执行修改收费简介
    public function update_dis() {
        $data['dis'] = $_POST['content'];
        $data['title'] = $_POST['title'];
        $data['keywords'] = $_POST['keywords'];
        $data['description1'] = $_POST['description1'];
        $res = M("shoufei")->where("id = 1")->save($data);

        if ($res) {
            die("<script>alert('恭喜您！修改成功！');location='" . __MODULE__ . "/Shoufei/dis';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }

}
