<?php
class ArticleModel extends  Model{
    //根据点击量获取五篇文章数据
    public function getFiveArtsByHits(){
        $arr = array();
        //$sql = "select * from article order by hits desc limit 5";
        $sql = "select a.articleid,a.title,a.ptime,a.author,a.description,a.pic,a.hits,c.categoryid,c.name 
               from article a join category c 
               on a.cid = c.categoryid order by a.hits desc limit 5";
        $arr['data'] = $this->select($sql);

        return $arr;
    }

    //根据文章id获取文章详细信息
    public function getArtByArticleid($articleid)
    {
        //$sql = "Select * from article where articleid = $articleid";
        $sql = "select a.articleid,a.title,a.content,a.ptime,a.hits,c.categoryid,c.name 
               from article a join category c on a.cid = c.categoryid 
               where articleid = $articleid";
        return $this->find($sql);

    }

    //根据分类id
    public function getArtsByCategoryId($categoryid, $type = ''){
        $config = array(
            'first' => '<<',
            'prev' => '<',
            'next' => '>',
            'last' => '>>',
            'current_tag' => 'b',
            'theme' => array('first', 'prev', 'num', 'next', 'last'),
        );


        if($type == 'da'){
            $sql_count = "select count(*) from article where cid in(select categoryid from category where parent_id=$categoryid)";
            $count = $this->count($sql_count);
            $page = new Page($count, 10, $config);
            $sql = "select * from article a join category c on a.cid=c.categoryid 
where cid in(select categoryid from category 
where parent_id=$categoryid) limit $page->start,$page->length";

        }else{
            $sql_count = "select count(*) from article where cid=$categoryid";
            $count = $this->count($sql_count);
            $page = new Page($count, 10, $config);
            $sql = "select * from article a join category c on a.cid=c.categoryid
 where cid=$categoryid limit $page->start,$page->length";

        }
        $show = $page->show();
        $arr['data'] = $this->select($sql);
        $arr['show'] = $show;
        return $arr;
    }


        public function gettitle($categoryid=0){
            //列表页的当前位置
            $sql1 = "select categoryid,name from category where categoryid = $categoryid";
            $arr['classname'] = $this->find($sql1);

            //根据文章发布时间排序,首页的最新文章,侧边栏的栏目推荐
            $sql = "select cid,articleid,title from article order by ctime desc limit 8";
            $arr['new'] = $this->select($sql);
            //根据点击量排序,首页的推荐文章,侧边栏的点击排行
            $sql = "select cid,articleid,title from article order by hits desc limit 8";
            $arr['hits'] = $this->select($sql);

            if ($categoryid <4){
                //查询右侧边栏的小标题
                $sql = "select name from category where parent_id =$categoryid";
            }else{
                //查询右侧边栏的小标题
                $sql = "select name from category where parent_id 
          in (select parent_id from category where categoryid = $categoryid)";
            }
            //右侧边栏的小标题
            $arr['smalltitle'] = $this->select($sql);
            //echo '<pre>';
           // print_r($arr['smalltitle']);exit();
            return $arr;
        }

}
?>