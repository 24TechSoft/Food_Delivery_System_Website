<?php  


 class cored {
 	
 	protected $ci;

	public function check()
	{
		print_r("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	}


 }
