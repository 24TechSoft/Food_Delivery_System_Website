<?php

class custom_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
  
   public function getLocationList($adminID)
   {
    $SQL = "SELECT A.adminName employeeName, B.locationID locationID, B.latitude latitude, B.longitude longitude, B.time time FROM `tbl_location` B, `tbl_admin` A WHERE A.adminID=B.adminID and A.adminID=$adminID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getAccess(){
    $SQL = "SELECT `access`
            FROM `tbl_access`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function setAccess($access){
    $query = $this->db->query("UPDATE tbl_access SET access = '$access' WHERE accessID = 1");
   }

  public function getPartyList()
   {
    $SQL = "SELECT *
            FROM `tbl_party_master`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getMenuList($partyID)
   {
    $SQL = "SELECT *
            FROM `tbl_menu` where restaurantID=$partyID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getRestaurantList($area)
   {
    $SQL = "SELECT *
            FROM `tbl_party_master` where address like '%$area%'";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getMenuDisplayList($restaurant)
   {
    $SQL = "SELECT *
            FROM `tbl_menu` where restaurantID='$restaurant'";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }


   public function getRestaurantDetail($restaurant)
   {
    $SQL = "SELECT *
            FROM `tbl_party_master` where code='$restaurant'";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getParty($editPartyID)
   {
    $SQL = "SELECT *
            FROM `tbl_party_master` where partyID=$editPartyID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getDish($editDishID)
   {
    $SQL = "SELECT *
            FROM `tbl_menu` where dishID=$editdishID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }
   public function getAllDish()
   {
    $SQL = "SELECT *
            FROM `tbl_menu`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

  public function updateParty($data,$where)
  {
     $table_name = "tbl_party_master";
    return $this->db->update($table_name, $data, $where);
  }
  

  public function insertParty($data)
  {
    $table_name="tbl_party_master";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function insertDish($data)
  {
    $table_name="tbl_menu";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function sp_get_user_checklist_adm($userID) {
       return $this->my_db->GetResults("CALL sp_get_user_checklist_adm($userID)");
  }
  public function sp_save_user_checklist_adm($userID, $checkedChecklistIDs,$mdate,$manualVerify) {

        $query = $this->db->query("UPDATE tbl_user_details SET idverify_dummy = '$manualVerify' WHERE userID = '$userID'");
        $adminUserID = $this->qg_config_validation->_get_logged_in_user_id();
       return $this->my_db->GetResults("CALL sp_save_user_checklist_adm($userID, '$checkedChecklistIDs', $adminUserID,'$mdate')");
  }

  public function sp_get_admin_module_permissions_by_role($roleID) {
    return $this->my_db->GetResults("CALL sp_get_admin_module_permissions_by_role($roleID)");
  }

  public function sp_get_admin_field_permissions_by_role($roleID) {
    return $this->my_db->GetResults("CALL sp_get_admin_field_permissions_by_role($roleID)");
  }

  public function sp_add_new_admin_module($name, $displayName, $order) {
    return $this->my_db->GetResults("CALL sp_add_new_admin_module('$name', '$displayName', '$order')");
  }

  public function sp_add_new_admin_fields($name, $module) {
    return $this->my_db->GetResults("CALL sp_add_new_admin_fields('$name', '$module')");
  }
  public function sp_admin_login($userID, $password)
  {
    return $this->my_db->GetResults("CALL sp_admin_login('$userID', '$password')");
  }
  public function sp_add_new_admin_role($moduleName)
  {
    return $this->my_db->GetResults("CALL sp_add_new_admin_role('$moduleName')");
  }

public function insertCoupon($data)
  {
    $table_name="coupons";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  public function getCoupons()
   {
    $SQL = "SELECT *
            FROM `coupons`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }
   public function getCouponDetailByID($ID)
  {
  	$SQL = "SELECT *
            FROM `coupons` where `ID`=$ID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }
  public function deleteCoupon($where)
  {
  $table_name="coupons";
    $this->db->delete($table_name, $where);
    $incremented_id = $this->db->delete_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  public function add_coupon_Item($data)
  {
  $table_name="coupon_products";
  $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }
  public function delete_coupon_items($where)
  {
  $table_name="coupon_products";
    $this->db->delete($table_name, $where);
  }
  public function getCouponItems($CouponID,$PartyID)
  {
  	$SQL = "SELECT a.ID,b.ItemName
            FROM coupon_products a inner join kitchen b on a.ProductID=b.ID where a.CouponID=$CouponID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }
	public function LoadProductByPartyID($ID)
	{
		if($ID=="0")
		{
			$SQL = 'SELECT *
            FROM `Kitchen`';
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
		}
		else
		{
			$where='restaurentID=$ID';
			$SQL = 'SELECT *
            FROM `tbl_menu` where $where';
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
		}
	}
	
}
?>
