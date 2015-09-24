<?php
	
	if(!defined("_WXSEND_PHP_"))
	{
		 define("_WXSEND_PHP_", "");
	}
	else
	{
		return;
	}

	class wxbase_send
	{
		public function getSendString()
		{
			$str = "";
			if($this->MsgType == WX_TEXT)
			{
				$str = sprintf(WX_XML_TEXT_SEND,
					$this->ToUserName,
					$this->FromUserName,
					$this->CreateTime,
					// $this->MsgType,
					$this->Content
					);
			}

			
			else if($this->MsgType == WX_IMAGE)
			{
				$str = sprintf(WX_XML_IMAGE_SEND,
					$this->ToUserName,
					$this->FromUserName,
					$this->CreateTime,
					// $this->MsgType,
					$this->MediaId
					);
			}

			else if($this->MsgType == WX_VOICE)
			{
				$str = sprintf(WX_XML_VOICE_SEND,
					$this->ToUserName,
					$this->FromUserName,
					$this->CreateTime,
					// $this->MsgType,
					$this->MediaId
					);
			}

			else if($this->MsgType == WX_VIDEO)
			{
					$str = sprintf(WX_XML_VIDEO_SEND,
					$this->ToUserName,
					$this->FromUserName,
					$this->CreateTime,
					// $this->MsgType,
					$this->MediaId,
					$this->Title,
					$this->Description
					);
			}
			else if($this->MsgType == WX_MUSIC)
			{

					$str = sprintf(WX_XML_MUSIC_SEND,
					$this->ToUserName,
					$this->FromUserName,
					$this->CreateTime,
					$this->Title,
					$this->Description,
					$this->MusicUrl,
					$this->HQMusicUrl,
					$this->ThumbMediaId
					);

			}
			else if($this->MsgType == WX_NEWS)
			{
				$beginstr =sprintf("<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[news]]></MsgType>
						<ArticleCount>%s</ArticleCount>
						<Articles>
						",
						$this->ToUserName,
						$this->FromUserName,
						$this->CreateTime,
						$this->ArticleCount);


				$middlestr = "";
				foreach ($this->items as $key => $item) {

					$itemstr = sprintf("<item>
								<Title><![CDATA[%s]]></Title> 
								<Description><![CDATA[%s]]></Description>
								<PicUrl><![CDATA[%s]]></PicUrl>
								<Url><![CDATA[%s]]></Url>
								</item>
								",
								$item->title,
								$item->description,
								$item->picurl,
								$item->url
								);
					$middlestr=$middlestr.$itemstr;
				}

				$endstr=sprintf("</Articles>
						 </xml> ");

				$str = $beginstr.$middlestr.$endstr;


			}
		}
		function __construct()
		{
			$this->ToUserName = "";
			$this->FromUserName = "";
			$this->CreateTime = "";
			$this->MsgType = "";

		}
		public $ToUserName;					//开发者微信号
		public $FromUserName;				//发送方帐号（一个OpenID）
		public $CreateTime;					//消息创建时间 （整型）
		public $MsgType;					//视频为video
	};



	class wxtext_send extends wxbase_send
	{
		
		public $Content	;
		function __construct()
		{
			$this->Content = "";
		}
		public function init($ToUserName,$FromUserName,$CreateTime,$MsgType,$Content)
		{
			$this->ToUserName = $ToUserName;
			$this->FromUserName = $FromUserName;
			$this->CreateTime	= $CreateTime;
			$this->MsgType 		= $MsgType;
			$this->Content 		= $Content;
		}		
		

	};

	class wximage_send extends wxbase_send
	{
		
		public $MediaId	;
		function __construct()
		{
			$this->MediaId = "";
		}				
		public function init($ToUserName,$FromUserName,$CreateTime,$MsgType,$MediaId)
		{
			$this->ToUserName = $ToUserName;
			$this->FromUserName = $FromUserName;
			$this->CreateTime	= $CreateTime;
			$this->MsgType 		= $MsgType;
			$this->MediaId 		= $MediaId;
		}
	};

	class wxvoice_send extends wxbase_send
	{
		

		public $MediaId ;	
		function __construct()
		{
			$this->MediaId = "";
		}		
		public function init($ToUserName,$FromUserName,$CreateTime,$MsgType,$MediaId)
		{
			$this->ToUserName = $ToUserName;
			$this->FromUserName = $FromUserName;
			$this->CreateTime	= $CreateTime;
			$this->MsgType 		= $MsgType;
			$this->MediaId 		= $MediaId;
		}

	};

	class wxvideo_send extends wxbase_send
	{
	
		public $MediaId;			
		public $Title;		
		public $Description;	
		function __construct()
		{
			$this->MediaId = "";
			$this->Title = "";
			$this->Description = "";
		}		
		public function init($ToUserName,$FromUserName,$CreateTime,$MsgType,$MediaId,$Title,$Description)
		{
			$this->ToUserName = $ToUserName;
			$this->FromUserName = $FromUserName;
			$this->CreateTime	= $CreateTime;
			$this->MsgType 		= $MsgType;
			$this->MediaId 		= $MediaId;
			$this->Title        = $Title;
			$this->Description        = $Description;
		}	

	};

	class wxmusic_send extends wxbase_send
	{
	
		public $MediaId;			
		public $Title;		
		public $Description;	
		function __construct()
		{
			$this->MediaId = "";
			$this->Title = "";
			$this->Description = "";
		}		
		public function init($ToUserName,$FromUserName,$CreateTime,$MsgType,$MediaId,$Title,$Description)
		{
			$this->ToUserName = $ToUserName;
			$this->FromUserName = $FromUserName;
			$this->CreateTime	= $CreateTime;
			$this->MsgType 		= $MsgType;
			$this->MediaId 		= $MediaId;
			$this->Title        = $Title;
			$this->Description        = $Description;
		}		

	};

	class  wxnews_item
		{

			public $title;
			public $description;
			public $picurl;
			public $url;
			function __construct()
			{
				$this->title ="";
				$this->description = "";
				$this->picurl = "";
				$this->url = "";
				
			}
		};
	class wxnews_send extends wxbase_send
	{
		
		public $ArticleCount;	
		public $items;	

		function __construct()
		{
			$this->ArticleCount = 0;
			$this->items = array();
		}
		public function init($ToUserName,$FromUserName,$CreateTime,$MsgType)
		{
			$this->ToUserName = $ToUserName;
			$this->FromUserName = $FromUserName;
			$this->CreateTime	= $CreateTime;
			$this->MsgType 		= $MsgType;
		}	
		public function addItem($item)
		{
			$items[$this->ArticleCount] = $item;
			$this->ArticleCount ++;
		}

	};
	
?>


