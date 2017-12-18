<?php

class OrderItemModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
  /*Add Order Item*/
  public function AddOrderItem($data)
  {
	  $table_name="orderitems";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Get All Order Item*/
  public function GetAllOrderItem()
  {
	  $SQL="select * from orderitems";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
      /*Update Order Item*/
  public function UpdateOrderItem($data,$where)
  {
	  $SQL="update orderitems set $data where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Delete Order Item*/
  public function DeleteOrderItem($where)
  {
	  $SQL="delete from orderitems where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
    /*Get Sepcific Order Item*/
  public function getSpecificOrderItem($where)
  {
	  $SQL="select a.ID,a.OrderID,a.PartyID,coalesce(b.Name,'Kitchen')as Name,a.MenuID,a.ItemName,a.Quantity,a.Price,a.TotalPrice,(select Image from menu where ID=a.MenuID)as Image from orderitems a left outer join partymaster b on a.PartyID=b.ID where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Get Hot Sellings*/
  public function GetHotSellings()
  {
	   $SQL="select * from menu a where (select COALESCE(sum(Quantity),0) from orderitems where MenuID=a.ID)>0 order by (select COALESCE(sum(Quantity),0) from orderitems where MenuID=a.ID) desc limit 0,5";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
}
?>
