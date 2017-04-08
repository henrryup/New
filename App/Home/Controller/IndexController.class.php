<?php
class IndexController extends Controller{
    public function index(){
        $art = new ArticleModel();
        $arr = $art->getFiveArtsByHits();
        $res = $art->gettitle();
        //echo '<pre>';
        //print_r($arr);die;
        $this->smarty->assign('data',$arr['data']);
        $this->smarty->assign('new',$res['new']);
        $this->smarty->assign('hits',$res['hits']);
        $this->smarty->display('index.html');
    }

}
?>