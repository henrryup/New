<?php
class IndexController extends CommonController {
    //显示后台首页
    public function index(){
        $this->yanzheng();
        //判断session是否有adminname，如果有表示已经登录，可以访问首页；如果没有则跳转到登录页面
//        if(!isset($_SESSION['adminname'])){
//            $this->jump('请先登录！', '?m=Admin&c=Login&a=login');
//        }
        //$this->smarty->assign('adminname', $_SESSION['adminname']);
        $this->smarty->display('index.html');
    }
}
?>