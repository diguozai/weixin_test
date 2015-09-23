<?php
	include 'wxtype.php'
	include 'wxrecv.php'
	class wxfactory
	{
		static function getobj_recv(type)
		{
			$obj = null;
			if (type == WX_TEXT)
			{
				$obj = new wxtext();
			}
			else if(type == WX_IMAGE)
			{
				$obj = new wximage();
			}
			else if(type == WX_VOICE)
			{
				$obj = new wxvoice();
			}
			else if(type == WX_VIDEO)
			{
				$obj = new wxvideo();
			}
			else if(type == WX_SHORTVIDEO)
			{
				$obj = new wxshortvideo();
			}
			else if(type == WX_LOCATION)
			{
				$obj = new wxlocation();
			}
			else if(type == WX_LINK)
			{
				$obj = new wxlink();
			}
			return $obj;
		}
	}

	static function getobjbydata_recv($data,$datatype=XML)
	{
		$obj = wxfactory::getobj_recv();
		$obj->init($data,$datatype);
		return $obj;
	}
 
?>


