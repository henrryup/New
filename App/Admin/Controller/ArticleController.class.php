<?php
class ArticleController extends CommonController{
    //显示文章列表
    public function index(){
        //判断地址栏中是否有categoryid,如果有这个参数，就以这个参数为条件查询文章，如果没有这个参数就查询所有的文章
        if(isset($_GET['categoryid']) && $_GET['categoryid'] != 0){
            $where ="where cid=".$_GET['categoryid'];
        }else{
            $where ='';
        }
//        $sql = "Select * from article" . $where;
//        $sql = "select * from article where id = $categoryid";
//        $sql = "select * from article";
        $art = new ArticleModel();
        $arr = $art->getArticles($where);
        //使用smarty分配数据，显示模板即可
        $this->smarty->assign('data',$arr['data']);//分配数据
        $this->smarty->assign('show',$arr['show']);//分配页码
        $this->smarty->display('index.html');
    }

    //显示添加模板
    public function add(){
        //取出所有的分类

        $category = new CategoryModel();
        $cate = $category->getAllCates();//取出没有排序的分类
        $cate = $category->sortCate($cate);//将分类排序
        $this->smarty->assign('cate',$cate);//将排好序的分类分配到模板中
        $this->smarty->display('add.html');
    }

        //处理添加的方法
        public function addHandle(){
            //使用上传类实现上传
            $arr = $_POST;//先获取表单中的字段()
            $arr['ctime'] = time();
            //$arr['utime'] = 0;//如果数据库字段utime没有默认值0，手动添加
            $arr['pic'] = '';
            //判断是否有文件上传
            if ($_FILES['file']['name']){
                //一会儿使用上传类实现上传
                $upload =new Upload();//new一个Upload类，肯定会调用Upload类中的构造方法
                $file = $upload->up();
                $arr['pic'] = $file;
            }
            $art = new ArticleModel();
            $res=$art->insert($arr);
            if ($res){
                $this->jump('添加成功','?m=Admin&c=Article&a=index&categoryid=' . $_POST['cid']);
            }else{
                $this->jump('添加失败','?m=Admin&c=Article&a=add&categoryid=' . $_POST['cid']);
            }
        }


        public function del(){
            $articleid = $_GET['articleid'];
            $categoryid=$_GET['categoryid'];
            $art = new ArticleModel();
            $res=$art->delArt($articleid);
            if ($res){
                $this->jump('删除成功','?m=Admin&c=Article&a=index&categoryid='.$categoryid);
            }else{
                $this->jump('删除失败','?m=Admin&c=Article&a=index&categoryid='.$categoryid);
            }
        }

        //批量删除
        public function delAll(){
        $categoryid = $_POST['categoryid'];//获取隐藏域的内容，用于页面跳转

        $ids = $_POST['id'];//一维数组，array(),数组的单元就是要删除的id
        $art = new ArticleModel();
//        foreach($ids as $id) {
//            $art->delArt($id);
//        }
        $idstr = implode(',',$ids);//将数组中的id处理为字符串，并用','隔开
        $res = $art->delAll($idstr);
        if ($res){
            $this->jump('删除成功','?m=Admin&c=Article&a=index&categoryid='.$categoryid);
        }else{
            $this->jump('删除失败','?m=Admin&c=Article&a=index&categoryid='.$categoryid);
        }
        }

}
?>