<?
 /**
 * FastPHP核心框架
 */
 class Core
 {
 	//运行程序
 	function run(){
 		 spl_autoload_register(array($this, 'loadClass'));
 		 $this->setReporting();
 		 $this->removeMagicQuotes();
 		 $this->unregisterGlobals();
 		 $this->Route();
 	}

 	//路由处理
 	function Route(){


 		$controllersName='Index';
 		$action='index';

 		if(!empty($_GET['url'])){
 			$url=$_GET['url'];
 			$urlArray=explode('/',$url);
 			$controllersName
 		}

 	}
 	//检测开发环境
 	function setReporting(){

 	}

 	// 删除敏感字符
    function stripSlashesDeep($value)
    {
        $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
        return $value;
    }

    // 检测敏感字符并删除
    function removeMagicQuotes()
    {
        if ( get_magic_quotes_gpc()) {
            $_GET = stripSlashesDeep($_GET );
            $_POST = stripSlashesDeep($_POST );
            $_COOKIE = stripSlashesDeep($_COOKIE);
            $_SESSION = stripSlashesDeep($_SESSION);
        }
    }
    // 检测自定义全局变量（register globals）并移除
    function unregisterGlobals()
    {
        if (ini_get('register_globals')) {
            $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
           foreach ($array as $value) {
                foreach ($GLOBALS[$value] as $key => $var) {
                    if ($var === $GLOBALS[$key]) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }

    //自动加载控制器和模型类
    static function loadClass($class)
    {
    	$frameworks=FRAME_PATH .$class .'.class.php';
    	$controllers=APP_PATH .'application/controllers/' .$class.'.class.php';
    	$model=APP_PATH .'application/models/'.$class.'.class.php';

    	if(file_exists($frameworks)){
    		include '$frameworks';
    	}else if (file_exists($controllers)) {
    		include '$controllers';
    	}else if(file_exists($models)){

    		include $models;
    	}else{

    	}


    }


 }