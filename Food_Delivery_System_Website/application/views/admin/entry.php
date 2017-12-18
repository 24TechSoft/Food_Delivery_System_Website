<!DOCTYPE html>
<html>

<head>

	<title>Entry-form</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="<?php echo base_url();?>Admin/styles/layout.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>Admin/styles/jquery.fancybox.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>Admin/fonts/font.css" type="text/css" />
	<!--font awesome fonts-->
	<script src="https://use.fontawesome.com/93f67c57ef.js"></script>
<!-- Hajan Date Picker -->
    <link type="text/css" href="<?php echo base_url();?>Admin/hajandatepicker/css/jquery-ui.css" rel="Stylesheet" />
    <script type="text/javascript" src="<?php echo base_url();?>Admin/hajandatepicker/js/jquery-1.4.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>Admin/hajandatepicker/js/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function () {
        var date = new Date();
        var currentMonth = date.getMonth();
        var currentDate = date.getDate();
        var currentYear = date.getFullYear();
        $('.hajanDatePicker').datepicker({ minDate: new Date(currentYear, currentMonth, currentDate), dateFormat: 'dd/mm/yy' });
    });
    </script>
<!-- Hajan Date Picker -->
</head>

<body>

<!-- begin section -->
<div id="section">
	  
	<!-- begin page-wrap -->
	<div id="page-wrap">
	
		<!-- begin header -->
		<div id="header-wrap">

			<!-- header block -->
            <div class="header-block">
            
            	<div class="head">
                
                	<div class="centering">
                    
                    	<div class="logo">
						
						     <a href=""><img src="<?php echo base_url();?>images/log.png" alt="logo"/></a>
						
						</div>
						<div class="nav">
						
						     <ul>
							 
							    <li><a href="">Home</a></li>
							    <li><a href="">Menu</a></li>
								<li><a href="">Gallary</a></li>
								<li><a href="">Special</a></li>
								<li><a href="">Contact Us</a></li>
							 </ul>
						
						</div>
                    
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
			
			    <!--entry block starts-->
				
				 <div class="enr-bar">
				 
				       <div class="centering">
					   
					        <div class="frm">
							
							    <h2>Lorem Ipsum</h2>
								
								 <div class="flft">
								      <form>
								
									   <label>First Name: </label><input type="text" placeholder="Enter First Name" name="fname" >
									   <label>Last Name : </label><input type="text" placeholder="Enter last name" name="lname">
									   <label>Password: </label><input type="password" placeholder="Enter Password" name="psw">
                                       <label>FileUpload: </label><input type="file" name="fileToUpload" id="fileToUpload">
								       <label>Date Entry: </label><input type="date" value="dd/mm/yyyy" onfocus="this.value=''" name="userDate" onblur="checkDate(this.form)"/ class="hajanDatePicker">
									   <label>TextBox: </label><textarea rows="4" cols="50">Enter text here..</textarea>
									   </form>
								 </div>
								 
								 <div class="frft">
								   
								    <form>
									   <label>CheckBox</label></br>
								       <input type="checkbox" name="vehicle" value="Bike"><span> check 1</span><br>
                                       <input type="checkbox" name="vehicle" value="Car" checked> <span>check 2</span><br>
									   <input type="checkbox" name="vehicle" value="Bike"><span> check 3</span><br>
                                       <input type="checkbox" name="vehicle" value="Car" checked> <span>check 4</span><br>
									   <input type="checkbox" name="vehicle" value="Bike"><span> check 5</span><br>
								       
									   <label>Gender</label></br>
                                       <input type="radio" name="gender" value="male" checked><span> Male</span><br>
                                       <input type="radio" name="gender" value="female"> <span>Female</span><br>
                                       <input type="radio" name="gender" value="other"><span> Other</span>
									   
                                    </form> 
								 
								 </div>
								 
								 <div class="fsm">
								    <form>
									
								      <button type="submit" form="nameform" value="Submit">Submit</button>
									  
								    </form>
								 </div>
								 
								 <!--table starts-->
								 
								  <div class="ftbl">
								  
								     <h2>Table</h2>
								  
									 <div class="fmni">
									 
									   <table>
									 
                                         <tr>
                                              <th>Lorem Ipsum 1</th>
                                              <th>Lorem Ipsum 2</th> 
                                              <th>Lorem Ipsum 3</th>
											  <th>Lorem Ipsum 4</th>
                                              <th>Lorem Ipsum 5</th>
                                        </tr>
                                        <tr>
                                              <td>Lorem 1</td>
                                              <td>Lorem 2</td>
                                              <td>Lorem 3</td>
											  <td>Lorem 4</td>
                                              <td>Lorem 5</td>
                                        </tr>
                                         <tr>
                                              <td>Ipsum 1</td>
                                              <td>Ipsum 2</td>
                                              <td>Ipsum 3</td>
											  <td>Ipsum 4</td>
											  <td>Ipsum 5</td>
                                        </tr>
                                        <tr>
                                             <td>Lorem 1</td>
                                              <td>Lorem 2</td>
                                              <td>Lorem 3</td>
											  <td>Lorem 4</td>
                                              <td>Lorem 5</td>
                                        </tr>
										<tr>
                                             <td>Lorem 1</td>
                                              <td>Lorem 2</td>
                                              <td>Lorem 3</td>
											  <td>Lorem 4</td>
                                              <td>Lorem 5</td>
                                        </tr>
										<tr>
                                             <td>Lorem 1</td>
                                              <td>Lorem 2</td>
                                              <td>Lorem 3</td>
											  <td>Lorem 4</td>
                                              <td>Lorem 5</td>
                                        </tr>
										<tr>
                                             <td>Lorem 1</td>
                                              <td>Lorem 2</td>
                                              <td>Lorem 3</td>
											  <td>Lorem 4</td>
                                              <td>Lorem 5</td>
                                        </tr>
                                     </table>
									 
									</div>
								 
								 </div>
								 <!--table ends-->
							
							</div>
					   
					   </div>
				 
				 </div>
				
				<!--entry block ends-->
			
			</div>
			<!-- finish center wrap -->
			
		</div>
		<!-- finish content -->
		
		<!-- begin footer -->
		<div id="footer-wrap">

			<!-- footer block -->
            <div class="footer-block">
            
            	<div class="centering">
                
                	<div class="contact">
					
						<ul> 
						
							<li class="nobg">&copy;2016 Zonnestudio Ibiza Sun Amsterdam</li>
							<li class="nobg">Van Tuyll van Serooskerkenweg 114-116 </li>
							<li>1076 JR Amsterdam </li>
							<li class="nobg"> Tel: 06-82831415</li>
							<li><a href="#">Colofon </a></li>
							<li><a href="#">Contact </a></li>
							<li class="nobg">Website:<a href="#">MeijerMedia</a></li>
						
						</ul>
					
					</div>
					
					<div class="social">
					
						<ul>
						
						<li class="twiter"><a href="#">TWITTER</a></li>
						<li class="face"><a href="#">FACEBOOK</a></li>
						<li class="insta"><a href="#">INSTAGRAM</a></li>
						
						</ul>
					
					</div>
					
                </div>
            
            </div>
            <!-- finish footer block -->

		</div>
		<!-- finish footer -->
		
	</div>
	<!-- finish page wrap -->
	
</div>
<!-- finish section -->
<!--date and time script-->

<SCRIPT type="text/javascript">
<!--
	function checkDate(f){
		var val = f.userDate.value;
		if(/\d{1,2}\/\d{1,2}\/\d{4}/.test(val)){
			var arr1 = val.split('/');
			if(arr1[0]>31 || arr1[0]<=0){
				alert('Day must be between 1 and 31');
			}else if(arr1[1]>12 || arr1[1]<=0){
				alert('Month must be between 1 and 12');
			}else{
				var dateNow = new Date();
				var userDate = new Date(arr1[2],(arr1[1]-1),arr1[0]);
				var diff = userDate.getTime() - dateNow.getTime();
				if(diff < 0){
					alert('Date entered has already passed');
				}else{
					alert('Days to input date:' + Math.floor(diff/(1000*60*60*24)));
					f.daysLeft.value = Math.floor(diff/(1000*60*60*24));
				}
			}

		}else{
			alert('Invalid Date Format. dd/mm/yyyy format');
		}
		
	}		
//-->
</script>

<!--date and time script ends-->
<script src="<?php echo base_url();?>js/jquery-1.11.3.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.flexslider.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.smooth-scroll.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.rotate.js"></script>
<script src="<?php echo base_url();?>js/jquery.fancybox.js"></script>
<script src="<?php echo base_url();?>js/custom.js" type="text/javascript"></script>
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
</body>

</html>