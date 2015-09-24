
<?php
	include dirname(__FILE__).'/file.php';
	include dirname(__FILE__).'/token.php';
	include dirname(__FILE__).'/log.php';
	define("MENU_URL","https://api.weixin.qq.com/cgi-bin/%s?access_token=%s");
	class menu
	{
		 // https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN
		public  function postMenu($type)
		{
			$tok = token::getToken(); 		
			if($tok == "")
			{
				log::getSingleton()->writeData("token获取错误");
				return;
			}
			$url = sprintf(MENU_URL,$type,$token);	
			log::getSingleton()->writeData("menuUrl:".$url);
			$output = curl::getUrl($url);
			log::getSingleton()->writeData("menuRet:".$output);
			$ret = json_decode($output);
			if(isset($ret->errcode) && $ret->errcode == 0)
			{
				return true;
			}
			return false;

		} 
		private function getMenuJson()
		{

			return '{
			     "button":[
			     {	
			          "type":"click",
			          "name":"今日歌曲",
			          "key":"V1001_TODAY_MUSIC"
			      },
			      {
			           "name":"菜单",
			           "sub_button":[
			           {	
			               "type":"view",
			               "name":"搜索",
			               "url":"http://www.soso.com/"
			            },
			            {
			               "type":"view",
			               "name":"视频",
			               "url":"http://v.qq.com/"
			            },
			            {
			               "type":"click",
			               "name":"赞一下我们",
			               "key":"V1001_GOOD"
			            }]
			       }]
		   	 }';

		}

	};
?>