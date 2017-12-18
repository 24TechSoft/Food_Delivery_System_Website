<!DOCTYPE html>
<html>

<head>

	<title>Profile</title>

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
  <!-- Sweet Alert-->
	<link rel="stylesheet" href="<?php echo base_url();?>Sweetalert/sweetalert.css" type="text/css"></script>
	<script src="<?php echo base_url();?>Sweetalert/sweetalert-dev.js"></script>
	<script src="<?php echo base_url();?>Sweetalert/sweetalert.min.js"></script>
	<!-- Sweet Alert-->	
  
  
</head>

<body>
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

    	<ul>
        	<li><a class="smoothscroll" href="<?php echo base_url();?>">Home</a></li>
		    <li><a class="smoothscroll" href="<?php echo base_url();?>#p1">Hot-Selling</a></li>
			<li><a class="smoothscroll" href="<?php echo base_url();?>#p3">Recently Added</a></li>
		    <li><a class="smoothscroll" href="<?php echo base_url();?>#p2">Gallery</a></li>
			
			<li><a class="smoothscroll" href="<?php echo base_url();?>#Name">Contact Us</a></li>
			<li><a href="<?php echo base_url();?>Category/index"><span class="CartCount">5</span><img src="<?php echo base_url();?>Main/images/cart.png" alt=""/></a></li>
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
											<li><a class="smoothscroll" href="<?php echo base_url();?>">Home</a></li>
											<li><a class="smoothscroll" href="<?php echo base_url();?>#p1">Hot-Selling</a></li>
											<li><a class="smoothscroll" href="<?php echo base_url();?>#p3">Recently Added</a></li>
											<li><a class="smoothscroll" href="<?php echo base_url();?>#p2">Gallery</a></li>
											
											<li><a class="smoothscroll" href="<?php echo base_url();?>#Name">Contact Us</a></li>
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
											
												<li><a  class="smoothscroll" href="<?php echo base_url();?>">Home</a></li>
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
												
												     <a class="CartCount">5</a>
												
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
				<?php 
					if(sizeof($CouponList)>0)
					{
						?>
				<div class="coupon-bar">
			   
			        <div class="center">
					
					       <div class="blk">
						   
						       <div class="owl-carousel">
							   <?php
							   foreach($CouponList as $Coupon)
							   {
							   ?>
							   
							       <div class="item">
                            
                            	      <img src="<?php echo base_url();?>Uploads/<?php echo $Coupon["Image"];?>" alt="">
									  
									  <div class="overlay">
									  
									      <p><?php echo $Coupon["Name"];?></p>
										  
									  
									  </div>
                            
                                   </div>
								<?php
							   }
								?>
							   </div>
						     
						   </div>
					
					</div>
			   
			   </div>
			   <?php
					}
				?>
				  <div class="proff-bar">
				  
				       <div class="fill">
					   
					        <div class="centering">
							
							    <div class="pggm">
								
								      <h2>Profile</h2>
									  
									  
									    <div class="roofft">
										
										     <div class="recnt">
											 
											    <table>
												
												    <tr><td><label>User Name: </label></td><td><input type="text" placeholder="Enter your name" name="Code" value="<?php echo $UserDetail[0]["FullName"];?>" id="Code" readonly></td></tr>
													
													<tr><td><label>User ID: </label></td><td><input type="text" placeholder="Enter User ID" name="Code" value="<?php echo $UserDetail[0]["UserID"];?>" id="Code" readonly></td></tr>
													
													<tr><td><label>Email ID: </label></td><td><input type="text" placeholder="Enter your Email ID" name="Code" value="<?php echo $UserDetail[0]["EmailID"];?>" id="Code" readonly></td></tr>
													
													<tr><td><label>Phone No: </label></td><td><input type="text" placeholder="Enter your Phone No" name="Code" value="<?php echo $UserDetail[0]["MobileNo"];?>" id="Code" readonly></td></tr>
													
													<tr><td><label>Wallet: </label></td><td><input type="text" placeholder="1000.00" name="Code" id="Code" readonly></td>
													
													</tr>
													
													<tr><td><label></label></td>
													  <td>
														   <div class="con-fmm">
															
																<button type="submit" form="nameform" value="Submit" onclick="ViewWallet();">View Details</button>
															
														   </div>
													   </td>
													</tr>
												
													<tr><td><label>Password: </label></td><td>
														<input type="password" placeholder="Old Password" id="OldPassword">
														
													    <input type="password" placeholder="New Password" id="NewPassword">
													
													    <input type="password" placeholder="Confirm Password" id="ConfirmPassword">
													
													</td>
												 
													</tr>
													
												
												</table>
												  
													<div class="starrt">
														   
														<button type="submit" form="nameform" value="Submit" onclick="UpdatePassword();">Change Password</button>
														   
													</div>
													
											 </div>
											 
											 <!--top content part ends-->
											 
										</div>
										
										
											 <!--bottom content part starts-->
											 
											   <div class="entt">
											   
											   
											        <div class="orerr">
													
													    <h2>Recent Order</h2>
													
													
													     <div class="bvx">
														 
														 <?php
															foreach($Orders as $row)
															{
														?>
															<div class="lrttn">
															
															
															     <table>
																	<tr><td><label>Order No: </label></td><td><p><?php echo $row["ID"];?></p></td></tr>
																    <tr><td><label>Order Date: </label></td><td><p><?php echo $row["OrderDate"];?></p></td></tr>
													
													                <tr><td><label>Total Price: </label></td><td><p><?php echo $row["GrandTotal"];?></p></td></tr>
																	
																	<tr><td><label>Order Status: </label></td><td><p>
																	<?php if($row["Status"]==0)
																	{
																		echo "Order Placed";
																	}
																	else if($row["Status"]==1)
																	{
																		echo "Order Confirmed";
																	}
																	else if($row["Status"]==2)
																	{
																		echo "Dispatched";
																	}
																	else if($row["Status"]==3)
																	{
																		echo "Delivered";
																	}
																	else if($row["Status"]=4)
																	{
																		echo "Cancelled";
																	}
																	?>
																	</p></td></tr>
																 
																 </table>
																 
																 <!--button stars-->
															
															       <div class="rec-sm">
																   
																       <button id="myBtn<?php echo $row["ID"];?>" type="submit" form="nameform" value="Submit" onclick="ShowModal('myModal<?php echo $row['ID'];?>');">Details</button>
																	   <a href="<?php echo base_url();?>Home/OrderTrack/<?php echo $row["ID"];?>">Click to Track</a>
																	 
																	   <!--popup starts-->
																	   
																			<div id="myModal<?php echo $row["ID"]?>" class="modal">

																			  <div class="modal-content">
																				<span class="close" onclick="HideModal('myModal<?php echo $row['ID'];?>');">&times;</span>
																				
																				  <!--box starts-->
																				  
																				     <div class="box">
																					 
																					 
																					    <div class="left">
																						
																						     <h3>Item Name</h3>
																							 
																							 <ul>
																							<?php
																							foreach($row["OrderItems"] as $Items)
																							{?>
																							    <li><?php echo $Items["ItemName"];?></li>
																							<?php
																							}?>
																							 </ul>
																						
																						</div>
																						
																						<div class="right">
																						
																						
																						     <div class="ott">
																							 
																							    
																								<h3>Quantity</h3>
																							 
																							 <ul>
																							 
																							<?php
																							foreach($row["OrderItems"] as $Items)
																							{?>
																							    <li><?php echo $Items["Quantity"];?></li>
																							<?php
																							}?>
																							 
																							 </ul>
																							 
																							 
																							 </div>
																							 
																							 <div class="rtt">
																							 
																							 
																							    <h3>Total Price</h3>
																							 
																							 <ul>
																							 
																							<?php
																							foreach($row["OrderItems"] as $Items)
																							{?>
																							    <li><?php echo $Items["TotalPrice"];?></li>
																							<?php
																							}?>
																							 
																							 </ul>
																								
																							 
																							 </div>
																						
																						
																						</div>
																					 
																					 
																					 </div>
																				  
																				  <!--box ends-->
																				  
																				  
																			  </div>

																			</div>
																		
                                                                       <!--popup ends-->
																   
																   </div>
															
															     <!--buton ends-->
															
															</div>
															<?php
															}
															?>
															<!--left side ends-->
		
														 
														 
														 </div>
													
													
													</div>
											   
											   
											   </div>
											 
											 <!--bottom content part ends-->
											 
								
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
										 
										         <tr><td><input type="text" placeholder="Enter your Name" name="Code" id="Code" ></td></tr>
											   
											     <tr><td><input type="text" placeholder="Enter your Phone No" name="Code" id="Code" ></td></tr>
											   
											     <tr><td><input type="text" placeholder="Enter your Email ID" name="Code" id="Code" ></td></tr>
											   
											     <tr><td><textarea rows="4" cols="50" placeholder="Type your Description" name="description" id="Detail"></textarea>
											   </td></tr>
											   
											  </table>
											  
											  <div class="ddm">
								                   
												   <form>
									
								                     <button type="submit" form="nameform" value="Submit">Submit</button>
									  
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
<!--popup script starts-->
	<script>
		function UpdatePassword()
		{
			 var OldPassword=document.getElementById("OldPassword").value;
			 var NewPassword=document.getElementById("NewPassword").value;
			 var ConfirmPassword=document.getElementById("ConfirmPassword").value;
			 if(OldPassword!="" && NewPassword!="" && ConfirmPassword!="")
			 {
				 if(NewPassword==ConfirmPassword)
				 {
					 if(NewPassword.length>=8)
					 {
						$.ajax({
							url: '<?php echo base_url();?>Wallet/UpdatePassword',
							type: 'post',
							data: {'OldPass' : OldPassword,'NewPass' : NewPassword,'ConPass' : ConfirmPassword},
							dataType:'json',
							success: function(data)
							{
								alert(data);
								document.getElementById("OldPassword").value="";
								document.getElementById("NewPassword").value="";
								document.getElementById("ConfirmPassword").value="";
							},
							error: function()
							{
								swal("Oops...", "Something went wrong!", "error");
							}
						});
					 }
					 else
					 {
						 swal("Oops...", "Password must be at least of 8 characters", "error");
					 }
				 }
				 else
				 {
					 swal("Oops...", "New password and confirm password must be same", "error");
				 }
			 }
			 else
			 {
				 swal("Oops...", "Fields cannot be empty", "error");
			 }
		}
	</script>
     <script>
	function ShowModal(ID)
	{
		document.getElementById(ID).style.display="block";
	}
	function HideModal(ID)
	{
		document.getElementById(ID).style.display="none";
	}
	
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	
	function ViewWallet()
	{
		window.location.href="<?php echo base_url();?>Home/Wallet";
	}
	</script>
	 
  <!--popup script ends-->
<!--mixitup script starts-->
<script src="js/mixup/mixitup.min.js"></script>

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
    <script src="<?php echo base_url();?>Main/js/owl/jquery.min.js"></script>
    <script src="<?php echo base_url();?>Main/js/owl/owl.carousel.js"></script>
	
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
<script src="<?php echo base_url();?>Main/js/mixup/mixitup.min.js"></script>
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
<script>
var counter=setInterval(ReadCart, 1000);
$(document).ready(function(){
	ReadCart();
});
function ReadCart()
{
	$.ajax({ 
		url: '<?php echo base_url();?>Home/ReadData',
		dataType: 'json',
		success: function (data) 
		{
			var CartCount=document.getElementsByClassName("CartCount");
			for(var i=0;i<CartCount.length;i++)
			{
				CartCount[i].innerHTML=data.length;
			}
		},
		error: function()
		{
		}
	});
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
		success: function(data){
			alert();  
			swal("Message...", data , "success");
		},
		error: function(){
			swal("Oops...", "Message not sent", "error");
		}
	});
}
</script>
</body>

</html>