<?php

namespace Admin\Controller;

use Think\Controller;

class CompanyController extends Controller {

    // 访问控制
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }

    // 武校简介
    public function profile() {
        $this->cu();
        $title = "武校简介";
        session("title", $title);
        $this->assign("info", M("company")->find());
        $this->display();
    }

    // 修改简介
    public function change() {
        $this->cu();
        $title = "修改简介";
        session("title", $title);
        $this->assign("info", M("company")->find());
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

        $mode = M("company");
        if ($_POST['id']) {
            $result = M("company")->where("id={$_POST['id']}")->field('pic')->find();
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
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Company/profile';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    public function update2() {
        $data['title'] = $_POST['title'];
        $data['keywords'] = $_POST['keywords'];
        $data['description'] = $_POST['description'];
        $data['description2'] = $_POST['description2'];
        $data['ctime'] = date("Y-m-d H:i:s");
        $result = M("company")->where("id={$_POST['id']}")->save($data);
        if ($result) {
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Company/profile';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    // 武校简介
    public function dis() {
        $this->cu();
        $title = "武校简介";
        session("title", $title);
        $this->assign("info", M("company")->field("profile")->find());
        $this->display();
    }

    // 修改简介
    public function change_dis() {
        $this->cu();
        $title = "修改简介";
        session("title", $title);
        $this->assign("info", M("company")->field("profile")->find());
        $this->display();
    }

    // 执行修改简介
    public function update_dis() {
        $data['profile'] = $_POST['profile'];
        $res = M("company")->where("id = 1")->save($data);

        if ($res) {
            die("<script>alert('恭喜您！修改成功！');location='" . __MODULE__ . "/Company/dis';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }

    // 课程安排
    public function clas() {
        $this->cu();
        $title = "课程安排";
        session("title", $title);
        $mode = M("clas");
        $this->assign("info", $mode->where("id=1")->find());
        $this->display();
    }

    // 执行修改课程安排
    public function update_clas() {
        $data['dis'] = $_POST['content'];
        $data['dis2'] = $_POST['content1'];
        $data['ctime'] = date("Y-m-d H:i:s");

        $res = M("clas")->where("id = 1")->save($data);

        if ($res) {
            die("<script>alert('恭喜您！修改成功！');location='" . __MODULE__ . "/Company/clas';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }

    // 课程简介
    public function clasDis() {
        $this->cu();
        $title = "课程简介";
        session("title", $title);
        $mode = M("clasdis");
        $this->assign("info", $mode->where("id=1")->find());
        $this->display();
    }

    // 执行修改课程简介
    public function update_clasDis() {
        $data['clasdis'] = $_POST['content'];
        $data['title'] = $_POST['title'];
        $data['keywords'] = $_POST['keywords'];
        $data['description1'] = $_POST['description1'];
        $res = M("clasdis")->where("id = 1")->save($data);

        if ($res) {
            die("<script>alert('恭喜您！修改成功！');location='" . __MODULE__ . "/Company/clasDis';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }

    // 联系方式
    public function lianxi() {
        $this->cu();
        $title = "联系方式";
        session("title", $title);
        $this->assign("info", M("company")->find());
        $this->display();
    }

    // 修改联系方式
    public function change1() {
        $this->cu();
        $title = "联系方式";
        session("title", $title);
        $this->assign("info", M("company")->find());
        $this->display();
    }

    // 执行修改
    public function update1() {
        $this->cu();
       //实例化
        $mode = M("company");
        $id = $_POST['id'];
          $data['address'] = $_POST['address'];
        $data['phone'] = $_POST['phone'];
        $data['mobile'] = $_POST['mobile'];
        $data['banum'] = $_POST['banum'];
        $data['spnum'] = $_POST['spnum'];
        $data['bphone'] = $_POST['bphone'];
        $data['zxmobile'] = $_POST['zxmobile'];
        $data['weixin'] = $_POST['weixin'];
        if ($_FILES['pic1']['name'] != "") {
            $data['pic1'] = upload($_FILES);
            $result = $mode->where("id = {$id}")->field('pic1')->find();
            $file = $result['pic1'];
            $file = '.' . $file;
        }
        $res = $mode->where("id = {$id}")->save($data);
        if ($res) {
            if ($_FILES['pic1']['name'] != "") {
                @unlink($file);
            }
            die("<script>alert('恭喜你！修改成功！');location='" . __MODULE__ . "/Company/lianxi';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }

    }

//    首页显示课程安排
    public function pics() {
        $this->cu();
        $title = "课程安排";
        session("title", $title);
        $mode = M("kcpics");
        $data = $mode->order("id")->select();
        $this->assign("data", $data);
        $this->display();
    }

    // 查看详情
    public function pics_info($id) {
        $this->cu();
        $title = "查看详情";
        session("title", $title);
        $this->assign("info", M("kcpics")->where("id = {$id}")->field("dis,content")->find());
        $this->display();
    }

    // 修改添加课程安排
    public function addEditPics() {
        $this->cu();
        $title = "修改添加课程安排";
        session("title", $title);
        if ($_GET['id']) {
            $this->assign("info", M("kcpics")->where("id={$_GET['id']}")->find());
        }
        $this->display();
    }

    // 执行修改添加课程安排
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

        $mode = M("kcpics");
        if ($_POST['id']) {
            $result = M("kcpics")->where("id={$_POST['id']}")->field('pic')->find();
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
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Company/pics';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    public function doPics1() {
        $data['name'] = $_POST['name'];
        $data['dis'] = $_POST['dis'];
        $data['content'] = $_POST['content'];
        $data['ctime'] = date("Y-m-d H:i:s");
        $res = M("kcpics")->where("id={$_POST['id']}")->save($data);
        if ($res) {
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Company/pics';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    // 删除课程安排
    public function delPics() {
        $id = $_GET['id'];
        $result = M("kcpics")->where("id={$id}")->field('pic')->find();
        $file = $result['pic'];
        $file = '.' . $file;
        $res = M("kcpics")->where("id={$id}")->delete();
        if ($res) {
            @unlink($file);
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Company/pics';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

}
