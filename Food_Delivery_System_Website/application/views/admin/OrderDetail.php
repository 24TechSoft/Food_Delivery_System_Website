<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Order Detail</title>

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
                <h3>Order Detail</h3>
              </div>

            </div>
            <div class="clearfix"></div>
			<?php
			foreach($OrderBasic as $order)
			{
			?>
		
			<form method="post" action="<?php echo base_url();?>Order/UpdateOrder/<?php echo $order["ID"];?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <div class="form-horizontal form-label-left input_mask">
						<label>Order Date and Time: </label><label><?php echo $order["OrderDate"]." ".$order["OrderTime"]; ?></label><br>
						<label>Full Name: </label><label><?php echo $order["FullName"]; ?></label><br>
                        <label>Address: </label><label><?php echo $order["Address"]; ?></label><br>
						<label>Phone No: </label><label><?php echo $order["PhoneNo"]; ?></label><br>
						<label>Email: </label><label><?php echo $order["Email"]; ?></label><br>
						<label>Total Price Code:</label><label><?php echo $order["TotalPrice"]; ?></label><br>
						<label>Coupon Code:</label><label><?php echo $order["CouponCode"]; ?></label><br>
						<label>Coupon Discount:</label><label><?php echo $order["CouponDiscount"]; ?></label><br>
						<label>Delivery Charge:</label><label><?php echo $order["DeliveryCharge"]; ?></label><br>
						<!--label>SGST:</label><label><?php echo $order["SGST"]; ?></label><br-->
						<label>Grand Total:</label><label><?php echo $order["GrandTotal"]; ?></label><br>
					</div>
                  </div>
                </div>


              </div>
			  <div class="col-md-6 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <br />
                    <div class="form-horizontal form-label-left input_mask">
						<div class="form-group">
							<label>Order Status: </label>
							<select name="Status" id="Status" class="form-control">
								<option value="0" <?php if($order["Status"]==0) echo "selected='selected'"; ?> disabled>Order Placed</option>
								<option value="1" <?php if($order["Status"]==1) echo "selected='selected'"; if($order["Status"]!=0) echo "disabled"; ?>>Confirmed</option>
								<option value="2" <?php if($order["Status"]==2) echo "selected='selected'"; if($order["Status"]!=1) echo "disabled"; ?>>Dispatched</option>
								<option value="3" <?php if($order["Status"]==3) echo "selected='selected'"; if($order["Status"]!=2) echo "disabled"; ?>>Delivered</option>
								<option value="4" <?php if($order["Status"]==4) echo "selected='selected'"; if($order["Status"]==3) echo "disabled";?>>Cancelled</option>
							</select>
                    </div>
                  </div>
                </div>


              </div>
            </div>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-info">Save</button>
					<?php
					if(Sizeof($BillDetail)>0)
					{
						?><a href="<?php echo base_url();?>Order/ViewBill/<?php echo $BillDetail[0]["ID"];?>" class="btn btn-danger">View Bill</a><?php
					}
					?>
				</div>
			</div>
			</form>
			<?php
			}
			?>
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Party</th>
                          <th>Item Name</th>
                          <th>Quantity</th> 
                          <th>Price</th>
						  <th>Total Price</th>
                        </tr>
                      </thead>


                      <tbody>
							<?php
								  foreach($OrderItems as $Items)
								  {
								  ?>
                            <tr>
								  <td><?php if($Items["Name"]!="" || $Items["Name"]!=NULL){echo $Items["Name"];} else {"Kitchen";} ?></td>
                                  <td><?php echo $Items["ItemName"]; ?></td>
                                  <td><?php echo $Items["Quantity"]; ?></td>
								  <td><?php echo $Items["Price"]; ?></td>
                                  <td><?php echo $Items["TotalPrice"]; ?></td>
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
	<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').DataTable();
	} );
	</script>
	
	<script type="text/javascript" src="<?php echo base_url();?>Admin/datatables/jquery.dataTables.min.js"></script>
  </body>

</html>