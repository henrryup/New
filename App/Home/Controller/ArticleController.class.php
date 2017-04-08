<?php
//文章内容页面控制器
class ArticleController extends  Controller{
    //显示文章内容页
    public function index(){
        //获取地址栏的articleid，根据articleid，获取当前文章的详细内容
        $articleid = $_GET['articleid'];
        $categoryid = $_GET['categoryid'];
       // $type = isset($_GET['type']) ? $_GET['type'] : '';
        $type = $_GET['type'];
        //调用article模型中的方法
        $art = new ArticleModel();
        $row = $art->getArtByArticleid($articleid);

        $arr = $art->getFiveArtsByHits();
        $arr+= $art->getArtsByCategoryId($categoryid,$type);
        $arr += $art->getArtByArticleid($articleid);
       // echo '<pre>';
       // print_r($arr);die;
        $this->smarty->assign('name',$arr['classname']);
        $this->smarty->assign('new',$arr['new']);
        $this->smarty->assign('smalltitle',$arr['smalltitle']);
        $this->smarty->assign('hits',$arr['hits']);
        $this->smarty->assign('row',$row);


        //取出这篇文章的评论
        $model = new Model();
        $sql = "select c.content,c.ctime,u.face,u.username from comment c 
      left join user u on c.userid = u.id
      where articleid = $articleid";
        $pinglun = $model->select($sql);
        $this->smarty->assign('pinglun',$pinglun);

        $this->smarty->display('index.html');
    }



}
?>