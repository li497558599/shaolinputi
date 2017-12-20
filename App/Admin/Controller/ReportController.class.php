<?php

namespace Admin\Controller;

use Think\Controller;

class ReportController extends Controller {

    // 访问控制
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }

    // 免费回电
    public function call() {
        $this->cu();
        session("title", "免费回电");
        $mode = M("call");
        $count = $mode->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 15);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data = $mode->order('ctime desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show);  // 赋值分页输出
        $this->assign('num', $count);
        $this->assign("data", $data);
        $this->display();
    }

    //删除回电
    public function delete_call() {
        $res = M("call")->where("id={$_GET['id']}")->delete();
        if ($res) {
            die("<script>alert('恭喜您！删除成功！');location='" . __MODULE__ . "/Report/call';</script>");
        } else {
            die("<script>alert('删除失败！');window.history.go(-1);</script>");
        }
    }

    // 立即咨询
    public function question() {
        $this->cu();
        session("title", "立即咨询");
        $mode = M("question");
        $count = $mode->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 15);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data = $mode->order('ctime desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show);  // 赋值分页输出
        $this->assign('num', $count);
        $this->assign("data", $data);
        $this->display();
    }

    //删除咨询
    public function delete_question() {
        $res = M("question")->where("id={$_GET['id']}")->delete();
        if ($res) {
            die("<script>alert('恭喜您！删除成功！');location='" . __MODULE__ . "/Report/question';</script>");
        } else {
            die("<script>alert('删除失败！');window.history.go(-1);</script>");
        }
    }

    // 在线报名
    public function online() {
        $this->cu();
        session("title", "在线报名");
        $mode = M("online");
        $count = $mode->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 15);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data = $mode->order('ctime desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show);  // 赋值分页输出
        $this->assign('num', $count);
        $this->assign("data", $data);
        $this->display();
    }

    //删除报名
    public function delete_online() {
        $res = M("online")->where("id={$_GET['id']}")->delete();
        if ($res) {
            die("<script>alert('恭喜您！删除成功！');location='" . __MODULE__ . "/Report/online';</script>");
        } else {
            die("<script>alert('删除失败！');window.history.go(-1);</script>");
        }
    }

}
