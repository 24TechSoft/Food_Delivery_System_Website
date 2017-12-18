<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model("UserModel");
		$this->load->model("MacModel");
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	}
	public function index()
	{
		$cookieData="";
		$cookieData = $this->input->cookie('UserData', TRUE);
		if($cookieData=="")
		{
			$this->load->view("admin/login");
		}
		else
		{
			redirect("Order");
		}
	}
	public function API()
	{
       
		$test=$this->input->post("Test",true);
		echo json_encode($test);
	}
	public function Login()
	{
		$UserID=$this->input->post('UserID',true);
		$Password=md5($this->input->post('Password',true));
		$where = "`UserID` = '$UserID' and `Password`='$Password'";
		$array = $this->UserModel->CheckLogIn($where);
		foreach($array as $row)
		{
			$this->input->set_cookie('UserData', $row["UserID"], 3600); 
		}
		redirect("User");
	}
	public function Logout()
	{
		delete_cookie('UserData'); 
		redirect("User");
	}
	/*public function UpdatePassword()
	{
		$error="";
		$UserID = $this->input->cookie('UserData', TRUE);
		$Password=md5($this->input->post('OldPassword',TRUE));
		$where = "`UserID` = '$UserID' and `Password`='$Password'";
		$array = $this->UserModel->CheckLogIn($where);
		foreach($array as $row)
		{
			$Password=md5($this->input->post('NewPassword',TRUE));
			$data="`Password`='$Password'";
			$where="`UserID`='$UserID'";
			$this->UserModel->UpdatePassword($data,$where);
			$error["data"]=array('Error'=>0,'Message'=>'Password Changed');
		}
		if(sizeof($array)==0)
		{
			$error["data"]=array('Error'=>1,'Message'=>'Old Password not matching');
		}
		$this->load->view("UpdatePassword",$error);
	}*/
	public function AddUser()
	{
		$FullName = $this->input->post('FullName', TRUE);
		$UserID = $this->input->post('UserID', TRUE);
		$Password = $this->input->post('Password', TRUE);
		$PartyType = $this->input->post('PartyType', TRUE);
		$PartyID = $this->input->post('Party', TRUE);
		$data=array(
			'FullName'=>$FullName,
			'UserID'=>$UserID,
			'Password'=>$Password,
			'PartyType'=>$PartyType,
			'PartyID'=>$PartyID
		);
		$this->UserModel->AddUser($data);
		$data["userlist"]=$this->User->GetAllUsers();
		$this->load->view("AddUser",$data);
	}
	public function UpdatePassword()
	{
		$cookieData = $this->input->cookie('UserData', TRUE);
		if($cookieData=="")
		{
			redirect("User");
		}
		else
		{
			$this->load->view("admin/changepassword");
		}
	}
	public function ChangePassword()
	{
		$oldpassword=md5($this->input->post('oldpassword',TRUE));
		$newpassword=md5($this->input->post('newpassword',TRUE));
		$confirmpassword=md5($this->input->post('confirmpassword',TRUE));
		$cookieData = $this->input->cookie('UserData', TRUE);
		$where ="`UserID`='$cookieData' and `Password`='$oldpassword'";
		$result=$this->UserModel->CheckLogIn($where);
		if(sizeof($result)>0)
		{
			$data="`Password`='$newpassword'";
			$where="`UserID`='$cookieData'";
			$this->UserModel->UpdatePassword($data,$where);
			echo "<script type='text/javascript'>alert('Password Changed');</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Wrong Old Password');</script>";
		}
		redirect("User");
	}
}
?>
