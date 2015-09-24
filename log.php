<?php
    include 'file.php';
	class log
	{

		public  function writeData($data)
		{
			if(!isset($instance))
			{
				return 0;
			}
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


