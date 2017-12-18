<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Party Master</title>

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
                <h3>Party Master</h3>
              </div>

            </div>
            <div class="clearfix"></div>
			<form method="post" action="<?php echo base_url();?>Party/AddParty" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <br />
                    <div class="form-horizontal form-label-left input_mask">
					  <div class="form-group input_mask">
						<label>Party Type</label>
						<select name="PartyType" id="PartyType" class="form-control">
							<option value="1">Restaurent</option>
							<option value="2">Tiffin</option>
							<option value="3">Bakery</option>
							<option value="4">Sweets</option>
							<option value="5">Grocerry</option>
							<option value="6">Fruits</option>
							<option value="7">Dry Fruits and Nuts</option>
						</select>
					  </div>
                      <div class="form-group has-feedback">
						<label>Party Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Party Name">
                      </div>
					  <div class="form-group has-feedback">
						<label>Party Code</label>
                        <input type="text" class="form-control" id="PartyCode" name="PartyCode" placeholder="Party Code">
                      </div>
					  <div class="form-group has-feedback">
						<label>Party Logo</label>
                        <input type="file" class="form-control" id="Logo" name="Logo">
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
						<label>Location</label>
						<input type="text" class="form-control" id="Location" name="Location" placeholder="Location">
					  </div>
                      <div class="form-group has-feedback">
						<label>Phone No</label>
                        <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Phone No">
                      </div>
					  <div class="form-group has-feedback">
						<label>Email</label>
                        <input type="text" class="form-control" id="Email" name="Email" placeholder="Email">
                      </div>
					  <div class="form-group has-feedback">
						<label>Address</label>
                        <textarea class="form-control" id="Address" name="Address" placeholder="Address"></textarea>
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
                          <th>Party Type</th>
                          <th>Name</th>
                          <th>Location</th>
                          <th>Phone No</th>
                          <th>Email</th>
                          <th>Address</th>
						  <th>Party Code</th>
						  <th>Logo</th>
						  <th>Operations</th>
                        </tr>
                      </thead>


                      <tbody>
						<?php
						foreach($partylist as $row) 
						{
							?>
                        <tr>
                              <td>
							  <?php 
								if($row["PartyType"]==1)echo "Restaurent";
							  else if($row["PartyType"]==2)echo "Tiffin";
							  else if($row["PartyType"]==3)echo "Bakery";
							  else if($row["PartyType"]==4)echo "Sweets";
							  else if($row["PartyType"]==5)echo "Grocerry";
							  else if($row["PartyType"]==5)echo "Fruits";
							  else if($row["PartyType"]==6)echo "Dry Fruits and Nuts";
							  ?>
							  </td>
							  <td><?php echo $row["Name"];?></td>
                              <td><?php echo $row["Location"];?></td>
                              <td><?php echo $row["Phone"];?></td>
                              <td><?php echo $row["Email"];?></td>
							  <td><?php echo $row["Address"];?></td>
                              <td><?php echo $row["PartyCode"];?></td>
							  
							  <td><img src="<?php echo base_url();?>Uploads/<?php echo $row["Logo"];?>" alt="LOGO" height="75px" width="100px"></td>
							  <td><a href="/DLVR/Menu/index/<?php echo $row["ID"]; ?>">Add Menu</a><br>
							  <?php if($row["Status"]==1){
							  ?>
							  <a href="<?php echo base_url();?>Party/DeactivateParty/<?php echo $row["ID"];?>">Deactivate Party</a>
							  <?php
							}
							else
							{
								?>
								<a href="<?php echo base_url();?>Party/ActiveParty/<?php echo $row["ID"];?>">Activate Party</a>
								<?php
							}
							 ?> 
							  <br>
							  <a href="#">Edit Party</a></td>
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