<?php

namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
          // 生成验证码
          public function verify()
          {
                 $config =    array(
                        'fontSize'    =>  30,    
                        'length'      =>   4,    
                        'useNoise'  =>   false,
                        'useCurve'  =>   false,
                        'imageW'   =>    0, 
                        'imageH'    =>    0,
                        'fontttf'      =>     '4.ttf',
                      );
                  ob_clean();
                 $verify = new \Think\Verify( $config );
                 $verify->entry( 1 );
          }
          // 检测输入的验证码是否正确，$code为用户输入的验证码字符串,$id是验证码的编号
          function check_verify($code, $id = '')
          {    
                  $verify = new \Think\Verify();   
                  return $verify->check($code, $id);
          }
                        
          // 后台登录页面
          public function login()
          { 
                    $info = M("config") ->field("pic")-> find();
                    session("logo",$info['pic']);
                   $this -> display();
          }

          // 处理登录操作
           public function dologin()
            {
                  S('username',$_POST['username'],120);
                  S('code',$_POST['code'],120);
                  $mode = M('adminuser');
                  //调用方法
                  $user = $mode ->where("id = 1") -> find();
                  $id = $user['id'];
                  $username = $user['username'];
                   $password = $user['password'];
                 // 判断用户名
                 if( $_POST['username'] != $username )
                 {
                  die(json_encode(['status'=>0,'msg'=>"用户名或密码错误"]));
                 }
                  // 判断密码
                  if( $_POST['password'] != $password )
                 {
                  die(json_encode(['status'=>0,'msg'=>"用户名或密码错误"]));
                 }
                 // 判断验证码
                 $res = $this -> check_verify( $_POST['code'] , 1 );
                 if( !$res ){
                  die(json_encode(['status'=>0,'msg'=>"验证码错误"]));
                 }else{
                  session('id',$id);
                  die(json_encode(['status'=>1,'url'=>__MODULE__."/Index/index"]));
                 }
             }
             
               // 退出
               public function out()
               {
                  session(null);
                  $this -> redirect( 'Admin/Login/login' );
               }
               // // 找回密码
               // public function lookforpass()
               // {
               //       $this -> display();
               // }
               // // 获取验证码方法
               //   public function yzm($phone)
               //  {
               //              S('phone',$phone,120);
               //              $res = M("adminuser") -> where("phone = {$phone}") -> find();
               //              if(!$res){
               //                $info = '您输入的手机号码错误！';
               //                session("info",$info);
               //                $this -> redirect("Admin/Login/lookforpass");
               //              }
               //              date_default_timezone_set('PRC'); //设置默认时区为北京时间
               //              //短信接口用户名 $uid
               //              $uid = 'ZZJS000974';
               //              //短信接口密码 $passwd
               //              $passwd = '123456@';
               //                          $code = $this -> randStr();
               //                         $num =$phone;
               //                         $message = "你好！".$num."，您的验证码是：".$code."。如非本人操作，可不用理会！【俊熙家】";
               //              $msg = rawurlencode(mb_convert_encoding($message, "gb2312", "utf-8"));
                            
               //              $gateway = "https://sdk2.028lk.com/sdk2/BatchSend2.aspx?CorpID={$uid}&Pwd={$passwd}&Mobile={$num}&Content={$msg}&Cell=&SendTime=";

               //              $result = file_get_contents($gateway);
                           
               //              if(  $result > 0 )
               //              {
               //                              $info = '发送成功!请注意查收信息！';
               //                              session('info',$info);
               //                              session('yzm3',$code);
               //                   $this -> redirect("Admin/Login/lookforpass");
               //              }else{
               //                $info = '发送失败！系统错误！';
               //                session("info",$info);
               //                $this -> redirect("Admin/Login/lookforpass");
               //              }
               //   }
               //    // 随机六位数字
               //     function randStr($len=6,$format='ALL') 
               //    { 
               //               switch($format) { 
               //               case 'ALL':
               //               $chars='1234567890'; break;
               //               case 'CHAR':
               //               $chars='1234567890'; break;
               //               case 'NUMBER':
               //               $chars='1234567890'; break;
               //               default :
               //               $chars='1234567890'; 
               //               break;
               //               }
               //               mt_srand((double)microtime()*1000000*getmypid()); 
               //               $password="";
               //               while(strlen($password)<$len)
               //                  $password.=substr($chars,(mt_rand()%strlen($chars)),1);
               //               return $password;
               //   } 
               //   // 立即找回
               //   public function forget()
               //   {
               //          S("phone",$_POST['phone'],120);
               //          S("yzm2",$_POST['yzm2'],120);
               //          if(empty($_POST['phone'])){
               //                 $info = "手机号码不能为空！";
               //                 session("info",$info);
               //                 $this -> redirect("Admin/Login/lookforpass");
               //          }
               //          if(empty($_POST['yzm2'])){
               //                 $info = "验证码不能为空！";
               //                 session("info",$info);
               //                 $this -> redirect("Admin/Login/lookforpass");
               //          }
               //          $yzm3 = session('yzm3');
               //          if($_POST['yzm2'] != $yzm3){
               //                 $info = "验证码错误！";
               //                 session("info",$info);
               //                 $this -> redirect("Admin/Login/lookforpass");
               //          }
               //        // 发送验证码并将密码改为验证码
               //         date_default_timezone_set('PRC'); //设置默认时区为北京时间
               //              //短信接口用户名 $uid
               //              $uid = 'ZZJS000974';
               //              //短信接口密码 $passwd
               //              $passwd = '123456@';
               //                          $code = $this -> randStr();
               //                         $num =$phone;
               //                         $message = "你好！".$num."，您的密码已经被重置为：".$code."。建议您登陆成功后及时修改密码。如非本人操作，可不用理会！【俊熙家】";
               //              $msg = rawurlencode(mb_convert_encoding($message, "gb2312", "utf-8"));
                            
               //              $gateway = "https://sdk2.028lk.com/sdk2/BatchSend2.aspx?CorpID={$uid}&Pwd={$passwd}&Mobile={$num}&Content={$msg}&Cell=&SendTime=";
               //              $result = file_get_contents($gateway);
               //              if(  $result > 0 )
               //              {
               //                  $info = '发送成功!请注意查收信息！';
               //                  session('info',$info);
               //                  $phone = $_POST['phone'];
               //                  $info = M("adminuser") -> where("phone = '{$phone}'") -> field("id") -> find();
               //                  $id = $info['id'];
               //                  $data['password'] = $code;
               //                  M("adminuser") -> where("id = {$id}") ->save($data);
               //                  $this -> redirect("Admin/Login/lookforpass");
               //              }else{
               //                    $info = '发送失败！系统错误！';
               //                    session("info",$info);
               //                    $this -> redirect("Admin/Login/lookforpass");
               //              }
               //   }


}

