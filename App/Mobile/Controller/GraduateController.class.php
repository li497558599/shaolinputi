<?php

namespace Mobile\Controller;

use Think\Controller;

class GraduateController extends CommonController {

    public function graduate() {
        $this->assign('bydis', M('bydis')->find());

        $this->assign('pics', M('pics')->order('id desc')->select());

        $this->display();
    }

}
