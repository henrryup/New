<?php
//基础控制器类
class Controller{
    protected $smarty;
    //构造方法，作用是拿到smarty对象
    public function __construct(){
        if (method_exists($this,'yanzheng')){
            //如果验证的方法存在
            $this->yanzheng();
        }
        $view = new View();
        $this->smarty = $view->smarty;
    }

    protected function jump($msg, $url, $time=2){
        header('content-type:text/html;charset=utf-8');
        echo $msg;
        header("refresh:$time;url=$url");
        exit;
    }
}
?>