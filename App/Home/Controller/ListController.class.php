<?php
class ListController extends Controller{
    //列表页方法
    public function index(){
        //获取地址栏的categoryid
        $categoryid = $_GET['categoryid'];//可能是小类id或大类id

        //获取地址栏的type参数，用来判断传递过来的categoryid是大类还是小类
        $type = $_GET['type'];

        $art = new ArticleModel();
        $arr = $art->getArtsByCategoryId($categoryid,$type);
        $this->right();
      // echo '<pre>';
      // print_r($arr['smalltitle']);exit;
        $this->smarty->assign('data',$arr['data']);
        $this->smarty->assign('show',$arr['show']);
        $this->smarty->display('index.html');
    }

    public function right(){
        //获取地址栏的categoryid
        $categoryid = $_GET['categoryid'];//可能是小类id或大类id
        $art = new ArticleModel();
        $arr = $art->gettitle($categoryid);

        //echo '<pre>';
        //print_r($arr);exit;
        //点击排行、栏目推荐
        $arr['list'] = $art->gettitle();
        //右测边栏标题
        $this->smarty->assign('smalltitle',$arr['smalltitle']);
        //网页当前位置
        $this->smarty->assign('name',$arr['classname']);
         //右侧边栏推荐，点击排行
        $this->smarty->assign('new',$arr['list']['new']);
        $this->smarty->assign('hits',$arr['list']['hits']);
    }
}
?>