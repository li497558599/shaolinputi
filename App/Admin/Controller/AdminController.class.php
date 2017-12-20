<?php

namespace Admin\Controller;

use Think\Controller;

class AdminController extends Controller {

    // 访问控制
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }

    // 我的信息
    public function admin_info() {
        $this->cu();
        $title = "我的信息";
        session("title", $title);
        $this->assign("info", M("adminuser")->find());
        $this->display();
    }

    // 修改信息
    public function change_info() {
        $this->cu();
        $title = "修改信息";
        session("title", $title);
        $this->assign("info", M("adminuser")->find());
        $this->display();
    }

    // 执行修改
    public function update_info() {
        $upload = new \Think\Upload(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->replace = true;
        $upload->autoSub = false;
        $upload->rootPath = './Public/Uploads/';
        $upload->savePath = ''; // 设置附件上传目录
        // 上传文件 
        $info = $upload->uploadOne($_FILES['pic']);
        if ($info) {
            //实例化
            $mode = M("adminuser");
           
            $data['pic'] = $upload->rootPath . $upload->savePath . $info['savename'];
            $data['pic'] = str_replace('./', '/', $data['pic']);
            $result = $mode->where("id = 1")->field('pic')->find();
            $file = $result['pic'];
            $file = '.' . $file;
            $res = $mode->where("id = 1")->save($data);

            if ($res) {
                unlink($file);
                die("<script>alert('恭喜你！修改成功！');location='" . __MODULE__ . "/Admin/admin_info';</script>");
            } else {
                die("<script>alert('修改失败！');window.history.go(-1);</script>");
            }
        } else {
            // 上传错误提示错误信息    
            $info = $upload->getError();
            die("<script>alert('{$info}');window.history.go(-1);</script>");
        }
    }

    public function update_info2() {
        $mode = M("adminuser");
        $data['username'] = $_POST['username'];
        $data['sex'] = $_POST['sex'];
        $data['years'] = $_POST['years'];
        $data['phone'] = $_POST['phone'];
        $data['email'] = $_POST['email'];
        $data['qq'] = $_POST['qq'];
        $data['wechat'] = $_POST['wechat'];
        $res = $mode->where("id = 1")->save($data);
        if ($res) {
            die("<script>alert('恭喜你！修改成功！');location='" . __MODULE__ . "/Admin/admin_info';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }

    // 修改密码
    public function changepass() {
        $this->cu();
        $tilte = "修改密码";
        session("title", $title);
        $this->display();
    }

    // 执行修改密码
    public function update_pass() {
        $id = session("id");
        $info = M("adminuser")->where("id = {$id}")->field("password")->find();
        $password = $info['password'];
        if ($_POST['oldpassword'] != $password) {
            die(json_encode(['status' => 0, 'msg' => '原始密码不正确！']));
        }
        if ($_POST['newpassword'] != $_POST['repassword']) {
            die(json_encode(['status' => 0, 'msg' => '两次密码不一致！']));
        }
        $data['password'] = $_POST['newpassword'];
        $res = M("adminuser")->where("id = 1")->save($data);
        if ($res) {
            die(json_encode(['status' => 1, 'msg' => '恭喜你！修改成功！']));
        } else {
            die(json_encode(['status' => 0, 'msg' => '修改失败！']));
        }
    }

}
