<?php

namespace Mobile\Controller;

use Think\Controller;

class StudentController extends CommonController {

    //招生简章
    public function student() {
        $this->assign('zhaosheng', M('zhaosheng')->find());
        $this->display();
    }

}
