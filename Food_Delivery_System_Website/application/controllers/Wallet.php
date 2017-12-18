<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Wallet extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		require_once( "application/third_party/Facebook/autoload.php" );
		$this->load->library('Facebook');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model("WalletModel");
		$this->load->model("MacModel");
		$this->load->model("CartModel");
		
		ini_set("allow_url_fopen", 1);
	}
	/*Facebook Login*/
	public function FacebookLoginDesktop()
	{
		$ip=getenv('REMOTE_ADDR');
		$EmailID=$this->input->post("UserID",true);
		$FullName=$this->input->post("FullName",true);
		$Password=substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"),0,8);
		$Password=md5($Password);
		$where="EmailID='$EmailID'";
		$result=$this->WalletModel->GetUserDetail($where);
		if(sizeof($result)>0)
		{
			foreach($result as $row)
			{
				$where="IPAddress='$ip'";
				$this->WalletModel->DismisLogin($where);
				$data=array("CustomerID"=>$row["ID"],"IPAddress"=>$ip,"Status"=>1);
				$this->WalletModel->AddLogIn($data);
			}
		}
		else
		{
			$data=array("FullName"=>$FullName,"MobileNo"=>'',"EmailID"=>$EmailID,"UserID"=>$EmailID,"Password"=>$Password);
			$this->WalletModel->AddUser($data);
			$where="EmailID='$EmailID')";
			$result=$this->WalletModel->GetUserDetail($where);
			foreach($result as $row)
			{
				$where="IPAddress='$ip'";
				$this->WalletModel->DismisLogin($where);
				$data=array("CustomerID"=>$row["ID"],"IPAddress"=>$ip,"Status"=>1);
				$this->WalletModel->AddLogIn($data);
			}
		}
		
	}
	//Facebook login App
	public function FacebookLoginApp()
	{
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$EmailID=$this->input->get("UserID",true);
		$FullName=$this->input->get("FullName",true);
		$Password=substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"),0,8);
		$Password=md5($Password);
		$where="EmailID='$EmailID'";
		$result=$this->WalletModel->GetUserDetail($where);
		if(sizeof($result)>0)
		{
			foreach($result as $row)
			{
				$where="IPAddress='$ip'";
				$this->WalletModel->DismisLogin($where);
				$data=array("CustomerID"=>$row["ID"],"IPAddress"=>$ip,"Status"=>1);
				$this->WalletModel->AddLogIn($data);
			}
		}
		else
		{
			$data=array("FullName"=>$FullName,"MobileNo"=>'',"EmailID"=>$EmailID,"UserID"=>$EmailID,"Password"=>$Password,"Status"=>1);
			$this->WalletModel->AddUser($data);
			$where="EmailID='$EmailID')";
			$result=$this->WalletModel->GetUserDetail($where);
			foreach($result as $row)
			{
				$where="IPAddress='$ip'";
				$this->WalletModel->DismisLogin($where);
				$data=array("CustomerID"=>$row["ID"],"IPAddress"=>$ip,"Status"=>1);
				$this->WalletModel->AddLogIn($data);
			}
		}
		$Message="Success";
		$callback=$this->input->get("callback",true);
		echo $callback."(".json_encode($Message).")";
	}
	/*Customer*/
	public function LogIn()
	{
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$UserID=$this->input->get("UserID",true);
		$Password=md5($this->input->get("Password",true));
		$callback=$this->input->get("callback",true);
		//$UserID=$this->input->post("UserID",true);
		//$Password=md5($this->input->post("Password",true));
		$where="Password='$Password' and (UserID='$UserID' or MobileNo='$UserID' or EmailID='$UserID') and Status=1";
		$result=$this->WalletModel->GetUserDetail($where);
		if(sizeof($result)>0)
		{
			foreach($result as $row)
			{
				$where="IPAddress='$ip'";
				$this->WalletModel->DismisLogin($where);
				$data=array("CustomerID"=>$row["ID"],"IPAddress"=>$ip,"Status"=>1);
				$this->WalletModel->AddLogIn($data);
			}
		}
		if($callback=="" || $callback==null)
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback."(".json_encode($result).")";
		}
	}
	public function LogInWeb()
	{
		$ip=getenv('REMOTE_ADDR');
		$UserID=$this->input->post("UserID",true);
		$Password=md5($this->input->post("Password",true));
		$where="Password='$Password' and (UserID='$UserID' or MobileNo='$UserID' or EmailID='$UserID') and Status=1";
		$result=$this->WalletModel->GetUserDetail($where);
		if(sizeof($result)>0)
		{
			foreach($result as $row)
			{
				$where="IPAddress='$ip'";
				$this->WalletModel->DismisLogin($where);
				$data=array("CustomerID"=>$row["ID"],"IPAddress"=>$ip,"Status"=>1);
				$this->WalletModel->AddLogIn($data);
				redirect("Home/index");
			}
		}
		else
		{
			redirect("Home/SignIn?Error=2");
		}
	}
	
	public function Logout()
	{
		$this->facebook->destroy_session();
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$where="IPAddress='$ip'";
		$this->WalletModel->DismisLogin($where);
		$callback=$this->input->get("callback",true);
		$this->CartModel->DeleteCart("IPAddress='$ip'");
		$result="Logout Successfully";
		if($this->input->get("DeviceID",true)!="")
		{
			if($callback=="" || $callback==null)
			{
				echo json_encode($result);
			}
			else
			{
				echo $callback."(".json_encode($result).")";
			}
		}
		else
		{
			redirect("Home");
		}
	}
	public function CheckPreviousLogin()
	{
		$callback=$this->input->get("callback",true);
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$where="IPAddress='$ip' and Status=1";
		$result=$this->WalletModel->GetLogInDetail($where);
		if($callback=="" || $callback==null)
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback."(".json_encode($result).")";
		}
	}
	public function AddCustomer()
	{
		$FullName=$this->input->post("FullName",true); 
		$UserID=$this->input->post("UserName",true); 
		$EmailID=$this->input->post("EmailID",true); 
		$MobileNo=$this->input->post("PhoneNo",true); 
		$Password=md5($this->input->post("newPassword",true)); 
		$result=$this->WalletModel->GetUserDetail("UserID='$UserID' or EmailID='$EmailID' or MobileNo='$MobileNo'");
		if(sizeof($result)==0)
		{
			$data=array("FullName"=>$FullName,"MobileNo"=>$MobileNo,"EmailID"=>$EmailID,"UserID"=>$UserID,"Password"=>$Password);
			$this->WalletModel->AddUser($data);
			$result=$this->WalletModel->GetUserDetail("MobileNo='$MobileNo' or EmailID='$EmailID' or UserID='$UserID'");
			if($MobileNo!="")
			{
				$url="http://book.24techsoft.com/api/sendmsg.php?user=ClassicDine&pass=Classic@123&sender=CLDINE&phone=".$MobileNo."&text=".str_replace(' ','%20','Dear '.$FullName.',your account has been created. Please follow the link to confirm your account:http://www.classicdine.com/Wallet/ConfirmAccount/'.$result[0]["ID"].'/'.$result[0]["Password"])."&priority=ndnd&stype=normal";
				if(!($response  = file_get_contents($url)))
				{
					//echo "<script type='text/javascript'>alert ('Error');</script>";
					//header("location:Index.php?Error=1");
				}
				else
				{
					//echo "<script type='text/javascript'>alert ('Success');</script>";
				}
				$this->WalletModel->SendMail("Account Created",'Dear '.$FullName.',your account has been created. Please follow the link to confirm your account:http://www.classicdine.com/Wallet/ConfirmAccount/'.$result[0]["ID"].'/'.$result[0]["Password"],$EmailID,'info@classicdine.com','','');
			}
			echo json_encode($result);
			redirect("Home/SignIn?Error=0");
		}
		else
		{
			redirect("Home/SignIn?Error=1");
		}
	}
	public function ConfirmAccount()
	{
		$ID=$this->uri->segment(3);
		$Password=$this->uri->segment(4);
		$data="Status=1";
		$where="ID=$ID and Password='$Password'";
		$result=$this->WalletModel->GetUserDetail("ID=$ID and Password='$Password' and Status=0");
		if(sizeof($result)>0)
		{
			$this->WalletModel->UpdateUser($data,$where);
			echo "<script type='text/javascript'>alert('Your account is activated. Please login to continue.');</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('The URL is not valid.');</script>";
		}
		redirect("Home/SignIn");
	}
	public function AddCustomerJson()
	{
		$callback=$this->input->get("callback",true);
		$FullName=$this->input->get("FullName",true); 
		$UserID=$this->input->get("UserID",true); 
		$EmailID=$this->input->get("EmailID",true); 
		$MobileNo=$this->input->get("MobileNo",true); 
		$Password=md5($this->input->get("Password",true)); 
		$result=$this->WalletModel->GetUserDetail("UserID='$UserID' or EmailID='$EmailID' or MobileNo='$MobileNo'");
		//echo json_encode($result);
		if(sizeof($result)==0)
		{
			$data=array("FullName"=>$FullName,"MobileNo"=>$MobileNo,"EmailID"=>$EmailID,"UserID"=>$UserID,"Password"=>$Password);
			$this->WalletModel->AddUser($data);
			$result=$this->WalletModel->GetUserDetail("MobileNo='$MobileNo' or EmailID='$EmailID' or UserID='$UserID'");
			if($MobileNo!="")
			{
				$url="http://book.24techsoft.com/api/sendmsg.php?user=ClassicDine&pass=Classic@123&sender=CLDINE&phone=".$MobileNo."&text=".str_replace(' ','%20','Dear '.$FullName.',your account has been created. Please follow the link to confirm your account:http://www.classicdine.com/Wallet/ConfirmAccount/'.$result[0]["ID"].'/'.$result[0]["Password"])."&priority=ndnd&stype=normal";
				if(!($response  = file_get_contents($url)))
				{
					//echo "<script type='text/javascript'>alert ('Error');</script>";
					//header("location:Index.php?Error=1");
				}
				else
				{
					//echo "<script type='text/javascript'>alert ('Success');</script>";
				}
			}
			echo $callback."(".json_encode(array("Error"=>0,"Message"=>"Success")).")";
		}
		else
		{
			echo $callback."(".json_encode(array("Error"=>1,"Message"=>"Already Exist")).")";
		}
	}
	public function UpdateCustomer()
	{
		$ID=$this->uri->segment(3);
		$FullName=$this->input->post("FullName",true); 
		$MobileNo=$this->input->post("MobileNo",true);
		$EmailID=$this->input->post("EmailID",true);
		$UserID=$this->input->post("UserID",true);
		$Password =md5($this->input->post("Password",true));
		$data="FullName='$FullName',MobileNo='$MobileNo,EmailID='$EmailID',UserID='$UserID'";
		$where="ID=$ID";
		$this->WalletModel->UpdateUser($data,$where);
	}
	public function UpdatePassword()
	{
		$ip=getenv('REMOTE_ADDR');
		$ID=$this->uri->segment(3);
		$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$ip' and Status=1");
		$OldPass=md5($this->input->post("OldPass",true)); 
		$NewPass=md5($this->input->post("NewPass",true));
		$ConPass=md5($this->input->post("ConPass",true));
		$where="Password='$OldPass' and ID=".$LoginInfo[0]["ID"]."";
		$result=$this->WalletModel->GetUserDetail($where);
		if(sizeof($result)>0)
		{
			$data="Password='$NewPass'";
			$where="ID=".$LoginInfo[0]["ID"]."";
			$this->WalletModel->UpdateUser($data,$where);
			echo json_encode("Password Changed");
		}
		else
		{
			echo json_encode("Incorrect old password");
		}
	}
	public function ResetPassword()
	{
		$ip=getenv('REMOTE_ADDR');
		$ID=$this->input->get("ID",true);
		$OldPass=$this->input->get("Token",true);
		$NewPass=md5($this->input->post("NewPassword",true));
		$ConPass=md5($this->input->post("ConPassword",true));
		$result=$this->WalletModel->GetUserDetail("ID=$ID and Password='$OldPass'");
		if(sizeof($result)>0)
		{
			if($result[0]["Status"]==2)
			{
				$this->WalletModel->UpdateUser("Password='$NewPass', Status=1","ID=$ID");
				$data=array("CustomerID"=>$ID,"IPAddress"=>$ip,"Status"=>1);
				$where="CustomerID=$ID";
				$this->WalletModel->DismisLogin($where);
				$this->WalletModel->AddLogIn($data);
				redirect("Home/index");
			}
			else
			{
				echo "The link is expired";
			}
		}
		else
		{
			echo "You're not autherized";
		}
	}
	public function UpdatePasswordJson()
	{
		$ID=$this->input->get("ID",true);
		$OldPass=md5($this->input->get("OldPass",true)); 
		$NewPass=md5($this->input->get("NewPass",true));
		$ConPass=md5($this->input->get("ConPass",true));
		$where="Password='$OldPass' and ID='$ID'";
		$result=$this->WalletModel->GetUserDetail($where);
		$Message="";
		if(sizeof($result)>0)
		{
			$data="Password='$NewPass'";
			$where="ID=$ID";
			$this->WalletModel->UpdateUser($data,$where);
			$Message="Password Changed";
		}
		else
		{
			$Message="Incorrect old password";
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
	public function GetUserDataByID()
	{
		$ID=$this->input->get("ID",true);
		$callback=$this->input->get("callback",true);
		$where="ID=$ID";
		$result=$this->WalletModel->GetUserDetail($where);
		echo json_encode($result);
	}
	/*Customer Address*/
	public function AddAddress()
	{
		$CustomerID=$this->input-post("CustomerID",true);
		$HouseNo=$this->input-post("HouseNo",true);
		$Street=$this->input-post("Street",true);
		$Location=$this->input-post("Location",true);
		$City=$this->input-post("City",true);
		$PinCode=$this->input-post("PinCode",true);
		$State =$this->input-post("State",true);
		$data=array("CustomerID"=>$CustomerID,"HouseNo"=>$HouseNo,"Street"=>$Street,"Location"=>$Location,"City"=>$City,"PinCode"=>$PinCode,"State"=>$State);
		$this->WalletModel->AddAddress($data);
	}
	public function DeleteAddress()
	{
		$ID=$this->input->get("ID",True);
		$where="ID=$ID";
		$this->WalletModel->DeleteAddress($where);
		$result="Deleted";
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
	public function GetAddressByCustomer()
	{
		$CustomerID=$this->input->get("CustomerID",True);
		$where="CustomerID=$CustomerID";
		$result=$this->WalletModel->GetAddress($where);
		$callback=$this->input->get("callback",true);
		if($callback=="")
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback.'('.json_encode($result).')';
		}
	}
	public function GetAddressByID()
	{
		$ID=$this->input->get("ID",true);
		$where="ID=$ID";
		$result=$this->WalletModel->GetAddress($where);
		$callback=$this->input->get("callback",true);
		if($callback=="")
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback.'('.json_encode($result).')';
		}
	}
	/*Wallet*/
	public function SaveWallet()
	{
		$data=array("EntryDate"=>$EntryDate,"CustomerID"=>$CustomerID,"EntryType"=>$EntryType,"Amount"=>$Amount,"Description"=>$Description);
		$this->WalletModel->SaveWallet($data);
	}
	public function GetWalletDetail()
	{
		$CustomerID=$this->uri->segment(3);
		$DateFrom=$this->input->post("DateFrom",true);
		$DateTo=$this->input->post("DateTo",true);
		$where="CustomerID=$CustomerID and EntryDate between '$DateFrom' and '$DateTo'";
		$result=$this->WalletModel->GetWallet($where);
		echo json_encode($result);
	}
	public function GetWalletBalance()
	{
		$CustomerID=$this->input->get("CustomerID",true);
		$result=$this->WalletModel->WalletBalance($CustomerID);
		$callback=$this->input->get("callback",true);
		if($callback=="")
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback.'('.json_encode($result).')';
		}
	}
}
?>