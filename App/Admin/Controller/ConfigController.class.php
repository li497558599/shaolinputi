<?php
namespace Admin\Controller;
use Think\Controller;
class ConfigController extends Controller {
	// 访问控制
	public function cu()
	{
	  if(!session('id'))
	  {
                     $this -> redirect('Admin/Login/login');
                     die();
	    }
	}
	// 网站配置
	public function config()
	{
		$this -> cu();
		$title = "网站配置";
		session("title",$title);
		$this -> assign("info",M("config") -> find());
	             $this -> display();
	}
	// 修改配置
	public function change()
	{
		$this -> cu();
		$title = "修改配置";
		session("title",$title);
		$this -> assign("info",M("config") -> find());
	             $this -> display();
	}
	// 上传logo
	public function upload()
	{
		$upload = new \Think\Upload();// 实例化上传类
	           $upload->maxSize   =     3145728 ;// 设置附件上传大小
	           $upload->exts          =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	           $upload->replace    = true;
	           $upload->autoSub   = false;
	           $upload->rootPath  =  './Public/Uploads/'; 
	           $upload->savePath  =      ''; // 设置附件上传目录
	          
	           // 上传文件 
	           $info   =  $upload->uploadOne($_FILES['pic']);
	           if($info){
           				$data['pic'] = $upload->rootPath.$upload->savePath.$info['savename'];
	      	           		$data['pic'] = str_replace('./','/',$data['pic']);
	      	           		$data['pic'] = str_replace('./','/',$data['pic']);
	      	           		$result = M("config") -> where("id = 1") -> field('pic') -> find();
			            $file = $result['pic'];
			            $file = '.'.$file;
		           		$res = M("config")->where("id = 1")->save($data);
		           		if($res){
		           			unlink($file);
			            	die("<script>alert('恭喜你！修改成功！');location='".__MODULE__."/Config/config';</script>");
			            }else{
			           	 	die("<script>alert('修改失败！');window.history.go(-1);</script>");
			            }
	      	            }else{
	                              	// 上传错误提示错误信息    
	          			$info = $upload->getError();
		          		die("<script>alert('{$info}');window.history.go(-1);</script>");
	           }
	}
	// 执行修改
	  public function update()
	     {
	           $mode = M("config");
	           $data['name'] = $_POST['name'];
	           $data['turn'] = $_POST['turn'];
	           $data['webAdre'] = $_POST['webAdre'];
	           $data['title'] = $_POST['title'];
	           $data['keywords'] = $_POST['keywords'];
	           $data['discription'] = $_POST['discription'];
	           $res = $mode->where("id = 1")->save($data);

	            if($res){
	            	die(json_encode(['status'=>1,'msg'=>'恭喜您！修改成功！','url'=>__MODULE__.'/Config/config']));
	            }else{
	           	 	die(json_encode(['status'=>0,'msg'=>'修改失败！']));
	            }
	     }    
}