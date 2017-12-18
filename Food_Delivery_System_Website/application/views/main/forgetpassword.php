<!DOCTYPE html>
<html>

<head>

	<title>Forget Password</title>

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
	
	<script type="text/javascript">
	function Validate()
	{
		var UserID=document.getElementById("UserID").value;
		var chkConfirm=document.getElementById("chkConfirm");
		if(UserID=="")
		{
			swal("Error", "Please enter your User ID, Email ID or Mobile No" , "error");
			return false;
		}
		else if(chkConfirm.checked==false)
		{
			swal("Error", "Please confirm" , "error");
			return false;
		}
		else
		{
			return true;
		}
	}
	</script>
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
			<li class="extr-marg"><a href="<?php echo base_url();?>Home/SignIn">Sign in</a></li>
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

											<li><a href="<?php echo base_url();?>Home/SignIn"><img src="<?php echo base_url();?>Main/images/login.png" alt=""/></a></li>
										</ul> 

												   
									</div>
					
								   
								    
								     <div class="left">
									       
									    
								        <div  class="mnnu">
										
										    

											   <ul>
											
												<li><a  class="smoothscroll" href="<?php echo base_url();?>">Home</a></li>
												<li><a  class="smoothscroll" href="<?php echo base_url();?>#p1">Hot-Selling</a></li>
												<li><a  class="smoothscroll" href="<?php echo base_url();?>#p2">Gallery</a></li>
												<li><a  class="smoothscroll" href="<?php echo base_url();?>#p3">Special</a></li>
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

											  <div class="log">
												 <a href="<?php echo base_url();?>Home/SignIn">Sign In</a>
											  </div>
											  
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
				  
				  <div class="sign-bar">
				  
				       <div class="upp">
					   
					        <div class="centering">
							
							    <div class="mnn">
								
								      <h2>Recover your password</h2>
									  <h3>Please fill up the following to reset your password</h3>
									  
									    <div class="bxt">
										<form method="post" action="<?php echo base_url();?>Home/ForgotPassword" onsubmit="return Validate();">
										  <div class="lttf">

                                              <h2>Forget Password</h2>										  
											
											<div class="extt">
											 
											    <table>
													<tr><td><label>User ID: </label></td><td><input type="text" placeholder="Your User ID, Email ID or Mobile No" name="UserID" id="UserID"></td></tr>
													<tr><td colspan="2"><input type="checkbox" name="chkConfirm" id="chkConfirm" value="1">&nbsp;Confirm. Send me the password reset link.</td></tr>
												
												</table>
												
												<div class="confff">
												
												    <button type="submit" value="Submit">Submit</button>
													
												</div>
											 
											 </div>
											 
										  </div>
										</form>
										  <!--left side finished-->
										  
										  <!--right side starts-->
										  
										  
								              <div class="rttf">
											  
											     
												 
											  
											  </div>
											  
								
										  <!--right side ends-->
										  
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