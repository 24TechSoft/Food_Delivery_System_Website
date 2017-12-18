<!DOCTYPE html>
<html>

<head>

	<title>Classic Dine | Category</title>
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
  
<!--dropdown script ends-->

  
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
												
												     <a id="CartCount">5</a>
												
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
				
				<!--category link block start-->
				
				<div class="link-block">
				
				     <div class="page">
					 
					       <div class="centering">
						   
								 <div class="ordr">
								 
								       <div class="left">
									   
									         <div class="grpp">
											    
											     
												 <ul>
													<?php
													$PrevCat="";
													$Open=0;
													$Open1=0;
													foreach($CategoryList as $row)
													{
														if($Open==1 && $PrevCat!=$row["CName"])
														{
															if($Open1==1 && $PrevCat!=$row["CName"])
															{
																echo "</ul>";
															}
															echo "</li>";
														}
														if($PrevCat!=$row["CName"])
														{
															echo "<li>";
															echo "<a href='".base_url()."Category/index?Category=".$row["CName"]."'>".$row["CName"]."</a>";
															$PrevCat=$row["CName"];
															$Open=1;
															if($row["SubCategory"]!=NULL)
															{
																echo "<ul>";
																$Open1=1;
															}
														}
														if($row["SubCategory"]!=NULL)
														{
															echo "<li><a href='".base_url()."Category/index?Category=".$row["CName"]."&SubCategory=".$row["SubCategory"]."'>".$row["SubCategory"]."</a></li>";
														}
													}
													?>
												      
														
												   </ul>
											 
												 
											 </div>
											
									   </div>
									   
									   <div class="right">
									   
									   
									      <!--item starts-->
										  <div class="imaint">
									   <div class="itm">
											<?php
											if(sizeof($MenuList)>0)
											{
											foreach($MenuList as $Menu)
											{
											?>
											      <div class="box">
												  
												  
												         <div class="immg">
														 
														      <a href=""><img src="<?php echo base_url();?>Uploads/<?php echo $Menu["Image"];?>" alt=""/>
															  <img src="<?php echo base_url();?>Main/images/<?php if($Menu["ItemType"]==1) echo "veg"; else{ echo "nonveg"; }?>.jpg" alt="Vegeterian" class="food-type"/></a>
														 
														 </div>
														 
														 <h3><?php echo $Menu["ItemName"];?></h3>
														 <center><?php echo $Menu["ItemDescription"];?></center>
														 <div class="rup">
														 
														       <div class="lft">
															   
															         <p>&#8377; <?php echo $Menu["FullPrice"];?></p>
															   
															   </div>
															   
															   <div class="rft">
															   
															      <div class="count-input space-bottom">
                                                                     <a class="incr-btn" data-action="decrease" href="#" onclick="RemoveQuantity(<?php echo $Menu["PartyID"].",".$Menu["ID"].",'".$Menu["ItemName"]."',1,".$Menu["FullPrice"].",".$Menu["FullPrice"]; ?>);">–</a>
																	 
                                                                     <input class="quantity" type="text" name="Quantity<?php echo $Menu["ID"];?>" id="Quantity<?php echo $Menu["ID"];?>" value="<?php echo $Menu["Quantity"]; ?>"/>
																	 
                                                                     <a class="incr-btn" data-action="increase" href="#" onclick="AddQuantity(<?php echo $Menu["PartyID"].",".$Menu["ID"].",'".$Menu["ItemName"]."',1,".$Menu["FullPrice"].",".$Menu["FullPrice"]; ?>);">&plus;</a>
                                                                  </div>
															   
															   </div>
															   
														  
														 </div>
												  
												 
												  
												  </div>
										<?php
											}
											}
											else
											{
												 echo "<h3>No Items available</h3>";
											}
											?>
												 
											</div>
										  </div>
											
											<!--item finished-->
											
											<!--check-->
											
											<div class="check" id="scrll-top">
											
											  <h2>Your Cart</h2>
											  
											  
											  <div class="bx" id="divCart">
											  
											       <!--h3>Your Items</h3-->
											  
											       <!--div class="leftt">
												   
												       <div class="gt">
													   
													        <p>Name : lorem ipsum dummy text</p>
													   
													   </div>
													   <div class="rt">
													   
													         <div class="count-input space-bottom">
                                                                  <a class="incr-btn" data-action="decrease" href="#">–</a>
                                                                  <input class="quantity" type="text" name="quantity" value="0"/>
                                                                  <a class="incr-btn" data-action="increase" href="#">&plus;</a>
                                                             </div>
													   
													   </div>
												   
												   </div-->
												   
												   <!--2-->
												  
												   <!--div class="rltt">
												   
												      <p>&#8377; 0.00</p>
												   
												   </div-->
												</div>
												<div class="bx">
												   <div class="calul">
												   
												       <p id="GrandTotal">&#8377; 000.00</p>
												   
												   </div>
												   
												    <div class="smmdd">
											  
											            <a href="<?php echo base_url();?>Home/Checkout" onclick="return ShowStatus();" id="btnCheckout">Proceed To Checkout</a>
											  
											       </div>
											  
											  </div>
											  
											  <!--box-2-->
											  
											
											<!--check 2-->
											
									   
									   </div>
								 
								 </div>
						   
						   </div>
					 
					 </div>
				
				</div>
				
				<!--category link block ends-->
	
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
<!-- Cart Functions -->
<script type="text/javascript">
$(document).ready(function(){
	ReadCart();
	ShowStatus();
});

function ReadCart()
{
	
	$.ajax({ 
		url: '<?php echo base_url();?>Home/ReadData',
		dataType: 'json',
		beforeSend:function(){
			$('#loader').show();
		},
		success: function (data) 
		{ 
			$('#loader').hide();
			var html='';
			var Total=0;
			document.getElementById("CartCount").innerHTML=data.length;
			if(data.length>0)
			{
				document.getElementById("btnCheckout").style.display="block";
			}
			else
			{
				document.getElementById("btnCheckout").style.display="none";
			}
			for(var i=0;i<data.length;i++)
			{
				html+='<div class="leftt">'
				+'<div class="gt">'
				+'<p>'+data[i].ItemName+'</p>'
				+'</div>'
				+'<div class="rt">'
				+'<div class="count-input space-bottom">'
				+'<a class="incr-btn" data-action="decrease" href="#" onclick="RemoveQuantity('+data[i].PartyID.toString()+','+data[i].ManuID.toString()+',\''+data[i].ItemName+'\',1,'+data[i].Price.toString()+','+data[i].Price.toString()+'); ModifyQuantity('+data[i].ManuID.toString()+','+(data[i].Quantity-1).toString()+');">–</a>'
				+'<input class="quantity" type="text" name="quantity" value="'+data[i].Quantity+'"/>'
				+'<a class="incr-btn" data-action="increase" href="#" onclick="AddQuantity('+data[i].PartyID.toString()+','+data[i].ManuID.toString()+',\''+data[i].ItemName+'\',1,'+data[i].Price.toString()+','+data[i].Price.toString()+'); ModifyQuantity('+data[i].ManuID.toString()+','+(parseInt(data[i].Quantity)+1).toString()+');">&plus;</a>'
				+'</div>'
				+'</div>'
				+'<img src="<?php echo base_url();?>Main/images/remove.png" width="20px" onclick="DeleteCartItem('+data[i].ID+'); ModifyQuantity('+data[i].ManuID.toString()+',0);" />'
				+'</div>'
				+'<div class="rltt">'
				+'<p>&#8377; '+data[i].TotalPrice+'</p>'
				+'</div>';
				Total=parseFloat(Total)+parseFloat(data[i].TotalPrice);
			}
			if(html=='')
			{
				html="<h3>Cart is empty</h3>";
			}
			$("#divCart").html(html);
			$("#GrandTotal").html("&#8377; "+Total+"</p>");
		},
		error:function()
		{
			$('#loader').hide();
			//swal("Oops...", "Something went wrong!", "error");
		}
	});
}
function DeleteCartItem(id)
{
	swal({
		title: "Are you sure?",
		text: "This will remove the cart item",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, remove it!",
		closeOnConfirm: false
	},
	function(res){
		if(res==true)
		{
			$.ajax(
			{ 
				url: '<?php echo base_url();?>Home/DeleteItem/'+id+'',
				dataType: 'text',
				async:false,
				beforeSend:function(){
					$('#loader').show();
				},
				complete: function () 
				{ 
					$('#loader').hide();
					swal("Message", "Item Deleted", "success");
					ReadCart();
					
				}
			});
			
		}
	});
	//var res=confirm("Are you sure?");
	
}
function RemoveQuantity(PartyID,ManuID,ItemName,Quantity,Price,TotalPrice)
{
	var url="<?php echo base_url();?>Home/RemoveFromCartJson?PartyID=" + PartyID + "&ManuID=" + ManuID + "&ItemName="+ ItemName + "&Quantity=" + Quantity + "&Price=" + Price + "&TotalPrice=" + TotalPrice + "";
	$.ajax({ 
		url: url,
		dataType: 'json',
		beforeSend:function(){
			$('#loader').show();
		},
		success: function (data) 
		{ 
			$('#loader').hide();
			ReadCart();
		},
		error: function()
		{
			$('#loader').hide();
			swal("Oops...", "Something went wrong!", "error");
		}
	});
}
function AddQuantity(PartyID,ManuID,ItemName,Quantity,Price,TotalPrice)
{
	var url="<?php echo base_url();?>Home/AddToCartJson?PartyID=" + PartyID + "&ManuID=" + ManuID + "&ItemName="+ ItemName + "&Quantity=" + Quantity + "&Price=" + Price + "&TotalPrice=" + TotalPrice + "";
	$.ajax({ 
		url: url,
		dataType: 'json',
		beforeSend:function(){
			$('#loader').show();
		},
		success: function (data) 
		{
			$('#loader').hide();
			ReadCart();
		},
		error: function()
		{
			$('#loader').hide();
			swal("Oops...", "Not added to cart", "error");
		}
	});
}
function ModifyQuantity(MenuID,Quantity)
{
	document.getElementById("Quantity"+MenuID.toString()).value=Quantity.toString();
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
			swal("Response", data);alert(data);  
		},
		error: function(){
			$('#loader').hide();
			swal("Oops...", "Message could not be sent", "error");
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
				return true;
				document.getElementById("btnCheckout").style.display="block";
			}
			else{
				swal("Oops...", "Order Cannot be placed right now. The restaurant is closed.", "error");
				document.getElementById("btnCheckout").style.display="none";
				return false;
			}
		},
		error:function()
		{
			//swal("Oops...", "Something went wrong!", "error");
		}
	});
}
</script>
<!-- Curt Functions -->
</body>

</html>