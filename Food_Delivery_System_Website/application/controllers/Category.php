<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model("MenuModel");
		$this->load->model("CouponModel");
		$this->load->model("CartModel");
		$this->load->model("MacModel");
		$this->load->model("WalletModel");
	}
	public function index()
	{
		$ip=getenv('REMOTE_ADDR');
		$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$ip' and Status=1");
		if(sizeof($LoginInfo)>0)
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=".$LoginInfo[0]["ID"]);
			
		}
		else
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=0");
		}
		$Category=$this->input->get("Category",TRUE);
		$SubCategory=$this->input->get("SubCategory",TRUE);
		$Item=$this->input->get("Item",TRUE);
		$where="";
		if($Item=="")
		{
			if($Category!="")
			{
				$where="a.Category='$Category'";
				if($SubCategory!="")
				{
					$where=$where." and a.SubCategory='$SubCategory'";
				}
			}
			else
			{
				$where="1";
			}
		}
		else
		{
			$where="a.ItemName like '%$Item%'";
		}
		$data["CategoryList"]=$this->MenuModel->GetCatandSubCat();
		$data["MenuList"]=$this->MenuModel->getSpecificMenuWithCart($where." and a.Availability=1");
		$where ="CURRENT_DATE BETWEEN ValidFrom and ValidTo";
		$data["CouponList"]=$this->CouponModel->getSpecificCoupon($where);
		$this->load->view("main/category",$data);
	}
	public function AddToCart()
	{
		$ip=getenv('REMOTE_ADDR');
		$IPAddress=$ip;
		$PartyID=mysql_escape_string($_POST["PartyID"]);
		$ManuID=mysql_escape_string($_POST["ManuID"]);
		$ItemName=mysql_escape_string($_POST["ItemName"]);
		$Quantity=mysql_escape_string($_POST["Quantity"]);
		$Price=mysql_escape_string($_POST["Price"]);
		$TotalPrice=mysql_escape_string($_POST["TotalPrice"]);
		$data=array(
					'IPAddress'=>$IPAddress,
					'PartyID'=>$PartyID,
					'ManuID'=>$ManuID,
					'ItemName'=>$ItemName,
					'Quantity'=>$Quantity,
					'Price'=>$Price,
					'TotalPrice'=>$TotalPrice,
				);
		$this->CartModel->AddCart($data);
	}
	public function GetCartItems()
	{
		
	}
}
?>
