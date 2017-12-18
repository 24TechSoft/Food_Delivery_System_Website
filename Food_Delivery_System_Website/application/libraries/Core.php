<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


 class core {
 	
 	protected $ci;

	public function check()
	{
		$a="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		// redirect("http://localhost/dlvradmnT/check/index/".$a);
	}


 }
