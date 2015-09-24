<?php
	if(!defined("_LOG_PHP_"))
	{
		 define("_LOG_PHP_", "_log_php_");
	}
	else
	{
		return;
	}
    include 'file.php';

	class log
	{

		public  function writeData($data)
		{
			if(!isset($instance))
			{
				return 0;
			}
			$data = $data."\r\n";
			return self::$instance->writeData($data);
		}

		
		public static function getSingleton()
		{
			if(!isset(self::$instance))
			{
				self::$instance = new file(dirname(__FILE__)."/log/log.txt","a+");
			}
			return self::$instance;
		}

		
		
		static private $instance = null;
	};
?>


