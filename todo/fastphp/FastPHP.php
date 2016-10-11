<?php
//__DIR__ 文件所在的目录

//初始化常量
defined('FRAME_PATH') or define('FRAME_PATH',__DIR__.'/');
//去掉index.php后的路径
defined('APP_PATH') or define('APP_PATH',dirname($_SERVER['SCRIPT_FILENNAME']).'/');
defined('APP_DEBUG') or define('APP_DEBUG',false);
defined('CONFIG_PATH') or define('CONFIT_PATH',APP_PATH.'config/');
defined('RUNTIME_PATH') or define('RUNTIME_PATH',APP_PATH.'runtime/');

//包含配置文件
require APP_PATH . 'config/config.php';

//包含核心架构类
require FRAME_PATH . 'Core.php';

$fast=new Core;
$fast->run();
