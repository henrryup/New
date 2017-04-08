<?php
class CommentController extends Controller{
    //添加评论
    public function addComment(){
        $comment = new Model();
        $sql = "insert into comment(content,articleid,userid,ctime)
    VALUES 
    (:content,:articleid,:userid,:ctime)";

        $res = $comment->add($sql,array(
            ':content' => $_POST['content'],
            ':articleid' => $_POST['articleid'],
            ':userid' => $_SESSION['userid'],
            ':ctime' => time()
        ));
        if ($res){
            $this->jump('添加评论成功','index.php?c=Article&categoryid='.$_GET['categoryid'].'&articleid='.$_POST['articleid']);
        }else{
            $this->jump('添加失败','index.php?c=Article&&categoryid='.$_GET['categoryid'].'articleid='.$_POST['articleid']);
        }
    }
}
?>