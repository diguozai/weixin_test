<?php
	
	include 'wxtype.php'


	class wxbase_recv
	{
		
		protect function init($data,$datatype)
		{
			$obj = null;
			if($datatype == XML)
			{
			    $obj = simplexml_load_string($data);
			}
			$obj = $data;
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

		protect function init($data,$datatype=XML)
		{
			$obj = parent::init($data,$datatype);
			$this->MsgType  = $obj->MsgType  ;
			$this->Content  = $obj->Content ;
		} 
		public $MsgType	;		//text
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

		protect function init($data,$datatype=XML)
		{
			$obj = parent::init($data,$datatype);
			$this->PicUrl  = $obj->PicUrl  ;
			$this->MediaId = $obj->MediaId ;
		} 
		public $PicUrl;					//图片链接
		public $MediaId					//图片消息媒体id，可以调用多媒体文件下载接口拉取数据。

	};

	class wxvoice_recv extends wxbase_recv
	{
		
		function __construct()
		{
			
		}

		function __destruct()
		{
		}

		protect function init($data,$datatype=XML)
		{
			$obj = parent::init($data,$datatype);
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

		protect function init($data,$datatype=XML)
		{
			$obj = parent::init($data,$datatype);
			$this->MediaId 		  = $obj->MediaId  ;
			$this->ThumbMediaId   = $obj->ThumbMediaId ;
		} 
		public $MediaId;			//视频消息媒体id，可以调用多媒体文件下载接口拉取数据。
		public $ThumbMediaId;		//视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。

	};

	class wxshortvideo_recv extends wxbase_recv
	{
		
		function __construct($data,$datatype=XML)
		{
			$obj = parent::init($data,$datatype);
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

		protect function init($data,$datatype=XML)
		{
			$obj = parent::init($data,$datatype);
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

		protect function init($data,$datatype=XML)
		{
			$obj = parent::init($data,$datatype);
			$this->MediaId 		  = $obj->MediaId  ;
			$this->ThumbMediaId   = $obj->ThumbMediaId ;
		} 
		public $Title;				//消息标题
		public $Description;		//消息描述
		public $Url;				//消息链接

	};
?>


