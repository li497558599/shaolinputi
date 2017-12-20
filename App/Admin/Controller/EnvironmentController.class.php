<?php

namespace Admin\Controller;

use Think\Controller;

class EnvironmentController extends Controller {

    // 教学环境
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }

    // 教学环境
    public function info() {
        $this->cu();
        $keywords = $_GET['keywords'];

        if (empty($keywords)) {
            $title = "教学环境";
            session("title", $title);

            $mode = M('environinfo');
            $count = $mode->count(); // 查询满足要求的总记录数
            $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');

            $show = $Page->show(); // 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $data = $mode->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();

            $this->assign('data', $data);  // 赋值数据集
            $this->assign('page', $show);  // 赋值分页输出
            $this->assign('num', $count);
            $this->display();
        } else {
            $title = "教学环境";
            session("title", $title);

            $mode = M('environinfo');
            $count = $mode->where("title like'%{$keywords}%'")->count(); // 查询满足要求的总记录数
            $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $show = $Page->show(); // 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $data = $mode->where("title like'%{$keywords}%'")->order('ctime')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $this->assign('data', $data);  // 赋值数据集
            $this->assign('page', $show);  // 赋值分页输出
            $this->assign('num', $count);
            $this->display();
        }
    }

    // 修改添加教学环境
    public function addEditInfo() {
        $this->cu();
        $title = "修改添加教学环境";
        session("title", $title);
        if ($_GET['id']) {
            $this->assign("info", M("environinfo")->where("id={$_GET['id']}")->find());
        }
        $this->display();
    }

    // 执行修改添加教学环境
    public function doData() {
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

        $mode = M("environinfo");
        if ($_POST['id']) {
            $result = M("environinfo")->where("id={$_POST['id']}")->field('pic')->find();
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
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Environment/info';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    public function doData1() {
        $data['name'] = $_POST['name'];
        $data['cates'] = $_POST['cates'];
        $data['ctime'] = date("Y-m-d H:i:s");
        $res = M("environinfo")->where("id={$_POST['id']}")->save($data);
        if ($res) {
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Environment/info';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    // 删除教学环境
    public function del() {
        $id = $_GET['id'];
        $res = M("environinfo")->where("id={$id}")->delete();
        if ($res) {
            die("<script>alert('操作成功！');location='" . __MODULE__ . "/Environment/info';</script>");
        } else {
            die("<script>alert('操作失败！');window.history.go(-1);</script>");
        }
    }

    // 教学环境
    public function dis() {
        $this->cu();
        $title = "教学环境";
        session("title", $title);
        $mode = M("environment");
        $this->assign("info", $mode->where("id=1")->find());
        $this->display();
    }

    // 执行修改收费简介
    public function update_dis() {
        $data['dis'] = $_POST['dis'];
        $data['title'] = $_POST['title'];
        $data['keywords'] = $_POST['keywords'];
        $data['description1'] = $_POST['description1'];
        $res = M("environment")->where("id = 1")->save($data);

        if ($res) {
            die("<script>alert('恭喜您！修改成功！');location='" . __MODULE__ . "/Environment/dis';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }

}
