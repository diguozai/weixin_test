
<?php
	include 'token.php';
	include 'log.php';
	define(MENU_URL,"https://api.weixin.qq.com/cgi-bin/%s?access_token=%s");
	class menu
	{
		 // https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN
		public  function postMenu($type)
		{
			$tok = token::getToken(); 		
			$url = sprintf(MENU_URL,$type,$token);	
			log::getSingleton()->writeData("menuUrl:".var_export($ret));
			$ret = curl::getUrl($url);
			log::getSingleton()->writeData("menuRet:".var_export($ret));
			if(isset($ret['errcode'] && $ret['errcode'] == 0)
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