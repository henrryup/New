<?php
class AboutController extends Controller{
    public function index(){
        $categoryid = $_GET['categoryid'];
        $art = new ArticleModel();
        $arr = $art->gettitle($categoryid);
       // echo '<pre>';
       // print_r($arr);die;
        $this->smarty->assign('name',$arr['classname']);
        $this->smarty->display('index.html');
    }
}
?>