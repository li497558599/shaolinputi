<?php

namespace Mobile\Controller;

use Think\Controller;

class NewsController extends CommonController {

    //新闻资讯
    public function news() {


        $news = M('news');
        $count = $news->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $show = $Page->show(); // 分页显示输出
        $data = $news->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();

        $this->assign('question', $data);
        $this->assign('page', $show);
        $this->assign('count', $count);

        if ($_GET['cates']) {
            $string = $_GET['cates'];
      
            $news = M('news');
            $count = $news->count(); // 查询满足要求的总记录数
            $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $show = $Page->show(); // 分页显示输出
            $data = $news->order('id desc')->where("cates='{$string}'")->limit($Page->firstRow . ',' . $Page->listRows)->select();

            $this->assign('cates1', $data);
            $this->assign('page', $show);
            $this->assign('count', $count);
            $this->assign("ac", $string);
           
        } else {
            $news = M('news');
            $count = $news->count(); // 查询满足要求的总记录数
            $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $show = $Page->show(); // 分页显示输出
            $data = $news->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();

            $this->assign('cates1', $data);
            $this->assign('page', $show);
            $this->assign('count', $count);
        }


        $this->display();
    }
    //新闻资讯详情

     public function news_in($id) {
        $this->assign("news1", M("news")->where("id = {$id}")->find());
   M("news")->where("id = {$id}")->setInc('visit', 1);
        $preid = $id - 1;
        $nextid = $id + 1;
        $maxid = M("news")->field('id,max(id)')->find()['max(id)'];
        if ($nextid <= $maxid) {
            $new1 = $this->check($nextid, $maxid);
        }
        if ($preid > 0) {
            $new2 = $this->check2($preid);
        }
        $nextshow = M('news')->where('id=' . $new1)->find();
        $this->assign('nextshow', $nextshow);
        $preshow = M('news')->where('id=' . $new2)->find();
        $this->assign('preshow', $preshow);

        $this->display();
    }
     public function check($id, $maxid) {
        $arr = M("news")->field('id')->select();
        foreach ($arr as $key => $value) {
            $newarr[] = $value['id'];
        }
        if (in_array($id, $newarr)) {
            return $id;
        } else {
            $id = $id + 1;
            if ($id == $maxid) {
                return false;
            } else {
                return $this->check($id);
            }
        }
    }

    public function check2($id) {
        $arr = M("news")->field('id')->select();
        foreach ($arr as $key => $value) {
            $newarr[] = $value['id'];
        }
        if (in_array($id, $newarr)) {
            return $id;
        } else {
            $id = $id - 1;
            if ($id == 0) {
                return false;
            } else {
                return $this->check2($id);
            }
        }
    }

}
