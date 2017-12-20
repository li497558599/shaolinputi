<?php
namespace Admin\Controller;
use Think\Controller;
class LbpicsController extends Controller {
	// 访问控制
	public function cu()
	{
	  if(!session('id'))
	  {
                     $this -> redirect('Admin/Login/login');
                     die();
	    }
	}
	// 首页轮播图
	public function sy_list()
	{
	         $this -> cu();
	        $title = "首页轮播图";
	        session("title",$title);
	        $this -> assign("data",M("lbpics") -> select());
                    $this -> display();
	}
	// 添加首页轮播图
	public function sy_add()
	{
	         $this -> cu();
	        $title = "添加首页轮播图";
	        session("title",$title);
                    $this -> display();
	}
	// 执行添加首页轮播图
	public function sy_insert()
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
                                  //实例化
		           $mode = M("lbpics");
		           $data['dis'] = $_POST['dis'];
		           $data['ctime'] = date("Y-m-d H时 A");
		           $data['pic'] = $upload->rootPath.$upload->savePath.$info['savename'];
	      	           $data['pic'] = str_replace('./','/',$data['pic']);
		           $res = $mode -> add($data);

		            if($res){
		     	 	die("<script>alert('恭喜你！添加成功！');location='".__MODULE__."/Lbpics/sy_list';</script>");
		            }else{
		     	 	die("<script>alert('添加失败！');window.history.back();</script>");
		            }
	           }else{
                                  // 上传错误提示错误信息    
		          $info = $upload->getError();
		          die("<script>alert('{$info}');window.history.back();</script>");
	           }
	}
	// 首页轮播图修改
	public function sy_change($id)
	{
		$this -> cu();
		$title = "首页轮播图修改";
		session("title",$title);
		$this -> assign("info",M("lbpics") -> where("id = {$id}") -> find());
		$this -> display();
	}
	// 执行首页轮播图修改
	public function sy_update()
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
                                  //实例化
		           $mode = M("lbpics");
		           $data['dis'] = $_POST['dis'];
		           $data['pic'] = $upload->rootPath.$upload->savePath.$info['savename'];
	      	           $data['pic'] = str_replace('./','/',$data['pic']);
	      	           $id = $_POST['id'];
	      	           $result = $mode -> where("id = {$id}") -> field('pic') -> find();
		            $file = $result['pic'];
		            $file = '.'.$file;
		           $res = $mode->where("id = {$id}")->save($data);

		            if($res){
			            unlink($file);
		     	 	die("<script>alert('恭喜你！修改成功！');location='".__MODULE__."/Lbpics/sy_list';</script>");
		            }else{
		     	 	die("<script>alert('修改失败！');window.history.back();</script>");
		            }
	           }else{
                                  // 上传错误提示错误信息    
		          $info = $upload->getError();
		          die("<script>alert('{$info}');window.history.back();</script>");
	           }
	}
	     // 删除图片
	     public function sy_delete($id)
	     {
	                   $mode = M('lbpics');
	                    $result = $mode -> where("id = {$id}") -> field('pic') -> find();
	                   $file = $result['pic'];
	                   $file = '.'.$file;
	                   $res = $mode -> delete($id);
	                   if($res){
	                   	unlink($file);
	                   	$info = '恭喜你！删除成功！';
	                   	session('info',$info);
	                   	$this -> redirect('Admin/Lbpics/sy_list');
	                   }else{
	                   	 $info = '删除失败！';
	                   	session('info',$info);
	                   	$this -> redirect('Admin/Lbpics/sy_list');
	                   }
	     }
}