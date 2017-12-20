<?php

namespace Home\Controller;
use Think\Controller;

class CourseController extends CommonController{
    //课程安排
    public function course() {
        $this->assign('clasdis',M('clasdis')->find());
        $this->assign('clas',M('clas')->select());
        $this->display();
    }
}
