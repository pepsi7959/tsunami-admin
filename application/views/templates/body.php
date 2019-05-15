
 <?php
 header("Access-Control-Allow-Origin: *");
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TSUNAMI | <?php echo $title ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/plugins/iCheck/all.css">
  <!-- Boostap -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/plugins/datepicker/datepicker3.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/dist/css/adminlte.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/plugins/daterangepicker/daterangepicker-bs3.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <!-- bootstrap-tokenfield -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/tokenfield-typeahead.css" rel="stylesheet">

  <!-- Custom style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/tsunami/css/<?php echo $section?>.css">
  <style type="text/css">
#button-totop {
	display: inline-block;
	background-color: #FF9800;
	width: 50px;
	height: 50px;
	text-align: center;
	border-radius: 4px;
	position: fixed;
	bottom: 30px;
	right: 30px;
	transition: background-color .3s, 
	  opacity .5s, visibility .5s;
	opacity: 0;
	visibility: hidden;
	z-index: 1000;
  }
  #button-totop::after {
	content: "\f077";
	font-family: FontAwesome;
	font-weight: normal;
	font-style: normal;
	font-size: 2em;
	line-height: 50px;
	color: #fff;
  }
  #button-totop:hover {
	cursor: pointer;
	background-color: #333;
  }
  #button-totop:active {
	background-color: #555;
  }
  #button-totop.show {
	opacity: 1;
	visibility: visible;
  }

span.user-header {
    height: 175px;
    padding: 10px;
    text-align: center;
    background-color: #818181;
}
.skin-blue .main-header li.user-header {
    background-color: #818181;
}

</style> 
</head>
<body class="sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand border-bottom navbar-light bg-warning" style = "padding-right:20px;" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    
    <!-- User Logut -->
    <!-- <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout">Logout</a>
      <li>
    </ul> -->


    <ul class="navbar-nav ml-auto" >
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
      <ul class="contacts-list">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url()."assets" ?>/dist/img/avatar04.png" class="img-size-50 img-circle mr-3"  alt="User Image">
              <span class="hidden-xs"><?php echo $profiles['displayname']; ?></span>
            </a>
           
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <li>
                  <span class="dropdown-header user-header">
                    <img src="<?php echo base_url()."assets" ?>/dist/img/avatar04.png" class="img-size-50 img-circle mr-3"  alt="User Image">
                    <p style = "color:#ffffff; padding-top:20px;font-size:16px;">
                       <?php echo $profiles['displayname']; ?>
                    </p>
                    <p style = "color:#ffffff; padding-top:20px;font-size:16px;">
                          <small>Member since <?php echo date("Y", strtotime($profiles['createdat'])); ?></small>
                        </p>
                  </span>
              </li>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fa fa-clock-o mr-2"></i> Create Date
                <span class="float-right text-muted text-sm"><?php echo date("d M Y H:i", strtotime($profiles['createdat'])); ?></span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fa fa-users mr-2"></i> Last Login
                <span class="float-right text-muted text-sm"><?php echo date("d M Y H:i", strtotime($profiles['lastlogindate'])); ?></span>
              </a>
             
              <div class="dropdown-divider"></div>
              <a href="logout" class="dropdown-item dropdown-footer">Sign Out  </a>
            </div>
          
      </ul>
      </li>
     
      
    </ul>
    <!-- Right navbar links
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fa fa-th-large"></i>
        </a>
      </li>
    </ul> -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url()."assets" ?>/index3.html" class="brand-link bg-warning">
      <img src="<?php echo base_url()."assets" ?>/dist/img/avatar04.png"
           alt="tsunami Logo"
           class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light">tsunami</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="<?php echo base_url()."assets" ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block"><?php echo $profiles['displayname']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard" class="nav-link left-menu dashboard">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="monitoring" class="nav-link left-menu monitoring">
              <i class="nav-icon fa fa-area-chart"></i>
              <p>
                Monitoring
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="report" class="nav-link left-menu reports">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="setting" class="nav-link left-menu setting">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 <!-- Content Wrapper. Contains page content -->

 <?php $this->load->view($section);?>
  <!-- /.content-wrapper -->

  <?php $this->load->view('main-footer');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->





<!-- jQuery -->
<script src="<?php echo base_url()."assets" ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()."assets" ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- datatable -->
<script src="<?php echo base_url()."assets" ?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()."assets" ?>/plugins/datatables/dataTables.bootstrap4.js"></script>



<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>

<!-- cookie -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<!-- tokenfield -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.min.js"></script>

<!-- tokenfield -->

<!-- date-range-picker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>-->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->
<script src="<?php echo base_url()."assets" ?>/plugins/daterangepicker/moment.min.js"></script> 
<script src="<?php echo base_url()."assets" ?>/plugins/daterangepicker/daterangepicker.js"></script> 

<!-- datepicker -->
<script src="<?php echo base_url()."assets" ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()."assets" ?>/plugins/select2/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()."assets" ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets" ?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets" ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."assets" ?>/dist/js/demo.js"></script>
<!-- jQuery Knob -->
<script src="<?php echo base_url()."assets" ?>/plugins/knob/jquery.knob.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()."assets" ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url()."assets" ?>/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url()."assets" ?>/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url()."assets" ?>/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- jQuery 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<!-- charjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" ></script>
<!-- Customize Scripts -->
<script src="<?php echo base_url()."assets" ?>/tsunami/js/utils.js"></script>
<script data-main="<?php echo base_url()."assets" ?>/tsunami/js/pages/<?php echo $section?>.js" src="<?php echo base_url()."assets" ?>/tsunami/js/require.js"></script>

<script type="text/javascript">
var btn = $('#button-totop');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

</script>


</body>
</html>
