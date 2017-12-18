<?php

class CartModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
  /*Add Coupon*/
  public function AddCart($data)
  {
	  $table_name="cart";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Get All Coupons*/
  public function GetAllCart()
  {
	  $SQL="select * from cart";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Delete Coupon*/
  public function DeleteCart($where)
  {
	  $SQL="delete from cart where $where";
	  $query=$this->db->query($SQL);
  }
    /*Get Sepcific Coupon*/
  public function getSpecificCart($where)
  {
	  $SQL="select a.ID,a.IPAddress,a.PartyID,a.ManuID,a.ItemName,a.Quantity,a.Price,a.TotalPrice,(select Image from menu where ID=a.ManuID)as Image from cart a where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  public function UpdateCart($data,$where)
  {
	  $SQL="update cart set $data where $where";
	  $query=$this->db->query($SQL);
  }
}
?>
