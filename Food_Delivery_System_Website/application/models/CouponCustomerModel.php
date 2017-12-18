<?php

class CouponCustomerModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
  /*Add Coupon Customer*/
  public function AddCouponCustomer($data)
  {
	  $table_name="couponcustomers";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Get All Coupon Customer*/
  public function GetAllCouponCustomers()
  {
	  $SQL="select a.ID,a.CouponID,a.CouponID,b.FullName,b.MobileNo from couponcustomers a inner join menu b on a.CustomerID=b.ID";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Delete Coupon Customer*/
  public function DeleteCouponCustomer($where)
  {
	  $SQL="delete from couponcustomers where $where";
	  $query=$this->db->query($SQL);
  }
    /*Get Sepcific Coupon Customer*/
  public function getSpecificCouponCustomer($where)
  {
	  $SQL="select a.ID,a.CouponID,a.CustomerID,b.FullName,b.MobileNo from couponcustomers a inner join customers b on a.CustomerID=b.ID where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  //Get Special Coupons by Customer
  public function GetCouponsByCustomer($CustomerID)
  {
	  $SQL="select b.ID, b.Name, b.ValidFrom, b.ValidTo, b.ValidTimeFrom, b.ValidTimeTo, b.Code, b.PartyID, b.UserLimit, b.Image, b.Detail, b.MinPrice, b.CouponType, b.DiscountType, b.DiscountAmount from couponcustomers a inner join coupons b on a.CouponID=b.ID WHERE b.ValidFrom<=CURRENT_DATE and b.ValidTo>=CURRENT_DATE and a.CustomerID=$CustomerID";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
}
?>
