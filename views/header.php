<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shah Overseas</title>
  <link rel="icon" href="<?php echo base_url('images/logo-icon/favicon-16.png'); ?>">
<!-- Favorite Icons -->
<link rel="icon" href="<?php echo base_url('images/logo-icon/favicon-32.png'); ?>" type="image/x-icon" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style type="text/css">
  .skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: #2f3562;
}

.skin-blue .main-header .navbar {
    background-color: #c4191f;
}

.skin-blue .main-header .navbar .sidebar-toggle:hover {
    background-color: #c4191f;
}

.btn-primary{
  background-color: #2f3562!important;
  border-color: #2f3562!important;
}

.skin-blue .main-header .logo {
  background-color: #2f3562;
}

.skin-blue .main-header .logo:hover {
  background-color: #2f3562;
}

.btn-info{
  background-color: #2f3562!important;
  border-color: #2f3562!important;
}



</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
   
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
   
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar" style="font-size: 16px;">
      
      <ul class="sidebar-menu" data-widget="tree" style="">
          <li><div style="padding: 5px; margin-left: 20px;"><img src="<?php echo base_url('images/200x84.png'); ?>"></div></li>
          <li><p style="color: white; margin-left: 40px;margin-top: 20px; font-size: 18px;"><?php echo $this->session->userdata('admin_name'); ?></p></li>
          <li><p style="color: white; margin-left: 30px;margin-top: 20px; font-size: 14px;"><i class="fa fa-circle text-success"></i> Online </p></li>

          <li><a href="<?php echo base_url('sreg'); ?>"><i class="fa fa-th-large"></i>Dashboard</a></li>

          <li><a href="<?php echo base_url('sreg')?>"><i class="fa  fa-user-plus"></i>Add Student</a></li>
          <li><a href="<?php echo base_url('search_by_student')?>"><i class="fa fa-search"></i>University List By Student</a></li>

        <!--Student University Status-->  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>Stud-Univ Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('uniname')?>"><i class="fa fa-bank"></i>Add University</a></li>
            <li><a href="<?php echo base_url('auni')?>"><i class="fa fa-building-o"></i>Add University Status</a></li>
            <li><a href="<?php echo base_url('listuni')?>"><i class="fa fa-database"></i>List of Applied Applications</a></li>
                        
          </ul>
        </li><!--Student University Status-->

        <!--Student University Status-->  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-pdf-o"></i>
            <span>Uploaded Documents</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('docss')?>"><i class="fa fa-file-movie-o"></i>View Document</a></li>
                       
          </ul>
        </li><!--Student University Status-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-pdf-o"></i>
            <span>Resumes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('before_create_resume')?>"><i class="fa fa-file-movie-o"></i>Create Resume</a></li>
            <li><a href="<?php echo base_url('view_stud_resume')?>"><i class="fa fa-file-movie-o"></i>Search Resume</a></li>
            <li><a href="<?php echo base_url('view_all_resume')?>"><i class="fa fa-file-movie-o"></i>View All Resume</a></li>
                       
          </ul>
        </li><!--Student University Status-->

        <!--Student University Status-->  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gg"></i>
            <span>SOP Questionaire</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('sopss')?>"><i class="fa fa-paste"></i>View SOP</a></li> 
            <li><a href="<?php echo base_url('sop_edit')?>"><i class="fa fa-text-height"></i>Update SOP Questions</a></li>                     
          </ul>
        </li><!--Student University Status-->

        <!--Student University Status-->  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-android"></i>
            <span>Veronica</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('ver_ques')?>"><i class="fa fa-circle-o"></i>Add Veronica Questions</a></li> 
            <!-- <li><a href="<?php echo base_url('uniname')?>"><i class="fa fa-circle-o"></i>Update Questions</a></li> -->
            <li><a href="<?php echo base_url('ver_chats')?>"><i class="fa fa-circle-o"></i>View Chat History</a></li>                     
          </ul>
        </li><!--Student University Status-->

        <!--Expense Management-->  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-usd"></i>
            <span>Expense Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Expense')?>"><i class="fa fa-cc-mastercard"></i>&nbsp;Add Credited Amounts</a></li>
            <li><a href="<?php echo base_url('expenses_s')?>"><i class="fa fa-credit-card"></i>&nbsp;Add/View Expenses</a></li>                
            <li><a href="<?php echo base_url('transaction')?>"><i class="fa fa-cc-mastercard"></i>&nbsp;Transactions/Student</a></li>  
            <li><a href="<?php echo base_url('transactions')?>"><i class="fa fa-cc-mastercard"></i>&nbsp;All Transactions/Account</a></li>  
            <li><a href="<?php echo base_url('account_summary')?>"><i class="fa fa-cc-mastercard"></i>&nbsp;Accounts Summary</a></li>    
                          
          </ul>
        </li><!--Student University Status-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-anchor"></i>
            <span>ICAD Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('icad_status')?>"><i class="fa fa-group"></i>&nbsp;Add Student Status</a></li>
            <li><a href="<?php echo base_url('icad_users')?>"><i class="fa fa-user-secret"></i>&nbsp;Add Icad Users</a></li>                
            <li><a href="<?php echo base_url('transaction')?>"><i class="fa  fa-unlock-alt"></i>&nbsp;View Status</a></li>  
                                     
          </ul>
        </li>

         <!-- <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li> -->
         <li><a href="<?php echo base_url('logout'); ?>"><i class="fa  fa-power-off"></i> Logout</a></li>
                        
      </ul>
    </section>
  </aside>