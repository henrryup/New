<?php
class CommentModel extends Model {
    public function getContent(){

        $sql_count = "select count(*) from comment";
        $count = $this->count($sql_count);
        $config = array(
            'theme' => array('first','prev', 'num', 'next','last'),
        );

        $page = new Page($count, 5, $config);

        $show = $page->show(); //通过分页类获取的分页样式
        $sql = "select id,content,articleid,ctime from comment order by ctime desc limit $page->start,$page->length";
        $data = $this->select($sql); //页面需要的数据
        $arr['show'] = $show;
        $arr['data'] = $data;
        return $arr;

    }

    public function dele($id){
    $sql = "delete from comment where id =$id ";
        return $this->delete($sql);
}
}
?>