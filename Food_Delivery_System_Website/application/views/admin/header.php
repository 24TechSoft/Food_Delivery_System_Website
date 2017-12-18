<!DOCTYPE html>
<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="<?php echo base_url();?>Admin/styles/layout.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>Admin/styles/jquery.fancybox.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>Admin/fonts/font.css" type="text/css" />
	<!--font awesome fonts-->
	<script src="https://use.fontawesome.com/93f67c57ef.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript">
	function validatechnagepassword()
	{
		var oldpassword=document.getElementById("oldpassword").value;
		var newpassword=document.getElementById("newpassword").value;
		var confirmPassword=document.getElementById("confirmPassword").value;
		if(oldpassword!="" && newpassword!="" && confirmPassword!="")
		{
			if(newpassword==confirmPassword)
			{
				return true;
			}
			else
			{
				alert("New Password and Confrim Password must be same");
				return false;
			}
		}
		else
		{
			alert("Fields cannot be empty");
			return false;
		}
	}
	</script>
</head>

<body>

<!-- begin section -->
<div id="section">
	  
	<!-- begin page-wrap -->
	<div id="page-wrap">
	
		<!-- begin header -->
		<div id="header-wrap">

			<!-- header block -->
            <div class="coup-head">
            
            	<div class="sect">
                
                	<div class="centering">
                    
					       <div class="part">
					     
										<div class="logo">
										
											 <a href=""><img src="<?php echo base_url();?>Main/images/logo.png" alt="logo"/></a>
										</div>
										<div class="grp">
										
												<div class="left">	 
													 
													 <ul>
													 
														<li><a href="<?php echo base_url();?>Order">Orders</a></li>
														<li><a href="<?php echo base_url();?>Party">Party</a></li>
														<li><a href="<?php echo base_url();?>Coupon">Coupon</a></li>
														<li><a href="<?php echo base_url();?>Menu/Category">Category</a></li>
														<li><a href="<?php echo base_url();?>Menu/index/0">Kitchen</a></li>
														<li><a href="<?php echo base_url();?>Others/Deliveryboys">Delivery Boy</a></li>
														<li><a href="<?php echo base_url();?>Others/AreaMaster">Areas</a></li>
													 </ul>
													 
												</div>
												
												<div class="right">
												
												        <div class="txthover">
												
												           <a href=""><img src="<?php echo base_url();?>Admin/images/set.png" alt="Setting"/></a>
														   
														   <div class="overlay">
																		<!-- Display Popup Button -->
																		<a href="#" id="myBtn">Change Password</a>
																		<a href="<?php echo base_url();?>User/Logout">Log Out</a>
																	<div id="myModal" class="modal">

																	<div class="modal-content">
																		   
																		      <span class="close">&times;</span>
																			  
																		<form method="post" action="<?php echo base_url();?>User/ChangePassword" onsubmit="return validatechnagepassword();">
									                                       
																		   <table style="background:rgba(255,255,255,.8);" width="500px">
																				<tr><td><label>Old Password:</label></td><td><input type="password" placeholder="old password" name="oldpassword" id="oldpassword"></td></tr></br>
																				<tr><td><label>New Password:</label></td><td><input type="password" placeholder="new password" name="newpassword" id="newpassword"></td></tr></br>
																				<tr><td><label>Confirm Password:</label></td><td><input type="password" placeholder="confirm password" name="confirmPassword" id="confirmPassword">
																				</td></tr></br>
																				<tr><td><input type="submit" name="Submit" id="login" value="Submit"/></td></tr>																				
																		   </table>
																		   
																		
																		</form>
																			
																	 </div>

																</div>
														   </div>
												
												        </div>
													   
												</div>
										
										</div>
										
							  </div>
							  <div class="part" id="websitestatus">
							  
							  </div>
                    
                    </div>
                
                </div>
                
            </div>
            <!-- finish header block -->

		</div>
		<!-- finish header -->
		
		<!-- begin footer -->

		<!-- finish footer -->
		
	</div>
	<!-- finish page wrap -->
	
</div>
<!-- finish section -->
<script src="<?php echo base_url();?>Admin/js/custom.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
  ShowStatus();
  //  DisplayAnswer();
});
function ToggleStatus(status)
{
	$.ajax({
		url:'<?php echo base_url();?>Others/ToggleWebsiteStatus?Status='+status+'',
		type:'ajax',
		success:function(){
			ShowStatus();
		},
		error:function()
		{
			alert("Fail");
		}
	});
}
function ShowStatus()
{
	$.ajax({
		url:'<?php echo base_url();?>Others/GetStatus',
		type:'ajax',
		dataType:'json',
		success:function(data){
			var html="";
			if(data[0].Status==1)
			{
				html="<marquee onmouseover='this.stop();' onmouseout='this.start();'><span style='font-size:large; color:#fff;'>The website is active. Order can be placed. <a href='#' onclick='ToggleStatus(0);' style='color:#f00; background:#fff; border-radius:20; text-decoration:none;'>Click Here</a> to turn off the website.</span></marquee>";
			}
			else{
				html="<marquee onmouseover='this.stop();' onmouseout='this.start();'><span style='font-size:large; color:#fff;'>The website is inactive. Order can not be placed. <a href='#' onclick='ToggleStatus(1);' style='color:#f00;  background:#fff; border-radius:20; text-decoration:none;'>Click Here</a> to turn on the website.</span></marquee>";
			}
			document.getElementById("websitestatus").innerHTML=html;
		},
		error:function()
		{
			alert("Fail");
		}
	});
}
</script>