<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Coupon extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model("CouponModel");
		$this->load->model("CouponProductModel");
		$this->load->model("CouponCustomerModel");
		$this->load->model("PartyModel");
		$this->load->model("CartModel");
		$this->load->model("MacModel");
		$this->load->model("WalletModel");
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
			$ID=$this->input->get("ID",true);
			if($ID!="")
			{
				$data["Coupon"]=$this->CouponModel->getSpecificCoupon("a.ID=$ID")[0];
				$data["ID"]=$ID;
			}
			else
			{
				$data["Coupon"]=array();
				$data["ID"]=0;
			}
			$data["partylist"]=$this->PartyModel->GetAllParties();
			$data["CouponList"]=$this->CouponModel->GetAllCoupons();
			//$this->load->view("admin/header");
			$this->load->view("admin/CouponMaster",$data);
		}
	}
	public function AddCoupon()
	{
		//ID,Name,ValidFrom,ValidTo,ValidTimeFrom,ValidTimeTo,Code,PartyID,UserLimit,Image,Detail,MinPrice,CouponType
		//ID,Name,ValidFrom,ValidTo,ValidTimeFrom,ValidTimeTo,Code,PartyID,UserLimit,Image,Detail,MinPrice,CouponType, DiscountType, DiscountAmount
		$ID=$this->input->get("ID",true);
		$Name = $this->input->post('Name', TRUE);
		$ValidFrom = $this->input->post('ValidFrom', TRUE);
		$ValidTo = $this->input->post('ValidTo', TRUE);
		$ValidTimeFrom = $this->input->post('ValidTimeFrom', TRUE);
		$ValidTimeTo = $this->input->post('ValidTimeTo', TRUE);
		$Code = $this->input->post('Code', TRUE);
		$PartyID = $this->input->post('PartyID', TRUE);
		$UserLimit = $this->input->post('UserLimit', TRUE);
		$Detail = $this->input->post('Detail', TRUE);
		$MinPrice = $this->input->post('MinPrice', TRUE);
		$CouponType = $this->input->post('CouponType', TRUE);
		$DiscountType=$this->input->post('DiscountType', TRUE);
		$DiscountAmount=$this->input->post('DiscountAmount', TRUE);
		$ext=$_FILES["image"]["name"];
		$ext=explode('.',$ext);
		$ext=end($ext);
		$rand=rand(0,9999999).".".$ext;
		$Image = "";
		echo "<script type='text/javascript'>alert('".$_FILES["image"]["name"]."');</script>";
		if($ext=="jpg" || $ext=="JPG" || $ext=="gif" || $ext=="GIF" || $ext=="png" || $ext=="PNG")
		{
			if(move_uploaded_file($_FILES["image"]["tmp_name"],"./Uploads/".$rand))
			{
				$Image=$rand;
				if($ID==0)
				{
					$data=array(
						'Name'=>$Name,
						'ValidFrom'=>$ValidFrom,
						'ValidTo'=>$ValidTo,
						'ValidTimeFrom'=>$ValidTimeFrom,
						'ValidTimeTo'=>$ValidTimeTo,
						'Code'=>$Code,
						'PartyID'=>$PartyID,
						'UserLimit'=>$UserLimit,
						'Image'=>$Image,
						'Detail'=>$Detail,
						'MinPrice'=>$MinPrice,
						'CouponType'=>$CouponType,
						'DiscountType'=>$DiscountType,
						'DiscountAmount'=>$DiscountAmount
					);
					$this->CouponModel->AddCoupon($data);
					$data["error"]=array("error"=>0,"Message"=>"Coupon Added");
				}
				else
				{
					$data="Name='$Name',ValidFrom='$ValidFrom', ValidTo='$ValidTo', ValidTimeFrom='$ValidTimeFrom', ValidTimeTo='$ValidTimeTo', Code='$Code', PartyID=$PartyID, UserLimit=$UserLimit, Image='$Image', Detail='$Detail', MinPrice=$MinPrice, CouponType=$CouponType, DiscountType=$DiscountType, DiscountAmount=$DiscountAmount";
					$where="ID=$ID";
					$this->CouponModel->UpdateCoupons($data,$where);
					$data["error"]=array("error"=>0,"Message"=>"Coupon Updated");
				}
				$data["CouponList"]=$this->CouponModel->GetAllCoupons();
				$this->load->view("admin/CouponMaster",$data);
			}
			else
			{
				$data["error"]=array("error"=>1,"Message"=>"Image not uploaded");
				$data["CouponList"]=$this->CouponModel->GetAllCoupons();
				$this->load->view("admin/CouponMaster",$data);
			}
		}
		else
		{
			if($ID!=0)
			{
				$data="Name='$Name',ValidFrom='$ValidFrom', ValidTo='$ValidTo', ValidTimeFrom='$ValidTimeFrom', ValidTimeTo='$ValidTimeTo', Code='$Code', PartyID=$PartyID, UserLimit=$UserLimit, Detail='$Detail', MinPrice=$MinPrice, CouponType=$CouponType, DiscountType=$DiscountType, DiscountAmount=$DiscountAmount";
				$where="ID=$ID";
				$this->CouponModel->UpdateCoupons($data,$where);
				$data["error"]=array("error"=>0,"Message"=>"Coupon Updated");
			}
			else
			{
				$data["error"]=array("error"=>2,"Message"=>"Incorrect image format");
			}
			$data["CouponList"]=$this->CouponModel->GetAllCoupons();
			$this->load->view("admin/CouponMaster",$data);
		}
		redirect("Coupon");
	}
	public function DeleteCoupon()
	{
		$id=$this->uri->segment(3);
		$where="`ID`=$id";
		$this->CouponModel->DeleteCoupons($where);
		$data["CouponList"]=$this->CouponModel->GetAllCoupons();
		redirect("Coupon");
	}
	public function getJsonCoupons()
	{
		$where ="CURRENT_DATE BETWEEN ValidFrom and ValidTo";
		$result=$this->CouponModel->getSpecificCoupon($where);
		$final=array();
		foreach($result as $row)
		{
			$customers=$this->CouponCustomerModel->getSpecificCouponCustomer("a.CouponID=".$row["ID"]);
			if(sizeof($customers)==0)
			{
				array_push($final,$row);
			}
		}
		$callback=$this->input->get("callback",true);
		if($callback=="" || $callback==null)
		{
			echo json_encode($final);
		}
		else
		{
			echo $callback."(".json_encode($final).")";
		}
	}
	public function getJsonSpecialCoupons()
	{
		$ip=$this->input->get("DeviceID",true);
		$where="IPAddress='$ip' and Status=1";
		$result=$this->WalletModel->GetLogInDetail($where);
		$coupons=array();
		if(sizeof($result)>0)
		{
			$CustomerID=$result[0]["ID"];
			$coupons=$this->CouponCustomerModel->GetCouponsByCustomer($CustomerID);
		}
		$callback=$this->input->get("callback",true);
		if($callback=="" || $callback==null)
		{
			echo json_encode($coupons);
		}
		else
		{
			echo $callback."(".json_encode($coupons).")";
		}		
	}
	/*Temporary Apply Coupon*/
	public function ApplyTempCoupon()
	{
		$IPAddress=$this->input->get("DeviceID",true);
		if($IPAddress=="")
		{
			if($ip=="")
			{
				$ip=getenv("REMOTE_ADDR");
			}
			$IPAddress=$ip;
		}
		$Message="";
		$CouponCode=$this->input->get("CouponCode",true);
		if($CouponCode=="")
		{
			$Message="Please type a coupon name";
		}
		else
		{
			$CouponID=0;
			$ValidFrom='';
			$ValidTo='';
			$ValidTimeFrom='';
			$ValidTimeTo='';
			$Code='';
			$PartyID=0;
			$Party='';
			$UserLimit=0;
			$MinPrice='';
			$CouponType=0;
			$DiscountType=0;
			$DiscountAmount=0;
			
			$DiscountableAmount=0;
			$CashBack=0;
			$Discount=0;
			$couponDetail=$this->CouponModel->getSpecificCoupon("a.Code='$CouponCode'");
			//$ip=$this->input->get("DeviceID",true);
			
			//echo $ip;
			$where="a.IPAddress='$IPAddress'";
			$CartItems=$this->CartModel->getSpecificCart($where);
			//echo json_encode($CartItems);
			$AllowedItems=array();
			if(sizeof($couponDetail)>0)
			{
				foreach($couponDetail as $row)
				{
					$CouponID=$row["ID"];
					$ValidFrom=$row["ValidFrom"];
					$ValidTo=$row["ValidTo"];
					$ValidTimeFrom=$row["ValidTimeFrom"];
					$ValidTimeTo=$row["ValidTimeTo"];
					$Code=$row["Code"];
					$PartyID=$row["PartyID"];
					$Party=$row["Party"];
					$UserLimit=$row["UserLimit"];
					$MinPrice=$row["MinPrice"];
					$CouponType=$row["CouponType"];
					$DiscountType=$row["DiscountType"];
					$DiscountAmount=$row["DiscountAmount"];
				}
				if(date("Y-m-d")>=$ValidFrom && date("Y-m-d")<=$ValidTo && date("G:i:s")>=$ValidTimeFrom && date("G:i:s")<=$ValidTimeTo)
				{
					$couponProducts=$this->CouponProductModel->getSpecificCouponProduct("a.CouponID=$CouponID");
					if(sizeof($couponProducts)>0)
					{
						
						foreach($couponProducts as $row)
						{
							$AllowedItems[]=$row["ProductID"];
						}
						foreach($CartItems as $row)
						{
							if(in_array($row["ManuID"],$AllowedItems))
							{
								//echo $DiscountableAmount;
								$DiscountableAmount=$DiscountableAmount+$row["TotalPrice"];
							}
						}
					}
					else
					{
						//echo $DiscountableAmount;
						foreach($CartItems as $row)
						{
							//echo $DiscountableAmount;
							$DiscountableAmount=$DiscountableAmount+$row["TotalPrice"];
						}
					}
					//echo json_encode($CartItems);
					if($DiscountableAmount>=$MinPrice)
					{
						//$ip=getenv('REMOTE_ADDR');
						$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$IPAddress'");
						$ApplicableCust=sizeof($this->CouponCustomerModel->getSpecificCouponCustomer("1"));
						if($ApplicableCust==0)
						{
							$ApplicableCust=1;
						}
						else
						{
							if(sizeof($LoginInfo)>0)
							{
								$ApplicableCust=sizeof($this->CouponCustomerModel->getSpecificCouponCustomer("CustomerID=".$LoginInfo[0]["ID"]));
							}
							else
							{
								$Message="This coupon is user specific. Please log in to continue applying";
							}
						}
						if($ApplicableCust==0)
						{
							$Message="This coupon is not valid for this user";
						}
						else
						{
							$amount=0;
							if($DiscountType==1)
							{
								$amount=$DiscountAmount;
							}
							else
							{
								$amount=($DiscountableAmount*$DiscountAmount)/100;
							}
							if($CouponType==1)
							{
								$Discount=$amount;
							}
							else
							{
								$CashBack=$amount;
							}
							$data=array("IPAddress"=>$IPAddress,
										"CouponCode"=>$CouponCode,
										"CouponDiscount"=>$Discount,
										"CouponCashback"=>$CashBack);
							$this->CouponModel->RemoveTempAppliedCoupon("IPAddress='$IPAddress'");
							$this->CouponModel->ApplyTemporaryCoupon($data);
							$Message="Coupon Applied Successfully";
						}
					}
					else
					{
						$Message="Either wrong items or less order";
					}
				}
				else
				{
					$Message="Not applicable currently";
				}
			}
			else
			{
				$Message="Invalid Coupon Code";
			}
		}
		$callback=$this->input->get("callback",true);
		if($callback=="" || $callback==null)
		{
			echo json_encode($Message);
		}
		else
		{
			echo $callback."(".json_encode($Message).")";
		}
	}
	/*Remove Temporary Applied Coupon*/
	public function DeleteTempCoupon()
	{
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$IPAddress=$ip;
		$where="IPAddress='$IPAddress'";
		$this->CouponModel->RemoveTempAppliedCoupon($where);
		$Message="Coupon Removed";
		$callback=$this->input->get("callback",true);
		if($callback=="" || $callback==null)
		{
			echo json_encode($Message);
		}
		else
		{
			echo $callback."(".json_encode($Message).")";
		}
	}
	/*Read Temporary Applied Coupon*/
	public function ReadTempAppliedCoupon()
	{
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$IPAddress=$ip;
		$where="IPAddress='$IPAddress'";
		$result=$this->CouponModel->ReadTempAppliedCoupon($where);
		$callback=$this->input->get("callback",true);
		if($callback=="" || $callback==null)
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback."(".json_encode($result).")";
		}
	}
}
?>
