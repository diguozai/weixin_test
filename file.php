<?php
    
	class file
{

	function __construct($fpath,$method)
	{
		$this->fPath = $fpath;
		$this->fMethod = $method;
		$this->createF();
		// print "<p>执行构造函数</p>";
	}



	function __destruct()
	{
		// print "<p>执行析构函数</p>";
		$this->closeF();
	}

	public  function writeData($data)
	{
		if(!$this->isHandExsit() || !isset($data) )
		{
			// print "<p>写文件失败</p>";
			return 0;
		}
		return fwrite($this->fHandle,$data);
	}

	private function isHandExsit()
	{
		if(isset($this->fHandle))
		{
			return true;
		}
		return false;
	}
	private function createF()
	{
		if(!isset($this->fPath) || (!isset($this->fMethod)))
		{
			return false;
		}
		$this->createDir(dirname($this->fPath));
		$this->fHandle = fopen($this->fPath,$this->fMethod);
		if(!isset($this->fHandle))
		{
			// print "<p>打开文件失败</p>";
			return false;
		}
		return true;
	}
	private function closeF()
	{
		if(isset($this->fHandle))
		{
			fclose($this->fHandle);
		}
	}
	private function createDir($path)
	{
		if(!file_exists($path) && (!empty($path)) && ($path != "."))
		{
			$this->createDir(dirname($path));
			// print "<p>创建目录:".$path."</p>";
			mkdir($path,0777);
		}
	}

	// private function createFile($path)
	// {
	// 	if (!file_exists($path)) 
	// 	{
	// 		$this->createDir($path);
	// 		$this->
	// 	}
		
	// }
	

	
	private $fHandle;
	private $fPath;
	private $fMethod;

};
?>


