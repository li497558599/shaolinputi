<?php


namespace Home\Controller;
use Think\Controller;

class GraduateController extends CommonController{
    
    public function graduate() {
        $this->assign('bydis',M('bydis')->find());
        
   
        $this->display();
    }
}
