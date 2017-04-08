<?php
class UserModel extends Model{
    public function reg($arr){

        //判断手机号格式
        $num = $arr['phone'];
        $pattern = '/^1(30|50|80|86|35|52|38|85)\d{8}$/';

//        if (preg_match($pattern,$num) == 0){
//            echo '手机号格式不正确';
//            return false;
//        }

        //判断邮箱格式
//        $em = $arr['email'];
//        $pattern = '/(?!_)^[a-z0-9_]{3,15}[0-9a-z]@(163|sina|baidu)\.(com|cn)$/';
//
//        if (preg_match($pattern,$em) == 0){
//            echo '邮箱错误';
//            return false;
//        }


    $sql = "insert into user(username,pwd,face,email,phone,ctime)
        VALUES 
         (:username,
          :pwd,
          :face,
          :email,
          :phone,
          :ctime)";
        $params = array();
        foreach ($arr as $key=>$value){
            $params[':'.$key] = $value;
        }
//        echo '<pre>';
//        print_r($params);exit;
        return $this->add($sql,$params);
}


        //验证用户名和密码是否正确
        public function loginCheck($arr){
            //先查一个，比如根据用户名、邮箱、电话查询结果，在查询的结果中，再比对密码是否正确
            $name =$arr['name'];//name可能是用户名、邮箱、手机
            $sql = "select id,username,pwd from user where username='$name' or email='$name' or phone='$name'";
            $row =$this->find($sql);
            if($row['pwd'] == $arr['pwd']){
                return $row;
            }else{
                return false;
            }
        }

        //激活方法
//        public function jihuo($code){
//            $code = base64_decode($code);
//            $info = explode('',$code);
//
//            $sql ="update user set is_jihuo = 1 where email = '$info[2]'";
//            return $this->save($sql);
//        }
}
?>