<?php

class other_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
  /*Delivery Boy*/
  public function SaveDeliveryBoy($data)
  {
	  $tablename="deliveryboy";
	  $this->db->insert($tablename,$data);
  }
  public function UpdateDeliveryBoy($data,$where)
  {
	  $SQL="update deliveryboy set $data where $where";
	  $query=$this->db->query($SQL);
  }
  public function DeleteDeliveryBoy($where)
  {
	  $SQL="delete from deliveryboy where $where";
	  $query=$this->db->query($SQL);
  }
  public function GetAllDeliveryBoy($where)
  {
	  $SQL="select * from deliveryboy where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Areas*/
  public function SaveArea($data)
  {
	  $tablename="areas";
	  $this->db->insert($tablename,$data);
  }
  public function UpdateArea($data,$where)
  {
	  $SQL="update areas set $data where $where";
	  $query=$this->db->query($SQL);
  }
  public function DeletePlace($where)
  {
	  $SQL="delete from areas where $where";
	  $query=$this->db->query($SQL);
  }
  public function GetAllPlaces($where)
  {
	  $SQL="select * from areas where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Website Status*/
  public function ToggleWebsiteStatus($data)
  {
	  $SQL="update status set $data";
	  $query=$this->db->query($SQL);
  }
  public function GetWebsiteStatus()
  {
	  $SQL="select * from status";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
}
?>