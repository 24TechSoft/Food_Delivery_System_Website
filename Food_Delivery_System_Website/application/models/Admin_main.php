<?php

class admin_main extends CI_Model{

  var $table_name = "admintable";

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
	$this->load->library('my_db');
  }
  public function getAdminData($UserID)
  {
  	$query = $this->db->query("SELECT * FROM $this->table_name WHERE id=$UserID");
    if($query->num_rows() > 0)
    {
      return $query->result_array();
    }
	else {
		return NULL;
	}
  }
  public function Check_LogIn($UserID,$Password)
  {
  	$query = $this->db->query("SELECT * FROM $this->table_name WHERE UserID='$UserID' and Password='$Password'");
    if($query->num_rows() > 0)
    {
      return $query->result_array();
    }
	else {
		return NULL;
	}
  }
}