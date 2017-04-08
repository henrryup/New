<?php
class CommentController extends CommonController {
    public function index(){
        $art = new CommentModel();
        $arr = $art->getContent();
        //使用smarty分配数据，显示模板即可
        $this->smarty->assign('data',$arr['data']);//分配数据
        $this->smarty->assign('show',$arr['show']);//分配页码
        $this->smarty->display('index.html');
    }

    public function del(){
        $id = $_GET['id'];
        $art = new CommentModel();
        $res = $art->dele($id);
        if ($res){
            $this->jump('删除成功','?m=Admin&c=Comment');
        }else{
            $this->jump('删除失败','?m=Admin&c=Comment');
        }
    }
}
?>