<?php

namespace Home\Controller;

use Think\Controller;

class AboutController extends CommonController {

    //武校简介
    public function about() {
        $this->assign('company', M('company')->find());
        $this->display();
    }


}
