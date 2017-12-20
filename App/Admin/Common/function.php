<?php

//    上传图片
function upload($file) {
    $upload = new \Think\Upload(); // 实例化上传类
    $upload->maxSize = 3145728; // 设置附件上传大小
    $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
    $upload->replace = true;
    $upload->autoSub = false;
    $upload->rootPath = './Public/Uploads/';
    $upload->savePath = ''; // 设置附件上传目录
    // 上传文件
    $info = $upload->uploadOne($file['pic1']);
    if ($info) {
        $pic = $upload->rootPath . $upload->savePath . $info['savename'];
        $pic = str_replace('./', '/', $pic);

        return $pic;
    } else {
        // 上传错误提示错误信息
        $info = $upload->getError();
        die("<script>alert('{$info}');window.history.go(-1);</script>");
    }
}
//    上传图片
function upload2($file) {
    $upload = new \Think\Upload(); // 实例化上传类
    $upload->maxSize = 3145728; // 设置附件上传大小
    $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
    $upload->replace = true;
    $upload->autoSub = false;
    $upload->rootPath = './Public/Uploads/';
    $upload->savePath = ''; // 设置附件上传目录
    // 上传文件
    $info = $upload->uploadOne($file['pic2']);
    if ($info) {
        $pic = $upload->rootPath . $upload->savePath . $info['savename'];
        $pic = str_replace('./', '/', $pic);

        return $pic;
    } else {
        // 上传错误提示错误信息
        $info = $upload->getError();
        die("<script>alert('{$info}');window.history.go(-1);</script>");
    }
}
?>

