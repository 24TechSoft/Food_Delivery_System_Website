<?php

class CouponModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
  /*Add Coupon*/
  public function AddCoupon($data)
  {
	  $table_name="coupons";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Get All Coupons*/
  public function GetAllCoupons()
  {
	  $SQL="select a.ID as ID,a.Name as Name,a.ValidFrom as ValidFrom,a.ValidTo as ValidTo,a.Code as Code,a.PartyID as PartyID,b.Name as Party,a.UserLimit as UserLimit,a.Image as Image,a.Detail as Detail,a.MinPrice as MinPrice from coupons a left outer join partymaster b on a.PartyID=b.ID";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Delete Coupon*/
  public function DeleteCoupons($where)
  {
	  $SQL="delete from coupons where $where";
	  $query=$this->db->query($SQL);
  }
  /*Update Coupon*/
  public function UpdateCoupons($data,$where)
  {
	  $SQL="update coupons set $data where $where";
	  $query=$this->db->query($SQL);
  }
    /*Get Sepcific Coupon*/
  public function getSpecificCoupon($where)
  {
	  $SQL="select a.ID,a.Name,a.ValidFrom,a.ValidTo,a.ValidTimeFrom,a.ValidTimeTo,a.Code,a.PartyID,coalesce(b.Name,'Kitchen') as Party,a.UserLimit,a.Image,a.Detail,a.MinPrice,a.CouponType,a.DiscountType,a.DiscountAmount from coupons a left outer join partymaster b on a.PartyID=b.ID where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Coupon Temporarily*/
  public function ApplyTemporaryCoupon($data)
  {
	$table_name="applycoupontemp";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  public function ReadTempAppliedCoupon($where)
  {
	  $SQL="select * from applycoupontemp where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  public function RemoveTempAppliedCoupon($where)
  {
	  $SQL="delete from applycoupontemp where $where";
	  $query=$this->db->query($SQL);
  }
}
?>
