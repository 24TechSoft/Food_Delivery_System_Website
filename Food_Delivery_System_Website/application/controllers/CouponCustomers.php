<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CouponCustomers extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model("CouponCustomerModel");
		$this->load->model("CouponModel");
		$this->load->model("CouponProductModel");
		$this->load->model("MenuModel");
		$this->load->model("WalletModel");
		$this->load->model("MacModel");
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
			$id=$this->uri->segment(3);
			$MinLimit=$this->uri->segment(4);
			$MaxLimit=$this->uri->segment(5);
			$where="`CouponID`=$id";
			$data["AddedCustomerList"]=$this->CouponCustomerModel->getSpecificCouponCustomer($where);
			$data["CouponData"]=$this->CouponModel->getSpecificCoupon("a.`ID`=$id limit $MinLimit,$MaxLimit");
			$data["AllCustomerList"]=$this->WalletModel->GetUserDetail("ID not in (select CustomerID from couponcustomers where CouponID=$id)");
			//$this->load->view("admin/header");
			$this->load->view("admin/CouponCustomers",$data);
		}
	}
	public function AddCouponCustomer()
	{
		$CouponID=$this->uri->segment(3);
		//ID,CouponID,PartyID,ProductID
		$Customers = $this->input->post('Customers', TRUE);
		$Message="";
		$ContactNo="";
		foreach($Customers as $Customer)
		{
			$CustomerDetail=$this->WalletModel->GetUserDetail("ID=$Customer");
			$CouponDetail=$this->CouponModel->getSpecificCoupon("a.ID=$CouponID");
			if(sizeof($CustomerDetail)>0 && sizeof($CouponDetail)>0)
			{
				$data=array(
						'CouponID'=>$CouponID,
						'CustomerID'=>$Customer,
					);
				if($ContactNo!="")
				{
					$ContactNo=$ContactNo.",";
				}
				$ContactNo=$ContactNo.$CustomerDetail[0]["MobileNo"];
				$this->CouponCustomerModel->AddCouponCustomer($data);
				$CouponCode=$CouponDetail[0]["Code"];
				$Validity="From ".$CouponDetail[0]["ValidFrom"]." to ".$CouponDetail[0]["ValidTo"]."(".$CouponDetail[0]["ValidTimeFrom"]." to ".$CouponDetail[0]["ValidTimeTo"].")";
				$MinOrderAmount=$CouponDetail[0]["MinPrice"];
				if($CouponDetail[0]["CouponType"]==1)
				{
					$CouponType="Discount";
				}
				else
				{
					$CouponType="Cashback";
				}
				if($CouponDetail[0]["DiscountType"]==1)
				{
					$Discount="Rs. ".$CouponDetail[0]["DiscountAmount"];
				}
				else
				{
					$Discount=$CouponDetail[0]["DiscountAmount"]."%";
				}
				$CouponProducts=$this->CouponProductModel->getSpecificCouponProduct("a.CouponID=".$CouponDetail[0]["ID"]);
				$Products="";
				foreach($CouponProducts as $row)
				{
					if($Products!="")
					{
						$Products=$Products.", ";
					}
					$Products=$Products.$row["ItemName"];
				}
				if($Products=="")
				{
					$Products="All Items";
				}
				$Message="Only for you. Apply coupon $CouponCode and get $Discount $CouponType on order above $MinOrderAmount. Applicable for $Products. Validity: $Validity. Terms and Conditions applied.";
			}
		}
		
		$url="http://book.24techsoft.com/api/sendmsg.php?user=ClassicDine&pass=Classic@123&sender=CLDINE&phone=".$ContactNo."&text=".str_replace(' ','%20',$Message)."&priority=ndnd&stype=normal";
		if(!($response  = file_get_contents($url)))
		{
			//echo "<script type='text/javascript'>alert ('Error');</script>";
			//header("location:Index.php?Error=1");
		}
		else
		{
			//echo "<script type='text/javascript'>alert ('Success');</script>";
		}
		redirect("CouponCustomers/index/$CouponID/0/25");
	}
	public function DeleteCouponCustomer()
	{
		$CouponID=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		$where="`ID`=$id";
		$this->CouponCustomerModel->DeleteCouponCustomer($where);
		redirect("CouponCustomers/index/$CouponID/0/25");
	}
}
?>
