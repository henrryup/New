<?php
class CommonController extends Controller{
    //验证访问后台的人，是否登录
    public function yanzheng(){
        //判断session是否有adminname，如果有表示已经登录，可以访问首页；如果没有则跳转到登录页面
        if(!isset($_SESSION['adminname'])){
            $this->jump('请先登录！', '?m=Admin&c=Login&a=login');
        }
    }
}
?>