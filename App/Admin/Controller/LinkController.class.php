<?php

namespace Admin\Controller;

use Think\Controller;

class LinkController extends Controller {

       // 访问控制
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }

   // 联系我们
	public function link()
	{
		$this -> cu();
		$title = "底部链接地址";
		session("title",$title);
		$this -> assign("link",M("link") -> find());
        $this -> display();
	}
	// 修改联系我们
	public function change()
	{
		$this -> cu();
		$title = "修改底部链接地址";
		session("title",$title);
		$this -> assign("link",M("link") -> find());
        $this -> display();
	}
	// 执行修改
	  public function update()
	     {
	           $mode = M("link");
	           $data['phone'] = $_POST['phone'];
	           $data['sms'] = $_POST['sms'];
	           $data['online'] = $_POST['online'];
	           $data['shool'] = $_POST['shool'];
	           $data['yuyue'] = $_POST['yuyue'];
                   $data['baoming'] = $_POST['baoming'];
	           $res = $mode->where("id = 1")->save($data);
	           if($res){
	            	die("<script>alert('恭喜您！修改成功！');location='".__MODULE__."/Link/link';</script>");
	            }else{
	           	 	die("<script>alert('修改失败！');window.history.go(-1);</script>");
	            }
	     }    


}
