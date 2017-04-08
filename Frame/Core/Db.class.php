<?php
//单例模式
class Db{
    private static $ins = null; //负责保存Db对象
    public $pdo = null; //用来存放pdo对象

    private function __construct(){
        $this->connect();
    }
    private function __clone(){}

    public static function getIns(){
        if(self::$ins === null){
            self::$ins = new Db();
        }
        return self::$ins;
    }

    //连接数据库
    private function connect(){
        try{
            $dsn = "{$GLOBALS['conf']['DB_TYPE']}:host={$GLOBALS['conf']['DB_HOST']};dbname={$GLOBALS['conf']['DB_NAME']};charset={$GLOBALS['conf']['DB_CHARSET']}";
            $this->pdo = new PDO($dsn, $GLOBALS['conf']['DB_USER'], $GLOBALS['conf']['DB_PWD'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
}
?>