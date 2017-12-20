<?php

namespace Home\Controller;

use Think\Controller;

class QuestionController extends CommonController {

    //家长问答
    public function question() {
        
        $this->assign('question11',M('question')->order('id desc')->limit(1)->find());
        
        $question = M('question');

        $count = $question->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->url = 'question/p=';
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
        $Page->url = 'question/p=';
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
        
         M("question")->where("id = {$id}")->setInc('visit', 1);
        
         $this->display();
    }


}
