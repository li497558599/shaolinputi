<?php


namespace Admin\Controller;
use Think\Controller;

class ContactController extends Controller{
       // 访问控制
    public function cu() {
        if (!session('id')) {
            $this->redirect('Admin/Login/login');
            die();
        }
    }
    // 联系我们
    public function Contact() {
        $this->cu();
        $title = "联系我们";
        session("title", $title);
        $mode = M("contact");
        $this->assign("info", $mode->where("id=1")->find());
        $this->display();
    }

    // 执行修改联系我们
    public function update_contact() {
        $data['content'] = $_POST['content'];
        $data['name'] = $_POST['name'];
        $data['keywords'] = $_POST['keywords'];
        $data['description1'] = $_POST['description1'];
        $res = M("contact")->where("id = 1")->save($data);

        if ($res) {
            die("<script>alert('恭喜您！修改成功！');location='" . __MODULE__ . "/Contact/contact';</script>");
        } else {
            die("<script>alert('修改失败！');window.history.go(-1);</script>");
        }
    }
}
