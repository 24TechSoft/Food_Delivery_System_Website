<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Others extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model("MenuModel");
		$this->load->model("CouponModel");
		$this->load->model("CartModel");
		$this->load->model("OrderModel");
		$this->load->model("other_model");
		$this->load->model("MacModel");
	}
	public function Deliveryboys()
	{
		$ID=$this->input->get("ID",TRUE);
		$cookieData="";
		$cookieData = $this->input->cookie('UserData', TRUE);
		if($cookieData=="")
		{
			redirect("User");
		}
		else
		{
			//$this->load->view("admin/header");
			$data["DeliveryBoys"]=$this->other_model->GetAllDeliveryBoy(1);
			$data["DeliveryBoy"]=[];
			if($ID!="")
			{
				$data["DeliveryBoy"]=$this->other_model->GetAllDeliveryBoy("ID=$ID");
			}
			$this->load->view("admin/deliveryboy",$data);
		}
	}
	public function AddDeliveryBoy()
	{
		$ID=$this->input->get("ID",true);
		$Name=$this->input->post("Name",true);
		$PhoneNo=$this->input->post("PhoneNo",true);
		if($ID!="")
		{
			$this->other_model->UpdateDeliveryBoy("Name='$Name',PhoneNo='$PhoneNo'","ID=$ID");
		}
		else
		{
			$this->other_model->SaveDeliveryBoy(array("Name"=>$Name,"PhoneNo"=>$PhoneNo));
		}
		redirect("Others/DeliveryBoys");
	}
	public function DeleteDeliveryBoy()
	{
		$ID=$this->input->get("ID",true);
		$this->other_model->DeleteDeliveryBoy("ID=$ID");
		redirect("Others/DeliveryBoys");
	}
	
	public function AreaMaster()
	{
		$ID=$this->input->get("ID",TRUE);
		$cookieData="";
		$cookieData = $this->input->cookie('UserData', TRUE);
		if($cookieData=="")
		{
			redirect("User");
		}
		else
		{
			//$this->load->view("admin/header");
			$data["Places"]=$this->other_model->GetAllPlaces(1);
			$data["Place"]=[];
			if($ID!="")
			{
				$data["Place"]=$this->other_model->GetAllPlaces("ID=$ID");
			}
			$this->load->view("admin/areas",$data);
		}
	}
	public function AddArea()
	{
		$ID=$this->input->get("ID",true);
		$PlaceName=$this->input->post("PlaceName",true);
		$Pincode=$this->input->post("Pincode",true);
		$MinOrderPrice=$this->input->post("MinOrderPrice",true);
		$DeliveryCharge=$this->input->post("DeliveryCharge",true);
		if($ID!="")
		{
			$this->other_model->UpdateArea("PlaceName='$PlaceName',Pincode='$Pincode', MinOrderPrice=$MinOrderPrice,DeliveryCharge=$DeliveryCharge","ID=$ID");
		}
		else
		{
			$this->other_model->SaveArea(array("PlaceName"=>$PlaceName,"Pincode"=>$Pincode,"MinOrderPrice"=>$MinOrderPrice,"DeliveryCharge"=>$DeliveryCharge));
		}
		redirect("Others/AreaMaster");
	}
	public function DeletePlace()
	{
		$ID=$this->input->get("ID",true);
		$this->other_model->DeletePlace("ID=$ID");
		redirect("Others/AreaMaster");
	}
	public function GetArea()
	{
		$PinCode=$this->input->get("PinCode",true);
		$callback=$this->input->get("callback",true);
		$where=1;
		if($PinCode!="")
		{
			$where="PinCode='$PinCode'";
		}
		$result=$this->other_model->GetAllPlaces($where);
		if($callback=="")
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback."(".json_encode($result).")";
		}
	}
	/*Turn Website on and Off*/
	public function ToggleWebsiteStatus()
	{
		$Status=$this->input->get("Status",true);
		$this->other_model->ToggleWebsiteStatus("Status=$Status");
	}
	public function GetStatus()
	{
		$callback=$this->input->get("callback",true);
		$result=$this->other_model->GetWebsiteStatus();
		if($callback=="")
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