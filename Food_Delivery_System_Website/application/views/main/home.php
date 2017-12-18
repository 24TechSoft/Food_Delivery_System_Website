<!DOCTYPE html>
<html>

<head>

	<title>Classic Dine | Home</title>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109298449-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	
	gtag('config', 'UA-109298449-1');
	</script>
	<meta property="og:url"           content="http://www.classicdine.com" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Classic Dine, Online restaurent service in Guwahati" />
	<meta property="og:description"   content="Classic Dine" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Classic Dine is a online restaurent service in Guwahati, Assam.">
    <meta name="keywords" content="Online restaurent in Guwahati, Kababs in Guwahati, Chicken in Guwahati, Grills in Guwahati, Tanddors in Guwahati">
    <meta name="author" content="Classic Dine">
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
	function ChangeLocation()
	{
		var Pincode=document.getElementById("Area").value;
		document.cookie = "Area="+Pincode;
		/*var x = document.cookie; 
		var decodedCookie = decodeURIComponent(x);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) 
		{
			var c = ca[i];
			while (c.charAt(0) == ' ') 
			{
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) 
			{
				alert( c.substring(name.length, c.length));
			}
		}
		//alert(x);*/
	}
  </script>

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
								   
								   
									  <div class="nav">

										<ul>
											<li><a class="smoothscroll" href="#">Home</a></li>
											<li><a class="smoothscroll" href="#p1">Hot-Selling</a></li>
											<li><a class="smoothscroll" href="#p3">Recently Added</a></li>
											<li><a class="smoothscroll" href="#p2">Gallery</a></li>
											<li><a class="smoothscroll" href="#Name">Contact Us</a></li>
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
											
												<li><a  class="smoothscroll" href="#">Home</a></li>
												<li><a  class="smoothscroll" href="#p1">Hot-Selling</a></li>
												<li><a  class="smoothscroll" href="#p3">Recently Added</a></li>
												<li><a  class="smoothscroll" href="#p2">Gallery</a></li>
												<li><a  class="smoothscroll" href="#Name">Contact Us</a></li>		
											
											  </ul>
											  
										 </div>
									  </div>
									  <!--cart & login starts-->
										
										<div class="right">
										
										     <div class="cart">
											 
											    <!--<a href="<?php echo base_url();?>Category/index"><img src="<?php echo base_url();?>Main/images/cart-1.png" alt=""/></a>-->
												
												<div class="lrt">
												
												     <a class="CartCount" href="<?php echo base_url();?>Category/index">5</a>
												
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
            
                <div class="banner">
				
                
                	<div class="flexslider">
					
					   
					
					         <div class="caption">
							 
							       
								   <div class="marrk">
								   
								        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"><a href="" class="mnnn"></a></marquee>
								   
								   
								    </div>
								   
								        <h4>Order Delivery & Take-Out</h4>
								
									 <div class="new">
									 
									     <div class="box">
										 
										       <select onchange="ChangeLocation();" ID="Area">
													<option value="0">Locality...</option>
													<?php
													foreach($Locations as $row)
													{
														?>
											        <option value="<?php echo $row["Pincode"];?>" <?php if($Area==$row["Pincode"]){echo "selected='selected'";}?>><?php echo $row["PlaceName"];?></option>
													<?php
													}
													?>
													
											  </select>
										 
										 </div>
										 <div class="enter">
										 
										       <input type="text" placeholder="Search your dishes.." onchange="Search();" id="Search">
										 
										 
										 </div>
									 
									 </div>
									
								</div>
					
					        
                    	<ul class="slides">
                        
                        	<li>
								
								<img src="<?php echo base_url();?>Main/images/smaple-1.jpg" alt="" />
								
							</li>
							<li>
								
								
								<img src="<?php echo base_url();?>Main/images/smaple-1.jpg" alt="" />
								
							</li>
                            <li>
								
								<img src="<?php echo base_url();?>Main/images/smaple-1.jpg" alt="" />
								
							</li>
                        
                        </ul>
                 
                    
                    </div>
                
                </div>
            
            </div>
            <!-- finish header block -->

		</div>
		<!-- finish header -->
		
		<!-- begin content -->
		<div id="content-wrap">

			<!-- begin centerwrap -->
			<div id="center-wrap">
				<!-- voor block -->
                <div class="voor-block">
                	<div class="down">
                	<a href="#center-wrap" class="smoothscroll"><img src="<?php echo base_url();?>Main/images/down-arrow.png" alt="" /></a>
                    </div>
                </div>
                <!-- finish voor block -->
				
				<!--category block starts-->
				
				 <div class="category-bar">
				 
				     <div class="main">
					 
					       <div class="centering">
						   
						        <div class="centering">
								
								      <div class="grp">
									  
									       <h2>Categories</h2>
										<?php
										foreach($Categories as $row)
										{
											?>
									       <div class="box">
										   
										          <div class="icn">
												  
												      <a href="<?php echo base_url();?>Category/index?Category=<?php echo $row["CName"];?>"><img src="<?php echo base_url();?>Uploads/<?php echo $row["Photo"];?>" alt="<?php echo $row["CName"];?>"/></a>
													 
													 <div class="overlay">
													 
													 
													 <a href="<?php echo base_url();?>Category/index?Category=<?php echo $row["CName"];?>"><i class="fa fa-link" aria-hidden="true"></i></a>
													 
													 </div>
												  
												  </div>
												  
												  <h3><?php echo $row["CName"];?></h3>
												  
										   
										   </div>
										   <?php
										}
										?>
									  
									  </div>
								
								</div>
						   
						   </div>
					 
					 </div>
				 
				 </div>
				
				<!--category block ends-->
				
				 <!--coupon block starts-->
			
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
			  
			  <!--coupon block ends-->
			
				<!--menu block starts-->
				
				 <div class="menu-bar">
				 
				    <div class="centering">
					
					     <div class="dise">
						 
						       <div class="mnu">

							   
							       <h2 id="p1">Hot-Selling</h2>
								   <!--p >We strive for quality and hygiene, no compromise whatsoever. Hence we pick the best ingredients from the market and weave our magic into it to produce some mouthwatering dishers for you. Eat healthy, stay healthy!</p-->
							   
							   </div>
						 
						 <div class="owl-carousel owl-theme">
						 
						 <?php
						 foreach($MenuList as $Menu)
						 {
						 ?>
						   <div class="box">
							
							    <div class="igg">
								
								    <img src="<?php echo base_url();?>Uploads/<?php echo $Menu["Image"];?>" alt=""/>
									<img src="<?php echo base_url();?>Main/images/<?php if($Menu["ItemType"]==1) echo "veg"; else{ echo "nonveg"; }?>.jpg" alt="Vegeterian" class="food-type"/>
								</div>
								<div class="down">
								    <span>&#8377; <?php echo $Menu["FullPrice"]; ?></span>
								    <h3><?php echo $Menu["ItemName"];?></h3>
								    <p><?php echo $Menu["ItemDescription"];?></p>
									<div class="bttm">
									     <div class="count-input space-bottom">
                                              <!--a class="incr-btn" data-action="decrease" href="#">–</a-->
                                              <input class="quantity" type="text" name="Quantity<?php echo $Menu["ID"];?>" id="Quantity<?php echo $Menu["ID"];?>" value="1" style="display:none;"/>
                                              <!--a class="incr-btn" data-action="increase" href="#">&plus;</a-->
                                         </div>
									</div>
									
									<a href="#p1" onclick="AddToCart(<?php echo $Menu["MenuID"].",".$Menu["PartyID"].",".$Menu["FullPrice"].",'".$Menu["ItemName"]." Full Plate'"; ?>);" id="atc<?php echo $Menu["ID"];?>">Add to Cart</a>
								</div>
							
							</div>
							<?php
							}
							?>
							</div>
							
							<!--owl slider ends-->
						 
						 </div>
					
					</div>
				 
				 </div>
				
				<!--menu block ends-->
				<!--menu block starts-->
				
				 <div class="menu-bar">
				 
				    <div class="centering">
					
					     <div class="dise">
						 
						       <div class="mnu">

							   
							       <h2 id="p3">Recently Added</h2>
								   <!--p >We strive for quality and hygiene, no compromise whatsoever. Hence we pick the best ingredients from the market and weave our magic into it to produce some mouthwatering dishers for you. Eat healthy, stay healthy!</p-->
							   
							   </div>
						 
						 <div class="owl-carousel owl-theme">
						 
						 <?php
						 foreach($RecentlyAdded as $recent)
						 {
						 ?>
						   <div class="box">
							
							    <div class="igg">
								
								    <img src="<?php echo base_url();?>Uploads/<?php echo $recent["Image"];?>" alt=""/> 
									<img src="<?php echo base_url();?>Main/images/<?php if($recent["ItemType"]==1) echo "veg"; else{ echo "nonveg"; }?>.jpg" alt="Vegeterian" class="food-type"/>
								</div>
								<div class="down">
								    <span>&#8377; <?php echo $recent["FullPrice"]; ?></span>
								    <h3><?php echo $recent["ItemName"];?></h3>
								    <p><?php echo $recent["ItemDescription"];?></p>
									<div class="bttm">
									     <div class="count-input space-bottom">
                                              <!--a class="incr-btn" data-action="decrease" href="#">–</a-->
                                              <input class="quantity" type="text" name="Quantity<?php echo $recent["ID"];?>" id="Quantity<?php echo $recent["ID"];?>" value="1" style="display:none;"/>
                                              <!--a class="incr-btn" data-action="increase" href="#">&plus;</a-->
                                         </div>
									</div>
									
									<a href="#p1" onclick="AddToCart(<?php echo $recent["MenuID"].",".$recent["PartyID"].",".$recent["FullPrice"].",'".$recent["ItemName"]." Full Plate'"; ?>);" id="atc<?php echo $recent["ID"];?>">Add to Cart</a>
								</div>
							
							</div>
							<?php
							}
							?>
							</div>
							
							<!--owl slider ends-->
						 
						 </div>
					
					</div>
				 
				 </div>
				
				<!--menu block ends-->
				
				<!--how it work block-->
				
				 <div class="how-bar">
				 
				     <div class="centering">
					 
					    <div class="work">
						
						     
							 <div class="hdd">
							 
							    <h2>How  it  Work</h2>
								<p>Hungry? Craving for some delicious food? But hey, you&#39;re too lazy to move out. Well, Classicdine brings to you a whole wide range of delicious food right at your doorstep. Pick up your phone, place an order and get it at amazing prices. Oh and yes, we are committed to providing fully fresh and hygienic food at all costs.</p>
							 
							 </div>
							 
							 <div class="gtt">
							 
							    
								<div class="imm">
								
								    <i class="fa fa-home" aria-hidden="true"></i>
								
								</div>
								<div class="dnn">
								
								    <h3>Your order have been placed.</h3>
								    <!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p-->
								
								</div>
							 </div>
							 
							 <!--2nd-->
							 
							 <div class="ord">
							 
							    
								<div class="ima">
								
								    <i class="fa fa-cutlery" aria-hidden="true"></i>


								
								</div>
								<div class="txt">
								
								    <h3>Sniff sniff! Something&#39;s cooking, eh?</h3>
								    <!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p-->
								
								</div>
							 </div>
							 
							 <!--3rd -->
							 
							 <div class="del">
							 
							    
								<div class="mma">
								
								    <i class="fa fa-truck" aria-hidden="true"></i>
								
								</div>
								<div class="hda">
								
								    <h3>Vroom! We are off for delivery</h3>
								    <!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p-->
								
								</div>
							 </div>
							 
							  <!--4th -->
							 
							  <div class="tak">
							 
							    
								<div class="out">
								
								    <i class="fa fa-check" aria-hidden="true"></i>

								
								</div>
								<div class="tat">
								
								    <h3>Delivered. Over and out.</h3>
								    <!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p-->
								
								</div>
							 </div>
							 
							 <!--5th-->
							 
							 <div class="hppy">
							 
							    
								<div class="sgn">
								
								   <i class="fa fa-thumbs-up" aria-hidden="true"></i>

								
								</div>
								<div class="stx">
								
								    <h3>Oh! Do rate your experience</h3>
								    <!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p-->
								
								</div>
							 </div>
						
						
						</div>
					 
					 </div>
				 
				 </div>
				
				<!--how it work block ends-->
				
				
                <!-- new block -->
                <div class="new-block">
                	
                	<div class="centering">
                    
                    <div class="right">
                        
                        	<img src="<?php echo base_url();?>Main/images/set.png" alt="" />
                        
                        </div>
                    
                    	<div class="left">
                        	<h2>made with great ingredients!</h2>
                            <p>We strive for quality and hygiene, no compromise whatsoever. Hence we pick the best ingredients from the market and weave our magic into it to produce some mouthwatering dishers for you. Eat healthy, stay healthy!</p>
                            <!--a href="#" class="link">More... </a-->
                        
                        </div>
                        
                    
                    </div>
                
                </div>
                <!-- finish new block -->
				
				<!--Gallery block start-->
				
				   <div class="gall-bar">
				   
				         <div class="ryy">
						 
						 
						      <div class="centering">
							  
							      <div class="centt">
								  
								           <h2 id="p2">Gallery</h2>
								  
								       <!--div class="controls">
									   
									       
                                            <button type="button" class="control" data-filter="all">All</button>
                                            <button type="button" class="control" data-filter=".roll">Roll</button>
                                            <button type="button" class="control" data-filter=".burger">Burger</button>
                                            <button type="button" class="control" data-filter=".fish">Fish</button>
                                            <input type="text" class="input" data-ref="input-search" placeholder=""/>
                                     </div-->
									 
									 <div class="container" data-ref="container">
                                         <div class="mix roll">
										 
										      <div class="imm">
											  
											      <a href=""><img src="<?php echo base_url();?>Main/images/im-1.jpg" alt=""/></a>
												  
											  
											  </div>
											  <div class="overlay">
												  
												      <!--a href="#">Lorem</a-->
												  
											  </div>
										 
										 </div>
                                         <div class="mix roll">
										 
										     <div class="imm">
											  
											      <a href=""><img src="<?php echo base_url();?>Main/images/im-2.jpg" alt=""/></a>
											  
											  </div>
											   <div class="overlay">
												  
												      <!--a href="#">Lorem</a-->
												  
											  </div>
										 
										 </div>
                                         <div class="mix burger">
										 
										      <div class="mmp">
											  
											        <a href=""><img src="<?php echo base_url();?>Main/images/im-3.jpg" alt=""/></a>
											  
											  </div>
											  <div class="overlay">
												  
												      <!--a href="#">Lorem</a-->
												  
											  </div>
										 
										 </div>
                                         <div class="mix fish">
										 
										       <div class="ppm">
											   
											       <a href=""><img src="<?php echo base_url();?>Main/images/im-4.jpg" alt=""/></a>
											   
											   </div>
											   <div class="overlay">
												  
												      <!--a href="#">Lorem</a-->
												  
											  </div>
										 
										 </div>
                                         <div class="mix roll">
										 
										     <div class="imm">
											  
											      <a href=""><img src="<?php echo base_url();?>Main/images/im-5.jpg" alt=""/></a>
											  
											  </div>
											   <div class="overlay">
												  
												      <!--a href="#">Lorem</a-->
												  
											  </div>
										 
										 </div>
                                         <div class="mix burger">
										 
										       <div class="mmp">
											  
											        <a href=""><img src="<?php echo base_url();?>Main/images/im-6.jpg" alt=""/></a>
											  
											  </div>
											  <div class="overlay">
												  
												      <!--a href="#">Lorem</a-->
												  
											  </div>
										 
										 </div>
                                         <div class="mix fish">
										 
										 
										      <div class="ppm">
											   
											       <a href=""><img src="<?php echo base_url();?>Main/images/im-7.jpg" alt=""/></a>
											   
											   </div>
											   <div class="overlay">
												  
												      <!--a href="#">Lorem</a-->
												  
											  </div>
										 
										 </div>
                                         <div class="mix burger">
										 
										       <div class="mmp">
											  
											        <a href=""><img src="<?php echo base_url();?>Main/images/im-8.jpg" alt=""/></a>
											  
											  </div>
											  <div class="overlay">
												  
												      <!--a href="#">Lorem</a-->
												  
											  </div>
										 
										 </div>
										 <div class="mix burger">
										 
										       <div class="mmp">
											  
											        <a href=""><img src="<?php echo base_url();?>Main/images/im-9.jpg" alt=""/></a>
											  
											  </div>
											  <div class="overlay">
												  
												      <!--a href="#">Lorem</a-->
												  
											  </div>
										 
										 </div>
										 <div class="mix burger">
										 
										       <div class="mmp">
											  
											        <a href=""><img src="<?php echo base_url();?>Main/images/im-10.jpg" alt=""/></a>
											  
											  </div>
											  <div class="overlay">
												  
												      <!--a href="#">Lorem</a-->
												  
											  </div>
										 
										 </div>
                                         <div class="gap"></div>
                                         <div class="gap"></div>
                                         <div class="gap"></div>
                                   </div>
								  
								  </div>
							  
							  </div>
						 
						 
						 </div>
				   
				   </div>
				
				<!--Gallery block ends-->
				

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

<script type="text/javascript">
var counter=setInterval(ShowStatus, 1000);
$(document).ready(function(){
	ShowStatus();
	$('#loader').hide();
});
function ShowStatus()
{
	$.ajax({
		url:'<?php echo base_url();?>Others/GetStatus',
		type:'ajax',
		dataType:'json',
		aysnc:false,
		success:function(data){
			ReadCart();
			var html="";
			if(data[0].Status==1)
			{
				html="";
			}
			else{
				html="The restaurant is offline. Orders cannot be placed now.";
			}
			document.getElementsByClassName("mnnn")[0].innerHTML=html;
		},
		error:function()
		{
			//swal("Oops...", "Something went wrong!", "error");
		}
	});
}
function AddToCart(id,partyid,price,itemname)
{
	//var quantity=document.getElementById("Quantity"+id).value;
	var quantity=1;
	var Total=quantity*price;
	if(quantity!=0)
	{
		$.ajax({
			url:'<?php echo base_url();?>Home/AddToCart',
			type: 'post',
			dataType: 'json',
			data: {'PartyID': partyid,
					'ManuID': id,
					'ItemName': itemname,
					'Quantity': quantity,
					'Price': price,
					'TotalPrice': Total
					},
			beforeSend:function(){
				$('#loader').show();
			},
			success: function(result){
				$('#loader').hide();
				swal("Message", result, "success"); 
			},
			error: function(){
				$('#loader').hide();
				swal("Oops...", "Something went wrong!", "error");
			}
		});
	}
	else
	{
		swal("Oops...", "0 quantity cannot be added", "error");
	}
}
function Search()
{
	var Search=document.getElementById("Search").value;
	window.location="<?php echo base_url();?>Category/index?Item="+Search;
}
function SendMail()
{
	var Name=document.getElementById("Name").value;
	var PhoneNo=document.getElementById("PhoneNo").value;
	var Email=document.getElementById("Email").value;
	var Message=document.getElementById("Detail").value;
	$.ajax({
		url:'<?php echo base_url();?>Home/SendMail',
		type: 'POST',
		data:{"Name": Name, "PhoneNo": PhoneNo, "Email": Email, "Message": Message},
		dataType:'JSON',
		beforeSend:function(){
			$('#loader').show();
		},
		success: function(data){
			$('#loader').hide();
			swal("Message", data, "success");
			return false;
		},
		error: function(){
			$('#loader').hide();
			swal("Oops...", "Message not sent", "error");
			return false;
		}
	});
}
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
</script>
</body>

</html>