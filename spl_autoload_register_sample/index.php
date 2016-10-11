<?php
//自动加载控制器和模型类
class Loader{
   public static function loadClass($class){

/*      $frameworks=FRAME_PATH.$class.'.class.php';
        $controllers=APP_PATH.'application/controllers/'.$class.'/class.php';
        $models=APP_PATH.'application/models/'.$class.'.class.php';*/
        defined('APP_PATH') or define('APP_PATH',__DIR__.'/');
        $controller=APP_PATH.'/ctro/'.$class.'.class.php';
        $view=APP_PATH.'/view/'.$class.'.class.php';

        if (file_exists($controller)) {
            // 加载框架核心类
            include $controller;
        }
        elseif (file_exists($view)) {
            //加载应用模型类
            include $view;
        } else {
            /* 错误代码 */
        }

    }

}





//自动引入类
//__autoload当类被实例化的时候，自动调用函数(每次实例化的时候都要自动调用，耗性能)

//sql_autoload_register(),它碰到没有被php定义的类后才执行

spl_autoload_register( "Loader::loadClass" );

$cto=new CtronlleA();
$cto->testview();

