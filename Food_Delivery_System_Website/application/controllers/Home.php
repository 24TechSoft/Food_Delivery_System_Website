<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		require_once( "application/third_party/Facebook/autoload.php" );
		$this->load->helper('url');
		$this->load->library('Facebook');
		$this->load->helper('cookie');
		$this->load->model("MenuModel");
		$this->load->model("CouponModel");
		$this->load->model("CartModel");
		$this->load->model("OrderModel");
		$this->load->model("WalletModel");
		$this->load->model("other_model");
		$this->load->model("OrderItemModel");
		$this->load->model("MacModel");
		$this->load->model("CouponCustomerModel");
	}
	/*public function index()
	{

		$this->load->view("main/comingsoon");
	}*/
	public function index()
	{
		//echo "<script>alert('".date("H:i:s", strtotime('+2 hours'))."');</script>";
		$data["Area"]=$this->input->cookie("Area",true);
		//echo "<script>alert('$Area');</script>";
		$ip=getenv('REMOTE_ADDR');
		$where ="CURRENT_DATE BETWEEN a.ValidFrom and a.ValidTo and (select count(ID) from couponcustomers where CouponID=a.ID)=0";
		$data["MenuList"]=$this->MenuModel->GetSpecialMenu("a.EntryType=1 and b.Availability=1");
		$data["RecentlyAdded"]=$this->MenuModel->GetSpecialMenu("a.EntryType=2 and b.Availability=1");
		$data["CouponList"]=$this->CouponModel->getSpecificCoupon($where);
		$data["Categories"]=$this->MenuModel->getCategory("1");
		$data["Locations"]=$this->other_model->GetAllPlaces("1");
		$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$ip' and Status=1");
		if(sizeof($LoginInfo)>0)
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=".$LoginInfo[0]["ID"]);
			
		}
		else
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=0");
		}
		
		$this->load->view("main/home",$data);
	}
	public function AddToCart()
	{
		$ManuID=$this->input->post("ManuID",true);
		$ItemDetail=$this->MenuModel->getSpecificMenu("ID=$ManuID and Availability=1");
		if(sizeof($ItemDetail)>0)
		{
			$ip=getenv('REMOTE_ADDR');
			$IPAddress=$ip;
			$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$ip' and Status=1");
			$Customer=0;
			if(sizeof($LoginInfo)>0)
			{
				$Customer=$this->WalletModel->GetUserDetail("ID=".$LoginInfo[0]["ID"]);
				$Customer=$Customer[0]["ID"];
			}
			$PartyID=$ItemDetail[0]["PartyID"];
			$ItemName=$ItemDetail[0]["ItemName"];
			$Quantity=1;
			$Price=$ItemDetail[0]["FullPrice"];
			$TotalPrice=$ItemDetail[0]["FullPrice"];
			$where="a.IPAddress='$ip' and a.PartyID=$PartyID and a.ManuID=$ManuID";
			$result=$this->CartModel->getSpecificCart($where);
			$Message="";
			$SiteStatus=$this->other_model->GetWebsiteStatus();
			if($SiteStatus[0]["Status"]==1)
			{
				if(sizeof($result)==0)
				{
					$data=array(
								'IPAddress'=>$IPAddress,
								'CustomerID'=>$Customer,
								'PartyID'=>$PartyID,
								'ManuID'=>$ManuID,
								'ItemName'=>$ItemName,
								'Quantity'=>$Quantity,
								'Price'=>$Price,
								'TotalPrice'=>$TotalPrice,
							);
					$this->CartModel->AddCart($data);
					$Message="Item Added To Cart";
				}
				else
				{
					if($result[0]["Quantity"]<15)
					{
						$this->CartModel->UpdateCart("Quantity=Quantity+$Quantity, TotalPrice=TotalPrice+$TotalPrice","ID=".$result[0]["ID"]);
						$Message="Quantity Updated";
					}
					else
					{
						$Message="Maximum limit is 15";
					}
				}
			}
			else
			{
				$Message="The restaurent is closed. Item cannot be added";
			}
		}
		else
		{
			$Message="Invalid Item";
		}
		echo json_encode($Message);
	}
	/*Add To Cart For Android*/
	public function AddToCartJson()
	{
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$IPAddress=$ip;
		$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$ip' and Status=1");
		$Customer=0;
		if(sizeof($LoginInfo)>0)
		{
			$Customer=$this->WalletModel->GetUserDetail("ID=".$LoginInfo[0]["ID"]);
			$Customer=$Customer[0]["ID"];
		}
		$PartyID=$this->input->get("PartyID",TRUE);
		$ManuID=$this->input->get("ManuID",TRUE);
		$ItemName=$this->input->get("ItemName",TRUE);
		$Quantity=$this->input->get("Quantity",TRUE);
		$Price=$this->input->get("Price",TRUE);
		$TotalPrice=$this->input->get("TotalPrice",TRUE);
		$where="IPAddress='$ip' and ManuID=$ManuID";
		$result=$this->CartModel->getSpecificCart($where);
		$SiteStatus=$this->other_model->GetWebsiteStatus();
		if($SiteStatus[0]["Status"]==1)
		{
			if(sizeof($result)>0)
			{
				if($result[0]["Quantity"]<15)
				{
					$ID=0;
					$quantity=0;
					$total=0;
					foreach($result as $row)
					{
						$ID=$row["ID"];
						$quantity=$Quantity+$row["Quantity"];
						$total=$quantity*$Price;
					}
					$where="IPAddress='$ip' and ManuID=$ManuID";
					$data="Quantity=$quantity, TotalPrice=$total";
					$this->CartModel->UpdateCart($data,$where);
					$result="Quantity Added";
				}
				else
				{
					$result="Maximum limit is 15";
				}
			}
			else
			{
			$data=array(
						'IPAddress'=>$IPAddress,
						'CustomerID'=>$Customer,
						'PartyID'=>$PartyID,
						'ManuID'=>$ManuID,
						'ItemName'=>$ItemName,
						'Quantity'=>$Quantity,
						'Price'=>$Price,
						'TotalPrice'=>$TotalPrice,
					);
			$this->CartModel->AddCart($data);
			$result="Added Successfully";
			}
		}
		else
		{
			$result="The restaurent is closed. Item cannot be added";
		}
		
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
	/*Delete From Cart For Android*/
	public function RemoveFromCartJson()
	{
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$IPAddress=$ip;
		$PartyID=$this->input->get("PartyID",TRUE);
		$ManuID=$this->input->get("ManuID",TRUE);
		$ItemName=$this->input->get("ItemName",TRUE);
		$Quantity=$this->input->get("Quantity",TRUE);
		$Price=$this->input->get("Price",TRUE);
		$TotalPrice=$this->input->get("TotalPrice",TRUE);
		$where="IPAddress='$ip' and ManuID=$ManuID";
		$result=$this->CartModel->getSpecificCart($where);
		$Message="Added Successfully";
		if(sizeof($result)>0)
		{
			$ID=0;
			$quantity=0;
			$total=0;
			foreach($result as $row)
			{
				$ID=$row["ID"];
				$quantity=$row["Quantity"]-$Quantity;
				$total=$quantity*$Price;
			}
			if($quantity>0)
			{
				$where="IPAddress='$ip' and ManuID=$ManuID";
				$data="Quantity=$quantity, TotalPrice=$total";
				$this->CartModel->UpdateCart($data,$where);
				$Message="Quantity Updated";
			}
			else
			{
				$where="IPAddress='$ip' and ManuID=$ManuID";
				$this->CartModel->DeleteCart($where);
				$Message="Item Deleted";
			}
		}
		
		$callback=$this->input->get("callback",true);
		if($callback=="")
		{
			echo json_encode($Message);
		}
		else
		{
			echo $callback.'('.json_encode($Message).')';
		}
	}
	public function ReadData()
	{
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$where="a.IPAddress='$ip'";
		$result=$this->CartModel->getSpecificCart($where);
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
	public function DeleteItem()
	{
		$id=$this->uri->segment(3);
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$where="IPAddress='$ip' and ID=$id";
		$this->CartModel->DeleteCart($where);
		echo "Success";
	}
	public function UpdateCart()
	{
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$id=$this->uri->segment(3);
		$quantity=$this->uri->segment(4);
		$total=$this->uri->segment(5);
		$where="IPAddress='$ip' and ID=$id";
		$data="`Quantity`=$quantity,`TotalPrice`=$total";
		$this->CartModel->UpdateCart($data,$where);
		echo "Success";
	}
	
	/*Search Menu Items*/
	public function SearchMenuItemsJson()
	{
		$callback=$this->input->get("callback",true);
		$search=$this->input->get("search",true);
		$where="ItemName like '%$search%'";
		$result=$this->MenuModel->getSpecificMenu($where." and Availability=1");
		if($callback=="")
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback."(".json_encode($result).")";
		}
	}
	
	/*Recent Ordered Items*/
	public function GetRecentOrders()
	{
		$callback=$this->input->get("callback",true);
		$id=$this->uri->segment(3);
		$CustomerID=$id;
		$result=$this->MenuModel->getSpecificMenu($CustomerID);
		if($callback=="")
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback.'('.json_encode($result).')';
		}
	}
	/*Get menu By Category*/
	public function GetMenuItemsByCategoryJson()
	{
		
		$category=$this->input->get("Category",true);
		$subcategory=$this->input->get("SubCategory",true);
		if($subcategory!="")
		{
			$where="Category = '$category' and SubCategory='$subcategory'";
		}
		else
		{
			$where="Category = '$category'";
		}
		$result=$this->MenuModel->getSpecificMenu($where." and Availability=1");
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
	/*Checkout Page*/
	public function Checkout()
	{
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$where="a.IPAddress='$ip'";
		$data["CartItems"]=$this->CartModel->getSpecificCart($where);
		$where="IPAddress='$ip' and Status=1";
		$UserData=$this->WalletModel->GetLogInDetail($where);
		if(sizeof($UserData)>0)
		{
			$where="CustomerID=".$UserData[0]["ID"];
			$data["Addresses"]=$this->WalletModel->GetAddress($where);
		}
		else
		{
			$where="CustomerID=0";
			$data["Addresses"]=$this->WalletModel->GetAddress($where);
		}
		$CH=date('G');
		$CM=date('i');
		$HList=[];
		for($i=$CH+2; $i<=24;$i++)
		{
			$HList[]=$i;
		}
		$data["MinH"]=$CH+2;
		$data["MinM"]=$CM;
		$data["HList"]=$HList;
		$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$ip' and Status=1");
		$data["CustomerName"]="";
		$data["EmailID"]="";
		$data["PhoneNo"]="";
		if(sizeof($LoginInfo)>0)
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=".$LoginInfo[0]["ID"]);
			$data["CustomerName"]=$data["UserDetail"][0]["FullName"];
			$data["EmailID"]=$data["UserDetail"][0]["EmailID"];
			$data["PhoneNo"]=$data["UserDetail"][0]["MobileNo"];
		}
		else
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=0");
			$data["CustomerName"]="";
			$data["EmailID"]="";
			$data["PhoneNo"]="";
		}
		$Area=$this->input->cookie("Area",true);
		$Locations=$this->other_model->GetAllPlaces("Pincode='$Area'");
		$data["Area"]="";
		$data["Location"]="";
		if(sizeof($Locations)>0)
		{
			$data["Area"]=$Locations[0]["Pincode"];
			$data["Location"]=$Locations[0]["PlaceName"];
		}
		$this->load->view("main/checkout",$data);
	}
	/*Sign In Page*/
	public function SignIn()
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
		$data["Message"]="";
		$Error=$this->input->get("Error",true);
		if($Error=="2")
		{
			$data["Message"]="Invalid Login";
		}
		else if($Error=="1")
		{
			$data["Message"]="Username, Email or PhoneNo already exist. Fill up again.";
		}
		else if($Error=="0")
		{
			$data["Message"]="Your account in created. Please log in to continue.";
		}
		$this->load->view("main/signup",$data);
	}
	//Facebook Login
	public function FacebookLogin()
	{
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,name,email');
			if (!isset($user['error']))
			{
				echo json_encode($user);
			}
		}
		else
		{
			if($this->facebook->is_authenticated()==false)
			{
				echo "Under Progress";
			}
		}
	}
	/*Send Mail*/
	public function SendMail()
	{
		$Name=$this->input->post("Name",true);
		$PhoneNo=$this->input->post("PhoneNo",true);
		$Email=$this->input->post("Email",true);
		$Message=$this->input->post("Message",true);
		$Message="Name: ".$Name."
		Email: ".$Email."
		PhoneNo: ".$PhoneNo."
		Message: ".$Message;
		$result=$this->WalletModel->SendMail("Feedback from website",$Message,"info@classicdine.com",$Email,"Thank you for your feedback.","Feedback couldn't be send.");
		echo json_encode($result);
	}
	/*Customer Profile*/
	public function MyProfile()
	{
		$ip=getenv('REMOTE_ADDR');
		$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$ip' and Status=1");
		if(sizeof($LoginInfo)>0)
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=".$LoginInfo[0]["ID"]);
			$data["CouponList"]=$this->CouponCustomerModel->GetCouponsByCustomer($LoginInfo[0]["ID"]);
			//echo $LoginInfo[0]["ID"];
			echo json_encode($data["CouponList"]);
			$data["Orders"]=$this->OrderModel->GetSpecificOrder("CustomerID=".$LoginInfo[0]["ID"]."");
			for($i=0;$i<sizeof($data["Orders"]);$i++)
			{
				$data["Orders"][$i]["OrderItems"]=$this->OrderItemModel->getSpecificOrderItem("OrderID=".$data["Orders"][$i]["ID"]);
			}
		}
		else
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=0");
			$data["Orders"]=$this->OrderModel->GetSpecificOrder("CustomerID=0");
			$data["CouponList"]=$this->CouponCustomerModel->GetCouponsByCustomer(0);
		}

		$this->load->view("main/profile",$data);
	}
	//Get Customer Orders
	public function GetMyOrdersJson()
	{
		$DeviceID=$this->input->get("DeviceID",true);
		$callback=$this->input->get("callback",true);
		$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$DeviceID' and Status=1");
		if(sizeof($LoginInfo)>0)
		{
			$Orders=$this->OrderModel->GetSpecificOrder("CustomerID=".$LoginInfo[0]["ID"]." order by ID desc");
			for($i=0;$i<sizeof($Orders);$i++)
			{
				if($Orders[$i]["Status"]==0)
				{
					$Orders[$i]["Status"]="Order Placed";
				}
				else if($Orders[$i]["Status"]==1)
				{
					$Orders[$i]["Status"]="Order Confirmed";
				}
				else if($Orders[$i]["Status"]==2)
				{
					$Orders[$i]["Status"]="Order Dispatched";
				}
				else if($Orders[$i]["Status"]==3)
				{
					$Orders[$i]["Status"]="Order Delivered";
				}
				else if($Orders[$i]["Status"]==4)
				{
					$Orders[$i]["Status"]="Order Canceled";
				}
			}
		}
		else
		{
			$Orders=$this->OrderModel->GetSpecificOrder("CustomerID=0");
		}
		if($callback=="")
		{
			echo json_encode($Orders);
		}
		else
		{
			echo $callback."(".json_encode($Orders).")";
		}
	}
	//Order Items Json
	public function GetMyOrderItemsJson()
	{
		$ID=$this->input->get("ID",true);
		$callback=$this->input->get("callback",true);
		$OrderItems=$this->OrderItemModel->getSpecificOrderItem("OrderID=$ID");
		if($callback=="")
		{
			echo json_encode($OrderItems);
		}
		else
		{
			echo $callback."(".json_encode($OrderItems).")";
		}
	}
	//Order Detail By ID
	public function GetSpecificOrderDetailJson()
	{
		$ID=$this->input->get("ID",true);
		$callback=$this->input->get("callback",true);
		$Orders=$this->OrderModel->GetSpecificOrder("ID=$ID");
		if($callback=="")
		{
			echo json_encode($Orders);
		}
		else
		{
			echo $callback."(".json_encode($Orders).")";
		}
	}
	//Hot Sellings
	public function GetHotSellings()
	{
		$callback=$this->input->get("callback",true);
		$OrderItems=$this->MenuModel->GetSpecialMenu("a.EntryType=1 and b.Availability=1");
		if($callback=="")
		{
			echo json_encode($OrderItems);
		}
		else
		{
			echo $callback."(".json_encode($OrderItems).")";
		}
	}
	//New Item
	public function GetNewItems()
	{
		$callback=$this->input->get("callback",true);
		$OrderItems=$this->MenuModel->GetSpecialMenu("a.EntryType=2 and b.Availability=1");
		if($callback=="")
		{
			echo json_encode($OrderItems);
		}
		else
		{
			echo $callback."(".json_encode($OrderItems).")";
		}
	}
	//Order Tracking
	public function OrderTrack()
	{
		$ip=getenv('REMOTE_ADDR');
		$data["OrderID"]=$this->uri->segment(3);
		$data["Orders"]=$this->OrderModel->GetSpecificOrder("ID=".$data["OrderID"]."");
		for($i=0;$i<sizeof($data["Orders"]);$i++)
		{
			$data["Orders"][$i]["OrderItems"]=$this->OrderItemModel->getSpecificOrderItem("OrderID=".$data["OrderID"]);
		}
		$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$ip' and Status=1");
		if(sizeof($LoginInfo)>0)
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=".$LoginInfo[0]["ID"]);
		}
		else
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=0");
		}
		$this->load->view("main/ordertrack",$data);
	}
	public function GetOrderStatus()
	{
		$OrderID=$this->input->get("OrderID",true);
		$result=$this->OrderModel->GetSpecificOrder("ID=".$OrderID."");
		$callback=$this->input->get("callback",true);
		if($callback=="")
		{
			echo json_encode($result);
		}
		else
		{
			echo $callback."(".json_encode($result).")";
		}
	}
	public function Wallet()
	{
		$ip=getenv('REMOTE_ADDR');
		$LoginInfo=$this->WalletModel->GetLogInDetail("IPAddress='$ip' and Status=1");
		if(sizeof($LoginInfo)>0)
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=".$LoginInfo[0]["ID"]);
			$data["WalletHistory"]=$this->WalletModel->GetWallet("CustomerID=".$LoginInfo[0]["ID"]);
		}
		else
		{
			$data["UserDetail"]=$this->WalletModel->GetUserDetail("ID=0");
			$data["WalletHistory"]=$this->WalletModel->GetWallet("CustomerID=0");
		}
		$this->load->view("main/wallet",$data);
	}
	public function ForgotPassword()
	{
		$UserID=$this->input->post("UserID",true);
		if($UserID=="" || $UserID==null)
		{
			$this->load->view("main/forgetpassword");
		}
		else
		{
			$UserData=$this->WalletModel->GetUserDetail("(MobileNo='$UserID' or EmailID='$UserID' or EmailID='$UserID') and Status<>0");
			if(sizeof($UserData)>0)
			{
				$this->WalletModel->UpdateUser("Status=2","ID=".$UserData[0]["ID"]);
				$this->WalletModel->SendMail("Please visit:","http://www.classicdine.com/home/ResetPassword?Token=".$UserData[0]["Password"]."&ID=".$UserData[0]["ID"],$UserData[0]["EmailID"],"info@classicdine.com","Message Sent","Failed");
				if($UserData[0]["MobileNo"]!="")
				{
					$url="http://book.24techsoft.com/api/sendmsg.php?user=ClassicDine&pass=Classic@123&sender=CLDINE&phone=".$UserData[0]["MobileNo"]."&text=".str_replace(' ','%20','Dear '.$UserData[0]["FullName"].",Please visit the following link to reset your password. http://www.classicdine.com/home/ResetPassword?Token=".$UserData[0]["Password"]."&ID=".$UserData[0]["ID"])."&priority=ndnd&stype=normal";
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
				$this->load->view("main/ForgetPasswordSuccess");
			}
			else
			{
				echo "<script type='text/javascript'>alert('User doesn't exist or blocked');</script>";
				$this->load->view("main/forgetpassword");
			}
		}
	}
	public function ForgotPasswordAPI()
	{
		$Message="";
		$Error=0;
		$CallBack=$this->input->get("callback",true);
		$UserID=$this->input->get("UserID",true);
		if($UserID=="" || $UserID==null)
		{
			$Error=1;
			$Message="No data received";
		}
		else
		{
			$UserData=$this->WalletModel->GetUserDetail("(MobileNo='$UserID' or EmailID='$UserID' or EmailID='$UserID') and Status<>0");
			if(sizeof($UserData)>0)
			{
				$this->WalletModel->UpdateUser("Status=2","ID=".$UserData[0]["ID"]);
				$this->WalletModel->SendMail("Please visit:","http://www.classicdine.com/home/ResetPassword?Token=".$UserData[0]["Password"]."&ID=".$UserData[0]["ID"],$UserData[0]["EmailID"],"info@classicdine.com","Message Sent","Failed");
				$Message="Password reset link has been sent to your email";
				$Error=0;
				if($UserData[0]["MobileNo"]!="")
				{
					$url="http://book.24techsoft.com/api/sendmsg.php?user=ClassicDine&pass=Classic@123&sender=CLDINE&phone=".$UserData[0]["MobileNo"]."&text=".str_replace(' ','%20','Dear '.$UserData[0]["FullName"].",Please visit the following link to reset your password. http://www.classicdine.com/home/ResetPassword?Token=".$UserData[0]["Password"]."&ID=".$UserData[0]["ID"])."&priority=ndnd&stype=normal";
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
			}
			else
			{
				$Message="User doesn't exist or blocked";
				$Error=2;
			}
		}
		if($CallBack=="")
		{
			echo json_encode(array("Error"=>$Error,"Message"=>$Message));
		}
		else
		{
			echo $CallBack."(".json_encode(array("Error"=>$Error,"Message"=>$Message)).")";
		}
	}
	public function ResetPassword()
	{
		$Token=$this->input->get("Token",true);
		$ID=$this->input->get("ID",true);
		$data["Token"]=$Token;
		$data["ID"]=$ID;
		
		if($Token!="" || $ID!="")
		{
			$result=$this->WalletModel->GetUserDetail("ID=$ID and Password='$Token'");
			if(sizeof($result)>0)
			{
				if($result[0]["Status"]==2)
				{
					$this->load->view("main/resetpassword",$data);
				}
				else
				{
					redirect("Home");
				}
			}
			else
			{
				redirect("Home");
			}
		}
		else
		{
			redirect("Home");
		}
	}
	public function TermsAndConditions()
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
		$this->load->view("main/TermsAndConditions",$data);
	}
	public function PrivacyPolicy()
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
		$this->load->view("main/PrivacyPolicy",$data);
	}
}
?>
