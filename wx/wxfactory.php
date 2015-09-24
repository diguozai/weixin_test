<?php
	if(!defined("_WXFACTORY_PHP_"))
	{
		 define("_WXFACTORY_PHP_", "");
	}
	else
	{
		return;
	}
	include dirname(__FILE__).'/wxtype.php';
	include dirname(__FILE__).'/wxrecv.php';
    include dirname(dirname(__FILE__)).'/log.php';

	class wxfactory
	{
		public static function getobj_recv($type)
		{
			$obj = null;
			if ($type == WX_TEXT)
			{
				$obj = new wxtext_recv();
			}
			else if($type == WX_IMAGE)
			{
				$obj = new wximage_recv();
			}
			else if($type == WX_VOICE)
			{
				$obj = new wxvoice_recv();
			}
			else if($type == WX_VIDEO)
			{
				$obj = new wxvideo_recv();
			}
			else if($type == WX_SHORTVIDEO)
			{
				$obj = new wxshortvideo_recv();
			}
			else if($type == WX_LOCATION)
			{
				$obj = new wxlocation_recv();
			}
			else if($type == WX_LINK)
			{
				$obj = new wxlink_recv();
			}
			return $obj;
		}
		public static function getobjbydata_recv($data)
		{
			$xmlObj = simplexml_load_string($data);
			log::getSingleton()->writeData($data);
			if(!isset($xmlObj))
				return null;
			$obj = wxfactory::getobj_recv($xmlObj->MsgType);
			$obj->init($data);
			return $obj;
		}
	}

	
 
?>


