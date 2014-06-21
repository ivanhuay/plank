<?php

class bootstrap{
	function __construct()
	{
		$url=(isset($_GET['url']))?$_GET['url']:NULL;
		$url=rtrim($url,'/');
		$url=explode('/',$url);
		echo "$url[0]<br>";

		if(empty($url[0]))
		{
			require(APPFOLDER.'controllers/index.php');
			$controller=new Index();
			$controller->index();
			return FALSE;
		}

		$file='application/controllers/'.$url[0].'.php';
		if(file_exists($file))
		{
			require($file);	
		}else
		{
			require(SYSTEM.'core/error.php');
			$controller=new Error();
			return FALSE;
		}
		
		$controller= new $url[0];
		
		if(isset($url[2]))
		{
			if(method_exists($controller,$url[1]))
			{
				$controller->{$url[1]}($url[2]);
			}else
			{
				echo "errr";
			}
			
			return FALSE;
		}else if (isset($url[1]))
		{
			$controller->{$url[1]}();
			return FALSE;
		}else
		{
			$controller->index();
		}
	}
}