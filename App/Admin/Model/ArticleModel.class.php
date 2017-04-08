<?php
    class ArticleModel extends Model{
        //查询文章
        public function getArticles($where){
            $sql_count = "select count(*) from article $where";
            $count = $this->count($sql_count);
            $config = array(
                'theme' => array('prev', 'num', 'next'),
            );

            $page = new Page($count, 5, $config);

            $show = $page->show(); //通过分页类获取的分页样式
            $sql = "select a.articleid,a.title,c.name,a.author,a.ptime,a.hits,a.cid from article a 
join category c on a.cid=c.categoryid " . $where . " order by articleid desc limit $page->start,$page->length";
            $data = $this->select($sql); //页面需要的数据
            $arr['show'] = $show;
            $arr['data'] = $data;
            return $arr;
        }

        public function insert($arr){
            $sql ="insert into article (title,content,ptime,ctime,author,keywords,hits,description,alias,cid,pic)
            values
            (:title,:content,:ptime,:ctime,:author,:keywords,:hits,:description,:alias,:cid,:pic)";
            $params = array();
            foreach ($arr as $key=>$val){
                $params[':'.$key] = $val;
            }
            return $this->add($sql,$params);
        }

        public function delArt($articleid){
            $sql = "delete from article where articleid = $articleid";
            return $this->delete($sql);
        }

        public function delAll($idstr)
        {
            $sql ="delete from article where articleid in($idstr)";
            return $this->delete($sql);
        }
}
?>