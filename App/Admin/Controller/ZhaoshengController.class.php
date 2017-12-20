<?php

namespace Admin\Controller;

use Think\Controller;

class ZhaoshengController extends Controller {

    // 访问控制
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }

    // 招生简章
    public function profile() {
        $this->cu();
        $title = "招生简章";
        session("title", $title);
        $this->assign("info", M("zhaosheng")->find());
        $this->display();
    }

    // 修改简介
    public function change() {
        $this->cu();
        $title = "修改简介";
        session("title", $title);
        $this->assign("info", M("zhaosheng")->find());
        $this->display();
    }

    // 执行修改
    public function update() {
        $this->cu();
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
       
        $mode = M("zhaosheng");
        if ($_POST['id']) {
            $result = M("zhaosheng")->where("id={$_POST['id']}")->field('pic')->find();
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
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Zhaosheng/profile';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    public function update1() {
        $data['title'] = $_POST['title'];
        $data['keywords'] = $_POST['keywords'];
        $data['description'] = $_POST['description'];
        $data['description1'] = $_POST['description1'];

        $result = M("zhaosheng")->where("id={$_POST['id']}")->save($data);
        if ($result) {
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Zhaosheng/profile';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    // 招生简章
    public function dis() {
        $this->cu();
        $title = "招生简章";
        session("title", $title);
        $this->assign("info", M("zhaosheng")->field("profile")->find());
        $this->display();
    }

    // 修改简介
    public function change_dis() {
        $this->cu();
        $title = "修改简介";
        session("title", $title);
        $this->assign("info", M("zhaosheng")->field("profile")->find());
        $this->display();
    }

    // 执行修改简介
    public function update_dis() {
        $data['profile'] = $_POST['profile'];
        $res = M("zhaosheng")->where("id = 1")->save($data);
        if ($res) {
            die("<script>alert('恭喜您！修改成功！');location='" . __MODULE__ . "/Zhaosheng/dis';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }

}
