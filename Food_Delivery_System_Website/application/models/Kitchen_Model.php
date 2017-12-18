<?php

class Kitchen_Model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
  public function InsertItems($data)
  {
    $table_name="kitchen";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  public function GetItems()
  {
  	$SQL = "SELECT *
            FROM `kitchen`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }
  public function GetItemsByID($where)
  {
  	$SQL = "SELECT *
            FROM `kitchen` where $where";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }
  public function DeleteItem($where)
  {
  	$table_name='kitchen';
	return $this->db->delete($table_name,$where);
  }
  public function UpdateItem($data,$where)
  {
  	$table_name = "kitchen";
    return $this->db->update($table_name, $data, $where);
  }
}
?>