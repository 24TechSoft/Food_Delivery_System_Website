<!DOCTYPE html>
<html>

<head>

	<title>Classic Dine | Checkout</title>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109298449-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	
	gtag('config', 'UA-109298449-1');
	</script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="<?php echo base_url();?>Main/styles/layout.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>Main/styles/jquery.fancybox.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>Main/fonts/font.css" type="text/css" />
	<!--font awesome fonts-->
	<script src="https://use.fontawesome.com/93f67c57ef.js"></script>
	
	 <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url();?>Main/styles/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>Main/styles/owl/owl.theme.default.min.css">
	<!--smooth scroll-->
	<script src="<?php echo base_url();?>Main/js/smooth/jquery.smooth-scroll.js"></script>
  <script>
    $(document).ready(function() {

      $('ul.mainnav a').smoothScroll();

      $('p.subnav a').click(function(event) {
        event.preventDefault();
        var link = this;
        $.smoothScroll({
          scrollTarget: link.hash
        });
      });

      $('button.scrollsomething').click(function() {
        $.smoothScroll({
          scrollElement: $('div.scrollme'),
          scrollTarget: '#findme'
        });
        return false;
      });
      $('button.scrollhorz').click(function() {
        $.smoothScroll({
          direction: 'left',
          scrollElement: $('div.scrollme'),
          scrollTarget: '.horiz'
        });
        return false;
      });

    });

  </script>
  <style type="text/css">
  		.PrevAddresses
		{
			width:100%;
		}
		.PrevAddresses .Address
		{
			width: 30%;
			min-width:200px;
			float: left;
			border: rgba(255,0,0,0.4) solid 1px;
			padding: 10px;
			margin: 10px;
		}
		.PrevAddresses .Address:hover
		{
			border: rgba(255,255,0,0.4) solid 1px;
		}
		.PrevAddresses .Address:active
		{
			background:rgba(200,200,200,0.4);
			cursor:pointer;
		}
  </style>
   <!-- Sweet Alert-->
	<link rel="stylesheet" href="<?php echo base_url();?>Sweetalert/sweetalert.css" type="text/css"></script>
	<script src="<?php echo base_url();?>Sweetalert/sweetalert-dev.js"></script>
	<script src="<?php echo base_url();?>Sweetalert/sweetalert.min.js"></script>
	<!-- Sweet Alert-->	
</head>

<body>
<div class="loader" id="loader">
    <table height="100%" width="100%"><tr><td valign="middle" align="center">
	<img src="<?php echo base_url();?>Main/images/loading.gif" width="100px" style="border-radius:50px" src="loading-img" />
	</td></tr></table>
</div>
<!-- Facebook Like-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=114222575894320";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Facebook Like-->
<!-- begin section -->
<div id="section">
   <a href="javascript:void(0)" class="toggle"><img src="<?php echo base_url();?>Main/images/toggle.png" alt="" /></a>
	<div class="nav">

    	<ul class="epadde">
        	<li><a class="smoothscroll" href="<?php echo base_url();?>">Home</a></li>
		    <li><a class="smoothscroll" href="<?php echo base_url();?>#p1">Hot-Selling</a></li>
			<li><a class="smoothscroll" href="<?php echo base_url();?>#p3">Recently Added</a></li>
		    <li><a class="smoothscroll" href="<?php echo base_url();?>#p2">Gallery</a></li>
			
			<li><a class="smoothscroll" href="<?php echo base_url();?>#Name">Contact Us</a></li>
			<li><a href="<?php echo base_url();?>Category/index"><span class="CartCount"><?php echo sizeof($CartItems);?></span><img src="<?php echo base_url();?>Main/images/cart.png" alt=""/></a></li>
			<?php 
			if(sizeof($UserDetail)==0)
			{?>
			<li class="extr-marg"><a href="<?php echo base_url();?>Home/SignIn">Sign in</a></li>
			<?php
			}
			else
			{
			?>
			<li class="extr-marg" >
			<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn"><a href="<?php echo base_url();?>Home/MyProfile"><?php echo $UserDetail[0]["FullName"];?></a></button>
				  <div id="myDropdown" class="dropdown-content">
					<a href="<?php echo base_url();?>Home/MyProfile">View Orders</a>
				    <a href="<?php echo base_url();?>Home/MyProfile">Edit Profile</a>
					<a href="<?php echo base_url();?>Wallet/Logout">Logout</a>
				  </div>
				</div>
			
			</li>
			<?php
			}
			?>
        </ul> 
		
		
    
    </div>
	  
	<!-- begin page-wrap -->
	<div id="page-wrap">
	
		<!-- begin header -->
		<div id="header-wrap">

			<!-- header block -->
            <div class="header-block">
			
			    <!--header section starts-->
				
				 <div class="head">
				 
					      <div class="hedA">  
							
							<div class="centering">
					   
					         <div class="hdd">
				
							       <div class="logo">
								   
								      <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>Main/images/logo.png" alt="logo"/></a>
								   
								   </div>
								   
								   <div class="nvvv">
								   
								    <a href="javascript:void(0)" class="toggle"><img src="<?php echo base_url();?>Main/images/toggle.png" alt="" /></a>
									  
									  <div class="nav">

										<ul>
											<li><a  class="smoothscroll" href="<?php echo base_url();?>#">Home</a></li>
											<li><a  class="smoothscroll" href="<?php echo base_url();?>#p1">Hot-Selling</a></li>
											<li><a  class="smoothscroll" href="<?php echo base_url();?>#p3">Recently Added</a></li>
											<li><a  class="smoothscroll" href="<?php echo base_url();?>#p2">Gallery</a></li>
											
											<li><a  class="smoothscroll" href="<?php echo base_url();?>#Name">Contact Us</a></li>
											<li><a href="<?php echo base_url();?>Category/index"><img src="<?php echo base_url();?>Main/images/cart.png" alt=""/></a></li>
											<?php 
											if(sizeof($UserDetail)==0)
											{?>
											<li><a href="<?php echo base_url();?>Home/SignIn"><img src="<?php echo base_url();?>Main/images/login.png" alt=""/></a></li>
											<?php
											}
											else
											{
											?>
											<li><a href="<?php echo base_url();?>Home/MyProfile"><img src="<?php echo base_url();?>Main/images/login.png" alt=""/><?php echo $UserDetail[0]["FullName"];?></a></li>
											<?php
											}
											?>
										</ul> 

												   
									</div>
					
								   
								    
								     <div class="left">
									       
									    
								        <div  class="mnnu">
										
										    

											   <ul>
											
												<li><a  class="smoothscroll" href="<?php echo base_url();?>#">Home</a></li>
												<li><a  class="smoothscroll" href="<?php echo base_url();?>#p1">Hot-Selling</a></li>
												<li><a  class="smoothscroll" href="<?php echo base_url();?>#p3">Recently Added</a></li>
												<li><a  class="smoothscroll" href="<?php echo base_url();?>#p2">Gallery</a></li>
												
												<li><a  class="smoothscroll" href="<?php echo base_url();?>#Name">Contact Us</a></li>		
											
											  </ul>
											  
										 </div>
									  </div>
									  <!--cart & login starts-->
										
										<div class="right">
										
										     <div class="cart">
											 
											    <!--<a href="<?php echo base_url();?>Category/index"><img src="<?php echo base_url();?>Main/images/cart-1.png" alt=""/></a>-->
												
												<div class="lrt">
												
												     <a id="CartCount"><?php echo sizeof($CartItems);?></a>
												
												</div>
												<div class="rryy">
												
												    <a href="<?php echo base_url();?>Category/index"><img src="<?php echo base_url();?>Main/images/cart-1.png" alt=""/></a>
												
												</div>
											 
											 </div>
											 <?php 
												if(sizeof($UserDetail)==0)
												{?>
											  <div class="log">
												 <a href="<?php echo base_url();?>Home/SignIn">Sign In</a>
											  </div>
											  	<?php
												}
												else
												{
												?>
											 <div class="user">
												
											   
											
												<div class="dropdown">
												  <button class="dropbtn"><?php echo $UserDetail[0]["FullName"];?></button>
												  <div class="dropdown-content">
													<a href="<?php echo base_url();?>Home/MyProfile">View Orders</a>
													<a href="<?php echo base_url();?>Home/MyProfile">Edit Profile</a>
													<a href="<?php echo base_url();?>Wallet/Logout">Logout</a>
												  </div>
												</div>
												
												
											 </div>
											<?php	
												}
												?>
												
										</div>
										
										<!--cart &  login ends-->
								   </div>
								  
							 </div>
					   
					     </div>
						 
						 </div>
				 
				 
				 </div>
				<!--header section ends-->
            
            </div>
            <!-- finish header block -->

		</div>
		<!-- finish header -->
		
		<!-- begin content -->
		<div id="content-wrap">

			<!-- begin centerwrap -->
			<div id="center-wrap">
				
				  <!--checkout block start-->
				  
				  <div class="check-bar">
				  
				       <div class="out">
					   
					        <div class="centering">
							
							    <div class="main">
								
								      <h2>Checkout Process</h2>
									 
									  <div class="box">
									  
									     
										 
										 <div class="right">
										 
										 
										     <div class="top">
											    
												<div class="extttr">
											    
											      <h2>Your Cart</h2>
												  
												</div>
												  
												  <div class="bxb" id="divCart">
											  
											  <?php 
											  $Total=0;
											  foreach($CartItems as $row)
											  {
												  ?>
											           <div class="leftt">
												   
												       <div class="gtt">
													   
													       <div class="cn">
																<img src="<?php echo base_url();?>Uploads/<?php echo $row["Image"];?>"/>
															   <!--a href=""><img src="<?php echo base_url();?>Main/images/remove.png" alt=""/></a-->
															
															</div>
													   
													        <div class="tx">
																
                                                              <div class="kyuu">
															  
															    <p><?php echo $row["ItemName"];?>(Qty:<?php echo $row["Quantity"];?>)</p>
															  
															  </div>									<div class="bttmm">
															  
															    <p>(Qty:<?php echo $row["Quantity"];?>)</p>
															  </div>
															</div>
															
													   </div>
													   <!--div class="rrt">
													   
													         <div class="count-input space-bottom">
                                                                  <a class="incr-btn" data-action="decrease" href="#">–</a>
                                                                  <input class="quantity" type="text" name="quantity" value="1"/>
                                                                  <a class="incr-btn" data-action="increase" href="#">&plus;</a>
                                                             </div>
													   
													   </div-->
												   
												   </div>
												   <div class="rltt">
												   
												      <p>&#8377;<?php echo $row["TotalPrice"];?></p>
												   
												   </div>
											<?php
											$Total=$Total+$row["TotalPrice"];
											  }
											  ?>											  
												   <div class="calu">												     <div class="mlbb">
												          <label>Total:</label>
														  <label>Coupon Code:</label>
														  <label>Coupon Discount:</label>
														  <label>Coupon CashBack:</label>
														   <label>Payable:</label>
													   </div>
													   <div class="klll">
													      <p id="Total"><?php echo $Total;?></p>
														  <p id="CouponCode">No Coupon Applied</p>
														  <p id="CouponDiscount">000.00</p>
														  <p id="CouponCashback">000.00</p>
														  <p id="Payable"><?php echo ($Total);?></p>
													   </div>
													  
												   
												   </div>
												   
											  
											  </div>
											 
											 </div>
											 
											 <div class="bttm">
												<table>
												<tr><td><label>Coupon code:</label></td>
												<td><input type="text" id="Coupon"></td>
												<td><button onclick="ApplyCoupon();" class="btn btn-danger">Apply</button></td></tr>
											     <!--tr><td colspan="2"><label><input type="checkbox" id="chkCust" onchange="CustDelivery();">Do you want to specify delivery time?</label></td></tr>
												 
												 <tr id="trVal" style="display:none;"><td colspan="2">
													<div class='input-group date' id='myDatepicker3'>
														<input type='text' class="form-control" name="DeliveryTime" id="DeliveryTime" value="<?php echo $MinH.":".$MinM;?>" />
														<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
														</span>
													</div>
													<td>
													</tr-->
												</table>
											 </div>
										 
										 </div>
									  
									  <div class="kmmhh">
									     
										   <h3>Delivery Details</h3>
									  <div class="PrevAddresses">
												<?php 
												foreach($Addresses as $Address)
												{
												?>
												<div class="Address" onclick="ReadAddress(<?php echo $Address["ID"]; ?>);">
													<p>
														Address Line 1: <?php echo $Address["AddressLine1"];?><br>
														Address Line 2: <?php echo $Address["AddressLine2"];?><br>
														Location: <?php echo $Address["Location"];?><br>
														Pin Code: <?php echo $Address["PinCode"];?>
													</p>
												</div>
												<?php
												}
												?>												
										</div>
										<div class="clearfix"></div>
									     <div class="left">

											 
											 <div class="frm">
											      <table>
													<!--Name,PhoneNo,HouseNo,Street,Location,City,PinCode,State-->
												    <tr><td><label>*Name: </label></td><td><input type="text" placeholder="Enter your name" name="Name" id="Name" value="<?php echo $CustomerName;?>" required></td></tr>
													
													<tr><td><label>Email ID: </label></td><td><input type="email" placeholder="Enter your Email ID" name="Email" id="Email" value="<?php echo $EmailID;?>" ></td></tr>
													
													<tr><td><label>*Phone No: </label></td><td><input type="number" placeholder="Enter your Phone No" name="PhoneNo" id="PhoneNo" required value="<?php echo $PhoneNo;?>"></td></tr>

												  </table>
											 
											 </div>
										 
										 </div>
										 
										 <!--2nd-->
										 <div class="left">
											 <div class="frm">
											 
											      <table>
													<!--Name,PhoneNo,HouseNo,Street,Location,City,PinCode,State-->
													
													<tr><td><label>*Address Line 1: </label></td><td><input type="text" placeholder="Address Line 1" name="AddressLine1" id="AddressLine1" required></td></tr>
													
													<tr><td><label>Address Line 2: </label></td><td><input type="text" placeholder="Address Line 2" name="AddressLine2" id="AddressLine2" ></td></tr>
													<tr><td><label>*Pin Code: </label></td><td><input type="text" placeholder="Enter your Pin code" name="PinCode" id="PinCode" onchange="GetLocation();" value="<?php echo $Area;?>" required></td></tr>
													
												  
												  </table>
											 
											 </div>
										 
										 </div>
										 
										 
										 <!--3rd-->
										 <div class="left">

											 <div class="frm">
											 
											      <table>
													<!--Name,PhoneNo,HouseNo,Street,Location,City,PinCode,State-->
												    
													<tr><td><label>*Location: </label></td><td>
													<select name="Location" id="Location">
													
													</select>
													</td></tr>
													
													<tr><td><label>City: </label></td><td><input type="text" placeholder="Enter your City" name="City" id="City" value="Guwahati" readonly></td></tr>
													
													<tr><td><label>State: </label></td><td><input type="text" placeholder="Enter your State" name="State" id="State" value="Assam" readonly></td></tr>
													<tr><td colspan="2"><input type="checkbox" id="chkNewAdd" value="1"> Save this address</td></tr>

												  </table>
											 
											 </div>
										 
										 </div>
										 
										 
									    </div>
										
										 
										 <!--procced button-->
										 
										 <div class="prrs">
										 
										      <button type="submit" form="nameform" value="Submit" onclick="PlaceOrder();">Place an Order</button>
										 
										 </div>
									  
									  </div>
								
								</div>
							
							</div>
					   
					   </div>
				  
				  </div>
				  
				  <!--checkout block ends-->
				  
	
			</div>
			<!-- finish center wrap -->
			
		</div>
		<!-- finish content -->
		
	<!-- begin footer -->
		<div id="footer-wrap">

			<!-- footer block -->
            <div class="footer-block">
            
            	<div class="foot">
				
				          <div class="centering">
						  
						       <div class="contact">
							   
							   
							        <div class="left">
									
									       <h3>Address</h3>
										   
										   <ul>
												<!--li>Rishi Raj Palace, House no. 86</li>
												<li>Bye Lane No. 1, Purbanchal Nagar</li-->
												<li>Narengi Tiniali</li>
												<li>Guwahati: 781026</li>
												<li>Contact No: +91-81349-79429</li>
										   </ul>
										   
										   <div class="social">
										        <ul>
												    <li><a href="https://play.google.com/store/apps/details?id=com.ionicframework.classicdine489679"><img src="<?php echo base_url();?>Main/images/playstore.png" alt="" style="width: 131px; padding: 5px; image-rendering: unset;"/></a></li>
													<!--li><a href=""><img src="<?php echo base_url();?>Main/images/tw.png" alt=""/></a></li>
													<li><a href=""><img src="<?php echo base_url();?>Main/images/fb.png" alt=""/></a></li>
													<li><a href=""><img src="<?php echo base_url();?>Main/images/in.png" alt=""/></a></li>
													<li><a href=""><img src="<?php echo base_url();?>Main/images/fb.png" alt=""/></a></li>
													<li><a href=""><img src="<?php echo base_url();?>Main/images/fb.png" alt=""/></a></li-->
												</ul>
										   </div>
										<div class="fb-like" data-href="https://www.facebook.com/Classic-Dine-1298500520261098" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
									
									</div>
									
									<div class="right">
									
									     <h3>Feedback </h3>
										 
										 <div class="bx">
										 
										      <table>
										 
										         <tr><td><input type="text" placeholder="Enter your Name" name="Name" id="Name" ></td></tr>
											   
											     <tr><td><input type="text" placeholder="Enter your Phone No" name="PhoneNo" id="PhoneNo" ></td></tr>
											   
											     <tr><td><input type="text" placeholder="Enter your Email ID" name="Email" id="Email" ></td></tr>
											   
											     <tr><td><textarea rows="4" cols="50" placeholder="Type your Description" name="description" id="Detail"></textarea>
											   </td></tr>
											   
											  </table>
											  
											  <div class="ddm">
								                   
												   <form>
									
								                     <button type="submit" form="nameform" value="Submit" onclick="return SendMail();">Submit</button>
									  
								                  </form>
												  
								              </div>
										 
										 </div>
									
									</div>
									
									
									
							   </div>
							   
						  
						  </div>
						  
						  <!--footer bottom section starts-->
									
									 <div class="bttm">
									 
									       <h2>All Right Reserved &copy; 2017</h2>
									 
									 </div>
									
						<!--footer bottom section ends-->
							   
							   
				
				</div>
            
            </div>
            <!-- finish footer block -->

		</div>
		<!-- finish footer -->
		
	</div>
	<!-- finish page wrap -->
	
</div>
<!-- finish section -->
<!--onclick dropwodn starts-->
<script>

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>


<!--onclick dropdown ends--> 
<!--mixitup script starts-->
<script src="<?php echo base_url();?>Main/js/mixup/mixitup.min.js"></script>

        <script>
            var container = document.querySelector('[data-ref="container"]');
            var inputSearch = document.querySelector('[data-ref="input-search"]');
            var keyupTimeout;

            var mixer = mixitup(container, {
                animation: {
                    duration: 350
                },
                callbacks: {
                    onMixClick: function() {
                        // Reset the search if a filter is clicked

                        if (this.matches('[data-filter]')) {
                            inputSearch.value = '';
                        }
                    }
                }
            });

            // Set up a handler to listen for "keyup" events from the search input

            inputSearch.addEventListener('keyup', function() {
                var searchValue;

                if (inputSearch.value.length < 3) {
                    // If the input value is less than 3 characters, don't send

                    searchValue = '';
                } else {
                    searchValue = inputSearch.value.toLowerCase().trim();
                }

                // Very basic throttling to prevent mixer thrashing. Only search
                // once 350ms has passed since the last keyup event

                clearTimeout(keyupTimeout);

                keyupTimeout = setTimeout(function() {
                    filterByString(searchValue);
                }, 350);
            });

            /**
             * Filters the mixer using a provided search string, which is matched against
             * the contents of each target's "class" attribute. Any custom data-attribute(s)
             * could also be used.
             *
             * @param  {string} searchValue
             * @return {void}
             */

            function filterByString(searchValue) {
                if (searchValue) {
                    // Use an attribute wildcard selector to check for matches

                    mixer.filter('[class*="' + searchValue + '"]');
                } else {
                    // If no searchValue, treat as filter('all')

                    mixer.filter('all');
                }
            }
        </script>

<!--mixitup script ends-->

<!--owl slider script starts-->

        <script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 5,
                    nav: true,
                    loop: false,
                    margin: 20
                  }
                }
              })
            })
          </script>
<!--owl slider script ends-->
 <!-- javascript -->
    <script src="js/owl/jquery.min.js"></script>
    <script src="js/owl/owl.carousel.js"></script>
	
<!--main js file-->
<script src="<?php echo base_url();?>Main/js/jquery-1.11.3.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>Main/js/jquery.flexslider.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>Main/js/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>Main/js/jquery.smooth-scroll.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>Main/js/jquery.rotate.js"></script>
<script src="<?php echo base_url();?>Main/js/jquery.fancybox.js"></script>
<script src="<?php echo base_url();?>Main/js/custom.js" type="text/javascript"></script>
<script type="text/javascript">
	
	$('.smoothscroll').smoothScroll();
	
</script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#slideImg").rotate();
    });
  </script>
  
  <script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
<!--smooth scroll-->
<!--mixup script-->
<script src="js/mixup/mixitup.min.js"></script>
<script>
            var containerEl = document.querySelector('.container');

            var mixer = mixitup(containerEl, {
                animation: {
                    animateResizeContainer: false // required to prevent column algorithm bug
                }
            });

            // NB: See comments in stylesheet regarding fixes for chrome and safari "flickering"
        </script>

<!--coupon script-->
<script src="<?php echo base_url();?>Main/js/coupon/Selectyze.jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>Main/js/coupon/owl.carousel.js"></script>
<!-- bootstrap-daterangepicker -->
	 <link href="<?php echo base_url();?>Admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>Admin/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url();?>Admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	    <!-- Initialize datetimepicker -->
<script>
    $('#myDatepicker').datetimepicker();
    $('#myDatepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'HH:mm'
    });
    
    $('#myDatepicker4').datetimepicker({
        format: 'HH:mm'
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
	
	ReadCouponApplied();
	
});
function ReadCouponApplied()
{
	var Total=parseFloat(document.getElementById("Total").innerHTML);
	var Discount=parseFloat(document.getElementById("CouponDiscount").innerHTML);
	var Cashback=parseFloat(document.getElementById("CouponCashback").innerHTML);
	var Payable=parseFloat(document.getElementById("Payable").innerHTML);
	var url="<?php echo base_url();?>Coupon/ReadTempAppliedCoupon";
	$.ajax({ 
		url: url,
		dataType: 'json',
		beforeSend:function(){
			$('#loader').show();
		},
		success: function (data) 
		{
			$('#loader').hide();
			for(var i=0;i<data.length;i++)
			{
				document.getElementById("CouponCode").innerHTML=data[i].CouponCode;
				document.getElementById("CouponDiscount").innerHTML=data[i].CouponDiscount;
				document.getElementById("CouponCashback").innerHTML=data[i].CouponCashback;
				Total=Total-parseFloat(data[i].CouponDiscount);
				Payable=Total;
				document.getElementById("Payable").innerHTML=Payable.toString();
			}
		},
		error:function()
		{
			$('#loader').hide();
			//swal("Oops...", "Something went wrong!", "error");
		}
	});
}
function ApplyCoupon()
{
	var Coupon=document.getElementById("Coupon").value;
	var url="<?php echo base_url();?>Coupon/ApplyTempCoupon?CouponCode="+Coupon;
	$.ajax({ 
		url: url,
		dataType: 'json',
		beforeSend:function(){
			$('#loader').show();
		},
		success: function (data) 
		{
			$('#loader').hide();
			swal("Message", data);
			ReadCouponApplied();
		},
		error:function()
		{
			$('#loader').hide();
			//swal("Oops...", "Something went wrong!", "error");
		}
	});
}
function PlaceOrder()
{
	//var chkCust=document.getElementById("chkCust");
	var DelivertyTime="";
	/*var H=0;
	var M=0;
	if(chkCust.checked==true)
	{
		var DeliveryT=document.getElementById("DeliveryTime").value;
		H=DeliveryT.substring(0,DeliveryT.indexOf(":"));
		M=DeliveryT.substring(DeliveryT.indexOf(":")+1);
	}
	else
	{
		var d=new Date();
		H=d.getHours()+2;
		if(H>=24)
		{
			H=H-24;
		}
		M=d.getMinutes();
	}
	if(H.length==1)
	{
		H="0"+H.toString();
	}
	if(M.length==1)
	{
		M="0"+M.toString();
	}
	DelivertyTime=H+":"+M+":00";*/
	var Total=parseFloat(document.getElementById("Total").innerHTML);
	var CouponCode=document.getElementById("CouponCode").innerHTML;
	var CouponDiscount=parseFloat(document.getElementById("CouponDiscount").innerHTML);
	var CouponCashBack=parseFloat(document.getElementById("CouponCashback").innerHTML);
	var Payable=parseFloat(document.getElementById("Payable").innerHTML);
	var Name=document.getElementById("Name").value;
	var Email=document.getElementById("Email").value;
	var PhoneNo=document.getElementById("PhoneNo").value;
	var AddressLine1=document.getElementById("AddressLine1").value;
	var AddressLine2=document.getElementById("AddressLine2").value;
	var Location=document.getElementById("Location").value;
	var City=document.getElementById("City").value;
	var PinCode=document.getElementById("PinCode").value;
	var State=document.getElementById("State").value;
	var chkNewAdd=document.getElementById("chkNewAdd");
	var chk=0;
	/*if(chkCust.checked==false)
	{
		DelivertyTime="";
	}*/
	if(chkNewAdd.checked==true)
	{
		chk=1;
	}
	if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Email)) && Email!="")
	{
		swal("Oops...", "Invalid Email ID", "error");
		document.getElementById("Email").focus();
		return false;
	}
	if(isNaN(PhoneNo) && PhoneNo!="")
	{
		swal("Oops...", "Invalid Mobile No", "error");
		document.getElementById("PhoneNo").focus();
		return false;
	}
	if(PhoneNo.length!=10)
	{
		swal("Oops...", "Invalid Mobile No", "error");
		document.getElementById("PhoneNo").focus();
		return false;
	}
	if(Name.trim()!="" && PhoneNo.trim()!="" && AddressLine1.trim()!="" && Location!="0" && PinCode!="")
	{
		var data={
			'DeliveryTime' : DelivertyTime,
			'Total' : Total,
			'CouponCode' : CouponCode,
			'CouponDiscount' : CouponDiscount,
			'CouponCashBack' : CouponCashBack,
			'Payable' : Payable,
			'Name' : Name,
			'Email' : Email,
			'PhoneNo' : PhoneNo,
			'AddressLine1' : AddressLine1,
			'AddressLine2' : AddressLine2,
			'Location' : Location,
			'City' : City,
			'PinCode' : PinCode,
			'State' : State,
			'NewAddress': chk
		};
		
		var url="<?php echo base_url();?>Order/SaveOrderFromWebsite";
		$.ajax({ 
			url: url,
			type: 'POST',
			data: data,
			dataType: 'json',
			beforeSend:function(){
				$('#loader').show();
			},
			success: function (data) 
			{
				$('#loader').hide();
				swal("Message",data.Message);
				if(data.Error==0)
				{
					window.location.href = "<?php echo base_url();?>home/OrderTrack/"+data.OrderID.toString()+"";
				}
			},
			error:function()
			{
				$('#loader').hide();
				swal("Oops...", "Cannot be placed", "error");
			}
		});
	}
	else
	{
		if(Name.trim()=="")
		{
			swal("Oops...", "Name cannot be empty", "error");
			document.getElementById("Name").focus();
		}
		else if(PhoneNo.trim()=="")
		{
			swal("Oops...", "Phone No cannot be empty", "error");
			document.getElementById("PhoneNo").focus();
		}
		else if(AddressLine1.trim()=="")
		{
			swal("Oops...", "Address Line 1 cannot be empty", "error");
			document.getElementById("AddressLine1").focus();
		}else if(Location.trim()=="")
		{
			swal("Oops...", "Location cannot be empty", "error");
			document.getElementById("PinCode").focus();
		}
		
	}
}
function SendMail()
{
	var Name=document.getElementById("Name").value;
	var PhoneNo=document.getElementById("PhoneNo").value;
	var Email=document.getElementById("Email").value;
	var Message=document.getElementById("Detail").value;
	$.ajax({
		url:'<?php echo base_url();?>/Home/SendMail',
		type: 'POST',
		data:{"Name": Name, "PhoneNo": PhoneNo, "Email": Email, "Message": Message},
		dataType:'JSON',
		beforeSend:function(){
			$('#loader').show();
		},
		success: function(data){
			$('#loader').hide();
			swal("Message", data, "success");
		},
		error: function(){
			$('#loader').hide();
			swal("Oops...", "Message not sent", "error");
		}
	});
}
function CustDelivery()
{
	/*var chkCust=document.getElementById("chkCust");
	if(chkCust.checked==true)
	{
		document.getElementById("trVal").style.display="block";
		CheckTime();
	}
	else
	{
		document.getElementById("trVal").style.display="none";
	}*/
}

</script>
<script>
function GetLocation()
{
	var PinCode=document.getElementById("PinCode").value;
	var url="<?php echo base_url();?>Others/GetArea?PinCode="+PinCode;
	$.ajax({
		url: url,
		dataType:'json',
		success:function(data)
		{
			var x = document.getElementById("Location");
			for(var j=0;j<x.length;j++)
			{
				x.remove(j);
			}
			if(data.length>0)
			{
				for(var i=0;i<data.length;i++)
				{
					var option = document.createElement("option");
					option.text = data[i].PlaceName;
					option.value= data[i].ID;
					x.add(option);
				}
				//document.getElementById("Location").value=data[0]["PlaceName"];
			}
			else
			{
				swal("Error","Delivery Not Available in this Area","error");
				var x = document.getElementById("Location");
				var option = document.createElement("option");
				option.text ="Delivery Unavailable";
				option.value= "0";
				x.add(option);
			}
		},
		error:function()
		{
			//swal("Oops...", "Something went wrong!", "error");
		}
	});
}
function ReadAddress(id)
{
	var url="<?php echo base_url();?>Wallet/GetAddressByID?ID="+id;
	$.ajax({
		url:url,
		dataType:'json',
		beforeSend:function(){
			$('#loader').show();
		},
		success:function(data)
		{
			$('#loader').hide();
			if(data.length>0)
			{
				document.getElementById("Name").value=data[0].Name;
				document.getElementById("PhoneNo").value=data[0].PhoneNo;
				document.getElementById("AddressLine1").value=data[0].AddressLine1;
				document.getElementById("AddressLine2").value=data[0].AddressLine2;
				document.getElementById("PinCode").value=data[0].PinCode;
				document.getElementById("Location").value=data[0].Location;
				document.getElementById("City").value=data[0].City;
				document.getElementById("State").value=data[0].State;
			}
			else
			{
				document.getElementById("Name").value="";
				document.getElementById("Email").value="";
				document.getElementById("PhoneNo").value="";
				document.getElementById("AddressLine1").value="";
				document.getElementById("AddressLine2").value="";
				document.getElementById("PinCode").value="";
				document.getElementById("Location").value="";
				document.getElementById("City").value="";
				document.getElementById("State").value="";
			}
		},
		error:function()
		{
			$('#loader').hide();
			//swal("Oops...", "Something went wrong!", "error");
		}
	});
}
</script>
</body>

</html>