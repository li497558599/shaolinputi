<?php

namespace Home\Controller;
use Think\Controller;

class ChargeController extends CommonController{
    //收费标准
    public function charge() {
        $this->assign('shoufei',M('shoufei')->find());
    
        $this->display();
    }
}
