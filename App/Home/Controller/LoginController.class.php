<?php
class LoginController extends Controller{
    //显示注册页面
    public function register(){
        $this->smarty->display('register.html');
    }
        //完成注册的方法
    public function registerHandle(){
        $arr = $_POST;
//       echo '<pre>';
//       print_r($arr);exit;
        //去掉验证码
        //unset($arr['yzm']);
        //去掉重复密码
        //unset($arr['repwd']);
        //加入时间
        $arr['ctime'] = time();
        //密码加密
        $arr['pwd'] = md5(md5($arr['pwd']).'2r2');
        //重复密码加密
       // $arr['repwd'] = md5(md5($arr['repwd']).'2r2');
        //判断是否有头像
        $arr['face'] = '';
        if ($_FILES['face']['name']){
            $upload = new Upload();
            $upload->rootPath='./Public/face';
            $arr['face'] = $upload->up();
            Image::thumb($arr['face'],50,50);
        }
//        echo '<pre>';
//        print_r($arr);
        $user = new UserModel();
        $result = $user->reg($arr);
        if ($result){

//            //用户注册成功，发送邮件
            //①引入工具类sendmail.class.php
            //②、实例化sendmail
//            $sendmail = new sendmail();
//            //③处理发送邮件的必要参数
//            $to = $arr['email'];//用户提交的邮箱
//            $subject = '如影随形博客网站激活邮件'. $arr['username'];
              //$code = base64_encode(md5('如影随形').'' . time() . ''.$to;
            //$url = "http://www.blog.com/index.php?c=Login&a=jihuo&code=$code";
           //$content = <<<sd
//您好！
//感谢在如影随形网站注册账号！<br>
//账户需要激活才能使用，赶紧激活程辉正是一员；
//sd;

//            //调用postmail发送邮件
//            $sendmail->postmail($to,$subject,$content);

            $this->jump('注册成功','index.php?c=Login&a=log');
        }else{
            $this->jump('注册失败','index.php?c=Login&a=register');
        }
    }

    public function log(){
        $this->smarty->display('login.html');
    }


    //处理登录
    public function loginHandle(){
        //验证码判断
        $arr=$_POST;
        //判断验证码是否正确
        if(strtoupper($_POST['yzm']) != strtoupper($_SESSION['yzm'])){
            $this->jump('验证码错误', '?c=Login&a=log');
        }

        $arr['pwd'] = md5(md5($arr['pwd']).'2r2');
        $user = new UserModel();
        $result = $user->loginCheck($arr);
        if ($result){
            $_SESSION['uname'] = $result['username'];
            $_SESSION['userid'] = $result['id'];
            $this->jump('登陆成功','index.php');
        }else{
            $this->jump('登录失败','index.php?c=Login&a=log');
        }
    }



    public function code(){
        Verify::code();
    }


    public function logout(){
        session_unset();
        $this->smarty->display('login.html');
    }


}
?>