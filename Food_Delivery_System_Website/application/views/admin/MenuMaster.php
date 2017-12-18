<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Menu</title>

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
$ID=0;
$Category="";
$SubCategory="";
$ItemName="";
$ItemDescription="";
$HalfPrice=0;
$FullPrice=0;
$Image="";
$Availability=0;
$ItemType=0;
$PartyCode="";
$SerialNo=0;
if($Detail!=null)
{
	foreach($Detail as $row)
	{
		$ID=$row["ID"];
		$Category=$row["Category"];
		$SubCategory=$row["SubCategory"];
		$ItemName=$row["ItemName"];
		$ItemDescription=$row["ItemDescription"];
		$HalfPrice=$row["HalfPrice"];
		$FullPrice=$row["FullPrice"];
		$Image=$row["Image"];
		$Availability=$row["Availability"];
		$ItemType=$row["ItemType"];
		$PartyCode=$row["PartyCode"];
		$SerialNo=$row["SerialNo"];
	}
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
                <h3>Menu</h3>
              </div>

            </div>
            <div class="clearfix"></div>
			<form action="<?php echo base_url();?>Menu/AddMenu/<?php echo $PartyID;?>/<?php echo $ID;?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <div class="form-horizontal form-label-left input_mask">
						<div class="form-group">
							<label>Party: </label>
							<select name="PartyID" id="PartyID" disabled class="form-control">
							<option value="0" <?php if($PartyID==0){echo "selected='selected'";}?> >Kitchen</option>
							<?php
							foreach($PartyList as $Party)
							{
							?>
							<option value="<?php echo $Party["ID"];?>"><?php echo $Party["PartyCode"];?> <?php if($PartyID==$Party["ID"]){echo "selected='selected'";}?> ></option>
							<?php
							}
							?>
							</select>
						</div>
						<div class="form-group">
							<label>Category: </label>
							<select name="Category" id="Category" class="form-control" onchange="this.form.submit();">
							<?php
							foreach($CatList as $Cat)
							{
							?>
							<option value="<?php echo $Cat["CName"];?>" 
							<?php if($ID!=0 && $Category==$Cat["CName"]){echo "selected='selected'";} else if($SelectedCategory==$Cat["CName"]) echo "selected='selected'";?>><?php echo $Cat["CName"];?> </option>
							<?php
							}
							?>
							
							</select>
						</div>
						<div class="form-group">
							<label>Sub Category: </label>
							<select name="SubCategory" id="SubCategory" class="form-control">
							<option value="">No Subcategory</option>
							<?php
							foreach($SubCatList as $SubCat)
							{
							?>
							<option value="<?php echo $SubCat["SubCategory"];?>" <?php if($SubCategory==$SubCat["SubCategory"]){echo "selected='selected'";}?>><?php echo $SubCat["SubCategory"];?> </option>
							<?php
							}
							?>
							
							</select>
						</div>
						<div class="form-group">
							<label>Item Name : </label>
							<input type="text" placeholder="Item Name" name="ItemName" value="<?php echo $ItemName;?>" class="form-control">
						</div>
						
						<div class="form-group">
							<label>Description: </label>
							<textarea rows="4" cols="50" placeholder="Description" name="ItemDescription" id="ItemDescription" class="form-control"><?php echo $ItemDescription;?></textarea>
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
						<div class="form-group">
							<label>Half Price: </label>
							<input type="text" placeholder="Price of Full Plate" name="HalfPrice" id="HalfPrice" value="<?php echo $HalfPrice;?>">
						</div>
						<div class="form-group">
							<label>Full Price: </label>
							<input type="text" placeholder="Price of Full Plate" name="FullPrice" id="FullPrice" value="<?php echo $FullPrice;?>">
						</div>
						<div class="form-group">
							<label>Image: </label>
							<input type="file" name="image" id="image">
						</div>
						<input type="hidden" name="hdPhoto" value="<?php echo $Image;?>">
						<div class="form-group">
						<?php if($Image!="")
						{
						 ?>
						 <img src="<?php echo base_url();?>Uploads/<?php echo $Image; ?>" height="100px"/>
						 <?php  
						}
						?>
						</div>
						<div class="checkbox">
							<label>
							<input class="flat" type="checkbox" name="Availability" id="Availability" value="1" <?php if($Availability==1) echo "checked='true'"; ?>> Available
							</label>
						</div>
						<div class="checkbox">
							<label>
							<input class="flat" type="checkbox" name="ItemType" id="ItemType" value="1" <?php if($ItemType==1) echo "checked='true'"; ?>> Veg
							</label>
						</div>
						<div class="form-group">
							<label>SerialNo: </label>
							<input type="text" placeholder="Serial No" name="SerialNo" id="SerialNo" value="<?php echo $SerialNo;?>" class="form-control">
						</div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-info">Save</button>
					<a href="<?php echo base_url();?>Menu/SpecialMenu/1" class="btn btn-danger">Add hot sellings</a>
				</div>
			</div>
			</form>
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Serial No</th>
                          <th>Name</th>
						  <th>Category</th>
                          <th>Description</th> 
                          <th>Half Price</th>
						  <th>Full Price</th>
                          <th>Image</th>
						  <th>Availability</th>
						  <th>Item Type</th>
						  <th>Operations</th>
                        </tr>
                      </thead>
						<tfoot>
                        <tr>
                          <th>Serial No</th>
                          <th>Name</th>
						  <th>Category</th>
                          <th>Description</th> 
                          <th>Half Price</th>
						  <th>Full Price</th>
                          <th>Image</th>
						  <th>Availability</th>
						  <th>Item Type</th>
						  <th>Operations</th>
                        </tr>
                      </tfoot>

                      <tbody>
						<?php
						foreach($MenuList as $row)
						{
							?>
                        <tr>
                              <td><?php echo $row["SerialNo"]; ?></td>
							  <td><?php echo $row["ItemName"]; ?></td>
							  <td><?php echo $row["Category"]; ?></td>
                              <td><?php echo $row["ItemDescription"]; ?></td>
                              <td><?php echo $row["HalfPrice"]; ?></td>
							  <td><?php echo $row["FullPrice"]; ?></td>
							  <td><img src="<?php echo base_url();?>Uploads/<?php echo $row["Image"]; ?>" alt="Image" width="150px" height="100px"></td>
                              <td><?php if($row["Availability"]==1){echo "Avalable";}else{echo "Not Available";} ?></td>
							  <td><?php if($row["ItemType"]==1){echo "Veg";}else{echo "Non Veg";} ?></td>
							  <td><br><a href="<?php echo base_url();?>Menu/DeleteMenu/<?php echo $PartyID;?>/<?php echo $row["ID"];?>">Delete</a><br>
							  <a href="<?php echo base_url();?>Menu/index/<?php echo $PartyID;?>?MenuID=<?php echo $row["ID"];?>">Edit</a>
							  <!--a href="#">Edit</a--></td>
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