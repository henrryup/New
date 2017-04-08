<?php
class LoginController extends Controller {
    //显示登录页面
    public function login(){
        //echo md5('cd'.md5('admin').'ab'); //c3284d0f94606de1fd2af172aba15bf3
        //echo md5('asdf234ADF*.');
        $this->smarty->display('login.html');
    }
    //处理登录的表单提交的信息
    public function loginCheck(){
        //判断验证码是否正确
        if(strtoupper($_POST['yzm']) != strtoupper($_SESSION['yzm'])){
            $this->jump('验证码错误', '?m=Admin&c=Login&a=login');
        }
        $login = new LoginModel();
        if($login->loginHandle()){//模型中验证用户名和密码的方法
            $_SESSION['adminname'] = $_POST['adminname'];
            $_SESSION['pwd'] = $_POST['pwd'];
            //echo 'ok';
            $this->jump('登录成功', '?m=Admin');
        }else{
//            echo 'fail';
            $this->jump('用户名或密码错误', '?m=Admin&c=Login&a=login');
        }
    }

    public function pwd(){
        $this->smarty->display('respwd.html');
    }

    public function res()
    {
        $name = $_SESSION['adminname'];
//        $art = new LoginModel();
//       $id = $art->selpwd($name);

       //$id = $_POST['id'];
        $oldpwd = $_POST['oldpwd'];
        $newpwd = md5($_POST['newpwd']);
        $pwd = $_SESSION['pwd'];

        if ($oldpwd == $pwd) {

            $model = new Model();
            $sql ="update user set pwd='$newpwd' where username='$name'";
            $res = $model->save($sql);
//            $art = new LoginModel();
//            $res = $art->respwd($newpwd,$name);
            if ($res){
                $this->jump('修改成功','/?m=Admin');
            }else{
                $this->jump('修改失败','?m=Admin&c=Login&a=pwd');
            }
        }


    }



    //退出
    public function logout(){
        unset($_SESSION['adminname']); //销毁变量
        $this->jump('退出成功', '?m=Admin&c=Login&a=login');
    }

    //实现验证码图片的方法
    public function code(){
        Verify::code();
    }
}
?>