<?php

	/**
	*
	*/
	class CtronlleA
	{
		protected static $my_static='我是ctro文件的CtrooleA.class.php方法';
		function testview(){
			header( 'Content-Type:text/html;charset=utf-8 ');
			echo CtronlleA::$my_static;
			$v=new View();
			echo '<br>';
			$v->console();
		}
	}