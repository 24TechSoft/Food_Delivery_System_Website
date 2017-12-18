<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menu extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model("MenuModel");
		$this->load->model("PartyModel");
		$this->load->model("MacModel");
	}
	public function index()
	{
		$ID=$this->input->get("MenuID",true);
		$cookieData="";
		$data["Detail"]=null;
		$cookieData = $this->input->cookie('UserData', TRUE);
		if($cookieData=="")
		{
			$this->load->view("admin/login");
		}
		else
		{
			//$ID=$this->uri->segment(3);
			$Category=$this->uri->segment(4);
			$Category=str_replace("%20"," ",$Category);
			$data["Detail"]=null;
			if($ID=="")
			{
				$ID=0;
			}
			else
			{
				$data["Detail"]=$this->MenuModel->getSpecificMenu("ID=$ID");
				//echo json_encode($data["Detail"]);
			}
			$PartyID=$this->uri->segment(3);
			$where="`PartyID`=$PartyID";
			
			
			$data["CatList"]=$this->MenuModel->getCategory("1");
			$data["SelectedCategory"]=$Category;
			$data["SubCatList"]=$this->MenuModel->getSubCategory("1");
			if($Category=="" || $Category==null)
			{
				$data["MenuList"]=$this->MenuModel->getSpecificMenu($where);
			}
			else
			{
				$data["MenuList"]=$this->MenuModel->getSpecificMenu($where." and Category='$Category'");
			}
			$data["PartyList"]=$this->PartyModel->GetAllParties();
			$data["PartyID"]=$PartyID;
			//$this->load->view("admin/header");
			$this->load->view("admin/MenuMaster",$data);
		}
	}
	public function AddMenu()
	{
		//	PartyID Category	ItemName	ItemDescription	HalfPrice	FullPrice	Image	Availability	PartyCode
		$PartyID=$this->uri->segment(3);
		$ID=$this->uri->segment(4);
		if($ID=="")
		{
			$ID=0;
		}
		$Category = $this->input->post('Category', TRUE);
		$SubCategory = $this->input->post('SubCategory', TRUE);
		$ItemName = $this->input->post('ItemName', TRUE);
		$ItemDescription = $this->input->post('ItemDescription', TRUE);
		$HalfPrice = $this->input->post('HalfPrice', TRUE);
		$FullPrice = $this->input->post('FullPrice', TRUE);
		$Availability = $this->input->post('Availability', TRUE);
		$ItemType = $this->input->post('ItemType', TRUE);
		if($Availability=="" || $Availability==null)
		{
			$Availability=0;
		}
		if($ItemType=="" || $ItemType==null)
		{
			$ItemType=0;
		}
		$SerialNo = $this->input->post('SerialNo', TRUE);
		$PartyCode = "";
		$ext=$_FILES["image"]["name"];
		$ext=explode(".",$ext);
		$ext=end($ext);
		$rand=rand(0,9999999).".".$ext;
		$Image = $this->input->post("hdPhoto",true);

		if($ext=="jpg" || $ext=="JPG" || $ext=="gif" || $ext=="GIF" || $ext=="png" || $ext=="PNG" || $ext=="jpeg" || $ext=="JPEG")
		{
			if(move_uploaded_file($_FILES["image"]["tmp_name"],"./Uploads/".$rand))
			{
				$Image=$rand;
				if($ID==0)
					{$data=array(
						'PartyID'=>$PartyID,
						'Category'=>$Category,
						'SubCategory'=>$SubCategory,
						'ItemName'=>$ItemName,
						'ItemDescription'=>$ItemDescription,
						'HalfPrice'=>$HalfPrice,
						'FullPrice'=>$FullPrice,
						'Image'=>$Image,
						'Availability'=>$Availability,
						'ItemType'=>$ItemType,
						'PartyCode'=>$PartyCode,
						'SerialNo'=>$SerialNo,
					);
					$this->MenuModel->AddMenu($data);
					$data["error"]=array("error"=>0,"Message"=>"Party Added",);
				}
			}
			else
			{
				$data["error"]=array("error"=>1,"Message"=>"Image not uploaded",);
			}
		}
		else
		{
			$data["error"]=array("error"=>2,"Message"=>"Incorrect image format",);
		}
		if($ID!=0)
		{
			$data="Category='$Category',SubCategory='$SubCategory',ItemName='$ItemName',ItemDescription='$ItemDescription',HalfPrice=$HalfPrice,FullPrice=$FullPrice,Image='$Image',Availability=$Availability,SerialNo=$SerialNo,ItemType=$ItemType";
			$where="ID=$ID";
			$this->MenuModel->UpdateMenu($data,$where);
		}
		redirect("Menu/index/$PartyID/$Category");
	}
	public function DeleteMenu()
	{
		$id=$this->uri->segment(4);
		$where="`ID`=$id";
		$this->MenuModel->DeleteMenu($where);
		redirect("Menu/index/".$this->uri->segment(3));
	}
	public function UpdateMenu()
	{
		//	PartyID	ItemName	ItemDescription	HalfPrice	FullPrice	Image	Availability	PartyCode
		$id=$this->uri->segment(3);
		$ItemName = $this->input->post('ItemName', TRUE);
		$ItemDescription = $this->input->post('ItemDescription', TRUE);
		$HalfPrice = $this->input->post('HalfPrice', TRUE);
		$FullPrice = $this->input->post('FullPrice', TRUE);
		$Availability = $this->input->post('Availability', TRUE);
		$ItemType = $this->input->post('ItemType', TRUE);
		if($Availability=="")
		{
			$Availability=0;
		}
		$data="`ItemName`=$ItemName,`ItemDescription`='$ItemDescription',`HalfPrice`='$HalfPrice',`FullPrice`='$FullPrice',`Availability`=$Availability,ItemType=$ItemType";
		$where="`ID`=$id";
		$this->MenuModel->UpdateMenu($data,$where);
		$data["error"]=array("error"=>0,"Message"=>"Menu Updated");
		$id=$this->uri->segment(3);
		$where="`PartyID`=$id";
		$data["Menulist"]=$this->MenuModel->getSpecificMenu($where);
		redirect("Menu/index/$PartyID");
	}
	/*Category*/
	public function Category()
	{
		$ID=$this->uri->segment(3);
		if($ID=="")
		{
			$ID=0;
		}
		$data["Detail"]=$this->MenuModel->getCategory("ID=$ID");
		$data["CatList"]=$this->MenuModel->getCategory("1");
		//$this->load->view("admin/header");
		$this->load->view("admin/Category",$data);
	}
	public function AddCategory()
	{
		$ID=$this->uri->segment(3);
		if($ID=="")
		{
			$ID=0;
		}
		$SerialNo=$this->input->post("SerialNo",true);
		$CName=$this->input->post("CName",true);
		$CDescription=$this->input->post("CDescription",true);
		$ext=explode(".",$_FILES["Photo"]["name"]);
		$ext=end($ext);
		$ran=rand(000001,9999999).".".$ext;
		$Photo=$this->input->post("hdPhoto",true);
		if($ext=="JPG" || $ext=="jpg" || $ext=="PNG" || $ext=="png")
		{	
			if(move_uploaded_file($_FILES["Photo"]["tmp_name"],"./Uploads/".$ran))
			{
				$Photo=$ran;
				if($ID==0)
				{
					$data=array("SerialNo"=>$SerialNo,"CName"=>$CName,"CDescription"=>$CDescription,"Photo"=>$Photo);
					$this->MenuModel->AddCategory($data);
				}
			}
		}
		if($ID!=0)
		{
			$data="SerialNo=$SerialNo,CName='$CName',CDescription='$CDescription',Photo='$Photo'";
			$where="ID=$ID";
			$this->MenuModel->UpdateCategory($data,$where);
		}
		redirect("Menu/Category");
	}
	public function DeleteCategory()
	{
		$ID=$this->uri->segment(3);
		$where="ID=$ID";
		$this->MenuModel->DeleteCategory($where);
		redirect("Menu/Category");
	}
	public function GetJsonCategories()
	{
		$callback=$this->input->get("callback",true);
		$ID=$this->input->get("ID",TRUE);
		if($ID!="" && $ID!=null)
		{
			$result=$this->MenuModel->getCategory("ID=$ID");
		}
		else
		{
			$result=$this->MenuModel->getCategory("1");
		}
		if($callback=="")
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback.'('.json_encode($result).')';
		}
	}
	/*Sub Categories*/
	public function SubCategory()
	{
		$ID=$this->uri->segment(4);
		$data["Detail"]=null;
		if($ID!="")
		{
			$data["Detail"]=$this->MenuModel->getSubCategory("ID=$ID");
		}
		$CategoryID=$this->uri->segment(3);
		if($CategoryID=="")
		{
			$CategoryID=0;
		}
		$CategoryDetail=$this->MenuModel->getCategory("ID=$CategoryID");
		$data["CategoryName"]="";
		foreach($CategoryDetail as $row)
		{
			$data["CategoryName"]=$row["CName"];
		}
		$data["CategoryID"]=$CategoryID;
		$data["SubCatList"]=$this->MenuModel->getSubCategory("CategoryID=$CategoryID");
		//$this->load->view("admin/header");
		$this->load->view("admin/SubCategory",$data);
	}
	public function AddSubCategory()
	{
		$ID=$this->uri->segment(4);
		$CategoryID=$this->uri->segment(3);
		$SubCategory=$this->input->post("SubCategory",true);
		$ext=explode(".",$_FILES["Photo"]["name"]);
		$ext=end($ext);
		$ran=rand(000001,9999999).".".$ext;
		$Photo=$this->input->post("hdPhoto",true);;
		if($ext=="JPG" || $ext=="jpg" || $ext=="PNG" || $ext=="png")
		{	
			if(move_uploaded_file($_FILES["Photo"]["tmp_name"],"./Uploads/".$ran))
			{
				$Photo=$ran;
				if($ID=="")
				{
					$data=array("CategoryID"=>$CategoryID,"SubCategory"=>$SubCategory,"Photo"=>$Photo);
					$this->MenuModel->AddSubCategory($data);
				}
			}
		}
		if($ID!="")
		{
			$data="SubCategory='$SubCategory',Photo='$Photo'";
			$where="ID=$ID";
			$this->MenuModel->UpdateSubCategory($data,$where);
		}
		redirect("Menu/SubCategory/$CategoryID");
	}
	public function DeleteSubCategory()
	{
		$CategoryID=$this->uri->segment(3);
		$ID=$this->uri->segment(4);
		$where="ID=$ID";
		$this->MenuModel->DeleteSubCategory($where);
		redirect("Menu/SubCategory/$CategoryID");
	}
	public function GetJsonSubCategories()
	{
		$callback=$this->input->get("callback",true);
		$CategoryID=$this->input->get("Category",true);
		if($CategoryID=="")
		{
			$CategoryID=0;
		}
		$result=$this->MenuModel->getSubCategory("a.CategoryID=$CategoryID");
		if($callback=="")
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback.'('.json_encode($result).')';
		}
	}
	//Special Menu
	public function SpecialMenu()
	{
		$EntryType=$this->uri->segment(3);
		$data["EntryType"]=$EntryType;
		$data["AddedItems"]=$this->MenuModel->GetSpecialMenu("a.EntryType=$EntryType");
		$data["FullMenu"]=$this->MenuModel->GetAllMenu();
		$this->load->view("admin/SpecialMenu",$data);
	}
	public function SaveSpecialMenu()
	{
		$MenuID=$this->input->post("MenuID",true);
		echo json_encode($MenuID);
		$EntryType=$this->input->post("EntryType",true);
		$AddedCount=$this->uri->segment(3);
		foreach($MenuID as $ID)
		{
			if($AddedCount==4)
			{
				break;
			}
			$where="a.MenuID=$ID and a.EntryType=$EntryType";
			$result=$this->MenuModel->GetSpecialMenu($where);
			if(sizeof($result)==0)
			{
				$data=array("MenuID"=>$ID,"EntryType"=>$EntryType);
				$this->MenuModel->AddSpecialItem($data);
				$AddedCount++;
			}
		}
		echo "<script>alert('$AddedCount items are added');</script>";
		redirect("menu/SpecialMenu/$EntryType");
	}
	public function DeleteSpecialMenu()
	{
		$ID=$this->input->get("ID",true);
		$EntryType=$this->input->get("EntryType",true);
		$this->MenuModel->DeleteSpecialItem("ID=$ID");
		redirect("menu/SpecialMenu/$EntryType");
	}
}
?>
