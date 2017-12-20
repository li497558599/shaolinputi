<?php

namespace Mobile\Controller;

use Think\Controller;

class QuestionController extends CommonController {

    //家长问答
    public function question() {
        $question = M('question');

        $count = $question->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $show = $Page->show(); // 分页显示输出
        $data = $question->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();

        $this->assign('question', $data);
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->display();
    }
    
      public function question_route() {
        $questions = M('question');
        $count = $questions->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $show = $Page->show(); // 分页显示输出

        $question = $questions->query("select * from question where title like '%车%' or dis like '%车%' order by id desc limit $Page->firstRow,$Page->listRows");
        $this->assign('question', $question);
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->display();
    }

    //家长问答详情页
    public function question_in($id) {
        $this->assign("question1", M("question")->where("id = {$id}")->find());

        $preid = $id - 1;
        $nextid = $id + 1;
        $maxid = M("question")->field('id,max(id)')->find()['max(id)'];
        if ($nextid <= $maxid) {
            $new1 = $this->check($nextid, $maxid);
        }
        if ($preid > 0) {
            $new2 = $this->check2($preid);
        }
        $nextshow = M('question')->where('id=' . $new1)->find();
        $this->assign('nextshow', $nextshow);
        $preshow = M('question')->where('id=' . $new2)->find();
        $this->assign('preshow', $preshow);

        $this->display();
    }

    public function check($id, $maxid) {
        $arr = M("question")->field('id')->select();
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
        $arr = M("question")->field('id')->select();
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
