<?php

class OrderModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
  /*Add Order*/
  public function AddOrder($data)
  {
	  $table_name="orders";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Get All Orders*/
  public function GetAllOrder()
  {
	  $SQL="select * from orders";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Delete Orders*/
  public function DeleteOrder($where)
  {
	  $SQL="delete from orders where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
    /*Update Orders*/
  public function UpdateOrder($data,$where)
  {
	  $SQL="update orders set $data where $where";
	  $query=$this->db->query($SQL);
  }
    /*Get Sepcific Order*/
  public function GetSpecificOrder($where)
  {
	  $SQL="select * from orders where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Get Recently Ordered Items*/
  public function GetRecentOrderItems($CustomerID)
  {
	  $SQL="SELECT distinct m.ID,m.PartyID,m.Category,m.SubCategory,m.ItemName,m.ItemDescription,m.HalfPrice,m.FullPrice,m.Image,m.Availability,m.PartyCode,m.SerialNo FROM orders a inner join `orderitems` b on a.ID=b.OrderID INNER join menu m on b.MenuID=m.ID where a.CustomerID=$CustomerID";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Save Bill*/
  public function SaveBill($data)
  {
	  $table_name="bill";
	  $this->db->insert($table_name,$data);
	  $SQL="select max(ID) as ID from bill";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result[0]["ID"];
  }
  /*Save Bill Items*/
  public function SaveBillItems($data)
  {
	  $table_name="billitems";
	  $this->db->insert($table_name,$data);
  }
  /*Get Bill*/
  public function GetBill($where)
  {
	  $SQL="select a.ID,a.OrderID,c.OrderDate,c.OrderTime,a.Name,a.PhoneNo,a.Address,a.Amount,a.Discount,a.CGST,a.SGST,a.TotalPayable,a.Status, b.Item,b.Price,b.Quantity,b.Total from bill a inner join billitems b on a.ID=b.BillID inner join orders c on a.OrderID=c.ID where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Update bill*/
  public function UpdateBill($data,$where)
  {
	  $SQL="update bill set $data where $where";
	  $query=$this->db->query($SQL);
  }
}
?>
