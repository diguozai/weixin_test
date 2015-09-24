<?php
/**
  * wechat php test
  */

//define your token
include dirname(__FILE__).'/log.php';
include dirname(__FILE__).'/menu.php';
include dirname(__FILE__).'/wx/wxfactory.php';
 include dirname(__FILE__).'/wx/wxsend.php';
include dirname(__FILE__).'/curl.php';
define("TOKEN", "diguozai");

$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();

class wechatCallbackapiTest
{
	public function valid()
    {
        // $echoStr = $_GET["echostr"];
        // $this->responseMsg();
        // return;
         if($this->checkSignature())
        {
             $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
            log::getSingleton()->writeData($postStr);
            $obj = wxfactory::getobjbydata_recv($postStr);
             $this->responseSameType($obj);
		// $me = new menu();
		// $me->postMenu("menu/create");
 		    
	       	exit;
        }
    }
    public function responseSameType($obj)
    {
            $objSend = null;
            if ($obj->MsgType == WX_TEXT)
            {
                $msg = "你发的消息是:".$obj->Content."你好啊，baby～～";
                log::getSingleton()->writeData($msg);
                $objSend = new wxtext_send();
                $objSend->init($obj->FromUserName,$obj->ToUserName,time(),$obj->MsgType,$msg);
                $sendText = $objSend->getSendString();
                echo $sendText;
            }   
            else if($obj->MsgType == WX_IMAGE)
            {
                echo "hellpo";
                $objSend = new wxtext_send();
                $objSend->init($obj->FromUserName,$obj->ToUserName,time(),"text","你发的是一张图片");
                $sendText = $objSend->getSendString();
                echo $sendText;
            }
            else if($obj->MsgType == WX_VOICE)
            {
                $objSend = new wxtext_send();
                $objSend->init($obj->FromUserName,$obj->ToUserName,time(),"text","你发的是语音");
                $sendText = $objSend->getSendString();
                echo $sendText;
            }
            else if($obj->MsgType == WX_VIDEO)
            {
                $objSend = new wxtext_send();
                $objSend->init($obj->FromUserName,$obj->ToUserName,time(),"text","你发的是视频");
                $sendText = $objSend->getSendString();
                echo $sendText;
            }
            else if($obj->MsgType == WX_SHORTVIDEO)
            {
               $objSend = new wxtext_send();
                $objSend->init($obj->FromUserName,$obj->ToUserName,time(),"text","你发的是短视频");
                $sendText = $objSend->getSendString();
                echo $sendText;
            }
            else if($obj->MsgType == WX_LOCATION)
            {
                $objSend = new wxtext_send();
                $objSend->init($obj->FromUserName,$obj->ToUserName,time(),"text","你发的是位置");
                $sendText = $objSend->getSendString();
                echo $sendText;
            }
            else if($obj->MsgType == WX_LINK)
            {
                $objSend = new wxtext_send();
                $objSend->init($obj->FromUserName,$obj->ToUserName,time(),"text","你发的链接");
                $sendText = $objSend->getSendString();
                echo $sendText;
            }
        
    }
    public function responseMsg()
    {
		//get post data, May be due to the different environments
		 $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
//         $postStr = "<xml><ToUserName><![CDATA[gh_afaae689af83]]></ToUserName>
// <FromUserName><![CDATA[oNLzbvm5ccAl0q7QWyDOo6nqXp88]]></FromUserName>
// <CreateTime>1443084773</CreateTime>
// <MsgType><![CDATA[text]]></MsgType>
// <Content><![CDATA[1]]></Content>
// <MsgId>6198001905600890285</MsgId>
// </xml>";
      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "Welcome to diguozai world!";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>
