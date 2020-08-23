<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
   
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

  
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <ul class="sidebar-menu" data-widget="tree" style="">
        	<li><div style="padding: 5px; margin-left: 20px;"><img src="<?php echo base_url('images/200x84.png'); ?>"></div></li>
          <li><p style="color: white; margin-left: 40px;margin-top: 20px; font-size: 18px;"><?php echo $this->session->userdata('sname'); ?></p></li>
          <li><p style="color: white; margin-left: 30px;margin-top: 20px; font-size: 14px;"><i class="fa fa-circle text-success"></i> Online </p></li>
         <?php if($this->session->userdata('upd_status')!='true'){ ?> 
          <li><a href="<?php echo base_url('upload'); ?>"><i class="fa fa-circle-o"></i> Upload Documents</a></li>
        <?php } ?>
         <li><a href="<?php echo base_url('view_doc'); ?>"><i class="fa fa-circle-o"></i> View/Update Documents</a></li>
            
         <!-- <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li> -->
         <li><a href="<?php echo base_url('slogout'); ?>"><i class="fa fa-circle-o"></i> Logout</a></li>
         <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-circle-o"></i> Go to Dashboard</a></li>
               
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>