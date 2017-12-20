<?php

namespace Home\Controller;
use Think\Controller;

class EnvironmentController extends CommonController{ 
    //教学环境
    public function environment() {
     
  
        $this->assign('environment',M('environment')->find());
        $this->display();
    }
}
