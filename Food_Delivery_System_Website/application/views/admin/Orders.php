<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Orders</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>Admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>Admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>Admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>Admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url();?>Admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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

          
            <!-- /menu footer buttons -->
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
                <h3>Orders</h3>
				<div class="part" id="websitestatus">
				<?php if($WebsiteStatus[0]["Status"]==1)
				{
					?>
					<marquee onmouseover='this.stop();' onmouseout='this.start();'><span style='font-size:large; color:#000;'>The website is active. Order can be placed. <a href='<?php echo base_url();?>Order/ToggleStatus/0' style='color:#f00; background:#fff; border-radius:20; text-decoration:none;'>Click Here</a> to turn off the website.</span></marquee>
				<?php 
				}
				else
				{
				?>
					<marquee onmouseover='this.stop();' onmouseout='this.start();'><span style='font-size:large; color:#000;'>The website is inactive. Order can not be placed. <a href='<?php echo base_url();?>Order/ToggleStatus/1' style='color:#f00;  background:#fff; border-radius:20; text-decoration:none;'>Click Here</a> to turn on the website.</span></marquee>
				<?php
				}
				?>				
				</div>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<form method="post" action="<?php echo base_url();?>/Order/GetOrderByDate">
                  <div class="input-group date" id='myDatepicker2'>
                    <input type='text' class="form-control" name="dtOrder" />
					  <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">View</button>
                    </span>
                  </div>
				</form>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
						 <th>Order No</th>
                          <th>Order Date</th>
                          <th>Delivery Time</th>
                          <th>Full Name</th>
                          <th>Address</th>
                          <th>Phone No</th>
                          <th>Email</th>
						  <th>Delivery Charge</th>
						  <th>Total</th>
						  <th>Status</th>
						  <th>Operations</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
						foreach($orderlist as $row)
						{
							?>
                        <tr>
							<td><?php echo $row["ID"]; ?></td>
                              <td><?php echo $row["OrderDate"]." ".$row["OrderTime"];?></td>
                              <td><?php echo $row["DeliveryTime"]; ?></td>
							  <td><?php echo $row["FullName"]; ?></td>
                              <td><?php echo $row["Address"]; ?></td>
							  <td><?php echo $row["PhoneNo"]; ?></td>
                              <td><?php echo $row["Email"]; ?></td>
							   <td><?php echo $row["DeliveryCharge"]; ?></td>
							  <td><?php echo $row["TotalPrice"]; ?></td>
                              <td>
							  <?php 
							  if($row["Status"]==0){echo "Order Placed";}
								else if($row["Status"]==1){echo "Confirmed";}
								else if($row["Status"]==2){echo "Dispatched";}
								else if($row["Status"]==3){echo "Delivered";}
								else if($row["Status"]==4){echo "Cancelled";}
							  ?></td>
							  <td><a href="<?php echo base_url();?>Order/Detail/<?php echo $row["ID"];?>">View</a></td>
                        </tr>
						<?php
						}
						?>
						<tr>
						<td colspan="9" align="right"><a href="<?php echo base_url();?>Order">Get Todays Orders</a></td>
						</tr>
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
    <!-- iCheck -->
    <script src="<?php echo base_url();?>Admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>Admin/build/js/custom.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').DataTable();
	} );
	</script>
	
	<script type="text/javascript" src="<?php echo base_url();?>Admin/datatables/jquery.dataTables.min.js"></script>
	<!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>Admin/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>Admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url();?>Admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Initialize datetimepicker -->
	<script>
    
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    
	</script>
	
	
  </body>
</html>