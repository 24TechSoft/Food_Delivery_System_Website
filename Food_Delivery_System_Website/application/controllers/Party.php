<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Party extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		$this->load->helper('url');
		$this->load->model("PartyModel");
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
			$data["partylist"]=$this->PartyModel->GetAllParties();
			$this->load->view("admin/PartyMaster",$data);
		}
	}
	public function AddParty()
	{
		$PartyType = $this->input->post('PartyType', TRUE);
		$Name = $this->input->post('Name', TRUE);
		$Location = $this->input->post('Location', TRUE);
		$Phone = $this->input->post('Phone', TRUE);
		$Email = $this->input->post('Email', TRUE);
		$Address = $this->input->post('Address', TRUE);
		$PartyCode = $this->input->post('PartyCode', TRUE);
		$ext=$_FILES["Logo"]["name"];
		$ext=explode('.',$ext);
		$ext=end($ext);
		$rand=rand(0,9999999).".".$ext;
		$Logo = $rand;
		if($ext=="jpg" || $ext=="JPG" || $ext=="gif" || $ext=="GIF" || $ext=="png" || $ext=="PNG")
		{
			if(move_uploaded_file($_FILES["Logo"]["tmp_name"],"./Uploads/".$rand))
			{
				$data=array(
					'PartyType'=>$PartyType,
					'Name'=>$Name,
					'Location'=>$Location,
					'Phone'=>$Phone,
					'Email'=>$Email,
					'Address'=>$Address,
					'PartyCode'=>$PartyCode,
					'Logo'=>$Logo,
				);
				$this->PartyModel->AddParty($data);
				$data["error"]=array("error"=>0,"Message"=>"Party Added");
				$data["partylist"]=$this->PartyModel->GetAllParties();
				$this->load->view("admin/PartyMaster",$data);
				echo "<script type='text/javascript'>alert('Saved');</script>";
			}
			else
			{
				$data["error"]=array("error"=>1,"Message"=>"Image not uploaded");
				$data["partylist"]=$this->PartyModel->GetAllParties();
				$this->load->view("admin/PartyMaster",$data);
				echo "<script type='text/javascript'>alert('Image Upload failed');</script>";
			}
		}
		else
		{
			$data["error"]=array("error"=>2,"Message"=>"Incorrect image format");
			$data["partylist"]=$this->PartyModel->GetAllParties();
			$this->load->view("admin/PartyMaster",$data);
			echo "<script type='text/javascript'>alert('Image format".$ext."');</script>";
		}
		redirect("Party");
	}
	public function DeleteParty()
	{
		$id=$this->uri->segment(3);
		$where="`ID`=$id";
		$this->PartyModel->DeleteParty($where);
		$data["partylist"]=$this->PartyModel->GetAllParties();
		$this->load->view("admin/PartyMaster",$data);
	}
	public function UpdateParty()
	{
		$id=$this->uri->segment(3);
		$PartyType = $this->input->post('PartyType', TRUE);
		$Name = $this->input->post('Name', TRUE);
		$Location = $this->input->post('Location', TRUE);
		$Phone = $this->input->post('Phone', TRUE);
		$Email = $this->input->post('Email', TRUE);
		$Address = $this->input->post('Address', TRUE);
		$PartyCode = $this->input->post('PartyCode', TRUE);
		$data="`PartyType`=$PartyType,`Name`='$Name',`Location`='$Location',`Phone`='$Phone',`Email`='$Email',`Address`='$Address',`PartyCode`='$PartyCode'";
		$where="`ID`=$id";
		$this->PartyModel->UpdateParty($data,$where);
		redirect("Party");
	}
	public function DeactivateParty()
	{
		$id=$this->uri->segment(3);
		$data="`Status`=0";
		$where="`ID`=$id";
		$this->PartyModel->UpdateParty($data,$where);
		redirect("Party");
	}
	public function ActiveParty()
	{
		$id=$this->uri->segment(3);
		$data="`Status`=1";
		$where="`ID`=$id";
		$this->PartyModel->UpdateParty($data,$where);
		redirect("Party");
	}
}
?>
