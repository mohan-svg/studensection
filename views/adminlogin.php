 
<!DOCTYPE html>
<html lang="en">
    <head>
     <style>
       

        body{
          background: url(assets/images/index.jpg);
          background-repeat: no-repeat;
          background-size: auto;
          overflow: hidden;
        }

        @media screen and (max-width: 650px){
            body{
          background: url(assets/images/mobile_img.jpg);
          background-repeat: no-repeat;
          background-size: auto;
        }
        }

        
    </style>
        <title>Shah Overseas|Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" subset="latin-ext" rel="stylesheet">
        <link href="<?php echo base_url('assets/assets/css/main.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/assets/js/vendor/modernizr-2.8.3.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/assets/js/vendor/jquery-1.12.0.min.js'); ?>"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/css/style.css'); ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </head>

    <style type="text/css">
        .btn-primary {
    color: #fff;
    background-color: #2f3562;
    border-color: #2f3562;
}

.opaque{
    opacity: 1!important;
}
    </style>
    <body>
    <div class="site" id="page">

        <div style="background-color: #2f3562; padding: 10px; padding-left: 46px;"><img src="<?php echo base_url('images/200x84.png')?>"></div>
                
        <section class="hero-section hero-section--image clearfix clip">
            <div class="hero-section__wrap">
              
              
                <?php if ($this->session->flashdata('msg')) { ?>

                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('msg'); ?>   
                        </div>
                <?php } ?>
                <?php if ($this->session->flashdata('success')) { ?>

                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('success'); ?>   
                        </div>
                <?php } ?>
                 <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('error'); ?>   
                        </div>

                <?php } ?> 
            <!-- <div class="container"> -->

                    <div><h3 style="text-align: center; font-weight: bold; padding-bottom: 8px;padding-top: 8px;"><i style="color: #c4171d;">#</i><i style="color: #2f3562;">Student</i> <i style="color: #c4171d;">Section</i> <!-- <i style="color: #2f3562;">Assistant</i> --></h3></div>
                <div class="row">
                  <div class="offset-lg-2 col-lg-8">
                    <div class="title-01 title-01--11 text-center">
                        <h2 class="title__heading">
                            <span></span>
                            <strong class="hero-section__words">
                                <span class="title__effect is-visible">Application Status</span>
                                <span class="title__effect">Upload Documents</span>
                                <span class="title__effect">Student Assistance</span>
                                <span class="title__effect">SOP Questionaire</span>
                            </strong>
                        </h2>
                        <div class="title__description">
                            <div class="login-form">
                                <?php echo form_open_multipart('alcheck');?>
                                    <h2 class="text-center" style="color: #fff;">Admin Login</h2>
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" style="font-size: 16px; font-weight: bold;" placeholder="Username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" style="font-size: 16px; font-weight: bold;" placeholder="Password" id="password" name="password"><br/>
                                        <span class="pull-left"><input type="checkbox" onclick="myFunction();"> &nbsp;<span style="color: white; font-size: 16px;">Show Password</span> </span>
                                    </div><br/>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-block" style="font-size: 16px; font-weight: bold;" name="Login" value="Log in"> 
                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="title__action"></div>
                    </div>
                </div>
            </div>
           
            </div>
            </section>
        </div>
        <!-- JS -->
        <script src="<?php echo base_url('assets/assets/js/plugins/animate-headline.js'); ?>"></script>
        <script src="<?php echo base_url('assets/assets/js/main.js'); ?>"></script>
    </body>
</html>

<script type="text/javascript">

function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 

</script>