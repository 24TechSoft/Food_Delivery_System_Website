<?php

class MacModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function GetMac()
  {
	ob_start();
	system('ipconfig /all'); 
	$mycom=ob_get_contents();
	ob_clean(); 
	$findme = "Physical";
	$pmac = strpos($mycom, $findme);
	$mac=substr($mycom,($pmac+36),17);
	return $mac;
  }
}
?>