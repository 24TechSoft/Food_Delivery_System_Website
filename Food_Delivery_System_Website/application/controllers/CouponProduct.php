<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CouponProduct extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model("CouponProductModel");
		$this->load->model("CouponModel");
		$this->load->model("MenuModel");
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
			$where="`CouponID`=$id";
			$data["AddedProductList"]=$this->CouponProductModel->getSpecificCouponProduct($where);
			$data["CouponData"]=$this->CouponModel->getSpecificCoupon("a.`ID`=$id");
			foreach($data["CouponData"] as $Coupon)
			{
				$partyid=$Coupon["PartyID"];
				$data["AllProductList"]=$this->MenuModel->getSpecificMenu("`PartyID`=$partyid");
			}
			//$this->load->view("admin/header");
			$this->load->view("admin/CouponItems",$data);
		}
	}
	public function AddCouponItem()
	{
		$CouponID=$this->uri->segment(3);
		//ID,CouponID,PartyID,ProductID
		$PartyID = $this->input->post('PartyID', TRUE);
		$ProductID = $this->input->post('Item', TRUE);
		foreach($ProductID as $Product)
		{
		$data=array(
					'CouponID'=>$CouponID,
					'PartyID'=>$PartyID,
					'ProductID'=>$Product,
				);
			$this->CouponProductModel->AddCouponProduct($data);
		}
		redirect("CouponProduct/index/$CouponID");
	}
	public function DeleteCouponItem()
	{
		$CouponID=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		$where="`ID`=$id";
		$this->CouponProductModel->DeleteCouponProduct($where);
		redirect("CouponProduct/index/$CouponID");
	}
}
?>
