<?php

class WalletModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
  /*User Account*/
  public function AddUser($data)
  {
	$table_name="customers";
	$this->db->insert($table_name, $data);
	$incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
	return $incremented_id;
  }
  public function UpdateUser($data,$where)
  {
	  $SQL="update customers set $data where $where";
	  $query=$this->db->query($SQL);
  }
  public function GetUserDetail($where)
  {
	  $SQL="select * from customers where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Address*/
  public function AddAddress($data)
  {
	$table_name="customeraddress";
	$this->db->insert($table_name, $data);
	$incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
	return $incremented_id;
  }
  public function DeleteAddress($where)
  {
	  $SQL="delete from customeraddress where $where";
	  $query=$this->db->query($SQL);
  }
  public function GetAddress($where)
  {
	  $SQL="select * from customeraddress where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Wallet*/
  public function SaveWallet($data)
  {
	  $table_name="customerwallet";
	$this->db->insert($table_name, $data);
	$incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
	return $incremented_id;
  }
  public function GetWallet($where)
  {
	  $SQL="select * from customerwallet where $where";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  public function WalletBalance($CustomerID)
  {
	  $SQL="select (select coalesce(sum(Amount),0) from customerwallet where CustomerID=$CustomerID and EntryType=1)-(select coalesce(sum(Amount),0) from customerwallet where CustomerID=$CustomerID and EntryType=2)as Balance";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  /*Login Data*/
  public function AddLogin($data)
  {
	  $table_name="login";
	  $this->db->insert($table_name, $data);
	  $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
		return $incremented_id;
  }
  public function GetLogInDetail($where)
  {
	  $SQL="select * from customers where ID=(select CustomerID from login where $where limit 1)";
	  $query=$this->db->query($SQL);
	  $result=$query->result_array();
	  return $result;
  }
  public function DismisLogin($where)
  {
	  $SQL="update login set Status=0 where $where";
	  $query=$this->db->query($SQL);
  }
  public function SendMail($Subject,$Message,$ToMail,$FromMail,$SuccessMessage,$FailMessage)
  {
	require("./PHPMailer_5.2.1/class.phpmailer.php");
	$mail = new PHPMailer(); 
	try 
	{
		$message = $Message;
		$mail->IsSMTP();
		$mail->AddReplyTo($FromMail);
		$mail->AddAddress($ToMail);
		$mail->SetFrom($FromMail);
		$mail->Subject = $Subject;
		$mail->Body=$message;
		//$mail->AddAttachment($file1); 
		$mail->Send();
		return $SuccessMessage;
	} 
	catch (phpmailerException $e) 
	{
		return $FailMessage;
	} 
	catch (Exception $e) 
	{
		return $FailMessage;
	}
  }
}
?>