<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_DB
{
   private $CI;

   /**
   * The constructor
   */

   function __construct()
   {
     $this->CI =& get_instance();
     $tz=timezone_open("Australia/Sydney");
   $dateTimeOslo=date_create("now",timezone_open("Europe/Oslo"));
   $offset=number_format((timezone_offset_get($tz,$dateTimeOslo))/3600,2);
     $offset=str_replace('.', ':',$offset);
     $this->CI->db->query("SET time_zone='+".$offset."'");
   }

    public function GetResults($SqlCommand)
    {
   		 /* execute multi query */
	      $k = 0;
	      $arr_results_sets = array();
	      if (mysqli_multi_query($this->CI->db->conn_id, $SqlCommand))
	      {
	        do
	        {
	              $result = mysqli_store_result($this->CI->db->conn_id);
		          if ($result) {
	                $l = 0;
	                while ($row = $result->fetch_assoc()) {
	                    $arr_results_sets[$k][$l] = $row;
	                    $l++;
	                }
	              }
	              $k++;
	        }
	        while(mysqli_next_result($this->CI->db->conn_id));
	     }
         return $arr_results_sets;
    }

    /**
   * Insert_On_Duplicate_Update_Batch
   *
   * Compiles batch insert strings and runs the queries
   * MODIFIED to do a MySQL 'ON DUPLICATE KEY UPDATE'
   *
   * @access public
   * @param string the table to retrieve the results from
   * @param array an associative array of insert values
   * @return object
   */
  function insert_on_duplicate_update_batch($table = '', $set = array())
  {

    $sql = "";

    foreach ($set as $row) {
      $sql .= $this->_insert_on_duplicate_update_batch($table, array_keys($row), array_values($row))."; ";
    }
    //echo $sql;
    return $this->GetResults($sql);
  }

  /**
   * Insert_on_duplicate_update_batch statement
   *
   * Generates a platform-specific insert string from the supplied data
   * MODIFIED to include ON DUPLICATE UPDATE
   *
   * @access public
   * @param string the table name
   * @param array the insert keys
   * @param array the insert values
   * @return string
   */
  private function _insert_on_duplicate_update_batch($table, $keys, $values)
  {
    foreach($keys as $num => $key) {
      $update_fields[] = "`$key` = '$values[$num]'";
    }

    return "INSERT INTO ".$table." (".implode(', ', $keys).") VALUES ('".implode("', '", $values)."') ON DUPLICATE KEY UPDATE ".implode(', ', $update_fields);
  }
}
?>
