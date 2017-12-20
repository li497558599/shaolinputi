<?php

namespace Admin\Controller;

use Think\Controller;

class ProductsController extends Controller {

    // 访问控制
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }
    //教学体系
      public function pro_cates() {
        $this->cu();
        $keywords = $_GET['keywords'];
        if (empty($keywords)) {
            $title = "教学体系";
            session("title", $title);

            $mode = M('cates');
            $count = $mode->count(); // 查询满足要求的总记录数
            $Page = new \Think\Page($count, 10);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
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
            $title = "教学体系";
            session("title", $title);

            $mode = M('cates');
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

    // 添加体系
    public function add_cates() {
        $this->cu();
        $title = "添加体系";
        session("title", $title);
        $this->display();
    }

    // 执行添加体系
    public function insert_cates() {
//        dump($_POST);
//        die();
        $mode = M("cates");
        $data['cates'] = $_POST['cates'];
        $data['dis'] = $_POST['dis'];
//        $data['fenlei'] = $_POST['fenlei'];
        $data['ctime'] = date("Y-m-d H时 A");
        $res = $mode->add($data);

        if ($res) {
            die(json_encode(["status" => 1, "msg" => "恭喜你！添加成功！", "url" => __MODULE__ . "/Products/pro_cates"]));
        } else {
            die(json_encode(["status" => 0, "msg" => "添加失败！"]));
        }
    }

    // 体系修改
    public function change_cates($id) {
        $this->cu();
        $title = "体系修改";
        session("title", $title);
        $this->assign("info", M("cates")->where("id = {$id}")->find());
        $this->display();
    }

    // 执行类别修改
    public function update_cates() {
        //实例化
        $mode = M("cates");
        $data['cates'] = $_POST['cates'];
        $data['dis'] = $_POST['dis'];
        $id = $_POST['id'];
        $res = $mode->where("id = {$id}")->save($data);

        if ($res) {
            die(json_encode(["status" => 1, "msg" => "恭喜你！修改成功！", "url" => __MODULE__ . "/Products/pro_cates"]));
        } else {
            die(json_encode(["status" => 0, "msg" => "修改失败！"]));
        }
    }

    // 删除体系
    public function delete_cates($id) {
        $res = M("products")->where("c_id = {$id}")->select();
        if ($res) {
            die("<script>alert('删除失败！该体系下有数据，请删除数据后再执行该操作！');window.history.back();</script>");
        } else {
            $mode = M('cates');
            $res = $mode->where("id = {$id}")->delete();
            if ($res) {
                die("<script>alert('恭喜你！删除成功！');location='" . __MODULE__ . "/Products/pro_cates';</script>");
            } else {
                die("<script>alert('删除失败！');window.history.back();</script>");
            }
        }
    }

    // 查看信息
    public function pro_list($id) {
        $this->cu();
        $keywords = $_GET['keywords'];
        $title = "查看信息";
        session('title', $title);
        $mode = M('products');
        if (empty($keywords)) {
            $count = $mode->where("c_id = {$id}")->count(); // 查询满足要求的总记录数
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $where['c_id'] = $id;
            $data = $mode->where($where)->order('ctime')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        } else {
            $where['c_id'] = $id;
            $count = $mode->where($where)->where("name like'%{$keywords}%'")->count(); // 查询满足要求的总记录数
            $data = $mode->where($where)->where("name like'%{$keywords}%'")->order('ctime')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        }
        $Page = new \Think\Page($count, 8);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $show = $Page->show(); // 分页显示输出
        $this->assign('data', $data);  // 赋值数据集
        $this->assign('page', $show);  // 赋值分页输出
        $this->assign('num', $count);
        $this->assign('id', $id);
        $this->display();
    }

    // 添加产品
    public function add_pro($id) {
        $this->cu();
        $title = "添加产品";
        session("title", $title);
        $this->assign("cates", M("cates")->field("cates")->select());
        $this->assign("id", $id);
        $this->display();
    }

    // 执行添加产品
    public function insert_pro() {
        $id = $_POST['c_id'];
        $datas = M("cates")->where("id = {$id}")->field("cates")->find();
        $cates = $datas['cates'];
        $mode = M("products");
        $data['name'] = $_POST['name'];
        $data['content'] = $_POST['content'];
        $data['c_id'] = $id;
        $data['cates'] = $cates;
        $data['ctime'] = date("Y-m-d H时 A");
        $res = $mode->add($data);

        if ($res) {
            die("<script>alert('恭喜你！添加成功！');location='" . __MODULE__ . "/Products/pro_list/id/{$id}';</script>");
        } else {
            die("<script>alert('添加失败！');window.history.back();</script>");
        }
    }

    // 修改产品
    public function change_pro($id) {
        $this->cu();
        $title = "修改产品";
        session("title", $title);
        $this->assign("info", M('products')->where("id = {$id}")->find());
        $this->assign("cates", M("cates")->field("cates")->select());
        $this->assign("id", $id);
        $this->display();
    }

    public function upload() {
        $id = $_POST['id'];
        $mode = M("products");
        $dataPic = $mode->where("id = {$id}")->field("c_id")->find();
        $c_id = $dataPic['c_id'];
        $res = $mode->where("id = {$id}")->save($data);

        if ($res) {
            die("<script>alert('恭喜你！修改成功！');location='" . __MODULE__ . "/Products/pro_list/id/{$c_id}';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.back();</script>");
        }
    }

    // 执行 修改产品
    public function update_pro() {
        $id = $_POST['id'];
        $cates = $_POST['cates'];
        $datas = M('cates')->where("cates = '{$cates}'")->field("id")->find();
        $c_id = $datas['id'];
        //实例化
        $mode = M("products");
        $data['name'] = $_POST['name'];
        $data['cates'] = $cates;
        $data['c_id'] = $c_id;
        $data['content'] = $_POST['content'];
        $res = $mode->where("id = {$id}")->save($data);

        if ($res) {
            die(json_encode(["status" => 1, "msg" => "恭喜你！修改成功！", "url" => __MODULE__ . "/Products/pro_list/id/{$c_id}"]));
        } else {
            die(json_encode(["status" => 0, "msg" => "修改失败！"]));
        }
    }

    // 删除产品
    public function delete_pro($id) {
        $mode = M('products');
        $result = $mode->where("id = {$id}")->field('c_id')->find();
        $c_id = $result['c_id'];
        $res = $mode->where("id = {$id}")->delete();
        if ($res) {
            die("<script>alert('恭喜你！删除成功！');location='" . __MODULE__ . "/Products/pro_list/id/{$c_id}';</script>");
        } else {
            die("<script>alert('删除失败！');window.history.back();</script>");
        }
    }
    
    

    // 查看详情
    public function pro_info($id) {
        $this->cu();
        $title = "查看详情";
        session("title", $title);
        $this->assign("info", M("products")->where("id = {$id}")->find());
        $this->display();
    }

}
