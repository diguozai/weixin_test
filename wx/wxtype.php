<?php
	if(!defined("_WXTYPE_PHP_"))
	{
		 define("_WXTYPE_PHP_", "");
	}
	else
	{
		return;
	}
	define("WX_TEXT","text");
	define("WX_IMAGE","image");
	define("WX_VOICE","voice");
	define("WX_VIDEO","video");
	define("WX_SHORTVIDEO","shortvideo");
	define("WX_LOCATION","location");
	define("WX_LINK","link");
	define("WX_NEWS", "news");
	define("WX_MUSIC","music");
	define("WX_EVENT","event");

	define("XML", 1);
	define("OBJ", 2);




	define("WX_XML_TEXT_SEND","<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[text]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>");

	define("WX_XML_IMAGE_SEND","<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[image]]></MsgType>
							<Image>
							<MediaId><![CDATA[%s]]></MediaId>
							</Image>
							</xml>");

	define("WX_XML_VOICE_SEND","<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[voice]]></MsgType>
							<Voice>
							<MediaId><![CDATA[%s]]></MediaId>
							</Voice>
							</xml>");

	define("WX_XML_VIDEO_SEND","<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[video]]></MsgType>
							<Video>
							<MediaId><![CDATA[%s]]></MediaId>
							<Title><![CDATA[%s]]></Title>
							<Description><![CDATA[%s]]></Description>
							</Video> 
							</xml>");

	define("WX_XML_MUSIC_SEND","<xml>
								<ToUserName><![CDATA[%s]]></ToUserName>
								<FromUserName><![CDATA[%s]]></FromUserName>
								<CreateTime>%s</CreateTime>
								<MsgType><![CDATA[music]]></MsgType>
								<Music>
								<Title><![CDATA[%s]]></Title>
								<Description><![CDATA[%s]]></Description>
								<MusicUrl><![CDATA[%s]]></MusicUrl>
								<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
								<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
								</Music>
								</xml>");

	//图文
	// define("WX_XML_NEWS_SEND","<xml>
	// 							<ToUserName><![CDATA[%s]]></ToUserName>
	// 							<FromUserName><![CDATA[%s]]></FromUserName>
	// 							<CreateTime>%s</CreateTime>
	// 							<MsgType><![CDATA[news]]></MsgType>
	// 							<ArticleCount>%s</ArticleCount>
	// 							<Articles>
	// 							<item>
	// 							<Title><![CDATA[title1]]></Title> 
	// 							<Description><![CDATA[description1]]></Description>
	// 							<PicUrl><![CDATA[picurl]]></PicUrl>
	// 							<Url><![CDATA[url]]></Url>
	// 							</item>
	// 							<item>
	// 							<Title><![CDATA[title]]></Title>
	// 							<Description><![CDATA[description]]></Description>
	// 							<PicUrl><![CDATA[picurl]]></PicUrl>
	// 							<Url><![CDATA[url]]></Url>
	// 							</item>
	// 							</Articles>
	// 							</xml> ");




	




 
?>


