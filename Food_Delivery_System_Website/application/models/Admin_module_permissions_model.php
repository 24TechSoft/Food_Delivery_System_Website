<?php

class admin_module_permissions_model extends CI_Model{

  var $table_name = "tbl_admin_module_permissions";

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }


  public function insert($data)
  {
    $this->db->insert($this->table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function delete($where)
  {
    $this->db->delete($this->table_name, $where); // here $where = array('id' => $id)
  }

  public function update($data,$where)
  {
    $this->db->update($this->table_name, $data, $where); // here $where = array('id' => $id)
  }

  public function select_all($where, $order_by)
  {

    $where = empty($where) ? "1" : $where;

    $order_by = empty($order_by) ? "modulePermissionsID  ASC" : $order_by;


    $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE $where ORDER BY $order_by ");
    if($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return "0#";
    }
  }

  public function select_item($item,$where)
  {
    $where = empty($where) ? "1" : $where;

    $query = $this->db->query("SELECT $item FROM ".$this->table_name." WHERE $where");
    if($query->num_rows() > 0)
    {
      $row = $query->row();
      return $row->$item;
    }
    else
    {
      return "0#";
    }
  }


  public function select_row($where)
  {
    $where = empty($where) ? "1" : $where;

    $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE $where");
    if($query->num_rows() > 0)
    {
      return $query -> row_array();
    }
    else
    {
      return "0#";
    }
  }
}
?>
