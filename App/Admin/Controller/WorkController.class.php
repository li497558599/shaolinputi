<?php

namespace Admin\Controller;

use Think\Controller;

class WorkController extends Controller {

    // 访问控制
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }

    // 修改简介
    public function change_dis() {
        $this->cu();
        $title = "修改简介";
        session("title", $title);
        $this->assign("info", M("bydis")->where("id=1")->find());
        $this->display();
    }

    // 执行修改简介
    public function update_dis() {
        $data['dis'] = $_POST['content'];
        $data['title'] = $_POST['title'];
        $data['keywords'] = $_POST['keywords'];
        $data['description1'] = $_POST['description1'];
        $res = M("bydis")->where("id = 1")->save($data);

        if ($res) {
            die("<script>alert('恭喜您！修改成功！');location='" . __MODULE__ . "/Work/change_dis';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }

    // 修改简介
    public function change() {
        $this->cu();
        $title = "修改简介";
        session("title", $title);
        $this->assign("info", M("goes")->where("id=1")->find());
        $this->display();
    }

    // 执行修改简介
    public function update() {
        $data['dis'] = $_POST['dis'];
        $res = M("goes")->where("id = 1")->save($data);

        if ($res) {
            die("<script>alert('恭喜您！修改成功！');location='" . __MODULE__ . "/Work/change';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }

    // 毕业图集
    public function pics() {
        $this->cu();
        $title = "毕业图集";
        session("title", $title);
        $mode = M("pics");
        $data = $mode->order("id desc")->select();
        $this->assign("data", $data);
        $this->display();
    }

    public function pics_info($id) {
        $this->cu();
        $title = "查看详情";
        session("title", $title);
        $this->assign("info", M("pics")->where("id = {$id}")->field("content")->find());
        $this->display();
    }

    // 修改添加毕业图集
    public function addEditPics() {
        $this->cu();
        $title = "修改添加毕业图集";
        session("title", $title);
        if ($_GET['id']) {
            $this->assign("info", M("pics")->where("id={$_GET['id']}")->find());
        }
        $this->display();
    }

    // 执行修改添加毕业图集
    public function doPics() {
        $this->cu();
        if (empty($_FILES['pic']['name'])) {
            die("<script>alert('没有文件被上传！');window.history.go(-1);</script>");
        }
        $upload = new \Think\Upload(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->replace = true;
        $upload->autoSub = false;
        $upload->rootPath = './Public/Uploads/';
        $upload->savePath = ''; // 设置附件上传目录
        // 上传文件 
        $info = $upload->uploadOne($_FILES['pic']);
        $data['pic'] = $upload->rootPath . $upload->savePath . $info['savename'];
        $data['pic'] = str_replace('./', '/', $data['pic']);
        $data['pic'] = str_replace('./', '/', $data['pic']);

        $mode = M("pics");
        if ($_POST['id']) {
            $result = M("pics")->where("id={$_POST['id']}")->field('pic')->find();
            $file = $result['pic'];
            $file = '.' . $file;
            $res = $mode->where("id={$_POST['id']}")->save($data);
            if ($res) {
                @unlink($file);
            }
        } else {
            $res = $mode->add($data);
        }
        if ($res) {
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Work/pics';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    public function doPics1() {
        $data['name'] = $_POST['name'];
        $data['content'] = $_POST['content'];
        $data['ctime'] = date("Y-m-d H:i:s");
        $res = M("pics")->where("id={$_POST['id']}")->save($data);
        if ($res) {
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Work/pics';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    // 删除毕业图集
    public function delPics() {
        $id = $_GET['id'];
        $result = M("pics")->where("id={$id}")->field('pic')->find();
        $file = $result['pic'];
        $file = '.' . $file;
        $res = M("pics")->where("id={$id}")->delete();
        if ($res) {
            @unlink($file);
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Work/pics';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

}
