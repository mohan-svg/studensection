<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ICAD Login</title>

   <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin.css" rel="stylesheet'); ?>">

<style type="text/css">
    hr {
        border-top: 1px solid black;
    }
    
    footer.sticky-footer {
        width: 100%;
    }

    .container{

      max-width: 100% !important;
      padding-left: 0px;
      padding-right: 0px;
    }

    .col-lg-12{
      padding-left: 0px;
      padding-right: 0px;
    }

    .flt-left{
      float: left;
    }
    .flt-right{
      float: right;
    }
.textcolor{
  color: blue
}
thead{
  background-color:#154360;

color:white;
}

@media(max-width: 480px;){

  .card-login{
      margin-bottom: 90px!important;

  }
  
}

</style>


</head>

<body class="" style="background-color:  #d7dbdd;">
<?php if ($this->session->flashdata('success')) { ?>
       <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>

    <?php } ?>

    <?php if ($this->session->flashdata('error')) { ?>
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php } ?>
  <div class="container">

      <div class="col-md-12" style="padding-bottom: 50px;background-color: #1a5276;">
                <!-- <img src="<?php echo base_url('assets/images/sh-kaplan_j.png');?>" width="400px;" style="padding-top: 20px; padding-bottom: 10px;"> -->
                <div style="border-bottom: 2px solid red;"></div>

            </div>

            <h1 style="text-align: center; font-weight: bold; padding-top: 30px;padding-bottom: 30px; color:  #34495e;">Student's University Application Status</h1>

    <div class="card card-login mx-auto mt-5 mgb" style="width: 70%; ">
      <div class="card-header" style="background-color: #cb4335; color: white; text-align: center; font-size: 22px; font-weight: bold;">ICAD User Login</div>
      <div class="card-body">
        <?php echo form_open('icad_login'); ?>
          <div class="form-group">
            <div class="form-label-group">
              
              <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Username</label>
              
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          
          <input type="submit" value="Login" class="btn btn-primary btn-block">
         <?php echo form_close(); ?>
        
      </div>
    </div>
  </div>

  <footer class="sticky-footer" style="background-color:#5d6d7e; color: white;">
            <div class="container my-auto">
                <div class="copyright text-center my-auto" >
                    <span style="font-weight: bold; font-size: 16px;">Copyright © Design & Developed By Shah-Overseas 2019</span>
                </div>
            </div>
        </footer>

   <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin.min.js'); ?>"></script>
</body>

</html>
