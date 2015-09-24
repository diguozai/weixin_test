
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
			// $str = $this->getMenuJson();
			// $jsonobj = json_decode($str);
			// // var_dump($jsonobj);
			// $str1 = json_encode($jsonobj);
			// print $str1;
			// return ;
			$tok = token::getToken(); 		
			if($tok == "")
			{
				log::getSingleton()->writeData("token获取错误");
				return;
			}
			log::getSingleton()->writeData("token获取成功");
			$url = sprintf(MENU_URL,$type,$tok);	
			log::getSingleton()->writeData("menuUrl:".$url);
			$postStr = $this->getMenuJson();
			$jsonobj = json_decode($postStr);
			$postStr  = json_encode($jsonobj);
			log::getSingleton()->writeData("menuRet:".$postStr);
			$output = curl::postUrl($url,$postStr );
			
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