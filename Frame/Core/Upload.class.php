<?php
class Upload{
    private $info = array();//用来存放上传文件的信息
    private $error = '';//用来记录错误
    public $size = 6;//允许上传的文件的大小，单位是M，写成public形式，意思是外部可以调用
    public $ext = array('jpg','gif','png');//允许上传的文件后缀
    public $rootPath = './Public/Uploads/';//默认的存放目录
    //上传之前，应该有分析中的各项判断
    //最后是上传，

    //先获取上传文件的信息，才能进行各项判断，才能上传
    //构造方法实现获取上传文件的信息
    public function __construct(){
        //echo '<pre>';
        //print_r($_FILES);
        foreach($_FILES as $value){
            $this->info = $value;
        }
    }

    //最终的上传方法
    public function up(){
        //先查看是否有错误
        if (!$this->error() || !$this->checkSize() || !$this->checkExt()){
            exit($this->error);
        }
        $this->setPath();
        //move_upload_file(临时文件路径文件名，要存放的位置文件名)
        $path = rtrim($this->rootPath,'/') . '/' . date("Y-m-d");
        $filename = $this->setName() . '.' . $this->getExt();
        if(move_uploaded_file($this->info['tmp_name'],$path . '/' . $filename)){
            return $path . '/' . $filename;// ./Public/Uploads/2017-02-26/...
        }else{
            exit('上传失败');
        }
    }

    //设置上传文件的目录
    public function setPath(){
        $subPath = date("Y-m-d"); //2017-02-26
        $path = rtrim($this->rootPath,'/') . '/' .$subPath;// ./Public/Uploads/
        if (!file_exists($path)){
            mkdir($path,0777,true);//第三个参数为true表示可以递归创建目录
        }
    }

    //设置新的文件名
    public function setName(){
        return time() . mt_rand(000,999);
    }



    //判断文件后缀
    public function checkExt(){
        $ext = $this->getExt();
        if (!in_array(strtolower($ext),$this->ext)){
            $this->error = '不允许的文件后缀';
            return false;
        }
        return true;
    }

    //获取文件的后缀
    public function getExt(){
        //找最后一个，以及后面的字符串
        return ltrim(strrchr($this->info['name'], '.'),'.');//返回文件后缀名 jpg/png
        //$this->info['name'];
    }

    //判断文件大小
    public function checkSize(){
        if ($this->info['size'] > $this->size *124 *1024){
            $this->error = '上传文件太大';
            return false;
        }
        return true;
    }

    //判断是否有系统错误
    public function error(){
        $err = array(
            1 =>'上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值',
            2 =>'上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值',
            3 =>'文件只有部分被上传',
            4 =>'没有文件被上传',
            6 =>'找不到临时文件夹',
            7 =>'文件写入失败'
        );
//        $re = $this->info['error'];
//        echo '<pre>';
//        print_r($re);exit;
        //如果 $this->info['error']是err数组的值，那么就记录它的值
        if (array_key_exists($this->info['error'],$err)){
            $this->error = $err[$this->info['error']];
            return false;
        }
        return true;
    }
}
?>