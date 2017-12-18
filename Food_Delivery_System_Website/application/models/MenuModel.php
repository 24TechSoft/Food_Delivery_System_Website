<?php

class MenuModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
  /*Add Menu*/
  public function AddMenu($data)
  {
	  $table_name="menu";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Get All Menu*/
  public function GetAllMenu()
  {
	  $SQL="select * from menu";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Delete Menu*/
  public function DeleteMenu($where)
  {
	  $SQL="delete from menu where $where";
	  $query=$this->db->query($SQL);
  }
  /*Update Menu*/
  public function UpdateMenu($data,$where)
  {
	  $SQL="update menu set $data where $where";
	  $query=$this->db->query($SQL);
  }
    /*Get Sepcific Menu*/
  public function getSpecificMenu($where)
  {
	  $SQL="select * from menu where $where order by SerialNo";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Get Specific Menu including Cart*/
  public function getSpecificMenuWithCart($where)
  {
	  $ip=getenv('REMOTE_ADDR');
		$IPAddress=$ip;
	  $SQL="select a.ID, a.PartyID, a.Category, a.SubCategory, a.ItemName, a.ItemDescription, a.HalfPrice, a.FullPrice, a.Image, a.Availability,a.ItemType, a.PartyCode, a.SerialNo,coalesce((select Quantity from cart where ManuID=a.ID and IPAddress='$IPAddress'),0)as Quantity from menu a where $where order by a.SerialNo";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Add Category*/
  public function AddCategory($data)
  {
	  $table_name="category";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Update Category*/
  public function UpdateCategory($data,$where)
  {
	  $SQL="update category set $data where $where";
	  $query=$this->db->query($SQL);
  }
  /*Get Categories*/
  public function getCategory($where)
  {
	  $SQL="select * from category where $where order by SerialNo";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Delete Category*/
   public function DeleteCategory($where)
  {
	  $SQL="delete from category where $where";
	  $query=$this->db->query($SQL);
  }
  /*Add Sub Category*/
  public function AddSubCategory($data)
  {
	  $table_name="subcategory";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  /*Update Sub Category*/
  public function UpdateSubCategory($data,$where)
  {
	  $SQL="update subcategory set $data where $where";
	  $query=$this->db->query($SQL);
  }
  /*Get Sub Categories*/
  public function getSubCategory($where)
  {
	  $SQL="select a.ID,a.CategoryID,a.SubCategory,a.Photo,(select CName from category where ID=a.CategoryID)as CName from subcategory a where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Delete Sub Category*/
   public function DeleteSubCategory($where)
  {
	  $SQL="delete from subcategory where $where";
	  $query=$this->db->query($SQL);
  }
  /*Get Categories and Subcategories*/
  public function GetCatandSubCat()
  {
	  $SQL="select a.CName,b.SubCategory from category a left outer join subcategory b on a.ID= b.CategoryID order by a.ID";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  //Get New Items
  public function GetNewItems()
  {
	  $SQL="select * from menu order by ID desc limit 0,10";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result; 
  }
  //Special Items
  public function AddSpecialItem($data)
  {
	  $table_name="specialitems";
	  $this->db->insert($table_name, $data);
  }
  public function GetSpecialMenu($where)
  {
	  $SQL="select a.ID,a.MenuID, b.PartyID, b.Category, b.SubCategory, b.ItemName, b.ItemDescription, b.HalfPrice, b.FullPrice, b.Image, b.Availability, b.ItemType, b.PartyCode, b.SerialNo from specialitems a inner join menu b on a.MenuID=b.ID where $where order by ID";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result; 
  }
  public function DeleteSpecialItem($where)
  {
	  $SQL="delete from specialitems where $where";
	  $query=$this->db->query($SQL); 
  }
}
?>
