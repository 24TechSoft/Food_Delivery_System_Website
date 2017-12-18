<?php

class PartyModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
  /*Add Party*/
  public function AddParty($data)
  {
	  $table_name="partymaster";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Get All Party*/
  public function GetAllParties()
  {
	  $SQL="select * from partymaster";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Delete Party*/
  public function DeleteParty($where)
  {
	  $SQL="delete from partymaster where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Update Party*/
  public function UpdateParty($data,$where)
  {
	  $SQL="update partymaster set $data where $where";
	  $query=$this->db->query($SQL);
  }
  /*Get Sepcific Party*/
  public function getSpecificParty($where)
  {
	  $SQL="select * from partymaster where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
}
?>
