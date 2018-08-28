<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <meta http-equiv= 'pragma' content='no-cache' /> 
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
  
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
   
    
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
         <link href="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.min.css" rel="stylesheet" type="text/css" />
    
    <script src="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.min.js"></script>
  
    
    <script>
    
    $(document).ready(function(){
            
      $("[data-fancybox]").fancybox({
	iframe : {
		css : {
			width : "600px"
		}
	}
        
    });
    </script>
     <style>
    
    @media(min-width:800px)
    {
    .fancybox-slide--iframe .fancybox-content, .fancybox-slide--map .fancybox-content, .fancybox-slide--video .fancybox-content {
    height: 80%;
    margin: 0;
    overflow: visible;
    padding: 0;
    width: 60%;
}
}

    </style>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>B</b>T</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>BackTest</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-history"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ?
"First Time Login" : $last_login; ?></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i>Đổi mật khẩu</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            
            <?php
if ($role == ROLE_ADMIN || $role == ROLE_MANAGER) {
?>
          
           
            <?php
}
if ($role == ROLE_ADMIN) {
?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>userListing">
                <i class="fa fa-users"></i>
                <span>Quản lý tài khoản</span>
              </a>
            </li>
            
            
             <li class="treeview">
              <a href="<?php echo base_url(); ?>Fields">
                <i class="fa  fa-angle-double-right"></i>
                <span>Fields Map</span>
              </a>
            </li>
            
            
            
             <li class="treeview">
              <a href="<?php echo base_url(); ?>Logics">
                <i class="fa  fa-angle-double-right"></i>
                <span>Logics</span>
              </a>
            </li>
                   
          

          
          
             <li class="treeview">
              <a href="<?php echo base_url(); ?>Querybuild">
                <i class="fa  fa-angle-double-right"></i>
                <span>Querybuild</span>
              </a>
            </li>
          
          
          
               <li class="treeview">
              <a href="<?php echo base_url(); ?>Listconfig">
                <i class="fa  fa-angle-double-right"></i>
                <span>List Strategies</span>
              </a>
            </li>
          
          
          
          
             <li class="treeview">
              <a href="<?php echo base_url(); ?>Backtest">
                <i class="fa  fa-angle-double-right"></i>
                <span>Backtest</span>
              </a>
            </li>
          
          
          
             <li class="treeview">
              <a href="<?php echo base_url(); ?>Backtest Repost">
                <i class="fa  fa-angle-double-right"></i>
                <span>Backtest repost</span>
              </a>
            </li>
            
          
            <?php
}
?>
            
            
            
            
            
            

            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      
  