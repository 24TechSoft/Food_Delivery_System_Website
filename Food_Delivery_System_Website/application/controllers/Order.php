<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Order extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model("OrderModel");
		$this->load->model("OrderItemModel");
		$this->load->model("CartModel");
		$this->load->model("CouponModel");
		$this->load->model("WalletModel");
		$this->load->model("other_model");
		$this->load->model("MacModel");
	
		ini_set("allow_url_fopen", 1);
	}
	public function index()
	{
		$cookieData="";
		$cookieData = $this->input->cookie('UserData', TRUE);
		if($cookieData=="")
		{
			redirect("User");
		}
		else
		{
			$date=date('Y-m-d');
			$where="OrderDate='$date' order by ID desc";
			$data["WebsiteStatus"]=$this->other_model->GetWebsiteStatus();
			$data["orderlist"]=$this->OrderModel->GetSpecificOrder($where);
			//$this->load->view("admin/header");
			//echo json_encode($data["orderlist"]);
			$this->load->view("admin/Orders",$data);
		}
	}
	public function Detail()
	{
		$id=$this->uri->segment(3);
		$where="ID=$id";
		$data["OrderBasic"]=$this->OrderModel->GetSpecificOrder($where);
		$where="OrderID=$id";
		$data["OrderItems"]=$this->OrderItemModel->getSpecificOrderItem($where);
		$data["BillDetail"]=$this->OrderModel->GetBill("a.OrderID=$id");
		//$this->load->view("admin/header");
		$this->load->view("admin/OrderDetail",$data);
	}

	public function UpdateOrder()
	{
		$id=$this->uri->segment(3);
		$where="ID=$id";
		$Status=$this->input->post('Status', TRUE);
		$data="Status=$Status";
		$where="ID=$id";
		if($Status!="" || $Status!=null)
		{
			$this->OrderModel->UpdateOrder($data,$where);
		}
		$tblOrderDetail=$this->OrderModel->GetSpecificOrder("ID=$id");
		$tblOrderItems=$this->OrderItemModel->getSpecificOrderItem("a.OrderID=$id");
		$TextStatus="";
		if($Status==1)
		{
			$dataBill=array("OrderID"=>$id,
							"Name"=>$tblOrderDetail[0]["FullName"],
							"PhoneNo"=>$tblOrderDetail[0]["PhoneNo"],
							"Address"=>$tblOrderDetail[0]["Address"],
							"Amount"=>$tblOrderDetail[0]["TotalPrice"],
							"Discount"=>$tblOrderDetail[0]["CouponDiscount"],
							"CGST"=>$tblOrderDetail[0]["CGST"],
							"SGST"=>$tblOrderDetail[0]["SGST"],
							"TotalPayable"=>$tblOrderDetail[0]["GrandTotal"],
							"Status"=>1);
			$billid=$this->OrderModel->SaveBill($dataBill);
			echo $billid;
			foreach($tblOrderItems as $OrderItem)
			{
				$dataItem=array("BillID"=>$billid,
								"Item"=>$OrderItem["ItemName"],
								"Quantity"=>$OrderItem["Quantity"],
								"Price"=>$OrderItem["Price"],
								"Total"=>$OrderItem["TotalPrice"]
							);
				$this->OrderModel->SaveBillItems($dataItem);
			}
			if($tblOrderDetail[0]["DeliveryCharge"]>0)
			{
				$dataItem=array("BillID"=>$billid,
								"Item"=>"Delivery Charge",
								"Quantity"=>1,
								"Price"=>$tblOrderDetail[0]["DeliveryCharge"],
								"Total"=>$tblOrderDetail[0]["DeliveryCharge"]
							);
				$this->OrderModel->SaveBillItems($dataItem);
			}
			
		}
		if($Status==3)
		{
			if($tblOrderDetail[0]["CouponCashBack"]>0)
			{
				$dataWallet=array("EntryDate"=>date("Y-m-d"),
								"CustomerID"=>$tblOrderDetail[0]["CustomerID"],
								"EntryType"=>1,
								"Amount"=>$tblOrderDetail[0]["CouponCashBack"],
								"Description"=>"Cashback against order No ".$tblOrderDetail[0]["ID"]." On ".$tblOrderDetail[0]["OrderDate"]);
				$this->WalletModel->SaveWallet($dataWallet);
			}
		}
		if($Status==1)
		{
			$TextStatus="Preparing";
		}
		else if($Status==2)
		{
			$TextStatus="Out for delivery";
		}
		else if($Status==3)
		{
			$TextStatus="Delivered";
		}
		else if($Status==4)
		{
			$TextStatus="Cancelled";
		}
		if($Status!=0)
		{
			$url="http://book.24techsoft.com/api/sendmsg.php?user=ClassicDine&pass=Classic@123&sender=CLDINE&phone=".$tblOrderDetail[0]["PhoneNo"]."&text=".str_replace(' ','%20','Dear '.$tblOrderDetail[0]["FullName"].',your order no : '.$tblOrderDetail[0]["ID"].'is '.$TextStatus.'.')."&priority=ndnd&stype=normal";
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
		if($Status==3)
		{
			$url="http://book.24techsoft.com/api/sendmsg.php?user=ClassicDine&pass=Classic@123&sender=CLDINE&phone=".$tblOrderDetail[0]["PhoneNo"]."&text=".str_replace(' ','%20','Dear '.$tblOrderDetail[0]["FullName"].',Thank you for ordering from us. You can download the Bill here: http://www.classcdine.com/Order/CreatePDFOfBill/'.$id)."&priority=ndnd&stype=normal";
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
		redirect("Order/Detail/$id");
	}
	public function ViewAllOrders()
	{
		$where="1";
		$data["orderlist"]=$this->OrderModel->GetSpecificOrder($where);
		//$this->load->view("admin/header");
		$this->load->view("admin/Orders",$data);
	}
	public function GetOrderByDate()
	{
		$dtOrder=$this->input->post("dtOrder",true);
		if($dtOrder=="")
		{
			redirect("Order");
		}
		else{
			$where="OrderDate='$dtOrder'";
			$data["WebsiteStatus"]=$this->other_model->GetWebsiteStatus();
			$data["orderlist"]=$this->OrderModel->GetSpecificOrder($where);
			//$this->load->view("admin/header");
			$this->load->view("admin/Orders",$data);
		}
	}
	public function JsonGetRecentlyOrderedItems()
	{
		$CustomerID=$this->input->get("CustomerID",true);
		if($CustomerID=="")
		{
			$CustomerID=0;
		}
		$result=$this->OrderModel->GetRecentOrderItems($CustomerID);
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
	public function SaveOrder()
	{
		$Message="";
		$LastOrderID=0;
		$CustomerID=$this->input->get("CustomerID",true);
		$OrderDate=date("Y-m-d");
		$OrderTime=date("G:i:s");
		//$DeliveryTime=$this->input->get("DeliveryTime",true);
		$DeliveryTime=date("Y-m-d H:i:s", strtotime('+2 hours'));
		$ip=$this->input->get("DeviceID",true);
		if($ip=="")
		{
			$ip=getenv('REMOTE_ADDR');
		}
		$IPAddress=$ip;
		$FullName=$this->input->get("FullName",true);
		$Address=$this->input->get("Address",true);
		$Location=$this->input->get("Location",true);
		
		if($Location=="")
		{
			$Location=0;
		}
		$Area=$this->other_model->GetAllPlaces("ID=$Location");
		$DeliveryCharge=0;
		$MinOrderPrice=0;
		if(sizeof($Area)>0)
		{
			$Address=$Address.", Location: ".$Area[0]["PlaceName"];
			$PinCode=$Area[0]["Pincode"];
			$DeliveryCharge=$Area[0]["DeliveryCharge"];
			$MinOrderPrice=$Area[0]["MinOrderPrice"];
		}
		else
		{
			$PinCode="";
		}
		$callback=$this->input->get("callback",true);
		$AddressLine1=$this->input->get("AddressLine1",true);
		$AddressLine2=$this->input->get("AddressLine2",true);
		$PhoneNo=$this->input->get("PhoneNo",true);
		$Email=$this->input->get("Email",true);
		$TotalPrice=$this->input->get("TotalPrice",true);
		$CouponCode=$this->input->get("CouponCode",true);
		$CouponDiscount=$this->input->get("CouponDiscount",true);
		$CouponCashBack=$this->input->get("CouponCashBack",true);
		//$CGST=$this->input->get("CGST",true);
		//$SGST=$this->input->get("SGST",true);
		$GrandTotal=$this->input->get("GrandTotal",true);
		if($GrandTotal>=$MinOrderPrice)
		{
			$DeliveryCharge=0;
		}
		$GrandTotal=$GrandTotal+$DeliveryCharge;
		$SiteStatus=$this->other_model->GetWebsiteStatus();
		$NewAddress=$this->input->get("NewAddress",true);
		$State="Assam";
		$City="Guwahati";
		$Status=0;
		$CartItems=$this->CartModel->getSpecificCart("a.IPAddress='$IPAddress'");
		if($SiteStatus[0]["Status"]==1)
		{
			if($FullName!="" && $Address!="" && $PhoneNo!="" && $GrandTotal!=0 && $GrandTotal!="" && sizeof($Area)>0)
			{
				if(sizeof($CartItems)>0)
				{
					$data=array(
						"CustomerID"=>$CustomerID,
						"OrderDate"=>$OrderDate,
						"OrderTime"=>$OrderTime,
						'DeliveryTime'=>$DeliveryTime,
						"IPAddress"=>$IPAddress,
						"FullName"=>$FullName,
						"Address"=>$Address,
						"PhoneNo"=>$PhoneNo,
						"Email"=>$Email,
						"TotalPrice"=>$TotalPrice,
						"CouponCode"=>$CouponCode,
						"CouponDiscount"=>$CouponDiscount,
						"CouponCashBack"=>$CouponCashBack,
						"CGST"=>0,
						"SGST"=>0,
						"DeliveryCharge"=>$DeliveryCharge,
						"GrandTotal"=>$GrandTotal,
						"Status"=>$Status
					);
					$this->OrderModel->AddOrder($data);
					$LatestOrder=$this->OrderModel->GetSpecificOrder("ID=(select max(ID) from orders where IPAddress='$IPAddress')");
					$LastOrderID=$LatestOrder[0]["ID"];
					if($CustomerID!=0)
					{
						if($NewAddress==1)
						{
							$data=array("CustomerID"=>$CustomerID,"Name"=>$FullName,"PhoneNo"=>$PhoneNo,"AddressLine1"=>$AddressLine1,"AddressLine2"=>$AddressLine2,"Location"=>$Location,"City"=>$City,"PinCode"=>$PinCode,"State"=>$State);
							$this->WalletModel->AddAddress($data);
						}
					}
					
					$OrderID=0;
					foreach($LatestOrder as $row)
					{
						$OrderID=$row["ID"];
					}
					foreach($CartItems as $row)
					{	
						$data=array(
							"OrderID"=>$OrderID,
							"PartyID"=>$row["PartyID"],
							"MenuID"=>$row["ManuID"],
							"ItemName"=>$row["ItemName"],
							"Quantity"=>$row["Quantity"],
							"Price"=>$row["Price"],
							"TotalPrice"=>$row["TotalPrice"]
						);
						$this->OrderItemModel->AddOrderItem($data);
					}
					$this->CartModel->DeleteCart("IPAddress='$IPAddress'");
					$this->CouponModel->RemoveTempAppliedCoupon("IPAddress='$IPAddress'");
					$Message="Order Saved";
					$url="http://book.24techsoft.com/api/sendmsg.php?user=ClassicDine&pass=Classic@123&sender=CLDINE&phone=".$PhoneNo."&text=".str_replace(' ','%20','Dear '.$FullName.',your order no : '.$OrderID.' is placed. Thank you for ordering from us. We will keep informing you the status')."&priority=ndnd&stype=normal";
					if(!($response  = file_get_contents($url)))
					{
						//echo "<script type='text/javascript'>alert ('Error');</script>";
						//header("location:Index.php?Error=1");
					}
					else
					{
						//echo "<script type='text/javascript'>alert ('Success');</script>";
					}
					$this->WalletModel->SendMail("Order Placed",'Dear '.$FullName.',your order no : '.$OrderID.' is placed. Thank you for ordering from us. We will keep informing you the status',$Email,'info@classicdine.com','','');
				}
				else
				{
					$Message="Please check your previous orders as this Order should be already placed";
				}
			}
			else
			{
				if(sizeof($Area)==0)
				{
					$Message="Delivery not available in this area";
				}
				else
				{
					$Message="Cannot be saved. Please check the order and Delivery details.";
				}
			}
		}
		else
		{
			$Message="The restaurant is offline. Order Cannot be placed.";
		}
		
		if($callback=="" || $callback==null)
		{
			echo json_encode(array("OrderID"=>$LastOrderID,"Message"=>$Message));
		}
		else
		{
			echo $callback."(".json_encode(array("OrderID"=>$LastOrderID,"Message"=>$Message)).")";
		}
		//echo $callback."(".json_encode(array("OrderID"=>0,"Message"=>$PinCode)).")";
	}
	public function SaveOrderFromWebsite()
	{
		$DeliveryTime=date("H:i:s", strtotime('+2 hours'));//$this->input->post("DeliveryTime",true);
		$MinTime=date("Y-m-d H:i:s", strtotime('+2 hours'));
		if($DeliveryTime!="")
		{
			$DTime = date("Y-m-d $DeliveryTime");
		}
		else
		{
			$DTime = $MinTime;
		}
		if($DTime>=$MinTime || $DeliveryTime!="")
		{
			$ip=getenv('REMOTE_ADDR');
			//$Total=$this->input->post("Total",true);
			$Total=0;
			$AppliedCoupon=$this->CouponModel->ReadTempAppliedCoupon("IPAddress='$ip'");
			if(sizeof($AppliedCoupon)>0)
			{
				// Full texts 	ID 	IPAddress 	CouponCode 	CouponDiscount 	CouponCashback
				$CouponCode=$AppliedCoupon[0]["CouponCode"];
				$CouponDiscount=$AppliedCoupon[0]["CouponDiscount"];
				$CouponCashBack=$AppliedCoupon[0]["CouponCashback"];
			}
			else
			{
				$CouponCode="";
				$CouponDiscount=0;
				$CouponCashBack=0;
			}
			//$CGST=$this->input->post("CGST",true);
			//$SGST=$this->input->post("SGST",true);
			//$Payable=$this->input->post("Payable",true);
			$Name=$this->input->post("Name",true);
			$PhoneNo=$this->input->post("PhoneNo",true);
			$Email=$this->input->post("Email",true);
			$AddressLine1=$this->input->post("AddressLine1",true);
			$AddressLine2=$this->input->post("AddressLine2",true);
			$Location=$this->input->post("Location",true);
			$AreaDetail=$this->other_model->GetAllPlaces("ID=$Location");
			$City=$this->input->post("City",true);
			if(sizeof($AreaDetail)>0)
			{
				$Location=$AreaDetail[0]["PlaceName"];
				$PinCode=$AreaDetail[0]["Pincode"];
				$DeliveryCharge=$AreaDetail[0]["DeliveryCharge"];
				$MinOrder=$AreaDetail[0]["MinOrderPrice"];
			}
			else
			{
				$Location="";
				$PinCode="";
				$DeliveryCharge=0;
				$MinOrder=0;
			}
			//$PinCode=$this->input->post("PinCode",true);
			$State=$this->input->post("State",true);
			$NewAddress=$this->input->post("NewAddress",true);
			/*check Login*/
			
			$Message="";
			$SiteStatus=$this->other_model->GetWebsiteStatus();
			$CartItems=$this->CartModel->getSpecificCart("a.IPAddress='$ip'");
			foreach($CartItems as $item)
			{
				$Total=$Total+$item["TotalPrice"];
			}
			if($Total>=$MinOrder)
			{
				$DeliveryCharge=0;
			}
			$Payable=$Total+$DeliveryCharge;
			if($SiteStatus[0]["Status"]==1)
			{
				if(sizeof($CartItems)>0)
				{
					$where="IPAddress='$ip' and Status=1";
					$LogInDetail=$this->WalletModel->GetLogInDetail($where);
					$CustomerID=0;
					if(sizeof($LogInDetail)>0)
					{
						foreach($LogInDetail as $row)
						{
							$CustomerID=$row["ID"];
						}
					}
					/*add new address*/
					if($CustomerID!=0)
					{
						if($NewAddress==1)
						{
							$data=array("CustomerID"=>$CustomerID,"Name"=>$Name,"PhoneNo"=>$PhoneNo,"AddressLine1"=>$AddressLine1,"AddressLine2"=>$AddressLine2,"Location"=>$Location,"City"=>$City,"PinCode"=>$PinCode,"State"=>$State);
							$this->WalletModel->AddAddress($data);
						}
					}
					else
					{
						$where="MobileNo='$PhoneNo' or EmailID='$Email'";
						$result=$this->WalletModel->GetUserDetail($where);
						//echo json_encode($result);
						if(sizeof($result)>0)
						{
							foreach($result as $row)
							{
								$CustomerID=$row["ID"];
							}
						}
						else
						{
							$Password=rand(11111111,99999999);
							$data=array("FullName"=>$Name,"MobileNo"=>$PhoneNo,"EmailID"=>$Email,"UserID"=>$PhoneNo,"Password"=>$Password);
							$this->WalletModel->AddUser($data);
							$where="MobileNo='$PhoneNo' or EmailID='$Email'";
							$result=$this->WalletModel->GetUserDetail($where);
							if(sizeof($result)>0)
							{
								foreach($result as $row)
								{
									$CustomerID=$row["ID"];
								}
							}
						}
					}
					
					$data=array(
							"CustomerID"=>$CustomerID,
							"OrderDate"=>date("Y-m-d"),
							"OrderTime"=>date("H:i:s"),
							"DeliveryTime"=>$DeliveryTime,
							"IPAddress"=>$ip,
							"FullName"=>$Name,
							"Address"=>"Address Line 1 :".$AddressLine1."\r\n, Address Line 2: ".$AddressLine2."\r\n, Location: ".$Location.",\r\n City: ".$City.", PinCode".$PinCode,
							"PhoneNo"=>$PhoneNo,
							"Email"=>$Email,
							"TotalPrice"=>$Total,
							"CouponCode"=>$CouponCode,
							"CouponDiscount"=>$CouponDiscount,
							"CouponCashBack"=>$CouponCashBack,
							"CGST"=>0,
							"SGST"=>0,
							"DeliveryCharge"=>$DeliveryCharge,
							"GrandTotal"=>$Payable,
							"Status"=>0
					);
					$this->OrderModel->AddOrder($data);
					$LatestOrder=$this->OrderModel->GetSpecificOrder("ID=(select max(ID) from orders where IPAddress='$ip')");
					
					$OrderID=0;
					foreach($LatestOrder as $row)
					{
						$OrderID=$row["ID"];
					}
					foreach($CartItems as $row)
					{	
						$data=array(
							"OrderID"=>$OrderID,
							"PartyID"=>$row["PartyID"],
							"MenuID"=>$row["ManuID"],
							"ItemName"=>$row["ItemName"],
							"Quantity"=>$row["Quantity"],
							"Price"=>$row["Price"],
							"TotalPrice"=>$row["TotalPrice"]
						);
						$this->OrderItemModel->AddOrderItem($data);
					}
					$this->CartModel->DeleteCart("IPAddress='$ip'");
					$this->CouponModel->RemoveTempAppliedCoupon("IPAddress='$ip'");
					$Message=array("Error"=>0,"Message"=>"Order Placed","OrderID"=>$OrderID);
					$url="http://book.24techsoft.com/api/sendmsg.php?user=ClassicDine&pass=Classic@123&sender=CLDINE&phone=".$PhoneNo."&text=".str_replace(' ','%20','Dear '.$Name.',your order no : '.$OrderID.'is placed. Thank you for ordering from us. We will keep informing you the status')."&priority=ndnd&stype=normal";
					if(!($response  = file_get_contents($url)))
					{
						//echo "<script type='text/javascript'>alert ('Error');</script>";
						//header("location:Index.php?Error=1");
					}
					else
					{
						//echo "<script type='text/javascript'>alert ('Success');</script>";
					}
					$this->WalletModel->SendMail("Order Placed",'Dear '.$Name.',your order no : '.$OrderID.'is placed. Thank you for ordering from us. We will keep informing you the status',$Email,'info@classicdine.com','','');
				}
				else
				{
					$Message=array("Error"=>1,"Message"=>"Empty cart. Cannot place order");
				}
			}
			else
			{
				$Message=array("Error"=>2,"Message"=>"The restaurent is offline. Order Cannot be placed.");
			}
			echo json_encode($Message);
		}
		else
		{
			echo json_encode(array("Error"=>3,"Message"=>"Invalid Delivery time"));
		}
	}
	public function ToggleStatus()
	{
		$Status=$this->uri->segment(3);
		$this->other_model->ToggleWebsiteStatus("Status=$Status");
		redirect("Order");
	}
	
	public function ViewBill()
	{
		$ID=$this->uri->segment(3);
		$data["BillDetail"]=$this->OrderModel->GetBill("a.ID=$ID");
		$this->load->view("admin/Bill",$data);
	}
	//Create PDF
	public function CreatePDFOfBill()
	{
		$ID=$this->uri->segment(3);
		$BillDetail=$this->OrderModel->GetBill("a.OrderID=$ID");
		$html='<div style="width: 1000px; height:500px; border:1px solid #000; padding:20px; background:#fff;" id="print">
		<center><b><u>BILL</u></b></center>
		<b>Bill No:'.$BillDetail[0]["ID"].'</b><br>
		<b>Order No:'.$BillDetail[0]["OrderID"].'</b><br>
		<b>Order Date:'.$BillDetail[0]["OrderDate"].'</b><br>
		<p>To,</p>
		<p>'.$BillDetail[0]["Name"].'</p>
		<p>'.nl2br($BillDetail[0]["Address"]).'</p>
		<table width="100%" border="1">
		<tr><td width="20px">S/L</td><td width="70px">Item</td><td width="30px">Price</td><td width="20px">Qty</td><td width="30px">Total</td></tr>';
		$count=0;
		foreach($BillDetail as $row)
		{
		$count++;
		$html=$html.'<tr><td width="20px">'.$count.'</td>
		<td width="70px">'.$row["Item"].'</td>
		<td width="30px">'.$row["Price"].'</td>
		<td width="20px">'.$row["Quantity"].'</td>
		<td width="30px">'.$row["Total"].'</td></tr>';
		}
		$html=$html.'<tr><td colspan="4">Total</td><td>'.$BillDetail[0]["Amount"].'</td></tr>
		<tr><td colspan="4">Discount</td><td>'.$BillDetail[0]["Discount"].'</td></tr>
		<tr><td colspan="4">Bill Amount</td><td>'.$BillDetail[0]["TotalPayable"].'</td></tr>
		</table>
		<br><br>
		<center>
		<b>Classic Dine</b><br>
		Narengi Tiniali, Guwahati: 781026
		</center>
		</div>';
		echo $html;
	}
}
?>
