<?php
class Page{
    public $nowPage = 1;
    public $start = 0; //用于查询的SQL语句，表示limit开始的位置
    public $length = 5; //用于查询的SQL语句，表示limit的截取的长度
    public $count; //表示总记录数
    public $config = array(
        'first' => '首页',
        'prev' => '上一页',
        'next' => '下一页',
        'last' => '尾页',
        'current_tag' => 'a', //link页中当前页的标签。
        'theme' => array('first', 'prev', 'num', 'next', 'last', 'jump'),
    );
    //构造方法
    //作用是处理分页类中所需的变量
    public function __construct($count,$length = 5, $config = array())
    {
        //当前的页码，当前为第几页
        $this->nowPage = isset($_GET['p']) ? $_GET['p'] : 1;
        $this->length = $length; //先获取length，然后在计算start。
        $this->start = ($this->nowPage - 1) * $this->length;
        $this->count = $count;
        $this->config = array_merge($this->config, $config);
    }

    //显示分页样式的方法
    public function show(){
        $str = ''; //用来保存分页样式

        //获取地址栏已有参数，处理成一个字符串
        //判断p是否是$_GET的键值
        if(array_key_exists('p', $_GET)){
            unset($_GET['p']);
        }
        /*
         * Array
            (
                [m] => Admin
                [c] => Article
                [a] => index
                [categoryid] => 6
                [p] => 3
            )
         */
        $params = '';
        $formStr = '';
        foreach($_GET as $k=>$v){
            $params .= "$k=$v&";
            $formStr .= "<input type='hidden' name='$k' value='$v' />";
        }
        //$formStr;
        //echo $params;
        //"m=Admin&c=Ar";

        //首页 上一页
        if($this->nowPage>1){
            $first = "<a href='index.php?{$params}p=1'>{$this->config['first']}</a>";
            $prev = "<a href='index.php?{$params}p=".($this->nowPage-1)."'>{$this->config['prev']}</a>";
        }else{
            $first = '';
            $prev = '';
        }
        //$最大页 = ceil(总记录数 / 每页显示多少条);
        //$最大页 = ceil($this->count / $this->length);
        $maxPage = ceil($this->count / $this->length);


        //做1 2 3 4 5 页
        /*
         * 1  1 2 3 4 5
         * 2  1 2 3 4 5
         *
         *
         * 3  1 2 3 4 5
         * 4  2 3 4 5 6
         * 5  3 4 5 6 7
         * ...
         * 18  16 17 18 19 20
         *
         *
         * 19  16 17 18 19 20
         * 20  16 17 18 19 20
         */
        $link = $GLOBALS['conf']['PAGE_LINK'];

        $s = $this->nowPage - floor($link/2); //默认的循环起始
        if($this->nowPage <= ceil($link/2)){
            //判断如果页码过小
            $s = 1;
        }
        if($this->nowPage > ($maxPage-floor($link/2))){
            //如果页码过大
            $s = $maxPage - $link + 1;
        }

        if($maxPage < $link){
            //总页码没有$link多，只能强制让循环从1循环，循环最大页数次
            $s = 1;
            $link = $maxPage;
        }
        $num = '';
        for($i=$s; $i<$s+$link; $i++){
            if($i == $this->nowPage){
                $num .= "<{$this->config['current_tag']}>$i</{$this->config['current_tag']}>";
            }else{
                $num .= "<a href='index.php?{$params}p=$i'>$i</a>";
            }
        }
        //下一页
        if($this->nowPage < $maxPage){
            $next = "<a href='index.php?{$params}p=".($this->nowPage+1)."'>{$this->config['next']}</a>";
            $last = "<a href='index.php?{$params}p={$maxPage}'>{$this->config['last']}</a>";
        }else{
            $next = '';
            $last = '';
        }

        //跳转页
        $jump = <<<ads
<form>
    $formStr
    <input type='text' name='p' size=3 />
    <input type='submit' value='GO' />
</form>";
ads;
        foreach($this->config['theme'] as $val){
            //$val = "first";
            //$$val= $first;
            $str .= $$val;  // $val=first  $$val = $first
            //15 = 15
        }
//        if(in_array('first', $this->config['theme'])){
//            $str .= $first;
//        }
        return $str;
    }
}
?>