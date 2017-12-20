<?php

namespace Admin\Controller;

use Think\Controller;

class NewsController extends Controller {

    //新闻资讯
    // 访问控制
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }

    public function news() {
        $this->cu();
        $keywords = $_GET['keywords'];

        if (empty($keywords)) {
            $title = "教学环境";
            session("title", $title);

            $mode = M('news');
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

            $mode = M('news');
            $count = $mode->where("title like'%{$keywords}%'")->count(); // 查询满足要求的总记录数
            $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $show = $Page->show(); // 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $data = $mode->where("title like'%{$keywords}%'")->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $this->assign('data', $data);  // 赋值数据集
            $this->assign('page', $show);  // 赋值分页输出
            $this->assign('num', $count);
            $this->display();
        }
    }

    // 查看详情
    public function news_info($id) {
        $this->cu();
        $title = "查看详情";
        session("title", $title);
        $this->assign("info", M("news")->where("id = {$id}")->field("dis,content")->find());
        $this->display();
    }

    // 修改新闻咨询
    public function change_news($id) {
        $this->cu();
        $title = "修改新闻咨询";
        session("title", $title);
        $this->assign("info", M("news")->where("id = {$id}")->find());
        $this->assign("id", $id);
        $this->display();
    }

    public function update_news() {
        $upload = new \Think\Upload(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->replace = true;
        $upload->autoSub = false;
        $upload->rootPath = './Public/Uploads/';
        $upload->savePath = ''; // 设置附件上传目录
        // 上传文件 
        $info = $upload->uploadOne($_FILES['pic']);
        $id = $_POST['id'];
        if ($info) {
            $data['pic'] = $upload->rootPath . $upload->savePath . $info['savename'];
            $data['pic'] = str_replace('./', '/', $data['pic']);
            $data['pic'] = str_replace('./', '/', $data['pic']);
            $result = M("news")->where("id = {$id}")->field('pic')->find();
            $file = $result['pic'];
            $file = '.' . $file;
            $res = M("news")->where("id = {$id}")->save($data);
            if ($res) {
                unlink($file);
                die("<script>alert('恭喜你！修改成功！');location='" . __MODULE__ . "/News/news';</script>");
            } else {
                die("<script>alert('修改失败！');window.history.go(-1);</script>");
            }
        } else {
            // 上传错误提示错误信息    
            $info = $upload->getError();
            die("<script>alert('{$info}');window.history.go(-1);</script>");
        }
    }

    public function change_news1() {
         $mode = M("news");
        $id = $_POST['id'];
        $data['title'] = $_POST['title'];
        $data['dis'] = $_POST['dis'];
        $data['author'] = $_POST['author'];
        $data['content'] = $_POST['content'];
        $data['cates'] = $_POST['cates'];

//            $data['title1'] = $_POST['title1'];
        $data['keywords'] = $_POST['keywords'];
//            $data['description'] = $_POST['description']
        $res = $mode->where("id ={$id}")->save($data);

        if ($res) {
           die("<script>alert('恭喜你！修改成功！');location='" . __MODULE__ . "/News/news';</script>");
        } else {
             die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }

    // 删除家长问答
    public function delete_news($id) {

        $res = M("news")->where("id = {$id}")->delete();
        if ($res) {
            die("<script>alert('恭喜你！删除成功！');location='" . __MODULE__ . "/News/news';</script>");
        } else {
            die("<script>alert('删除失败！');window.history.go(-1);</script>");
        }
    }

    // 添加新闻咨询
    public function add_news() {
        $this->cu();
        $title = "添加新闻咨询";
        session("title", $title);
        $this->display();
    }

//    // 执行添加
//    public function insert_news() {
//        $this->cu();
//        $mode = M("news");
//        $data['title'] = $_POST['title'];
//        $data['dis'] = $_POST['dis'];
//        $data['content'] = $_POST['content'];
//        $data['cates'] = $_POST['cates'];
//
//        $data['ctime'] = date("Y-m-d H:i:s");
//        $res = $mode->add($data);
//
//        if ($res) {
//            die("<script>alert('恭喜你！添加成功！');location='" . __MODULE__ . "/News/news';</script>");
//        } else {
//            die("<script>alert('添加失败！');window.history.back();</script>");
//        }
//    }

    public function insert_news() {
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
            $mode = M("news");
            $data['title'] = $_POST['title'];
            $data['dis'] = $_POST['dis'];
            $data['author'] = $_POST['author'];
            $data['content'] = $_POST['content'];
            $data['cates'] = $_POST['cates'];

//            $data['title1'] = $_POST['title1'];
            $data['keywords'] = $_POST['keywords'];
//            $data['description'] = $_POST['description'];

            $data['ctime'] = date("Y-m-d H:i:s");
            $data['pic'] = $upload->rootPath . $upload->savePath . $info['savename'];
            $data['pic'] = str_replace('./', '/', $data['pic']);
            $res = $mode->add($data);

            if ($res) {
                die("<script>alert('恭喜你！添加成功！');location='" . __MODULE__ . "/News/news';</script>");
            } else {
                die("<script>alert('添加失败！');window.history.back();</script>");
            }
        } else {
            // 上传错误提示错误信息    
            $info = $upload->getError();
            die("<script>alert('{$info}');window.history.back();</script>");
        }
    }

}
