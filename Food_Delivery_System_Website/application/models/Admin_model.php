<?php

class admin_model extends CI_Model{
	
	var $table_name = "tbl_admin";
	
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
	public function insert_table($tableName,$data)
	{
		$this->db->insert($tableName, $data);
		$incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
		return $incremented_id;
	}


	public function delete($where)
	{
		$this->db->delete($this->table_name, $where); // here $where = array('id' => $id)
	}
	public function delete_table($table,$where)
	{
		$this->db->delete($table, $where); // here $where = array('id' => $id)
	}

	public function update($data,$where)
	{
		return $this->db->update($this->table_name, $data, $where); // here $where = array('id' => $id)
	}

	public function select_all($where, $order_by)
	{
	
		$where = empty($where) ? "1" : $where;
		
		$order_by = empty($order_by) ? "adminID ASC" : $order_by;
	
		
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
	public function select_item_table($tableName,$item,$where)
	{
		$where = empty($where) ? "1" : $where;
	
		$query = $this->db->query("SELECT $item FROM ".$tableName." WHERE $where");
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


	public function saveActivity($data)
	{

		$adminID = $data['adminid'];
		$activityID = $data['activityid'];
		$date = date("y-m-d h:i:s");

		$query = $this->db->query("INSERT INTO tbl_admin_activity_log(adminID,activityTypeId,CreatedDate) VALUES ('$adminID','$activityID','$date')");
		
	}	

	public function getRoleName($where)
	{

		$query = $this->db->query("SELECT role FROM tbl_admin_roles WHERE $where");

		if($query->num_rows() >= 1)
		{
			$row = $query->result_array();
		 	return $row[0]['role'];
		}
		else
		{
			return "0#";	
		}


	}
	public function check_item($data)
	{
		$query = $this->db->query("SELECT count(*) as valid FROM ".$this->table_name." WHERE adminID =".$data['adminID']." and adminPassword ='".$data['adminPassword']."'");
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