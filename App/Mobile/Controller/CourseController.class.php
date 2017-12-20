<?php

namespace Mobile\Controller;
use Think\Controller;

class CourseController extends CommonController{
    //课程安排
    public function course() {
        $this->assign('clasdis',M('clasdis')->find());
        $this->assign('clas',M('clas')->select());
        $this->assign('kcpics',M('kcpics')->order('id desc')->select());
        $this->display();
    }
}
