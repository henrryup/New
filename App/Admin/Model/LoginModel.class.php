<?php
class LoginModel extends Model {
    public function loginHandle(){
        $adminname = $_POST['adminname']; //用户名
        $pwd = md5($_POST['pwd']); //加密的密码
        $sql = "select pwd from admin where adminname='$adminname'";
        $res = $this->find($sql);
        if($res){
            //表示用户名正确
            //验证密码
            if($res['pwd'] == $pwd){
                //密码正确
                return true;
            }else{
                //密码错误
                return false;
            }
        }else{
            //用户名不正确
            return false;
        }
    }

    //通过用户名查询该用户在用户表中的id
//    public function selpwd($name){
//        //echo $name;
//        $sql = "select id from user where username=".$name;
//        echo $this->find($sql);die;
//    }

    //修改密码
    public function respwd($newpwd,$name){
        $sql = "update user set pwd =$newpwd where username=".$name;
       echo $this->save($sql);
    }
}
?>