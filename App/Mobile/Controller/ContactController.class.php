<?php

namespace Mobile\Controller;

use Think\Controller;

class ContactController extends CommonController {

    public function contact() {
        $this->assign('contact', M('contact')->find());
        $this->display();
    }

}
