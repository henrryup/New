<?php
//基础模型类
//为他的子类提供最基本的查询方法
class Model{
    private $pdo; //存放pdo对象
    //构造方法，完成数据库连接（调用Db类）
    public function __construct(){
        //得到Db对象
        $db = Db::getIns();
        $this->pdo = $db->pdo;
    }
    //查询所有行
    public function select($sql, $params = array()){
        $PDOStatement = $this->pdo->prepare($sql);
        //绑定参数
        if($params){
            foreach($params as $key=>$value){
                $PDOStatement->bindValue($key, $value);
            }
        }
        $PDOStatement->execute();
        return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    //查询一行数据
    public function find($sql, $params = array()){
        $PDOStatement = $this->pdo->prepare($sql);
        //绑定参数
        if($params){
            foreach($params as $key=>$value){
                $PDOStatement->bindValue($key, $value);
            }
        }
        try{
            $PDOStatement->execute();
            return $PDOStatement->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return false;
        }
    }

    //添加数据的方法
    //添加成功，返回最新的id；失败返回false
    public function add($sql, $params = array()){
        $PDOStatement = $this->pdo->prepare($sql); //预处理SQL语句，得到PDOStatement对象
        //判断SQL语句中是否有?或者:id等参数
        if($params){
            foreach($params as $key=>$value){
                $PDOStatement->bindValue($key, $value);
            }
        }
        try{
            $PDOStatement->execute();
            return $this->pdo->lastInsertId();
        }catch (PDOException $e){
            return false;
        }
        //var_dump($PDOStatement); die;
//        if($PDOStatement->execute()){
//            return $this->pdo->lastInsertId();
//        }else{
//            return false;
//        }
    }

    //查询总记录数
    //传递进来的sql格式必须是：select count(*) from table where...;
    public function count($sql){
        $PDOStatement = $this->pdo->query($sql); //执行sql，得到PDOStatement对象
        return $PDOStatement->fetchColumn(); //获取结果集中的第一行第一列
    }

    //save方法，用于更新
    /*
     * $sql = "update student set name=值, age=值 where id=xx";
     * $sql = "update student set name=:name, age=:age where id=:id";
     * $params = array(':name'=>'武大', ':age'=>'男', ':id'=>20)
     */
    //成功返回受影响的行数，失败返回false
    public function save($sql, $params = array()){
        $PDOStatement = $this->pdo->prepare($sql);
        //判断SQL中是否有占位符
        if($params){
            foreach($params as $key=>$value){
                $PDOStatement->bindValue($key, $value);
            }
        }
        if($PDOStatement->execute()){
            //成功返回受影响的行数
            return $PDOStatement->rowCount();
        }else{
            return false;
        }
    }

    //delete 用于删除语句
    /*
     * $sql = "delete from student where id=3"; //不使用占位符的形式
     * $sql = "delete from student where id=?";
     * $params = array(1=>25);
     */
    //成功返回受影响的行数，失败返回false
    public function delete($sql, $params = array()){
        $PDOStatement = $this->pdo->prepare($sql);
        //判断SQL中是否有占位符
        if($params){
            foreach($params as $key=>$value){
                $PDOStatement->bindValue($key, $value);
            }
        }
        if($PDOStatement->execute()){
            //成功返回受影响的行数
            return $PDOStatement->rowCount();
        }else{
            return false;
        }
    }
}
?>