
<?php
	
	if(!defined("_CURL_PHP_"))
	{
		 define("_CURL_PHP_", "__file_php_");
	}
	else
	{
		return ;
	}

	class curl
	{
		public static function getUrl($url,$param=null)
		{
			$ci = curl_init();
			$urlFull = $url;
			if(isset($param))
				$urlFull = $urlFull.$param;
			curl_setopt($ci, CURLOPT_URL, $urlFull);
			curl_setopt($ci,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ci, CURLOPT_HEADER, 0);

			$output = curl_exec($ci);

			curl_close($ci);
			return $output;

		} 

		public static function postUrl($url,$data)
		{
			$ci = curl_init();
			curl_setopt($ci, CURLOPT_URL, $url);
			curl_setopt($ci,CURLOPT_RETURNTRANSFER,1);

			curl_setopt($ci, CURLOPT_POST, 1);
			curl_setopt($ci, CURLOPT_POSTFIELDS, $post_data);

			$output = curl_exec($ci);

			curl_close($ci);
			return $output;
		}
	};
?>