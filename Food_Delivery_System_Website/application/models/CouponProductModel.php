<?php

class CouponProductModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
  /*Add Coupon Product*/
  public function AddCouponProduct($data)
  {
	  $table_name="couponproducts";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Get All Coupon Product*/
  public function GetAllCouponProduct()
  {
	  $SQL="select a.ID,a.CouponID,a.PartyID,a.ProductID,b.ItemName from couponproducts a inner join menu b on a.ProductID=b.ID";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Delete Coupon Product*/
  public function DeleteCouponProduct($where)
  {
	  $SQL="delete from couponproducts where $where";
	  $query=$this->db->query($SQL);
  }
    /*Get Sepcific Coupon Product*/
  public function getSpecificCouponProduct($where)
  {
	  $SQL="select a.ID,a.CouponID,a.PartyID,a.ProductID,b.ItemName from couponproducts a inner join menu b on a.ProductID=b.ID where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
}
?>
