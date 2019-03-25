<?php
namespace Frame;
final class Frame{
    public static function run(){
        //Initializes character set
        self::initCharset();
        //Initializes config file
        self::initConfig();
        //get exact plateform,controller,function
        self::initRoute();
        //Initializes const
        self::initConst();
        //set up class autoload function
        self::initAutoload();
        //set up controller to obj, controller to function
        self::initDispatch();
    }

    private static function initCharset(){
        header("content-type:text/html;charset=utf-8");
        session_start();
    }

    private static function initConfig(){
        //get the config info and put into global to call
        $GLOBALS['config'] = require_once(APP_PATH."Conf".DS."Config.php");
    }

    private static function initRoute(){
        $p = $GLOBALS['config']['default_platform'];//plateform
        $c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['default_controller'];//controller
        $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['default_action'];//function
        //define const to use in other function
        define("PLAT", $p);
        define("CONTROLLER", $c);
        define("ACTION", $a);
    }

    private static function initConst(){
        //define const to use in other function
        define("VIEW_PATH", APP_PATH."View".DS);
        define("FRAME_PATH",ROOT_PATH."Frame".DS);
    }

    private static function initAutoload(){
        spl_autoload_register(function($className){
            //build filename
            $filename = ROOT_PATH.str_replace("\\",DS,$className).".class.php";
            //if not exists, create it
            if(file_exists($filename)) require_once($filename);
        });
    }

    //Which controller class object is created? And which method of the controller object is called
    private static function initDispatch(){
        //build controller class name
        $className = "\\".PLAT."\\"."Controller"."\\".CONTROLLER."Controller";
        //create controller object
        $controllerObj = new $className();
        //call function in this controller
        $action = ACTION;
        $controllerObj -> $action();
    }
}
