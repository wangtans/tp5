<?php
namespace app\home\controller;
use think\Controller;
use think\Request;

class Index extends Controller{

    // 文件上传表单
    public function index(){
    return $this->fetch();
}

    // 文件上传提交
    public function upload(){
        // 获取表单上传文件
        $file = request()->file('files');

        if (empty($file)) {
            $this->error('请选择上传文件');
        }
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if ($info) {
            $this->success('文件上传成功');
            echo $info->getFilename();
        } else {
            // 上传失败获取错误信息
            $this->error($file->getError());
        }

    }

}