
<?php
	include dirname(__FILE__).'/curl.php';
	include dirname(__FILE__).'/log.php';
	define("TOKEN_URL","https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s");
	define("TK_APPID", "wxf524dcff9235baa8");
	define("TK_SECERET", "0d8c4daa5e5e6d99346c530208a05b73");
	
	class token
	{
		public static function getToken($appid=TK_APPID,$secret=TK_SECERET)
		{
			$url = sprintf(TOKEN_URL,$appid,$secret);
			log::getSingleton()->writeData("getUrlRet:".$url);
			$output = curl::getUrl($url);
			log::getSingleton()->writeData("output:".$output);
			$ret =json_decode($output);
			// log::getSingleton()->writeData(var_dump($ret));
			//log start
			// log::getSingleton()->writeData("getUrlRet:".var_export($ret));
			//log end
			// if(isset($ret->errcode))
			// {
			// 	return "";
			// }
			return $ret->access_token;
			// {"access_token":"ACCESS_TOKEN","expires_in":7200}			

		} 

	};
?>