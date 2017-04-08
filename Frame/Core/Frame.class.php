<?php
class Frame{
    //总体的方法，依次调用要执行的方法
    public static function run(){
        self::startSession();
        self::readConfig();
        self::getParams();
        self::setConst();
        self::autoLoad();
        self::dispatch();
    }

    //开启session
    public static function startSession(){
        session_start();
    }

    //类的自动加载
    /*
     * 整个框架，只有下面三个目录中的有类文件，所以要做这三个目录中类的自动加载
     * Frame/Core/
     * App/平台/Controller
     * App/平台/Model
     *
     *
     * new Image();
     * new StudentController()
     */
    public static function autoLoad(){
        //spl_autoload_register函数是php系统函数，他的参数是另一个函数
        //参数这个函数有一个参数$class.这个$class就是要自动加载的类的名字
        spl_autoload_register(function($class){
            $filename = CORE_PATH . $class . '.class.php'; //
            if(file_exists($filename)) require_once $filename;
            $filename = CONTROLLER_PATH . $class . '.class.php';
            if(file_exists($filename)) require_once $filename;
            $filename = MODEL_PATH . $class . '.class.php';
            if(file_exists($filename)) require_once $filename;
        });
    }

    //定义常量的方法
    public static function setConst(){
        //define('APP_PATH', './App/'); //index.php中已经定义了，所以这里不用定义
        //定义项目目录中App目录中，常用的MVC三层的目录
        define('CONTROLLER_PATH', APP_PATH . M . '/Controller/');
        define('MODEL_PATH', APP_PATH . M . '/Model/');
        define('VIEW_PATH', APP_PATH . M . '/View/'); //  ./App/Admin/View/
        //echo CONTROLLER_PATH;
        //echo '<br>';
        //定义Frame和Core目录为常量
        //define('FRAME_PATH', str_replace('Core','',__DIR__)); //E:/wamp/www/mvc/Frame/Core
        define('FRAME_PATH', './Frame/');  // E:/sd/sdf/
        define('CORE_PATH', FRAME_PATH . 'Core/');

        //web资源目录
        define('__PUBLIC__', './Public/');
    }

    //获取地址栏的m、c、a参数
    public static function getParams(){
        //获取地址栏中的参数
        $m = isset($_GET['m']) ? $_GET['m'] : $GLOBALS['conf']['DEFAULT_M'];  //表示前台还是后台
//        if(isset($_GET['m'])){
//            $m = $_GET['m'];
//        }else{
//            //$m = $GLOBALS['conf']['DEFAULT_M']; //Home
//            $m = 'Home';
//        }
        $c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['conf']['DEFAULT_C']; //表示控制器
        $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['conf']['DEFAULT_A']; //表示方法
        define('M', $m);
        define('C', $c);
        define('A', $a);
    }

    //获取配置项
    public static function readConfig(){
        //包含系统配置文件，并得到配置文件的返回值
        $config = require_once './Frame/Config/Config.php';
        //包括应用的配置文件
        $myconfig = require_once APP_PATH . 'Config/Config.php';
        $endConfig = array_merge($config, $myconfig);
        //将获取的$config存放到全局数组GLOBALS中
        $GLOBALS['conf'] = $endConfig;
        //echo '<pre>';
        //print_r($config);
    }

    //分发控制器
    //根据地址栏中的m、c、a参数，加载不同的控制器类，实例化控制器类，调用控制器中的方法
    public static function dispatch(){
        //echo '<Pre>';
        //print_r($GLOBALS);
        //1、引入控制器类
        //require_once './App/Admin/Controller/StudentController.class.php';
        //$str = APP_PATH . M . '/Controller/' . C . 'Controller.class.php';
        //echo $str;
        //exit;
        //require_once './App/' . M . '/Controller/' . C . 'Controller.class.php';
        //2、实例化控制器类
        //$obj = new $c . 'Controller'; // 这样是不行的
        $lei = C . 'Controller'; //控制器类的名字  结果类似于 StudentController
        $obj = new $lei(); //new StudentController();
        //3、控制器对象->方法
        $a = A;
        $obj->$a(); //$obj->test();
    }
}
?>