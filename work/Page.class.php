<?php
class Page{
    public $nowPage = 1;
    public $start = 0;//用于查询的SQL语句，表示Limit开始的位置
    public $length = 5;//用于查询的SQL语句，表示limit的截取长度(每页的记录数)
    public $count;//表示总记录数
    //构造方法
    //作用是处理分页类中所需的变量
    public function __construct($count,$length = 5)
    {
        //当前的页码，当前为第几页
        $this->nowPage = isset($_GET['p']) ? $_GET['p'] : 1;

        $this->length =$length;//先获取length，然后再计算start

        $this->start = ($this->nowPage - 1) * $this->length;

        $this->count = $count;
    }

    //显示分页样式的方法
    public function show(){
        $str = '';//用来保存分页样式

        //获取地址栏已有参数，处理成一个字符串
        //判断p是否是$_GET的键值
        if (array_key_exists('p' , $_GET)){
            unset($_GET['p']);
        }

        $params = '';
        foreach($_GET as $k=>$v){
            $params .= "$k=$v&";
        }

        //上一页
        if ($this->nowPage >1) {
            $str .= "<a href='index.php?{$params}p=" . ($this->nowPage - 1) . "'>上一页</a>";
        }

        $maxPage = ceil($this->count / $this->length);
        //下一页
        if ($this->nowPage < $maxPage)
        $str .= "<a href=''index.php?{$params}p=".($this->nowPage+1)."'>下一页</a>";

        return $str;

    }
}
?>