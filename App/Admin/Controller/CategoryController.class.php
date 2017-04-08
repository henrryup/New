<?php
    class CategoryController extends CommonController{
        //显示所有分类
        public function index(){
            //取出所有的分类，分配到模板
            $category = new CategoryModel();
            $data=$category->getAllCates();
            $data = $category->sortCate($data);//将没有排序的数据传递给setCate方法，返回排好序的数据
            $this->smarty->assign('data',$data);
            $this->smarty->display('index.html');
        }

        //显示添加分类的模板
        public function add(){
            //取出所有分类，并分配到模板中，在模板的select框中循环option
            $category = new CategoryModel();
            $data =$category->getAllCates();
            $data = $category->sortCate($data);
            $this->smarty->assign('data',$data);
            $this->smarty->display('add.html');
        }

        public function addHandle(){
            $category= new CategoryModel();
            $res=$category->insert();//成功返回最新添加的id，失败返回false
            if ($res){
                $this->jump('成功添加','?m=Admin&c=Category&a=index');
            }else{
                $this->jump('添加失败','?m=Admin&c=Category&a=add');
            }
        }
        //删除
        public function del(){
            $id=$_GET['id'];
            $category= new CategoryModel();
            $res=$category->delet($id);
            if ($res){
                $this->jump('删除成功','?m=Admin&c=Category&a=index');
            }else{
                $this->jump('删除失败','?m=Admin&c=Category&a=index');
            }
        }

        //修改分类管理的标题
    public function up(){
        $categoryid = $_GET['id'];
        $art = new CategoryModel();
        $arr = $art->update($categoryid);
        //取出所有分类，并分配到模板中，在模板的select框中循环option
        $category = new CategoryModel();
        $data =$category->getAllCates();
        $data = $category->sortCate($data);
        //echo '<pre>';
        //print_r($arr);exit;
        $this->smarty->assign('data',$data);
        $this->smarty->assign('parent',$arr['categoryid']);
        $this->smarty->assign('name',$arr['name']['name']);
        $this->smarty->display('up.html');
    }

        public function upHandle(){
            $id=$_POST['id'];
            $name=$_POST['category_name'];
            //$arr = $_POST;
            //echo '<pre>';
            //print_r($arr);exit;
            $category = new CategoryModel();
            $res = $category->modify($name,$id);
            if ($res){
                $this->jump('修改成功','?m=Admin&c=Category&a=index&categoryid=0');
            }else{
                $this->jump('修改失败','http://www.blog.com/?m=Admin&c=Category&a=up&id='.$id);
            }
        }

     }
?>