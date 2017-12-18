<?php

class UserModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
  /*Add User*/
  public function AddUser($data)
  {
	  $table_name="usermaster";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Get All Users*/
  public function GetAllUsers()
  {
	  $SQL="select * from usermaster";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Check Log In*/
  public function CheckLogIn($where)
  {
	  $SQL="select * from usermaster where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Update Password*/
  public function UpdatePassword($data,$where)
  {
	  $SQL="update usermaster set $data where $where";
	  $query=$this->db->query($SQL);
  }
}
?>
