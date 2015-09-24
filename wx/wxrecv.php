<?php
	if(!defined("_WXRECV_PHP_"))
	{
		 define("_WXRECV_PHP_", "");
	}
	else
	{
		return;
	}
	include 'wxtype.php';


	class wxbase_recv
	{
		
		protected function init($obj)
		{
			if(isset($obj))
			{
				$this->ToUserName 	= $obj->ToUserName;
				$this->FromUserName = $obj->FromUserName;
				$this->CreateTime 	= $obj->CreateTime;
				$this->MsgType 		= $obj->MsgType;
				$this->MsgId 		= $obj->MsgId;
			}

			return $obj;
		}

		public $ToUserName;					//开发者微信号
		public $FromUserName;				//发送方帐号（一个OpenID）
		public $CreateTime;					//消息创建时间 （整型）
		public $MsgType;					//视频为video
		public $MsgId;						//消息id，64位整型
	};



	class wxtext_recv extends wxbase_recv
	{
		
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($data,$datatype=XML)
		{
			$obj = parent::init($data,$datatype);
			$this->Content  = $obj->Content ;
		} 

		public $Content	;		//文本消息内容
		

	};

	class wximage_recv extends wxbase_recv
	{
		
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->PicUrl  = $obj->PicUrl  ;
			$this->MediaId = $obj->MediaId ;
		} 
		public $PicUrl;					//图片链接
		public $MediaId;					//图片消息媒体id，可以调用多媒体文件下载接口拉取数据。

	};

	class wxvoice_recv extends wxbase_recv
	{
		
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->MediaId  = $obj->MediaId  ;
			$this->Format   = $obj->Format ;
		} 
		public $MediaId ;	//语音消息媒体id，可以调用多媒体文件下载接口拉取数据。
		public $Format	;	//语音格式，如amr，speex等

	};

	class wxvideo_recv extends wxbase_recv
	{
		
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->MediaId 		  = $obj->MediaId  ;
			$this->ThumbMediaId   = $obj->ThumbMediaId ;
		} 
		public $MediaId;			//视频消息媒体id，可以调用多媒体文件下载接口拉取数据。
		public $ThumbMediaId;		//视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。

	};

	class wxshortvideo_recv extends wxbase_recv
	{
		
		function __construct($obj)
		{
			$obj = parent::init($obj);
			$this->MediaId 		  = $obj->MediaId  ;
			$this->ThumbMediaId   = $obj->ThumbMediaId ;
		}

		function __destruct()
		{
		}
		public $MediaId;		//视频消息媒体id，可以调用多媒体文件下载接口拉取数据。
		public $ThumbMediaId;	//视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。

	};

	class wxlocation_recv extends wxbase_recv
	{
		
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->MediaId 		  = $obj->MediaId  ;
			$this->ThumbMediaId   = $obj->ThumbMediaId ;
		} 
		public $Location_X;		//地理位置维度
		public $Location_Y;		//地理位置经度
		public $Scale;			//地图缩放大小
		public $Label;			//地理位置信息

	};

	class wxlink_recv extends wxbase_recv
	{
		
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->MediaId 		  = $obj->MediaId  ;
			$this->ThumbMediaId   = $obj->ThumbMediaId ;
		} 
		public $Title;				//消息标题
		public $Description;		//消息描述
		public $Url;				//消息链接

	};

	//关注/取消关注事件
	class wxevent_recv extends wxbase_recv
	{
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->Event   = $obj->Event ;
		} 
		public $Event;		//事件类型，subscribe(订阅)、unsubscribe(取消订阅)
	}
	
	
	

	//微信的event-----------------start

	//扫描带参数二维码事件
	//用户未关注时，进行关注后的事件推送
	class wxsubscribe_event_recv extends wxbase_recv
	{
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->EventKey   = $obj->EventKey ;
			$this->Ticket     = $obj->Ticket ;
		} 
		public $EventKey;	
		public $Ticket;	
	};
	//用户已关注时的事件推送
	class wxscan_event_recv extends wxbase_recv
	{
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->EventKey   = $obj->EventKey ;
			$this->Ticket     = $obj->Ticket ;
		} 
		public $EventKey;	
		public $Ticket;	
	};
	//上报地理位置事件
	class wxlocation_event_recv extends wxbase_recv
	{
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->Latitude   	 = $obj->Latitude ;
			$this->Longitude     = $obj->Longitude ;
			$this->Precision     = $obj->Precision ;
		} 
		public $Latitude;	
		public $Longitude;	
		public $Precision;	
	};
	//点击菜单拉取消息时的事件推送
	class wxclick_event_recv extends wxbase_recv
	{
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->EventKey   = $obj->EventKey ;
		} 
		public $EventKey;	

	};

	//点击菜单跳转链接时的事件推送
	class wxview_event_recv extends wxbase_recv
	{
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		public function init($obj)
		{
			$obj = parent::init($obj);
			$this->EventKey   = $obj->EventKey ;
		} 
		public $EventKey;	

	};
	//微信的event-----------------end


?>


