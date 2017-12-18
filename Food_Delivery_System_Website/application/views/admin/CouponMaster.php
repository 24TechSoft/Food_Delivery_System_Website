<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Coupon Master</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>Admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>Admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>Admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>Admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url();?>Admin/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url();?>Admin/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url();?>Admin/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url();?>Admin/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>Admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>Admin/build/css/custom.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Admin/datatables/jquery.datatables.min.css"/>
  </head>
<body class="nav-md">
	<?php
	if(sizeof($Coupon)>0)
	{
		$Name=$Coupon["Name"];
		$ValidFrom=$Coupon["ValidFrom"];
		$ValidTo=$Coupon["ValidTo"];
		$ValidTimeFrom=$Coupon["ValidTimeFrom"];
		$ValidTimeTo=$Coupon["ValidTimeTo"];
		$Code=$Coupon["Code"];
		$PartyID=$Coupon["PartyID"];
		$UserLimit=$Coupon["UserLimit"];
		$Image=$Coupon["Image"];
		$Detail=$Coupon["Detail"];
		$MinPrice=$Coupon["MinPrice"];
		$CouponType=$Coupon["CouponType"];
		$DiscountType=$Coupon["DiscountType"];
		$DiscountAmount=$Coupon["DiscountAmount"];
	}
	else
	{
		$Name="";
		$ValidFrom=date("Y-m-d");
		$ValidTo=date("Y-m-d");
		$ValidTimeFrom="00:00:00";
		$ValidTimeTo="23:59:59";
		$Code="";
		$PartyID=0;
		$UserLimit=1;
		$Image="";
		$Detail="";
		$MinPrice="";
		$CouponType=0;
		$DiscountType=0;
		$DiscountAmount="";
	}
?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url();?>User" class="site_title"><i class="fa fa-paw"></i> <span>Classic Dine</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
          <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>Admin/production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
				  <li><a href="<?php echo base_url();?>Order">Orders</a></li>
				  <li><a href="<?php echo base_url();?>Party">Party</a></li>
				  <li><a href="<?php echo base_url();?>Coupon">Coupon</a></li>
				  <li><a href="<?php echo base_url();?>Menu/Category">Category</a></li>
				  <li><a href="<?php echo base_url();?>Menu/index/0">Kitchen</a></li>
				  <li><a href="<?php echo base_url();?>Others/Deliveryboys">Delivery Boy</a></li>
				  <li><a href="<?php echo base_url();?>Others/AreaMaster">Areas</a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				  Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                 <ul class="dropdown-menu dropdown-usermenu pull-right">
				  <li><a href="<?php echo base_url();?>User/UpdatePassword">Change Password</a></li>
                    <li><a href="<?php echo base_url();?>User/Logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Coupon Master</h3>
              </div>

            </div>
            <div class="clearfix"></div>
			<form method="post" action="<?php echo base_url();?>Coupon/AddCoupon?ID=<?php echo $ID;?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <div class="form-horizontal form-label-left input_mask">
					  <div class="form-group input_mask">
						<label>Name</label>
						<input type="text" class="form-control" id="Name" name="Name" placeholder="Name" value="<?php echo $Name;?>">
					  </div>
                      <div class="form-group has-feedback">
						<label>Code</label>
                        <input type="text" class="form-control" id="Code" name="Code" placeholder="Coupon Code" value="<?php echo $Name;?>">
                      </div>
					  <div class="form-group has-feedback">
						<label>Coupon Type</label>
						<select name="CouponType" id="CouponType" class="form-control">
							<option value="1" <?php if($CouponType==1){ echo "selected='selected'";}?>>Discount</option>
							<option value="2" <?php if($CouponType==2){ echo "selected='selected'";}?>>Cash Back</option>
						</select>
					  </div>
					  <div class="form-group has-feedback">
						<label>Party</label>
						<select name="PartyID" id="PartyID" class="form-control">
							<option value="0" <?php if($PartyID==0){ echo "selected='selected'";}?>>Kitchen</option>
							<?php
							foreach($partylist as $party)
							{
							?><option value="<?php echo $party["ID"];?>" <?php if($PartyID==$party["ID"]){ echo "selected='selected'";}?>><?php echo $party["Name"];?></option>
							<?php
							}
							?>
						</select>
					  </div>
					  <div class="form-group has-feedback">
						<label>User Limit</label>
						<input type="text" name="UserLimit" id="UserLimit" class="form-control" placeholder="Uses Limit Per User" value="<?php echo $UserLimit;?>"/>
					  </div>
					  <div class="form-group has-feedback">
						<label>Min Order Price</label>
						<input type="text" name="MinPrice" id="MinPrice" placeholder="Minimum Order Price" class="form-control" value="<?php echo $MinPrice;?>"/>
					  </div>
					  <div class="form-group has-feedback">
						<label>Image :</label>
						<input type="file" name="image" id="image" class="form-control">
					  </div>
                    </div>
                  </div>
                </div>


              </div>
			  <div class="col-md-6 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <br />
                    <div class="form-horizontal form-label-left input_mask">
						<div class="form-group input_mask">
							<label>Detail :</label>
							<textarea rows="4" cols="50" placeholder="Detail" name="Detail" id="Detail" class="form-control"><?php echo $Detail;?></textarea>
						</div>
						<div class="form-group">
							<label>Valid From : </label>
						</div>
						<div class="input-group date" id='myDatepicker1'>
							<input type="text" name="ValidFrom" id="ValidFrom" class="form-control" value="<?php echo $ValidFrom;?>">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
						<div class="form-group">
							<label>Valid To :</label>
						</div>
						<div class="input-group date" id='myDatepicker2'>
							<input type="text" name="ValidTo" id="ValidTo" class="form-control" value="<?php echo $ValidTo;?>">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
						<div class="form-group input_mask">
							<label>Valid From Time: </label>
							<div class='input-group date' id='myDatepicker3'>
								<input type='text' class="form-control" name="ValidTimeFrom" id="ValidTimeFrom" value="<?php echo $ValidTimeFrom;?>" />
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<div class="form-group input_mask">
							<label>Valid To Time: </label>
							<div class='input-group date' id='myDatepicker4'>
								<input type='text' class="form-control" name="ValidTimeTo" id="ValidTimeTo" value="<?php echo $ValidTimeTo;?>" />
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<div class="form-group has-feedback">
						<label>Discount Type</label>
						<select name="DiscountType" id="DiscountType" class="form-control">
							<option value="1" <?php if($DiscountType==1){ echo "selected='selected'";}?>>Flat</option>
							<option value="2" <?php if($DiscountType==2){ echo "selected='selected'";}?>>Percentage</option>
						</select>
					  </div>
					    <div class="form-group has-feedback">
						<label>Discount Amount</label>
						<input type="number" class="form-control" name="DiscountAmount" value="<?php echo $DiscountAmount;?>">
					  </div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-info">Save</button>
				</div>
			</div>
			</form>
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Valid From</th> 
                          <th>Valid To</th>
						  <th>Code</th>
                          <th>Party</th>
						  <th>User Limit</th>
						  <th>Image</th>
						  <th>Detail</th>
						  <th>Min Price</th>
						  <th>Operations</th>
                        </tr>
                      </thead>


                      <tbody>
						<?php
						foreach($CouponList as $coupon)
						{
						?>
                        <tr>
                              <td><?php echo $coupon["Name"]; ?></td>
                              <td><?php echo $coupon["ValidFrom"]; ?></td>
                              <td><?php echo $coupon["ValidTo"]; ?></td>
							  <td><?php echo $coupon["Code"]; ?></td>
                              <td><?php if($coupon["Party"]!=""){echo $coupon["Party"];}else{echo "Kitchen";} ?></td>
							  <td><?php echo $coupon["UserLimit"]; ?></td>
                              <td><img src="<?php echo base_url();?>Uploads/<?php echo $coupon["Image"]; ?>" alt="Image" height="100px" width="150px"></td>
							  <td><?php echo $coupon["Detail"]; ?></td>
                              <td><?php echo $coupon["MinPrice"]; ?></td>
							  <td><a href="<?php echo base_url();?>CouponProduct/index/<?php echo $coupon["ID"]; ?>">Add Products</a><br><a href="<?php echo base_url();?>CouponCustomers/index/<?php echo $coupon["ID"]; ?>/0/25">Add Customers</a><br><a href="<?php echo base_url();?>Coupon/DeleteCoupon/<?php echo $coupon["ID"];?>">Delete</a><br>
							  <a href="<?php echo base_url();?>Coupon?ID=<?php echo $coupon["ID"]?>">Edit</a></td>
                        </tr>
						<?php
						}
						?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>Admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>Admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>Admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>Admin/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>Admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>Admin/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>Admin/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url();?>Admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url();?>Admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url();?>Admin/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url();?>Admin/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url();?>Admin/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url();?>Admin/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url();?>Admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url();?>Admin/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>Admin/build/js/custom.min.js"></script>
	<!-- bootstrap-daterangepicker -->
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
        format: 'HH:mm:ss'
    });
    
    $('#myDatepicker4').datetimepicker({
        format: 'HH:mm:ss'
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
	$(document).ready(function() {
		$('#datatable').DataTable();
	} );
	</script>
	
	<script type="text/javascript" src="<?php echo base_url();?>Admin/datatables/jquery.dataTables.min.js"></script>
  </body>

</html>